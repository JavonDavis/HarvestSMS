@extends('layouts.base')
  @section('content')
  	<h1>Announcements</h1>

    <div class="row">
       <a href = "/dashboard/announcements/new"><button type="button" class="btn btn-primary btn-lg pull-right">New Announcement</button></a>
    </div>

		@foreach ($announcements as $announcement)

    <div class="row">
      <h4>{{ $announcement->description }}</h4>
    </div>
		<div class="row text-center">
      <p>{{ $announcement->content }} </p>
    </div>	
        
			@endforeach		
  @stop