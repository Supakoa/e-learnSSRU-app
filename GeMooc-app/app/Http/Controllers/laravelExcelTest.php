<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *  laravel excel [ outside import ]
 */
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class laravelExcelTest extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'user.csv');
    }
}
