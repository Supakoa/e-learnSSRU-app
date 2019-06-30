<?php

namespace App\Http\Controllers;
use App\subject as subject;
use App\course as course;
use App\content as content;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\subjectExport;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class test extends Controller
{
    public function test()
    {
        dd(course::All()->toArray());
    }
    /**
 * @param array $columnNames
 * @param array $rows
 * @param string $fileName
 * @return \Symfony\Component\HttpFoundation\StreamedResponse
 */
public static function getCsv($columnNames, $rows, $fileName = 'file.csv') {
    $headers = [
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=" . $fileName,
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    ];
    $callback = function() use ($columnNames, $rows ) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columnNames);
        foreach ($rows as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    };
    return response()->stream($callback, 200, $headers);
}

public function subject_csv() {
    $subjects = subject::all();
    $rows= array();
    foreach($subjects as $key => $subject){
            $i=0;
            $row = array();
            $row[$i++] = $subject->id;
            $row[$i++] = $subject->name;
            $rows[$key] = $row;
    }
    // dd($rows);
    // $rows = [['a','b','c'],[1,2,3]];//replace this with your own array of arrays
    $columnNames = ['ID', 'NAME'];//replace this with your own array of string column headers
    return self::getCsv($columnNames, $rows);
}
public function export()
    {
        return Excel::download(new subjectExport, 'users.xlsx');
    }
}
