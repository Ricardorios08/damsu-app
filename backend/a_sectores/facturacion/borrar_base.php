<?php 

echo "Borrar Base.php";

include ("../../conexiones/config_pro.php");

$sql = "TRUNCATE TABLE tr_existencias";
mysql_query($sql);

$sql = "TRUNCATE TABLE tr_stock";
mysql_query($sql);

$sql = "TRUNCATE TABLE tr_compras_detalle";
mysql_query($sql);

$sql = "TRUNCATE TABLE tr_compras_encab";
mysql_query($sql);

$sql = "TRUNCATE TABLE tr_ventas_detalle";
mysql_query($sql);

$sql = "TRUNCATE TABLE tr_ventas_encabezado";
mysql_query($sql);