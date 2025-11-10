<?php

namespace Tests\Feature;

use Webkul\Product\Repositories\ProductRepository;
use Tests\TestCase;
use Mockery;

class HomeControllerTest extends TestCase
{
    /**
     * Test the index method of HomeController.
     *
     * @return void
     */
    public function test_index_method_returns_view_with_search_terms()
    {
        // Create a mock for the ProductRepository
        $mockProductRepository = Mockery::mock(ProductRepository::class);

        // Mock the behavior of the repository methods
        $mockProductRepository->shouldReceive('whereHas')
            ->once()
            ->with('product_flats', Mockery::on(function ($callback) {
                // Ensure the callback behaves as expected
                $queryMock = Mockery::mock();
                $queryMock->shouldReceive('havingRaw')->with('COUNT(*) > 1')->andReturnSelf();
                $queryMock->shouldReceive('where')->with('is_valid_by_admin', true)->andReturnSelf();

                $callback($queryMock);

                return true;
            }))
            ->andReturnSelf();

        $mockProductRepository->shouldReceive('with')
            ->once()
            ->with('images')
            ->andReturnSelf();

        $mockProductRepository->shouldReceive('inRandomOrder')
            ->once()
            ->andReturnSelf();

        $mockProductRepository->shouldReceive('paginate')
            ->once()
            ->with(12)
            ->andReturn(collect(['product1', 'product2']));

        // Bind the mock to the container
        $this->app->instance(ProductRepository::class, $mockProductRepository);

        // Call the controller method
        $response = $this->get('/'); // Assuming the route points to HomeController@index

        // Assert that the view is returned
        $response->assertStatus(200);
        $response->assertViewIs('shop::home.index');
        $response->assertViewHas('searchTerm', collect(['product1', 'product2']));
    }
}
