<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\crypto;
use App\Models\Transaction;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CryptoController extends Controller
{
    //
    // ^^ API FROM WISSAL 
    public function index()
    {
        $apiKey = 'd6cb83c7-a49b-4cf9-b970-189eac2cc7d7';
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=' . $apiKey;

        $response = Http::get($url);


        if ($response->successful()) {
            $cryptos = $response->json();
            $cryptos = $cryptos['data'];
            $page = request()->get('page', 1); // Get the current page or default to 1
            $perPage = 10;
            $total = count($cryptos);
            $offset = ($page - 1) * $perPage;

            // Use array_slice to paginate the array
            $paginatedCryptos = array_slice($cryptos, $offset, $perPage);

            $paginator = new LengthAwarePaginator(
                $paginatedCryptos,
                $total,
                $perPage,
                $page,
                ['path' => url()->current(), 'query' => request()->query()]
            );
        } else {
            return response()->json(['error' => 'Failed to fetch data from CoinMarketCap API'], $response->status());
        }





        $data = $response->json()['data'];

        foreach ($data as $crypto) {
            $cryptos[] = [
                'id' => $crypto['id'],
                'name' => $crypto['name'],
                'symbol' => $crypto['symbol'],
                'quote' => $crypto['quote'],
                // 'USD' => $crypto['USD'],
                // 'price' => $crypto['price'],
                // 'logo' => $crypto['logo'],
            ];
        }
        $user = auth()->user();
        // dd($cryptos);
        $card = $user->cards->first();
        $cards = Card::all();
        $cryptocurrencies = $user->crypto;
        return view("crypto.crypto", compact('paginator', 'card', 'cards', 'user', 'cryptocurrencies'));
    }

    public function buy(Request $request)
    {
        // $request->validate([
        //     'crypto_id' => 'required',
        //     'coin_name' => 'required',
        //     'price' => 'required|numeric',
        //     'quantity' => 'required|numeric',
        //     'card_id' => 'required',
        // ]);





        $string = $request->price;
        // Remove the comma from the string
        $string = str_replace(',', '', $string);
        // Convert the string to a float
        $pricePerUnit = (float)$string;



        $user = auth()->user();
        $cardId = $request->card_id;
        $cryptoId = $request->crypto_id;
        $totalPrice = $pricePerUnit * $request->quantity;

        $card = Card::findOrFail($request->card_id);

        if ($card->user_id !== $user->id) {
            return back()->with('error', 'This card does not belong to the authenticated user');
        }

        if ($card->balance < $totalPrice) {
            return back()->with('error', 'Insufficient balance on selected card to buy crypto');
        }
        $card->balance -= $totalPrice;
        $card->save();
        Transaction::create([
            'user_id' => $user->id,
            'card_id' => $cardId,
            'crypto_id' => $cryptoId,
            'transaction_type' => 'buy',
            'recipient_rib' => $card->rib,
            'recipient_profile_name' => $user->name,
            'amount' => $request->quantity,
            'service_name' => 'crypto',
        ]);
        $existingCrypto = Crypto::where('user_id', $user->id)
            ->where('coin_name', $request->coin_name)
            ->first();
        if ($existingCrypto) {
            $existingCrypto->increment('amount', $request->quantity);
        } else {
            Crypto::create([
                'user_id' => $user->id,
                'coin_name' => $request->coin_name,
                'amount' => $request->quantity,
            ]);
        }
        return back()->with('success', 'Crypto purchased successfully!');
    }
}
