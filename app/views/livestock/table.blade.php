@extends('layouts.base')
	@section('content')
	<h1>Livestock</h1>
		 <a href = "/dashboard/livestock/new"><button type="button" class="btn btn-primary btn-md" id="add">Add Record</button></a>
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<th>Care</th>
				<th>Feed</th>
				<th>Getting Started</th>
				<th></th>
				<!-- <th></th> -->
				<th></th>
				
			</tr>

			@foreach ($livestocks as $livestock)
			<tr>
				<td>{{ $livestock->name }}</td>
				<td><p>{{ $livestock->care_methods }}</p></td>
				<td><p>{{ $livestock->feed }}</p></td>
				<td><p>{{ $livestock->getting_started }}</p></td>
				<td><a href="/dashboard/livestock/{{ $livestock->id }}/tips/new"><button type="button" class="btn btn-primary btn-sm">Add Tip</button></a></td>
				<!-- <td><button type="button" class="btn btn-primary btn-sm">Edit</button> -->
				<td><button type="button" class="btn btn-primary btn-sm">Delete</button></td>
			</tr>
			@endforeach		
	@stop