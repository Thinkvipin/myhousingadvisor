<?php 

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');
date_default_timezone_set('Asia/Kolkata');
$query = mysqli_query($conn,"SELECT * FROM `contact_enquiry` WHERE email != '' OR contact != '' ORDER BY sno DESC");

$enquiry = '';
$i = 0;
while($fetch_Data = mysqli_fetch_assoc($query)){

$i++;
	$enquiry .= "<tr class='todo-list-item'>

					<td>".$i."</td>
					<td>".$fetch_Data['name']."</td>
					<td>".$fetch_Data['email']."</td>
					<td>".$fetch_Data['contact']."</td>
					<td>".$fetch_Data['country']."</td>
					<td>".$fetch_Data['message']."</td>
				</tr>";

}


$query02 = mysqli_query($conn,"SELECT * FROM `property_leads` WHERE email != '' OR contact != '' ORDER BY lead_id DESC");

$prop_leads = '';
$k = 0;
while($fetch_Data = mysqli_fetch_assoc($query02)){


	$pid = $fetch_Data['pid'];

	$query03 = mysqli_query($conn,"SELECT name FROM property WHERE pid = '$pid'");
	$fetch_Data03 = mysqli_fetch_assoc($query03);



$k++;
	$prop_leads .= "<tr class='todo-list-item'>

					<td>".$k."</td>
					<td>".$fetch_Data03['name']."</td>
					<td>".$fetch_Data['name']."</td>
					<td>".$fetch_Data['email']."</td>
					<td>".$fetch_Data['contact']."</td>
					<td>".$fetch_Data['datetime']."</td>
					<td>".$fetch_Data['country']."</td>
					<td>".$fetch_Data['message']."</td>
				</tr>";

}



die();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Panels</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('header.php'); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Panels</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Website Leads</h2>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">Contact Enquiry</a></li>
							<li><a href="#pilltab2" data-toggle="tab">Property Leads</a></li>
							<!-- <li><a href="#pilltab3" data-toggle="tab">Tab 3</a></li> -->
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="pilltab1">
								
								<table class="table">
								    <thead>
								      <tr>
								        <th>#</th>
								        <th>Name</th>
								        <th>Email</th>
								        <th>Contact</th>
								        <th>Country </th>
								        <th>Message</th>
								      </tr>
								    </thead>
								    <tbody>
								      <?php 
								      	echo $enquiry;
								      ?>
								    </tbody>
								  </table>
							</div>
							<div class="tab-pane fade" id="pilltab2">
								<table class="table">
								    <thead>
								      <tr>
								        <th>#</th>
								        <th>Property Name</th>
								        <th>Name</th>
								        <th>Email</th>
								        <th>Contact</th>
								        <th>Call Time</th>
								        <th>Country </th>
								        <th>Message</th>
								      </tr>
								    </thead>
								    <tbody>
								      <?php 
								      	echo $prop_leads;;
								      ?>
								    </tbody>
								  </table>
							</div>
							<!-- <div class="tab-pane fade" id="pilltab3">
								<h4>Tab 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor.</p>
							</div> -->
						</div>
					</div>
				</div><!--/.panel-->
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
