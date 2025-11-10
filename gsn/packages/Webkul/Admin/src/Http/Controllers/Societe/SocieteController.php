<?php

namespace Webkul\Admin\Http\Controllers\Societe;

use App\Societe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Webkul\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SocieteController extends Controller
{
    public function index() {
        $societe = Societe::where('admin_id', Auth::guard('admin')->id())->first();
        return view('admin::societe.update', compact('societe'));
    }

    public function update(Request $request) {
        $adminId = Auth::guard('admin')->id();

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'site_web' => 'nullable|string|max:255',
            'siren' => 'required|string|max:255',
            'contact_nom' => 'nullable|string|max:255',
            'contact_prenom' => 'nullable|string|max:255',
            'contact_fonction' => 'nullable|string|max:255',
            'contact_telephone' => 'nullable|string|max:255',
            'contact_email' => 'required|string|email|max:255',
            'logo' => 'nullable|file|image|max:2048',
            'description' => 'nullable|string|max:1000',
            'ville' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('logo')) {
            // Handle logo upload
            $logo = $request->file('logo');
            $logoExtension = $logo->getClientOriginalExtension();
            $logoName = Str::random(10) . '.' . $logoExtension; // Generate a unique name
            $logoPath = public_path('logos');

            // Create directory if it does not exist
            if (!File::exists($logoPath)) {
                File::makeDirectory($logoPath, 0755, true);
            }

            // Move the logo file to the public directory
            $logo->move($logoPath, $logoName);

            // Update the logo path in the validated data
            $validatedData['logo'] = 'logos/' . $logoName;
        }

        // Ensure admin_id is part of the data
        $validatedData['admin_id'] = $adminId;

        // Use updateOrCreate to update or create the Societe record
        Societe::updateOrCreate(
            ['admin_id' => $adminId], // Attributes to search for
            $validatedData // Attributes to update
        );

        return redirect()->route("admin.societe.index")->with('success', 'Société mise à jour avec succès');
    }
}
