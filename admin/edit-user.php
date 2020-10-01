<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');
date_default_timezone_set('Asia/Kolkata');




if(isset($_POST['Uid'])){
	
	$id = $_POST['Uid'];
	$name = $_POST['Uname'];
	$username = $_POST['Username'];
	$password = $_POST['Upassword'];

	$query = mysqli_query($conn,"UPDATE `user_admin` SET `name`= '$name',`username`= '$username',`password`= '$password' WHERE id = '$id'");

	echo "Update Successfully";
}

// delete user
if(isset($_POST['DeleteUid'])){

	$id = $_POST['DeleteUid'];

	$query = mysqli_query($conn,"DELETE FROM `user_admin` WHERE id = '$id'");

	echo "Delete Successfully";
}


?>


