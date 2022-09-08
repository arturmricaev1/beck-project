<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller {
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function welcome() {
        $users = User::all();
        return view('welcome1', compact('users'));
    }

    public function error() {
        return view('welcome');
    }

    public function admin() {
        return view('layout.admin');
    }
    
}
