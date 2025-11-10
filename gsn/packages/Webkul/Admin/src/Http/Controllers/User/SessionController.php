<?php

namespace Webkul\Admin\Http\Controllers\User;

use Illuminate\Support\Facades\URL;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\User\Models\Admin;
use Illuminate\Http\Request;
use App\Notifications\AdminVerifyEmailNotification; // Import your notification class


class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }

        if (strpos(url()->previous(), 'admin') !== false) {
            $intendedUrl = url()->previous();
        } else {
            $intendedUrl = route('admin.dashboard.index');
        }

        session()->put('url.intended', $intendedUrl);

        return view('admin::users.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = request('remember');

        if (! auth()->guard('admin')->attempt(request(['email', 'password']), $remember)) {
            session()->flash('error', trans('admin::app.settings.users.login-error'));

            return redirect()->back();
        }
        $user = auth()->guard('admin')->user();

        if (! auth()->guard('admin')->user()->status) {
            session()->flash('warning', trans('admin::app.settings.users.activate-warning'));

            auth()->guard('admin')->logout();

            return redirect()->route('admin.session.create');
        }
        // Check if the email is verified
        if (!$user->is_valid) {
            session()->flash('danger', "Votre email n'a pas encore été vérifié. Veuillez vérifier votre email ou <br> <a href='" . route('admin.resend.verification', ['email' => $user->email]) . "' class='text-blue-600 hover:underline'>renvoyer l'email de vérification</a>.");

            auth()->guard('admin')->logout();
            return redirect()->route('admin.session.create');
        }
        if ($user->role_id == 1) {
            return redirect()->route('admin.dashboard.index');
        } else {
            return redirect()->route('admin.catalog.products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.session.create');
    }
    public function resendVerification(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin->is_valid) {
            return redirect()->route('admin.session.create')->with('info', 'Votre email est déjà vérifié.');
        }
        // Generate a new verification URL
        $admin->notify(new AdminVerifyEmailNotification());
        return redirect()->route('admin.session.create')->with('success', "email de vérification a été renvoyé. Veuillez vérifier votre boîte de réception.");
    }
}
