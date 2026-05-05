<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../../menus.css" />
<title>Men� Principal (ADMINISTRADOR)</title>
<style type="text/css">
<!--
body {
	background-image: url(../../imagenes/celeste.jpg);
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
-->
</style></head>
<body>



<FORM ACTION="../../a_sectores/mesa_entrada/a_pacientes/buscar_paciente_general.php" method="post" TARGET = "central1">

   <table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="254"><div align="center" class="Estilo65">
        BUSCAR PACIENTE </div>          
          <div align="center">
          <input type = "text" name = "busca" size = "12" />
          <input type = "submit" name = "ok" value = "OK" />
        </div></td>
        <td width="546">&nbsp;</td>
      </tr>
    </table>	
<div id="menuh">
	<ul>
	<li><a href="../../validar/usuarios/agenda2.php" target = "izquierda" >Agenda</a></li>
	<li><a href="../../a_sectores/proveeduria/informes.php" target = "izquierda" >Monodrogas</a></li>
	<li><a href="../../a_sectores/proveeduria/informes_proveeduria.php"  target = "izquierda" >Proveedores</a></li>
	<li><a href='../../a_sectores/proveeduria/proveeduria.php?user=<?php print("$user");?>&&programa=<?php print("$programa");?>&&id=<?php print("$id");?>&&usuario=<?php print("$usuario");?>' target = 'izquierda' >Ingresos</a></li>
		<!-- <li><a href='../../a_sectores/proveeduria/consultas.php?user=<?php print("$user");?>&&programa=<?php print("$programa");?>&&id=<?php print("$id");?>&&usuario=<?php print("$usuario");?>' target = 'izquierda' >Facturas</a></li> -->
	
	<li><a href='../../a_sectores/proveeduria/inventario/inventario.php' target = 'izquierda'>Inventarios</a></li>
	
    <li><a href="../../index.php"             target = "_top">Salir</a></li>
		</ul>
</div>


<table width="976" border="0" cellpadding="0">
  <tr>
    <td width="541" height="34" valign="bottom"><span class="Estilo66">Usuario: <?php echo $nombre_usuario;?></span></td>
    <td width="429" valign="bottom"><div align="right"><span class="Estilo66">Sector: <?php echo $rol;?></span></div></td>
  </tr>
</table>
</form>
</body>
</html>
