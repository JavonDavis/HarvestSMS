@extends('layouts.base')
	@section('content')
		<h2>Tips for {{ $crop->name }}</h2>

		@foreach($croptips as $tip)
		<div>
			<p>{{ $tip->description }}</p>
			<p>{{ $tip->content }}</p>
		</div>
		@endforeach

	@section('stop')