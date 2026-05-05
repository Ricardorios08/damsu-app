<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">



<html>
<head>
<title>Documento sin t&iacute;tulo</title>
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
include ("../../../conexiones/config_pro.php");
include ("../../../conexiones/usuario_actual.php");


$primera_vez= $_REQUEST['primera_vez'];

if ($primera_vez == 1){

$primera_vez = 5;


$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];


$operador= $_REQUEST['operador'];

  $sql = "DELETE FROM `temp_detalle` WHERE operador = $operador";
mysql_query($sql);

$event=$_REQUEST["evento"];
	for ($i=0;$i<count($event);$i++)    
	{     
	$evento = $event[$i];    
	}


switch ($evento){

case "83":{$nombre_evento = "Código Deteriorado/Destruido";break;}

case "33":{$nombre_evento = "Destruciión Medicamento por Vencimiento";break;}
case "82":{$nombre_evento = "Envio de Producto en caracter de devolucion";break;}
case "108":{$nombre_evento = "Recepción de producto en caracter de devolución";break;}
case "148":{$nombre_evento = "Producto destinado a Exportación";break;}
case "29":{$nombre_evento = "Recepción de productos en caracter de devolución por prohibición";break;}
case "85":{$nombre_evento = "PRODUCTO ROBADO O EXTRAVIADO";break;}


}


}else{

$operador= $_REQUEST['operador'];

$event=$_REQUEST["evento"];
	for ($i=0;$i<count($event);$i++)    
	{     
	$evento = $event[$i];    
	}


switch ($evento){

case "83":{$nombre_evento = "Código Deteriorado/Destruido";break;}

case "33":{$nombre_evento = "Destrucción Medicamento por Vencimiento";break;}
case "82":{$nombre_evento = "Envio de Producto en caracter de devolucion";break;}
case "108":{$nombre_evento = "Recepción de producto en caracter de devolución";break;}
case "148":{$nombre_evento = "Producto destinado a Exportación";break;}
case "29":{$nombre_evento = "Recepción de productos en caracter de devolución por prohibición";break;}

case "85":{$nombre_evento = "ROBADO O EXTRAVIADO";break;}
case "97":{$nombre_evento = "DESTR POR VTO";break;}

}

}
?>

<script>

function abrirVentana() {
	var cod_detalle = <?php  $cod_detalle;?> 
    open("factura_papel.php?cod_detalle=<?php print($cod_detalle);?>&&nro_factura=<?php print($nro_factura);?>&&nro_cliente=<?php print($nro_cliente);?>&&matriculae=<?php print($matricula);?>&&forma_pago=<?php print($forma_pago);?>&&dia=<?php print($dia);?>&&mes=<?php print($mes);?>&&anio=<?php print($anio);?>&&todo=<?php print($todo);?>&&direccion=<?php print($direccion);?>&&cuit=<?php print($cuit);?>&&tipo_fact=<?php print($tipo_fact);?>","MERCADERIA", "width=1000,height=1000,toolbar=no,directories=no,menubar=no,status=no");
} 
</script>

<body onload = "on_load ()">
<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<?php include("../../../conexiones/config_pro.php");
$sql8 = "SELECT * FROM `tr_ventas1_encab_temp` where nro_factura = $nro_factura";
$result8 = $db->Execute($sql8);
$plan=strtoupper($result8->fields["plan"]);?>
<table width="800" border="0">
          <!--DWLayoutTable-->
          <tr bgcolor="#000099">
            <td width="64%" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67"><div align="left" class="Estilo70">
              <div align="left"><span class="Estilo83"><span class="Estilo6 Estilo70 Estilo16 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo60"><span class="Estilo85 Estilo67"><span class="Estilo61"><span class="Estilo84">INFORMAR A ANMAT </span></span></span></span></span></span></span></span>&nbsp;</div>
            </div>              </td>
            <td bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67">&nbsp;
            <div align="center"><span class="Estilo85">Operador:  </span><span class="Estilo85"><?php echo $operador;?></span></div></td>
    </tr>
          
          <tr bgcolor="#C4D7E6">
            <td bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><div align="center"><span class="Estilo85"><?php echo $evento;?> <?php echo $nombre_evento;?></span></div></td>
            <td width="36%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67 Estilo85"> <div align="right"><a href="control_nro_factura.php?&&operador=<?php print("$operador");?>&&evento1=<?php print("$evento");?>&&programa=<?php print("$programa");?>&&documento=<?php print("$documento");?>&&operador=<?php print("$operador");?>&&cuit=<?php print("$cuit");?>"><IMG SRC="../../../imagenes/flechas/derecha.png" width="137" height="66"alt="CONFIRMAR"  border = "0"></a> </div></td>
          </tr>
          
          <tr bgcolor="#B09268">
            <td colspan="2" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67 Estilo85 Estilo65"><p>GTIN: 
              <input name="gtin" type="text"  id ="gtin" value = "<?php echo $gtin;?>" onKeyPress='return verif_caracter(this,event)' size="40">
              <input name="Alta" type="submit" id="Alta" value="OK">
            </p>            </td>
    </tr>
                      <input name="documento" type="hidden" value ="<?php echo $documento;?>">
                      <input name="tipo_doc" type="hidden" value ="<?php echo $tipo_doc;?>">
 <input name="operador" type="hidden" value ="<?php echo $operador;?>">
  <input name="evento[]" type="hidden" value ="<?php echo $evento;?>">
  <input name="evento1" type="hidden" value ="<?php echo $evento;?>">
							 <input name="dia" type="hidden" value ="<?php echo $dia;?>">
                      <input name="mes" type="hidden" value ="<?php echo $mes;?>">
                      <input name="anio" type="hidden" value ="<?php echo $anio;?>">
					   <input name="nro_os[]" type="hidden" value ="<?php echo $nro_os;?>">
  </table>

</form>




  <?php 
		


		

		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "OK":
				{

include("../../../conexiones/config_pro.php");


$operador = $_REQUEST['operador'];

$evento1 = $_REQUEST['evento1'];
 $gtin= $_REQUEST['gtin'];


if ($gtin != ""){

 $sql = "SELECT * FROM `tr_existencias`  WHERE  `gtin` = $gtin";
$result = $db->Execute($sql);

$lote=strtoupper($result->fields["lote"]);
$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$proveedor=strtoupper($result->fields["proveedor"]);
$cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);


$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia'";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);



//include ("test1.php");


  $sql = "INSERT INTO `temp_detalle` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin`)  VALUES ('x' , '$operador' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '1' , '$precio_unitario' , '$precio_unitario' , '$proveedor' , '$operador' , '$gtin')";
mysql_query($sql);

}
 include ("mostrar_detalle.php");

			break;
				}




case "BUSCAR":
				{
$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];

include("refrescar1.php");


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
 
  


