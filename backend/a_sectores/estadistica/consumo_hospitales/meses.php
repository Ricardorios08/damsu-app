<?php

 $sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde1' and '$hasta1' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 and fuente = '$fuente' group by documento";
$result2 = $db->Execute($sql);
$recetas = $result2->RecordCount(); 
  $sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde1' and '$hasta1' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 and fuente = '$fuente'";
$result2 = $db->Execute($sql);
$total=$result2->fields["total"];
$neto=$result2->fields["neto"];

?>
<td bgcolor="#FFFFFF"><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $total;?> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $recetas;?></span></div></td>
<?php


 