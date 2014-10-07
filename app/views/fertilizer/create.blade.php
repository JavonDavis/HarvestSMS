@extends ('layouts.base')
	@section('content')
		<h1>New Fertilizer</h1>

		{{ Form::open(array('url' => '/dashboard/fertilizers', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('name', 'Fertilizer Name') }}
			{{ Form::text('name', '', array('class' => 'form-control')) }}

		  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		</div>

		{{ Form::close() }}
	@stop