<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function invest(){
        $invests=Investment::all();
        return view('home.investment',compact("invests"));
    }
}
