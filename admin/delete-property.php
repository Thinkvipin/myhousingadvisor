<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');



if(isset($_POST['Pid'])){
	$pid = $_POST['Pid'];

	

	$query2 = mysqli_query($conn,"DELETE FROM `property_features` WHERE pid = '$pid'");
	$query3 = mysqli_query($conn,"DELETE FROM `property_sliders` WHERE pid = '$pid'");
	$query4 = mysqli_query($conn,"DELETE FROM `premium_property` WHERE pid = '$pid'");
	$query = mysqli_query($conn,"DELETE FROM `property` WHERE pid = '$pid'");

	echo "Property Successfully Deleted";


}

// $query = mysqli_query($conn,"SELECT * FROM property ORDER BY pid DESC");




?>