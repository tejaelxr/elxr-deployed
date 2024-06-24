<?php 
if(!empty($_POST['email'])){
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	//your site secret key
	$secret = '6LfhsaMUAAAAAARKB2olxluzqXcAQ0fVdU-dMaPS';
	//get verify response data
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);
	if($responseData->success == false)
    {
    echo '<h2>Robot verification failed, please try again.</h2>';
    }
   
	if ($responseData->success){  
    
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$subject = $_POST['subject'];

$message = $_POST['message'];

$to = "er@elxrtech.com";
$sub = "ELXR Technologies Contact Form";
$msg = "Dear Admin, <br />";
$msg .= 'ELXR Technologies Contact Form<table border="1">';
$msg .= "<table width=80% cellpadding=2 cellspacing=2><tr><td>Full Name:</td><td> $name</td></tr>";
$msg .= "<tr><td>Email ID:</td><td> $email</td></tr>";
$msg .= "<tr><td>Phone No:</td><td> $phone</td></tr>";


$msg .= "<tr><td>Subject:</td><td> $subject</td></tr>";

$msg .= "<tr><td>Message:</td><td> $message</td></tr></table>";

$from = $name;
$headers = "content-type: text/html"."\r\n"."from: $from";

if(mail($to, $sub, $msg, $headers)){?>
   <script>
         alert("Mail Sent Successfully");
		 window.location="contact.html";
   </script>
 <?php }
	}
   }
	else
		{?>
         <script>
         alert("Please click on the reCAPTCHA box");
		 window.location="contact.html#contact";
        </script>
         <?php }
   }
?>

