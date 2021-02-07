<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $productos = Producto::all();
        return view('home', ['user' => $user, 'productos' => $productos]);
    }
    
    public function welcome()
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            $productos = Producto::all();
            return view('home', ['user' => $user, 'productos' => $productos]);
        } else {
            // The user is not logged in...
            return view('welcome');
        }
        
        // $user = Auth::user();
        // dd($user);
        // return view('welcome');
    }
}
