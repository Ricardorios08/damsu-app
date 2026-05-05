<?php 
include ("../../../../conexiones/config_pro.php");

$cod_operacion = $_REQUEST['cod_operacion'];

 $sql = "DELETE FROM stock_inventario1 where cod_operacion = '$cod_operacion'";
mysql_query($sql);

include ("pagina2.php");
include_once("refrescar_detalle.php");

?>

