<?php

namespace Tests\Feature;

use App\Societe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Webkul\User\Models\Admin as ModelsAdmin;

class AdminSocieteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_societe_route_behaves_correctly()
    {
        $admin = ModelsAdmin::where("email", "jmenier@experts-comptables.org")->first();
        $this->actingAs($admin, 'admin');

        // Try to get the first Societe, or use a non-existing ID
        $societe = Societe::first();

        $societeId = $societe?->id ?? 1002020;

        // Send GET request
        $response = $this->get("/admin/societes/delete/{$societeId}");

        if ($societe) {
            // Expect redirect and success session
            $response->assertRedirect(route('admin::societe-admin.index'));
            $response->assertSessionHas('success', 'La société a été supprimée avec succès.');

            // Check the record is deleted
            $this->assertDatabaseMissing('societes', ['id' => $societeId]);
        } else {
            // If Societe doesn't exist, expect 404
            $response->assertStatus(404);
        }
    }
}
