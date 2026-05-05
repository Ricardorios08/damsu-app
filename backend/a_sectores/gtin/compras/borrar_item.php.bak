<?php 
include ("../../../conexiones/config_pro.php");


require_once("wsFunctions.php");


$cod_detalle = $_REQUEST['cod_detalle'];
$id= $_REQUEST['id'];

$user = '9992004800001';
$pass = 'Papo2012';

$args = $_REQUEST['transaccion'];

$response = SendCancMedicamentos($args,$user,$pass);

echo "resultado: ".$response['resultado']."<br>";
echo "codigoTransaccion: ".$response['codigoTransaccion']."<br>";

$errores = $response['errores'];
print_r($errores);
echo "<br>";


echo $sql = "DELETE FROM tr_compras1_deta_temp where cod_detalle = $cod_detalle";
//mysql_query($sql);

include ("pagina2.php");
include_once("refrescar_detalle.php");

?>

