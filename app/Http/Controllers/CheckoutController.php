<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use App\Product;
use App\Transaction;
use App\User;
use App\UserDetails;
use App\UserFamilies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index (Request $request, $id)
    {
        $item = Transaction::with(['user_detail','user','product', 'user_families'])->findOrFail($id);

        
        return view('user.pelayananjenazah.checkout',[
            'item' => $item
        ]);


    }

    public function process(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // $user_details = UserDetails::findOrFail($id);
        // $user_families = UserFamilies::findOrFail($id);
        // $transactiondetail = TransactionDetail::all();

        $transaction = Transaction::create([
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'masa_aktif' => Carbon::now()->addYear(1),
            'register' => 1,
            'transaction_total' => $product->price + $product->register,
            'transaction_status' => 'IN_CART'
        ]);

        // UserFamilies::create([
        //     'transactions_id' => $transaction->id,
        //     'name' => Auth::user()->name,
        //     'tempat_lahir' => $user_details->tempat_lahir,
        //     'tanggal_lahir' => $user_details->tanggal_lahir,
        //     'nik' => $user_details->no_kk

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
            'no_kk' => 'string',
            'nik' => 'string'
        ]);

        $data = $request->all();
        
        $transaction = Transaction::findOrFail($id);

        UserDetails::create([
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            'transactions_id' => $transaction->id,
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'pekerjaan' => $data['pekerjaan'],
            'no_kk' => $data['no_kk'],
            'users_id' => Auth::id()

        ]);

        

        return redirect()->route('product.checkoutfamilies', $id);
    }


    public function indexfamilies (Request $request, $id)
    {
        $item = Transaction::with(['user_detail','user','product', 'user_families'])->findOrFail($id);

        $items = UserFamilies::Where('users_id', Auth::id())->get();
        
        return view('user.pelayananjenazah.checkout_families',[
            'item' => $item,
            'items' => $items
        ]);


    }
    
    public function createfamilies (Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'max:30',
            'tempat_lahir' => 'string|max:12',
            'tanggal_lahir' => 'date',
            'nik' => 'string|max:12'
        ]);


        $data = $request->all();
        $transaction = Transaction::findOrFail($id);

        UserFamilies::create([
            'users_id' => Auth::id(),
            'transactions_id' => $transaction->id,
            'name' => $data['name'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'nik' => $data['nik']

        ]);

        return redirect()->route('product.checkoutfamilies', $id);
    }

    public function remove (Request $request, $id)
    {
        $item = UserFamilies::findorfail($id);


        $item->delete();


        return redirect()->route('product.checkoutfamilies', $item->transactions_id);
    }




    public function success (Request $request, $id)
    {
        $transaction = Transaction::with(['product','user','user_detail','user_families'])
            ->findOrFail($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        // $transaction->load(['user']);

        // return $transaction;


        // ini untuk Transfer Manual
        // kirim email keuser
        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
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