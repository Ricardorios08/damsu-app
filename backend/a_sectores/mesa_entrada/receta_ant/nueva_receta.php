<script language="javascript">
function on_load()
{
document.getElementById("documento").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "documento":
				document.getElementById("cod_diagnostico").focus();
				
				break;
				case "cod_diagnostico":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("base").focus();
				break;
				case "base":
				document.getElementById("fuente").focus();
				break;
				case "fuente":
				document.getElementById("matricula").focus();
				break;
				case "matricula":
				document.getElementById("observaciones").focus();
				break;
				case "observaciones":
				document.getElementById("siguiente").focus();
				break;
								
		}
		return false;
	}
	return true;
}


</script>

<?php 
$documento = $_REQUEST['id'];

include ("../../../conexiones/config_usu.php");
 $sql="select * from pacientes where documento = $documento";
	$result = $db->Execute($sql);
$documento=strtoupper($result->fields["documento"]);
$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$nombre_completo = $apellido.", ".$nombre; 


?>
<BODY onload = "on_load()">
<form action="guardar_diagnostico.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="3" valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>PROTOCOLO AL QUE INGRESA</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#3399FF"><div align="left"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;Paciente: <?php echo $nombre_completo;?> </font></strong></div></td>
    <td height="24" bgcolor="#3399FF"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Sup. Corporal</font></strong></td>
    <td height="24" bgcolor="#3399FF"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Documento:  <?php echo $documento;?></font> </strong></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="62%" height="24" bgcolor="#3399FF"> <div align="left"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;Ultimo diag.
        <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from diagnostico ORDER BY nombre_diagnostico";
$result = $db->Execute($sql);
echo "<select name=cod_diagnostico[] size=1 id =cod_diagnostico onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_diagnostico"];
$a1=strtoupper($result->fields["nombre_diagnostico"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font>
    </strong></div></td>
    <td width="24%" bgcolor="#3399FF"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Peso
        <input type="text" name="matricula" id="matricula3"  size="3"onKeyPress="return verif_caracter(this,event)">
  Talla
  <input type="text" name="matricula2" id="matricula22"  size="3"onKeyPress="return verif_caracter(this,event)">
    </font></strong></div></td>
    <td width="14%" bgcolor="#3399FF"><div align="left">        </div>
      <div align="left"></div>
      <div align="center"><strong><font color="#FFFFFF" size="2">
        <input type="Submit" name="Submit"  id ="Submit" value="Siguiente">
    </font></strong></div></td>
  </tr>
</table>
<!-- <iframe src = "cargar_droga.php" width = "800" height = "300" border ="0"> </iframe> -->