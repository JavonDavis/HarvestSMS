@extends('layouts.base')
	@section('content')
		<h1>New Crop</h1>

		{{ Form::open(array('url' => '/dashboard/crops', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('name', 'Crop Name') }}
			{{ Form::text('name', 'Crop Name', array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('days', 'Recommended Days Before Harvest') }}
			{{ Form::text('days', '100 days', array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('getting_started', 'Some info to get started...') }}
			{{ Form::textarea('getting_started', '', array('class' => 'form-control')) }}
		</div>

	  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		{{ Form::close() }}
		
		@stop
