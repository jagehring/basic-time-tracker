@extends('layouts.app')

@section('content')


        <div class="container">
          <div class="row">


            <div class="col-md-8">

              <div class="card mb-3">
  <div class="card-body">

                              <h4><i class="glyphicon glyphicon-user"></i> {{$project->client}}</h4>
                              <p><i class="glyphicon glyphicon-pencil"></i> {{$project->description}}</p>


  </div>
  </div>

@foreach($alltimes as $onetime)

<div class="card mb-3">
  <div class="card-header">{{ gmdate("H:i:s", $onetime->duration) }}</div>
  <div class="card-body">
    
    <p class="card-text">{{$onetime->comment}}</p>
  </div>
</div>


@endforeach
{{ $alltimes->links() }}
      </div>
      <div class="col-md-4">



      <div class="card">
<div class="card-body">
                  <div class="col-sm-8">
                      <h4>Total Time Spent</h4>
                      <p>Hours:{{ $hours }}<br />Minutes: {{$minutes}}  </p>

                      @if($times)
                      <button onClick="$('.timer').countimer('stop');" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Clock Out
                      </button>
                      @else

                          <form action="/clockin" method="post" >
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="hidden" name="project_id" value="{{ $project->id }}" />
                          <button onClick="$('.timer').countimer('start');" type="submit" type="button" class="btn btn-primary">Clock In</button>
                          </form>

                      @endif


</div>
</div>



</div>


      </div>
        </div>

        <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Clock Out</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/clockout" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="project_id" value="{{ $project->id }}" />

        <div class="modal-body">

            <div class="form-group">
    <label for="formGroupExampleInput">Comment</label>
    <textarea name="comment" class="form-control" placeholder="Project Description" row="3"></textarea>
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
