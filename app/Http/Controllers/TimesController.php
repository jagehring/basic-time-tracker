<?php

namespace App\Http\Controllers;

use App\Times;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
Use DB;

class TimesController extends Controller
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
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockin(Request $request)
    {
      $time = new Times();
      $time->user_id = Auth::user()->id;
      $time->project_id = $request->input('project_id');
      $time->start_time = Carbon::now();
      $time->save();

      return redirect('project/'.$time->project_id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clockout(Request $request)
    {

      $id = $request->input('project_id');
      $timetoupdate = Times::where('project_id', $id )->whereNull('end_time')->first();

      $startTime = Carbon::parse($timetoupdate->start_time);
      $finishTime = Carbon::parse($timetoupdate->finish_time);

      $totalDuration = $finishTime->diffInSeconds($startTime);


      $time = Times::where('project_id', $id )->whereNull('end_time')->first();
      $time->end_time = Carbon::now();
      $time->comment = $request->input('comment');
      $time->duration = $totalDuration;
      $time->save();

      return redirect('project/'.$time->project_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function show(Times $times)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function edit(Times $times)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Times $times)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function destroy(Times $times)
    {
        //
    }
}
