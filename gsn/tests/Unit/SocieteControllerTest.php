<?php

namespace Tests\Unit\Admin\Http\Controllers\Societe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Admin\Http\Controllers\Societe\SocieteController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Societe;
use Webkul\User\Models\Admin;

class SocieteControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testIndex()
    {
        $admin = Admin::factory()->create();
        $this->actingAs($admin, 'admin');

        $societe = Societe::factory()->create(['admin_id' => $admin->id]);

        $response = $this->get(route('admin.societe.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin::societe.update');
        $response->assertViewHas('societe', $societe);
    }

    public function testUpdate()
    {
        $admin = Admin::factory()->create();
        $this->actingAs($admin, 'admin');

        $societe = Societe::factory()->create(['admin_id' => $admin->id]);

        $data = [
            'nom' => $this->faker->company,
            'adresse' => $this->faker->streetAddress,
            'site_web' => $this->faker->url,
            'siren' => $this->faker->numerify('###########'),
            'contact_nom' => $this->faker->firstName,
            'contact_prenom' => $this->faker->lastName,
            'contact_fonction' => $this->faker->jobTitle,
            'contact_telephone' => $this->faker->phoneNumber,
            'contact_email' => $this->faker->safeEmail,
            'description' => $this->faker->paragraph,
            'ville' => $this->faker->city,
            'code_postal' => $this->faker->postcode,
        ];

        $response = $this->put(route('admin.societe.update'), $data);
        $response->assertRedirect(route('admin.societe.index'));
        $response->assertSessionHas('success', 'Société mise à jour avec succès');

        $this->assertDatabaseHas('societes', $data);
    }

    public function testUpdateWithLogo()
    {
        $admin = Admin::factory()->create();
        $this->actingAs($admin, 'admin');

        $societe = Societe::factory()->create(['admin_id' => $admin->id]);

        $data = [
            'nom' => $this->faker->company,
            'adresse' => $this->faker->streetAddress,
            'site_web' => $this->faker->url,
            'siren' => $this->faker->numerify('###########'),
            'contact_nom' => $this->faker->firstName,
            'contact_prenom' => $this->faker->lastName,
            'contact_fonction' => $this->faker->jobTitle,
            'contact_telephone' => $this->faker->phoneNumber,
            'contact_email' => $this->faker->safeEmail,
            'description' => $this->faker->paragraph,
            'ville' => $this->faker->city,
            'code_postal' => $this->faker->postcode,
            'logo' => UploadedFile::fake()->image('logo.png', 100, 100),
        ];

        $response = $this->put(route('admin.societe.update'), $data);
        $response->assertRedirect(route('admin.societe.index'));
        $response->assertSessionHas('success', 'Société mise à jour avec succès');

        $this->assertDatabaseHas('societes', array_diff_key($data, ['logo' => null]));
        $this->assertNotNull(Societe::where('admin_id', $admin->id)->first()->logo);
    }
}
