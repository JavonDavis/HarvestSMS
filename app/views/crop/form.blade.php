<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BALE - Basic Agricultural Learning Environment</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

    	#sub{
    		margin-left: 10%;
    	}

    	.checkbox, h2{
    		margin-left: 10%;
    	}

    	body{
    		margin-left: 30%;
    		margin-top: 10%;
    	}

    	h1{
    		margin-left: 5%;
    	}

    </style>
	</head>
	<body>
		<h1>Crop Input</h1>

		{{ Form::open(array('url' => '/dashboard/crops', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('name', 'Crop Name', array('class' => 'colsm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('name', 'Crop Name', array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('price', 'Last Recorded Price', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('price', 'Price', array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('days', 'Recommended Days Before Harvest', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('days', '100 days', array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('amount', 'Amount Produced Last Month', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('amount', '500', array('class' => 'form-control')) }}
			</div>
		</div>

	 	<h2>Fertilizers</h2>

	 	@foreach ($fertilizers as $fertilizer)
	  		<div class="checkbox">
	  			<label>
	  				{{ Form::checkbox('fertilizers[]', '$fertilizer->name' ) }}
	  				{{ $fertilizer->name }}
	  			</label>
	  		</div>
	  	@endforeach

	  	<br/>

	  	{{ Form::submit('Submit', array('class' => 'btn-default', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

		{{ Form::close() }}
		
		<script type="text/javascript">
		function myfunction( event ) {
			event.preventDefault();
			var r = confirm("Are You Sure?");
			if (r == true) {
				alert("ok");
			}else {
				alert("bad");
			}

		}
		</script>
		
	  </body>
</html>