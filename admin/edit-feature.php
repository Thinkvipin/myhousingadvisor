<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');
date_default_timezone_set('Asia/Kolkata');


if(isset($_POST['Fid'])){
	
	$fid = $_POST['Fid'];
	$ftitle = $_POST['Ftitle'];

	$query = mysqli_query($conn,"UPDATE `features` SET `title`= '$ftitle' WHERE fid = '$fid'");

	echo "Update Successfully";
}
if(isset($_POST['DeleteFid'])){

	$fid = $_POST['DeleteFid'];

	$query = mysqli_query($conn,"DELETE FROM `features` WHERE fid = '$fid'");

	echo "Delete Successfully";
}


if(isset($_POST['Tid'])){
	
	$id = $_POST['Tid'];
	$title = $_POST['Ttitle'];

	$query = mysqli_query($conn,"UPDATE `property_type` SET `type`= '$title' WHERE tid = '$id'");

	echo "Update Successfully";
}
if(isset($_POST['DeleteTid'])){

	$id = $_POST['DeleteTid'];

	$query = mysqli_query($conn,"DELETE FROM `property_type` WHERE tid = '$id'");

	echo "Delete Successfully";
}


?>


