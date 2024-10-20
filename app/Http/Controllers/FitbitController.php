<?php

namespace App\Http\Controllers;

use App\Models\Fitbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FitbitController extends Controller
{
    private $clientId = 'your_client_id';
    private $clientSecret = 'your_client_secret';
    private $redirectUri = 'http://localhost/fitbit/callback';
    private $simulatorUrl = 'http://host.docker.internal:8080';  // Adjust port if needed

    public function connect()
    {
        $url = $this->simulatorUrl . "/oauth2/authorize?response_type=code&client_id={$this->clientId}&redirect_uri={$this->redirectUri}&scope=heartrate";
        return redirect($url);
    }

    public function callback(Request $request)
    {
        $code = $request->code;

        $response = Http::post($this->simulatorUrl . '/oauth2/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->redirectUri,
        ]);

        $data = $response->json();

        Fitbit::updateOrCreate(
            ['user_id' => auth()->id()],
            ['token' => $data['access_token']]
        );

        return redirect('/dashboard')->with('success', 'Fitbit connected successfully!');
    }

    public function getHeartRate()
    {
        $fitbit = Fitbit::where('user_id', auth()->id())->firstOrFail();

        $response = Http::withToken($fitbit->token)
            ->get($this->simulatorUrl . '/1/user/-/activities/heart/date/today/1d.json');

        return $response->json();
    }
}