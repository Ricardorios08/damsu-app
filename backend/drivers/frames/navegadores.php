<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
<title>Men� Principal (ADMINISTRADOR)</title>
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
	font-size: 12px;
	color: #FFFFFF;
}
.Estilo67 {
	font-family: "Trebuchet MS";
	font-weight: bold;
}
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


<FORM ACTION="../../a_sectores/mesa_entrada/a_pacientes/buscar_paciente_navegador.php" method="post" TARGET = "central1">

   <div id="menuh">
		<ul>
 
				<li><a href="../../index.php" target="_TOP">Salir</a></li>
		</ul>
</div>







<table width="965" height="40" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" class="Estilo65"> </div>
        <div align="left"><span class="Estilo65">BUSCAR PACIENTE </span>
          <input type = "text" name = "tipo_doc" size = "2"  id="tipo_doc" onkeypress="return verif_caracter(this,event)" />
          <input type = "text" name = "busca" size = "12" id="busca" />
          <input type = "hidden" name = "id" value = "<?php echo $id;?>" />
          <input type = "submit" name = "ok" value = "OK" />
        </div></td>
    <td><div align="right"><span class="Estilo67">PROGRAMA AYUDA AL PACIENTE ONCOLOGICO </span></div></td>
  </tr>
</table>
<table width="966" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#14548B">
    <td width="541" valign="middle"><span class="Estilo66">Usuario: <?php echo $nombre_usuario;?></span></td>
    <td width="255" valign="middle"><div align="right"><span class="Estilo66">Sector: <?php echo $rol;?></span></div></td>
  <td width="255" valign="middle">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
