<?php 
include ("../../../conexiones/config_usu.php");

$sql = "DELETE FROM deta_comp where cod_detalle = $cod_detalle";
mysql_query($sql);

$band = "SI";

//include ("pagina2.php");






?>

