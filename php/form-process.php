<?php
if (count($_POST) >= 3) {
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Subject = isset($_POST["subject"]) ? $_POST["subject"] : "(no subject)";
	$Message = $_POST["message"];
	$Time = date("l, F jS, Y, g:i a", strtotime("now"));
	$IP = "{$_SERVER['REMOTE_ADDR']}, {$_SERVER['HTTP_CLIENT_IP']}, {$_SERVER['HTTP_X_FORWARDED_FOR']}";
	$Browser = $_SERVER['HTTP_USER_AGENT'];
	$message  = "Name: {$Name}\n";
	$message .= "Email: {$Email}\n";
	$message .= "Subject: {$Subject}\n";
	$message .= "Message: {$Message}\n";
	$message .= "Time: {$Time}\n";
	$message .= "IP Address: {$IP}\n";
	$message .= "Browser: {$Browser}\n\n";
	$messageHTML = '<div style="line-height: 1; font-family: \'Open Sans\', \'Segoe UI\', sans-serif; font-size: 12pt;">
  <div style="background-color: #333; color: #fff; padding: 10px; text-align: center;">
    New Message from Varsha\'s website.
  </div>
  <div style="padding: 5px; background: #99c;">
    <div style="padding: 5px; background: #AEE5D8;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">Name</strong>
      <span>' . $Name . '</span>
    </div>
    <div style="padding: 5px; background: #E7E5E5;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">Email</strong>
      <span>' . $Email . '</span>
    </div>
    <div style="padding: 5px; background: #AEE5D8;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">Subject</strong>
      <span>' . $Subject . '</span>
    </div>
    <div style="padding: 5px; background: #E7E5E5;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">Message</strong>
      <span>' . $Message . '</span>
    </div>
    <div style="padding: 5px; background: #AEE5D8;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">Time</strong>
      <span>' . $Time . '</span>
    </div>
    <div style="padding: 5px; background: #E7E5E5;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">IP Address</strong>
      <span>' . $IP . '</span>
    </div>
    <div style="padding: 5px; background: #AEE5D8;">
      <strong style="font-weight: normal; background: rgba(0,105,0,0.15); display: inline-block; vertical-align: middle; margin: -5px; margin-right: 5px; padding: 5px; width: 100px;">Browser</strong>
      <span>' . $Browser . '</span>
    </div>
  </div>
  <div style="background-color: #f0835c; color: #fff; padding: 10px; text-align: center; font-size: 0.75em;">
    Copyright &copy; 2017 Praveen Kumar.
  </div>
</div>';
	mail("varsha@cloudroit.com", "New Message from $Name on Varsha's Website", $messageHTML, "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1");
	if (file_put_contents("emails.txt", $message, FILE_APPEND | LOCK_EX))
		echo "success";
	else
		header((isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0') . ' 400 Bad Request');
} else
	header((isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0') . ' 400 Bad Request');
?>