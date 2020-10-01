<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');


$query = mysqli_query($conn,"SELECT * FROM property ORDER BY pid DESC");

$fulldata = '';

$i = 0;
while($fetch_data = mysqli_fetch_assoc($query)){
$i++;
	$fulldata .= "<tr class='todo-list-item'>

					<td>".$i."</td>
					<td>".$fetch_data['name']."</td>
					<td>".$fetch_data['location']."</td>
					<td>".number_format($fetch_data['price'])."</td>
					<td>".$fetch_data['purpose']."</td>
					<td>".$fetch_data['area']." sqft</td>
					
					<td><a href='edit-property.php?p=".$fetch_data['pid']."' class='edit' p='".$fetch_data['pid']."'>
									<em class='fa fa-edit'></em>
								</a></td>
					<td><a href='#' class='trash' p='".$fetch_data['pid']."'>
									<em class='fa fa-trash'></em>
								</a></td>
				</tr>";

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Widgets</title>
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
	<?php 
		include_once('header.php');	
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Listed Property</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Listed Property</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
						<div class="panel-heading">Forms
							<ul class="pull-right panel-settings panel-button-tab-right">
								<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
									<em class="fa fa-cogs"></em>
								</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li>
											<ul class="dropdown-settings">
												<li><a href="#">
													<em class="fa fa-cog"></em> Settings 1
												</a></li>
												<li class="divider"></li>
												<li><a href="#">
													<em class="fa fa-cog"></em> Settings 2
												</a></li>
												<li class="divider"></li>
												<li><a href="#">
													<em class="fa fa-cog"></em> Settings 3
												</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="panel-body">

							<ul class="todo-list">
								<li class="todo-list-item">
									
								</li>
							</ul>
							<table class="table">
						    <thead>
						      <tr>
						        <th>#</th>
						        <th>Name</th>
						        <th>Location</th>
						        <th>Price</th>
						        <th>Purpose</th>
						        <th>Area</th>
						        <th></th>
						        <th></th>
						      </tr>
						    </thead>
						    <tbody>
						      <?php 
						      	echo $fulldata;
						      ?>
						    </tbody>
						  </table>	
							<!-- <div class="col-md-6">
								<form role="form">
									<div class="form-group">
										<label>Text Input</label>
										<input class="form-control" placeholder="Placeholder">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control">
									</div>
									<div class="form-group checkbox">
										<label>
											<input type="checkbox">Remember me
										</label>
									</div>
									<div class="form-group">
										<label>File input</label>
										<input type="file">
										<p class="help-block">Example block-level help text here.</p>
									</div>
									<div class="form-group">
										<label>Text area</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
									<label>Validation</label>
									<div class="form-group has-success">
										<input class="form-control" placeholder="Success">
									</div>
									<div class="form-group has-warning">
										<input class="form-control" placeholder="Warning">
									</div>
									<div class="form-group has-error">
										<input class="form-control" placeholder="Error">
									</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Checkboxes</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="">Checkbox 1
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="">Checkbox 2
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="">Checkbox 3
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="">Checkbox 4
												</label>
											</div>
										</div>
										<div class="form-group">
											<label>Radio Buttons</label>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio Button 1
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Button 2
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
												</label>
											</div>
										</div>
										<div class="form-group">
											<label>Selects</label>
											<select class="form-control">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
												<option>Option 4</option>
											</select>
										</div>
										<div class="form-group">
											<label>Multiple Selects</label>
											<select multiple class="form-control">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
												<option>Option 4</option>
											</select>
										</div>
										<button type="submit" class="btn btn-primary">Submit Button</button>
										<button type="reset" class="btn btn-default">Reset Button</button>
									</div>
								</form>
							</div> -->
						</div>
				</div>
			</div>
			<div class="col-sm-12">
				<p class="back-link">Designed by <a href="http://www.codeweb.co.in">codeweb.co.in</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	  

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


