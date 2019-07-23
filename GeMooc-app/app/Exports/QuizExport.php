<?php

namespace App\Exports;

use App\quiz as quiz;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Illuminate\Support\Collection;
class QuizExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sum = collect();
        $quiz = quiz::find(2);
        // foreach ($quiz->questions as $key => $question) {
        //     // $question->prepend('001');
        //     $sum = $sum->push($question);
        //     foreach ($question->answers as $key => $answer) {
        //         // $answer->prepend('002');
        //         $sum = $sum->push($answer);
        //     }
        // }
        // return $sum;
        return $quiz->questions;
    }
}
