<?php
/**
* Template Name: Reservation
*
*/
$nameError = '';
$phoneError = '';
$emailError = '';
$commentError = '';
$countError = '';
$dateError = '';
$timeError = '';
?>
<?php
	global $de_data;
	$de_data = get_option( 'Lezatos_options' ); 
	$de_email = $de_data['DE_email_contact'];
	$de_time_open  = $de_data ['DE_time_open'];
	$de_time_close  = $de_data ['DE_time_close'];
	$de_time_step  = $de_data ['DE_time_step'];
	$success_message  = $de_data ['DE_booking_success_message'];
	
	$DE_mail_wrapper_color  = $de_data ['DE_mail_wrapper_color'];
	$DE_mail_header_color  = $de_data ['DE_mail_header_color'];
	$DE_mail_header_font_color  = $de_data ['DE_mail_header_font_color'];
	$DE_mail_header_text  = $de_data ['DE_mail_header_text'];
	$DE_mail_body_color_1  = $de_data ['DE_mail_body_color_1'];
	$DE_mail_body_color_2  = $de_data ['DE_mail_body_color_2'];
	$DE_mail_body_font_color  = $de_data ['DE_mail_body_font_color'];
	$DE_mail_footer_color  = $de_data ['DE_mail_footer_color'];
	$DE_mail_footer_font_color  = $de_data ['DE_mail_footer_font_color'];
	$DE_mail_footer_text  = $de_data ['DE_mail_footer_text'];

?>
<?php 
if(isset($_POST['submitted'])) {

	
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
		
		if(trim($_POST['phone']) === '') {
			$phoneError = 'You forgot to enter your phone.';
			$hasError = true;
		} else {
			$phone = trim($_POST['phone']);
		}
			
	
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		
		if(trim($_POST['person_num']) === '') {
			$countError = 'You forgot to enter your number of people.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$person = stripslashes(trim($_POST['person_num']));
			} else {
				$person = trim($_POST['person_num']);
			}
		}
		
		if(trim($_POST['datepick']) === '') {
			$dateError = 'You forgot to enter your date.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$date = stripslashes(trim($_POST['datepick']));
			} else {
				$date = trim($_POST['datepick']);
			}
		}
		
		if(trim($_POST['time']) === '') {
			$timeError = 'You forgot to enter your time.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$time = stripslashes(trim($_POST['time']));
			} else {
				$time = trim($_POST['time']);
			}
		}
			
		if(!isset($hasError)) {
			
			if($de_email):
  			$email_address = $de_email;
			else:
			$email_address = 'designesia@gmail.com';
    		endif;

			$emailTo = $email_address;
			$subject = 'New Reservation';
			$sendCopy = trim($_POST['sendCopy']);
			$body = "
<html>
<body>
<div style='padding:12px; display:inline-block; background:".$DE_mail_wrapper_color."'>
<div style='width:300; padding:10px; font-family:Arial, Helvetica, sans-serif; text-align:center; background:".$DE_mail_header_color."; color:".$DE_mail_header_font_color."; font-weight:bold;'>".$DE_mail_header_text."</div>
<div style=' display:inline-block; font-family:Arial, Helvetica, sans-serif;'>
<table width='320' cellpadding='0' cellspacing='0' border='0' style=' color:".$DE_mail_body_font_color."'>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Name</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$name</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Email</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$email</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Phone</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$phone</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Person</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$person</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Date</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$date</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Time</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$time</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Comments</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$comments</td>
  </tr>
   <tr>
    <td colspan='2' valign='top' style='padding:10px; color:".$DE_mail_footer_font_color."; font-style:italic; text-align:center;' bgcolor='".$DE_mail_footer_color."'><strong>".$DE_mail_footer_text."</strong></td>
  </tr>
</table>
</div>
</div>
</body>
";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:'.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."\r\n" . "Cc: ".$email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed Your Name';
				$headers = 'From: Your Name <noreply@somedomain.com>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
} ?>


<?php get_header(); ?>
		<div class="container">
        	<div class="eight columns">&nbsp;</div>
<div class="eight columns booking_form_holder">
		 <?php if(get_option('DE_contact_text')<>''): ?>
              <?php echo stripslashes(get_option('DE_contact_text')); ?>
              <div style=" margin-bottom:20px;"></div>
			  <?php endif; ?>
              
		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
              <div id="de_form" class="booking_form">
              <table class="table-form">
  <tr>
    <td><?php echo __('Name','Lezzatos'); ?></td>
    <td><input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
      <?php if($nameError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo __('Email','Lezzatos'); ?></td>
    <td><input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
      <?php if($emailError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
  </tr>
     <tr>
    <td><?php echo __('Phone','Lezzatos'); ?></td>
    <td><input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" class="requiredField" />
      <?php if($phoneError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo __('Person','Lezzatos'); ?></td>
    <td><input type="text" name="person_num" id="person_num" value="<?php if(isset($_POST['person_num']))  echo $_POST['person_num'];?>" class="requiredField" />
      <?php if($countError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo __('Date','Lezzatos'); ?></td>
    <td><input type="text" name="datepick" id="datepick" value="<?php if(isset($_POST['datepick']))  echo $_POST['datepick'];?>" class="requiredField" />
      <?php if($dateError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
    
  </tr>
  <tr>
    <td><?php echo __('Time','Lezzatos'); ?></td>
    <td><input type="text" name="time" id="time" value="<?php if(isset($_POST['time']))  echo $_POST['time'];?>" class="requiredField" />
      <?php if($timeError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo __('Comment','Lezzatos'); ?></td>
    <td><textarea name="comments" id="commentsText" rows="6" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
      <?php if($commentError != '') { ?>
      <span class="error"></span>
      <?php } ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td><!--<input style="width:24px; display:inline-block;" type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php //if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> />Send a copy of this email to yourself
				<input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /> -->
      <input type="hidden" name="submitted" id="submitted" value="true" />
      <button class="btn" type="submit"><?php echo __('SEND','Lezzatos'); ?></button></td>
  </tr>
  
</table>

		</form>
		</div>
        
        <?php if(isset($emailSent) && $emailSent == true) { ?>

        <div class="thanks">
        <?php 
        if($success_message){ echo $success_message;
		}else{ echo 'Thank You! Your reservation was successfully sent.';
		}
		?>
        </div>
        
        <?php } ;?>
		
        </div>
        <div class="clear"></div>
        
        </div>
        </div>
        <!-- ********** close content *********** -->

	<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/datepickr.js'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/jquery.timePicker.js'></script>
        
		<script type="text/javascript">
			new datepickr('datepick');
			
			new datepickr('datepick2', {
				'dateFormat': 'm/d/y'
			});
			
			new datepickr('datepick3', {
				'fullCurrentMonth': false,
				'dateFormat': 'l, F j'
			});
		</script>   
        
        <script type="text/javascript">
		  jQuery(function() {
			$("#time").timePicker({
				step:<?php if($de_time_step){echo $de_time_step;}else{ echo "60";}?>, 
				startTime:"<?php if($de_time_open){echo $de_time_open;}else{ echo "08:00";}?>", 
				endTime:"<?php if($de_time_close){echo $de_time_close;}else{ echo "22:00";}?>"
				});
			});
		</script> 
             
<?php get_footer(); ?>