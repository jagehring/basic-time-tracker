@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">


      <div class="card">
<div class="card-body">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Time Tracker</a>
                </div>
            </div>
            <div class="container-fluid time-entry">
                <div class="timepicker">
                    <span class="timepicker-title label label-primary">Clock In</span><timepicker  hour-step="1" minute-step="1" show-meridian="true"></timepicker>
                </div>
                <div class="timepicker">
                    <span class="timepicker-title label label-primary">Clock Out</span><timepicker hour-step="1" minute-step="1" show-meridian="true"></timepicker>
                </div>
                <div class="time-entry-comment">
                    <form class="navbar-form">
                        <input class="form-control" placeholder="Enter a comment"></input>
                        <button class="btn btn-primary" >Log Time</button>
                    </form>
                </div>
            </div>
        </nav>
      </div>
    </div>
  </div>
</div>


        <div class="container">
          <div class="row">

            <div class="col-md-8">
              <div class="card">
    <div class="card-body">
            @foreach($time as $times)

                        <div class="col-sm-8">
                            <h4><i class="glyphicon glyphicon-user"></i> {{$times->name}}</h4>
                            <p><i class="glyphicon glyphicon-pencil"></i> {{$times->comment}}</p>
                        </div>
                        <div class="col-sm-4 time-numbers">
                            <h4><i class="glyphicon glyphicon-calendar"></i> {{$times->end_time}}</h4>
                            <h2><span class="label label-primary">
                               hour<span ng-show="time.loggedTime.duration._data.hours > 1">s</span></span></h2>
                            <h4><span class="label label-default"> minutes</span></h4>
                        </div>

          @endforeach
            </div>
          </div>
      </div>

            <div class="col-smd-4">
              <div class="card">
    <div class="card-body">
                <div class="well time-numbers">
                    <h1><i class="glyphicon glyphicon-time"></i> Total Time</h1>
                    <h1><span class="label label-primary"> hours</span></h1>
                    <h3><span class="label label-default"> minutes</span></h3>
                </div>
            </div>
          </div>
        </div>
      </div>
        </div>
        @endsection
