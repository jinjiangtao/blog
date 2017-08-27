<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function callback(Request $request)
    {
         $httpClient = new Client();

         $response = $httpClient->post('http://test.lblog.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '3',
                'client_secret' => 'Kq2hiNQU0yjRK874JYTrO5DYUS0xcDSt2GtcLFkI',
                'redirect_uri' => 'http://test.oauth.com/oauth/callback',
                'code' => $request->code,
            ],
        ]);

        //$body = $response->getBody();

        $data =  json_decode((string) $response->getBody(), true);
        //return $data;

        $access_token = $data['access_token'];

        $result = $httpClient->request('GET', 'http://test.lblog.com/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$access_token,
            ],
        ]);

        return json_decode((string) $result->getBody(), true);
    }

}













