<?php

namespace App\Imports;

use App\question;
use App\answer;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class QuizImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;
    protected $question_id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            if($row[0]=='question'){

                $question = question::create([
                    'name' => $row[1],
                    'quiz_id' => $this->id,
                ]);
                $this->question_id =  $question->id;

            }else{
                    // dd(($row[3]==1.0) ? 1 : 0);
                    $answer = answer::create([
                        'name' => $row[1],
                        'correct' => ($row[2]==1.0) ? 1 : 0,
                        'order' => $row[3],
                        'question_id' =>  $this->question_id,
                    ]);



            }
        }


    }
}
