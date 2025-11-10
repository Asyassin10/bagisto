<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Subfission\Cas\Facades\Cas;
use App\Http\Controllers\AuthController;

class AuthControllerTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new AuthController();
    }

    /** @test */
    public function it_redirects_to_cas_login_on_login()
    {
        // Arrange
        Config::set('cas.cas_hostname', 'example.com');
        Config::set('cas.server_login_uri', '/cas/login');
        Config::set('cas.cas_service', 'http://localhost/callback');

        // Act
        $response = $this->controller->login();

        // Assert
        $response->assertRedirect('https://example.com/cas/login?service=http%3A%2F%2Flocalhost%2Fcallback');
    }

    /** @test */
    public function it_handles_successful_cas_callback()
    {
        // Arrange
        Cas::shouldReceive('isAuthenticated')->andReturn(true);

        // Act
        $request = Request::create('/cas/callback', 'GET');
        $response = $this->controller->handleCasCallback($request);

        // Assert
        $response->assertRedirect('/');
    }

    /** @test */
    public function it_handles_failed_cas_callback()
    {
        // Arrange
        Cas::shouldReceive('isAuthenticated')->andReturn(false);

        // Act
        $request = Request::create('/cas/callback', 'GET');
        $response = $this->controller->handleCasCallback($request);

        // Assert
        $response->assertRedirect('/cas/login');
        $response->assertSessionHas('error', 'CAS authentication failed');
    }

    /** @test */
    public function it_logs_out_and_redirects_to_cas_logout()
    {
        // Arrange
        Config::set('cas.cas_logout_url', 'example.com/logout');
        Auth::shouldReceive('logout')->once();
        Session::shouldReceive('invalidate')->once();
        Session::shouldReceive('regenerateToken')->once();
        Cookie::shouldReceive('queue')->times(2); // Assuming there are two cookies

        // Simulate existing cookies
        $request = Request::create('/logout', 'POST');
        $request->cookies->set('cookie1', 'value1');
        $request->cookies->set('cookie2', 'value2');

        // Act
        $response = $this->controller->logout($request);

        // Assert
        $response->assertRedirect('https://example.com/logout');
        $this->assertCount(0, $request->cookies->keys()); // Ensure cookies are forgotten
    }
}
