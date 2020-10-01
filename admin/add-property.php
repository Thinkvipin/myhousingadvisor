<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');
date_default_timezone_set('Asia/Kolkata');


if(isset($_POST['location'])){

	$name = $_POST['name'];
	$title = $_POST['title'];
	$location = $_POST['location'];
	$price = $_POST['price'];
	$area = $_POST['area'];
	$description = $_POST['description'];
	$bedroom = $_POST['bedroom'];
	$bathroom = $_POST['bathroom'];
	$carparking = $_POST['carparking'];
	$featured = $_POST['featured'];


	$purpose = $_POST['purpose'];
	$propType = $_POST['prop_type'];
	$updated_on = date("Y-m-d H:i:s");

	$prop_features = $_POST['feature'];


	$query = mysqli_query($conn,"INSERT INTO `property`(`title`,`name`, `location`, `price`, `purpose`, `description`, `area`, `bedroom`, `bathroom`, `carparking`, `thumbnail`, `type_id`, `featured`) VALUES ('$title','$name','$location','$price','$purpose','$description','$area','$bedroom','$bathroom','$carparking','','$propType','$featured')");

	$query01 = mysqli_query($conn,"SELECT pid FROM  `property` ORDER BY pid DESC LIMIT 1");
	$fetch_data01 = mysqli_fetch_assoc($query01);
	$pid = $fetch_data01['pid'];

	for ($z=0; $z<sizeof($prop_features);$z++)
        {
        	$cval = $prop_features[$z];
            $query02=mysqli_query($conn,"INSERT INTO `property_features`(`fid`, `pid`) VALUES ('$cval','$pid')"); 
        }

	$msg = "<a href='add-property.php' class='btn btn-primary'>Go Back</a>";


	$thumbnail = '';

	if($_FILES['propThumbanil']['name'] != ''){

		move_uploaded_file($_FILES["propThumbanil"]["tmp_name"], '../images/thumbnail-images/propid-'.$pid.'-'.$_FILES["propThumbanil"]["name"]);
	    $thumbnail = '../images/thumbnail-images/propid-'.$pid.'-'.$_FILES["propThumbanil"]["name"];
	    $newPath = "../images/thumbnail-images/".$pid.".png";
	    rename($thumbnail, $newPath);  
		$dbpath = "https://epitomerealestate.com/images/thumbnail-images/".$pid.".png"; 
		
		$query03 = mysqli_query($conn,"UPDATE `property` SET `thumbnail`='$dbpath' WHERE `pid` = '$pid'");

	}
	$sliderBig  = count($_FILES['sliderBig']['name']);
	if($sliderBig > 0){

		for($i = 0;$i  < $sliderBig;$i++){
			move_uploaded_file($_FILES["sliderBig"]["tmp_name"][$i], '../images/property-slider-images/propSliderid-'.$pid.'-'.$i.'-'.$_FILES["sliderBig"]["name"]);
		    

		    $SliderBigName = '../images/property-slider-images/propSliderid-'.$pid.'-'.$i.'-'.$_FILES["sliderBig"]["name"];
		    $newPathSliderBig = "../images/property-slider-images/".$pid."-".$i.".png";
		    rename($SliderBigName, $newPathSliderBig);  
			$SBdbpath = "https://epitomerealestate.com/images/property-slider-images/".$pid."-".$i.".png";

			

			move_uploaded_file($_FILES["sliderThumb"]["tmp_name"][$i], '../images/property-slider-thumb/propSliderThumbid-'.$pid.'-'.$i.'-'.$_FILES["sliderThumb"]["name"]);

		    $SliderThumbName = '../images/property-slider-thumb/propSliderThumbid-'.$pid.'-'.$i.'-'.$_FILES["sliderThumb"]["name"];
		    $newPathSliderThumb = "../images/property-slider-thumb/".$pid."-".$i.".png";
		    rename($SliderThumbName, $newPathSliderThumb);  
			$STdbpath = "https://epitomerealestate.com/images/property-slider-thumb/".$pid."-".$i.".png"; 
			
			$query04 = mysqli_query($conn,"INSERT INTO `property_sliders`( `pid`, `big_img`, `small_img`) VALUES ('$pid','$SBdbpath','$STdbpath')");
		}
	}


}



    
    //  features 
    $featuresList = '';
    $query5 = mysqli_query($conn,"SELECT * FROM  `features`");
    while($fetch_data5 = mysqli_fetch_assoc($query5)){
    		$featuresList .= "<div class='checkbox'>
							<label>
								<input type='checkbox' value='".$fetch_data5['fid']."' name='feature[]'>".$fetch_data5['title']."
							</label>
						</div>";
    }
    // bed room 
    $k = 10;
	$bedoption = '';
	for($i=1;$i<$k;$i++){
	   	$bedoption .= "<option value='".$i."'>".$i."</option>";
	}

	// bath room 
    $l = 10;
	$bathoption = '';
	for($i=1;$i<$l;$i++){
	   		$bathoption .= "<option value='".$i."'>".$i."</option>";
	}

	// car parking 
    $m = 10;
	$caroption = '';
	for($i=1;$i<$m;$i++){
	   $caroption .= "<option value='".$i."'>".$i."</option>";
	}

	// prop type 
	$prop_type = '';
	$query6 = mysqli_query($conn,"SELECT * FROM property_type");
	while($fetch_data6 = mysqli_fetch_assoc($query6)){
			$prop_type .= "<option value='".$fetch_data6['tid']."'>".$fetch_data6['type']."</option>";
	}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Epitome - Add Property</title>
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
							<div class="panel panel-default">
								<div class="panel-body">
									<form action='' method='post' enctype='multipart/form-data'>	
						    			<div class='col-md-6'>
						        			<div class='form-group'>
												<label>Name</label>
												<input class='form-control' placeholder='Name' value='' name='name'>
											</div>
											<div class='form-group'>
												<label>Title</label>
												<input class='form-control' placeholder='Title' value='' name='title'>
											</div>
											<div class='form-group'>
												<label>Location</label>
												<input class='form-control' placeholder='Location' value='' name='location'>
											</div>
											<div class='form-group'>
												<label>Price</label>
												<input class='form-control' placeholder='Price' value='' name='price'>
											</div>
											<div class='form-group'>
												<label>Area</label>
												<input class='form-control' placeholder='Area' value='' name='area'>
											</div>
											<div class='form-group'>
												<label>Description</label>
												<textarea class='form-control' rows='10' placeholder='Description' name='description'></textarea>
											</div>
											<div class='form-group'>
												<label>Property Type</label>
												<select class='form-control' name='prop_type'>
													<?php echo $prop_type ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Featured Property</label>
												<div class='radio'>
													<label>
														<input type='radio' name='featured' value='1' checked>Yes
													</label>
												</div>
												<div class='radio'>
													<label>
														<input type='radio' name='featured' value='0' >No
													</label>
												</div>
											</div>
						        		</div>
						        		<div class='col-md-6'>
						        			<div class='form-group'>
												<label>Bedroom</label>
												<select class='form-control' name='bedroom'>
													<?php echo $bathoption ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Bathroom</label>
												<select class='form-control' name='bathroom'>
													<?php echo $bedoption ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Car Parking</label>
												<select class='form-control' name='carparking'>
													<?php echo $caroption ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Features</label>
												<?php echo $featuresList ?>
											</div>
											<div class='form-group'>
												<label>Purpose</label>
												<div class='radio'>
													<label>
														<input type='radio' name='purpose' value='buy' >Buy
													</label>
												</div>
												<div class='radio'>
													<label>
														<input type='radio' name='purpose' value='sale' >Sale
													</label>
												</div>
												<div class='radio'>
													<label>
														<input type='radio' name='purpose' value='rent' checked>Rent
													</label>
												</div>
											</div>
						        		</div>
						        	<div class="col-md-12 main-section-unit">
						        		<p>Different type of unit</p>
						        		<span class="btn add-type">Add</span>
						        		<div class="unit-type row">
						        			<div class="col-sm-2">
						        				<input type="text" class="form-control" placeholder="Area in Sqft" name="area[]">
						        			</div>
						        			<div class="col-sm-2">
						        				<input type="text" class="form-control" placeholder="Bedroom" name="bhk[]">
						        			</div>
						        			<div class="col-sm-2">
						        				<input type="text" class="form-control" placeholder="Bathroom" name="bathroom[]">
						        			</div>
						        			<div class="col-sm-2">
						        				<input type="text" class="form-control" placeholder="parking" name="parking[]">
						        			</div>
						        			<div class="col-sm-2">
						        				<input type="text" class="form-control" placeholder="1085 sqft" name="price[]">
						        			</div>
						        			<span class="btn delete-unit">Delete</span>
						        		</div>
						        	</div>
						        		<div class='col-md-12'>
					    					<h4>Main Thumbnail Image</h4>
					    					<input type="file" accept="image/*" onchange="loadFile(event)" class="form-control" name="propThumbanil">
						    				<figure>
												<img id="thumbnail-image" width="100px"/>
						    				</figure> 
					    				</div>
					    				<div class='col-md-12'>
						        			<h4>Slider Big Image</h4>
						        			<input id="slider-big-image" type="file" multiple class="form-control" name="sliderBig[]">
						        			<ul class='list-inline' id="big-img-preview">
						        				
						        			</ul>
						        			
						        		</div>
						        		<div class='col-md-12'>
						        			<h4>Slider Thumbnail Image</h4>
						        			<input id="slider-thumb-image" type="file" multiple class="form-control" name="sliderThumb[]">
						        			<ul class='list-inline' id="thumb-img-preview">
						        				
						        			</ul>
						        		</div>
						        		<input type='hidden' value='' name='pid'>
						        		<div class='col-md-12' style="margin-top: 10px;"><input type='submit' class='btn btn-sm btn-info' value='Add Property'></div>
						        		
						        		
						        	</form>
						        			
								</div>
							</div><!-- /.panel-->	
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

	
<script>
  var loadFile = function(event) {
    var output = document.getElementById('thumbnail-image');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
    function BigpreviewImages() {

	  var $preview = $('#big-img-preview').empty();
	  if (this.files) $.each(this.files, BigreadAndPreview);

	  function BigreadAndPreview(i, file) {
	    
	    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
	      return alert(file.name +" is not an image");
	    } // else...
	    
	    var reader = new FileReader();

	    $(reader).on("load", function() {
	      $preview.append($("<img/>", {src:this.result, height:100}));
	    });

	    reader.readAsDataURL(file);
	    
	  }

	}

	$('#slider-big-image').on("change", BigpreviewImages);

	function ThumbnailpreviewImages() {

	  var $preview = $('#thumb-img-preview').empty();
	  if (this.files) $.each(this.files, ThumbreadAndPreview);

	  function ThumbreadAndPreview(i, file) {
	    
	    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
	      return alert(file.name +" is not an image");
	    } // else...
	    
	    var reader = new FileReader();

	    $(reader).on("load", function() {
	      $preview.append($("<img/>", {src:this.result, height:100}));
	    });
    
	    reader.readAsDataURL(file);
	    
	  }

	}

	$('#slider-thumb-image').on("change", ThumbnailpreviewImages);

	$(document).ready(function(){
		$(".add-type").click(function(){
			alert($("div.unit-type").clone(true));
		});
	})
	

</script>

</body>
</html>


