<?php 
global $buscador_rapido;

$cod_proveedor=$_POST["cod_proveedor"];

$troquel=$_REQUEST["troquel"];

 $cod_barra=$_REQUEST["cod_barra"];

$hoy = date("d/m/Y");

include("../../../../conexiones/config_pro.php");



 $sql="select * from monodrogas where troquel = $troquel and cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);





?>
<table width="800" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td height="21" colspan="13" valign="top" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE EXISTENCIA PROGRAMA. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">


    <td height="20" colspan="4" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRODUCTO: <?php print("$nombre_comercial");?> - <?php print("$presentacion");?></font></div></td>
    <td colspan="3" bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Troq: <?php print("$troquel");?></font></div></td>
    <td colspan="6" valign="top" bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">C.Barra: <?php print("$cod_barra");?></font></div></td>
  </tr>

  <tr bordercolor="#FFFFFF" bgcolor="#000099">
    <td colspan="2" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">N°</font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td colspan="2" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">GTIN</font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td width="100" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="60" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">VTO LOTE</font></div></td>
    <td width="22" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">E</font></div></td>
<td width="17" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">S</font></div></td>
<td width="44" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="53" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
<td width="49" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>

  <td width="30" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ULT-MOV</font></div></td>
  <td width="37" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PROV</font></div></td>
  <?php


  $sql1="select * from tr_existencias where cod_mercaderia like '$cod_barra' and cantidad_ingresada - cantidad_salida > 0";
$result1 = $db->Execute($sql1);


  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);

$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$fecha_ultimo_mov=strtoupper($result1->fields["fecha_ultimo_mov"]);
 $proveedor=strtoupper($result1->fields["proveedor"]);
$gtin=strtoupper($result1->fields["gtin"]);

  $sql10="select * from tr_stock where gtin like '$gtin' and cod_movimiento = 6";
$result10 = $db->Execute($sql10);
$nro_serie=strtoupper($result1->fields["nro_serie"]);

$cont = $cont + 1;
$dia = substr($fecha_ultimo_mov,8,2);
$mes= substr($fecha_ultimo_mov,5,2);
$anio = substr($fecha_ultimo_mov,0,4);

$fecha = $dia."/".$mes."/".$anio;


$vto_lote = $mes_lote." - ".$anio_lote;



$cantidad_existente = $cantidad_ingresada - $cantidad_salida;
	
$mes = $mes_lote;
$anio = $anio_lote;

if ($anio == ""){
	$anio = $anio_actual;
}
else
		  {
$estado = "-";
		  }




$total_saldo = $total_saldo + $cantidad_existente;
if ($anio < $anio_actual){
$estado = "VENCIDO";
}
else{

if ($anio > $anio_actual){
$estado = "-";}
else{

if ($mes < $mes_actual){
$estado = "VENCIDO";
}
else{
	$estado ="-";
}
}


   $sql10="select * from proveedores where cod_proveedor like '$proveedor'";
$result10 = $db->Execute($sql10);
 $denominacion=strtoupper($result10->fields["denominacion"]);
$denominacion = substr($denominacion,0,30);


 /* $sql10="select * from inventario where gtin like '$gtin'";
$result10 = $db->Execute($sql10);
$gt=strtoupper($result10->fields["gtin"]);

*/

IF ($cantidad_existente == 0){
		 	
?>
  <tr bgcolor="#FFFFCC">

    <td width="17" bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></div>        
        <div align="center"></div>        <div align="center"></div></td>

      <td width="19" bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_factura");?></font></div>        
        <div align="center"></div>        <div align="center"></div></td>
      <td width="172" bgcolor="#FFFF99"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$gtin");?></font></td>
    <td width="50" bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$lote");?></font></div></td>
<td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$vto_lote");?></font></div></td>

	<td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_serie");?></font></div></td>
	<td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_salida");?></font></div></td>
	<td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_existente");?></font></div></td>
<td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
<td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio_unitario");?></font></div></td>

 
  <!-- <td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$fecha");?> <?php print("$denominacion");?></font></div></td> -->
   <td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> - </font></div></td>
   <td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$proveedor");?></font></div></td>
   <td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $denominacion;?></font></div></td>
  </tr>

<?php }else{?>

   <tr bgcolor="#FFFFCC">
      <td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></div>        
        <div align="center"></div>        <div align="center"></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_factura");?></font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$gtin");?> </font></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$lote");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$vto_lote");?></font></div></td>

	<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_serie");?></font></div></td>
	<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_salida");?></font></div></td>
	<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_existente");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio_unitario");?></font></div></td>


  <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$proveedor");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?></font></div></td>
  </tr>
  

 
<?php }

$result1->MoveNext();
	}
  }
?>

<tr bgcolor="#FFFFCC">
    <td colspan="13" bgcolor="#EDEDED">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFCC">
    <td height="21" colspan="6" bgcolor="#EDEDED"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">CANTIDAD EXISTENTE </font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_saldo");?></font></div></td>
    <td colspan="6" valign="top" bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>


<?php 
global $buscador_rapido;
$total_saldo = "";
$cod_proveedor=$_POST["cod_proveedor"];

$troquel=$cod_droga;



$hoy = date("d/m/Y");

include("../../../../conexiones/config_pro.php");




?>
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td height="42" colspan="12">&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td height="20" colspan="12" valign="top" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE EXISTENCIA UNICO. </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">


    <td width="51" height="26" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">CODIGO</font></div></td>
    <td width="125" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRODUCTO</font></div></td>

    <td width="54" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">GTIN</font></div></td>
    <td width="60" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="50" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">VTO LOTE</font></div></td>
<td width="18" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">E</font></div></td>
<td width="21" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">S</font></div></td>
<td width="31" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="37" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
<td width="36" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>

  <td width="26" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ULT-MOV</font></div></td>

    <td width="80" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PROVEEDOR</font></div></td>
  </tr>
<?php 


$sql="select * from monodrogas where troquel = $troquel ";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);

  $sql1="select * from existencias where cod_mercaderia = $troquel and cantidad_ingresada - cantidad_salida";
$result1 = $db->Execute($sql1);



  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


$cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);

$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$fecha_ultimo_mov=strtoupper($result1->fields["fecha_ultimo_mov"]);

$gtin=strtoupper($result1->fields["gtin"]);
$proveedor=strtoupper($result1->fields["proveedor"]);

$dia = substr($fecha_ultimo_mov,8,2);
$mes= substr($fecha_ultimo_mov,5,2);
$anio = substr($fecha_ultimo_mov,0,4);

$fecha = $dia."/".$mes."/".$anio;


$vto_lote = $mes_lote." - ".$anio_lote;



$cantidad_existente = $cantidad_ingresada - $cantidad_salida;
	
$mes = $mes_lote;
$anio = $anio_lote;

if ($anio == ""){
	$anio = $anio_actual;
}
else
		  {
$estado = "-";
		  }




$total_saldo = $total_saldo + $cantidad_existente;
if ($anio < $anio_actual){
$estado = "VENCIDO";
}
else{

if ($anio > $anio_actual){
$estado = "-";}
else{

if ($mes < $mes_actual){
$estado = "VENCIDO";
}
else{
	$estado ="-";
}
}



		 	
?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
  
    <td height="21" bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$troquel");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$nombre_comercial");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$gtin");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$lote");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$vto_lote");?></font></div></td>

	<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$cantidad_ingresada");?></font></div></td>
		<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$cantidad_salida");?></font></div></td>
	<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$cantidad_existente");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$estado");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$precio_unitario");?></font></div></td>

 
  <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$fecha");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$proveedor");?></font></div></td>
  </tr>



  
  
  <?php 


$result1->MoveNext();
	}
  }
?>

<tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <td height="21" bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <td height="21" colspan="7" bgcolor="#EDEDED"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">CANTIDAD EXISTENTE </font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_saldo");?></font></div></td>
    <td colspan="4" valign="top" bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
