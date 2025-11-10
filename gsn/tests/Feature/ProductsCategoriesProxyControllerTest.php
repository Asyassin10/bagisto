<?php

namespace Tests\Feature\Shop\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Marketing\Repositories\URLRewriteRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;
use Illuminate\Http\Request;
use Mockery;

class ProductsCategoriesProxyControllerTest extends TestCase
{
    protected $categoryRepository;
    protected $productRepository;
    protected $themeCustomizationRepository;
    protected $urlRewriteRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = Mockery::mock(CategoryRepository::class);
        $this->productRepository = Mockery::mock(ProductRepository::class);
        $this->themeCustomizationRepository = Mockery::mock(ThemeCustomizationRepository::class);
        $this->urlRewriteRepository = Mockery::mock(URLRewriteRepository::class);

        $this->app->instance(CategoryRepository::class, $this->categoryRepository);
        $this->app->instance(ProductRepository::class, $this->productRepository);
        $this->app->instance(ThemeCustomizationRepository::class, $this->themeCustomizationRepository);
        $this->app->instance(URLRewriteRepository::class, $this->urlRewriteRepository);
    }

   

    /** @test */
    public function it_redirects_when_category_url_rewrite_found()
    {
        $urlRewrite = (object)[
            'target_path' => '/new-category',
            'redirect_type' => 301
        ];

        $this->categoryRepository->shouldReceive('findBySlug')
            ->twice()
            ->andReturn(null);

        $this->productRepository->shouldReceive('findBySlug')
            ->once()
            ->andReturn(null);

        $this->urlRewriteRepository->shouldReceive('findOneWhere')
            ->with([
                'entity_type' => 'category',
                'request_path' => 'old-category',
                'locale' => app()->getLocale(),
            ])
            ->once()
            ->andReturn($urlRewrite);

        $response = $this->get('/old-category');

        $response->assertRedirect('/new-category')
            ->assertStatus(301);
    }

    /** @test */
    public function it_redirects_when_product_url_rewrite_found()
    {
        $urlRewrite = (object)[
            'target_path' => '/new-product',
            'redirect_type' => 301
        ];

        $this->categoryRepository->shouldReceive('findBySlug')
            ->twice()
            ->andReturn(null);

        $this->productRepository->shouldReceive('findBySlug')
            ->once()
            ->andReturn(null);

        $this->urlRewriteRepository->shouldReceive('findOneWhere')
            ->with([
                'entity_type' => 'category',
                'request_path' => 'old-product',
                'locale' => app()->getLocale(),
            ])
            ->once()
            ->andReturn(null);

        $this->urlRewriteRepository->shouldReceive('findOneWhere')
            ->with([
                'entity_type' => 'product',
                'request_path' => 'old-product',
            ])
            ->once()
            ->andReturn($urlRewrite);

        $response = $this->get('/old-product');

        $response->assertRedirect('/new-product')
            ->assertStatus(301);
    }

    /** @test */
    public function it_returns_no_content_for_asset_requests()
    {
        $response = $this->get('/image.png');
        $response->assertNoContent();

        $response = $this->get('/style.css');
        $response->assertNoContent();

        $response = $this->get('/script.js');
        $response->assertNoContent();
    }

    /** @test */
    public function it_returns_404_when_nothing_found()
    {
        $this->categoryRepository->shouldReceive('findBySlug')
            ->twice()
            ->andReturn(null);

        $this->productRepository->shouldReceive('findBySlug')
            ->once()
            ->andReturn(null);

        $this->urlRewriteRepository->shouldReceive('findOneWhere')
            ->twice()
            ->andReturn(null);

        $response = $this->get('/non-existent');

        $response->assertStatus(404);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}