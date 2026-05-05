<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo74 {font-family: Arial, Helvetica, sans-serif}
.Estilo75 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->
</style>
 
 
    <script type="text/javascript">
    function ajax1(elem){
        
        var elemento= document.getElementById('caja14');
        var colorboton= document.getElementById('boton14');
	var colorboton= document.getElementById('boton15');

        if(elem==null) {
            elemento.checked= !elemento.checked;
        }
        
        if(!elemento.checked) {
            colorboton.setAttribute('class','COLOR_NORMAL');
        } else {
            colorboton.setAttribute('class','COLOR_AZUL');
        }
    }



		function seleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=1
} 


function deseleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=0
} 



    </script>

<!-- 
<a href="imp_pendientes.php?a='excel'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a> -->


<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()">  -->



<?php 

$nro_factura;

?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo70 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo72 {font-size: 12px}
.Estilo72 {font-family: Arial, Helvetica, sans-serif}
.Estilo74 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo76 {font-size: 12px}
.Estilo76 {font-family: Arial, Helvetica, sans-serif}
.Estilo77 {font-size: 12px}
.Estilo77 {font-family: Arial, Helvetica, sans-serif}
.Estilo78 {font-size: 12px}
.Estilo78 {font-family: Arial, Helvetica, sans-serif}
.Estilo79 {font-size: 12px}
.Estilo79 {font-family: Arial, Helvetica, sans-serif}
.Estilo80 {font-size: 12px}
.Estilo80 {font-family: Arial, Helvetica, sans-serif}
.Estilo81 {font-size: 12px}
.Estilo81 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

<form action="guarda_detalle.php" name="f1" method="post" target = "central1">


<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#F0F0F0">
    <td colspan="3"><div align="center" class="Estilo74"><strong>PREPARAR MANUAL: <?php ECHO $fecha_a;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
    <td colspan="2">   <div align="center">
      <input type="submit" name="Submit" value="Preparar seleccionados" class = "bot1"/>
    </div></td>
    <td><div align="center" class="Estilo74"><a href="javascript:seleccionar_todo()" class="Estilo5">Marcar todos</a> 
		 <input type="hidden" name="fecha" value="<?php echo $fecha;?>">	
		 </div></td>
  </tr>
 </table>
   

	 <?php 

include ("../../../conexiones/config_pro.php");

?>
<table width="800">
 


<?php

    $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  fecha_preparado = '$fecha' AND preparado_coir = 1 order by  documento desc, nro_factura";
$result5 = $db->Execute($sql3);

if (!$result5) die("fallo".$db->ErrorMsg());

 while (!$result5->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result5->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result5->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}

 
$doc = $documento;
 




if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}


$cantidad=strtoupper($result5->fields["cantidad"]);
$proveedor=strtoupper($result5->fields["proveedor"]);
$presentacion=strtoupper($result5->fields["presentacion"]);
$descripcion=strtoupper($result5->fields["descripcion"]);
$cod_detalle=strtoupper($result5->fields["cod_detalle"]);
$gtin = $result5->fields["gtin"];
$resultado= $result5->fields["resultado"];
$transaccion= $result5->fields["transaccion"];
$estado= $result5->fields["estado"];
 $recibido_coir= $result5->fields["recibido_coir"];
$recibido_farmacia= $result5->fields["recibido_farmacia"];
$recibido_servicio= $result5->fields["recibido_servicio"];
$fecha_recibido= $result5->fields["fecha_recibido"];
$fecha_preparado= $result5->fields["fecha_preparado"];

  $indicado_coir= $result5->fields["indicado_coir"];
 $preparado_coir= $result5->fields["preparado_coir"];

$dia2 = substr($fecha_preparado,8,2);
$mes2 = substr($fecha_preparado,5,2);
$anio2 = substr($fecha_preparado,0,4);
$fecha_preparado = $dia2."/".$mes2."/".$anio2;

$lote1=strtoupper($result5->fields["lote"]);
$mes_lote=strtoupper($result5->fields["mes_lote"]);
$anio_lote=strtoupper($result5->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result5->fields["gtin"]);
$precio_unitario=strtoupper($result5->fields["precio_unitario"]);

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result6 = $db->Execute($sql);
$cod_mercaderia=strtoupper($result6->fields["troquel"]);
$presentacion=strtoupper($result6->fields["presentacion"]);
$nombre_comercial=strtoupper($result6->fields["nombre_comercial"]);
$cod_droga=strtoupper($result6->fields["cod_droga"]);
$laboratorio=strtoupper($result6->fields["laboratorio"]);


$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result6 = $db->Execute($sql);
$laboratorio=strtoupper($result6->fields["laboratorio"]);

/* if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result6 = $db->Execute($sql);
$laboratorio=strtoupper($result6->fields["laboratorio"]);
} */



/*$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result6 = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;*/

$nro_factura= $result5->fields["nro_factura"];


   $sql="select * from tr_ventas_encabezado where nro_factura = '$nro_factura'";
$result = $db->Execute($sql);
  $denominacion=strtoupper($result->fields["denominacion"]); 
$documento=strtoupper($result->fields["documento"]); 
$fecha=strtoupper($result->fields["fecha"]); 

$cont = $cont + 1;



if ($doc != $documento){
$denominacion = $denominacion;
$contame = 1;
?>
<tr bgcolor="#3399CC">
  <td colspan="7" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
<tr bgcolor="#3399CC">
	<td width="32"><div align="center" class="Estilo1 Estilo2 Estilo3 Estilo4"></div></td>
	<td><div align="center" class="Estilo5">PACIENTE: <?php echo $denominacion;?></div></td>
	<td width="210"><div align="center" class="Estilo5">DNI: <?php echo $documento;?>  </div></td>
	<td width="58"><div align="center" class="Estilo5">N°: <?php echo $nro_factura;?> </div></td>
	<td width="57"><div align="center" class="Estilo5">FECHA: <?php echo $fecha;?></div></td>
	<td colspan="2"><div align="center"><span class="Estilo1 Estilo2 Estilo3 Estilo4">CONTROL</span></div></td>
</tr><?php


}else{
$denominacion = '';
$contame = 2;
}


if ($estado == ""){$estado = "ASIGNADO";}

 if ($recibido_farmacia == 1){
?>

<?php if ($contame == 1){?>
<tr bgcolor="#B8B8B8">
  <td><div align="center" class="Estilo1 Estilo2 Estilo3 Estilo4">CANT</div></td>
  <td colspan="2"><div align="center" class="Estilo5">DROGA</div>    <div align="center" class="Estilo5"></div></td>
  <td><div align="center" class="Estilo5">LOTE</div></td>
  <td><div align="center" class="Estilo5">VTO</div></td>
  <td colspan="2"><div align="center"><span class="Estilo1 Estilo2 Estilo3 Estilo4">CONTROL</span></div></td>
</tr>
<?php }?>

<tr bgcolor="#FFFFFF">
	<td><div align="center" class="Estilo5"><?php echo $cantidad;?> </div></td>
	<td colspan="2"><span class="Estilo5">  
	  <?php echo $nombre_comercial;?></span>	<BR><span class="Estilo80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gtin;?></span>	  <div align="center"></div>	  <span class="Estilo5">    </span></td>
	<td><div align="center" class="Estilo5"><?php echo $lote1;?></div></td>
	<td><div align="center" class="Estilo5"><?php echo $vto_lote;?></div></td>
	<td width="39"><div align="center">
	    <span class="Estilo5"><?php echo $fecha_preparado;?></span>
	    </div></td>
	<td width="33"><div align="center">
	  <input type="checkbox" name="<?php echo control.$cod_detalle;?>" value ="<?php echo $cod_detalle1111;?>" checked id="<?php echo control.$cod_detalle;?>2" onClick="ajax1(this);"/>
	</div></td>
	<?PHP
 }else{
?>

<?php if ($contame == 1){?>
<tr bgcolor="#B8B8B8">
  <td><div align="center" class="Estilo1 Estilo2 Estilo3 Estilo4">CANT</div></td>
  <td colspan="2"><div align="center" class="Estilo5">DROGA</div>    <div align="center" class="Estilo5"></div></td>
  <td><div align="center" class="Estilo5">LOTE</div></td>
  <td><div align="center" class="Estilo5">VTO</div></td>
  <td colspan="2"><div align="center"><span class="Estilo1 Estilo2 Estilo3 Estilo4">CONTROL</span></div></td>
</tr>
<?php }?>


<tr bgcolor="#FFFFFF">
	<td><div align="center" class="Estilo5"><?php echo $cantidad;?> </div></td>
	<td colspan="2"><span class="Estilo5">  
	  <?php echo $nombre_comercial;?> <BR><span class="Estilo81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $gtin;?></span></span>	  </span></td>
	<td><div align="center" class="Estilo5"><?php echo $lote1;?></div></td>
	<td><div align="center" class="Estilo5"><?php echo $vto_lote;?></div></td>
	<td width="39"><div align="center">
</div></td>
	<td width="33"><div align="center">
	  <input type="checkbox" name="<?php echo control.$cod_detalle;?>2"  value ="<?php echo $cod_detalle;?>" id="<?php echo control.$cod_detalle;?>" onClick="ajax1(this);"/>
	</div></td>
	<?PHP
	}



	 $result5->MoveNext();

				}

?>
  </tr>


	</table>


 

</form>

