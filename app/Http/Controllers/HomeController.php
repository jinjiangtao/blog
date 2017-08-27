<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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

    public function user(Request $request)
    {
        //$header = $request->headers;
        //return response()->json($header);

        //$user = Auth::user();
        //return response()->json(['success' => $user], '200');

        return ['jin'=>'ss', 'ss'=>'s'];
    }

    public function test()
    {
        echo "123sss";
    }
}













