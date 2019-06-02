<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class payment extends Controller
{
    public function Home(){
        return view('payment.PaymentSetting');
    }
}
