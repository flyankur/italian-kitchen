<?php
	$path = __FILE__;
	$pathwp = explode( 'wp-content', $path );
	$wp_url = $pathwp[0];
	// Loading the wp core functions and variables
	require_once( $wp_url.'/wp-load.php' );
	
	$name	= trim($_POST['contact_name']);
	$email	= $_POST['contact_email'];
	$comments	= $_POST['contactcomment'];
	$sucess		= $_POST['contact_success'];
	$contact_ccorrect	= $_POST['contact_ccorrect'];
	$contact_captcha	= $_POST['contact_captcha'];
	
	$site_owners_email = $_POST['contact_widgetemail']; // Replace this with your own email address
	$error = '';
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address";	
	}
	
	if (strlen($comments) < 3) {
		$error['comments'] = "Please leave a comment.";
	}
	if ($contact_captcha !=$contact_ccorrect) {
		$error['captcha'] = "Please Enter Captcha.";
	}
	
	if ( !$error ) {
	
		$subject = 'Contact Form Submission from '.$name;
		// message bid====
		$body  ="Name: $name \n\n";
		$body .="Email: $email \n\n";
        $body .="Message: $comments";
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail($site_owners_email, $subject, $body, $headers);
		if($sucess)
		{
		echo '<span class="success">'.$sucess.'</span>';
		}else{
		echo '<span class="success">'. __('Your message was successfully sent.', 'ATP_ADMIN_SITE').'</span>';
		}
		
	} # end if no error
	else {

		//$response = (isset($error['name'])) ? "<li>" . $error['name'] . "</li> \n" : null;
		//$response .= (isset($error['email'])) ? "<li>" . $error['email'] . "</li> \n" : null;
		//$response .= (isset($error['phoneno'])) ? "<li>" . $error['phoneno'] . "</li>\n" : null;
		
		//echo $response;
	} # end if there was an error sending

?>