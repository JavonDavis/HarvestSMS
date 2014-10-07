@extends('layouts.base')
	@section('content')
		<h2>Pests that affect {{ $crop->name }}</h2>

		@foreach($pests as $pest)
		<div>
			<p>{{ $pest->type }}</p>
			<p>Management: {{ $pest->management_method }}</p>
		</div>
		@endforeach

	@section('stop')