@extends('layouts.base')
  @section('content')
  <h1>Questions</h1>
    <table class="table table-striped">

    @if ($questions->count())
    	@foreach ($questions as $question)
      <tr>
        <td>{{ $question->content }}</td>
      </tr>
      @endforeach

    @else
    	<h3>No new questions.</h3>
 	@endif
         
  @stop