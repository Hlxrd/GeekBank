<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    //

    public function index()
    {
        $cards = Card::all()->where('user_id', '!=', auth()->user()->id)->all();
        $authUser = User::where('id', auth()->user()->id)->first();
        return view('transfer.transfer', compact('authUser', 'cards'));
    }

    public function handlTransfer(Request $request)
    {
        request()->validate([
            'source_card' => 'required',
            'receive_card' => 'required',
            'amount' => 'required',
        ]);

        $source_card = Card::all()->where('id', '==', $request->source_card)->first();
        $receive_card = Card::all()->where('id', '==', $request->receive_card)->first();
        $amount = (int)$request->amount;

        if ($request->amount <= $source_card->balance) {
            $source_card->balance -= $amount;
            $receive_card->balance += $amount;
            $source_card->save();
            $receive_card->save();
        } else {
            return redirect()->route('transfer.index')->withErrors([
                'errorMessage' => 'you don t have this amount on your card'
            ])->onlyInput('amount');
        }
        return back();
    }
}
