@extends('layouts.base')
	@section('content')
		<h1>New Announcement</h1>

		{{ Form::open(array('url' => '/dashboard/announcements', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('description', 'Announcement description') }}
			{{ Form::text('description', 'Announcement Description', array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Announcement') }}
			{{ Form::textarea('content', '', array('class' => 'form-control')) }}
		</div>

	  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		{{ Form::close() }}
	@stop
				