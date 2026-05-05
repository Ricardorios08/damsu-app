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
<table width="943" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="11" valign="top" bgcolor="#FFFFFF"><div align="center"></div></td>
  </tr>
  <tr bgcolor="#000099">


    <td height="21" colspan="3" valign="top" bgcolor="#EDEDED"><div align="left"><font face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="2">PRODUCTO: </font></strong></font></div></td>
    <td colspan="8" valign="top" bgcolor="#EDEDED"><div align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#000000"><?php print("$nombre_comercial");?> - <?php print("$presentacion");?></font></strong></font></div></td>
  </tr>
  <tr bgcolor="#000099">
    <td height="21" colspan="3" valign="top" bgcolor="#EDEDED"><strong><font size="2" face="Arial, Helvetica, sans-serif">TROQUEL:</font></strong></td>
    <td colspan="8" valign="top" bgcolor="#EDEDED"><strong><font size="3" face="Arial, Helvetica, sans-serif"><?php print("$troquel");?></font></strong></td>
  </tr>
  <tr bgcolor="#000099">
    <td height="21" colspan="3" valign="top" bgcolor="#EDEDED"><strong><font size="2" face="Arial, Helvetica, sans-serif">CODIGO BARRA: </font></strong></td>
    <td colspan="8" valign="top" bgcolor="#EDEDED"><strong><font size="3" face="Arial, Helvetica, sans-serif"><?php print("$cod_barra");?></font></strong></td>
  </tr>

  <tr bordercolor="#FFFFFF" bgcolor="#0066CC">
    <td colspan="2"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">N°</font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td colspan="2"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">GTIN</font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td width="45"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">E</font></div></td>
<td width="28"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">S</font></div></td>
<td colspan="2"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="78"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>
<td width="64"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ULT. MOV</font></div></td>
  <td width="190"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PROV</font></div></td>
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
  <tr bgcolor="#FFFFFF">

    <td width="40"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></div>        
        <div align="center"></div>        <div align="center"></div></td>

      <td width="44"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_factura");?></font></div>        
        <div align="center"></div>        <div align="center"></div></td>
      <td colspan="2">        <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$gtin");?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_salida");?></font></div></td>
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_existente");?></font></div></td>
<td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio_unitario");?></font></div></td>

 
  <!-- <td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$fecha");?> <?php print("$denominacion");?></font></div></td> -->
   <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> - </font></div></td>
   <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $denominacion;?> (<?php print("$proveedor");?>)</font></div></td>
  </tr>

<?php }else{?>

   <tr bgcolor="#FFFFFF">
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></div>        
        <div align="center"></div>        <div align="center"></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_factura");?></font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$gtin");?> </font> </div>      <div align="center"></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_salida");?></font></div></td>
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_existente");?></font></div></td>
<td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio_unitario");?></font></div></td>


  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha");?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?> (<?php print("$proveedor");?>) </font></div></td>
  </tr>
  

 
<?php }

$result1->MoveNext();
	}
  }
?>
  <tr bgcolor="#0066CC">
    <td colspan="4"><div align="right"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">CANTIDAD EXISTENTE </font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_saldo");?></font></div></td>
    <td colspan="6" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr>
    <td height="3"></td>
    <td></td>
    <td width="75"></td>
    <td width="244"></td>
    <td></td>
    <td></td>
    <td width="55"></td>
    <td width="56"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>


<?php 
global $buscador_rapido;
$total_saldo = "";
$cod_proveedor=$_POST["cod_proveedor"];

$troquel=$cod_droga;



$hoy = date("d/m/Y");

include("../../../../conexiones/config_pro.php");

  $sql1="select sum(cantidad_ingresada - cantidad_salida) as tot  from existencias where cod_mercaderia = $troquel";
$result1 = $db->Execute($sql1);

$tot=$result1->fields["tot"];

if ($tot > 0){

?>
<table width="942" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC">
    <td colspan="10">&nbsp;</td>
  </tr>
  <tr bgcolor="#993300">
    <td colspan="10" valign="top" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE EXISTENCIA UNICO. </font></div></td>
  </tr>
  <tr bgcolor="#0066CC">


    <td width="80"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">CODIGO</font></div></td>
    <td width="194"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PRODUCTO</font></div></td>

    <td width="84"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">GTIN</font></div></td>
    <td width="29"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">E</font></div></td>
<td width="33"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">S</font></div></td>
<td width="69"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="83"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
<td width="77"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>

  <td width="58"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">MOV</font></div></td>

    <td width="123"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">PROVEEDOR</font></div></td>
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
  <tr bgcolor="#FFFFCC">
  
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$troquel");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_comercial");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$gtin");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_ingresada");?></font></div></td>
		<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_salida");?></font></div></td>
	<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_existente");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio_unitario");?></font></div></td>

 
  <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$proveedor");?></font></div></td>
  </tr>



  
  
  <?php 


$result1->MoveNext();
	}
  }
?>

<tr bgcolor="#FFFFCC">
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr bgcolor="#0066CC">
    <td colspan="5"><div align="right"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">CANTIDAD EXISTENTE </font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_saldo");?></font></div></td>
    <td colspan="4" valign="top"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>

<?php
}?>

