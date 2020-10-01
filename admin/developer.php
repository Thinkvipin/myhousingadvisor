<?php
include_once('../connection_db.php');
session_start();
include_once('login_validation.php');


$echo = '';
if(isset($_POST['name'])){

	$name = $_POST['name'];

	
	$query00 = mysqli_query($conn,"INSERT INTO `list_builder`(`name`) VALUES ('$name')");

	$echo = "Added Successfully";
	
}
$query = mysqli_query($conn,"SELECT * FROM `list_builder` ORDER BY bid DESC");

$fulldata = '';

$i = 0;
while($fetch_data = mysqli_fetch_assoc($query)){
$i++;
	$fulldata .= "<tr class='todo-list-item'>

					<td>".$i."</td>
					<td><input type='text' value='".$fetch_data['name']."' class='form-control feature-title name".$fetch_data['bid']."' disabled p='".$fetch_data['bid']."'></td>
					<td><a href='#' class='f-edit' p='".$fetch_data['bid']."'>
									<em class='fa fa-edit'></em>
								</a></td>
					<td><a href='#' class='f-trash' p='".$fetch_data['bid']."'>
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
				<h1 class="page-header">Listed Features</h1>
				<?php echo $echo; ?>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
						<div class="panel-heading">Features
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
						<div class="panel panel-default">
								<div class="panel-body">
									<form action='' method='post'>	
						    			<div class='col-md-6'>
						        			<div class='form-group'>
												<label>Name</label>
												<input type='text' class='form-control' placeholder='Name' value='' name='name'>
											</div>
											<input type='submit' class='btn btn-sm btn-info' value='Add User'>
						        		</div>
						        	</form>	
								</div>
							</div><!-- /.panel-->
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
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.f-edit',function(){
			var uid = $(this).attr('p');
			$(this).removeClass('f-edit').addClass('f-update').text('Update');		
			$(".name"+uid).prop("disabled", false);
		});
		$(document).on('click','.f-update',function(){
			var uid = $(this).attr('p');
			$(this).removeClass('f-update').addClass('f-edit').html('<em class="fa fa-edit"></em>');		
			$(".name"+uid).prop("disabled", true);
			var uname = $(".name"+uid).val();   
			$.ajax({
			      type: 'POST',
			      url: "edit-developer.php",
			      data: {Uid:uid,Uname:uname},
			      dataType: "text",
			      success: function(data) { 
			      	alert(data);
			      	location.reload();
			      }
			});
		});
		$(document).on('click','.f-trash',function(){
			var deleteUid = $(this).attr('p'); 
			$.ajax({
			      type: 'POST',
			      url: "edit-developer.php",
			      data: {DeleteUid:deleteUid,},
			      dataType: "text",
			      success: function(data) { 
			      	alert(data);
			      	location.reload();
			      }
			});
		});
	});
</script>	
</body>
</html>


