<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    //
    public function index()
    {
        $bills = Bills::all();
        $userCards = Card::where('user_id', auth()->user()->id)->get();
        return view('bill.bill', compact("bills", 'userCards'));
    }

    public function pay(Request $request)
    {
        request()->validate([
            'card_selected' => 'required',
            'price' => 'required',
            'service_name' => 'required',
        ]);


        $card_selected = Card::where('id', $request->card_selected)->first();

        $price = (float)$request->price;

        if ($card_selected->balance >= $price) {
            $card_selected->balance -= $price;
            $card_selected->save();
            Transaction::create([
                "user_id" => auth()->user()->id,
                'card_id' => $card_selected->id,
                'transaction_type' => 'service',
                'amount' => $price,
                'service_name' => $request->service_name,
            ]);
            return redirect()->route('bill.index')->with('success', "Your bill has been paid successfully.");
        } else {
            return redirect()->route('bill.index')->with('error', "You don't have this amount on your card.");
        }
    }
}
