<!--
function validate_email_address(elem){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		//alert(helperMsg);
		//elem.focus();
		return false;
	}
}



function ValidateForm(f)
{
	var first_nameID=f.first_name;
	var last_nameID=f.last_name;
	var emailID=f.email;
	var phone1_p1ID=f.phone1_p1.value;
	var phone1_p2ID=f.phone1_p2.value;
	var phone1_p3ID=f.phone1_p3.value;
	var streetID=f.street;
	var cityID=f.city;
	var stateID=f.state;
	var zipID=f.zip;
	var messageID=f.message;

	if(first_nameID.value==null || first_nameID.value=="")
	{
		alert("Please provide your first name.");
		first_nameID.focus(); // sets the focus to this element of the form
		return false;
	}

	if(last_nameID.value==null || last_nameID.value=="")
	{
		alert("Please provide your last name.");
		last_nameID.focus();
		return false;
	}
	
	if(streetID.value==null || streetID.value=="")
	{
		alert("Please provide your street address.");
		streetID.focus();
		return false;
	}
	
	var numericExpression = /^[\d]{5}$/; // is numeric
	
	if(zipID.value==null || zipID.value=="" || zipID.value.length!=5 || !zipID.value.match(numericExpression))
	{
		alert("Please provide your valid 5 digit Zip Code.");
		zipID.focus();
		return false;
	}
	
	var filter2=/[2-9]{1}[0-8]{1}[0-9]{1}/g;
	var res=filter2.test(phone1_p1ID).toString();
	void(filter2.test(phone1_p1ID)+'_'+res);
	if (res==='false')
	{
		alert("Sorry, your phone's area code appears to be invalid. Please check the number and try again.");
		f.phone1_p1.focus();
		return false;
	}
	var filter3=/[2-9]{1}[0-9]{2}/g;
	res=filter3.test(phone1_p2ID).toString();
	void(filter3.test(phone1_p2ID)+'_'+res);
	if (res==='false')
	{
		alert("Sorry, your phone's prefix appears to be invalid. Please check the number and try again.");
		f.phone1_p2.focus();
		return false;
	}
	var filter4=/[0-9]{4}/g;
	res=filter4.test(phone1_p3ID).toString();
	void(filter4.test(phone1_p3ID)+'_'+res);
	if (res==='false')
	{
		alert("Sorry, your phone's suffix appears to be invalid. Please check the number and try again.");
		f.phone1_p3.focus();
		return false;
	}
	var filter5=/^01[0-9]{2}/g;
	res=filter5.test(phone1_p3ID).toString();
	void(filter5.test(phone1_p3ID)+'_'+res);
	if (phone1_p2ID=='555' && res==='true'){
		alert("Sorry, that is an invalid 555 phone number. Please check the number and try again.");
		f.phone1_p3.focus();
		return false;
	}
	
	
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;	
	if(!emailID.value.match(emailExp))
	{
		alert("Please provide a valid email address.");
		emailID.focus();
		return false;
	}
	
	
		if(messageID.value==null || messageID.value=="")
	{
		alert("Please describe what credit issues are currently causing problems.");
		messageID.focus();
		return false;
	}

	return true;
}
//-->