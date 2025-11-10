<?php

use Webkul\Faker\Helpers\Category as CategoryFaker;
use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Product\Helpers\Toolbar;

use function Pest\Laravel\getJson;



it('returns paginated category products', function () {
    // Arrange.
    $productsCount = 50;

    $specifiedCategory = (new CategoryFaker())->factory()->create();

    (new ProductFaker())
        ->getSimpleProductFactory()
        ->hasAttached($specifiedCategory)
        ->count($productsCount)
        ->create();

    $availableLimits = (new Toolbar())->getAvailableLimits();

    // Act and Assert.
    $availableLimits->each(function ($limit) use ($specifiedCategory, $productsCount) {
        getJson(route('shop.api.products.index', ['category_id' => $specifiedCategory->id, 'limit' => $limit]))
            ->assertOk()
            ->assertJsonCount($limit, 'data')
            ->assertJsonPath('meta.total', $productsCount);
    });
});
