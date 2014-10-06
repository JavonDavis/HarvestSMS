@extends('layouts.base')
	@section('content')
		<h1>Answer Question</h1>

		{{ Form::open(array('url' => '/dashboard/questions/{{ $question->id }}', 'class' => 'form-horizontal')) }}

		<h5>{{ question->content }}</h5>

		<div class="form-group">
			{{ Form::label('answer', 'Answer') }}
			{{ Form::textarea('answer', '', array('class' => 'form-control')) }}
		</div>

	  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		{{ Form::close() }}
		
	@stop