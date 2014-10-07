@extends('layouts.base')
	@section('content')
		<h2>Pests that affect {{ $crop->name }}</h2>

		@foreach($pests as $pest)
		<div>
			<h3>{{ $pest->type }}</h3>
			<h4>Management: {{ $pest->management_method }}</h4>
		</div>
		@endforeach

	@section('stop')