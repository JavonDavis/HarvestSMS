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

    	body{
    		margin: 0 auto;
    		max-width: 800px;
    	}

    </style>
	</head>
	<body>
		<h1>New Announcement</h1>

		{{ Form::open(array('url' => '/dashboard/announcements', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('description', 'Announcement description') }}
			{{ Form::text('description', 'Announcement Description', array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Announcement') }}
			{{ Form::textarea('content', '', array('class' => 'form-control')) }}
		</div>

	  	{{ Form::submit('Submit', array('class' => 'btn', 'id' => 'sub', 'onclick' => 'myFunction()')) }}

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