<script language="javascript">
function on_load()
{
document.getElementById("cod_barra").focus();
document.getElementById("cod_barra").style.backgroundColor =  "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_barra":
document.getElementById("cod_barra").style.backgroundColor =  "#FFFFFF";
document.getElementById("ok1").style.backgroundColor =  "#CCFFCC";
document.getElementById("ok1").focus();
				break;

				
		
				
				
		}
		return false;
	}
	return true;
}

function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, location = 01, top = 35");
}

</script>