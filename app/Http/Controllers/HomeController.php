<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function all() {
        $products = Product::latest()->simplePaginate(5);
        return view('product',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function welcome() {
        $users  = Auth::user();
        return view('welcome1', compact('users'));
    }

    public function error() {
        $users  = Auth::user();
        return view('welcome', compact('users'));
    }

    public function personal() {
        $users = User::find('id');
        return view('personal-area', compact('users'));
    }

    public function admin() {
        return view('layout.admin');
    }
    
}
