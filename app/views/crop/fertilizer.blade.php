@extends('layouts.base')
	@section('content')
		<h2>Fertilizers used for {{ $crop->name }}</h2>

		@foreach($fertilizers as $fertilizer)
		<div>
			<h4>{{ $fertilizer->name }}</h4>
		</div>
		@endforeach

	@section('stop')