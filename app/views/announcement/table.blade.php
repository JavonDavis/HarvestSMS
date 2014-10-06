@extends('layouts.base')
  @section('content')
	<h1>Announcements</h1>
		 <a href = "/dashboard/announcements/new"><button type="button" class="btn btn-primary btn-lg pull-right">New Announcement</button></a>

			@foreach ($announcements as $announcement)
			<p>{{ $announcement->description }}</p>
      <p>{{ $announcement->content }} </p>
			@endforeach		
  @stop