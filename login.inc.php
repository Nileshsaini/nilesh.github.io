<?php
if (isset($_POST['deposit'])) {
	$deposit = $_POST['deposit'];
	$username = getuserfield('username');

	function getuserfield2($field) {
		$username = getuserfield('username');
		$query3 = "SELECT MAX(id) from $username";
		
		$row =  mysql_query($query3) - 0;
		$query = "SELECT $field FROM $username WHERE id = LAST_INSERT_ID()";
		if ($query_run = mysql_query($query)) {
			if ($query_result = mysql_result($query_run, $row, $field)) {
				return $query_result;
			}
		}
	}

	if (!empty($deposit)) {
		$currentMoney = getuserfield2('Current_Money');
		
		$query1 = "INSERT INTO $username VALUES ('','$deposit','0','$currentMoney','','0')";
		$query2 = "UPDATE $username SET Current_Money=`$deposit+$currentMoney` WHERE id=LAST_INSERT_ID()";

		if($query1_run = mysql_query($query1)) {
			if ($query2_run = mysql_query($query2)) {
				
			}else{
				echo "error running query2.";
			}
			
		}else{
			echo "error running query1";
		}
	}
	else{
		echo "please enter values.";
	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logged in</title>
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
	      <a class="navbar-brand" href="#">X Bank</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="disabled"><a href="#">Home</a></li>
	     	<li class="disabled"><a href="#">Personal</a></li>
	        <li class="disabled"><a href="#">Wealth</a></li>
	        <li class="disabled"><a href="#">NRI</a></li>
	        <li><a href="reachus.html" target="_blank">Reach Us</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<h1 class="heading">X BANK</h1>
	<div>
		<?php

		$firstname = getuserfield('firstname');
		$surname = getuserfield('surname');
		echo '<h2>You are logged in, '.$firstname.' '.$surname.'</h2>';
		echo 'Current balance is '.$currentMoney;
		?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6" align="center">
				<h3 style="margin-bottom: 20px;">Deposit Money</h3>
				
				<form class="form-horizontal" id="myForm" role="form" action="<?php echo $current_file; ?>" method="POST">
					<div class="form-group">
		      			<label class="control-label col-sm-4" for="b">Deposit Money:</label>
		      			<div class="col-sm-5">          
		        			<input type="number" name="deposit" class="form-control" placeholder="Enter the amount of money to be deposit" maxlength="5">
		      			</div>
		    		</div>
		    		<div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				      	<input type="submit" value="Submit" class="btn btn-default">
				      </div>
				    </div>
	    		</form>
			</div>
			<div class="col-md-6" align="center">
				<h3 style="margin-bottom: 20px;">Withdraw Money</h3>

				<form class="form-horizontal" role="form" action="<?php echo $current_file; ?>" method="POST">
					<div class="form-group">
		      			<label class="control-label col-sm-4" for="b">Withdraw Money:</label>
		      			<div class="col-sm-5">          
		        			<input type="number" name="withdraw" class="form-control" placeholder="Enter the amount of money to withdraw" maxlength="5">
		      			</div>
		    		</div>
		    		<div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				      	<input type="submit" value="Submit" class="btn btn-default">
				      </div>
				    </div>
	    		</form>
			</div>
		</div>
	</div>
</body>
</html>