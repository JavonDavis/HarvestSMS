@extends('layouts.base')
	@section('content')
		<h2>Crops affected by {{ $pest->type }}</h2>

		@foreach($crops as $crop)
		<li>
			<h4>{{ $crop->name }}</h4>
		</li>
			
		@endforeach

	@section('stop')