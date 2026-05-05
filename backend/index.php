<?php
include ("conexiones/config.inc.php");
 $user = $_POST["usuario"];
  $pass = $_POST["password"];

$hoy = date("Y-m-d");
if ($hoy > '2027-12-31'){
	$leyenda = "Sistema Fuera de Licencia";
	include ("alertas/campo_informacion.php");
exit;
}
$sql = "repair table `tr_ventas_encabezado_temp`";
$result = $db->Execute($sql);


$sql = "repair table `tr_ventas_detalle`";
$result = $db->Execute($sql);


 $sql= "select * from usuario where usuario like '$user' and contrasena like '$pass'" ;
$result = $db->Execute($sql);

   $rol=strtoupper($result->fields["rol"]);
 $id=strtoupper($result->fields["id"]);

if ($rol == ""){
include ("index.html");
}


switch($rol)
{
case "ADMIN":{
$usuario = $id;
include ("admin.php");
break;}

case "SECRETARIA":{
$usuario = $id;
include ("secretaria.php");
break;}

case "MESA DE ENTRADA":{
$usuario = $id;
include ("mesa_entrada.php");
break;}

case "PREPARACION":{
$usuario = $id;
include ("preparacion.php");
break;}

case "FACTURACION":{
$usuario = $id;
include ("facturacion.php");
break;}

case "DEPOSITO Y ADMINISTRACION":{
$usuario = $id;
include ("deposito.php");
break;}

case "DIRECTORA TECNICA":{
$usuario = $id;
include ("direccion.php");
break;}


case "JEFATURA":{
$usuario = $id;
include ("jefatura.php");
break;}

case "PRESTADOR":{
$usuario = $id;
include ("coir.php");
break;}

case "COIR":{
$usuario = $id;
include ("coir.php");
break;}

case "FARMACIA":{
$usuario = $id;
include ("farmacia.php");
break;}

case "ONCOLOGIA":{
$usuario = $id;
include ("oncologia.php");
break;}

case "HEMATOLOGIA":{
$usuario = $id;
include ("hematologia.php");
break;}

case "NAVEGADORES":{
$usuario = $id;
include ("navegadores.php");
break;}


	}

?>


