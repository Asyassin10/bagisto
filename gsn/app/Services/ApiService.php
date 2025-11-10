<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    /**
     * Check if the user with the given UCI is authorized.
     *
     * @param  string  $uci  The unique CSOEC ID of the user.
     * @return bool  True if authorized, false otherwise.
     */
    public static function isAuthorized(string $uci): bool
    {
        // Retrieve the base URL and token from environment variables
        $endpoint = env('GSM_LINK');
        $authToken = env('TOKEN_CNOEC');

        // Perform the HTTP GET request with the auth token in the headers
        $response = Http::withHeaders([
            'auth_token' => $authToken
        ])->get("{$endpoint}/isComparateurAuthorized/{$uci}");

        // Check if the response status is 200 OK
        if ($response->successful()) {
            // Decode JSON response
            $data = $response->json(); // Directly decode JSON into an associative array

            // Check if 'nom' key is present in the response
            return isset($data['nom']);
        }

        // Return false for any other status codes or errors
        return false;
    }
    public static function getUserDetails($uci): array
    {
        $endpoint = env('GSM_LINK');
        $authToken = env('TOKEN_CNOEC');

        $response = Http::withHeaders([
            'auth_token' => $authToken
        ])->get("{$endpoint}/isComparateurAuthorized/{$uci}");

        if ($response->status() === 200) {
            $data = $response->json();
            return [
                'nom' => $data['nom'] ?? 'Utilisateur inconnu',
                'prenom' => $data['prenom'] ?? ''
            ];
        }

        return [];
    }
}
