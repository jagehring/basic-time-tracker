@extends('layouts.app')

@section('content')



        <div class="container">

          <div class="row">
            <div class="col-md-12 mb-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create Project
              </button>
            </div>
            <div class="col-md-12">


            @foreach($projects as $project)
            <div class="card mb-3">
<div class="card-body"><div class="row">
                        <div class="col-sm-8">
                            <h2> <a href="/project/{{$project->id}}" >{{$project->client}}</a></h2>
                            <p> {{$project->description}}</p>
                            <p>
                              <a href="{{ route('project.delete', $project->id) }}">Delete</a>
                            </p>
                        </div>
                        <div class="col-sm-4">
                          <h4>Total Time Spent</h4>
                            <h5><span class="label label-primary">
                               hours: </span>{{floor( $project->time->sum('duration') / 3600)}}</h5>
                            <h5><span class="label label-default"> minutes: </span>{{floor(($project->time->sum('duration') / 60) % 60)}}</h5>
                        </div>
                      </div>
</div>
</div>
          @endforeach


      </div>


      </div>
        </div>

        <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/project" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

        <div class="modal-body">
          <div class="form-group">
              <label for="formGroupExampleInput">Client</label>
              <input name="client" type="text" class="form-control" placeholder="Enter Client">
            </div>
            <div class="form-group">
    <label for="formGroupExampleInput">Description</label>
    <textarea name="description" class="form-control" placeholder="Project Description" row="3"></textarea>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" type="button" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
        @endsection
