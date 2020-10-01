<?php

include_once('connection_db.php');
session_start();
error_reporting(E_ALL);

if(!isset($_SESSION['username'])){

	header('Location: https://ich-europcr.info/property/admin/login.php');
	
	echo "google";

}


if(isset($_POST['username'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	header('Location: https://ich-europcr.info/property/admin');

	$query = mysqli_query($conn,"SELECT * FROM `user_admin` WHERE `username` = '$username' AND password = '$password'");
	$fetch_data = mysqli_fetch_assoc($query);
	$count = mysqli_num_rows($query);

	if($count > 0){
		
		$_SESSION['username'] = $fetch_data['name'];
		header('Location: https://ich-europcr.info/property/admin/property-list.php');
		$_SESSION['login_success'] = true;

	}else{
		$_SESSION['login_success'] = false;
	}

}

?>