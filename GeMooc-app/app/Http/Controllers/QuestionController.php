<?php

namespace App\Http\Controllers;

use App\question as question;
use App\answer as answer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'name' => 'required',
            'cover_image' => 'image|nullable|max:10000'

        ]) ;
        $question = new question;
        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('question_img','public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            // dd($image);
            $image->save();
            $question->image =  $imagePath;
        }
        // Create question

        $question->name = $request->input('name');
        $question->quiz_id = $request->input('quiz_id');
        $question->save();

        $i = 1;
        $answers =$request->input('answer');
        foreach ($answers as $name) {
            $answer = new answer;
            $answer->name = $name;
            $answer->order = $i;
            if($i++==$request->input('correct')){
                $answer->correct = 1;
            }
            $answer->question_id = $question->id;
            $answer->save();
        }

        // $now = new adjust;
        // $now->user_id = auth()->user()->id;
        // $now->detail = "Create question : ID ====> || ".$question->id." ||";
        // $now->save();
        return redirect('/quiz/'.$request->input('quiz_id'))->with('success', 'question Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        $this->validate($request,[
            'name' => 'required',
            'cover_image' => 'image|nullable|max:10000'

        ]) ;
        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('question_img','public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            // dd($image);
            $image->save();
            $question->image =  $imagePath;
        }
        // Create question

        $question->name = $request->input('name');
        $question->save();

        $i = 1;
        $answers_new =$request->input('answer');
        foreach ($question->answers as $key => $answer) {
            $answer->name = $answers_new[$key];
            if($key+1==$request->input('correct')){
                $answer->correct = 1;
            }else{
                $answer->correct = 0;
            }
            $answer->save();
        }


        // $now = new adjust;
        // $now->user_id = auth()->user()->id;
        // $now->detail = "Create question : ID ====> || ".$question->id." ||";
        // $now->save();
        return redirect('/quiz/'.$question->quiz->id)->with('success', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        $id = $question->quiz->id;
        $question->delete();
        return redirect('/quiz/'.$id)->with('success', 'Question Updated');
    }
    public function modal_edit(Request $request)
    {
         $id = $request->id;
         $question = question::find($id);
         return view('question.modal.edit')->with('question', $question);
    }
}
