@extends('layouts.base')
	@section('content')
		<h1>New Livestock</h1>

		{{ Form::open(array('url' => '/dashboard/livestock', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', '', array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('feed', 'Feed') }}
			{{ Form::text('feed', '', array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('care_methods', 'Recommended Care Methods') }}
			{{ Form::textarea('care_methods', '', array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('getting_started', 'Some info to get started...') }}
			{{ Form::textarea('getting_started', '', array('class' => 'form-control')) }}
		</div>

	  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		{{ Form::close() }}
		
		@stop
