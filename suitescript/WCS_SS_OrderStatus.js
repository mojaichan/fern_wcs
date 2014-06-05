function getWebOrderStatus(status_internalid,received,sentdate){
	switch(status_internalid){
	//'pendingFulfillment' fullyBilled pendingApproval partiallyFulfilled pendingBilling pendingBillingPartFulfilled closed
		case 'pendingApproval':
			return 'Order in progress';
			break;
		case 'pendingFulfillment':
		case 'partiallyFulfilled':
		case 'pendingBillingPartFulfilled':
			return 'Production in progress';
			break;
		case 'pendingBilling':
		case 'fullyBilled':
			if (received == true){
				return 'Completed';
			}
			if (received == false){
				return 'Delivery in progress';
			}
			return 'undefined';
		case 'closed':
			//empty sent date means no fulfillment is required
			if (received == true || sentdate ==''){
				return 'Completed';
			}
			if (received == false){
				return 'Delivery in progress';
			}
			return 'undefined';
			break;
		default:
			return 'undefined';
	}
}

function suitelet_getOpenSalesOrder(request, response){
	//constants for this function only
	var pickUpByCustomerID = '3';
	
	// verify if the request contains 'custid'. If not, output error
	var customer_internalId = request.getParameter('custid');
	if (!customer_internalId){
		nlapiLogExecution('ERROR',"request","not custid argument");	
		return;
	}	
	/* prepare and execute saved search */
	var salesorder_search = nlapiLoadSearch('transaction', 'customsearch_website_order_status_main');
	var filters = salesorder_search.getFilters();
	var someCriteria = new nlobjSearchFilter('entity',null, 'anyof', customer_internalId);
	salesorder_search.addFilter(someCriteria);
	salesorder_search.saveSearch();
	var salesorder_searchResult = nlapiSearchRecord('transaction', 'customsearch_website_order_status_main');
	salesorder_search.setFilters(filters);
	salesorder_search.saveSearch();
	if (salesorder_searchResult != null){
		var salesorders = new Array();
		var resultSize = Math.min(10,salesorder_searchResult.length);
		//response.write(JSON.stringify(salesorder_searchResult[0]));
		//response.write("has" + salesorder_searchResult.length+" result. result size = "+resultSize+" <br />");
		for (var i = 0; i < resultSize; i++){
			salesorders[i] = {};
			var json_data = JSON.stringify(salesorder_searchResult[i]);
			var json_salesorder = JSON.parse(json_data);
			salesorders[i].internalid = json_salesorder.id;
			salesorders[i].trandate = json_salesorder.columns.trandate;
			salesorders[i].tranid = json_salesorder.columns.tranid;
			salesorders[i].deliverymode = {};
			salesorders[i].deliverymode.name = json_salesorder.columns.custbody4.name;
			salesorders[i].deliverymode.internalid = json_salesorder.columns.custbody4.internalid;
			if (salesorders[i].deliverymode.internalid != pickUpByCustomerID){ //3 stands for pickup by customer
				salesorders[i].shipaddress = json_salesorder.columns.shipaddress;
			} else {
				salesorders[i].shipaddress = '';
			}
			salesorders[i].custbody_website_received = json_salesorder.columns.custbody_website_received;
			salesorders[i].custbody_tracking_number = json_salesorder.columns.custbody_tracking_number;
			if (json_salesorder.columns.custbody_website_sent_date && json_salesorder.columns.custbody_website_sent_date.type !== "undefined"){
				salesorders[i].custbody_website_sent_date = json_salesorder.columns.custbody_website_sent_date;
			} else {
				salesorders[i].custbody_website_sent_date = '';
			}
			salesorders[i].status = getWebOrderStatus(json_salesorder.columns.statusref.internalid,salesorders[i].custbody_website_received,salesorders[i].custbody_website_sent_date);
			//response.write(JSON.stringify(salesorders[i]) + "<br /><br />");
		}
		response.write(JSON.stringify(salesorders));
	//	nlapiLogExecution('AUDIT',"Saved Search","Executed on customer internalid: "+ customer_internalId +". "+resultSize+" results returned.");
	} else {
		//nlapiLogExecution('AUDIT',"Saved Search","Executed on customer internalid: "+ customer_internalId +". No result is found.");
	}
}

function changeLanguage(langcode){
	var companyInfo = nlapiLoadConfiguration( 'userpreferences' );
	companyInfo.setFieldValue( 'language', langcode );
	nlapiSubmitConfiguration( companyInfo );
}

function markOrderReceived(request, response){
	/** error codes
	 *  RCRD_DSNT_EXIST : thrown by nlapiLoadRecord if loading a non-exist record
	 */

	nlapiLogExecution('DEBUG',"request","entered");	
	var configpage = nlapiLoadConfiguration('companypreferences');
	//var comlang = configpage.getFieldText('language');
	//response.write('comlang'); 
	var configpage = nlapiLoadConfiguration('userpreferences');
	response.write(configpage.getFieldText('language')); 
	//getRequestID - so_internalid & custid
	var customer_internalId = request.getParameter('custid');
	var so_internalId = request.getParameter('so_internalid');
	if (!customer_internalId || !so_internalId){
		response.write('missing arguments');
		nlapiLogExecution('ERROR',"request","missing arguments");	
		return;
	}
	changeLanguage('en');
	response.write(nlapiGetContext().getPreference('language'));
	try { //throw error if the sales order's internalid is not valid
		var recSO = nlapiLoadRecord('salesorder',so_internalId);
	}
	catch (err){
		if (err instanceof nlobjError){
			response.write('{"isSuccess":"false","err_code":"'+err.getCode()+ '"}');
			return;
		}
	}
	
	//validate so_internalid matches custid
	var so_custid = recSO.getFieldValue('entity');
	if (so_custid != customer_internalId){
		//output error
		response.write('{"isSuccess":"false","err_code":"INVALID_CUSTOMER_ID"}');
		return;
	}
	
	//update field
	
	recSO.setFieldValue('custbody_website_received','T');
	//nlapiSubmitRecord(recSO);
	response.write('{"isSuccess":"true","id":"'+so_internalId+ '"}');
	nlapiLogExecution('Debug',"Success","Marked received on SO internal ID:"+so_internalId);
}