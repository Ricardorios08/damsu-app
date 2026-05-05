<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->
</style>

<?php  

  $sql="select count(cod_droga) as cantidad, nombre_droga from  tr_ventas_detalle where fecha between '2013-01-01' and '2013-12-31' and documento = '$documento' group by cod_droga";
$result10 = $db->Execute($sql);


if (!$result10) die("fallo".$db->ErrorMsg());
  while (!$result10->EOF) {

$cod_droga=strtoupper($result10->fields["cod_droga"]);
$nombre_droga=strtoupper($result10->fields["nombre_droga"]);
$documento=strtoupper($result10->fields["documento"]);

$cantidad = $result10->fields["cantidad"];

?><span class="Estilo1"> <?php
echo $remedios = "(".$cantidad.") ".$nombre_droga;
echo "<br>";
?></span> <?php
$result10->MoveNext();
	}
?>
