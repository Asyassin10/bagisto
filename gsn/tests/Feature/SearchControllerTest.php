<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Webkul\Shop\Http\Controllers\SearchController;
use Webkul\Marketing\Repositories\SearchTermRepository;
use Webkul\Product\Repositories\SearchRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SearchControllerTest extends TestCase
{
    protected $searchTermRepository;
    protected $searchRepository;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->searchTermRepository = \Mockery::mock(SearchTermRepository::class);
        $this->searchRepository = \Mockery::mock(SearchRepository::class);
        
        $this->app->instance(SearchTermRepository::class, $this->searchTermRepository);
        $this->app->instance(SearchRepository::class, $this->searchRepository);
    }

    /** @test */
    public function it_redirects_to_search_term_redirect_url_if_exists()
    {
        // Mock the search term with a redirect URL
        $this->searchTermRepository->shouldReceive('findOneWhere')
            ->with([
                'term'       => 'test',
                'channel_id' => core()->getCurrentChannel()->id,
                'locale'     => app()->getLocale(),
            ])
            ->andReturn((object) ['redirect_url' => 'https://example.com']);

        $response = $this->get(route('shop.search.index', ['query' => 'test']));

        $response->assertRedirect('https://example.com');
    }

    /** @test */
    public function it_shows_search_results_view_if_no_redirect_url()
    {
        // Mock the search term without a redirect URL
        $this->searchTermRepository->shouldReceive('findOneWhere')
            ->with([
                'term'       => 'test',
                'channel_id' => core()->getCurrentChannel()->id,
                'locale'     => app()->getLocale(),
            ])
            ->andReturn(null);

        $response = $this->get(route('shop.search.index', ['query' => 'test']));

        $response->assertViewIs('shop::search.index')
            ->assertStatus(200);
    }

    /** @test */
    public function it_uploads_search_image_and_returns_response()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test-image.jpg');

        $this->searchRepository->shouldReceive('uploadSearchImage')
            ->once()
            ->with(\Mockery::on(function ($arg) {
                return isset($arg['file']) && $arg['file'] instanceof UploadedFile;
            }))
            ->andReturn(['success' => true, 'message' => 'Image uploaded successfully']);

        $response = $this->post(route('shop.search.upload'), [
            'file' => $file
        ]);

        $response->assertJson(['success' => true, 'message' => 'Image uploaded successfully'])
            ->assertStatus(200);
    }

    /** @test */
    public function it_returns_error_when_upload_fails()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test-image.jpg');

        $this->searchRepository->shouldReceive('uploadSearchImage')
            ->once()
            ->andThrow(new \Exception('Upload failed'));

        $response = $this->post(route('shop.search.upload'), [
            'file' => $file
        ]);

        $response->assertStatus(500);
    }


    protected function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }
}