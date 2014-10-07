@extends('layouts.base')
	@section('content')
		<h2>Tips for {{ $livestock->name }}</h2>

		@foreach($livestocktips as $tip)
		<div>
			<p>{{ $tip->description }}</p>
			<p>{{ $tip->content }}</p>
		</div>
		@endforeach

	@section('stop')