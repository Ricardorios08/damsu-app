<?php
include("../drivers/adodb-5.22.11/adodb5/adodb.inc.php");
$db = NewADOConnection('mysqli');
$db->Connect("srv1891.hstgr.io", "u259434644_damsu", "S0p0rt3s2021", "u259434644_damsu");

session_start ();
$usuario = $_SESSION["id"];
$rol = $_SESSION["rol"];
$id = $_SESSION["id"];
$programa = $_SESSION["programa"];
?>
