<?php

namespace App\Http\Controllers;

use App\Models\crypto;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

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
                'id'=>$crypto['id'],
                'name' => $crypto['name'],
                'symbol' => $crypto['symbol'],
                'quote' => $crypto['quote'],
                // 'USD' => $crypto['USD'],
                // 'price' => $crypto['price'],
                // 'logo' => $crypto['logo'],
            ];
        }
        // dd($cryptos);

        return view("crypto.crypto", compact('paginator'));
    }
}
