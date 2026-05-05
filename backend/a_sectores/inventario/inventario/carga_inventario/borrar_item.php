<?php 
include ("../../../../conexiones/config_pro.php");


require_once("wsFunctions.php");


$gtin = $_REQUEST['gtin'];

  $sql = "DELETE FROM tr_existencias where gtin = '$gtin'";
mysql_query($sql);

  $sql = "DELETE FROM tr_stock where gtin = '$gtin'";
mysql_query($sql);


include ("pagina2.php");
include_once("refrescar_detalle.php");

?>

