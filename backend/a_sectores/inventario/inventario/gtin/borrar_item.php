<?php 
include ("../../../../conexiones/config_pro.php");

$cod_operacion = $_REQUEST['cod_operacion'];
echo "----".$operador = $_REQUEST['id'];

$sql = "DELETE FROM inventario where cod_operacion = '$cod_operacion'";
mysql_query($sql);

include ("pagina2.php");
include_once("refrescar_detalle.php");

?>

