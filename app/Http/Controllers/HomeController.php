<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('home.home');
    }
    public function pay(){
        $bills=Bills::all();
        return view('home.pay',compact("bills"));
    }
}
