@extends ('layouts.base')
	@section('content')
	<h1>Pests</h1>
		 <a href = "/dashboard/pests/new"><button type="button" class="btn btn-primary btn-md" id="add">Add Record</button></a>
		<table class="table table-striped">
			<tr>
				<th>Pest Type</th>
				<th>Management</th>
				<th></th>
				<th></th>
				
			</tr>

			@foreach ($pests as $pest)
			<tr>
				<td>{{ $pest->type }}</td>
				<td><p>{{ $pest->management_method }}</p></td>
				<td><a href="/dashboard/pests/{{ $pest->id }}/crops"><button>Crops</button></a></td>
				<td><button type="button" class="btn btn-primary btn-sm">Edit</button>
				<td><button type="button" class="btn btn-primary btn-sm">Delete</button></td>
			</tr>
			@endforeach		
	@stop