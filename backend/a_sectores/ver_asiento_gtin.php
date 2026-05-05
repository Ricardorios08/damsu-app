<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo3 {font-size: 12px}
.Estilo5 {font-size: 12}
.Estilo7 {font-size: 10px}
.Estilo8 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" class="Estilo8">MERCADERIA</div></td>
    <td><div align="center" class="Estilo8">GTIN</div></td>
    <td><div align="center" class="Estilo8">DEBE</div></td>
    <td><div align="center" class="Estilo8">HABER</div></td>
  </tr>
 
<?php 

include ("../conexiones/config_pro.php");

 

 $sql1 = "select * from `tr_stock` where cod_movimiento = 6 order by gtin";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

$gtin=$result1->fields["gtin"];
$precio_unitario_egreso=$result1->fields["precio_unitario"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$nro_comprobante=$result1->fields["nro_comprobante"];
 $cod_operacion=$result1->fields["cod_operacion"];
 $cod_mercaderia=$result1->fields["cod_mercaderia"];

 $sql18 = "select * from `tr_stock` where gtin = '$gtin' and cod_movimiento = 1";
$result18 = $db->Execute($sql18);
$precio_unitario_ingreso=$result18->fields["precio_unitario"];

 $sql1="select * from monodrogas where cod_barra = $cod_mercaderia";			  
$result3 = $db->Execute($sql1);
$cod_droga=$result3->fields["cod_droga"];
$laboratorio=$result3->fields["laboratorio"];
$grupo=$result3->fields["grupo"];
$nombre_comercial=$result3->fields["nombre_comercial"];
$precio_actualizado=$result3->fields["precio_actualizado"];

if ($precio_unitario_ingreso !=  $precio_actualizado){
	$marca = "+";
$cont = $cont + 1;

$a = $a + $precio_actualizado;
$b = $b + $precio_unitario_ingreso;
$c = $a - $b;

?>
 <tr>
    <td colspan="4"><div align="center" class="Estilo8">****************** <?php echo $nro_comprobante;?> / <?php echo $marca;?>************* <?php echo $precio_actualizado;?></div></td>
  </tr>
  <tr>
    <td><span class="Estilo8"><?php echo $nombre_comercial;?></span></td>
    <td><span class="Estilo8"><?php echo $gtin;?>  <?php echo $cod_mercaderia;?>  </span></td>
    <td><div align="right" class="Estilo8"><?php echo $precio_unitario_ingreso;?></div></td>
    <td><div align="right"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo3"></span></td>
    <td><span class="Estilo3"></span></td>
    <td><div align="right"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></div></td>
    <td><div align="right" class="Estilo8"><?php echo $precio_unitario_egreso;?></div></td>
  </tr>
  <tr>
    <td colspan="4"><hr noshade></td>
  </tr>



<?php

}else
	  {
	$marca = "";
?>
 <!-- <tr>
    <td colspan="4"><div align="center" class="Estilo8">****************** <?php echo $nro_comprobante;?> / <?php echo $marca;?>************* <?php echo $precio_actualizado;?></div></td>
  </tr>
  <tr>
    <td><span class="Estilo8"><?php echo $nombre_comercial;?></span></td>
    <td><span class="Estilo8"><?php echo $gtin;?>  <?php echo $cod_mercaderia;?>  </span></td>
    <td><div align="right" class="Estilo8"><?php echo $precio_unitario_ingreso;?></div></td>
    <td><div align="right"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo3"></span></td>
    <td><span class="Estilo3"></span></td>
    <td><div align="right"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></div></td>
    <td><div align="right" class="Estilo8"><?php echo $precio_unitario_egreso;?></div></td>
  </tr>
  <tr>
    <td colspan="4"><hr noshade></td>
  </tr> -->



<?php
	  }





 //echo $sql = "UPDATE `stock` SET total = '$precio_unitario' , precio_unitario = '$unitario'   WHERE cod_operacion = '$cod_operacion'";
//$result = $db->Execute($sql);






   $result1->MoveNext();
	}

 
 


 ?>
 
 </table>

<?php 

echo "<br>";
echo $a;
echo "<br>";
echo $b;
echo "<br>";
echo $c;

