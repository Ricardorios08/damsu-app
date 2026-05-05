<?php 

include ("../../../conexiones/config_pro.php");

 $sql1 = "truncate table luna_pacientes";
$result1 = $db->Execute($sql1);

$fecha = date("Y-m-d");
$anio = date("Y");


$departamento = "CIUDAD";
$zona = "GRAN MENDOZA";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "GODOY CRUZ";
$zona = "GRAN MENDOZA";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "GUAYMALLEN";
$zona = "GRAN MENDOZA";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "LAS HERAS";
$zona = "GRAN MENDOZA";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "LUJAN";
$zona = "GRAN MENDOZA";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "MAIPU";
$zona = "GRAN MENDOZA";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "SAN MARTIN";
$zona = "ESTE";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "JUNIN";
$zona = "ESTE";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "LA PAZ";
$zona = "ESTE";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "RIVADAVIA";
$zona = "ESTE";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "SANTA ROSA";
$zona = "ESTE";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "LAVALLE";
$zona = "NORTE";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "GRAL ALVEAR";
$zona = "VALLE DE UCO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "MALARGUE";
$zona = "VALLE DE UCO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "SAN CARLOS";
$zona = "VALLE DE UCO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);


$departamento = "SAN RAFAEL";
$zona = "VALLE DE UCO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "TUNUYAN";
$zona = "VALLE DE UCO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);


$departamento = "TUPUNGATO";
$zona = "VALLE DE UCO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);

$departamento = "SIN DPTO";
$zona = "SIN DPTO";
$sql = "INSERT INTO `luna_pacientes` (`fecha`, `anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nv`, `dic` , `zona`) VALUES ('$fecha', '$anio', '$departamento', '', '', '', '', '', '', '', '', '', '', '', '' , '$zona')";
$result = $db->Execute($sql);


///////////////
$anio = "2013";
$mes = "01";
$mes1 = "ene";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";


$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "02";
$mes1 = "feb";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";


$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "03";
$mes1 = "mar";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "04";
$mes1 = "abr";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "05";
$mes1 = "may";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "06";
$mes1 = "jun";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "07";
$mes1 = "jul";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "08";
$mes1 = "ago";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "09";
$mes1 = "set";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "10";
$mes1 = "oct";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "11";
$mes1 = "nov";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




///////////////
$anio = "2013";
$mes = "12";
$mes1 = "dic";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";

$sql1 = "SELECT documento, departamento, COUNT(departamento) FROM tr_ventas_encabezado where fecha between '$desde' and '$hasta' and cod_movimiento = 1 GROUP BY documento ORDER BY `departamento` ASC";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
while (!$result1->EOF) {
$departamento=strtoupper($result1->fields["departamento"]);
$cantidad=$result1->fields["cantidad"];

$sql = "SELECT * FROM luna_pacientes where departamento = '$departamento'";
$result = $db->Execute($sql);
$mes_actual=$result->fields[$mes1];
$cantidad_guardar = $mes_actual + 1;

$sql = "UPDATE `luna_pacientes` SET $mes1 = '$cantidad_guardar' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);
$result1->MoveNext();
}




?>