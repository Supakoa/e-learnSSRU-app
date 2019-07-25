<?php

namespace App\Imports;

use App\question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuizImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new question([
            'name' =>$row[1],
            'quiz_id' => $row[6],
        ]);
    }
}
