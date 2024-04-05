<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Investment;
use App\Models\Investment_option;
use App\Models\User;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function index(){
        $invests=Investment::all();
        $authUser = User::where('id', auth()->user()->id)->first();
        return view('investment.investment',compact("invests",'authUser'));
    }

    public function store(Request $request){
        $request->validate([
            "nameInvest"=>"required",
            "type"=>"required", 
            "amount"=>"required",
            "selected_card"=>"required",
        ]);

        $selected_card = Card::all()->where('id', '==', $request->selected_card)->first();
        $amount = (int)$request->amount;



        if ($request->amount <= $selected_card->balance) {
            $selected_card->balance -= $amount;
            $selected_card->save();
            Investment::create([
                'nameInvest' => $request->nameInvest,
                'user_id' => auth()->user()->id,
                'investment_option_id' => $request->type,
                'amount' => $request->amount,
            ]);
        } else {
            return redirect()->route('invest.index')->withErrors([
                'errorMessage' => 'you don t have this amount on your card'
            ])->onlyInput('selected_card');
        }
        return back();
    }
    
    public function destroy(Investment $investment){
        $user = auth()->user();
        $card = $user->cards->first(); 
        $card->balance += $investment->amount;
        $card->save();
        $investment->delete();
        return redirect()->back();
    }
    
    
}
