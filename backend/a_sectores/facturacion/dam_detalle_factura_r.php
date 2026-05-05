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
    <style type="text/css">
<!--
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo2 {font-weight: bold}
.Estilo3 {font-size: 16px}
-->
    </style>
    
	

		<form action="estados_r.php" name="f1" method="post" target = "central1">


	<?php 


 
include ("../../conexiones/config_pro.php");

if ($bander != 1){
$nro_factura= $_REQUEST['nro_factura'];
}




$hoy=date("d/m/y");








  $sql = "SELECT * FROM `tr_ventas_encabezado` where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$fecha=$result->fields["fecha"];
 
$nro_fact = str_pad($nro_factura, 10, "0", STR_PAD_LEFT);

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $dia."/".$mes."/".$anio;

 



 $nro_receta=$result->fields["nro_receta"];
 $documento=$result->fields["documento"];
 $tipo_doc=$result->fields["tipo_doc"];
 $plan_completo=$result->fields["plan_completo"];
 $operador=$result->fields["operador"];
 $denominacion=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $neto=$result->fields["neto"];
  $tipo_factura=$result->fields["tipo_factura"];
    $observaciones=$result->fields["observaciones"];
 $cod_movimiento=$result->fields["cod_movimiento"];
$enviar=$result->fields["enviar"];

$sql="select * from fuentes where nro_fuente = '$enviar'";
$result = $db->Execute($sql);
$enviar=strtoupper($result->fields["nombre_fuente"]); 



if ($documento < 1000){
$tipo_comprobante = "AJUSTE";
}ELSE{
$tipo_comprobante = "ENTREGA";
}

IF ($cod_movimiento == 3){
$tipo_comprobante = "DEVOLUCION PO";
}


 
 

$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

if ($nro_os == 1){
$nombre_os="";
}


$sql7="select * from pacientes where documento = $documento and tipo_doc = '$tipo_doc'";
$result7 = $db->Execute($sql7);

$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;
$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero
$nombre_completo = $apellido.", ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc' order by nro_ficha desc";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 
$nro_ficha=strtoupper($result->fields["nro_ficha"]); 
$cod_fuente=strtoupper($result->fields["cod_fuente"]); 

$sql="select * from fuentes where nro_fuente = '$cod_fuente'";
$result = $db->Execute($sql);
$fuente=strtoupper($result->fields["nombre_fuente"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

if ($tipo_fact == "002"){
$tipo_factura1 = "PO";
}

?>
<style type="text/css">
<!--
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>


<table width="850">
<tr bgcolor="#FE9900">
  <td colspan="4"><div align="center" class="Estilo1">MERCADERIA RECIBIDA</div></td>
  </tr>
<tr>
	<td width="109" bgcolor="#B8B8B8"><span class="Estilo4">Paciente:</span></td>
	<td width="338" bgcolor="#F0F0F0"><span class="Estilo4"><?php echo $nombre_completo;?></span></td>
    <td width="168" bgcolor="#F0F0F0"><div align="center">N&ordm; Entrega: </div></td>
    <td width="169" bgcolor="#F0F0F0"><div align="center"><span class="Estilo4 Estilo3 Estilo1"><strong><?php echo $nro_factura;?></strong></span></div></td>
</tr>
<tr>
	<td bgcolor="#B8B8B8"><span class="Estilo4">Fuente:</span></td>
	<td colspan="3" bgcolor="#F0F0F0"><span class="Estilo4"><?php echo $fuente;?></span></td>
</tr>
<tr>
	<td bgcolor="#B8B8B8"><span class="Estilo4">Documento: </span></td>
	<td colspan="3" bgcolor="#F0F0F0"><span class="Estilo4"><?php echo $documento;?></span></td>
</tr>
</table>

<table width="850">
<tr bgcolor="#F0F0F0">
  <td colspan="7">  <div align="right">
	  <input name="Submit" type="Submit" id="Submit" value="VOLVER AL PACIENTE">
	  <!-- <input type="submit" name="Submit" value="GUARDAR"> -->
	  <input type="hidden" name="nro_factura" value="<?php echo $nro_factura;?>">	
	   <input type="hidden" name="documento" value="<?php echo $documento;?>">	
	<!-- &nbsp;<a href="javascript:seleccionar_todo()">Marcar todos</a> | -->
<!-- <a href="javascript:deseleccionar_todo()">Marcar ninguno</a> --> </div></td>


  </tr>
<tr bgcolor="#B8B8B8">
	<td width="47"><div align="center" class="Estilo1 Estilo2">CANT</div></td>
	<td width="297"><div align="center" class="Estilo3">DROGA</div></td>
	<td width="219"><div align="center" class="Estilo3">GTIN</div></td>
	<td width="43"><div align="center" class="Estilo3">LOTE</div></td>
	<td width="46"><div align="center" class="Estilo3">VTO</div></td>
	<td width="103"><div align="center" class="Estilo3">CONTROL</div></td>
		<td width="103"><div align="center" class="Estilo3">FECHA</div></td>
	</tr>



<?php

 




 $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  nro_factura = $nro_factura    order by  cod_detalle desc";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}




if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}


 

$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$estado= $result3->fields["estado"];

 $preparado_coir= $result3->fields["preparado_coir"];
 $recibido_coir= $result3->fields["recibido_coir"];
$recibido_farmacia= $result3->fields["recibido_farmacia"];
$recibido_servicio= $result3->fields["recibido_servicio"];

$fecha_indicado= $result3->fields["fecha_indicado"];
$fecha_recibido= $result3->fields["fecha_recibido"];

$indicado_coir= $result3->fields["indicado_coir"];

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

if ($estado == ""){$estado = "ASIGNADO";}

 
?>
<tr bgcolor="#F0F0F0">
	<td><div align="center"><span class="Estilo4"><?php echo $cantidad;?> </span></div></td>
	<td><span class="Estilo4"><?php echo $nombre_comercial;?></span></td>
	<td><span class="Estilo4"><?php echo $gtin;?></span></td>
	<td><div align="center" class="Estilo4"><?php echo $lote1;?></div></td>
	<td><div align="center" class="Estilo4"><?php echo $vto_lote;?></div></td>
	<td><div align="center" class="Estilo4"> 
	

	<?php if ( $indicado_coir == 1){
	
			?><input type="checkbox" name="<?php echo control.$cod_detalle;?>" checked  disabled id="caja14"  onClick="ajax1(this);"/><?php
		
		
		}else{ 

	 if ($recibido_coir == 1){?>
	<input type="checkbox" name="<?php echo control.$cod_detalle;?>" checked id="caja14" disabled onClick="ajax1(this);"/>
	<?php }else{?>
	<input type="checkbox" name="<?php echo control.$cod_detalle;?>"  id="caja14" disabled onClick="ajax1(this);"/>
	<?php } 

  } ?>


	
	
	</div></td>

<?php $di = substr($fecha_recibido,8,2);$me = substr($fecha_recibido,5,2);$an = substr($fecha_recibido,0,4);$fecha_recibido = $di."/".$me."/".$an;?>


	<?php if ($recibido_coir == 1){?>
	<td><div align="center" class="Estilo4"><?php echo $fecha_recibido;?></div></td>
	<?php }else{?>
	<td><div align="center" class="Estilo4"> - </div></td>
	<?php
	}


 



	 $result3->MoveNext();

				}

?>
  </tr>


	</table>

 </FORM>