@extends ('layouts.base')
	@section('content')
		<h1>New Pest</h1>

		{{ Form::open(array('url' => '/dashboard/pests', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('type', 'Pest type') }}
			{{ Form::text('type', '', array('class' => 'form-control')) }}

			{{ Form::label('management', 'Management') }}
			{{ Form::textarea('management', '', array('class' => 'form-control')) }}

		  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		</div>

		{{ Form::close() }}
	@stop