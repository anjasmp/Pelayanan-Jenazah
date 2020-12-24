<?php

namespace App\Http\Controllers;

use App\DonationPackage;
use App\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        
        return view('admin.dashboard.index');
    }
}
