<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	
<?php
	$name = $_POST['name'];
  	$visitor_email = $_POST['email'];
  	$message = $_POST['message'];
	$company = $_POST['company'];
	
	$email_from = $visitor_email;
    $email_subject = "New Client Submission";
    $email_body = "You have received a new message from $name, $company.\n".
                            "Here is the message:\n $message".
	$to = "info@andromedamedia.co.uk";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $visitor_email \r\n";
  mail($to,$email_subject,$email_body,$headers);

function IsInjected($str){
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
                
    $inject = join('|', $injections);
    $inject = "/$inject/i";
     
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
 
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

	
?>
	
</body>
</html>