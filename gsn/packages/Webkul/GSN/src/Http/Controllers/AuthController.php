<?php

namespace Webkul\GSN\Http\Controllers;

use Auth;
use Cookie;
use Illuminate\Http\Request;
use Session;
use Subfission\Cas\Facades\Cas;

class AuthController extends Controller
{
    public function login()
    {
        $casHost = config('cas.cas_hostname');
        $casUri = config('cas.cas_uri');
        $loginUri = config('cas.server_login_uri');
        $service = config('cas.cas_service');

        $loginUrl = "https://{$casHost}{$loginUri}?service=" . urlencode($service);

        return redirect()->away($loginUrl);
    }

    public function handleCasCallback(Request $request)
    {
            // Handle CAS callback
    if (Cas::isAuthenticated()) {
        // Redirect to the desired page after successful authentication
        return redirect('/');
    } else {
        // Handle authentication failure
        return redirect('/cas/login')->with('error', 'CAS authentication failed');
    }
    }

    public function logout(Request $request)
    {
        $cas = config('cas.cas_logout_url'); // Ensure this is set in your config
        $logoutUrl = 'https://' . $cas;
        // Invalidate the Laravel session
        // Invalidate the Laravel session
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        // Redirect to CAS logout URL
        //
        // Clear all session data
        Session::flush();

        // Clear all cookies
        $cookies = $request->cookies->keys();
        foreach ($cookies as $cookie) {
            // Expire each cookie
            Cookie::queue(Cookie::forget($cookie));
        }
        return redirect()->away($logoutUrl);
    }

}
