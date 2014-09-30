<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Login</title>
    <style>
		div{
			margin: 0px auto;
			box-shadow: 20px 20px 10px #888888;
			padding:100px 100px 100px 100px;
			width:300px;
			height:300px;
			background-color:white;
			
		}
		
		
		#logo{
			float:right;
			width:110px;
			height:110px;
		}
	</style>
  </head>
  <body>
	  <div>
			<h3>Sign In</h3>
			<img src="grass.jpg" alt="Grass" id="logo"> 
			<form method="get" action="/auth">
			  <h5>Telephone Number</h5>
			  <input type="text" maxlength="40"  id="user">
			  </br>
			  <h5>Password</h5>
			  <input type="text" maxlength="50"  id="pass">
			  </br>
			  <input type="submit" value="Login">
			</form>
	  
	  </div>
  </body>
</html>