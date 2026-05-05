<?php 
global $buscador_rapido;

$cod_proveedor=$_POST["cod_proveedor"];

$troquel=$_REQUEST["troquel"];

$cod_barra=$_REQUEST["cod_barra"];

$hoy = date("d/m/Y");

include("../../../conexiones/config_pro.php");


$sql1="select * from tr_existencias where gtin = '$gtin'";
$result1 = $db->Execute($sql1);

$cod_barra=strtoupper($result1->fields["cod_mercaderia"]);


$cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);

$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$fecha_ultimo_mov=strtoupper($result1->fields["fecha_ultimo_mov"]);

$gtin=strtoupper($result1->fields["gtin"]);
$nro_serie=strtoupper($result1->fields["nro_serie"]);


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
}



if ($cod_barra == ""){
	$leyenda = "GTIN INEXISTENTE EN BASE DE DATOS";
}
else{
	
 $sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);





?>
<table width="800" border="0" cellspacing="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="12" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE EXISTENCIA PROGRAMA. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">


    <td colspan="3" bgcolor="#EDEDED"><div align="left"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">PRODUCTO</font><font color="#000000">: <font size="2"><?php print("$nombre_comercial");?> - <?php print("$presentacion");?></font></font></div></td>
    <td colspan="4" bgcolor="#EDEDED"><div align="center"><font size="2">Troq: <?php print("$troquel");?></font></div></td>
    <td colspan="3" bgcolor="#EDEDED"><div align="center"><font size="2">C.Barra: <?php print("$cod_barra");?></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">
    <td colspan="10" bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS">GTIN SELECCIONADO: </font></div></td>
  </tr>
  

  <tr bordercolor="#FFFFFF" bgcolor="#000099">
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$gtin");?></font></div>
        <div align="center"></div>
    <div align="center"></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$lote");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$vto_lote");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$nro_serie");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$cantidad_ingresada");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$cantidad_salida");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$cantidad_existente");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$estado");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$precio_unitario");?></font></div></td>
    <td bordercolor="#FFFFCC" bgcolor="#FFCC99"><div align="center"><font size="2"><?php print("$fecha");?></font></div></td>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">
    <td colspan="10" bordercolor="#FFFFCC" bgcolor="#FFFFFF">&nbsp;</td>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

    <td width="31%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">GTIN</font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td width="14%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="9%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">VTO LOTE</font></div></td>
    <td width="14%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">SERIE</font></div></td>
    <td width="3%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">E</font></div></td>
<td width="3%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">S</font></div></td>
<td width="4%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="7%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
<td width="8%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>

  <td width="7%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ULT-MOV</font></div></td>

  <?php


 $sql1="select * from tr_existencias where cod_mercaderia = $cod_barra";
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
$nro_serie=strtoupper($result1->fields["nro_serie"]);


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


IF ($cantidad_existente == 0){
		 	
?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
      <td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$gtin");?></font></div>        <div align="center"></div>        <div align="center"></div></td>
    <td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$lote");?></font></div></td>
<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$vto_lote");?></font></div></td>

	<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$nro_serie");?></font></div></td>
	<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$cantidad_ingresada");?></font></div></td>
		<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$cantidad_salida");?></font></div></td>
	<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$cantidad_existente");?></font></div></td>
<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$estado");?></font></div></td>
<td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$precio_unitario");?></font></div></td>

 
  <td bgcolor="#FFFF99"><div align="center"><font size="2"><?php print("$fecha");?></font></div></td>
  </tr>

<?php }else{?>

   <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
  
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$gtin");?></font></div>      <div align="center"></div>      <div align="center"></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$lote");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$vto_lote");?></font></div></td>

	<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$nro_serie");?></font></div></td>
	<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$cantidad_ingresada");?></font></div></td>
		<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$cantidad_salida");?></font></div></td>
	<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$cantidad_existente");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$estado");?></font></div></td>
<td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$precio_unitario");?></font></div></td>

 
  <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$fecha");?></font></div></td>
  </tr>
  

 
<?php }

$result1->MoveNext();
	}
  }
?>

<tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <td colspan="10" bgcolor="#EDEDED">&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <td colspan="6" bgcolor="#EDEDED"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">CANTIDAD EXISTENTE </font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_saldo");?></font></div></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
  </tr>
</table>


<?php 
global $buscador_rapido;
$total_saldo = "";
$cod_proveedor=$_POST["cod_proveedor"];

$troquel=$cod_droga;



$hoy = date("d/m/Y");

include("../../../conexiones/config_pro.php");




?>
<table width="800" border="0" cellspacing="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="13" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="13" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="13" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE EXISTENCIA UNICO. </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">


    <td width="9%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">CODIGO</font></div></td>
    <td width="25%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRODUCTO</font></div></td>

    <td width="12%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">GTIN</font></div></td>
    <td width="13%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">VTO LOTE</font></div></td>
<td width="4%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">E</font></div></td>
<td width="3%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">S</font></div></td>
<td width="4%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="5%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
<td width="6%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>

  <td width="8%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ULT-MOV</font></div></td>
  </tr>
<?php 


$sql="select * from monodrogas where troquel = $troquel";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);

$sql1="select * from existencias where cod_mercaderia = $troquel";
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
  
    <td bgcolor="#EDEDED"><div align="center"><font size="2"><?php print("$troquel");?></font></div></td>
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
  </tr>



  
  
  <?php 


$result1->MoveNext();
	}
  }
?>

<tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
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
    <td colspan="7" bgcolor="#EDEDED"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">CANTIDAD EXISTENTE </font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_saldo");?></font></div></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#EDEDED">&nbsp;</td>
    <td bgcolor="#EDEDED">&nbsp;</td>
  </tr>
</table>


<?php }

