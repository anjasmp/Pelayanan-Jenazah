<?php

namespace App\Http\Controllers;

use App\DonationPackage;
use App\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        
        return view('admin.dashboard.index',[
            'donation_package' => DonationPackage::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count()
        ]);
    }
}
