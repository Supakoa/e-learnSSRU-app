<?php

namespace App\Http\Controllers;
use App\subject as subject;
use App\course as course;
use App\content as content;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\subjectExport;
use App\Exports\quizExport;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class test extends Controller
{
    public function duplicate_subject()
    {
       $subject = subject::find(2);
       $clone = $subject->replicate();
       $clone->save();
        foreach ($subject->courses as $course) {

            $clone_course = $course->replicate();
            $clone->courses()->save($clone_course);
            foreach($course->lessons as $lesson){
                $clone_lesson = $lesson->replicate();
                $clone_course->lessons()->save($clone_lesson);
                foreach($lesson->contents as $content){
                    $clone_content =  $content->replicate();
                    // $clone_content->detail=
                    $clone_lesson->contents()->save($clone_content);

                    if($clone_content->type == 1){
                       //video
                    }elseif($clone_content->type == 2){
                        //article
                        $clone_article = $content->article->replicate();
                        $clone_article->save();
                        $clone_content->detail = $clone_article->id;
                        $clone_content->article()->save($clone_article);
                        $clone_content->save();

                    }elseif($clone_content->type == 3){
                        //quiz
                        $clone_quiz = $content->quiz->replicate();
                        $clone_article->save();
                        $clone_content->detail = $clone_article->id;
                        $clone_content->quiz()->save($clone_quiz);
                        $clone_content->save();

                    }
                }
            }



        }
    // dd($clone->courses);
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
        return Excel::download(new quizExport, 'quiz.csv', \Maatwebsite\Excel\Excel::CSV);
    //     return (new quizExport)->download('quiz.csv', \Maatwebsite\Excel\Excel::CSV, [
    //         'Content-Type' => 'text/csv',
    //   ]);
    }
}
