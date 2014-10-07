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

       p, span, a, ul, li, button {
          font-family: inherit;
          font-size: inherit;
          font-weight: inherit;
          line-height: inherit;
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
	</head>
	<body>
            @yield('content')                
    </body>
</html>