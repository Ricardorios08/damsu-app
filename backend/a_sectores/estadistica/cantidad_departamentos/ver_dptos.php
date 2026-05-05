<?php
$sql10 = "SELECT * FROM diagnostico where nro_diagnostico like '$cod_diagnostico%'";
 $result10 = $db->Execute($sql10);
$nombre_diagnostico=$result10->fields["nombre_diagnostico"];



?>
<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo4 {font-family: "Trebuchet MS"}
.Estilo5 {font-size: 12px}
-->
</style>

<table width="677" border="1" cellspacing="0">
  
  <tr>
    <td bgcolor="#FFFFFF"><span class="Estilo2 Estilo3">DIAGNOSTICO</span><span class="Estilo3">: <?PHP echo $cod_diagnostico;?> - <?PHP echo $nombre_diagnostico;?></span></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo3"><span class="Estilo2">A&Ntilde;O: <?PHP echo $anio;?></span></span></div></td>
  </tr>
  <tr>
    <td width="508" height="23" bgcolor="#CCCCCC"><div align="center" class="Estilo2 Estilo4 Estilo5">DEPARTAMENTO</div></td>
    <td width="159" bgcolor="#CCCCCC"><div align="center" class="Estilo2 Estilo4 Estilo5">CANTIDAD</div></td>
  </tr>



<?php 

 $sql1 = "SELECT departamento FROM `cantidad_dptos` where departamento != ''  group by departamento ";
 $result1 = $db->Execute($sql1);


if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$departamento=$result1->fields["departamento"];


$sql = "INSERT INTO `oncologico`.`cant_dpto` (`departamento`, `cantidad`, `diagnostico`, `2009`, `2010`, `2011`, `2012`, `2013`) VALUES ('$departamento', '', '$cod_diagnostico', '', '', '', '', '')"; 
$result = $db->Execute($sql);

  $result1->MoveNext();
	}


//exit;
$anio = 2013;
$cod_diagnostico = "X124";

/*$cod_diagnostico1 = "C83";
$cod_diagnostico2 = "C84";
$cod_diagnostico3 = "C85";
$cod_diagnostico4 = "X02";

/*$cod_diagnostico4 = "C93";
$cod_diagnostico5 = "C94";
$cod_diagnostico6 = "C95";
$cod_diagnostico7 = "C98";
$cod_diagnostico8 = "C99";
$cod_diagnostico9 = "X124";
$cod_diagnostico10 = "X125";
$cod_diagnostico11 = "X126";*/




	////
 
ECHO $sql1 = "SELECT cod_diagnostico, departamento, anio,  count(departamento) as cantidad FROM `cantidad_dptos` where 
(quimio = 'S' and anio = '$anio' ) group by departamento ORDER BY anio, cod_diagnostico ASC";
 $result1 = $db->Execute($sql1);


if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 
$cod_diagnostico=$result1->fields["cod_diagnostico"];
$departamento=$result1->fields["departamento"];
//$anio=$result1->fields["anio"];
$cantidad=$result1->fields["cantidad"];

$cod_diagnostico = trim($cod_diagnostico);
$departamento = trim($departamento);


$total = $total + $cantidad;

$total_todo = $total_todo + $cantidad;


  $sql = "UPDATE `cant_dpto` SET `$anio` = '$cantidad' WHERE `departamento` = '$departamento'";
$result = $db->Execute($sql);






 ?> <tr>
    <td><span class="Estilo2"><?PHP echo $departamento;?></span></td>
    <td><div align="center" class="Estilo2"><?PHP echo $cantidad;?></div></td>
  </tr>

<?php

  $result1->MoveNext();
	}


?>

<tr>
  <td bgcolor="#CCCCCC"><div align="right" class="Estilo2 Estilo4 Estilo5">TOTAL</div></td>
  <td bgcolor="#CCCCCC"><div align="center" class="Estilo3"><span class="Estilo2"><?PHP echo $total;?></span></div></td>
</tr>
</table>

<?php $total = "";?>

<br>