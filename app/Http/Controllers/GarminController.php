<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class GarminController extends Controller
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct()
    {
        $this->clientId = config('services.garmin.client_id');
        $this->clientSecret = config('services.garmin.client_secret');
        $this->redirectUri = config('services.garmin.redirect_uri');
    }

    public function connect()
    {
        $state = bin2hex(random_bytes(16));
        session(['garmin_state' => $state]);

        $url = "https://connect.garmin.com/oauthConfirm";
        $params = [
            'client_id' => $this->clientId,
            'response_type' => 'code',
            'redirect_uri' => $this->redirectUri,
            'state' => $state,
            'scope' => 'activity:read,heart_rate:read'
        ];

        return redirect($url . '?' . http_build_query($params));
    }

    public function callback(Request $request)
    {
        if ($request->state !== session('garmin_state')) {
            return redirect()->route('home')->with('error', 'Invalid state parameter');
        }

        $code = $request->code;

        $response = Http::asForm()->post('https://connectapi.garmin.com/oauth-service/oauth/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirectUri,
        ]);

        if ($response->failed()) {
            return redirect()->route('home')->with('error', 'Failed to obtain access token');
        }

        $tokenData = $response->json();

        // Store the token data in your database
        $user = auth()->user();
        $user->garmin_token = $tokenData['access_token'];
        $user->garmin_refresh_token = $tokenData['refresh_token'];
        $user->garmin_token_expires_at = now()->addSeconds($tokenData['expires_in']);
        $user->save();

        return redirect()->route('home')->with('success', 'Garmin device connected successfully');
    }

    public function getData()
    {
        $user = auth()->user();

        if (!$user->garmin_token || now()->gte($user->garmin_token_expires_at)) {
            // Token is missing or expired, refresh it
            $this->refreshToken($user);
        }

        // Make API calls to Garmin to get health data
        // This is a placeholder and needs to be implemented based on Garmin's API documentation
        $response = Http::withToken($user->garmin_token)
            ->get('https://api.garmin.com/wellness-api/rest/dailies');

        if ($response->failed()) {
            return redirect()->route('home')->with('error', 'Failed to fetch Garmin data');
        }

        $data = $response->json();

        // Process and store the data as needed
        // ...

        return redirect()->route('home')->with('success', 'Garmin data updated');
    }

    private function refreshToken(User $user)
    {
        $response = Http::asForm()->post('https://connectapi.garmin.com/oauth-service/oauth/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'refresh_token',
            'refresh_token' => $user->garmin_refresh_token,
        ]);

        if ($response->failed()) {
            throw new \Exception('Failed to refresh Garmin token');
        }

        $tokenData = $response->json();

        $user->garmin_token = $tokenData['access_token'];
        $user->garmin_refresh_token = $tokenData['refresh_token'];
        $user->garmin_token_expires_at = now()->addSeconds($tokenData['expires_in']);
        $user->save();
    }
}