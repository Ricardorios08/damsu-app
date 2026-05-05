<script language="javascript">
function on_load()
{
document.getElementById("nro_os").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "nro_os":
				document.getElementById("nombre_os").focus();
				
				break;
				case "nombre_os":
				document.getElementById("sigla").focus();
				break;
				case "sigla":
				document.getElementById("cobertura_drogas").focus();
				break;
				case "cobertura_drogas":
				document.getElementById("cobertura_material").focus();
				break;
				case "cobertura_material":
				document.getElementById("cobertura_internacion").focus();
				break;
				case "cobertura_internacion":
				document.getElementById("cobertura_estudios").focus();
				break;
				case "cobertura_estudios":
				document.getElementById("recargo_facturacion").focus();
				break;
				case "recargo_facturacion":
				document.getElementById("SI").focus();
				break;
				case "SI":
				document.getElementById("NO").focus();
				break;
				case "NO":
				document.getElementById("domicilio").focus();
				break;

				case "domicilio":
				document.getElementById("localidad").focus();
				break;
				case "localidad":
				document.getElementById("cod_postal").focus();
				break;
				case "cod_postal":
				document.getElementById("cod_area").focus();
				break;
				case "cod_area":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("tel_fax").focus();
				break;
				case "tel_fax":
				document.getElementById("email").focus();
				break;
				
				
				
		}
		return false;
	}
	return true;
}


</script>


<?php 
$nro_diagnostico = $_REQUEST['nro_diagnostico'];
$operador = $_REQUEST['operador'];

include ("../../conexiones/config_usu.php");
$sql="select * from diagnostico where nro_diagnostico LIKE '$nro_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);

$situacion = $_REQUEST['situacion'];
$linea = $_REQUEST['linea'];
$esquema = $_REQUEST['esquema'];
$plan = $_REQUEST['plan'];
$alternativa = $_REQUEST['alternativa'];


?>
<BODY onload = "on_load()">
<form action="cargar_droga.php" method="post">
  <table width="843" border="0">
    <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6">
      <td width="200">Operador: <?php echo $operador;?> <?php echo $nombre_operador;?></td>
      <td width="295">Diagnostico: <?php echo $nombre_diagnostico;?></td>
      <td width="70">Linea: <?php echo $linea;?></td>
      <td width="92">Esquema: <?php echo $esquema;?></td>
      <td width="56">Plan: <?php echo $plan;?></td>
      <td width="104">Alternativa: <?php echo $alternativa;?></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
      <td height="26" colspan="6"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> Droga: </font><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $nombre_droga;?></strong></font> 
          <font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Dosis:</font><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input type="text" name="domicilio" id="domicilio" onKeyPress="return verif_caracter(this,event)" size = "5">
          </strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Frecuencia:</font><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input type="text" name="domicilio2" id="domicilio2" onKeyPress="return verif_caracter(this,event)" size = "5">          
          <font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input type="submit" name="Submit" value="AGREGAR">
</strong></font></strong></font></div>        </td>
    </tr>
  </table>

  <table width="843" height="22" border="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="117" height="18"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2"><font size="2">Droga</font> </font></font></div></td>
    <td width="209"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Forma Farmaceutica </font></font></div></td>
    <td width="136"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Dosis</font></font></div></td>
    <td width="344"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Frecuencia</font></div></td>
    </tr>
  </table>

<iframe src = "detalle_protocolo.php" width = "843" height = "300" border ="1"> </iframe>
</form>
</body>