@extends('layouts.base')
	@section('content')

		<div class="container">
		  <div class="row">
		    <div class="col-md-12">
		     <h1><strong>Basic Agricultural Learning Environment - Dashboard</strong></h1>
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-sm-4">
		     <a href="/dashboard/crops">	
		      <div class="tile green">
		        <h3 class="title">Crops</h3>
		      </div>
		  	</a>
		    </div>
		    <div class="col-sm-4">
		     <a href="/dashboard/livestock">	
		      <div class="tile green">
		       <h3 class="title">Livestock</h3>
		      </div>
		  	</a>
		    </div>
		    <div class="col-sm-4">
    	 		<a href="/dashboard/fertilizers">
		      <div class="tile green">
		        <h3 class="title">Fertilizer</h3>
		      </div>
		  		</a>
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-sm-4">
		    	<a href="/dashboard/announcements">
		      <div class="tile green">
		        <h3 class="title">Announcements</h3>
		      </div>
		  		</a>
		    </div>
		    <div class="col-sm-4">
		    	<a href="/dashboard/questions">
		      <div class="tile blue">
		        <h3 class="title">Questions</h3>
		      </div>
		  		</a>
		    </div>   
		    <div class="col-sm-4">
		    	<a href="/dashboard/help"></a>
		      <div class="tile blue">
		        <h3 class="title">Help</h3>
		      </div>
		  		</a>
		    </div>     
		  </div>
		</div>

	@stop