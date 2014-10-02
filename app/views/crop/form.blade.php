<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BALE - Basic Agricultural Learning Environment</title>

    <!-- Bootstrap -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>

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

		{{ Form::open(array('url' => '/postCrops', array('class' => 'form-horizontal')))}}
			echo Form::label('');
		{{ Form::close() }}
		<form class="form-horizontal" role="form" id="crop_form" action = "">
	  	<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Crop Name</label>
			<div class="col-sm-10">
		  		<input type="text" class="form-control" id="crop" placeholder="Crop Name" name = "name">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="price" class="col-sm-2 control-label">Last Recorded Price</label>
			<div class="col-sm-10">
		  		<input type="number" class="form-control" id="price" placeholder="Price" name = "price">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="days" class="col-sm-2 control-label">Recommended Days Before Harvest</label>
			<div class="col-sm-10">
	  			<input type="number" class="form-control" id="days" placeholder="Days" name = "days">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="amount" class="col-sm-2 control-label">Amount Produced Last Month</label>
			<div class="col-sm-10">
		  		<input type="number" class="form-control" id="amount" placeholder="Amount Produced" name = "amount">
			</div>
	  	</div>
	  	<h2>Fertlizers</h2>

	  	@foreach ($fertilizers as $fertilizer)
	  		<div class="checkbox"></div>
	  		<label for = "{{ $fertilizer->name }}">{{ $fertilizer->name }}</label>
	  		<input type = "checkbox" name = "fertilizers[]" id = "{{ $fertilizer->name }}" value = "{{ $fertilizer->name }}">
	  	@endforeach
				<input type="checkbox" value="">
		  </label>
		</div>
		<div class="checkbox">
		  <label>
			<input type="checkbox" value="">
			Synthetic Fertilizer
		  </label>
		</div>
		<h2>Pests</h2>
		<div class="checkbox">
		  <label>
			<input type="checkbox" value="">
			Beetles
		  </label>
		</div>
		<div class="checkbox">
		  <label>
			<input type="checkbox" value="">
			Moles
		  </label>
		</div>
		<br/>
		 <button onclick="myfunction()" type="submit" class="btn-default" id="sub">Submit</button>
		</form>
		
		<script type="text/javascript">
		function myfunction() {
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