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
    
$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$subject = $_POST['subject'];

$description = $_POST['description'];

$to = "er@elxrtech.com";
$sub = "ELXR Technologies Contact Form";
$msg = "Dear Admin, <br />";
$msg .= 'ELXR Technologies Contact Form<table border="1">  <br />';
$msg .= "<table><tr><td>firstname:</td><td> $firstname</td></tr>";
$msg .= "<tr><td>secondtname:</td><td> $secondname</td></tr>";
$msg .= "<tr><td>Email ID:</td><td> $email</td></tr>";
$msg .= "<tr><td>Phone No:</td><td> $phone</td></tr>";


$msg .= "<tr><td>Subject:</td><td> $subject</td></tr>";

$msg .= "<tr><td>description:</td><td> $description</td></tr></table>";

$from = $firstname;
$headers = "content-type: text/html"."\r\n"."from: $from";

if(mail($to, $sub, $msg, $headers)){?>
   <script>
         alert("Mail Sent Successfully");
		 window.location="index.html";
   </script>
 <?php }
	}
   }
	else
		{?>
         <script>
         alert("Please click on the reCAPTCHA box");
		 window.location="index.html#contactus";
        </script>
         <?php }
   }
?>

