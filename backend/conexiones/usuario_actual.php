<?php
include("../drivers/adodb-5.22.11/adodb5/adodb.inc.php");
$db = NewADOConnection('mysqli');
$db->Connect("srv1891.hstgr.io", "u259434644_damsu", "S0p0rt3s2021", "u259434644_damsu");


$sql= "select * from usuario where id = '$operador'" ;
$result = $db->Execute($sql);

$rol=strtoupper($result->fields["rol"]);
$programa=strtoupper($result->fields["programa"]);
$usuario=strtoupper($result->fields["usuario"]);
$id=strtoupper($result->fields["id"]);

?>
