<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->rol == 1 || Auth::user()->rol == 2 ) {
         return view('home');
        }

        if (Auth::user()->rol == 3 || Auth::user()->rol == 4 || Auth::user()->rol == 5) {
            $usuarios = User::all();
            return view("admin.index_user",['usuarios'=>$usuarios]);
        }

    }
}
