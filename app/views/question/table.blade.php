@extends('layouts.base')
  @section('content')
  <h1>Questions</h1>
    <table class="table table-striped">
      @foreach ($questions as $question)
      <tr>
        <td>{{ $question->content }}</td>
      </tr>
      @endforeach   
  @stop