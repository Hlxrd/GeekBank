<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function invest(){
        $invests=Investment::all();
        return view('home.investment',compact("invests"));
    }

    // public function store(Request $request){
    //     request()->validate([
    //         "nameInvest"=>"required",
    //         "type"=>"required",
    //         "amount"=>"required",
    //     ]);

    //     $user = User::all()->where()
    // }
    
}
