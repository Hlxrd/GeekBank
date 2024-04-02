<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller');
    }

    public function sellerProducts()
    {
        $sellerProducts = Product::where('user_id', '=', auth()->user()->id)->paginate(4);
        return view('sellerProducts', compact('sellerProducts'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('product.index');
    }
}
