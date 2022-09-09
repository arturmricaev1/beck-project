<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function welcome() {
        $users  = Auth::user();
        return view('welcome1', compact('users'));
    }

    public function error() {
        $users  = Auth::user();
        return view('welcome', compact('users'));
    }

    public function admin() {
        return view('layout.admin');
    }
}
