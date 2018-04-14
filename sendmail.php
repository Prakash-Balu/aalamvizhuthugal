<?php

if(isset($_REQUEST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "prakash.tech08@gmail.com";
    $email_subject = "Contact Form Submitted";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
   
    $name = $_REQUEST['name']; // required
    $email_from = $_REQUEST['email']; // required
    $telephone = $_REQUEST['phone']; // not required
    $comments = $_REQUEST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
  
  
 function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message = "Form details below.\n\n";
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

  // $headers .= "Reply-To: The Sender ".$email_from."\r\n"; 
  // $headers .= "Return-Path: The Sender ".$email_from."\r\n";
  // $headers .= "From: The Sender ".$email_from."\r\n";
  // $headers .= "Organization: Sender Organization\r\n";
  // $headers .= "MIME-Version: 1.0\r\n";
  // $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  // $headers .= "X-Priority: 3\r\n";
  // $headers .= "X-Mailer: PHP/". phpversion() ."\r\n" 

$output=  mail($email_to, $email_subject, $email_message, $headers);
//@mail($email_to, $email_subject, $email_message, $headers); 
echo'<pre>';print_r( $output);
exit;
//$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/contact.html';
//header("Location: ".$home_url);
?>
 
<!-- include your own success html here -->
 
<!--Thank you for contacting us. We will be in touch with you very soon.-->
 
<?php
 
}
?>