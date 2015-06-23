
<?php
require 'core.inc.php';
require 'connect.inc.php';
$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;
$err5 = 0;

if (!loggedin()) {
	if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['username'])&&isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];
		$password_hash = md5($password);
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$raddr = $_POST['raddr'];
		$city = $_POST['city'];

		if (!empty($username)&& !empty($password)&& !empty($password_again)&& !empty($firstname)&& !empty($surname)&& !empty($mobile)&& !empty($email)&& !empty($raddr)&& !empty($city)) {
			if(strlen($username)>30||strlen($firstname)>40||strlen($surname)>40||strlen($mobile)>10||strlen($email)>80||strlen($raddr)>150||strlen($city)>40){
				$err2 = 1;
				
			}else{
				if ($password!=$password_again) {
					$err3 = 1;
					
				}else{

					$query = "SELECT username FROM users WHERE username = '$username'";
					$query_run = mysql_query($query);

					if (mysql_num_rows($query_run)==1) {
						$err4 = 1;
						
					}
					else{
						$query = "INSERT INTO  users VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."','".mysql_real_escape_string($mobile)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($raddr)."','".mysql_real_escape_string($city)."')";
						$sql = "CREATE TABLE $username (
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
						Deposit_Money FLOAT(6) NOT NULL,
						Withdraw_Money FLOAT(6) NOT NULL,
						Current_Money FLOAT(6) NOT NULL, 
						Track_Transactions TIMESTAMP,
						Edit_Transactions FLOAT(6) NOT NULL
						)";
						$sql2 = "INSERT INTO $username VALUES('','0','0','0','','0')";
						if($query_run = mysql_query($query) && $query_run2 = mysql_query($sql) && $query_run3 = mysql_query($sql2)){
							header('Location: register_success.php');
						}else{
							$err5 = 1;
							
						}
					}
				}
			}
		}else{
			$err1 = 1;
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/ico" href="favicon.ico">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<h1 class="heading">X BANK</h1>

	<div class="container">
	  <h2 style="padding:20px; margin-top:0px;">Register New Users</h2>
	  <form class="form-horizontal" id="myForm" role="form" action="<?php echo $current_file; ?>" method="POST">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="a">Username: </label>
	      <div class="col-sm-3">
	        <input type="text" name="username" maxlength="30" class="form-control" placeholder="Enter your username" value="<?php if(isset($username)){ echo $username; } ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Password:</label>
	      <div class="col-sm-3">          
	        <input type="password" name="password" class="form-control" placeholder="Enter password">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Password again:</label>
	      <div class="col-sm-3">          
	        <input type="password" name="password_again" class="form-control" placeholder="Re-Enter password">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Firstname:</label>
	      <div class="col-sm-3">          
	        <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" maxlength="40" value="<?php if(isset($firstname)){ echo $firstname; } ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Lastname:</label>
	      <div class="col-sm-3">          
	        <input type="text" name="surname" class="form-control" placeholder="Enter Firstname" maxlength="40" value="<?php if(isset($surname)){ echo $surname; } ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Mobile Number:</label>
	      <div class="col-sm-3">          
	        <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number" maxlength="10" value="<?php if(isset($mobile)){ echo $mobile; } ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">E-mail:</label>
	      <div class="col-sm-3">          
	        <input type="text" name="email" class="form-control" placeholder="Enter E-mail Address" maxlength="80" value="<?php if(isset($email)){ echo $email; } ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">Residential Address:</label>
	      <div class="col-sm-3">          
	        <input type="text" name="raddr" class="form-control" placeholder="Enter Residential Address" maxlength="150" value="<?php if(isset($raddr)){ echo $raddr; } ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="b">City:</label>
	      <div class="col-sm-3">          
	        <input type="text" name="city" class="form-control" placeholder="Enter city" maxlength="40" value="<?php if(isset($city)){ echo $city; } ?>">
	      </div>
	    </div>
	    <div style="color: red;margin-left: 90px;margin-bottom: 20px;font-weight: bold;">
	    	<?php
	    	if ($err1 == 1) {
	    		echo "All fields are required.";
	    	}
	    	if ($err2 == 1) {
	    		echo "Please adher to maxlength of fields.";
	    	}
	    	if ($err3 == 1) {
	    		echo "Password do not match";
	    	}
	    	if ($err4 == 1) {
	    		echo "This username already exists.";
	    	}
	    	if ($err5 == 1) {
	    		echo "Sorry, we couldn\'t register you at this time.Try again later.";
	    	}
	    	?>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	      	<input type="submit" value="Register" class="btn btn-default">
	      </div>
	    </div>
	  </form>
	</div>
</body>
</html>
<?php
}
elseif (loggedin()) {
	echo "You are already registered and logged in.";
}
?>