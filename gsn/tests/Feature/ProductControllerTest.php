<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Product\Repositories\ProductRepository;

class ProductControllerTest extends TestCase
{
    //use RefreshDatabase;

    protected $productAttributeValueRepository;
    protected $productDownloadableLinkRepository;
    protected $productDownloadableSampleRepository;
    protected $productRepository;

    public function setUp(): void
    {
        parent::setUp();

        // Mock repositories
        $this->productAttributeValueRepository = \Mockery::mock(ProductAttributeValueRepository::class);
        $this->productDownloadableLinkRepository = \Mockery::mock(ProductDownloadableLinkRepository::class);
        $this->productDownloadableSampleRepository = \Mockery::mock(ProductDownloadableSampleRepository::class);
        $this->productRepository = \Mockery::mock(ProductRepository::class);

        // Bind the mocked dependencies to the container
        $this->app->instance(ProductAttributeValueRepository::class, $this->productAttributeValueRepository);
        $this->app->instance(ProductDownloadableLinkRepository::class, $this->productDownloadableLinkRepository);
        $this->app->instance(ProductDownloadableSampleRepository::class, $this->productDownloadableSampleRepository);
        $this->app->instance(ProductRepository::class, $this->productRepository);
    }

    /**
     * Test download method
     */
    public function testDownload()
    {
        // Mock the product attribute value response
        $this->productAttributeValueRepository->shouldReceive('findOneWhere')
            ->once()
            ->with(['product_id' => 1, 'attribute_id' => 1])
            ->andReturn(['text_value' => 'some/path/to/file.jpg']);

        // Mock Storage to return a downloadable file
        Storage::shouldReceive('download')
            ->once()
            ->with('some/path/to/file.jpg')
            ->andReturn('File content');

        // Make the request
        $response = $this->get(route('shop.product.file.download', ['id' => 1, 'attribute_id' => 1]));

        // Assert the response is correct
        $response->assertStatus(200);
        $response->assertSee('File content');
    }


}
