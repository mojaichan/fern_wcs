
<?php
require_once 'controllers/log_control.php';
require_once 'PHPToolkit/NetSuiteService.php';

/* -- A service is called to load the profile of the customer -- 
 * $customer stores the output 
 * */
$service = new NetSuiteService();
$request = new GetRequest();
$request->baseRef = new RecordRef();
$request->baseRef->internalId = $_SESSION["internalid"];
$request->baseRef->type = "customer";
$getResponse = $service->get($request);


if (!$getResponse->readResponse->status->isSuccess) {
	echo "GET ERROR";
} else {
	//assign customer details into $customer
	$customer = $getResponse->readResponse->record;
	//assign address details into $address
	$addressBookListArray = $customer->addressbookList->addressbook;
	if (is_array($addressBookListArray)) { // handler if the customer has multiple addresses
		foreach($addressBookListArray as $value){
			if ($value->label == "Main Address")
				$address = $value;
			if ($value->label == "Alternative Address")
				$r_address = $value;
		}
	} else { //single address handling
		$address = $addressBookListArray;
	}
	print_r($address);
	echo "<br />";
	print_r($r_address);
}
/* -- finished reading customer info via Webservice -- */

/* -- Form pre-set based on customer information --
	 * 	This part is important especial for checkbox, radio 
	 *  Fields applied : defaultShipping, defaultBilling, isResidential
	 */
	
	/* -- This function is  transferrable --*/
	function form_boolean_set($source, $output) {
		//$source should be a boolean data, $output is string
		$text = ($source == true) ? $output : '';
		echo $text;
	}
/* -- end of block */
	
include("templates/head_tag.php");
?>
<h2>Your Profile</h2>
<form class="form-horizontal" role="form" id="wcsform" action="controllers/update_profile.php" method="post">
	<fieldset>
		<legend>Personal Information</legend>
		<div class="form-group">
			<label for="salutation" class="col-sm-2 control-label">Salutation: </label>
			<div class="col-sm-10">
				<label class="radio-inline">
					<input type="radio" name="salutation" id="salutation_mr" class="radio_box" value="Mr." >Mr.
				</label>
				<label class="radio-inline">
					<input type="radio" name="salutation" id="salutation_mr" class="radio_box" value="Ms." >Ms.
				</label>
				<label class="radio-inline">
					<input type="radio" name="salutation" id="salutation_mr" class="radio_box" value="Mrs." >Mrs.
				</label>
			</div>
		</div>
		<script>
			//Use Javascript to update the radio boxes base on Netsuite record
			$(document).ready(function(){
				//$('radio#
				$('input.radio_box[value="<?php echo $customer->salutation; ?>"]').prop("checked",true);
			});
		</script>
		<div class="form-group">
			<label for="firstname" class="col-sm-2 control-label">First Name:</label>
			<div class="col-sm-10">
				<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $customer->firstName; ?>" />
			</div>
		</div>
		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" value="<?php echo $customer->lastName; ?>" />
		<br />
		<label for="companyname">Company Name:</label>
		<input type="text" name="companyname" id="companyname" value="<?php echo $customer->companyName; ?>" />
		<br />
		<label for="phone">Telephone Number</label>
		<input type="text" name="phone" id="phone" value="<?php echo $customer->phone; ?>" />
		<br />
		<label for="comments">Referred by:</label>
		<input type="text" name="comments" id="comments" value="<?php echo $customer->comments; ?>"/>
		<br />
	</fieldset>
	<fieldset>
		<legend>Main Address</legend>
		<label for="defaultbilling">Default billing address</label>
		<input type="radio" name="defaultbilling" id="defaultbilling" value="address" <?php form_boolean_set($address->defaultBilling, "checked"); ?> />
		<br />
		<label for="defaultshipping">Default shipping address</label>
		<input type="radio" name="defaultshipping" id="defaultshipping" value="address" <?php form_boolean_set($address->defaultShipping, "checked"); ?> />
		<br />
		<label for="isresidential">Residental address</label>
		<input type="checkbox" name="isresidential" id="isresidential" <?php form_boolean_set($address->isResidential, "checked"); ?> />
		<br />
		<label for="address1">Address line 1:</label>
		<input type="text" name="address1" id="address1" value="<?php echo $address->addr1; ?>" />
		<br />
		<label for="address2">Address line 2:</label>
		<input type="text" name="address2" id="address2" value="<?php echo $address->addr2; ?>" />
		<br />
		<label for="city">City:</label>
		<input type="text" name="city" id="city" value="<?php echo $address->city; ?>"/>
		<br />
		<label for="state">State:</label>
		<input type="text" name="state" id="state" value="<?php echo $address->state; ?>"/>
		<br />
		<label for="zip">Postal code:</label>
		<input type="text" name="zip" id="zip" value="<?php echo $address->zip; ?>" />
		<br />
		<label for="country">Country:</label>
		<?php 
			require_once ("NetsuiteCountries.php");
			generate_country_select($countries, "country",$address->country);
		?>
		<br />
	</fieldset>
	<fieldset>
		<legend>Alternative Address</legend>
		<label for="defaultbilling">Default billing address</label>
		<input type="radio" name="defaultbilling" id="r_defaultbilling" value="r_address" <?php form_boolean_set($r_address->defaultBilling, "checked"); ?> />
		<br />
		<label for="defaultshipping">Default shipping address</label>
		<input type="radio" name="defaultshipping" id="r_defaultshipping" value="r_address" <?php form_boolean_set($r_address->defaultShipping, "checked"); ?> />
		<br />
		<label for="isresidential">Residental address</label>
		<input type="checkbox" name="r_isresidential" id="r_isresidential" <?php form_boolean_set($r_address->isResidential, "checked"); ?> />
		<br />
		<label for="r_address1">Address line 1:</label>
		<input type="text" name="r_address1" id="r_address1" value="<?php echo $r_address->addr1; ?>" />
		<br />
		<label for="r_address2">Address line 2:</label>
		<input type="text" name="r_address2" id="r_address2" value="<?php echo $r_address->addr2; ?>" />
		<br />
		<label for="r_city">City:</label>
		<input type="text" name="r_city" id="r_city" value="<?php echo $r_address->city; ?>" />
		<br />
		<label for="r_state">State:</label>
		<input type="text" name="r_state" id="r_state" value="<?php echo $r_address->state; ?>" />
		<br />
		<label for="r_zip">Postal code:</label>
		<input type="text" name="r_zip" id="r_zip" value="<?php echo $r_address->zip; ?>" />
		<br />
		<label for="r_country">Country:</label>
		<?php 
			require_once ("NetsuiteCountries.php");
			generate_country_select($countries, "r_country",$r_address->country);
		?>
		<br />
	</fieldset>
	<input type="hidden" name="source" value="profile.php" />
	<input type="submit" value="Update" />
	<br /><a href="portal.php">Back</a>
</form>

<!-- Client side validation -->
<script type="text/javascript" src="lib/jquery.validate.js"></script>
<script type="text/javascript" src="lib/wcs_validation.js"></script>

<?php 
include("templates/footer_tag.php");
?>