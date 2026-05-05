<?php 

//echo "Guardar_factura.php";

include ("../../conexiones/config_pro.php");

 $operador= $_REQUEST['operador'];


?>

<META http-equiv="refresh" content="3; url=guardar_compro.php?&&operador=<?php print("$operador");?>" > 
<!DOCTYPE html>
<html lang="es">
<head>

	<title>SULB | </title>

	<link href="css/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script language="javascript">
	function on_load()
	{
	document.getElementById("usuario").focus();
	}

	function verif_caracter(obj,evt)
	{

		evt = (evt) ? evt : event;
		var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
		if (charCode == 13) 

		{
			switch(obj.id)
			{
					case "usuario":
					document.getElementById("password3").focus();					
					
					
			}
			return false;
		}
		return true;
	}


	</script>
 
<style type="text/css">
<!--
body {
	background-image: url(nacional.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-color: #76A789;
    background-size: cover;
    background-position-y: -258px;
}
.Estilo10 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: bold;
	color: #FFFFFF;
}

.Estilo100 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: bold;
	color: #000;
}


.Estilo7 {font-size: x-large; font-family: Geneva, Arial, Helvetica, sans-serif; }
.Estilo9 {font-size: x-large; font-family: Geneva, Arial, Helvetica, sans-serif; color: #000066; }
-->
</style></head>


 <table width="600" height="350" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#F7F7F7">
  <tr>
    <td height="40" colspan="2" bordercolor="#F7F7F7" bgcolor="#F7F7F7"><div align="center"></div></td>
  </tr>
  <tr>
    <td height="79" colspan="2" bordercolor="#F7F7F7" bgcolor="#F7F7F7"><div align="center"><img src="carga1.gif" width="188px"  ></div></td>
  </tr>
  <tr>
    <td height="79" colspan="2" bordercolor="#F7F7F7" bgcolor="#F7F7F7"><div align="center" class="Estilo14">
        <p>&nbsp;</p>
        <H1 class="Estilo100">GENERANDO COMPROBANTE</H1>
        <p class="Estilo15"></p>
        <p class="Estilo15"></p>
 
    </div></td>
  </tr>
  <tr>
    <td bordercolor="#F7F7F7" bgcolor="#F7F7F7"><div align="center"></div>
        <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2" bordercolor="#F7F7F7" bgcolor="#F7F7F7"> </td>
  </tr>
  <tr bgcolor="#F7F7F7">
    <td colspan="2" bordercolor="#F7F7F7"><div align="center"><span class="Estilo3"> </span></div></td>
  </tr>
</table>

</html>


<?php



exit;



 $sql = "SELECT * FROM `tr_ventas1_encab_temp` where operador = $operador";
$result = $db->Execute($sql);

 $tipo_fact=$result->fields["tipo_fact"];
 $nro_factura=$result->fields["nro_factura"];

if ($nro_factura == ""){
exit;
}



$sql = "SELECT * FROM tr_ventas1_deta_temp where operador = $operador";
$result = $db->Execute($sql);

$cod_mercade=$result->fields["cod_mercaderia"];

if ($cod_mercade == ""){
$leyenda = "NO INGRESO NINGUN PRODUCTO";
include ("../../alertas/campo_informacion2.php");
exit;
}








$sql = "SELECT * FROM `tr_ventas1_encab_temp` where operador = $operador";
$result = $db->Execute($sql);

 $tipo_fact=$result->fields["tipo_fact"];
 $nro_factura=$result->fields["nro_factura"];
 $nro_receta=$result->fields["nro_receta"];
 $documento=$result->fields["documento"];
 $tipo_doc=$result->fields["tipo_doc"];
 $plan_completo=$result->fields["plan_completo"];
 $operador=$result->fields["operador"];
 $nombre_completo=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $observaciones=$result->fields["observaciones"];
 $nro_os=$result->fields["nro_os"];

 $departamento=$result->fields["departamento"];
 $cod_diagnostico=$result->fields["cod_diagnostico"];
 $enviar=$result->fields["enviar"];

/*
$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by fecha desc";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];

$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);
*/

/*
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
*/


 $sql8 = "SELECT * FROM `paciente_diagnostico` where documento = '$documento'";
$result8 = $db->Execute($sql8);
$cod_fuente=$result8->fields["cod_fuente"];
$nombre_fuente=strtoupper($result8->fields["nombre_fuente"]); 

$dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $anio."-".$mes."-".$dia;

 

   $sql = "INSERT INTO `tr_ventas_encabezado` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura`, 	`observaciones`,`departamento`,`cod_diagnostico`,`cod_agrupado` , `enviar` , `estado` , `fecha_coir` , `fecha_farmacia` , `fecha_servicio` , `fuente` , `nombre_fuente`) VALUES ( '001'  , '' , '$nro_receta' , '$documento' , '$tipo_doc' , '' , '$operador' , '$nombre_completo' , '$fecha' , '$forma_pago' , '' , '$nombre_operador' , '$nro_os' , '$sigla', '' , '1' , '$tipo_factura' , '$observaciones' , '$departamento' , 	'$cod_diagnostico' , 	'$cod_agrupado' , '$enviar' , 'ASIGNADO' , '' , '' , '' , '$cod_fuente' , '$nombre_fuente' )";
mysql_query($sql);

 $idgenerado = mysql_insert_id();

$nro_factura = $idgenerado;



  $sql3 = "SELECT * FROM tr_ventas1_deta_temp  WHERE  operador = $operador order by cod_detalle desc";
$result3 = $db->Execute($sql3);


if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;
$cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$devuelve= $result3->fields["devuelve"];
$manual= $result3->fields["manual"];
$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;
$nro_serie=strtoupper($result3->fields["nro_serie"]);


$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);

$presentacion=strtoupper($result3->fields["presentacion"]);
$nombre_comercial=strtoupper($result3->fields["nombre_comercial"]);

$sql7="select * from monodrogas where cod_barra = $cod_mercaderia";
$result7 = $db->Execute($sql7);
$grupo=strtoupper($result7->fields["grupo"]);
$cod_droga= $result7->fields["cod_droga"];
$laboratorio= $result7->fields["laboratorio"];

 $sql8 = "SELECT * FROM `paciente_diagnostico` where documento = '$documento'";
$result8 = $db->Execute($sql8);
$resultado=$result8->fields["cod_fuente"];

$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);

if ($grupo == 3){
$tipo_producto = "MONOCLONAL";
}

$total_factura = $total_factura + $precio_unitario;


$cont = $cont + 1;


$sql7="select count(gtin) as cant_gt from `tr_stock` where gtin = $gtin";
$result7 = $db->Execute($sql7);
$cant_gt=strtoupper($result7->fields["cant_gt"]);

if ($cant_gt < 2){
echo "aca guarda";
}


  $sql = "UPDATE `tr_existencias` SET `cantidad_salida` = '1' , `fecha_ultimo_mov` = '$fecha' WHERE gtin = '$gtin'";
mysql_query($sql);


$sql = "INSERT INTO `tr_ventas_detalle` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie`)  VALUES ('001' , '$idgenerado' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote1' , '$mes_lote' , '$anio_lote' , '1' , '$precio_unitario' , '$precio_unitario' , '$proveedor' , '$operador' , '$gtin' , '$resultado' , '' , '$nro_serie')";
mysql_query($sql);

  $sql = "UPDATE `tr_ventas_detalle` SET `grupo` = '$grupo' , `fecha` = '$fecha',  `nro_receta` = '$nro_receta' ,  `cod_droga` = '$cod_droga' , `nro_os` = '$nro_os' ,  `manual` = '$manual' WHERE `nro_factura` = '$idgenerado' and cod_mercaderia = $cod_mercaderia";
mysql_query($sql);

$sql = "INSERT INTO `tr_stock` (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion` , `nro_serie` , `drogas` , `grupo` , `laboratorio` , `departamento` ) VALUES ('$cod_mercaderia' , '$fecha' , '6' , '$tipo_doc' , '$nro_factura' , '1' , '$precio_unitario' , '$lote1' , '$mes_lote' , '$anio_lote' , '$proveedor' ,  '$tipo_doc' , '' , '' , '$documento' , '$cod_droga' , '$nro_os' , '$gtin' , '$transaccion' ,'$nro_serie' , '$drogas' , '$grupo' , '$laboratorio' , '$departamento')" ;
mysql_query($sql);

  $sql = "UPDATE receta_detalle SET estado = '6' , fecha_modificacion = '$fecha'  WHERE nro_receta = $nro_receta and cod_droga = '$cod_droga'";
mysql_query($sql);



	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;

if ($grupo == 3){
$grupo = "MONOCLONAL";
}


if ($proveedor != 110){
$tipo_factura  ="PO ".$grupo;
}else
{
$tipo_factura  =$grupo;
}

if (($tipo_factura == 1) or ($tipo_factura == 2)){
$tipo_factura = "";
}


 $sql = "UPDATE tr_ventas_encabezado SET `neto` = '$total_factura' , tipo_factura = '$tipo_factura' , observaciones = '$observaciones'  , departamento = '$departamento' WHERE `nro_factura` = $idgenerado";
mysql_query($sql);



$hor = time();
date_default_timezone_set("America/Argentina/Mendoza");
$hora = date("H:i:s",$hor);



 $sql = "UPDATE receta SET `hora_facturacion` = '$hora' , fecha_factura = '$fecha'  WHERE nro_receta = $nro_receta";
mysql_query($sql);


$sumatoria = $cont;
		$cont = 0;

$desc_factura1= 0;
$subtotal= 0;

$total_factura = 0;
$neto = 0;
$iva = 0;
 


 $sql = "SELECT sum(devuelve) as cantidad FROM `tr_ventas1_deta_temp` WHERE  `operador` = '$operador'";
$result = $db->Execute($sql);
 $cantidad=$result->fields["cantidad"];

if ($cantidad >= 1){
include ("guardar_nc.php");
}


 $sql = "delete from tr_ventas1_deta_temp where operador = $operador";
mysql_query($sql);
 $sql = "delete from tr_ventas1_encab_temp where operador = $operador";
mysql_query($sql);

$total_factura = 0;
$neto = 0;
$iva = 0;

$leyenda  = "SE ACTUALIZO EL STOCK, EXISTENCIA Y FACTURA DE VENTA";
include ("../../alertas/campo_informacion.php");

?>