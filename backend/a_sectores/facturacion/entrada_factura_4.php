<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">



<html>
<head>
<title>Facturación PROGRAMA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo4 {
	color: #006633;
	font-size: 10px;
	font-weight: bold;
}
.Estilo6 {font-size: 12}
.Estilo16 {font-family: Arial, Helvetica, sans-serif}
.Estilo26 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->


<!--
.Estilo67 {color: #FFFFFF; font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.Estilo70 {color: #FFFFFF}
.Estilo71 {font-size: 10px}
.Estilo72 {font-size: 12px; color: #000000; }
-->

<!--
.Estilo83 {font-size: 10px; font-family: Arial, Helvetica, sans-serif;}
.Estilo84 {font-size: 12px}
.Estilo85 {color: #000000}
.Estilo60 {font-size: 12px; color: #000000; font-family: "Trebuchet MS"; }
.Estilo61 {color: #000000; font-family: "Trebuchet MS"; }
.Estilo62 {color: #000000; font-family: "Trebuchet MS"; font-size: 10px; }
.Estilo63 {font-size: 10px; color: #006633;}
.Estilo64 {font-family: "Trebuchet MS"}
.Estilo65 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->



</style>

<script language="javascript">
function on_load()
{
document.getElementById("gtin").focus();
document.getElementById("gtin").style.backgroundColor =  "#CCFFCC";
document.getElementById("gtin").select();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "gtin":
document.getElementById("gtin").style.backgroundColor =  "#FFFFFF";
document.getElementById("ok").style.backgroundColor =  "#CCFFCC";
document.getElementById("ok").focus();
				break;

				
				
				
		}
		return false;
	}
	return true;
}

function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, location = 01, top = 35");
}

</script>


</head>

<?php 
include ("../../conexiones/config_pro.php");
include ("../../conexiones/usuario_actual.php");

$informar_anmat= $_REQUEST['informar_anmat'];
$primera_vez= $_REQUEST['primera_vez'];
		if ($primera_vez == 1){
				include ("primera_vez.php");
							}


							else{ // cambia primera vez 
// 07795305791571

$operador= $_REQUEST['operador'];

$pasada= $_REQUEST['pasada'];
$manual= $_REQUEST['manual'];
 $sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


 $sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

$nro_afiliado = $documento;


  $sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

$nombre_os = $nombre_os." - ".$sigla." (".$nro_os.")";


if ($pasada == 1){
$gtin= $_REQUEST['gtin'];
$nro_serie= $_REQUEST['nro_serie'];

}






else
								{
$gtin = "";
								}
  $sql = "SELECT * FROM `tr_ventas1_encab_temp` where operador = $operador";
$result = $db->Execute($sql);

 $nombre_completo=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $observaciones=$result->fields["observaciones"];

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $anio.$mes.$dia;


$cod_paciente=$result->fields["cod_paciente"];
$nombre_os=$result->fields["nombre_os"];

 $documento=$result->fields["documento"];

 $tipo_doc=$result->fields["tipo_doc"];


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

 $sql="select * from paciente_diagnostico where documento = '$documento' ";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


 $sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

$nro_afiliado = $documento;


 $sql = "SELECT * FROM `afiliaciones` where documento = $documento order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

$nombre_os = $nombre_os." - ".$sigla." (".$nro_os.")";




}


 $sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

$nro_afiliado = $documento;


 $sql = "SELECT * FROM `afiliaciones` where documento = $documento order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

$nombre_os = $nombre_os." - ".$sigla." (".$nro_os.")";


?>

<script>

function abrirVentana() {
	var cod_detalle = <?php  $cod_detalle;?> 
    open("factura_papel.php?cod_detalle=<?php print($cod_detalle);?>&&nro_factura=<?php print($nro_factura);?>&&nro_cliente=<?php print($nro_cliente);?>&&matriculae=<?php print($matricula);?>&&forma_pago=<?php print($forma_pago);?>&&dia=<?php print($dia);?>&&mes=<?php print($mes);?>&&anio=<?php print($anio);?>&&todo=<?php print($todo);?>&&direccion=<?php print($direccion);?>&&cuit=<?php print($cuit);?>&&tipo_fact=<?php print($tipo_fact);?>","MERCADERIA", "width=1000,height=1000,toolbar=no,directories=no,menubar=no,status=no");
} 
</script>

<body onload = "on_load ()">
<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<?php include("../../conexiones/config_pro.php");
$sql8 = "SELECT * FROM `tr_ventas1_encab_temp` where nro_factura = $nro_factura";
$result8 = $db->Execute($sql8);
$plan=strtoupper($result8->fields["plan"]);?>
<table width="800" border="0">
          <!--DWLayoutTable-->
          <tr bgcolor="#000099">
            <td colspan="3" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67"><div align="left" class="Estilo70">
              <div align="left"><span class="Estilo83"><span class="Estilo6 Estilo70 Estilo16 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo60">Paciente: <?php echo $nombre_completo;?>&nbsp;&nbsp;&nbsp;</span></span></span></span><span class="Estilo4 Estilo6 Estilo70  Estilo16"><span class="Estilo4 Estilo16  Estilo6"><span class="Estilo71"><span class="Estilo60"> &nbsp;&nbsp;&nbsp;</span></span></span></span></span><span class="Estilo62">&nbsp;</span><span class="Estilo60">Fecha: <?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio?></span> &nbsp;&nbsp;&nbsp;</div>
            </div>              </td>
            <td colspan="2" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67">&nbsp;
              <span class="Estilo85">Operador: <?php echo $nombre_operador;?> <?php echo $operador;?></span></td>
    </tr>
          
          <tr bgcolor="#C4D7E6">
            <td width="12%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64">Domicilio: </span></span></span></span></span></span></td>
            <td colspan="3" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo strtoupper($direccion);?></span></span></span></span></span></span></td>
            <td width="24%" rowspan="4" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67 Estilo85"> <div align="center"><a href="guardar_factura.php?&&operador=<?php print("$operador");?>&&nro_factura_nuevo=<?php print("$nro_factura_nuevo");?>&&programa=<?php print("$programa");?>&&documento=<?php print("$documento");?>&&operador=<?php print("$operador");?>&&cuit=<?php print("$cuit");?>" onclick="return confirm('¿Está seguro de Guardar esta Factura?');"><IMG SRC="../../imagenes/boton-guardar.jpg" alt="GUARDAR"  border = "0"></a>    <a href="imprimir_pdf_previa.php?&&operador=<?php print("$operador");?>&&nro_factura_nuevo=<?php print("$nro_factura_nuevo");?>&&programa=<?php print("$programa");?>&&documento=<?php print("$documento");?>&&operador=<?php print("$operador");?>&&cuit=<?php print("$cuit");?>" onclick="return confirm('VISTA PREVIA');">PREVIA</a></div></td>
          </tr>
          <tr bgcolor="#C4D7E6">
            <td bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64">Diagnostico: </span></span></span></span></span></span></td>
            <td colspan="3" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo strtoupper($nombre_diagnostico);?></span></span></span></span></span></span></td>
          </tr>
          <tr bgcolor="#C4D7E6">
            <td bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64">Obra Social:  &nbsp;&nbsp;</span></span></span></span></span></span></td>
            <td width="39%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo $nombre_os;?> </span></span></span></span></span></span></td>
            <td width="14%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><div align="right"><span class="Estilo72 Estilo85 Estilo64">Afiliado:</span></div></td>
            <td width="11%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><div align="center"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo $nro_afiliado;?></span></span></span></span></span></span></div></td>
          </tr>
          <tr bgcolor="#C4D7E6">
            <td bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo72 Estilo85 Estilo64">Nota:  &nbsp;</span></td>
            <td colspan="3" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><input name="observaciones" type="text"  id ="observaciones" onKeyPress='return verif_caracter(this,event)' value = "<?php echo $observaciones;?>" size="80" maxlength="100"></td>
          </tr>
          
          <tr bgcolor="#B09268">
            <td colspan="5" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67 Estilo85 Estilo65"><p>GTIN: 
              <input name="gtin" type="text"  id ="gtin" value = "<?php echo $gtin;?>" onKeyPress='return verif_caracter(this,event)' size="120">
              <!-- <input name="Alta" type="submit" value= "PROVEEDOR" id = "ok2"> -->
              </p>            </td>
    </tr>
          <tr bgcolor="#B09268">
            <td colspan="5" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67 Estilo85 Estilo65"> Serie:
              <input name="nro_serie" type="text"  id ="nro_serie" value = "<?php echo $nro_serie;?>" onKeyPress='return verif_caracter(this,event)' size="10">
Devuelve
<input name="unidad" type="text"  id ="unidad" onKeyPress='return verif_caracter(this,event)' size="3">
Unidades
<input name="Alta" type="submit" id="Alta" value="OK">
<input name="Alta" type="submit" value= "BUSCAR" id = "ok1">
<input name="Alta" type="submit" value= "AGREGAR COMENTARIO" id = "Alta"></td>
          </tr>
                      <input name="documento" type="hidden" value ="<?php echo $documento;?>">
                      <input name="tipo_doc" type="hidden" value ="<?php echo $tipo_doc;?>">
 <input name="operador" type="hidden" value ="<?php echo $operador;?>">
  <input name="tipo_fact" type="hidden" value ="<?php echo $tipo_fact;?>">
  <input name="informar_anmat" type="hidden" value ="<?php echo $informar_anmat;?>">
							 <input name="dia" type="hidden" value ="<?php echo $dia;?>">
                      <input name="mes" type="hidden" value ="<?php echo $mes;?>">
                      <input name="anio" type="hidden" value ="<?php echo $anio;?>">

					     <input name="cod_paciente" type="hidden" value ="<?php echo $cod_paciente;?>">
 <input name="manual" type="hidden" value ="<?php echo $manual;?>">

					   <input name="nro_os[]" type="hidden" value ="<?php echo $nro_os;?>">
					   					   <input name="sigla" type="hidden" value ="<?php echo $sigla;?>">
  </table>

</form>




  <?php 
		


		

		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "OK":
				{

include("../../conexiones/config_pro.php");

$operador = $_REQUEST['operador'];

 $informar_anmat= $_REQUEST['informar_anmat'];
 $gtin= $_REQUEST['gtin'];
 $nro_serie= $_REQUEST['nro_serie'];

$observaciones= $_REQUEST['observaciones'];
$sql = "UPDATE `tr_ventas1_encab_temp` SET  observaciones = '$observaciones' WHERE operador = $operador";
//mysql_query($sql);



$unidad = $_REQUEST['unidad'];


if ($gtin != ""){

  $sql = "SELECT * FROM `tr_existencias`  WHERE  `gtin` like '$gtin'";
$result = $db->Execute($sql);


$proveedor=strtoupper($result->fields["proveedor"]);
 $cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);




  $sql = "SELECT * FROM `tr_stock`  WHERE  `gtin` like '$gtin'";
$result = $db->Execute($sql);
$proveedor=strtoupper($result->fields["cuenta"]);


/*if ($cod_mercaderia == ""){
$leyenda = "ESE ARTICULO NO TIENE EXISTENCIA CONSULTE CON DEPOSITO";
include ("../../alertas/campo_informacion2.php");

}
*/


  $sql8 = "SELECT * FROM `tr_ventas1_deta_temp`  WHERE  `gtin` like '$gtin'";
$result8 = $db->Execute($sql8);

$gt=$result8->fields["gtin"];

if ($gt != ""){
$leyenda = "YA CARGO ESE ARTICULO EN EL TEMP";
include ("../../alertas/campo_informacion2.php");
exit;
}

    $sql8 = "SELECT * FROM `tr_stock`  WHERE  `gtin` like '$gtin' and cod_movimiento = 6";
$result8 = $db->Execute($sql8);

$gt=$result8->fields["gtin"];

if ($gt != ""){
$leyenda = "ESE PRODUCTO YA FUE ENTREGADO. CONSULTE STOCK";
include ("../../alertas/campo_informacion2.php");
exit;
}


if ($cod_mercaderia != ""){


$lote=strtoupper($result->fields["lote"]);
 $mes_lote=strtoupper($result->fields["mes_lote"]);
 $anio_lote=strtoupper($result->fields["anio_lote"]);
 $nro_serie=strtoupper($result->fields["nro_serie"]);





$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia'";
$result = $db->Execute($sql);

$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga= $result->fields["cod_droga"];
$informar=strtoupper($result->fields["informar"]);


 
$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);


if ($informar_anmat == "SI"){
if ($informar == "SI") {
include ("test1.php");
}else
	{



  $sql = "INSERT INTO `tr_ventas1_deta_temp` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie` , `devuelve` , `cod_droga`, `nombre_droga` , `documento` , `nro_os` , `manual`)  VALUES ('x' , '$operador' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$unidad' , '$precio_unitario' , '$precio_unitario' , '$proveedor' , '$operador' , '$gtin' , '' , '' , '$nro_serie' , '$unidad' , '$cod_droga', '$nombre_droga' , '$documento' , '$nro_os' , '$manual')";
mysql_query($sql);
	}

}else{
  $sql = "INSERT INTO `tr_ventas1_deta_temp` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie` , `devuelve`  , `cod_droga`, `nombre_droga` , `documento` , `nro_os` , `manual`)  VALUES ('x' , '$operador' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$unidad' , '$precio_unitario' , '$precio_unitario' , '$proveedor' , '$operador' , '$gtin' , '' , '' , '$nro_serie' , '$unidad' , '$cod_droga', '$nombre_droga' , '$documento' , '$nro_os', '$manual' )";
mysql_query($sql);

}


}
}


 include ("mostrar_detalle.php");

			break;
				}




case "BUSCAR":
				{
$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];
$cod_paciente= $_REQUEST['cod_paciente'];

$observaciones= $_REQUEST['observaciones'];
$sql = "UPDATE `tr_ventas1_encab_temp` SET  observaciones = '$observaciones' WHERE operador = $operador";
//mysql_query($sql);


include("refrescar1.php");


	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}

case "AGREGAR COMENTARIO":{
$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];
$cod_paciente= $_REQUEST['cod_paciente'];
$observaciones= $_REQUEST['observaciones'];
$sql = "UPDATE `tr_ventas1_encab_temp` SET  observaciones = '$observaciones' WHERE operador = $operador";
mysql_query($sql);


include("mostrar_detalle.php");


	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}



				case "BUSCAR PROVEEDOR":
				{
$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];

$observaciones= $_REQUEST['observaciones'];
$sql = "UPDATE `tr_ventas1_encab_temp` SET  observaciones = '$observaciones' WHERE operador = $operador";
mysql_query($sql);

include("refrescar_prov.php");


	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}


case "CAMBIAR NUMERO NOTA DE ENTREGA":
				{

$operador = $_REQUEST['operador'];
$nro_factura_nuevo= $_REQUEST['nro_factura_nuevo'];
$tipo_fact= $_REQUEST['tipo_fact'];

$observaciones= $_REQUEST['observaciones'];
$sql = "UPDATE `tr_ventas1_encab_temp` SET  observaciones = '$observaciones' WHERE operador = $operador";
mysql_query($sql);


if ($nro_factura_nuevo != ""){

$sql = "SELECT * FROM `tr_ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nro_factura=strtoupper($result3->fields["nro_factura"]);

$sql = "UPDATE `tr_ventas1_encab_temp` SET `nro_factura` = '$nro_factura_nuevo'   WHERE `nro_factura` = '$nro_factura' and `tipo_fact` = '$tipo_fact' ";
mysql_query($sql);
$sql = "UPDATE `tr_ventas1_deta_temp` SET `nro_factura` = '$nro_factura_nuevo'  WHERE `nro_factura` = '$nro_factura' and `tipo_fact` = '$tipo_fact' ";
mysql_query($sql);
$nro_factura = $nro_factura_nuevo;

}
include ("mostrar_detalle.php");




	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}

	}
 }
?>
    </table>

	  <!-- <table width="800" border="0">
    <tr>
      <td><div align="center"><strong>EN CASO DE NO COINCIDIR CAMBIAR POR: <span class="Estilo67 Estilo70">
          <input name="nro_factura_nuevo" type="text" id ="nro_factura_nuevo" value="<?php  if (isset($_REQUEST['nro_factura_nuevo'])) echo $_REQUEST['nro_factura_nuevo'];?>" onKeyPress="return verif_caracter(this,event)" size="4">
          <input name="Alta2" type="submit" value= "CAMBIAR NUMERO NOTA DE ENTREGA" id = "Alta2">
      </span></strong></div></td>
    </tr>
  </table> -->

  </form>
 
  


