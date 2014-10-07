@extends ('layouts.base')
	@section('content')
	<h1>Fertilizers</h1>
		 <a href = "/dashboard/fertilizers/new"><button type="button" class="btn btn-primary btn-md" id="add">Add Record</button></a>
		<table class="table table-striped">
			<tr>
				<th>Fertilizer Name</th>
				<th></th>
				<th></th>
				<th></th>
				
			</tr>

			@foreach ($fertilizers as $fertilizer)
			<tr>
				<td>{{ $fertilizer->name }}</td>
				<td><button type="button" class="btn btn-sm">Crops</button></td>
				<td><button type="button" class="btn btn-primary btn-sm">Edit</button>
				<td><button type="button" class="btn btn-primary btn-sm">Delete</button></td>
			</tr>
			@endforeach		
	@stop