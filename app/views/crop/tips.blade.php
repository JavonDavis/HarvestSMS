@extends('layouts.base')
	@section('content')
		<h2>Tips for {{ $crop->name }}</h2>
		<a href="/dashboard/crops/{{ $crop->id }}/tips/new"><button class = "btn btn-primary">Add A Tip</button></a>
		@foreach($croptips as $tip)
		<div>
			<h3>{{ $tip->description }}</h3>
			<p>{{ $tip->content }}</p>
		</div>
		@endforeach

	@section('stop')