<?php

namespace Webkul\Admin\Http\Controllers\Societe;

use App\Societe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Webkul\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Webkul\Product\Models\Product;
use Webkul\User\Models\Admin;

class AdminSocieteController extends Controller
{

    public function __construct()
    {
        // Check if the authenticated user has role_id = 1
        $this->middleware(function ($request, $next) {
            $authUser = auth()->guard('admin')->user();

            $user = $authUser ? Admin::find($authUser->id) : null;

            if ($user || $user->role_id == 1) {
                // Redirect or abort if the user doesn't have the required role
                return $next($request);
            }
            return abort(404);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sortOrder = $request->query('sort_order', 'asc');
        //return $sortOrder;
        $societes = Societe::query()
            ->orderBy('nom', $sortOrder)
            ->when($search, function ($query, $search) use ($sortOrder) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('contact_email', 'like', "%{$search}%")
                    ->orWhere('adresse', 'like', "%{$search}%")
                    ->orWhere('site_web', 'like', "%{$search}%");
            })

            ->paginate(20); // Adjust the number per page as needed

        return view('admin::societe-admin.index', compact('societes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $societe = Societe::findOrFail($id);
        $admin = Admin::find($societe->admin_id);

        return view('admin::societe-admin.show', compact('societe', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $societe = Societe::findOrFail($id);
        return view('admin::societe-admin.edit', compact('societe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $societe = Societe::findOrFail($id);

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'site_web' => 'nullable|url|max:255',
            'siren' => 'nullable|string|max:255',
            'contact_nom' => 'nullable|string|max:255',
            'contact_prenom' => 'nullable|string|max:255',
            'contact_fonction' => 'nullable|string|max:255',
            'contact_telephone' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|max:255',
            'description' => 'nullable|string',
            'admin_id' => 'nullable|exists:admins,id',
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
            $data['logo'] = 'logos/' . $logoName;
        }


        $societe->update($data);

        return redirect()->route('admin::societe-admin.index')->with('success', 'Société mise à jour avec succès.');
    }
    public function deleteSociete($societe_id)
    {
        $societe = Societe::findOrFail($societe_id);
        $societe->delete();
        return redirect()->route('admin::societe-admin.index')->with('success', 'La société a été supprimée avec succès.');
    }
    public function toggleSetIsCongratePartner($societe_id)
    {
        $societe = Societe::findOrFail($societe_id);
        $societe->is_congrate_partner = !$societe->is_congrate_partner;
        $societe->save();
        $societe->refresh();
        // get products
        $admin = Admin::findOrFail($societe->admin_id);
        $products = Product::where("admin_id", $admin->id)->get();
        foreach ($products as $product) {
            $product->is_congrate_partner = $societe->is_congrate_partner;
            $product->save();
        }
        return redirect()->route('admin::societe-admin.index')->with('success', 'La société a été supprimée avec succès.');
    }
}
