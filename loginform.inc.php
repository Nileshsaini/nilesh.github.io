<?php
$error1 = 0;
$error2 = 0;
$error3 = 0;

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$password_hash = md5($password);

	if (!empty($username)&&!empty($password)) {

		$query = "SELECT id FROM users WHERE username = '".mysql_real_escape_string($username)."' AND password = '".mysql_real_escape_string($password_hash)."'";
		if ($query_run = mysql_query($query)) {
			$query_num_rows = mysql_num_rows($query_run);

			if ($query_num_rows==0) {
				$error1 = 1;
			}
			else if($query_num_rows==1){
				$user_id = mysql_result($query_run, 0, 'id');
				echo $user_id;
				$_SESSION['user_id'] = $user_id;
				header('Location: index.php');
			}
		}else{
			$error2 = 1;
		}
	}else{
		$error3 = 1;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/ico" href="favicon.ico">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="index.html">X Bank</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="index.html">Home</a></li>
	     	<li><a href="#">Personal</a></li>
	        <li><a href="script.js">Wealth</a></li>
	        <li><a href="#">NRI</a></li>
	        <li><a href="reachus.html">Reach Us</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<h1 class="heading">X BANK</h1>

	<div class="container">
	  <h2 style="padding:20px; margin-top:0px;">Login Here</h2>
	  <form class="form-horizontal" id="myForm" role="form" action="<?php echo $current_file; ?>" method="POST">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="a">Username: </label>
	      <div class="col-sm-3">
	        <input type="text" name="username" class="form-control1 reqd" placeholder="Enter your username">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Password:</label>
	      <div class="col-sm-3">          
	        <input type="password" name="password" class="form-control1 reqd" placeholder="Enter your secret password">
	      </div>
	    </div>
	    <div style="color: red;margin-left: 90px;margin-bottom: 20px;font-weight: bold;">
	    	<?php
	    		if ($error1 == 1) {
	    			echo "Invalid Username or password.";
	    		}
	    		if ($error2 == 1) {
	    			echo "There is an error in running query.";
	    		}
	    		if ($error3 == 1) {
	    			echo "You must a supply a username and password.";
	    		}
	    	?>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	      	<input type="submit" value="Log in" class="btn btn-default">
	      </div>
	    </div>
	  </form>
	</div>

	
</body>
</html>