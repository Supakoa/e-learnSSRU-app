<?php

namespace App\Exports;

use App\User as user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, Responsable
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('answers')
                ->join('questions', 'answers.question_id', '=', 'questions.id')
                ->select('questions.id', 'answers.name', 'answers.correct')
                ->get();
    }
}
