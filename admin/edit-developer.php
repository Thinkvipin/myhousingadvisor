<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');
date_default_timezone_set('Asia/Kolkata');




if(isset($_POST['Uid'])){
	
	$id = $_POST['Uid'];
	$name = $_POST['Uname'];

	$query = mysqli_query($conn,"UPDATE `list_builder` SET `name` = '$name' WHERE bid = '$id'");

	echo "Update Successfully";

}

// delete user
if(isset($_POST['DeleteUid'])){

	$id = $_POST['DeleteUid'];

	$query = mysqli_query($conn,"DELETE FROM `list_builder` WHERE bid = '$id'");

	echo "Delete Successfully";

}


?>


