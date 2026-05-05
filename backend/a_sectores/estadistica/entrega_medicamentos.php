<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->
</style>

<?php  

 echo  $sql="select count(cod_droga) as cantidad, nombre_droga from  tr_ventas_detalle where fecha between '$fecha_d' and '$fecha_h' and documento = '$documento' and cod_droga = '$laboratorios' group by cod_droga";
$result10 = $db->Execute($sql);


 

$cod_droga=strtoupper($result10->fields["cod_droga"]);
 
$documento=strtoupper($result10->fields["documento"]);

$cantidad = $result10->fields["cantidad"];

?><span class="Estilo3"> <?php
echo $remedios =  $cantidad ;
echo "<br>";
?></span> <?php
 
?>
