function validate()
{

	var form = document.forms["signupForm"];

	var id = document.forms["signupForm"]["STUDENT_ID"].value;
	var name = document.forms["signupForm"]["STUDENT_NAME"].value;
	var password = document.forms["signupForm"]["STUDENT_PASSWORD"].value;
	var email = document.forms["signupForm"]["STUDENT_EMAIL"].value;
	var phone = document.forms["signupForm"]["STUDENT_PHONE"].value;
	

	idIsNumber = !(isNaN(id));
	idLength = getLength(id);

	nameIsLegitimate = checkForNumbers(name);

	passwordLength = getLength(password);

	phoneNumberValid = checkPhoneNumber(phone);

	alert("E-mail: " + email);
	validMcGillEmail = validateEmail(email);
	alert("Valid E-mail: " + validMcGillEmail);

    if(!idIsNumber) 
    {
        alert("ID must be a number");
        return false;
    }
    else if(idLength != 9)
    {
    	alert("ID must be 7 digit number");
        return false;
    }
   else if(!nameIsLegitimate)
    {
    	alert("Please enter either your first name no numbers or special characters!");
        return false;
    }
    else if(passwordLength < 8 || passwordLength > 20)
    {
    	alert("Please enter a password between 8 and 20 characters ");
    	return false; 
    }
    else if(!phoneNumberValid)
    {
    	alert("Please enter a phone number that follows the following format: (111)342-3242");
    	return false; 
    }
    else if(!validMcGillEmail)
    {
    	alert("Please enter a valid McGill E-mail that finishes with @mail.mcgill.ca");
    	return false; 
    }

    alert("DONE");
}


function getLength(id)
{
	return id.toString().length;
}


function checkForNumbers(name)
{

	for(i=0;i<name.length;i++)
	{
		fulfilsCondition = !((name[i] < 65 || name[i] >90) && (name[i] <97 || name[i]>122) &&  name[i] != 45);
		if(!fulfilsCondition)
		{
			return false;
		}	
	}
	return true;
}



function checkPhoneNumber(name)
{

	if(name.length > 13)
	{
		alert("String too long");
		return false;
	}

	for(i=0;i<13;i++)
	{
		if(i==0 && name[i] != '(')
		{
			alert("First char is not ( ");
			return false;
		}
		else if( (i>0&&i<4) && isNaN(name[i]))
		{
			alert("Char in area code is not a number");
			return false;
		}
		else if(i == 4 && name[i] != ')')
		{
			alert("Fifth char is not ) ");
			return false;
		}
		else if( (i>4&& i<8) && isNaN(name[i]))
		{
			alert("Char in first three digit is not a number");
			return false;
		}
		else if( (i>4&& i<8) && isNaN(name[i]))
		{
			alert("Char in first three digit is not a number");
			return false;
		}
		else if(i==8 && name[i] !='-')
		{
			alert("No Dash");
			return false;
		}
		else if( (i>8) && isNaN(name[i]))
		{
			alert("Char in last four digit is not a number");
			return false;
		}
	}

	return true;

}

function validateEmail(email)
{

	var length = email.length;

	if(length < 14)
	{
		alert("E-mail not long enough");
		return false;
	}

	domain = email.substring(length-15, length);
	requiredDomain = "@mail.mcgill.ca";
	
	if(!(domain == requiredDomain))
	{

		return false;
	}
	return true;
}