<script>
function on_load()
{
document.getElementById("nro_proveedor").focus();
}

function enter()
{
document.getElementById("nro_proveedor").focus();
}


function verif_caracter(obj,evt)

{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	
	{
		switch(obj.id)
		{
				case "operador":
				document.getElementById("nro_proveedor").focus();
				break;
				case "nro_proveedor":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				
				
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("nro_factura").focus();
				break;
						
				
				case "nro_factura":
				document.getElementById("porcentaje_boni1").focus();
				break;

				case "porcentaje_boni1":
				document.getElementById("porcentaje_boni").focus();
				break;

				case "porcentaje_boni":
				document.getElementById("porcentaje_dto").focus();
				break;

				case "cod_mercaderia":
				document.getElementById("porcentaje_dto").focus();
				break;
						

				
				
		}
		return false;
	}
	return true;
}


function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, top = 35");
}


</script>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php 
$id = $_REQUEST['id'];
$usuario = $_REQUEST['id'];

include("../../../conexiones/config_pro.php");
include ("../../../conexiones/usuario_compra.php");


$nro_factura= $_REQUEST['nro_factura'];
$comprobante = $_REQUEST['comprobante'];

?>
<body onload = "on_load ()">
<FORM ACTION="borrar_comprobante.php" METHOD = "POST" enctype="multipart/form-data" name="form">
<table width="800" border="0" cellspacing="0">
  <tr bgcolor="#000099">
    <td colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font color="#000000">BORRAR INGRESO </font> </font></div></td>
  </tr>
  <tr>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Comprobante a Eliminar</font> </div></td>
    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Trebuchet MS">  <?php echo $nro_factura;?>  </font></td>
  </tr>
  <tr>
    <td width="50%" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Contrase&ntilde;a de Seguridad: </font></div></td>
    <td width="50%" bgcolor="#FFFFFF"><font face="Trebuchet MS">&nbsp;
      </font><font color="#000000" size="2" face="Trebuchet MS">
      <input type = "text" name = "contra" id="contra" size = "15" onKeyPress="return verif_caracter(this,event)">
</font></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center"><font face="Trebuchet MS"><font color="#000000" size="2">
      <input name="Alta" type="submit" value="BORRAR COMPROBANTE" id ="Alta" size = "10" onClick = "enter()" >
	   <input name="nro_factura" type="hidden" value="<?php echo $nro_factura;?>">
    </font></font></div></td>
    </tr>
  

</table>
</table>
</form>

 <table width="800" border="1" cellspacing="0">
 <tr bgcolor="#B8B8B8">
	<td width="65"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">CANT</font></div></td>
	<td width="127"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">COD DROGA</font></div></td>
	<td width="178"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">DROGA</font></div></td>
	<td width="54"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
	 <td width="30"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">VTO</font></div></td>
	 <td width="99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">COD RENGLON</font></div></td>
	<td width="92"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">UNIT</font></div></td>
	<td width="119"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>
	
 </tr>


<?PHP
  $sql = "SELECT * FROM compras_encabezado where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=001;
$nro_factura=$result->fields["nro_factura"];
$comprobante=$result->fields["comprobante"];

$fecha=$result->fields["fecha"];
 
$nro_fact = str_pad($nro_factura, 10, "0", STR_PAD_LEFT);

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $dia."/".$mes."/".$anio;

$nro_receta=$result->fields["nro_receta"];
 $nro_proveedor=$result->fields["nro_proveedor"];
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
 

 $total=$result->fields["total"];


$tipo_comprobante = "COMPRAS";

 $sql1="select * from proveedores where cod_proveedor = $nro_proveedor";
$result1 = $db->Execute($sql1);
$denominacion=strtoupper($result1->fields["denominacion"]);

echo $sql3 = "SELECT * FROM `compras_detalle`  WHERE  nro_factura = $nro_factura order by  cod_detalle desc";
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


$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];


$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);

echo $sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
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

$precio_unitario = str_pad($precio_unitario, 12, " ", STR_PAD_LEFT); 


 $tot_prod = $precio_unitario * $cantidad;

//$pdf->SetX(160);
 IF ($tot_prod > 0){
	 $tot_prod = number_format($tot_prod,2);
}

?>
 <tr>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $cod_droga;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $droga;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $lote1;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $vto_lote;?>
    </font>
    <div align="center"></div></td>
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $cod_detalle;?>
        </font>
    </div>
    <div align="center"></div></td>
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $precio_unitario;?>
      </font>
    </div>
    <div align="center"></div></td>
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $tot_prod;?>
      </font>
    </div>
    <div align="center"></div></td>
 </tr>


<?PHP

 $result3->MoveNext();

				}
 

 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0; 

?></table>

</body>


</html>
