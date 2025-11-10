<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Webkul\Shop\Services\ProductPageService;

beforeEach(function () {
    $this->service = new ProductPageService();
});

it('checks if product has attribute and type is not text, returns true', function () {
    $attribute = (object) [
        'code' => 'color',
        'type' => 'dropdown',
        'admin_name' => 'non',
    ];

    $product = ['color' => 'red'];

    $result = $this->service->CheckIfProductHasThisAttributeAndTypeIsNotText($attribute, $product);

    expect($result)->toBeTrue();
});

it('checks if product has attribute and type is not text, returns false', function () {
    $attribute = (object) [
        'code' => 'color',
        'type' => 'text',
        'admin_name' => 'si non',
    ];

    $product = ['color' => null];

    $result = $this->service->CheckIfProductHasThisAttributeAndTypeIsNotText($attribute, $product);

    expect($result)->toBeFalse();
});

it('fetches next value, returns true', function () {
    $customAttributes = new Collection([
        (object) ['type' => 'text', 'admin_name' => 'si non'],
        (object) ['type' => 'text', 'admin_name' => 'si oui'],
    ]);

    $result = $this->service->fetchNextValue($customAttributes, 0);
    if ($result) {
        Log::info('The return value of someFunction is true.');
    } else {
        Log::info('The return value of someFunction is false.');
    }
    expect($result)->toBeTrue();
});

/* it('fetches next value, returns false', function () {
    $customAttributes = new Collection([
        (object) ['type' => 'dropdown', 'admin_name' => 'red'],
        (object) ['type' => 'text', 'admin_name' => 'non-unique'],
    ]);

    $result = $this->service->fetchNextValue($customAttributes, 0);

    expect($result)->toBeFalse();
}); */
it('fetches next value, returns false when conditions not met', function () {
    $customAttributes = new Collection([
        (object) ['type' => 'dropdown', 'admin_name' => 'red'],
        (object) ['type' => 'text', 'admin_name' => 'non-unique', 'code' => 'random_code'],
    ]);

    $result = $this->service->fetchNextValue($customAttributes, 0);

    expect($result)->toBeFalse();
});

it('fetches next value, returns true when conditions are met', function () {
    $customAttributes = new Collection([
        (object) ['type' => 'dropdown', 'admin_name' => 'red'],
        (object) ['type' => 'text', 'admin_name' => 'si oui question', 'code' => 'any_code'],
    ]);

    $result = $this->service->fetchNextValue($customAttributes, 0);

    expect($result)->toBeTrue();
});

it('throws exception when next index does not exist', function () {
    $customAttributes = new Collection([
        (object) ['type' => 'dropdown', 'admin_name' => 'red'],
    ]);

    $this->expectException(ErrorException::class);
    $this->service->fetchNextValue($customAttributes, 0); // Test index 0 (checks if index 1 exists)
});

it('throws exception for invalid index when fetching next value', function () {
    $customAttributes = new Collection([
        (object) ['type' => 'text', 'admin_name' => 'non'],
    ]);

    $this->service->fetchNextValue($customAttributes, 1);
})->throws(ErrorException::class);
