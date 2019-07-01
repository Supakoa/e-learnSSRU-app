<?php

namespace App\Http\Controllers;

use App\record as record;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;
use function GuzzleHttp\json_decode;

class RecordController extends Controller
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
        $jsonPack = json_decode($request->muuwan);
        $ake = record::where('content_id', $jsonPack->content_id)->where('user_id', $jsonPack->user_id)->get();
        if($ake->first() == null){
            $newRecord = new record();
            $newRecord->content_id = $jsonPack->content_id;
            $newRecord->user_id = $jsonPack->user_id;
            $newRecord->record = json_encode($jsonPack->record);
            $newRecord->percent = $jsonPack->percent;
            $newRecord->save();
        }else{
            $updateRecord = record::where('content_id', $jsonPack->content_id)->where('user_id', $jsonPack->user_id)->first();
            $updateRecord->content_id = $jsonPack->content_id;
            $updateRecord->user_id = $jsonPack->user_id;
            $updateRecord->record = json_encode($jsonPack->record);
            $updateRecord->percent = $jsonPack->percent;
            $updateRecord->save();
        }
        // return response(json_encode($jsonPack));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(record $record)
    {
        //
    }
}
