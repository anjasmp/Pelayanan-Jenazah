<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionProductSuccess;
use App\TransactionProduct;
use App\Product;
use App\Guest;
use App\TransactionDetail;
use App\UserDetails;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;


class CheckoutController extends Controller
{

    public function index (Request $request, $id)
    {
        $item = TransactionProduct::with(['details','user','product'])->findOrFail($id);

        return view('user.pelayananjenazah.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'max:30',
            'email' => 'email',
            'no_handphone' => 'string|max:12'
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        if (Auth::check()) {
            
            $transaction = Auth::user()->transactions()->create([
                'transaction_status' => 'IN_CART',
                'products_id' => $product->id,
                'transaction_total' => $data['nominal'],
            ]);
        } else {


        $guest = Guest::where('email', '=', $data['email'])->first();

        if ($guest) {

        } else {

        $guest = Guest::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_handphone' => $data['no_handphone']
        ]);

        }

        $transaction = $guest->transactions()->create([
            'transaction_status' => 'IN_CART',
            'products_id' => $product->id,
            'transaction_total' => $product['price'],
        ]);
        }

        // $product = Product::findOrFail($id);
        // $user = UserDetails::all();
        // $transactiondetail = TransactionDetail::all();

        // $transaction = TransactionProduct::create([
        //     'product_id' => $id,
        //     'users_id' => $id,
        //     'masa_aktif' => Carbon::now()->addYear(5),
        //     'register' => 1,
        //     'transaction_total' => $product->price,
        //     'transaction_status' => 'IN_CART'
        // ]);

        // TransactionDetail::create([
        //     'transaction_products_id' => $transaction->id,
        //     'name' => $transactiondetail->name,
        //     'nik' => $transactiondetail->nik
        // ]);

        // UserDetails::create([
        //     'users_id' => $user->id,
        //     'name' => $user->name,
        //     'nik' => $transactiondetail->nik
        // ]);


        // return redirect()->route('product.checkout', $transaction->id);

    }



    public function success (Request $request, $id)
    {
        $transaction = TransactionProduct::with(['product.galleries','userable'])
            ->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        $transaction->load(['userable']);


        // ini untuk Transfer Manual
        //kirim email keuser
        Mail::to($transaction->userable)->send(
            new TransactionProductSuccess($transaction)
        );


        return view('user.pelayananjenazah.success');

      

        // // //set configurasi midtrans
        // Config::$serverKey = config('midtrans.serverKey');
        // Config::$isProduction = config('midtrans.isProduction');
        // Config::$isSanitized = config('midtrans.isSanitized');
        // Config::$is3ds = config('midtrans.is3ds');

        // //buat array dikirim ke midtrans
        // $midtrans_params = [
        //     'transaction_details' => [
        //         'order_id' => 'BAITULHAQ-' . $transaction->id,
        //         'gross_amount' => (int) $transaction->transaction_total
        //     ],
        //     'customer_details' => [
        //         'first_name' => $transaction->userable->name,
        //         'email' => $transaction->userable->email,
        //     ],
        //     'enabled_payments' => ['gopay'], ['echannel'],
        //     'vtweb' => []
        // ];

        // try {
        //     // ambil halaman payment midtrans
        //     $paymentUrl = Snap::createTransactionProduct($midtrans_params)->redirect_url;

        //     // dd($paymentUrl);

        //     //redirect ke halaman midtrans
        //     header('Location: ' . $paymentUrl);

        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

    }
}