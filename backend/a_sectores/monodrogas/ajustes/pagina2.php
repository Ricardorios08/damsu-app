<?php global $band;

include("../../../conexiones/config_pro.php");
include ("../../../conexiones/usuario_compra.php");


$id = $_REQUEST["id"];
$operador = $_REQUEST["id"];
$Alta= $_REQUEST["Alta"];
$primera_vez= $_REQUEST["primera_vez"];

$documento= $_REQUEST['documento'];
$tipo_doc = $_REQUEST['tipo_doc'];




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




if ($primera_vez == 1){

$observaciones= $_REQUEST['observaciones'];
$nro_comprobante_afectado= $_REQUEST['nro_comprobante_afectado'];


  $sql = "DELETE from compras1_encab_temp where operador = $id";
$result = $db->Execute($sql);
$sql = "DELETE from compras1_deta_temp where operador = $id";
$result = $db->Execute($sql);


if ($band != "SI"){
$nro_proveedor = $_REQUEST['nro_proveedor'];

include ("../../../conexiones/config_usu.php");
$sql="select * from proveedores where cod_proveedor = $nro_proveedor";
$result = $db->Execute($sql);
$denominacion=strtoupper($result->fields["denominacion"]);

if ($denominacion == ""){
	$leyenda = "NO EXISTE PROVEEDOR CON ESE NUMERO";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
}



$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];
$fecha = $anio."-".$mes."-".$dia;
$fecha1 =$dia."-".$mes."-".$anio;

$operador= $_REQUEST['id'];


$cod_movimient=$_REQUEST["cod_movimiento"];
	for ($i=0;$i<count($cod_movimient);$i++)    
	{     
	$cod_movimiento = $cod_movimient[$i];    
	}



$nro_factura= $_REQUEST['nro_factura'];
$porcentaje_boni= $_REQUEST['porcentaje_boni'];
$porcentaje_dto= $_REQUEST['porcentaje_dto'];



if ($nro_proveedor == ""){
	$leyenda = "NO PUEDE DEJAR EL CAMPO NRO DE PROVEEDOR EN BLANCO";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
}

/*if ($nro_factura == ""){
	$leyenda = "NO PUEDE DEJAR EL CAMPO NRO DE COMPROBANTE EN BLANCO";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
}*/

//include ("../comprobar_fechas.php");

$periodo = date("m"); 
$anio1 = date("y"); 

$sql = "INSERT INTO `compras1_encab_temp` ( `nro_factura` , `cod_operacion` , `nro_proveedor` , `denominacion` , `fecha` , `descuento` , `bonificacion` , `periodo` , `anio` , `operador`  , `cod_movimiento` ,`tipo_doc`, `documento` , `observaciones` , `nro_comprobante_afectado`) VALUES ( '$id' , '$cod_operacion' , '$nro_proveedor' , '$denominacion', '$fecha' , '$porcentaje_dto' , '$porcentaje_boni' , '$periodo' , '$anio1' , '$id' , '$cod_movimiento' , '$tipo_doc' , '$documento' , '$observaciones' , '$nro_comprobante_afectado' )";
mysql_query($sql);

}

}


$bande_buscar= $_REQUEST["bande_buscar"];

$bande_bus= $_REQUEST["bande_bus"];

if ($bande_bus == "SI") {
$cod_merc = $_REQUEST["cod_mercaderia"];
}



if (($bande_buscar == "SI") and ($Alta == "OK")){
$lote= $_REQUEST["lote"];
$mes_lote= $_REQUEST["mes_lote"];
$anio_lote= $_REQUEST["anio_lote"];
$precio_unitario= $_REQUEST["precio_unitario"];
$cantidad= $_REQUEST["cantidad"];
$cod_mercaderia = $_REQUEST["cod_mercaderia"];

if (($cantidad == 0) or ($cantidad == "")){
	$cantidad = 1;
}

$total = $precio_unitario * $cantidad;



 $sql = "INSERT INTO `compras1_deta_temp` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `presentacion` , `lote` , `mes_lote` ,  `anio_lote` , `cantidad` , `precio_unitario` , `precio_nuevo` , `total` , `cod_movimiento` , `operador`  )  VALUES ('$id' , '' ,'$cod_mercaderia' ,'$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_unitario' , '$precio_unitario', '$total' , '$cod_movimiento' , '$id' )";
mysql_query($sql);




$sql = "SELECT * FROM `monodrogas`  WHERE  troquel LIKE '$cod_mercaderia' order by cod_droga";
$result = $db->Execute($sql);

 $precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
//$cant_caja=strtoupper($result->fields["cant_caja"]);

//$precio_actualizado = $precio_actualizado / $cant_caja;

$cod_mercaderia = "";
}
else
{
$precio_actualizado = "";
$cod_mercaderia = "";

}




//////////////
$sql = "SELECT * FROM `compras1_encab_temp`  WHERE operador = $id";
$result8 = $db->Execute($sql);

$nro_proveedor=$result8->fields["nro_proveedor"];
$fecha=$result8->fields["fecha"];
$cod_movimiento=$result8->fields["cod_movimiento"];
$nro_factura=$result8->fields["nro_factura"];
$porcentaje_boni=$result8->fields["porcentaje_boni"];
$porcentaje_dto=$result8->fields["porcentaje_dto"];

$documento=$result8->fields["documento"];
$tipo_doc=$result8->fields["tipo_doc"];


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
//////////////

include ("variables_temp.php");

$periodo = date("m"); 
$anio1 = date("y"); 



?>
<script>
function on_load()
{
document.getElementById("cod_mercaderia").focus();
}

function enter()
{
document.getElementById("cod_mercaderia").focus();
}


function verif_caracter(obj,evt)

{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	
	{
		switch(obj.id)
		{
				case "cod_mercaderia":
				document.getElementById("lote1").focus();
				break;
				case "lote1":
				document.getElementById("mes_lote1").focus();
				break;
				case "mes_lote1":
				document.getElementById("anio_lote1").focus();
				break;

								case "anio_lote1":
				document.getElementById("precio_unitario1").focus();
				break;

					
				case "precio_unitario1":
				document.getElementById("cantidad1").focus();
				break;

				case "cantidad1":
				document.getElementById("OK").focus();
				break;

				
				
		}
		return false;
	}
	return true;
}


function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido_mercaderia.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, top = 35");
}

</script>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body onload = "on_load ()">
<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">


<table width="800" border="0" cellspacing="0">
  <tr bgcolor="#000099">
    <td height="27" colspan="3" bgcolor="#E6E6E6"><div align="left"><font color="#000000" face="Trebuchet MS">DEVOLUCION/DONACION</font></div></td>
    <td width="30%" rowspan="2" bgcolor="#E6E6E6">  <div align="center"><A HREF="actualizar_stock.php?id=<?php print("$id");?>"><IMG SRC="../../../imagenes/botones/stock.png" alt="Imprimir" border = "0"></A></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td colspan="3" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">Paciente:       <?php echo $nombre_completo;?> (<?php echo $documento;?>) </font></td>
  </tr>
 
<?PHP if ($bande_bus == "SI"){
	$cod_mercaderia = $cod_merc;
}


	?>
  <tr bgcolor="#E8DCFC">
    <td width="39%" bgcolor="#CCCCCC"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">COD UNICO <strong><font color="#006600">
      <input type = "text" name = "cod_mercaderia1" id="cod_mercaderia" size = "14" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
    </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
    <input name="Alta" type="submit" value= "BUSCAR" id = "Alta">
    </font></strong></font></strong></font></td>



    <td colspan="3" bgcolor="#CCCCCC"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><?php  $nombre_comercial;?></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
      <input name="id" type="hidden" value ="<?php echo $id;?>">
    </font></strong></font></td>
  </tr>
</table>


<?php 


include ("refrescar_detalle.php");



if(isset($_REQUEST['Alta'])) {

	switch ($_REQUEST['Alta'])
					{
						
			case "SI":
				{


$id= $_REQUEST['id'];


include ("variables_temp.php");

/////////////////////////////////////////////////
$cod_mercaderia= $_REQUEST['cod_mercaderia'];


 break;	}

			case "BUSCAR":
	
			{
 $band = "SI";

$id= $_REQUEST['id'];

include ("variables_temp.php");
 $cod_mercaderia1= $_REQUEST['cod_mercaderia1'];

if (is_numeric ($cod_mercaderia1)) { 
	include ("refrescar1.php"); } 
else { 
	
	include ("refrescar_buscar.php"); 
	} 



 break;	}

 
 

					}
}
?>