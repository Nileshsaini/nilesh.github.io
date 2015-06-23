<?php
require 'core.inc.php';
require 'connect.inc.php';

if (loggedin()) {
	include 'login.inc.php'; 
}	else{
	include 'loginform.inc.php';
}
?>	 