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
  $query = mysqli_real_escape_string($conn,$_POST['query']);
  $propName = 'DLF Camellias';
  

  


  $sql= mysqli_query($conn,"INSERT INTO `enquiry`(`name`, `email`, `phone`, `bhk`, `area`, `propertyName`, `created_on`) VALUES ('$name','$email','$mobile','','','$propName','$current_time')");

  $h="mail.myhousingadvisor.com";  //----host
  $u="hello@myhousingadvisor.com"; //-----user
  $p="Airlines!234"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - The Camelias ";
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
                <th>Query:</th><td>".$query."</td>
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

  $mail->FromName = "The Camellias Team";
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
if(isset($_POST['footer'])){

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $query = mysqli_real_escape_string($conn,$_POST['query']);
  $propName = 'DLF Camellias';
  

  


  $sql= mysqli_query($conn,"INSERT INTO `enquiry`(`name`, `email`, `phone`, `bhk`, `area`, `propertyName`, `created_on`) VALUES ('$name','$email','$mobile','','','$propName','$current_time')");

  $h="mail.myhousingadvisor.com";  //----host
  $u="hello@myhousingadvisor.com"; //-----user
  $p="Airlines!234"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - The Camelias ";
  $msgBody="<table cellspacing='0' style='width:100%' border='1'>
              <tbody>
              <tr>
                <th>From:</th><td>Footer</td>
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
                <th>Query:</th><td>".$query."</td>
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

  $mail->FromName = "The Camellias Team";
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

if(isset($_POST['downloadBrochure'])){

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $query = mysqli_real_escape_string($conn,$_POST['query']);
  $propName = 'DLF Camellias';
  

  


  $sql= mysqli_query($conn,"INSERT INTO `enquiry`(`name`, `email`, `phone`, `bhk`, `area`, `propertyName`, `created_on`) VALUES ('$name','$email','$mobile','','','$propName','$current_time')");

  $h="mail.myhousingadvisor.com";  //----host
  $u="hello@myhousingadvisor.com"; //-----user
  $p="Airlines!234"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - The Camelias ";
  $msgBody="<table cellspacing='0' style='width:100%' border='1'>
              <tbody>
              <tr>
                <th>From:</th><td>Download Brochure</td>
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
                <th>Query:</th><td>".$query."</td>
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

  $mail->FromName = "The Camellias Team";
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
  
 
  

  $sub01="My Housing Advisor - The Camelias ";
  $msgBody01="<p><b>Dear &nbsp;".$name.",</b></p>
                <p><br></p>
                <p>I sincerely hope that you &amp; your family are doing well and your loved ones are safe &amp; sound.&nbsp;</p>
                <p>As home remains the safest place to be in, I would like to inform you that after the phenomenal success of &#39;The Aralias&#39; &amp; &#39;The Magnolias&#39;, DLF presents India&#39;s most super luxurious residential condominiums - &#39;<b>The Camellias</b>&#39;. These &#39;only by invitation&#39; limited number of super luxury residences are ready for possession and are already a home to some of India&#39;s topmost Industrialists, CXO&#39;s, keen Golfers, NRI&#39;s &amp; the likes.&nbsp;</p>
                <p>&nbsp;</p>
                <p>These are the 10 Key Points why India&#39;s Most Successful People choose us :-</p>
                <p><br></p>
                <p>1) Camellias is the best DLF has ever created in Super Luxury living. It is rated as India&#39;s most super luxurious address till date.&nbsp;</p>
                <p><br></p>
                <p>2) It is not just luxury within the four walls of your apartment but you are a part of the DLF 5 Golf links community where you have the 9 hole world renowned golf course - Arnold Palmer &amp; 18 hole golf course - Gary Player, beautiful artificial lakes, The Sanctuary having various species of flora &amp; fauna and open &amp; green pastures spread over 200 acres. Beyond that, you have 1000 acres of untouched Aravalis forest. So, it&#39;s like your own Switzerland in India.</p>
                <p><br></p>
                <p>3) Biggest Clubhouse in any residential project in the country and it will beat most 5-star luxury hotels in its size, opulence, appointment, dedicated to its resident&rsquo;s indulgence and leisure. Equal to the size of Trident Hotel, in Gurgaon.&nbsp;</p>
                <p><br></p>
                <p>4) Camellias in terms of pricing, homogeneity and affordability can&#39;t be beaten by any other super luxury community in the country. Best value for money.&nbsp;</p>
                <p><br></p>
                <p>5) A lot of South Delhi families have already moved into Camellias from Jorbagh, Golf Links, Aurengzeb Road, Prithviraj Road, Amrita Shergill Marg.&nbsp;</p>
                <p><br></p>
                <p>6) Best schools &amp; hospitals are within 5kms radius of Camellias.</p>
                <p><br></p>
                <p>7) It&#39;s not a done-up apartment where you cannot make any changes in the interiors. It is bareshell and you can design the internal setup as per your taste and liking.&nbsp;</p>
                <p><br></p>
                <p>8) DLF Golf and Country Club boasts of 2 courses designed by golfing legends, Arnold Palmer (9 holes) and Gary Player (18 holes), with the latter course hosting some of the most marquee Indian and European Tour golf tournaments. Best place for both learners &amp; professionals to seek Golf membership.&nbsp;</p>
                <p><br></p>
                <p>9) Best community and neighborhood in the country. It is already a home to some of India&#39;s topmost Industrialists, CXO&#39;s, keen Golfers, NRI&#39;s and Expats. At the same time the entire floor is kept for you with utmost privacy. There is only one apartment per floor. Plus it is more spacious with floor to floor height of 12.3 ft.&nbsp;</p>
                <p><br></p>
                <p>10) The project has appreciated by 15% &#39;Year On Year&#39; since time of launch while the overall real estate market depreciated by 10-40% during the same period &ndash; (Source: Prop Equity survey published in the Business Standard, June 11, 2019)</p>
                <p><br></p>
                <p>Request you to kindly save this number, should you wish to explore &#39;The Camellias&#39;. During this period, we can give a small presentation of &#39;The Camellias&#39; to you over a zoom video call. And once the lockdown is over, I would like to invite you for an exclusive &amp; private preview at the &#39;Camellias Experience Centre&#39;, at your convenience. &nbsp;</p>
                <p><br></p>
                <p>Please find the attached brochure of DLF Camellias &amp; DLF 5 Golf Links to have a better understanding of the community of you are going to be part of.</p>
                <p><br></p>
                <p>Thanking You,&nbsp;</p>
                <p><br></p>
                <p>Warm Regards,</p>
                <p><br></p>
                <p>Piyoosh Tomar&nbsp;</p>
                <p><b>DLF - The Camellias</b>&nbsp;</p>
                <p>Golf Drive, DLF5, Gurgaon &ndash; 122009.&nbsp;</p>
                <p>Mobile: (+91) 7838213540</p>";
  
  
  
  $mail01 = new PHPMailer();
  
  // $mail->SetLanguage("en", 'includes/phpMailer/language/');
  $mail01->IsSMTP(); // set mailer to use SMTP
  $mail01->Host = $h; // specify main and backup server
  $mail01->SMTPAuth = true; // turn on SMTP authentication
  $mail01->Username = $u; // SMTP username
  $mail01->Password = $p; // SMTP password
  $mail01->From = $fe; // do NOT fake header.

  $mail01->FromName = "The Camellias Team";
  $mail01->AddAddress($email); // Email on which you want to send mail
  $mail01->AddReplyTo("Reply to Email ", "Support and Help");  // turn on SMTP authentication  
  $mail01->IsHTML(true);
  $mail01->Subject = $sub01;
  $mail01->Body = $msgBody01;
  $mail01->addAttachment('TheCamellias.pdf','TheCamellias.pdf');
  $mail01->addAttachment('DLF5GOLFLINKSE-BROCHURE.pdf','DLF5GOLFLINKSE-BROCHURE.pdf');
  if(!$mail01->Send())
  {
      $errorInfo= $mail01->ErrorInfo;   
      echo $errorInfo; 
  }

}
if(isset($_POST['dwnldFloorPlan'])){

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $query = mysqli_real_escape_string($conn,$_POST['query']);
  $propName = 'DLF Camellias';
  

  


  $sql= mysqli_query($conn,"INSERT INTO `enquiry`(`name`, `email`, `phone`, `bhk`, `area`, `propertyName`, `created_on`) VALUES ('$name','$email','$mobile','','','$propName','$current_time')");

  $h="mail.myhousingadvisor.com";  //----host
  $u="hello@myhousingadvisor.com"; //-----user
  $p="Airlines!234"; //-----password
  $fe="hello@myhousingadvisor.com";

  $recpnt = "property_leads@outlook.com";//Email sent To plz use this
  $sub="My Housing Advisor - The Camelias ";
  $msgBody="<table cellspacing='0' style='width:100%' border='1'>
              <tbody>
              <tr>
                <th>From:</th><td>Download Floor Plan</td>
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
                <th>Query:</th><td>".$query."</td>
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

  $mail->FromName = "The Camellias Team";
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
  
 
  

  $sub01="My Housing Advisor - The Camelias ";
  $msgBody01="<p><b>Dear &nbsp;".$name.",</b></p>
                <p><br></p>
                <p>I sincerely hope that you &amp; your family are doing well and your loved ones are safe &amp; sound.&nbsp;</p>
                <p>As home remains the safest place to be in, I would like to inform you that after the phenomenal success of &#39;The Aralias&#39; &amp; &#39;The Magnolias&#39;, DLF presents India&#39;s most super luxurious residential condominiums - &#39;<b>The Camellias</b>&#39;. These &#39;only by invitation&#39; limited number of super luxury residences are ready for possession and are already a home to some of India&#39;s topmost Industrialists, CXO&#39;s, keen Golfers, NRI&#39;s &amp; the likes.&nbsp;</p>
                <p>&nbsp;</p>
                <p>These are the 10 Key Points why India&#39;s Most Successful People choose us :-</p>
                <p><br></p>
                <p>1) Camellias is the best DLF has ever created in Super Luxury living. It is rated as India&#39;s most super luxurious address till date.&nbsp;</p>
                <p><br></p>
                <p>2) It is not just luxury within the four walls of your apartment but you are a part of the DLF 5 Golf links community where you have the 9 hole world renowned golf course - Arnold Palmer &amp; 18 hole golf course - Gary Player, beautiful artificial lakes, The Sanctuary having various species of flora &amp; fauna and open &amp; green pastures spread over 200 acres. Beyond that, you have 1000 acres of untouched Aravalis forest. So, it&#39;s like your own Switzerland in India.</p>
                <p><br></p>
                <p>3) Biggest Clubhouse in any residential project in the country and it will beat most 5-star luxury hotels in its size, opulence, appointment, dedicated to its resident&rsquo;s indulgence and leisure. Equal to the size of Trident Hotel, in Gurgaon.&nbsp;</p>
                <p><br></p>
                <p>4) Camellias in terms of pricing, homogeneity and affordability can&#39;t be beaten by any other super luxury community in the country. Best value for money.&nbsp;</p>
                <p><br></p>
                <p>5) A lot of South Delhi families have already moved into Camellias from Jorbagh, Golf Links, Aurengzeb Road, Prithviraj Road, Amrita Shergill Marg.&nbsp;</p>
                <p><br></p>
                <p>6) Best schools &amp; hospitals are within 5kms radius of Camellias.</p>
                <p><br></p>
                <p>7) It&#39;s not a done-up apartment where you cannot make any changes in the interiors. It is bareshell and you can design the internal setup as per your taste and liking.&nbsp;</p>
                <p><br></p>
                <p>8) DLF Golf and Country Club boasts of 2 courses designed by golfing legends, Arnold Palmer (9 holes) and Gary Player (18 holes), with the latter course hosting some of the most marquee Indian and European Tour golf tournaments. Best place for both learners &amp; professionals to seek Golf membership.&nbsp;</p>
                <p><br></p>
                <p>9) Best community and neighborhood in the country. It is already a home to some of India&#39;s topmost Industrialists, CXO&#39;s, keen Golfers, NRI&#39;s and Expats. At the same time the entire floor is kept for you with utmost privacy. There is only one apartment per floor. Plus it is more spacious with floor to floor height of 12.3 ft.&nbsp;</p>
                <p><br></p>
                <p>10) The project has appreciated by 15% &#39;Year On Year&#39; since time of launch while the overall real estate market depreciated by 10-40% during the same period &ndash; (Source: Prop Equity survey published in the Business Standard, June 11, 2019)</p>
                <p><br></p>
                <p>Request you to kindly save this number, should you wish to explore &#39;The Camellias&#39;. During this period, we can give a small presentation of &#39;The Camellias&#39; to you over a zoom video call. And once the lockdown is over, I would like to invite you for an exclusive &amp; private preview at the &#39;Camellias Experience Centre&#39;, at your convenience. &nbsp;</p>
                <p><br></p>
                <p>Please find the attached brochure of DLF Camellias &amp; DLF 5 Golf Links to have a better understanding of the community of you are going to be part of.</p>
                <p><br></p>
                <p>Thanking You,&nbsp;</p>
                <p><br></p>
                <p>Warm Regards,</p>
                <p><br></p>
                <p>Piyoosh Tomar&nbsp;</p>
                <p><b>DLF - The Camellias</b>&nbsp;</p>
                <p>Golf Drive, DLF5, Gurgaon &ndash; 122009.&nbsp;</p>
                <p>Mobile: (+91) 7838213540</p>";
  
  
  
  $mail01 = new PHPMailer();
  
  // $mail->SetLanguage("en", 'includes/phpMailer/language/');
  $mail01->IsSMTP(); // set mailer to use SMTP
  $mail01->Host = $h; // specify main and backup server
  $mail01->SMTPAuth = true; // turn on SMTP authentication
  $mail01->Username = $u; // SMTP username
  $mail01->Password = $p; // SMTP password
  $mail01->From = $fe; // do NOT fake header.

  $mail01->FromName = "The Camellias Team";
  $mail01->AddAddress($email); // Email on which you want to send mail
  $mail01->AddReplyTo("Reply to Email ", "Support and Help");  // turn on SMTP authentication  
  $mail01->IsHTML(true);
  $mail01->Subject = $sub01;
  $mail01->Body = $msgBody01;
  $mail01->addAttachment('TheCamellias.pdf','TheCamellias.pdf');
  $mail01->addAttachment('DLF5GOLFLINKSE-BROCHURE.pdf','DLF5GOLFLINKSE-BROCHURE.pdf');
  $mail01->addAttachment('Camellias7400.pdf','Camellias7400.pdf');
  $mail01->addAttachment('Camellias9500.pdf','Camellias9500.pdf');
  $mail01->addAttachment('Camellias11000.pdf','Camellias11000.pdf');
  $mail01->addAttachment('Camellias13000.pdf','Camellias13000.pdf');
  if(!$mail01->Send())
  {
      $errorInfo= $mail01->ErrorInfo;   
      echo $errorInfo; 
  }

}



?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>The Camellias | Sector 42 | Gurugram</title>
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

</head>
<body style="background-color: #75a4fc;background:url(img/main-slider-image-1.jpg);">
  <div class='container'>
   
    <center>
      <img src='https://www.dlfcamellias.myhousingadvisor.com/img/footer-logo.png' alt='logo' style="background: #000;padding: 0px 25px 15px 25px;">
    </center> 
    <br>
    <center><h2 class='text-center' style="line-height: 1.8;">Thanks for showing interest. <br>Your Housing Advisor will shortly assist you with the details of <b>The Camellias</b>.<br>You may also contact us on <a href="tel:+917838213540">+91 7838213540 </a></h2>
    </center>
    <br>
    <center>
    
      
      <br>
      <br>
      <a href="https://www.dlfcamellias.myhousingadvisor.com/" class="home-link">Back to Home</a>
    </center>
    
  </div>
</body>
</html>


