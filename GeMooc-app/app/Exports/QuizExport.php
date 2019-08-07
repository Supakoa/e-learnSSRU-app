<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use App\quiz as quiz;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Concerns\FromQuery;
// use Illuminate\Support\Collection;

class QuizExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    // public function query()
    // {
    //     $quiz = quiz::query()->where('id', $this->id);
    //     dd($quiz);
    //     $question = $quiz->questions;
    //     return $question;
    // }
    public function collection()
    {
    //     // $test  =
    //     // dd('yeah', $test);
        $sum = collect();
        $quiz = quiz::find($this->id);
        foreach ($quiz->questions as $key => $question) {
            $question->type = 'question';
            $sum = $sum->push($question->only(['type','name']));
            foreach ($question->answers as $key => $answer) {
                $answer->type = 'answer';
                $sum = $sum->push($answer->only(['type','name','correct','order']));
            }
        }
        return $sum;
        // return $quiz->questions;
    }
}
