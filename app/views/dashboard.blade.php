@extends('layouts.base')
	@section('content')

	<style type="text/css">

       p, span, a, ul, li, button {
          font-family: inherit;
          font-size: inherit;
          font-weight: inherit;
          line-height: inherit;
        }

        img {
          height: 1000px;
          width: 4912px;
        }

        strong {
          font-weight: 600;
        }

        h1, h2, h3, h4, h5, h6 {
          font-family: "Open Sans", "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
          line-height: 1.5em;
          font-weight: 300;
        }

        strong {
          font-weight: 400;
        }

        .tile {
          width: 100%;
          display: inline-block;
          box-sizing: border-box;
          background: #fff;
          padding: 20px;
          margin-bottom: 30px;
        }
        .tile .title {
          margin-top: 0px;
        }
        .tile.purple, .tile.blue, .tile.red, .tile.orange, .tile.green {
          color: #fff;
        }
        .tile.purple {
          background: #5133AB;
        }
        .tile.purple:hover {
          background: #3e2784;
        }
        .tile.red {
          background: #AC193D;
        }
        .tile.red:hover {
          background: #7f132d;
        }
        .tile.green {
          background: #00A600;
        }
        .tile.green:hover {
          background: #007300;
        }
        .tile.blue {
          background: #2672EC;
        }
        .tile.blue:hover {
          background: #125acd;
        }
        .tile.orange {
          background: #DC572E;
        }
        .tile.orange:hover {
          background: #b8431f;
        }

    </style>

      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          
          <div class="item active">
            <img src="/unknown.jpg" alt="">
            <div class="carousel-caption">
              
            </div>
          </div>
          <div class="item">
            <img src="/cow-large.jpg" alt="">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>


		<div class="container" style = "margin-top: 40px;">
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
		    	<a href="/dashboard/pests">
		      <div class="tile green">
		        <h3 class="title">Pests</h3>
		      </div>
		  		</a>
		    </div>   
		    <div class="col-sm-4">
		    	<a href="/dashboard/questions">
		      <div class="tile green">
		        <h3 class="title">Questions</h3>
		      </div>
		  		</a>
		    </div>     
		  </div>
		</div>
    <div class="row">
        <div class="col-sm-4" style = "float: none; margin: 0 auto;">
         <a href="/dashboard/help">  
          <div class="tile blue">
            <h3 class="title">Help</h3>
          </div>
        </a>
        </div>
    </div>

	@stop