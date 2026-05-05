<script language="javascript">

function getData(dyn)
{
	var req = null;

	document.this_form.dyn.value="Inicio...";
	if(window.XMLHttpRequest)
		req = new XMLHttpRequest();
	else if (window.ActiveXObject)
		req  = new ActiveXObject(Microsoft.XMLHTTP);

	req.onreadystatechange = function()
	{
		document.this_form.dyn.value="Buscando...";
		if(req.readyState == 4)
		{
			if(req.status == 200)
			{
				document.this_form.dyn.value="Recibido:" + req.responseText;
			}
			else
			{
				document.this_form.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
			}
		}
	};
	req.open("POST", "get.php", true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send(null);
}
</script>