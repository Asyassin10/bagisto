<?php

use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Societe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Webkul\Admin\Http\Requests\ProductForm;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Product\Models\Product;
use Webkul\User\Models\Admin as ModelsAdmin;

function actingAsAdmin()
{
    $admin = ModelsAdmin::factory()->create(); // Create an admin user using a factory
    Auth::guard('admin')->login($admin); // Log in the created admin user
}

beforeEach(function () {
    actingAsAdmin();
});


it(description: 'test if logiciel can be created successfully', closure: function () {

    $response = $this->postJson(route('admin.catalog.products.store'), [
        'attribute_family_id' => 1,
        'super_attributes' => [['key' => 'value']],
    ]);

    $response->assertStatus(200);
});
it(description: 'test if logiciel cant be created successfully with validation errors', closure: function () {
    Event::fake();

    $response = $this->postJson(route(name: 'admin.catalog.products.store'), []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['attribute_family_id']);
});
it(description: 'test if logiciel can be created successfully with redirect url', closure: function () {

    $response = $this->postJson(route('admin.catalog.products.store'), [
        'attribute_family_id' => 1,
        'super_attributes' => [['key' => 'value']],
    ]);



    $response->assertJsonStructure([
        'data' => [
            'redirect_url',
        ],
    ]);
});



it('dispatches events during product creation', function () {
    Event::fake();




    $response = $this->postJson(route('admin.catalog.products.store'), [
        'attribute_family_id' => 1,
        'super_attributes' => [['key' => 'value']],
    ]);

    $response->assertStatus(200);

    Event::assertDispatched('catalog.product.create.before');
    Event::assertDispatched('catalog.product.create.after');
});


// ------------- edit product


it('validates required fields in updating the product test response status', closure: function () {
    $data = []; // Empty data

    $response = $this->putJson(route('admin.catalog.products.update', parameters: ["id" => 88]), [
    ]);
    $response->assertStatus(422);


});



it('validates required fields in updating the product test response structure', closure: function () {
    $data = []; // Empty data

    $response = $this->putJson(route('admin.catalog.products.update', parameters: ["id" => 88]), [
    ]);
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['url_key', 'description']);

    /*   $validator = Validator::make(data: $data, rules: $request->rules());

      expect($validator->fails())->toBeTrue();
      expect($validator->errors()->get('url_key'))->toContain(__('validation.required', ['attribute' => 'url key']));
      expect($validator->errors()->get('description'))->toContain(__('validation.required', ['attribute' => 'description'])); */
});




it('test if product can be edited successfully', closure: function () {
    $response = $this->putJson(route('admin.catalog.products.update', parameters: ["id" => 88]), [
        "url_key" => "url_key",
        "description" => "description",
        "Wxtwu0nIsEmMO6sR" => "0",
        "FS8qVUzeFCkd08Z0" => "Android",
        "YhrTRm8vMc0tgupD" => "YhrTRm8vMc0tgupD",
        "ZNwf9vVXUazSijku" => "ZNwf9vVXUazSijku",
        "nZaCNhyNNt0IejUK" => "YhrTRm8vMc0tgupD",
        "vG5y7lGpgokBDOKM" => "0",
        "s6ITTzq0ZauLBSZb" => "s6ITTzq0ZauLBSZb",
        "AbS6fp7pVKD3UVtT" => "AbS6fp7pVKD3UVtT",
        "GO9Rv5ZhKGTRheNb" => "0",
        "name" => "name",
        "Ld4p6PVLD2bxYKbp" => "oui",
        "1qGDK0xPVpwCgSq4" => "1qGDK0xPVpwCgSq4"
    ]);
    $response->assertRedirect(route('admin.catalog.products.index')); // Ensure redirect happens

});
it('test redirection in some casess', closure: function () {
    $response = $this->putJson(route('admin.catalog.products.update', parameters: ["id" => 300]), [
        "url_key" => "url_key",
        "description" => "description",
        "Wxtwu0nIsEmMO6sR" => "0",
        "FS8qVUzeFCkd08Z0" => "Android",
        "YhrTRm8vMc0tgupD" => "YhrTRm8vMc0tgupD",
        "ZNwf9vVXUazSijku" => "ZNwf9vVXUazSijku",
        "ZIPL4MS7aKmxMSrg" => "ZIPL4MS7aKmxMSrg",
        "tf7LZa28WDA7zaIs" => "tf7LZa28WDA7zaIs",
        "wnK5qVxAZKOhj9zN" => "wnK5qVxAZKOhj9zN",
        "ccx" => "ccx",
        "RTi8hYxPmfSmQT86" => "RTi8hYxPmfSmQT86",
        "KqU1t7Fusp5zHgvi" => "KqU1t7Fusp5zHgvi",
        "cczwwa" => "cczwwa",
        "v95uZAw5VuUfhryj" => "v95uZAw5VuUfhryj",
        "a3jX7BrdyaBN2hDV" => "a3jX7BrdyaBN2hDV",
        "eqQf5c4KXuKTJX3h" => "eqQf5c4KXuKTJX3h",
        "7SO8ei2gnQ0Vpi19" => "7SO8ei2gnQ0Vpi19",
        "WIToK1iwCz7wvB2s" => "WIToK1iwCz7wvB2s",
        "iC1BwXEXmCNsEmGK" => "iC1BwXEXmCNsEmGK",
        "8Q26ojJYXqdlYBVy" => "8Q26ojJYXqdlYBVy",
        "CaoKSpVMsaLfBNFu" => "CaoKSpVMsaLfBNFu",
        "w4OOTLKdpS4gSkJH" => "w4OOTLKdpS4gSkJH",
        "oD3NlULDTdh9v5my" => "oD3NlULDTdh9v5my",
        "ccccsex" => "ccccsex",
        "b6bUbOKy6b5cL9qn" => "b6bUbOKy6b5cL9qn",
        "At5xxerFKlc6UfkR" => "At5xxerFKlc6UfkR",
        "nZaCNhyNNt0IejUK" => "YhrTRm8vMc0tgupD",
        "vG5y7lGpgokBDOKM" => "0",
        "s6ITTzq0ZauLBSZb" => "s6ITTzq0ZauLBSZb",
        "AbS6fp7pVKD3UVtT" => "AbS6fp7pVKD3UVtT",
        "GO9Rv5ZhKGTRheNb" => "0",
        "name" => "name",
        "Ld4p6PVLD2bxYKbp" => "oui",
        'status' => 0,
        'just_ignore_status' => 'non',
        'should_validate' => 'yes',
        "1qGDK0xPVpwCgSq4" => "1qGDK0xPVpwCgSq4"
    ]);
    $response->assertSessionHas('show_modal', 'ok');

});


// ------------------- attribute familly



it(description: 'stores a new attribute family and redirects', closure: function () {
    // Arrange: Prepare the data
    $data = [
        'name' => 'Family Name',
        'attribute_groups' => [
            ['code' => 'code1', 'name' => 'Group 1', 'column' => 1],
            ['code' => 'code2', 'name' => 'Group 2', 'column' => 2],
        ],
    ];

    // Mock the event dispatching
    Event::fake();

    // Act: Make the request to store the new attribute family
    $response = $this->postJson(route('admin.catalog.families.store'), $data);

    // Assert: Check that the "before" event was dispatched
    Event::assertDispatched(event: 'catalog.attribute_family.create.before');



    // Assert: Check that the attribute family was created in the database (adjust as needed)
    $this->assertDatabaseHas('attribute_families', [
        'name' => $data['name'],
    ]);


    // Assert: Ensure the user is redirected to the families index route
    $response->assertRedirect(route('admin.catalog.families.index'));
});


it('returns validation errors when the data is invalid', function () {
    // Arrange: Prepare invalid data (e.g., missing required fields)
    $data = [
        'name' => '', // 'name' is required but left empty
        'attribute_groups' => [
            ['code' => '', 'name' => '', 'column' => 3], // 'code' and 'name' are required, 'column' must be 1 or 2
        ],
    ];

    // Act: Make the request to store the new attribute family
    $response = $this->postJson(route('admin.catalog.families.store'), $data);

    // Assert: Check if validation errors are returned
    $response->assertStatus(422); // 422 is the status code for unprocessable entity (validation error)

    // Assert: Check that the validation error message for 'name' is correct
    $response->assertJsonValidationErrors(['name']);

    // Assert: Check that the validation error messages for 'attribute_groups.*.code' and 'attribute_groups.*.name' are correct
    $response->assertJsonValidationErrors(['attribute_groups.0.code', 'attribute_groups.0.name']);

    // Assert: Check that the validation error message for 'attribute_groups.*.column' is correct (should be 1 or 2)
    $response->assertJsonValidationErrors(['attribute_groups.0.column']);
});




it('updates an existing attribute family and redirects', function () {



    $data = [
        'name' => 'Updated Name'
    ];



    // Act: Perform the update request
    $response = $this->putJson(route('admin.catalog.families.update', ['id' => 8]), $data);



    // Assert: Check if the attribute family was updated in the database
    $this->assertDatabaseHas('attribute_families', [
        'id' => 8,
        'name' => $data['name'], // Ensure the name was updated
    ]);


    // Assert: Ensure the user is redirected to the families index route
    $response->assertRedirect(route(name: 'admin.catalog.families.index'));
});


// -----------------------soiete

use function Pest\Laravel\{get, post};



it('can display the societe update page', function () {


    $societe = Societe::create([
        'nom' => 'Tech Solutions Inc.', // Company name
        'adresse' => '1234 Innovation Blvd, Tech City', // Company address
        'site_web' => 'https://www.techsolutions.com', // Company website
        'siren' => '12345678901234', // Siren number
        'contact_nom' => 'John', // Contact person last name
        'contact_prenom' => 'Doe', // Contact person first name
        'contact_fonction' => 'CEO', // Contact function
        'contact_telephone' => '+1234567890', // Contact phone number
        'contact_email' => 'johndoe@techsolutions.com', // Contact email
        'logo' => 'path/to/logo.jpg', // Path to logo image
        'description' => 'Tech Solutions Inc. provides innovative technology solutions to businesses worldwide.', // Company description
        'admin_id' => auth()->id(), // Admin ID (using authenticated user ID)
    ]);


    $response = get(route('admin.societe.index'));

    $response->assertStatus(200);
    $response->assertViewIs('admin::societe.update');
});


use function Pest\Faker\fake;


it('can update societe information', function () {

    $data = [
        'nom' => fake()->company,
        'adresse' => fake()->streetAddress,
        'site_web' => fake()->url,
        'siren' => fake()->numerify('###########'),
        'contact_nom' => fake()->firstName,
        'contact_prenom' => fake()->lastName,
        'contact_fonction' => fake()->jobTitle,
        'contact_telephone' => fake()->phoneNumber,
        'contact_email' => fake()->safeEmail,
        'description' => fake()->paragraph,
        'ville' => fake()->city,
        'code_postal' => fake()->postcode,
    ];

    $response = post(route('admin.societe.update'), $data);
    // dd($response->getContent());
    $response->assertRedirect(route('admin.societe.index'));
    $response->assertSessionHas('success', 'Société mise à jour avec succès');

    // Assert that the data was correctly updated in the database
    $this->assertDatabaseHas('societes', $data);
});
