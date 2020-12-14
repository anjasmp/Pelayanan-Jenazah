<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionProductSuccess;
use App\TransactionProduct;
use App\Product;
use App\Guest;
use App\TransactionDetail;
use App\User;
use App\UserDetails;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Validator;

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
        // $this->validate($request, [
            // 'name' => 'max:30',
            // 'email' => 'email',
            // 'tempat_lahir' => 'string|max:12',
            // 'tanggal_lahir' => 'date',
            // 'alamat' => 'required',
            // 'telepon' => 'string',
            // 'pekerjaan' => 'string|max:30',
            // 'no_kk' => 'string',
            // 'scan_ktp' => 'image',
            // 'scan_kk' => 'image'
        // ]);

        // $product = Product::findOrFail($id);
        // $data = $request->all();

        // // if (Auth::check()) {
            
        // //     $transaction = Auth::user()->transactions()->create([
        // //         'transaction_status' => 'IN_CART',
        // //         'products_id' => $product->id,
        // //         'transaction_total' => $data['nominal'],
        // //     ]);
        // // } else {


        // $user = UserDetails::where('name', 'email' '=', $data['name', 'email'])->first();

        // $data['image'] = $request->file('image')->store(
        //     'assets/product', 'public'
        // );

        // // if ($guest) {

        // // } else {

        // $user = UserDetails::create([
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            // 'tempat_lahir' => $data['tempat_lahir'],
            // 'tanggal_lahir' => $data['tanggal_lahir'],
            // 'alamat' => $data['alamat'],
            // 'telepon' => $data['telepon'],
            // 'pekerjaan' => $data['pekerjaan'],
            // 'no_kk' => $data['no_kk'],
            // 'scan_ktp' => $data['scan_ktp'],
            // 'scan_kk' => $data['scan_kk']
        // ]);

        // }

        // $transaction = $guest->transactions()->create([
        //     'transaction_status' => 'IN_CART',
        //     'products_id' => $product->id,
        //     'transaction_total' => $product->price,
        // ]);
        // }

        

        $product = Product::findOrFail($id);
        // $user_details = UserDetails::findOrFail($id);
        // $transactiondetail = TransactionDetail::all();

        $transaction = TransactionProduct::create([
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'masa_aktif' => Carbon::now()->addYear(1),
            'register' => 1,
            'transaction_total' => $product->price + $product->register,
            'transaction_status' => 'IN_CART'
        ]);

        // TransactionDetail::create([
        //     'transaction_products_id' => $transaction->id,
        //     'name' => Auth::user()->name
        // ]);

        // UserDetails::create([
        //     'users_id' => $id,
        //     'tempat_lahir' => $user_details->tempat_lahir,
        //     'tanggal_lahir' => $user_details->tanggal_lahir,
        //     'alamat' => $user_details->alamat,
        //     'telepon' => $user_details->telepon,
        //     'pekerjaan' => $user_details->pekerjaan,
        //     'no_kk' => $user_details->no_kk,
        //     'scan_ktp' => $user_details->scan_ktp,
        //     'scan_kk' => $user_details->scan_kk
        // ]);


        return redirect()->route('product.checkout', $transaction->id);

    }


    public function create (Request $request, $id)
    {
        $this->validate($request, [
            // 'name' => 'max:30',
            // 'email' => 'email',
            'tempat_lahir' => 'string|max:12',
            'tanggal_lahir' => 'date',
            'alamat' => 'required',
            'telepon' => 'string',
            'pekerjaan' => 'string|max:30',
            'no_kk' => 'string'
        ]);

        // TransactionDetail::create([
        //     'transaction_products_id' => $request->transaction_products_id,
        //     'name' => $request->name,
        //     'nik' => $request->nik,

        // ]);

        $data = $request->all();

        $item = TransactionProduct::all();

        UserDetails::create([
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'pekerjaan' => $data['pekerjaan'],
            'no_kk' => $data['no_kk'],
            'users_id' => Auth::id()

        ]);

        return redirect()->route('product.checkout-success', $id);
    }
    

    // public function remove (Request $request, $detail_id)
    // {
    //     $item = TransactionDetail::findOrFail($detail_id);

    //     $transaction = TransactionProduct::with(['details','product'])
    //         ->findOrFail($item->transaction_products_id);

    //     $item->delete();


    //     return redirect()->route('product.checkout', $item->transaction_products_id);
    // }




    public function success (Request $request, $id)
    {
        $transaction = TransactionProduct::with(['product','user'])
            ->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        // $transaction->load(['user']);


        // ini untuk Transfer Manual
        // kirim email keuser
        // Mail::to($transaction->users_id)->send(
        //     new App\Http\Controllers\TransactionProductSucces($transaction)
        // );


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