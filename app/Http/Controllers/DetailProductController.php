<?php

namespace App\Http\Controllers;

use App\Product;
use App\TransactionProduct;
use App\UserDetails;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function index (Request $request, $slug)
    {
        $item = Product::where('slug', $slug)
            ->firstOrFail();
        $transaction = TransactionProduct::all();
        $userdetail = UserDetails::all();

        return view('user.pelayananjenazah.detail', [
            'item' => $item,
            'transaction' => $transaction,
            'user' => $userdetail
        ]);
    }
}
