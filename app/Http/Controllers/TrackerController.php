<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use djchen\OAuth2\Client\Provider\Fitbit;

class TrackerController extends Controller
{
    public function index()
    {
        return view("dashboard.tracker.index");
    }

    public function connectFitbit(Request $request)
    {
        $fitbit = new Fitbit([
            'clientId'     => env('FITBIT_CLIENT_ID'),
            'clientSecret' => env('FITBIT_CLIENT_SECRET'),
            'redirectUri'  => route('fitbit.callback'),
        ]);

        if (!$request->has('code')) {
            $authorizationUrl = $fitbit->getAuthorizationUrl();
            session(['oauth2state' => $fitbit->getState()]);
            return redirect()->away($authorizationUrl);
        } else {
            $token = $fitbit->getAccessToken('authorization_code', [
                'code' => $request->code,
            ]);

            // Store the access token in the session or database for future API requests
            session(['fitbit_access_token' => $token->getToken()]);

            return redirect()->route('tracker.index')->with('success', 'Fitbit connected successfully!');
        }
    }

    public function fitbitCallback(Request $request)
    {
        // Handle the callback from Fitbit
        return $this->connectFitbit($request);
    }

    
}