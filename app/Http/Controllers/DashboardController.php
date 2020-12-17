<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        // $wordlist = Wordlist::where('id', '<=', $correctedComparisons)->get();
        $users = User::all();
        $userCount = $users->count();
        $customer = Customer::all();
        $customerCount = $customer->count();
        return view('dashboard')->with([
            'userCount' => $userCount,
            'customerCount' => $customerCount,
        ]);
    }
}
