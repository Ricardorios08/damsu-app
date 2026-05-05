<?php 

//echo "Guardar_factura.php";

include ("../../conexiones/config_pro.php");

$nro_factura= $_REQUEST['nro_factura'];
$documento= $_REQUEST['documento'];
$password= $_REQUEST['password'];


$sql7="select * from pacientes where documento = $documento ";
$result7 = $db->Execute($sql7);


$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero
$nombre_completo = $apellido.", ".$nombre;

IF ($apellido == ""){
$leyenda  = "NO EXISTE PACIENTE CON ESE DOCUMENTO";
include ("../../alertas/campo_informacion.php");
EXIT;
}


IF ($password == "17509937"){
    $sql = "UPDATE `tr_ventas_encabezado` SET `documento`=$documento, `denominacion`='$nombre_completo' WHERE nro_factura = $nro_factura";
mysql_query($sql);

$leyenda  = "SE ACTUALIZO EL COMPROBANTE";
include ("../../alertas/campo_informacion.php");


}else{
$leyenda  = "CONTRASEÑA INCORRECTA";
include ("../../alertas/campo_informacion.php");
}




?>