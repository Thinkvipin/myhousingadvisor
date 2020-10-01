<?php 

$conn = mysqli_connect('localhost', 'cjanroap_myhousingadvisor', 'Airlines!234567890','cjanroap_myhousingadvisor');
include_once('class.phpmailer.php');
date_default_timezone_set('Asia/Kolkata');
$current_time = date("Y-m-d H:i:s");
error_reporting(E_ALL);


if(isset($_POST['header'])){

	$name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $propName = mysqli_real_escape_string($conn,$_POST['property_name']);

  


	$sql= mysqli_query($conn,"INSERT INTO `enquiry`(`name`, `email`, `phone`, `bhk`, `area`, `propertyName`, `created_on`) VALUES ('$name','$email','$mobile','','','$propName','$current_time')");

 $h="smtpout.secureserver.net";  //----host
  $u="ers@2019annualcongress.org"; //-----user
  $p="Airlines!2"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - The Leela Sky Villa ";
  $msgBody="<table cellspacing='0' style='width:100%' border='1'>
              <tbody>
              <tr>
                <th>From:</th><td>Header</td>
              </tr>
              <tr>
                <th>Name:</th><td>".$name."</td>
              </tr>
              <tr>
                <th>Email Id:</th><td><a href='mailto:".$email."' target='_blank'>".$email."</a></td>
              </tr>
              <tr>
                <th>Phone Number:</th><td>".$mobile."</td>
              </tr> 
              <tr>
                <th>Property Name:</th><td>".$propName."</td>
              </tr>
              
            </tbody></table>";

  $mail = new PHPMailer();
  
  // $mail->SetLanguage("en", 'includes/phpMailer/language/');
  $mail->IsSMTP(); // set mailer to use SMTP
  $mail->Host = $h; // specify main and backup server
  $mail->SMTPAuth = true; // turn on SMTP authentication
  $mail->Username = $u; // SMTP username
  $mail->Password = $p; // SMTP password
  $mail->From = $fe; // do NOT fake header.

  $mail->FromName = "Burj Noida Sector-75 Noida";
  $mail->AddAddress($recpnt); // Email on which you want to send mail
  $mail->AddReplyTo("Reply to Email ", "Support and Help");  // turn on SMTP authentication   
  $mail->IsHTML(true);
  $mail->Subject = $sub;
  $mail->Body = $msgBody;
  if(!$mail->Send())
  {
      $errorInfo= $mail->ErrorInfo;   
      echo $errorInfo; 
  }

}
$brochure = '';
if(isset($_POST['enquiry_size'])){
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $propName = mysqli_real_escape_string($conn,$_POST['property_name']);
  $bhk = mysqli_real_escape_string($conn,$_POST['bhk']);
  $area = mysqli_real_escape_string($conn,$_POST['area']);

   
  $brochure = $bhk;

  $sql= mysqli_query($conn,"INSERT INTO `enquiry`(`name`, `email`, `phone`, `bhk`, `area`, `propertyName`, `created_on`) VALUES ('$name','$email','$mobile','$bhk','$area','$propName','$current_time')");

  $h="smtpout.secureserver.net";  //----host
  $u="ers@2019annualcongress.org"; //-----user
  $p="Airlines!2"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - The Leela Sky Villa ";
  $msgBody="<table cellspacing='0' style='width:100%' border='1'>
              <tbody>
              <tr>
                <th>From:</th><td>Enquiry Acc to the BHK and size</td>
              </tr>
              <tr>
                <th>Name:</th><td>".$name."</td>
              </tr>
              <tr>
                <th>Email Id:</th><td><a href='mailto:".$email."' target='_blank'>".$email."</a></td>
              </tr>
              <tr>
                <th>Phone Number:</th><td>".$mobile."</td>
              </tr> 
              <tr>
                <th>BHK:</th><td>".$bhk."</td>
              </tr>
              <tr>
                <th>Area:</th><td>".$area."</td>
              </tr>
              <tr>
                <th>Property Name:</th><td>".$propName."</td>
              </tr>
              
            </tbody></table>";

  $mail = new PHPMailer();
  
  // $mail->SetLanguage("en", 'includes/phpMailer/language/');
  $mail->IsSMTP(); // set mailer to use SMTP
  $mail->Host = $h; // specify main and backup server
  $mail->SMTPAuth = true; // turn on SMTP authentication
  $mail->Username = $u; // SMTP username
  $mail->Password = $p; // SMTP password
  $mail->From = $fe; // do NOT fake header.

  $mail->FromName = "Burj Noida Sector-75 Noida";
  $mail->AddAddress($recpnt); // Email on which you want to send mail
  $mail->AddReplyTo("Reply to Email ", "Support and Help");  // turn on SMTP authentication   
  $mail->IsHTML(true);
  $mail->Subject = $sub;
  $mail->Body = $msgBody;
  if(!$mail->Send())
  {
      $errorInfo= $mail->ErrorInfo;   
      echo $errorInfo; 
  }



}
if(isset($_POST['getintouch'])){
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $propName = mysqli_real_escape_string($conn,$_POST['property_name']);
  $comments = mysqli_real_escape_string($conn,$_POST['comments']);

  


  $sql= mysqli_query($conn,"INSERT INTO `contact`(`name`, `email`, `phone`, `propertyName`,`message` ,`created_on`) VALUES ('$name','$email','$mobile','$propName','$comments','$current_time')");

  $h="smtpout.secureserver.net";  //----host
  $u="ers@2019annualcongress.org"; //-----user
  $p="Airlines!2"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - Burj Noida Sector-75 Noida ";
  $msgBody="<table cellspacing='0' style='width:100%' border='1'>
              <tbody>
              <tr>
                <th>From:</th><td>Contact Form</td>
              </tr>
              <tr>
                <th>Name:</th><td>".$name."</td>
              </tr>
              <tr>
                <th>Email Id:</th><td><a href='mailto:".$email."' target='_blank'>".$email."</a></td>
              </tr>
              <tr>
                <th>Phone Number:</th><td>".$mobile."</td>
              </tr> 
              <tr>
                <th>Message:</th><td>".$comments."</td>
              </tr>
              <tr>
                <th>Property Name:</th><td>".$propName."</td>
              </tr>
              
            </tbody></table>";

  $mail = new PHPMailer();
  
  // $mail->SetLanguage("en", 'includes/phpMailer/language/');
  $mail->IsSMTP(); // set mailer to use SMTP
  $mail->Host = $h; // specify main and backup server
  $mail->SMTPAuth = true; // turn on SMTP authentication
  $mail->Username = $u; // SMTP username
  $mail->Password = $p; // SMTP password
  $mail->From = $fe; // do NOT fake header.

  $mail->FromName = "Burj Noida Sector-75 Noida";
  $mail->AddAddress($recpnt); // Email on which you want to send mail
  $mail->AddReplyTo("Reply to Email ", "Support and Help");  // turn on SMTP authentication   
  $mail->IsHTML(true);
  $mail->Subject = $sub;
  $mail->Body = $msgBody;
  if(!$mail->Send())
  {
      $errorInfo= $mail->ErrorInfo;   
      echo $errorInfo; 
  }

}




?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Burj Noida Sector-75 Noida</title>
  <link href="https://www.myhousingadvisor.com/images/favicon.png" alt="leela apartments delhi" rel="icon" type="image/x-icon">
    <link href="https://www.myhousingadvisor.com/images/favicon.png" rel="apple-touch-icon" type="image/x-icon"> 
  <style type='text/css'>
    body{
          padding: 0px 0;
    background-color: #fff;
    background: #fff;
    }
    *{
          font-family: 'Lato', sans-serif;
    }
    .btn-primary{
      background: #ddd;
    background-color: #08c !important;
    color: #fff !important;
    border: none !important;
    padding: 15px 20px;
    text-decoration: none;
    border-radius: 4px;
    margin: 0 auto;
    display: inline-block;
    width: 200px;
    }
    h2{font-weight: 400;}
    .home-link{
      display: inline-block;
    }
  </style>
  <!-- <script type='text/javascript'>
    window.setTimeout(function() {
      window.location.href = 'https://www.myhousingadvisor.com/leelavilla/';
  }, 6000);
  </script> -->
  <!-- Global site tag (gtag.js) - Google Ads: 733450365 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-733450365"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-733450365');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Event snippet for Conversion conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-733450365/r0UYCJzV0qIBEP2g3t0C'});
</script>
</head>
<body>
  <div class='container'>
   
    <center>
      <img src='img/logoburj.png' alt='logo' style="padding-top: 85px; width: 181px;">
    </center> 
    <br>
    <center><h2 class='text-center'>Thanks for showing interest. <br>Your Housing Advisor will shortly assist you with the details of <b>Burj Noida Sector-75 Noida</b>.<br>You may also contact us on <a href="tel:+917838213540">+91 7838213540 </a></h2>
    </center>
    <br>
    <center>
    
      <a href="Burj-Noida-Brochure.pdf" target="_blank" class="btn btn-primary">DOWNLOAD BROCHURE</a>
      <br>
      <br>
      <a href="https://www.myhousingadvisor.com/burj/" class="home-link">Back to Home</a>
    </center>
    
  </div>
</body>
</html>


