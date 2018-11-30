<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
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
        if (Auth::user()->gives_gift_to !== null) {
            $givesGiftTo = User::findOrFail(Auth::user()->gives_gift_to);
            return view('home', ['givesGiftTo' => $givesGiftTo]);
        } else return view('home', ['givesGiftTo' => null]);
    }
}
