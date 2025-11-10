<?php

namespace Tests\Unit\Shop\Http\Controllers\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Shop\Http\Controllers\API\CompareController;
use Webkul\Product\Models\Product;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Models\CompareItem;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Attribute\Models\Attribute;

class CompareControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testIndex()
    {
        $customer = Customer::factory()->create();
        $this->actingAs($customer, 'customer');

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product1->id,
        ]);

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product2->id,
        ]);

        $response = $this->get('/api/compare');
        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

    public function testGetComparableAttributes()
    {
        $customer = Customer::factory()->create();
        $this->actingAs($customer, 'customer');

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product1->id,
        ]);

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product2->id,
        ]);

        $attributeFamily = AttributeFamily::factory()->create();
        $comparableAttribute1 = Attribute::factory()->create([
            'attribute_family_id' => $attributeFamily->id,
            'is_comparable' => true,
        ]);
        $comparableAttribute2 = Attribute::factory()->create([
            'attribute_family_id' => $attributeFamily->id,
            'is_comparable' => true,
        ]);

        $response = $this->get('/api/compare/attributes');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                // Assert the structure of the returned data
            ]
        ]);
    }

    public function testStore()
    {
        $customer = Customer::factory()->create();
        $this->actingAs($customer, 'customer');

        $product = Product::factory()->create();

        $response = $this->postJson('/api/compare', [
            'product_id' => $product->id,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'message' => trans('shop::app.compare.item-add-success'),
        ]);

        $this->assertDatabaseHas('compare_items', [
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
        ]);
    }

    public function testDestroy()
    {
        $customer = Customer::factory()->create();
        $this->actingAs($customer, 'customer');

        $product = Product::factory()->create();

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
        ]);

        $response = $this->deleteJson('/api/compare', [
            'product_id' => $product->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => trans('shop::app.compare.remove-success'),
        ]);

        $this->assertDatabaseMissing('compare_items', [
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
        ]);
    }

    public function testDestroyAll()
    {
        $customer = Customer::factory()->create();
        $this->actingAs($customer, 'customer');

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product1->id,
        ]);

        CompareItem::factory()->create([
            'customer_id' => $customer->id,
            'product_id'  => $product2->id,
        ]);

        $response = $this->deleteJson('/api/compare/all');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => trans('shop::app.compare.remove-all-success'),
        ]);

        $this->assertDatabaseMissing('compare_items', [
            'customer_id' => $customer->id,
        ]);
    }
}
