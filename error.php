<?php
	if (!isset($_GET['error_code'])){ 
		/* handler if the page is opened unintentionally */
		include_once "config.php"; // to get the local url;
		header('Location:'.$localurl."profile.php");
	} 
	else {
		/* if there is a valid error code */
		/* Display the error content based on error code */
		switch ($_GET['error_code']){
			case 'login_pass_fault':
				$err_title = 'Login : Invalid email';
				$err_message = 'You have entered an invalid email address or password. Please try again.';
				break;
			case 'login_login_fault':
				$err_title = 'Login : Invalid password';
				$err_message = 'You have entered an invalid email address or account number. Please try again.';
				break;
			case 'setpwd_pass_fault':
				$err_title = 'Change Password : Error';
				$err_message = 'You have entered an invalid email address or password. Please try again.';
				break;
			case 'setpwd_pass_notmatch':
				$err_title = 'Change Password : Error';
				$err_message = 'You have entered an invalid email address or account number. Please try again.';
				break;
			case 'register_unique_id':
				$err_title = 'Registration error';
				$err_message = 'A customer record with this ID already exists. You must enter a unique customer ID for each record you create.';
				break;
			case 'email_exist':
				$err_title = 'Registration error';
				$err_message = 'Your email address already exists. It may be caused by previous registration on this portal, or your information is already in our database';
				$err_message .= '<br /><br />Please contact our customer service at <a href="mailto:customerservice@williamcheng-son.com">customerservice@williamcheng-son.com</a> to obtain your login password.';
				break;
			case 'booking_slot_full':
				$err_title = 'Booking cannot be made';
				$err_message = 'The booking time slot you selected is full. Please choose another time slot.';
				break;
			case 'booking_error' :
				$err_title = 'Error';
				$err_message = 'Some error has occurred in the system. Please go back to previous page and try again.';
				break;
			case 'file_type':
				$err_title = 'Invalid file';
				$err_message = 'Error occured when handling your file. Please check if your files are in the correct format.';
				break;
			default:
				$err_title = 'Error';
				$err_message = 'An error has occured. Please make sure you fill correct information in the forms.';
				break;
		}
	}
?>
<?php
	include_once ("templates/head_tag.php");
?>
<div class="col-sm-6 col-sm-offset-3">
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h2 class="panel-title"><?php echo $err_title;?></h2>
		</div>
		<div class="panel-body">
			<p><?php echo $err_message;?></p>
			<p><a href="javascript: history.go(-1)">Go Back</a></p>
		</div>
	</div>
</div>
<?php 
	include("templates/footer_tag.php");
?>