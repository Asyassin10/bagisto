<?php

namespace Webkul\Admin\Http\Controllers\User;

use App\Societe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\User\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\AdminVerifyEmailNotification; // Import your notification class
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



class AccountController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->guard('admin')->user();

        return view('admin::account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $user = auth()->guard('admin')->user();

        $this->validate(request(), [
            'name'             => 'required',
            'email'            => 'email|unique:admins,email,' . $user->id,
            'password'         => 'nullable|min:6|confirmed',
            'current_password' => 'required|min:6',
            'image.*'          => 'nullable|mimes:bmp,jpeg,jpg,png,webp',
        ]);

        $data = request()->only([
            'name',
            'email',
            'password',
            'password_confirmation',
            'current_password',
            'image',
        ]);

        if (! Hash::check($data['current_password'], $user->password)) {
            session()->flash('warning', trans('admin::app.account.edit.invalid-password'));

            return redirect()->back();
        }

        $isPasswordChanged = false;

        if (! $data['password']) {
            unset($data['password']);
        } else {
            $isPasswordChanged = true;

            $data['password'] = bcrypt($data['password']);
        }

        if (request()->hasFile('image')) {
            $data['image'] = current(request()->file('image'))->store('admins/' . $user->id);
        } else {
            if (! isset($data['image'])) {
                if (! empty($data['image'])) {
                    Storage::delete($user->image);
                }

                $data['image'] = null;
            } else {
                $data['image'] = $user->image;
            }
        }

        $user->update($data);

        if ($isPasswordChanged) {
            Event::dispatch('admin.password.update.after', $user);
        }

        session()->flash('success', trans('admin::app.account.edit.update-success'));

        return back();
    }
    public function redirectToRegister()
    {
        return abort(404);
        /* if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return view("admin::users.register.sing-up"); */
    }
    public function register(Request $request)
    {

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'nom_societe' => 'required|string|max:255',
            'adresse_societe' => 'required|string|max:255',
            'siren_societe' => 'required|numeric',
            'site_web' => 'required|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'contact_prenom' => 'required|string|max:255',
            'contact_fonction' => 'required|string|max:255',
            'contact_telephone' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:1000',
        ]);

        // Create the admin user
        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'api_token' => Str::random(80),
            'status'     => 1,
            'role_id'    => 3,
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
        }

        // Create the company (société) and associate it with the admin
        Societe::create([
            'nom' => $request->input('nom_societe'),
            'adresse' => $request->input('adresse_societe'),
            'site_web' => $request->input('site_web'),
            'siren' => $request->input('siren_societe'),
            'contact_nom' => $request->input('contact_nom'),
            'contact_prenom' => $request->input('contact_prenom'),
            'contact_fonction' => $request->input('contact_fonction'),
            'contact_telephone' => $request->input('contact_telephone'),
            'contact_email' => $request->input('contact_email'),
            'logo' => $logoPath,
            'description' => $request->input('description'),
            'admin_id' => $admin->id,
        ]);
        // Send email verification
        $admin->notify(new AdminVerifyEmailNotification());
        return redirect()->route('admin.session.create')->with('success', 'Registration successful!');
    }

    public function verify(Request $request, $id, $hash)
    {
        $user = Admin::findOrFail($id);

        // Check if the email is already verified
        if ($user->is_valid) {
            return redirect()->route('admin.session.create')->with('info', 'Your email is already verified.');
        }

        if (! hash_equals((string) $hash, (string) sha1($user->email))) {
            throw new ValidationException(__('The verification link is invalid.'));
        }

        // Check if the URL has expired
        /*  if (! $request->hasValidSignature() || $request->timestamp > Carbon::now()->addMinutes(-10)) {
            throw new ValidationException(__('The verification link has expired.'));
        } */

        if ($user->markEmailAsVerified()) {
            // Update the is_valid column to true
            $user->update(['is_valid' => true]);

            event(new Verified($user));
        }

        return redirect()->route('admin.session.create')->with('success', 'Your email has been verified!');
    }
}
