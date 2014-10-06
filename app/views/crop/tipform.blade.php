@extends('layouts.base')
	@section('content')
		<h2>New tip for {{ $crop->name }}</h2>

		{{ Form::open(array('url' => '/dashboard/crops/$crop->id/tips')) }}

		{{ Form::label('description', 'Description') }}
		{{ Form::text('description', '', array('class' => 'form-control')) }}

		{{ Form::label('content', '') }}
		{{ Form::textarea('content', '', array('class' => 'form-control')) }}

	  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		{{ Form::close() }}
	@stop 