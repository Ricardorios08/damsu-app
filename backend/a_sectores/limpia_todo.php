<?php 

include ("../conexiones/config_pro.php");

echo $sql = "TRUNCATE TABLE compras_detalle";
//mysql_query($sql);

echo $sql = "TRUNCATE TABLE compras_encabezado";
//mysql_query($sql);

echo $sql = "TRUNCATE TABLE tr_compras_encab";
//mysql_query($sql);

echo $sql = "TRUNCATE TABLE tr_compras_detalle";
//mysql_query($sql);


echo $sql = "TRUNCATE TABLE tr_existencias";
//mysql_query($sql);

echo $sql = "TRUNCATE TABLE tr_stock";
//mysql_query($sql);

echo $sql = "TRUNCATE TABLE existencias";
//mysql_query($sql);


echo $sql = "TRUNCATE TABLE stock";
//mysql_query($sql);

echo $sql = "TRUNCATE TABLE existencias";
//mysql_query($sql);


/////

echo $sql = "TRUNCATE TABLE ventas_encabezado";
//mysql_query($sql);


echo $sql = "TRUNCATE TABLE ventas_detalle";
//mysql_query($sql);


echo $sql = "TRUNCATE TABLE tr_ventas_encabado";
//mysql_query($sql);


echo $sql = "TRUNCATE TABLE tr_ventas_detalle";
//mysql_query($sql);