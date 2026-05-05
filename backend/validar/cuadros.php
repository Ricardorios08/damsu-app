<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>

<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 10px}
.Estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #0000FF; }
.Estilo6 {color: #0000FF}
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
	color: #99FF00;
}
a:active {
	text-decoration: none;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</HEAD>


<!-- <BODY  background="../IMAGENES/botones/barra/fondo3.jpg" onload ="ocultamenu()"> -->
<BODY  background="../IMAGENES/fondo.png" onload ="ocultamenu();MM_preloadImages('../..//imagenes/AGENDA1.jpg','../imagenes/AGENDA1.png')">
<!-- <li><a href="../a_sectores/secretaria/secretaria.php" target = "izquierda">Secretaria</a> </li> -->

<div align="left"></div>
<table width="584" border="0" >
  <tr>
    <th height="32" scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr> 
    <th width="152" scope="col"><div align="center" class="Estilo1 Estilo2"><span class="Estilo3"><a href="../validar/usuarios/agenda.php" onMouseOut="MM_swapImgRestore()" target = "izquierda" onMouseOver="MM_swapImage('Image11','','../imagenes/AGENDA1.png',1)"><img src="../imagenes/AGENDA.jpg" alt="" name="Image11" width="80" height="80" border = "1"></a></span></div></th>
    <th width="131" scope="col"><div align="center" class="Estilo3"><span class="Estilo1 Estilo2"><a href="../a_sectores/proveeduria/facturacion.php?user=<?php print("$user");?>&&programa=<?php print("$programa");?>&&id=<?php print("$id");?>&&usuario=<?php print("$usuario");?>" target = "izquierda"><img src="../imagenes/botones/barra/contaduria.jpg" alt="Gerencia" width="80" height="80" border = "1" title="Convenios, Consultas de Convenios, Definir Practicas, convertir nomencladores"></a></span></div></th>
    <th width="171" scope="col"><div align="center" class="Estilo3"><a href="../a_sectores/consulta_bq/consultas.php" target = "izquierda"><span class="Estilo1 Estilo2"></span></a><a href="../a_sectores/proveeduria/proveeduria.php?user=<?php print("$user");?>&&programa=<?php print("$programa");?>&&id=<?php print("$id");?>&&usuario=<?php print("$usuario");?>" target = "izquierda"><img src="../imagenes/botones/barra/estadistica.jpg" alt="Estadisticas" width="80" height="80" border = "1" title="Diferentes estadisticas, Ordenes, Recepcion, etc"></a></div></th>
    <th width="139" scope="col"><div align="center" class="Estilo3"><a href="../a_sectores/direccion/direccion.php" target = "izquierda"><img src="../imagenes/botones/barra/facturacion.jpg" alt="Facturaci&oacute;n" width="80" height="80" border = "1"  title="Sistema para facturas Obras Sociales, Pre-Facturacion, Consultas"></a></div></th>
  </tr>
  <tr> 
    <th scope="row"><span class="Estilo5">AGENDA</span></th>
    <th><span class="Estilo5">FACTURACION</span></th>
    <th><span class="Estilo5">DEPOSITO</span></th>
    <th><span class="Estilo5">DIRECCION</span></th>
  </tr>
  <tr> 
    <th scope="row"><div align="center" class="Estilo3"><a href="../a_sectores/estadistica/estadistic.php" target = "izquierda"><img src="../imagenes/botones/barra/grabacion.jpg" alt="Grabacion" width="80" height="80" border = "1" title="Grabacion de Ordenes, Control de Ordenes, Pami, Consultas, etc"></a></div></th>
    <td><div align="center" class="Estilo3"><a href="../a_sectores/preparacion/facturacio.php" target = "izquierda"><img src="../imagenes/botones/barra/auditoria.jpg" alt="Contadur&iacute;a" width="80" height="80" border = "1" title="Altas de Novedades del mes, alta de conceptos, etc"></a></div></td>
    <td><div align="center" class="Estilo3"> <a href="../a_sectores/liquidacion/liquidacio.php"></a><a href="../a_sectores/informes/informe.php" target = "izquierda"><img src="../imagenes/proveeduria.jpg" alt="Proveedur&iacute;a" width="80" height="80" border = "1"></a></div></td>
    <td><div align="center" class="Estilo3"><span class="Estilo1 Estilo2"><a href="../a_sectores/proveeduria/inventario/inventario.php" target = "izquierda"><img src="../imagenes/liquidacion.jpg" alt="Liquidaci&oacute;n" width="80" height="80" border = "1" title="Armar lista de Facturas, Liquidar, Consultar, Imprimir, etc"></a></span></div></td>
  </tr>
  <tr> 
    <th scope="row"><span class="Estilo5">ESTADISTICA</span></th>
    <th><p><span class="Estilo5">AUDITORIA</span></p></th>
    <th><span class="Estilo5">INFORMES </span><span class="Estilo5">MENSUALES</span></th>
    <th><span class="Estilo5">INVENTARIOS</span></th>
  </tr>
  <tr>
    <th scope="row"><span class="Estilo3"><span class="Estilo1 Estilo2"></span></span></th>
    <th><span class="Estilo3"><span class="Estilo1 Estilo2"><a href="../a_sectores/preparacion/preparacion.php" target = "izquierda"><img src="../imagenes/botones/barra/consultas.jpg" alt="Consul. Bioq." width="80" height="80" border = "1" title="Consultas Varias"></a></span></span></th>
    <th><span class="Estilo3"><span class="Estilo1 Estilo2"><a href="../a_sectores/mesa_entrada/mesa_entrada.php" target="izquierda"><img src="../imagenes/botones/barra/secretaria.jpg" alt="Secretaria" width="80" height="80" border = "1" title="Alta de Socios, Obras Sociales, Bioquimicos. Consultas, listados para imprimir, etc"></a></span></span></th>
    <th><span class="Estilo3"><span class="Estilo1 Estilo2"></span></span></th>
  </tr>
  <tr valign="top">
    <th height="57" scope="row">&nbsp;</th>
    <th><span class="Estilo5">PREPARACION</span></th>
    <th><span class="Estilo5"><a href="manual/secretaria.htm">MESA DE ENTRADA</a></span></th>
    <th>&nbsp;</th>
  </tr>
</table>
  <div align="center"></div>
<div align="center"><span class="Estilo3"></span><span class="Estilo3"></span> 
  <!--<<li><a href="../archivos varios/importar_tablas.php" target = "central">Importar tablas</a> </li>
<li><a href="../a_sectores/consulta_bq/mail.php" target = "central">Consulta a los Programadores</a> </li>-->
</div>
</BODY>
</HTML>
