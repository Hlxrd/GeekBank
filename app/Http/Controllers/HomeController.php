<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            session()->flush();
            Auth::logout();
            return view('home');
        } else {
            return view('home');
        }
    }
}
