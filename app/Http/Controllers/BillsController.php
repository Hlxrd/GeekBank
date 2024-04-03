<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    //
    public function pay(){
        $bills=Bills::all();
        return view('home.pay',compact("bills"));
    }
    
}
