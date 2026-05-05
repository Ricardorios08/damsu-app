<?php

 include("../../../conexiones/config_usu.php");

 $cod_laboratorio = $_REQUEST['cod_laboratorio'];
$SQL="Delete From laboratorios where cod_laboratorio = $cod_laboratorio";
$db->Execute($SQL);

$leyenda =  "Se Borró el Laboratorio seleccionado";
include ("../../../alertas/campo_informacion.php");




