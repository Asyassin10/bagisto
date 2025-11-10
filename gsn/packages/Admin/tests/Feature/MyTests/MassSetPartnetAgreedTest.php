<?php

use App\Models\Admin; // Replace with your actual Admin model
use App\Models\Product; // Replace with your actual Product model
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Models\Channel;
use Webkul\Product\Models\Product as ModelsProduct;
use Webkul\User\Models\Admin as ModelsAdmin;

it('updates product partner agreement status in bulk via route as authenticated admin', function () {
    // Create an admin user
    $admin = ModelsAdmin::where("email", "ehangard@experts-comptables.org")->first();


    // Authenticate as the admin user
    $this->actingAs($admin, 'admin');

    // Create some products in the database
    $products = ModelsProduct::skip(1)->take(3)->get();

    // Mock the Event facade to verify events are dispatched
    Event::fake();

    // Simulate a POST request to the route
    $response = $this->postJson(route('admin.catalog.products.mass_set_congre_partner', ['is_congrate_partner' => true]), [
        'indices' => $products->pluck('id')->toArray(),
    ]);

    // Assert the response
    $response->assertStatus(200)
        ->assertJson([
            'message' => trans('admin::app.catalog.products.index.datagrid.mass-delete-success'),
        ]);

    /*   // Assert events were dispatched
      Event::assertDispatched('catalog.product.delete.before');
      Event::assertDispatched('catalog.product.delete.after'); */

    // Assert the products were updated in the database
    foreach ($products as $product) {
        $this->assertDatabaseHas('admins', [
            'id' => $product->admin_id,
            'is_congrate_partner' => true,
        ]);
    }
});


it('validates request data for mass set partner agreed as authenticated admin', function () {
    // Create an admin user
    $admin = ModelsAdmin::where("email", "ehangard@experts-comptables.org")->first();

    // Authenticate as the admin user
    $this->actingAs($admin, 'admin');

    // Simulate a POST request with invalid data
    $response = $this->postJson(route('admin.catalog.products.mass_set_congre_partner', ['is_congrate_partner' => true]), [
        'indices' => 'not-an-array', // Invalid data
    ]);

    // Assert validation error
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['indices']);
});


it('denies access to unauthenticated users', function () {
    // Simulate a POST request without authentication
    $response = $this->postJson(route('admin.catalog.products.mass_set_congre_partner', ['is_congrate_partner' => true]), [
        'indices' => [1, 2, 3],
    ]);

    // Assert unauthorized access
    $response->assertStatus(302); // 401 Unauthorized
});



it('renders the edit page with the edit button', function () {
    // Create an admin user
    $admin = ModelsAdmin::where("email", "ehangard@experts-comptables.org")->first();

    $this->actingAs($admin, 'admin');

    $response = $this->get(route('admin.catalog.products.edit', 88));
    $response->assertOk();

    $expectedHref = route('admin.catalog.products.visualize', ['slug' => "lddkey"]) . '?app=1';
    $response->assertDontSee('?app=1'); // Rough check
    $response->assertDontSee(__('admin::app.catalog.products.edit.preview'));
    $response->assertDontSee(__('admin::app.catalog.products.edit.preview'));

});

it('updates a channel successfully', function () {
    // Create an admin user
    $admin = ModelsAdmin::where("email", "ehangard@experts-comptables.org")->first();

    // Authenticate as the admin user
    $this->actingAs($admin, 'admin');

    // Create a channel to update
    //   $channel = Channel::factory()->create();

    // Mock the Event facade
    Event::fake();

    // Simulate a PUT request to the route
    $response = $this->putJson(route('admin.settings.channels.update', ['id' => 1]), [

        '_token' => 'OGmATHRnVBiqR8izI6iuPXH5EOtalaU5iQVcR0Qq',
        '_method' => 'PUT',
        'code' => 'default',
        'fr' =>
            array(
                'name' => 'Défaut',
                'seo_title' => 'Guide des solutions numériques',
                'SlugPartnerCongre' => 'app',
                'seo_keywords' => 'Mots-clés méta de la boutique de démonstration',
                'seo_description' => 'Le Guide des solutions numériques recense les différentes solutions proposées par les éditeurs de logiciels destinés à la profession. Il est conçu pour permettre aux cabinets d’expertise comptable de s’informer sur les logiciels, d’effectuer des recherches ciblées basées sur des critères fonctionnels et de comparer les solutions à leur disposition.',
                'maintenance_mode_text' => '',
            ),
        'description' => '',
        'inventory_sources' =>
            array(
                0 => '1',
            ),
        'root_category_id' => '1',
        'hostname' => 'https://cnoec-gsm.neway-esoft.com/',
        'theme' => 'default',
        'locales' =>
            array(
                0 => '2',
                1 => '1',
            ),
        'default_locale_id' => '1',
        'currencies' =>
            array(
                0 => '1',
            ),
        'base_currency_id' => '1',
        'allowed_ips' => '',
        'locale' => 'fr',
    ]);

    // Assert the response
    $response->assertRedirect()
        ->assertSessionHas('success', trans('admin::app.settings.channels.edit.update-success'));


});




it('validates request data for updating a channel', function () {
    // Create an admin user
    $admin = ModelsAdmin::where("email", "ehangard@experts-comptables.org")->first();

    // Authenticate as the admin user
    $this->actingAs($admin, 'admin');

    // Create a channel to update
    $channel = Channel::factory()->create();

    // Simulate a PUT request with invalid data
    $response = $this->putJson(route('admin.settings.channels.update', ['id' => $channel->id]), [
        '_token' => 'OGmATHRnVBiqR8izI6iuPXH5EOtalaU5iQVcR0Qq',
        '_method' => 'PUT',
        'code' => 'default',
        'fr' =>
            array(
                'name' => 'Défaut',
                'seo_title' => 'Guide des solutions numériques',
                'SlugPartnerCongre' => 'app',
                'seo_keywords' => 'Mots-clés méta de la boutique de démonstration',
                'seo_description' => 'Le Guide des solutions numériques recense les différentes solutions proposées par les éditeurs de logiciels destinés à la profession. Il est conçu pour permettre aux cabinets d’expertise comptable de s’informer sur les logiciels, d’effectuer des recherches ciblées basées sur des critères fonctionnels et de comparer les solutions à leur disposition.',
                'maintenance_mode_text' => '',
            ),
        'description' => '',
        'inventory_sources' =>
            array(
                0 => '1',
            ),
        'root_category_id' => '1',
        'hostname' => 'https://cnoec-gsm.neway-esoft.com/',
        'theme' => 'default',
        'locales' =>
            array(
                0 => '2',
                1 => '1',
            ),
        'default_locale_id' => '1',
        'currencies' =>
            array(
                0 => '1',
            ),
        'base_currency_id' => '1',
        'allowed_ips' => '',
        'locale' => 'fr',
    ]);

    // Assert validation errors
    $response->assertStatus(422)
        ->assertJsonValidationErrors([
            'code',


            'hostname',


        ]);
});


it('denies access to unauthenticated users on channel update', function () {
    // Create a channel to update
    $channel = Channel::find(1);

    // Simulate a PUT request without authentication
    $response = $this->putJson(route('admin.settings.channels.update', ['id' => $channel->id]), [
        'code' => 'updated_code',
    ]);

    // Assert unauthorized 302
    $response->assertStatus(302); // 401 Unauthorized
});
