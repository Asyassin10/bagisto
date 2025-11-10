<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Webkul\Shop\Http\Controllers\CompareController;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Product\Repositories\ProductRepository;

class CompareControllerTest extends TestCase
{

    /** @test */
    public function it_returns_compare_view()
    {
        // Mock the dependencies for the controller
        $attributeFamilyRepository = \Mockery::mock(AttributeFamilyRepository::class);
        $attributeRepository = \Mockery::mock(AttributeRepository::class);
        $productRepository = \Mockery::mock(ProductRepository::class);

        // Bind the mocked repositories to the container
        $this->app->instance(AttributeFamilyRepository::class, $attributeFamilyRepository);
        $this->app->instance(AttributeRepository::class, $attributeRepository);
        $this->app->instance(ProductRepository::class, $productRepository);

        // Send a GET request to the compare route
        $response = $this->get(route('shop.compare.index'));

        // Assert that the correct view is returned
        $response->assertViewIs('shop::compare.index');
    }
}




