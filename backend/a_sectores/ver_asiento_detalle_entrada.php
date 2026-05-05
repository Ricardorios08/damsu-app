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
    <td width="94"><div align="center" class="Estilo8">
      <div align="center">FECHA</div>
    </div></td>
    <td width="93"><div align="center"><span class="Estilo8">COMPROBANTE</span></div></td>
    <td colspan="2"><div align="center"><span class="Estilo8">MERCADERIA</span></div></td>
    <td colspan="2"><div align="center"><span class="Estilo8">CANT</span></div></td>
    <td width="76"><div align="center" class="Estilo8">STOCK</div></td>
    <td width="80"><div align="center" class="Estilo8">DETALLE</div></td>
    <td width="61"><div align="center"><span class="Estilo8">ACE</span></div></td>
  </tr>
 
<?php 

include ("../conexiones/config_pro.php");

 

 echo $sql1 = "select * from `stock` where cod_movimiento = 3 or cod_movimiento = 2 order by nro_comprobante";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

$gtin=$result1->fields["gtin"];
$fecha=$result1->fields["fecha"];
$precio_s=$result1->fields["total"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$nro_comprobante=$result1->fields["nro_comprobante"];
 $cod_operacion=$result1->fields["cod_operacion"];
 $cod_mercaderia=$result1->fields["cod_mercaderia"];
 $cantidad=$result1->fields["cantidad"];


 $sql18 = "select * from `compras_detalle` where cod_mercaderia = '$cod_mercaderia' and nro_factura = $nro_comprobante ";
$result18 = $db->Execute($sql18);
$precio_d=$result18->fields["total"];
$cantidad1=$result18->fields["cantidad"];



 $sql1="select * from monodrogas where cod_barra = $cod_mercaderia";			  
$result3 = $db->Execute($sql1);
$cod_droga=$result3->fields["cod_droga"];
$laboratorio=$result3->fields["laboratorio"];
$grupo=$result3->fields["grupo"];
$nombre_comercial=$result3->fields["nombre_comercial"];
$precio_actualizado=$result3->fields["precio_actualizado"];

 
$cont = $cont + 1;

 
//$precio_actualizado = round($precio_d / $cantidad,2);

//if ($precio_s != $precio_d){
?>
 
  <tr>
    <td><div align="center"><span class="Estilo8"><?php echo $fecha;?></span></div></td>
    <td><span class="Estilo8"><?php echo $nro_comprobante;?></span></td>
    <td width="63"><span class="Estilo8"><?php echo $cod_mercaderia;?></span></td>
    <td width="212"><span class="Estilo8"><?php echo $nombre_comercial;?></span></td>
    <td width="58"><div align="center"><span class="Estilo8"><?php echo $cantidad;?></span></div></td>
    <td width="63"><div align="center"><span class="Estilo8"><?php echo $cantidad1;?></span></div></td>
    <td><div align="right" class="Estilo8"><?php echo $precio_s;?></div></td>
    <td><div align="right"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span><span class="Estilo8"><?php echo $precio_d;?></span></div></td>
    <td><div align="right"><span class="Estilo8"><?php echo $precio_actualizado;  $sql6 = "UPDATE `stock` SET total = '$precio_d' ,  precio_unitario = '$precio_actualizado' WHERE cod_operacion = $cod_operacion";
//$result6 = $db->Execute($sql6);?></span></div></td>
  </tr>
  


<?php




//}






   $result1->MoveNext();
	}

 
 


 ?>
 </table>

<?php 

 

