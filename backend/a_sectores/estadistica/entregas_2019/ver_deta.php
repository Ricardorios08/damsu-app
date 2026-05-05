<?php

include ("../../../conexiones/config_pro.php");

$desde = '2019-06-01';
$hasta = '2019-06-31';

 $sql11 = "SELECT * FROM `tr_ventas_encabezado` where (fecha between '$desde' and '$hasta' and cod_movimiento = '10') order by nro_factura ";
$result = $db->Execute($sql11);




if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {



   


 $sql111 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = '$nro_factura' ";
$result1 = $db->Execute($sql111);
   $nro_factura1=$result1->fields["nro_factura"];

?>
 <table>
 <tr>
 <td><?php echo $fecha=strtoupper($result->fields["fecha"]);?></td>
	<td><?php echo $nro_factura=strtoupper($result->fields["nro_factura"]);?></td>
	<td><?php echo $nro_factura1=$result1->fields["nro_factura"];?></td>
 </tr>
 </table>

 <?php



	 	 $result->MoveNext();

				}