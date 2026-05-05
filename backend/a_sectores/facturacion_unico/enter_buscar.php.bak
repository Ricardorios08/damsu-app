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
document.getElementById("proveedor").style.backgroundColor =  "#CCFFCC";
document.getElementById("proveedor").focus();
				break;

				case "proveedor":
document.getElementById("proveedor").style.backgroundColor =  "#FFFFFF";
document.getElementById("cantidad").style.backgroundColor =  "#CCFFCC";
document.getElementById("cantidad").focus();
				break;
				
				case "cantidad":
document.getElementById("cantidad").style.backgroundColor =  "#FFFFFF";
document.getElementById("Alta").style.backgroundColor =  "#CCFFCC";
document.getElementById("Alta").focus();
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