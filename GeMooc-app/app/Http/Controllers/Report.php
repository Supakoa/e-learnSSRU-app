<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report extends Controller
{
    public function index(){
        return view('report.Report');
    }
}
