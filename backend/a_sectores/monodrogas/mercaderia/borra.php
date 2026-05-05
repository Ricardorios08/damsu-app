<?php

 include("../../../conexiones/config_usu.php");

$a = $_REQUEST['id'];
$SQL="Delete From `drogas` where cod_droga = $a";
$db->Execute($SQL);



$leyenda =  "Se Borró la Droga seleccionada";
include ("../../../alertas/campo_informacion.php");

