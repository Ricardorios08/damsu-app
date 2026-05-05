<?php 
include ("../conexiones/config_pro.php");


?>
<table width="744">
<tr>
	<td width="50" bgcolor="#3399FF">cod</td>
	<td width="352" bgcolor="#3399FF">nombre</td>
	<td width="24" bgcolor="#3399FF">mes</td>
	<td width="50" bgcolor="#3399FF">anio</td>
	<td width="46" bgcolor="#3399FF">anterior</td>
	<td width="43" bgcolor="#3399FF">salida</td>
	<td width="49" bgcolor="#3399FF">ingresos</td>
	<td width="32" bgcolor="#3399FF">total</td>
	<td width="58" bgcolor="#3399FF">existencia</td>

</tr>


<?php 





 $sql1 = "select * from  `tr_stock_temp_provisorio`  order by cod_mercaderia, mes ";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 $cod_mer = $cod_mercaderia;
echo $cod_mercaderia=$result1->fields["cod_mercaderia"];
echo " - mes";
echo $mes=$result1->fields["mes"];
echo " - anio";
echo$anio=$result1->fields["anio"];
echo " - n";
echo$nombre_comercial	=$result1->fields["nombre_comercial"];
echo " - a";
echo$anterior=$result1->fields["anterior"];
echo " - sa";
echo$salida=$result1->fields["salida"];
echo " - ca";
echo$cantidad=$result1->fields["cantidad"];
echo " - ex";
echo$existencia= $anterior + $cantidad - $salida;
echo " - hay";

 $sql = "select (cantidad_ingresada - cantidad_salida) as exis from `tr_existencias_31-12-2012` where cod_mercaderia = '$cod_mercaderia'";
$result = $db->Execute($sql);
 echo $exis=$result->fields["exis"];
 


if ($cod_mercaderia != $cod_mer){
	$cod_mer = "";
echo "<br>";echo "<br>";
}else{

echo "<br>";

}

   $result1->MoveNext();
	}

 

?>

</table>