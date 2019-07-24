<?php

namespace App\Http\Controllers;

use App\report as report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = report::all();
        return view('admin-teach.webapp.content.report.Report',compact('reports'));
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
     * @param  \App\report
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,report $report)
    {
        $data = request();

        // report::created([
        //     'from_Page' => $data['from_page'],
        //     'user_id' => $data['user_id'],
        //     'title' => $data['topic'],
        //     'description' => $data['description'],
        // ]);

        $newReport = new report();
        $newReport->from_Page = $data['from_page'];
        $newReport->user_id = $data['user_id'];
        $newReport->title = $data['topic'];
        $newReport->description = $data['description'];
        $newReport->save();

        return redirect()->back();
    }

    /**
      * Display the specified resource.
      *
      * @param  \App\report  $report
      * @return \Illuminate\Http\Response
      */
    public function show(report $report, Request $request)
    {
        $reports = report::find($report->id);
        return view('report.modal.openReport')->with('reports',$reports);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(report $report)
    {
        //
    }
}
