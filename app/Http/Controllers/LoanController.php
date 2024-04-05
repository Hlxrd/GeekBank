<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Locale;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('id', auth()->user()->id)->first();
        $cards = Card::where('id', auth()->user()->id);
        $loans = Loan::all();
        return view("loanPage.loanPage", compact("users", "cards", "loans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function takeLoan(Request $request)
    {
        //
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'user_card' => 'required'
        ]);


        $cardSelecte = Card::where('id', $request->user_card)->first();

        $amount = (int)$request->amount;

        $userLoans = Loan::all();

        $existingLoan = Loan::where('user_id', auth()->id())->where('is_paid_off', false)->first();

        if ($existingLoan) {
            return redirect()->back()->with('error', 'You have an active loan. Please pay off the existing loan to request a new one.');
        }

        $amount = (int) $request->amount;

        if ($amount <= $cardSelecte->balance * 2) {

            Loan::create([
                'user_id' => auth()->user()->id,
                'amount' => $amount,
                'is_paid_off' => false,
            ]);
        } elseif ($userLoans->amount != 0) {
            dd('ta tkhalles');
        }

        return redirect()->back()->with('success', 'Loan successfully added to your card balance.');
    }

    public function destroy(Loan $loan)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
