<?
include ("../../../conexiones/config_pro.php");

$cod_detalle = $_REQUEST['cod_detalle'];
$nro_factura= $_REQUEST['nro_factura'];
$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$año= $_REQUEST['anio'];
$nro_cliente= $_REQUEST['nro_cliente'];
$matricula= $_REQUEST['matricula'];
$forma_pago= $_REQUEST['forma_pago'];
$cantidad= $_REQUEST['cantidad'];
$cod_mercaderia= $_REQUEST['cod_mercaderia'];
$band= $_REQUEST['band'];



$sql = "DELETE FROM deta_fact where cod_detalle = $cod_detalle";
mysql_query($sql);



include ("entrada_factura_3.php");
include ("refrescar.php");

?>

