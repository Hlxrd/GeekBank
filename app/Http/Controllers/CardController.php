<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessCard;
use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
            return back();
        } else {
            return redirect()->route('myCard.index')->withErrors([
                'errorMessage' => 'you all ready have two cards'
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
                return back()->with('success', 'the amount of ' . $amount . 'has ben distribute to the card with number' . $receive_card->card_number);
            } else {
                return back()->with('error', 'ditrubution failde you don t have this '. $amount .'on your card')->withErrors('errorMessage', 'you dont have the amount of ' . $amount . 'on your card');
            }
        } else {
            return back()->with('error', 'distributinon failde you can t distribut to the same card');
        }
    }
}
