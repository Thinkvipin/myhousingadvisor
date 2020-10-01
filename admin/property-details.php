<?php

include_once('connection_db.php');


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
    while($fetch_data4 = mysqli_fetch_assoc($query4)){

        $sliderImage .=  "<li><figure class='image'><a class='lightbox-image option-btn' data-fancybox-group='example-gallery' href='".$fetch_data4['big_img']."' title='Image Title Here'><img src='".$fetch_data4['big_img']."' alt=''></a></figure></li>";
        $thumbImage .= "<div class='thumb-item'><figure class='thumb-box'><img src='".$fetch_data4['small_img']."' alt=''></figure></div>";
    }


    $msg = "<section class='property-details'>
                        <div class='prop-header'>
                            <h3>".$fetch_data['name']." <span class='prop-label'>For ".$fetch_data['purpose']."</span></h3>
                            <div class='info clearfix'>
                                <div class='location'><span class='fa fa-map-marker'></span>&ensp; ".$fetch_data['location']."</div>
                               
                            </div>
                             <div class='price-area'><span><strong>AED ". number_format($fetch_data['price'])."/- </strong></span>Onwards</div>
                             <div class='boxes'>
                                <div class='col-sm-3'>
                                <div class='link'><a href=''><span class='fa fa-bed'></span>&nbsp;<strong>2</strong> Bed</a></div></div>
                                <div class='col-sm-3'>
                                <div class='link'><a href=''><span class='fa fa-bed'></span>&nbsp;<strong>3</strong> Bed</a></div>

                                </div>
                                <div class='col-sm-3'>
                                <div class='link'><a href=''><span class='fa fa-bed'></span>&nbsp;<strong>4</strong> Bed</a></div>

                                </div>
                                <div class='col-sm-3'>
                                <div class='link'><a href=''><span class='fa fa-bed'></span>&nbsp;<strong>5</strong> Bed</a></div>

                                </div>
                                <div class='clearfix'></div>
                             </div>
                             
                        </div>
                        
                        <!--Product Carousel-->
                        <div class='product-carousel-outer'>
                            
                            <!--Product image Carousel-->
                            <ul class='prod-image-carousel owl-theme owl-carousel'>
                                ".$sliderImage."
                            </ul>
                            
                            <!--Product Thumbs Carousel-->
                            <div class='prod-thumbs-carousel owl-theme owl-carousel'>
                                ".$thumbImage."
                            </div>
                            
                        </div><!--End Product Carousel-->
                            <div class='conatiner middle-tabs hidden'>
                                <div class='row'>
                                    <div class='col-sm-6 col-xs-6'>
                                        <i class='fa fa-map-marker'></i>
                                        Map
                                    </div>
                                    <div class='col-sm-6 col-xs-6'>
                                        <i class='fa fa-map-signs'></i>
                                        Directions
                                    </div>
                                    <!-- <div class='col-sm-3'>
                                         <span class='flaticon-dollar'></span>AED 4,80,000
                                    </div>
                                    <div class='col-sm-3'>
                                        120 Sq.Ft
                                    </div> -->
                                </div>
                            </div>
                        <div class='detail-content'>
                            <div class='medium-title'><h3>PROPERTY DESCRIPTION</h3></div>
                            
                            <div class='text-content'>
                                <p>".$fetch_data['description']."</p>
                                
                            </div>
                            <div class='property-specs'>
                                <ul class='specs-list'>
                                    <li><div class='icon'><span class='flaticon-double-king-size-bed'></span></div> ".$fetch_data['bedroom']." Bedrooms</li>
                                    <li><div class='icon'><span class='flaticon-vintage-bathtub'></span></div> ".$fetch_data['bathroom']." Bathrooms</li>
                                    <li><div class='icon'><span class='flaticon-private-garage'></span></div> ".$fetch_data['carparking']." Car Parking</li>
                                    <li><div class='icon'><span class='flaticon-copy'></span></div> ".$fetch_data['area']." sq ft</li>
                                </ul>
                            </div>

                            <!--Other Features-->
                            <div class='other-features'>
                                <div class='medium-title'><h3>Other Facilities</h3></div>
                                <div class='row clearfix'>
                                    <div class='col-md-4 col-sm-6 col-xs-12'>
                                        <ul class='features-list'>
                                            ".$feature."
                                        </ul>
                                    </div>
                                    <div class='col-md-4 col-sm-6 col-xs-12'>
                                        <ul class='features-list'>
                                            ".$feature2."
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>";

    // similar propperty query  

    $similar_prop = "";                

    $bedroom = $fetch_data['bedroom'];
    $query01 = mysqli_query($conn,"SELECT * FROM property WHERE bedroom = '$bedroom'");
    while($fetch_data01 = mysqli_fetch_assoc($query01)){
        
       $type01 = $fetch_data01['type_id'];

       $query02 = mysqli_query($conn,"SELECT type FROM property_type WHERE tid = '$type'");

       $fetch_data02 = mysqli_fetch_assoc($query02);

    
       $similar_prop .= "<div class='slide-item'>
                        <div class='slide-inner'>
                            <div class='property-box-two'>
                            <div class='inner-box'>
                            <div class='image-box'>
                                <figure class='image'><a href='property-details.php?p=".$fetch_data01['pid']."'><img src='".$fetch_data01['thumbnail']."' alt=''></a></figure>
                                <div class='prop-cat rent-cat'>For <span class='text-transform:capitalize;'>".$fetch_data01['purpose']."</span></div>
                            </div>
                            <div class='lower-content'>
                                <div class='property-title'>
                                    <h3><a href='property-details.php?p=".$fetch_data01['pid']."'>".$fetch_data01['name']."</a></h3>
                                    <div class='location'><span class='fa fa-map-marker'></span>&nbsp; ".$fetch_data['location']."</div>

                                </div>
                                <div class='prop-info'>
                                    <ul class='clearfix'>
                                        <li><span class='fa fa-bed'></span>&nbsp;&nbsp;<strong> ".$fetch_data01['bedroom']."</strong> Bed</li>
                                        <li><span class='fa fa-bath'></span>&nbsp;&nbsp;<strong>".$fetch_data01['bedroom']."</strong> Bath</li>
                                        <li><span class='flaticon-copy'></span>&nbsp;&nbsp;<strong>".$fetch_data01['area']."</strong> sq ft.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class='bottom-content'>
                                <div class='price-discount clearfix'>
                                    <div class='price'>From<strong>".number_format($fetch_data01['price'])." AED</strong></div>
                                    <div class='discount'>Property Type<strong>".$fetch_data02['type']."</strong></div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-6'>
                                        <div class='link'><a href='' data-toggle='modal' data-target='#myModal'>ENQUIRE <span class='fa fa-angle-right'></span></a></div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class='link read-more'><a href='property-details.php?p=".$fetch_data01['pid']."'>More <span class='fa fa-angle-right'></span></a></div>
                                    </div>
                                </div>
                                

                                
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>";

    }



}




?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Epitome - Property Details</title>
<!-- Stylesheets -->
<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">

<style type="text/css">
    .main-box {box-shadow: 3px 2px 2px #f2f2f2;}
    .datetimepicker .switch{
        display: table-cell !important;
    }
    /*.datetimepicker thead th.switch{
        width: 145px !important;
    }*/
</style>

</head>

<body>
<!-- List Property Modal -->
<div id="listproperty" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->



    <!-- List Your Property Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cross" id="cross" data-dismiss="modal">&times;</button>
        <span class="modal-title">LIST YOUR PROPERTY</span>
      </div>
     
      <div class="modal-body">

        <form>

        <div>
            <label>Property Title</label>
            <input type="text" placeholder="For Eg: Apartment For Sale Dubai AZIZI Riviera 1 OBG-S-12388"></input>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label>Purpose</label>
            <select class="form-control">
            <option></option>
                <option>Buy</option>
                <option>Rent</option>
                <option>Sell</option>

            </select>
                </div>
                <div class="col-sm-3">
                    <label>Property Type</label>
            <select class="form-control">
            <option></option>
                <option>Apartment</option>
                <option>Villa</option>
                <option>Studio</option>
                <option>Others</option>

            </select>
                </div>
                <div class="col-sm-3">
                <label>Price</label>
                    <input type="text" placeholder="For Eg: AED 546,720 "></input>
                </div>
                <div class="col-sm-3">
                    <label>Area (Sq. ft)</label>
                    <input type="text" placeholder="For Eg: 348.11 Sq.Ft"></input>
                </div>

            </div>
            
            
            <div>
            <label>Property Location</label>
            <input type="text" placeholder="For Eg: Al Meydan Rd, Dubai - United Arab Emirates"></input>
            </div>
             
             <div class="row">
                <div class="col-sm-4">
                                        <label>Name</label>
                    <input type="text" placeholder="For Eg: Shahraban Abdullah"></input>
                </div>
                <div class="col-sm-4">
                    <label>Email</label>
                    <input type="text" placeholder="For Eg: abc@example.com"></input>
                </div>
                <div class="col-sm-4">
                    <label>Phone</label>
                    <input type="text" placeholder="For Eg: +971 - 123 - 4567"></input>
                </div>
             </div>

            <label>Descrpition about your property</label>
            <textarea placeholder="For Eg: No. of Bedrooms - 4, No. of Bathrooms - 2, Parking arrangements..etc "></textarea>
            
            <button type="button" class="btn btn-default" >SUBMIT</button>
        </form>
      </div>
      
    </div>

  </div>
</div>

<div class="page-wrapper">
 	
   
 	
    <!-- Main Header-->
        <?php include_once('header.php');?>
    <!--End Main Header -->
    
    <section class="small-header">
  <div class="container-fluid">
      <div class="row">
          <span><strong><a href="">Epitome</a></strong></span>&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span><strong><a href="">For <span style="text-transform: capitalize;"><?php echo $fetch_data['purpose']?></span></a></strong></span>&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span><?php echo $fetch_data['name']; ?></span>
      </div>
  </div>
    </section>
    
    <!--Sidebar Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
				
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <!--Property DEtails-->
                    <?php echo $msg . "<br>";
                        
                     ?>

                </div>
                <!--Content Side-->
                
                <!--Sidebar-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">
                    <div class="quick-call">
                        <p class="text-uppercase">To know more about the property</p>
                        <button class="theme-btn btn-style-one call-button"><a href="tel:+97145655020"><i class="fa fa-phone"></i>Call</a></button><button class="theme-btn btn-style-one email-button"><a href="mailto:info@epitomerealestate.com"><i class="fa fa-envelope"></i>Email</a></button>
                    </div>

						<!-- Request Quote Form -->
                        <div class="sidebar-widget request-quote">
                            <div class="widget-inner">
                                <div class="default-form quote-form">
                                	<h4>BOOK A VIEWING</h4>
                                	<form method="post" action="property-lead.php">
                                    	<div class="form-group">
                                        	<input type="text" name="name" value="" placeholder="Name" required >
                                        </div>
                                        <div class="form-group">
                                        	<input type="email" name="email" value="" placeholder="Email" required >
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="country" value="" placeholder="Country" required >
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="number" value="" placeholder="Contact Number" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="dtp_input1" class="control-label">Call Back Time</label>
                                            <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" size="16" type="text" value="" readonly>
                                                <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" name="call_time" /><br/>
                                        </div>
                                        <div class="form-group">
                                        	<textarea name="message" placeholder="Message" required ></textarea>
                                        </div>
                                        <input type="hidden" name="propertyId" value="<?php echo $fetch_data['pid']?>">
                                        <div class="button-group"><button type="submit" class="theme-btn btn-style-one">Send Message</button></div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        
                        

                    </aside>


                </div>
                <!--Sidebar-->

            </div>
        </div>
    </div>
<hr>
        <section class="testimonials-style-one">
        <div class="auto-container">
            <!--Heading-->
            <div class="sec-title centered">
                <h2>Similar Properties</h2>
            </div>
            
            <div class="carousel-outer">
                <div class="testimonial-carousel-three owl-theme owl-carousel">
                    <!--Slide Item-->
                    <?php echo $similar_prop; ?>
                    
                    
                </div>
            </div>
        </div>
    </section>
    
<?php 
include_once('footer.php');
?>

<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.fr.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.testimonial-carousel-three').owlCarousel({
        loop:true,
        margin:40,
        nav:true,
        smartSpeed: 700,
        autoplay: true,
        navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            700:{
                items:3
            },
            800:{
                items:3
            },
            1024:{
                items:3
            },
            1200:{
                items:3
            }
        }
    });
    

     
            $('.form_datetime').datetimepicker({
                //language:  'fr',
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
         
    });
</script>
</body>
</html>