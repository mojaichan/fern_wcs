<?php
require_once '../PHPToolkit/NetSuiteService.php';

$service = new NetSuiteService();

$passport = new LoginRequest();
$passport->passport->account = $service->passport->account;
$passport->passport->email = $_POST["user_email"];
$passport->passport->password = $_POST["user_password"];

//Debug only
//echo $passport->passport->email."<br />";
//echo $passport->passport->password."<br />";

try {
	//send LoginRequest
	$result = $service->login($passport);
	$status = $result->sessionResponse->status;
}
catch(SoapFault $fault)
{
	$systemMsg = "fault string:".$fault->faultstring."<br />";
	$systemMsg .= '<a href="javascript: history.go(-1)">Go Back</a>';
	if (strpos($fault->faultstring,'You have entered an invalid email address or password.') !== false){
		$err_code = 'login_pass_fault';
	}
	elseif (strpos($fault->faultstring,'You have entered an invalid email address or account number.') !== false){
		$err_code = 'login_login_fault';
	}
	else{ 
		$err_code = "others"; 
	}
	
	//redirect to error page;
	include_once "../templates/head_tag.php";
	header('location:'.$localurl."error.php?error_code=".$err_code);
}
if (isset($status))
	if($status->isSuccess == true){
		//use ID to search customer record
		
		$getrequest = new GetRequest();
		$getrequest->baseRef = new RecordRef();
		$getrequest->baseRef->internalId = $result->sessionResponse->userId->internalId;
		$getrequest->baseRef->type = "customer";
		$getResponse = $service->get($getrequest);
		$customer = $getResponse->readResponse->record;
		/*
		 * echo "<br />Hello! ".$customer->companyName;
		echo '<br />Go to <a href="portal.php">Customer Portal</a>';
		*/
		//Begin session management
		include "./session_setup.php";
		$_SESSION["internalid"] = $customer->internalId;
		
		include_once "../templates/head_tag.php"; //in order to get correct redirection url		
		header('location:'.$localurl."portal.php");
	}
?>
<div><?php echo /*$err_code;*/$systemMsg; ?></div>
