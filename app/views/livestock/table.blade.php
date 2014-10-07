@extends('layouts.base')
	@section('content')
	<h1>Crops</h1>
		 <a href = "/dashboard/crops/new"><button type="button" class="btn btn-primary btn-md" id="add">Add Record</button></a>
		<table class="table table-striped">
			<tr>
				<th>Crop Name</th>
				<th>Recommend Days Before Harvesting(Days)</th>
				<th></th>
				<th></th>
				<th></th>
				
			</tr>

			@foreach ($crops as $crop)
			<tr>
				<td>{{ $crop->name }}</td>
				<td>{{ $crop->days_until_harvest }}</td>
				<td><a href="/dashboard/crops/{{ $crop->id }}/tips/new"><button type="button" class="btn btn-primary btn-sm">Add Tip</button></a></td>
				<td><button type="button" class="btn btn-primary btn-sm">Edit</button>
				<td><button type="button" class="btn btn-primary btn-sm">Delete</button></td>
			</tr>
			@endforeach		
	@stop