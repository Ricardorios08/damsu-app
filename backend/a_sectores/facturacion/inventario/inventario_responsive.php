<style type="text/css">
<!--
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo4 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>


<?php 
 include ("nav_header.php");
include ("../../../conexiones/config_pro.php");

$hoy=date("d/m/y");

 
?>



 

<table class="table table-striped">
  <thead>
  </thead>

 
<tr>

<?php

 $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE      recibido_coir = 1 and preparado_coir = 0";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;

$contame = $contame + 1;
$cod_merca = $cod_mercaderia;

  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
 
$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$estado= $result3->fields["estado"];
 $recibido_coir= $result3->fields["recibido_coir"];
$recibido_farmacia= $result3->fields["recibido_farmacia"];
$recibido_servicio= $result3->fields["recibido_servicio"];
$aplicado_servicio= $result3->fields["aplicado_servicio"];


$fecha_recibido= $result3->fields["fecha_recibido"];
$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);


if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);
} 



$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;

$cont = $cont + 1;




 
$di = substr($fecha_recibido,8,2);$me = substr($fecha_recibido,5,2);$an = substr($fecha_recibido,0,4);$fecha_recibido = $di."/".$me."/".$an;
 

if ($contame > 1){
if ($cod_mercaderia != $cod_merca){


?>
 
  <!-- <tr>
	  <th scope="col"><?php echo $total;?></th>
	</tr>
 -->
<?php


	$total = 0;
 }}


 $total = $total + $cantidad;
$total_total = $total_total + $cantidad;
?>


 

 <th scope="col"><span class="Estilo4">DROGA: <?php echo $nombre_comercial;?></span></th>
    
   <tr>
     <td><span class="Estilo3">Lote: <?php echo $lote1;?> <?php echo $vto_lote;?></span></td>
   <tr>
        <td><span class="Estilo3"><?php echo $gtin;?></span></td>
   <tr>
      <td><span class="Estilo3"><?php echo $fecha_recibido;?> Cant: <?php echo $cantidad;?>        </span>        <div align="center" class="Estilo3"></div>
      <div align="center" class="Estilo3"></div></td>

	   </tr>

     <?php







	 $result3->MoveNext();

				}

?>
   


  <!-- <tr>
	  <th scope="col"><?php echo $total;?></th>
	</tr> -->


	</table>

 </FORM>