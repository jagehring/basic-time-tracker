<?php

namespace App\Http\Controllers;

use App\Project;
use App\Times;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ProjectController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();





      return view('projects')->with('projects', $projects);
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
        $project = $request->all();
        $project = Project::create($project);

        return redirect('project/'.$project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      $project = Project::find($id);

      $times = DB::table('times')->where('project_id', $id )->whereNull('end_time')->first();

      $alltimes = Times::where('project_id', $id )->paginate(10);

      $duration1 = Times::where('project_id', $id )->whereNotNull('end_time')->sum('duration');


      $total_time = gmdate("H:i:s", $duration1);

      $hours = floor($duration1 / 3600);
      $minutes = floor(($duration1 / 60) % 60);
      $seconds = $duration1 % 60;


      return view('project-item', ['project' => $project, 'times' => $times, 'alltimes' => $alltimes, 'total_time' => $total_time, 'hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Project::destroy($id);

        return redirect('/project');

    }
}
