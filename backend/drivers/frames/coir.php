<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
	 <link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<title>COIR</title>
<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/celeste22.jpg);
	background-repeat: no-repeat;
}
.Estilo65 {
	font-family: "Trebuchet MS";
	font-size: 12px;
	font-weight: bold;
}
.Estilo66 {
	font-family: "Trebuchet MS";
	font-size: 18px;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo69 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }
.Estilo71 {font-family: "Trebuchet MS"; font-size: 16px; color: #FFFFFF; font-weight: bold; }
.Estilo72 {	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo73 {font-size: 14px}
-->
</style>


<script language="javascript">
function on_load()
{
document.getElementById("busca").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "tipo_doc":
				document.getElementById("busca").focus();
				break;
				
								
		}
		return false;
	}
	return true;
}


</script>

</head>
<BODY  onload = "on_load()">

<?php
include ("../../conexiones/config.inc.php");
 $id = $_REQUEST['id'];
 $usuario = $_REQUEST['id'];
 $sql= "select * from usuario where id = '$usuario'" ;
$result = $db->Execute($sql);

$rol=strtoupper($result->fields["rol"]);
$programa=strtoupper($result->fields["programa"]);
$usuario=strtoupper($result->fields["usuario"]);
$id=strtoupper($result->fields["id"]);
 $nombre_usuario=strtoupper($result->fields["nombre_usuario"]);
$rol=strtoupper($result->fields["rol"]);
?>


<FORM ACTION="../../a_sectores/facturacion/buscar_paciente_general_coir.php" method="post" TARGET = "central1">

 


<table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="185" rowspan="3"><div align="center"><img src="../../imagenes/logo_damsu.jpg" width="140" height="59" /> </div>      <div align="center" class="Estilo65"> </div>      <!-- <input type = "text" name = "tipo_doc" size = "2"  id="tipo_doc" onkeypress="return verif_caracter(this,event)" /> -->      </td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="601" colspan="2">  <div id="menuh">
		<ul>
		<li><a href='../../a_sectores/planillas.php?id=<?php print("$id");?>' target = 'izquierda'>Planillas </a></li>
		<li><a href="../../index.html" target="_TOP">Salir</a></li>
			
		</ul>
</div></td>
    </tr>
  <tr>
    <td><span class="Estilo69">&nbsp;&nbsp;BUSCAR PACIENTE </span>      <input type = "text" class = "ctxt" name = "busca" size = "12" id="busca" />
      <input type = "hidden" name = "id" value = "<?php echo $id;?>" />
      <input type = "submit" name = "ok" value = "OK" class = "bot1"/></td>
  <td><div align="right"><span class="Estilo72"><span class="Estilo73">®</span> Programaci&oacute;n: Ricardo Rios</span></div></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#14548B">
    <td width="45" valign="middle">&nbsp;</td>
    <td width="403" valign="middle"><span class="Estilo66">Usuario: <?php echo $nombre_usuario;?></span></td>
    <td width="253" valign="middle">&nbsp;</td>
    <td width="265" valign="middle"><div align="right"><span class="Estilo71">Sector: <?php echo $rol;?><span class="Estilo69">&nbsp;</span><span class="Estilo69">&nbsp;</span></span></div></td>
  </tr>
</table>
</form>
</body>
</html>
