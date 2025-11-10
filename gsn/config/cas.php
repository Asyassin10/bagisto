<?php

return [
    'cas_hostname' => env('CAS_HOST', ''),
    'cas_uri' => '/cas',
    'cas_port' => 443,
    'cas_version' => '2.0',
    'server_login_uri' => '/cas/login',
    'server_logout_uri' => '/cas/logout',
    'cas_debug' => true,
    'cas_verbose_errors' => true,
    'cas_service' => env('APP_URL', '') . '/cas/callback',
    'cas_redirect_path' => env('APP_URL', '') . '/cas/callback',
    'cas_validate_cn' => false,
    'cas_login_url' => env('CAS_HOST', '') . '/cas/login',
    'cas_logout_url' => env('CAS_HOST', '') . '/cas/logout',
    'cas_logout_redirect' =>  env('CAS_HOST', '') . '/cas/logout',
    'cas_enable_saml' => false, // Assurez-vous que SAML est désactivé si vous utilisez CAS uniquement
    'cas_cert' => false,
    'cas_proxy' => false,
    'cas_ignore_cert' => true,
];
