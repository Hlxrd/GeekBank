<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Psy\Readline\Transient;

class TransactionController extends Controller
{
    //

    public function index()
    {
        $transactions = Transaction::all()->where('user_id' , '==' , auth()->user()->id);
        // $transactions = Transaction::all();
        return view('transaction.transaction', compact('transactions'));
    }
}
