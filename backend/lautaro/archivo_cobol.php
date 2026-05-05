<table width="307" border="0">
  <tr>
    <th width="291" bgcolor="#FF0000" scope="col"><span class="Estilo2">ESTE PROCESO PUEDE TARDAR VARIOS MINUTOS POR FAVOR NO DESESPERARSE</span></th>
  </tr>
</table>
<?
global $palabra;
global $palabra1;
global $resultado;
global $a;


/*
function ceros($palabra) {
		if (strlen($palabra) == 1){
return	$resultado = "000".$palabra;
		}

if (strlen($palabra) == 2){
return	$resultado = "00".$palabra;
		}
		}

$cualquiera= 12;
echo ceros($cualquiera);


*/
$a= 21;


include ("funciones.php");

include ("../conexiones/config_gb.php");
?>
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
-->
</style>


<?

$sqls = "TRUNCATE TABLE `para_cobol";
mysql_query($sqls);


echo $sql="select cod_grabacion, nro_practica from detalle where periodo = $mes and nro_os = 5073 and (confirmada = 1 or confirmada = 7)   ORDER  BY nro_laboratorio, cod_grabacion, nro_orden";
$result = $db->Execute($sql);

if (!$result) die("No hay Ordenes en ese Mes".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_grabacion=$result->fields["cod_grabacion"];
$practica=$result->fields["nro_practica"];

	if ($cod_grabacion == '507380271212121007'){
	echo "lo grabo";
}


$sql1 = "SELECT nro_laboratorio, nro_orden, nro_afiliado, fecha, medico FROM `ordenes`  WHERE `cod_grabacion` = $cod_grabacion";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$nro_laboratorio=$result1->fields["nro_laboratorio"];
$nro_laboratori= ceros_nro_laboratorio($nro_laboratorio);
$nro_orden=$result1->fields["nro_orden"];
$nro_ord = ceros_nro_orden($nro_orden);

if ($nro_orden == "0"){
	$nro_orden = $result1->fields["autorizacion"];
	$nro_ord = ceros_nro_orden($nro_orden);
}

$nro_afiliado=$result1->fields["nro_afiliado"];
$fecha=$result1->fields["fecha"];

$dia2= substr($fecha,8,2);
$mes2 = substr($fecha,5,2);
$anio2= substr($fecha,0,4);

$fecha = $anio2.$mes2.$dia2;
$prescriptor=$result1->fields["medico"];

//$sql2 = "SELECT nro_practica FROM `detalle`  WHERE `cod_grabacion` = $cod_grabacion";

//$sql2 = "SELECT nro_practica FROM `detalle`  WHERE `cod_grabacion` = 507300064978";
//$result2 = $db->Execute($sql2);

 //if (!$result2) die("fallo".$db->ErrorMsg());
  //while (!$result2->EOF) {
//$practica=$result2->fields["nro_practica"];
$practic=$practica;
$practic= ceros_nro_practica($practica);

//$contenido = $nro_laboratorio.",".$nro_orden.",".$afiliado.",".$fecha.",".$practica.",".$prescriptor;

//$result2->MoveNext();
 $sql12 = "INSERT INTO `para_cobol` ( `nro_laboratorio` , `nro_orden` , `afiliado` , `fecha` , `prescriptor` , `practica` ) VALUES ('$nro_laboratori' , '$nro_ord' , '$nro_afiliado' , '$fecha' , '$prescriptor' , '$practic')";
mysql_query($sql12);

/*
if  ($nro_ord == "21400708"){
	echo "-------------------------------------------------";
}
*/


$result1->MoveNext();
}

$result->MoveNext();
}

//include ("cobol_exp.php");
?>