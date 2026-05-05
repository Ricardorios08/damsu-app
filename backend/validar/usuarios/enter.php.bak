<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="JavaScript">

function getData(dyn)
{
	var req = null;
    var input = document.getElementById(dyn);
	input.value = "Inicio...";
	if(window.XMLHttpRequest)
		req = new XMLHttpRequest();
	else if (window.ActiveXObject)
		req  = new ActiveXObject(Microsoft.XMLHTTP);

	req.onreadystatechange = function()
	{
		input.value = "Esperando al servidor...";
		if(req.readyState == 4)
		{
			if(req.status == 200)
			{
				input.value = "Recibido:" + req.responseText;
			}
			else
			{
				input.value = "Er: returned status code " + req.status + " " + req.statusText;
			}
		}
	};
	req.open("POST", "get.php", true); // returns string "working"
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send(null);
}

</script>
</head>
<body>

<FORM name="this_form" method="POST" action="">
<INPUT type="BUTTON" value="Submit"  ONCLICK="getData('company_name')">
<input type="text" id="company_name" name="company_name" size="32" value="">
</FORM>

</body>
</html> 