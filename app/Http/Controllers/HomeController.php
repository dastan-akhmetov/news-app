<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->role == 'admin') {

            $users = User::all();
            return view('/home/admin', compact('users'));

        } 
        else if (Auth::user()->role == 'editor') {

            return view('/home/editor');

        }
        else if (Auth::user()->role == 'viewer') {

            return view('/home/viewer');
            
        }

        return view('home');
    }
}
