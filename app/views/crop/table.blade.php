<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crops</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

    #add{
    	float: right;
    }

    </style>
  </head>
  <body>
	<h1>Crops</h1>
		 <a href = "/dashboard/crops/new"><button type="button" class="btn btn-primary btn-lg" id="add">Add Record</button></a>
		<table class="table table-striped">
			<tr>
				<td>Crop Name</td>
				<td>Last Recorded Price(per lb)</td>
				<td>Recommend Days Before Harvesting(Days)</td>
				<td>Amount Produced Last Month(Kg)</td>
				<td>Tips</td>
				<td></td>
				
			</tr>

			@foreach ($crops as $crop)
			<tr>
				<td>{{ $crop->name }}</td>
				<td>{{ $crop->price }}</td>
				<td>{{ $crop->days_until_harvest }}</td>
				<td>{{ $crop->amount_produced }}</td>
				<td><button type="button" class="btn btn-primary btn-sm">Add Tip</button></td>
				<td> <button type="button" class="btn btn-primary btn-sm">Edit</button> / <button onclick="myfunction()" type="button" class="btn btn-default btn-sm">Delete</button>
			</tr>
			@endforeach		
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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