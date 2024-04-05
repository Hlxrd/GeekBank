<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessCard;
use App\Models\Card;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Sleep;

class CardController extends Controller
{
    //

    public function index()
    {
        $userCards = Card::where('user_id', auth()->user()->id)->get();
        return view('card.card', compact('userCards'));
    }

    public function store()
    {

        $userCards = Card::where('user_id', auth()->user()->id)->get();

        if (count($userCards) < 2) {

            Card::create([
                'user_id' => auth()->user()->id,
                'card_number' => rand(1000000000000000, 9999999999999999),
                'cvc' => rand(100, 999),
                'rib' => rand(100000000000000000, 999999999999999999),
                'balance' => 0,
                'expiration_date' => now()->addYear(10)->format('m-y'),
            ]);

            return back()->with('success', 'The card has been successfully added.');
        } else {
            return redirect()->route('myCard.index')->with([
                'error' => 'You ve reached the maximum card limit of two.'
            ]);
        }
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return back();
    }

    public function distributeBalance(Request $request)
    {
        request()->validate([
            'source_card' => 'required',
            'receive_card' => 'required',
            'amount' => 'required|numeric',
        ]);

        $source_card = Card::all()->where('id', '==', $request->source_card)->first();
        $receive_card = Card::all()->where('id', '==', $request->receive_card)->first();
        $amount = (int)$request->amount;

        if ($source_card->id != $receive_card->id) {
            if ($source_card->balance >= $amount) {
                $receive_card->balance += $amount;
                $source_card->balance  -= $amount;
                $source_card->save();
                $receive_card->save();
                Transaction::create([
                    "user_id" => auth()->user()->id,
                    "card_id" => $source_card->id,
                    'from_card' => $source_card->card_number,
                    'to_card' => $receive_card->card_number,
                    'transaction_type' => 'switch money',
                    'amount' => $amount,
                ]);
                return back()->with('success', "The amount of $" . $amount . " has been distributed to the card with the following number:" . $receive_card->card_number);
            } else {
                return back()->with('error', "Distribution failed. You don't have $" . $amount . " on your card.")->withErrors('errorMessage', "You don't have the amount of $" . $amount . " on your card.");
            }
        } else {
            return back()->with('error', "Distribution failed. You can't distribute to the same card.");
        }
    }
}
