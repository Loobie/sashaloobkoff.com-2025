<!--
	//////////////////////////////////////////////////////////////////////////
	// change form data to initial caps
	function initialCap(valueStr) 
	{
		var index;
		var tmpStr;
		var tmpChar;
		var preString;
		var postString;
		var strlen;
		tmpStr = valueStr.toLowerCase();
		strLen = tmpStr.length;
		if (strLen > 0) 
		{
			for (index = 0; index < strLen; index++)  
			{
				if (index == 0)  
				{
				tmpChar = tmpStr.substring(0,1).toUpperCase();
				postString = tmpStr.substring(1,strLen);
				tmpStr = tmpChar + postString;
				}
				else 
				{
					tmpChar = tmpStr.substring(index, index+1);
					if (tmpChar == " " && index < (strLen-1))  
					{
					tmpChar = tmpStr.substring(index+1, index+2).toUpperCase();
					preString = tmpStr.substring(0, index+1);
					postString = tmpStr.substring(index+2,strLen);
					tmpStr = preString + tmpChar + postString;
					}
				}
			}
		}
		valueStr = tmpStr;
		return valueStr ;
	}
	
	////////////////////////////////////////////////////////////////////////
	// email validation function
	function emailVal(emailAddress)
	{
		// email RegEx string
		var regEx = /^[a-zA-Z0-9_.\-]{1,}@([a-zA-Z_\-]{2,}\.)+(com|org|net|mil|edu|AF|AL|DZ|AS|AD|AO|AI|AQ|AG|AR|AM|AW|AU|AT|AZ|BS|BH|BD|BB|BY|BE|BZ|BJ|BM|BT|BO|BA|BW|BV|BR|IO|BN|BG|BF|BI|KH|CM|CA|CV|KY|CF|TD|CL|CN|CX|CC|CO|KM|CG|CD|CK|CR|CI|HR|CU|CY|CZ|DK|DJ|DM|DO|TP|EC|EG|SV|GQ|ER|EE|ET|FK|FO|FJ|FI|FR|GF|PF|TF|GA|GM|GE|DE|GH|GI|GR|GL|GD|GP|GU|GT|GN|GW|GY|HT|HM|VA|HN|HK|HU|IS|IN|ID|IR|IQ|IE|IL|IT|JM|JP|JO|KZ|KE|KI|KP|KR|KW|KG|LA|LV|LB|LS|LR|LY|LI|LT|LU|MO|MK|MG|MW|MY|MV|ML|MT|MH|MQ|MR|MU|YT|MX|FM|MD|MC|MN|MS|MA|MZ|MM|NA|NR|NP|NL|AN|NC|NZ|NI|NE|NG|NU|NF|MP|NO|OM|PK|PW|PS|PA|PG|PY|PE|PH|PN|PL|PT|PR|QA|RE|RO|RU|RW|SH|KN|LC|PM|VC|WS|SM|ST|SA|SN|SC|SL|SG|SK|SI|SB|SO|ZA|GS|ES|LK|SD|SR|SJ|SZ|SE|CH|SY|TW|TJ|TZ|TH|TG|TK|TO|TT|TN|TR|TM|TC|TV|UG|UA|AE|GB|US|UM|UK|UY|UZ|VU|VE|VN|VG|VI|WF|EH|YE|YU|ZM|ZW)$/i
		
		if(regEx.test(emailAddress) == false)
		{
		alert("Invalid Email Address")
		return false;
		}
		return true;
	}
	
	
		////////////////////////////////////////////////////////////////////////
		// password validation function
	function passwordVal(password)
	{
		if (password.length < 5 || password.length  > 8)
		{
			alert("Please enter a password of 5-8 characters.");
			return false;
		}
		return true;
	}
	
	
	////////////////////////////////////////////////////////////////////////
	// zipcode validation function
	// note: hyphen is the only allowed delimeter for zip+4 codes : )
	function zipVal(zip)
	{
		// email RegEx string.
		var regEx = /^[a-zA-Z0-9]{3,3}([a-zA-Z0-9\s]{1,1})?([a-zA-Z0-9\s]{1,1})?([a-zA-Z0-9\s]{1,1})?([a-zA-Z0-9\s]{1,1})?([a-zA-Z0-9\s]{1,1})?-?([\d]{4,4})?$/
		
		if (regEx.test(zip) == false)
		{
			window.alert("Invalid Zip Code.");
			return false;
		}
		return true;
	}
	
	////////////////////////////////////////////////////////////////////////
	//  sign in form validation function
	function signInFormVal(myForm)
		{
		// run functions a second time (batch)
	
		// email filled?
		if (myForm.email.value.length < 1)
		{
			alert("Please enter your eMail address.");
			return false;
		}
	
		// password filled?
		if (myForm.password.value.length < 5 || myForm.password.value.length > 8)
		{
			alert("Please enter a password of 5-8  characters.");
			return false;
		}
		
		// check email format
		if (!emailVal(myForm.email.value))
			{
			return false;
			}
	
		// all conditions are met so must be ok
		return true;
		}
	
	////////////////////////////////////////////////////////////////////////
	// fregistration ofrm validation function
	function registrationFormVal(myForm)
		{
		// run functions a second time (batch)
	
		// email filled?
		if (myForm.email.value.length < 1)
		{
			alert("Please enter your eMail address.");
			return false;
		}
	
		// password filled?
		if (myForm.password.value.length < 5 || myForm.password.value.length > 8)
		{
			alert("Please enter a password of 5-8  characters.");
			return false;
		}
	
		// first filled?
		if (myForm.first.value.length < 1)
		{
			alert("Please enter your first name.");
			return false;
		}
	
		// last filled?
		if (myForm.last.value.length < 1)
		{
			alert("Please enter your last name.");
			return false;
		}
	
		// address filled?
		if (myForm.street.value.length < 1)
		{
			alert("Please enter your street address.");
			return false;
		}
	
		// city filled
		if (myForm.city.value.length < 1)
		{
			alert("Please enter your city.");
			return false;
		}
	
		// zip filled?
		if (myForm.zip.value.length < 1)
		{
			alert("Please enter your zip code.");
			return false;
		}
	
		// country filled?
		if (myForm.country.value.length < 1)
		{
			alert("Please enter your country.");
			return false;
		}
	
		// hint filled?
		if (myForm.hint.value.length < 1)
		{
			alert("Please enter your mother's maiden name.");
			return false;
		}
		
		// check zip format
		if (zipVal(myForm.zip.value) == false)
		{
		return false;
		}
		
		// check email format
		if (!emailVal(myForm.email.value))
			{
			return false;
			}
	
		// all conditions are met so must be ok
		return true;
		}
	
	////////////////////////////////////////////////////////////////////////
	// messageboard form validation function
	function messageboardFormVal(myForm)
	{
		// email filled?
		if (myForm.name.value.length < 1)
		{
			alert("Please enter your name.");
			return false;
		}
	
		// location filled?
		if (myForm.location.value.length < 1)
		{
			alert("Please enter your location.");
			return false;
		}
		
		// check email format (only if provided)
		if (myForm.email.value.length >0)
		{
			if (!emailVal(myForm.email.value))
			{
			return false;
			}
		}
		
		// check if rating provided
		var ratingChk = false;
		for (i=0; i<5; i++)
		{
			if (myForm.rating[i].checked)
			{
				ratingChk = true;
			}
		}
		
		if (!ratingChk)
		{
			alert("Please rate this product.");
			return false;
		}
	
		// comments filled?
		if (myForm.comments.value.length < 1)
		{
			alert("Please enter your comments.");
			return false;
		}
	
		// all conditions are met so must be ok
		return true;
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// for image swaps		
	function swapImgRestore() {
	  var i,x,a=document.sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	
	function preloadImages() {
	  var d=document; if(d.images){ if(!d.p) d.p=new Array();
		var i,j=d.p.length,a=preloadImages.arguments; for(i=0; i<a.length; i++)
		if (a[i].indexOf("#")!=0){ d.p[j]=new Image; d.p[j++].src=a[i];}}
	}
	
	function findObj(n, d) {
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function swapImage() { 
	  var i,j=0,x,a=swapImage.arguments; document.sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=findObj(a[i]))!=null){document.sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}

-->