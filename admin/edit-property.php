<?php

include_once('../connection_db.php');
session_start();
include_once('login_validation.php');
date_default_timezone_set('Asia/Kolkata');


if(isset($_POST['location'])){
	// echo "google";
	$title = $_POST['title'];
	$name = $_POST['name'];
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
	echo $propType;
	$updated_on = date("Y-m-d H:i:s");

	$p_id = $_POST['pid'];

	$prop_features = $_POST['feature'];
	
	$query01 = mysqli_query($conn,"DELETE FROM `property_features` WHERE pid = '$p_id'");
	
		for ($z=0; $z<sizeof($prop_features);$z++)
        {
        	$cval = $prop_features[$z];
            $query02=mysqli_query($conn,"INSERT INTO `property_features`(`fid`, `pid`) VALUES ('$cval','$p_id')"); 
        }
	

	$query = mysqli_query($conn,"UPDATE `property` SET `title` = '$title', `name` = '$name',`location` = '$location',`price` = '$price',`purpose` = '$purpose',`description` = '$description',`area` = '$area',`bedroom` = '$bedroom',`bathroom` = '$bathroom',`carparking` = '$carparking',`type_id` = '$propType',`featured` = '$featured',`updated_on` = '$updated_on' WHERE pid = '$p_id'");

	$msg = "<a href='edit-property.php?p=".$p_id."' class='btn btn-primary'>Go Back</a>";



}

if(isset($_GET['p'])){

	$pid = $_GET['p'];
    $query = mysqli_query($conn,"SELECT * FROM property WHERE pid = '$pid'");

    $fetch_data = mysqli_fetch_assoc($query);
    $type = $fetch_data['type_id'];
    $query2 = mysqli_query($conn,"SELECT type FROM property_type WHERE tid = '$type'");

    $fetch_data2 = mysqli_fetch_assoc($query2);

    $query3 = mysqli_query($conn,"SELECT title FROM features INNER JOIN property_features ON `features`.`fid` = `property_features`.`fid` WHERE pid = '$pid'");
    
    $count = 1;
    while($fetch_data3 = mysqli_fetch_assoc($query3)){
        $count++;
        if($count < 6){
            $feature .= "<li>".$fetch_data3['title']."</li>";
        }
        else{
            $feature2 .= "<li>".$fetch_data3['title']."</li>";
        } 
    }

    // carparking condition
    if($fetch_data['carparking'] == 0){
        $fetch_data['carparking'] = "No";
    } 

    $query4 = mysqli_query($conn,"SELECT * FROM property_sliders WHERE pid = '$pid'");

    $sliderImage = "";
    $thumbImage = "";
    $num = 0;
    while($fetch_data4 = mysqli_fetch_assoc($query4)){

    	$sid = $fetch_data4['sid'];
    	$pid = $fetch_data4['pid'];
    	$num++;
        $sliderImage .=  "<li><form action='' method='post' enctype='multipart/form-data'><figure class='image'><img src='".$fetch_data4['big_img']."' alt='' width='200px'></figure><input type='file' class='form-control' k='".$fetch_data4['sid']."' p='".$fetch_data4['big_img']."' name='sliderbig".$num."'><input type='hidden' name='big_image_id' value='".$fetch_data4['sid']."'><input type='hidden' name='big_image_path' value='".$fetch_data4['big_img']."'><input type='hidden' name='BIGsid' value='".$sid."'><input type='hidden' name='BIGpid' value='".$pid."'>
        	<input type='hidden' name='BIGsequence".$num."' value='".$num."'>
        	<input type='hidden' name='BIGsequence' value='".$num."'><button type='submit' class='btn btn-primary'> Update</button>
        	
        </form></li>";
        $thumbImage .= "<li><form action='' method='post' enctype='multipart/form-data'><figure class='thumb-box'><img src='".$fetch_data4['small_img']."' alt='' width='200px'></figure><input type='file' class='form-control' k='".$fetch_data4['sid']."' p='".$fetch_data4['small_img']."' name='sliderthumb".$num."'><input type='hidden' name='small_image_id' value='".$fetch_data4['sid']."'><input type='hidden' name='small_image_path' value='".$fetch_data4['small_img']."'><button type='submit' class='btn btn-primary'> Update</button><input type='hidden' name='SMLsid' value='".$sid."'><input type='hidden' name='SMLpid' value='".$pid."'>
        	<input type='hidden' name='SMLsequence".$num."' value='".$num."'>
        	<input type='hidden' name='SMLsequence' value='".$num."'>
        	</form></li>";

       

    }
    $feature = array();
    $query3 = mysqli_query($conn,"SELECT `features`.`fid` FROM features INNER JOIN property_features ON `features`.`fid` = `property_features`.`fid` WHERE pid = '$pid'");
	    while($fetch_data3 = mysqli_fetch_assoc($query3)){
	        
	            $feature[] = $fetch_data3['fid'];
		 }

    //  features 
    
    $featuresList = '';
    $query5 = mysqli_query($conn,"SELECT * FROM  `features`");
    while($fetch_data5 = mysqli_fetch_assoc($query5)){

    	if (in_array($fetch_data5['fid'],$feature)){
    		$featuresList .= "<div class='checkbox'>
							<label>
								<input type='checkbox' value='".$fetch_data5['fid']."' name='feature[]' checked>".$fetch_data5['title']."
							</label>
						</div>";
    	}else{
    		$featuresList .= "<div class='checkbox'>
							<label>
								<input type='checkbox' value='".$fetch_data5['fid']."' name='feature[]'>".$fetch_data5['title']."
							</label>
						</div>";
    	}
    }

    // bed room 
    $k = 10;
	$num_bed = $fetch_data['bedroom'];
	$bedoption = '';
	for($i=0;$i<$k;$i++){
	   if($i==$num_bed){
	   		$bedoption .= "<option value='".$i."' selected='selected'>".$i."</option>";
	   }else{
	   		$bedoption .= "<option value='".$i."'>".$i."</option>";
	   }
	}
	// bath room 
    $l = 10;
	$num_bath = $fetch_data['bathroom'];
	$bathoption = '';
	for($i=0;$i<$l;$i++){
	   if($i==$num_bath){
	   		$bathoption .= "<option value='".$i."' selected='selected'>".$i."</option>";
	   }else{
	   		$bathoption .= "<option value='".$i."'>".$i."</option>";
	   }
	}
	// car parking 
    $m = 10;
	$num_car = $fetch_data['carparking'];
	$caroption = '';
	for($i=0;$i<$m;$i++){
	   if($i==$num_car){
	   		$caroption .= "<option value='".$i."' selected='selected'>".$i."</option>";
	   }else{
	   		$caroption .= "<option value='".$i."'>".$i."</option>";
	   }
	}
	// prop type 
	$ptype = $fetch_data2['type'];
	$prop_type = '';
	$query6 = mysqli_query($conn,"SELECT * FROM property_type");
	while($fetch_data6 = mysqli_fetch_assoc($query6)){
		if($ptype == $fetch_data6['type']){
			$prop_type .= "<option value='".$fetch_data6['tid']."' selected='selected'>".$fetch_data6['type']."</option>";
		}
		else{
			$prop_type .= "<option value='".$fetch_data6['tid']."'>".$fetch_data6['type']."</option>";	
		}
	}


	   		

	// featured Property
	$featured = $fetch_data['featured'];


	$feature_property = '';
	if($featured == 1){
		$feature_property = "<div class='radio'>
								<label>
									<input type='radio' name='featured' value='1' checked>Yes
								</label>
							</div>
							<div class='radio'>
								<label>
									<input type='radio' name='featured' value='0' >No
								</label>
							</div>";
	}
	else{
		$feature_property = "<div class='radio'>
								<label>
									<input type='radio' name='featured' value='1'>Yes
								</label>
							</div>
							<div class='radio'>
								<label>
									<input type='radio' name='featured' value='0' checked>No
								</label>
							</div>";
	}

	// purpose 
    $purpose = $fetch_data['purpose'];					

    if($purpose == 'buy'){
    	$purposehtml = "<div class='radio'>
							<label>
								<input type='radio' name='purpose' value='buy' checked>Buy
							</label>
						</div>
						<div class='radio'>
							<label>
								<input type='radio' name='purpose' value='sale' >Sale
							</label>
						</div>
						<div class='radio'>
							<label>
								<input type='radio' name='purpose' value='rent' >Rent
							</label>
						</div>";
    }
    else if($purpose == 'rent'){
    	$purposehtml = "<div class='radio'>
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
						</div>";

    }
    else{
    	$purposehtml = "<div class='radio'>
							<label>
								<input type='radio' name='purpose' value='buy' >Buy
							</label>
						</div>
						<div class='radio'>
							<label>
								<input type='radio' name='purpose' value='sale' checked>Sale
							</label>
						</div>
						<div class='radio'>
							<label>
								<input type='radio' name='purpose' value='rent' >Rent
							</label>
						</div>";
    }

    $msg = "<form action='' method='post'>	
    			<div class='col-md-6'>
        			<div class='form-group'>
						<label>Name</label>
						<input class='form-control' placeholder='Name' value='".$fetch_data['name']."' name='name'>
					</div>
					<div class='form-group'>
						<label>Name</label>
						<input class='form-control' placeholder='Title' value='".$fetch_data['title']."' name='title'>
					</div>
					<div class='form-group'>
						<label>Location</label>
						<input class='form-control' placeholder='Location' value='".$fetch_data['location']."' name='location'>
					</div>
					<div class='form-group'>
						<label>Price</label>
						<input class='form-control' placeholder='Price' value='".$fetch_data['price']."' name='price'>
					</div>
					<div class='form-group'>
						<label>Area</label>
						<input class='form-control' placeholder='Area' value='".$fetch_data['area']."' name='area'>
					</div>
					<div class='form-group'>
						<label>Description</label>
						<textarea class='form-control' rows='10' placeholder='Description' name='description'>".$fetch_data['description']."</textarea>
					</div>
					<div class='form-group'>
						<label>Property Type</label>
						<select class='form-control' name='prop_type'>
							".$prop_type."
						</select>
					</div>
					<div class='form-group'>
						<label>Featured Property</label>
						".$feature_property."
					</div>
        		</div>
        		<div class='col-md-6'>
        			<div class='form-group'>
						<label>Bedroom</label>
						<select class='form-control' name='bedroom'>
							".$bathoption."
						</select>
					</div>
					<div class='form-group'>
						<label>Bathroom</label>
						<select class='form-control' name='bathroom'>
							".$bedoption."
						</select>
					</div>
					<div class='form-group'>
						<label>Car Parking</label>
						<select class='form-control' name='carparking'>
							".$caroption."
						</select>
					</div>
					<div class='form-group'>
						<label>Features</label>
						".$featuresList."
					</div>
					<div class='form-group'>
						<label>Purpose</label>
						".$purposehtml."
					</div>

				 
				 
        		</div>
        		<input type='hidden' value='".$pid."' name='pid'>
        		<div class='col-md-12'><input type='submit' class='btn btn-sm btn-info' value='Update'></div>
        	</form>
        		<div class='col-md-12 single-img img-sec'>
        			
    					<h4>Main Thumbnail Image</h4>
    					<form action='' method='post' enctype='multipart/form-data-data'>
						<input type='file' accept='image/*'' class='form-control' name='propThumbanil'>
	    				<figure>
	    					<img src='".$fetch_data['thumbnail']."' width='200px'>
	    				</figure>
	    				<input type='hidden' value='".$fetch_data['thumbnail']."' name='propThmbPath'>
						<input type='hidden' value='".$pid."' name='propId'>	    				
	    				<button type='submit' class='btn btn-primary up-main-thmb' p='".$pid."'>Update Thumbnail Image</button>
	    				</form>
	    			
    			</div>
        		<div class='col-md-12 img-sec'>
        			<h4>Slider Big Image</h4>
        			<ul class='list-inline'>
        				".$sliderImage."
        			</ul>
        		</div>
        		<div class='col-md-12 img-sec'>
        			<h4>Slider Thumbnail Image</h4>
        			<ul class='list-inline'>
        				".$thumbImage."
        			</ul>
        		</div>
        		";
}
else{
	$fulldata = "No property found";
}

//  Main Propert Thumbnail Image
if(isset($_POST['propId'])){

	$pid = $_POST['propId'];

	$path = "../images/thumbnail-images/".$pid.".png";

	unlink($path);

	if(isset($_FILES["propThumbanil"]["name"]) != ''){

		move_uploaded_file($_FILES["propThumbanil"]["tmp_name"], '../images/thumbnail-images/propid-'.$pid.'-'.$_FILES["propThumbanil"]["name"]);
		
		$oldName = "../images/thumbnail-images/propid-".$pid."-".$_FILES['propThumbanil']['name'];
		
		rename($oldName,$path);

	}
}

// slider Big Image
if(isset($_POST['BIGsequence1'])){
		
		$k  = $_POST['BIGsequence'] - 1;
		$sid = $_POST['BIGsid'];
		$pid = $_POST['BIGpid'];

		$SBpath = "../images/property-slider-images/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-images/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderbig1"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderbig1"]["tmp_name"], '../images/property-slider-images/SBpropid-'.$pid.'-'.$_FILES["sliderbig1"]["name"]);
			
			$SBoldName = "../images/property-slider-images/SBpropid-".$pid."-".$_FILES['sliderbig1']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `big_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['BIGsequence2'])){
		
		$k  = $_POST['BIGsequence'] - 1;
		$sid = $_POST['BIGsid'];
		$pid = $_POST['BIGpid'];

		$SBpath = "../images/property-slider-images/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-images/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderbig2"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderbig2"]["tmp_name"], '../images/property-slider-images/SBpropid-'.$pid.'-'.$_FILES["sliderbig2"]["name"]);
			
			$SBoldName = "../images/property-slider-images/SBpropid-".$pid."-".$_FILES['sliderbig2']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `big_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['BIGsequence3'])){
		
		$k  = $_POST['BIGsequence'] - 1;
		$sid = $_POST['BIGsid'];
		$pid = $_POST['BIGpid'];

		$SBpath = "../images/property-slider-images/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-images/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderbig3"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderbig3"]["tmp_name"], '../images/property-slider-images/SBpropid-'.$pid.'-'.$_FILES["sliderbig3"]["name"]);
			
			$SBoldName = "../images/property-slider-images/SBpropid-".$pid."-".$_FILES['sliderbig3']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `big_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['BIGsequence4'])){
		
		$k  = $_POST['BIGsequence'] - 1;
		$sid = $_POST['BIGsid'];
		$pid = $_POST['BIGpid'];

		$SBpath = "../images/property-slider-images/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-images/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderbig4"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderbig4"]["tmp_name"], '../images/property-slider-images/SBpropid-'.$pid.'-'.$_FILES["sliderbig4"]["name"]);
			
			$SBoldName = "../images/property-slider-images/SBpropid-".$pid."-".$_FILES['sliderbig4']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `big_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['BIGsequence5'])){
		
		$k  = $_POST['BIGsequence'] - 1;
		$sid = $_POST['BIGsid'];
		$pid = $_POST['BIGpid'];

		$SBpath = "../images/property-slider-images/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-images/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderbig5"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderbig5"]["tmp_name"], '../images/property-slider-images/SBpropid-'.$pid.'-'.$_FILES["sliderbig5"]["name"]);
			
			$SBoldName = "../images/property-slider-images/SBpropid-".$pid."-".$_FILES['sliderbig5']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `big_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}

//  small Image
if(isset($_POST['SMLsequence1'])){
		
		$k  = $_POST['SMLsequence'] - 1;
		$sid = $_POST['SMLsid'];
		$pid = $_POST['SMLpid'];

		$SBpath = "../images/property-slider-thumb/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-thumb/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderthumb1"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderthumb1"]["tmp_name"], '../images/property-slider-thumb/SBpropid-'.$pid.'-'.$_FILES["sliderthumb1"]["name"]);
			
			$SBoldName = "../images/property-slider-thumb/SBpropid-".$pid."-".$_FILES['sliderthumb1']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `small_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['SMLsequence2'])){
		
		$k  = $_POST['SMLsequence'] - 1;
		$sid = $_POST['SMLsid'];
		$pid = $_POST['SMLpid'];

		$SBpath = "../images/property-slider-thumb/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-thumb/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderthumb2"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderthumb2"]["tmp_name"], '../images/property-slider-thumb/SBpropid-'.$pid.'-'.$_FILES["sliderthumb2"]["name"]);
			
			$SBoldName = "../images/property-slider-thumb/SBpropid-".$pid."-".$_FILES['sliderthumb2']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `small_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['SMLsequence3'])){
		
		$k  = $_POST['SMLsequence'] - 1;
		$sid = $_POST['SMLsid'];
		$pid = $_POST['SMLpid'];

		$SBpath = "../images/property-slider-thumb/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-thumb/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderthumb3"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderthumb3"]["tmp_name"], '../images/property-slider-thumb/SBpropid-'.$pid.'-'.$_FILES["sliderthumb3"]["name"]);
			
			$SBoldName = "../images/property-slider-thumb/SBpropid-".$pid."-".$_FILES['sliderthumb3']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `small_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['SMLsequence4'])){
		
		$k  = $_POST['SMLsequence'] - 1;
		$sid = $_POST['SMLsid'];
		$pid = $_POST['SMLpid'];

		$SBpath = "../images/property-slider-thumb/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-thumb/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderthumb4"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderthumb4"]["tmp_name"], '../images/property-slider-thumb/SBpropid-'.$pid.'-'.$_FILES["sliderthumb4"]["name"]);
			
			$SBoldName = "../images/property-slider-thumb/SBpropid-".$pid."-".$_FILES['sliderthumb4']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `small_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
}
if(isset($_POST['SMLsequence5'])){
		
		$k  = $_POST['SMLsequence'] - 1;
		$sid = $_POST['SMLsid'];
		$pid = $_POST['SMLpid'];

		$SBpath = "../images/property-slider-thumb/".$pid."-".$k.".png";

		$SBdbpath = "https://epitomerealestate.com/images/property-slider-thumb/".$pid."-".$k.".png";	
		
		unlink($SBpath);

		if(isset($_FILES["sliderthumb5"]["name"]) != ''){

			move_uploaded_file($_FILES["sliderthumb5"]["tmp_name"], '../images/property-slider-thumb/SBpropid-'.$pid.'-'.$_FILES["sliderthumb5"]["name"]);
			
			$SBoldName = "../images/property-slider-thumb/SBpropid-".$pid."-".$_FILES['sliderthumb5']['name'];
			
			rename($SBoldName,$SBpath);

			$query05 = mysqli_query($conn,"UPDATE `property_sliders` SET `small_img` = '$SBdbpath' WHERE `sid` = '$sid'");

		}
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
	<style type="text/css">
		.col-md-12 > .list-inline > li,.single-img form {width: 210px;}
		.img-sec{
			margin-bottom: 20px;
		}
	</style>
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
									
										<?php echo $msg; ?>
									
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

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click',".main-thumb-image",function(){
			var PID = $(this).attr('p');
			alert(PID);
		})
	})
</script>	


</body>
</html>


