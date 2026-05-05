
<?PHP

$sql="select * from tr_stock group by laboratorio";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_laboratorio=$result->fields["laboratorio"];


$sql2="select * from laboratorios where cod_laboratorio = $cod_laboratorio";
$result2 = $db->Execute($sql2);
$denominacion=$result2->fields["laboratorio"];


$sql2="select count(cuenta) as entrados from tr_stock where laboratorio = '$cod_laboratorio' and cod_movimiento = 1";
$result2 = $db->Execute($sql2);
$entrados=$result2->fields["entrados"];

$sql2="select count(cuenta) as salidos from tr_stock where laboratorio = '$cod_laboratorio' and cod_movimiento = 6";
$result2 = $db->Execute($sql2);
$salidos=$result2->fields["salidos"];


?>

 <tr>
    <td><div align="center"><?PHP ECHO $cod_laboratorio;?></div></td>
    <td><div align="left"><?PHP ECHO $denominacion;?></div></td>
    <td><div align="center"><?PHP ECHO $entrados;?></div></td>
    <td><div align="center"><?PHP ECHO $salidos;?></div></td>
 </tr>
<?php 


	$result->MoveNext();
	}