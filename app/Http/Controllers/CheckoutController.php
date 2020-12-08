<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use App\Transaction;
use App\DonationPackage;
use App\Guest;
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
        $item = Transaction::with(['userable','donation_package'])->findOrFail($id);

        return view('user.infaqwakaf.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'max:30',
            'email' => 'email',
            'no_handphone' => 'string|max:12',
            'nominal' => 'required'
        ]);

        $donation_package = DonationPackage::findOrFail($id);
        $data = $request->all();

        if (Auth::check()) {
            
            $transaction = Auth::user()->transactions()->create([
                'transaction_status' => 'IN_CART',
                'donation_packages_id' => $donation_package->id,
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
            'donation_packages_id' => $donation_package->id,
            'transaction_total' => $data['nominal'],
        ]);
    }


        return redirect()->route('donation.checkout', $transaction->id);

    }



    public function success (Request $request, $id)
    {
        $transaction = Transaction::with(['donation_package.galleries','userable'])
            ->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        $transaction->load(['userable']);


        // ini untuk Transfer Manual
        //kirim email keuser
        Mail::to($transaction->userable)->send(
            new TransactionSuccess($transaction)
        );


        return view('user.infaqwakaf.success');

      

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
        //     $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        //     // dd($paymentUrl);

        //     //redirect ke halaman midtrans
        //     header('Location: ' . $paymentUrl);

        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

    }
}