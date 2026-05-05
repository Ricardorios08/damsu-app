    <style type="text/css">
<!--
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo7 {font-size: 12px}
.Estilo9 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo13 {color: #000000}
.Estilo86 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
      </style>

<?php global $band;


include("../../../conexiones/config_pro.php");

$id = $_REQUEST['id'];


$sql1 = "SELECT * FROM `tr_compras1_encab_temp` where operador = '$id' ";
$result1 = $db->Execute($sql1);
$nro_factura=strtoupper($result1->fields["nro_factura"]);
$nro_proveedor=strtoupper($result1->fields["nro_proveedor"]);

$porcentaje_boni=strtoupper($result1->fields["bonificacion"]);
$porcentaje_dto=strtoupper($result1->fields["descuento"]);

$fecha=strtoupper($result1->fields["fecha"]);

$sql1="select * from pacientes where documento like '$nro_proveedor'";
$result1 = $db->Execute($sql1);
$apellido=strtoupper($result1->fields["apellido"]);
$nombre=strtoupper($result1->fields["nombre"]);
$denominacion=$apellido." ".$nombre;





$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);

$fecha = $dia."/".$mes."/".$anio;



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<FORM name="form" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

<table width="800" border="0">
  <tr bgcolor="#FFFFFF">
    <td height="37" colspan="2" bgcolor="#CCCCCC"><div align="center"><A HREF="actualizar_stock.php?id=<?php print("$id");?>"><IMG SRC="../../../imagenes/botones/stock.png" alt="Imprimir" border = "0"></A></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="37" colspan="2"><div align="center">TRAZABILIDAD COIR</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">INFORME DE ENTREGA . Emitido el <?php echo $hoy=date("d/m/Y");?></font></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2"><HR noshade></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="62%"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Paciente</font><font color="#000000"><span class="Estilo9">: </span></font> <span class="Estilo9"><span class="Estilo13"><?php echo $denominacion;?></span></span></div></td>
    <td width="38%"><div align="center"></div>      
    <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fecha: </font><span class="Estilo6"><font color="#000000" size="2"><?php echo $fecha;?></font></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domicilio: </font> <span class="Estilo86"><?php echo $direccion ;?></span><span class="Estilo9"> - <font color="#000000">Telefono: </font><span class="Estilo13"><?php echo $cod_area;?> - <?php echo $telefono;?></span><font color="#000000">: </font></span></td>
    <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></font> </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><div align="center"></div>      
      <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email: </font> <font size="3"><span class="Estilo13"><?php echo $email;?></span></font><font color="#000000" size="2">
      </font></div>      <div align="center">
      </div></td>
    <td><div align="center"><font color="#000000" size="2">
          </font></div>      <div align="right"></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<table width="800" border="0">
  <tr bgcolor="#FFFFFF">
    <td scope="col"><div align="center" class="Estilo26"><font size="2" face="Arial, Helvetica, sans-serif">
      <?php include("../../../conexiones/config_pro.php");
$nro_factura;
if ($operador != ""){
echo $sql = "SELECT * FROM `tr_compras1_deta_temp`  WHERE  operador = '$id'";
}

$result = $db->Execute($sql);





?>
  
     Cod. Barra </font></div></td>
    <td scope="col"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">GTIN</font></div></td>
    <td scope="col"><div align="center"><span class="Estilo26"><font size="2" face="Arial, Helvetica, sans-serif">Descripcion</font></span></div></td>
    <td width="10%" scope="col"><div align="center" class="Estilo28"><font size="2" face="Arial, Helvetica, sans-serif">Lote</font></div></td>
    <td width="10%" scope="col"><div align="center" class="Estilo28"><font size="2" face="Arial, Helvetica, sans-serif"> Vencimiento</font></div></td>
    <td width="9%" scope="col"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Total</font></div></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td height="20" colspan="6" scope="col"><hr noshade></td>
  </tr><?php 

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
$cantidad=strtoupper($result->fields["cantidad"]);
$lote=strtoupper($result->fields["lote"]);
$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$vto_lote= $mes_lote." - ".$anio_lote;
$precio_unitario=strtoupper($result->fields["precio_unitario"]);
$total=strtoupper($result->fields["total"]);
$cod_detalle=strtoupper($result->fields["cod_detalle"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);

$gtin=strtoupper($result->fields["gtin"]);

$cont = $cont + 1;


$sql2 = "SELECT * FROM `monodrogas`  WHERE  `troquel` = $cod_mercaderia";
$result2 = $db->Execute($sql2);
$descripcion=strtoupper($result2->fields["nombre_comercial"]);
$presentacion=strtoupper($result2->fields["presentacion"]);



	        $total1 = $total1 + $precio_unitario;


?>
  <tr bgcolor="#FFFFFF">
    <td width="15%" height="20" scope="col"><div align="left" class="Estilo6 Estilo7"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo28"><?php echo $cod_mercaderia;?></span></font></div></td>
    <td width="17%" scope="col"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo28"><?php echo $gtin;?></span></font></td>
    <td width="26%" scope="col"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo28"><?php echo $descripcion;?></span></font></td>
    <td scope="col"><div align="center" class="Estilo9"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo26"><?php echo $lote;?></span></font></div></td>
	    <td scope="col"><div align="center" class="Estilo9"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo28"><?php echo $vto_lote;?></span></font></div></td>
		    <td scope="col"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo28"><?php echo number_format($total,2);?></span></font></div></td>
  </tr>
<?php 


	       
									

	 $result->MoveNext();
				}

?>

<tr bgcolor="#FFFFFF">
  <td height="21" colspan="6" scope="col"><hr noshade></td>
  </tr>
<tr bgcolor="#E6E6E6">
  <td height="21" colspan="3" bgcolor="#FFFFFF" scope="col"><div align="right"><span class="Estilo11">Cantidad de Mercaderia Ingresada </span></div></td>
  <td bgcolor="#FFFFFF" scope="col"><div align="center"><span class="Estilo6 Estilo7 Estilo28"><strong><?php echo $cont;?>
  </strong></span></div></td>
  <td bgcolor="#FFFFFF" scope="col">&nbsp;</td>
  <td bgcolor="#FFFFFF" scope="col"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo28"><?php echo number_format($total1,2);?></span></font></div></td>
</tr>
</table>

 <A HREF="actualizar_stock.php?id=<?php print("$id");?>"></A> 

