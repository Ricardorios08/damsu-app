<html>
<head>
<script>
function AplicarCebra () {
  var tables =   document.getElementsByTagName("table");
  for (var i = 0; i < tables.length;   i++) {
  if (tables[i].className.match(/TablaCebra/))   {
  TablaCebra(tables[i]);
  }
}
}
function TablaCebra (table) {
  var current =   "impar";
  var trs = table.getElementsByTagName("tr");
  for (var i = 0; i   < trs.length; i++) {
  trs[i].className += " " + current;
  current =   current == "par" ? "impar" : "par";
  }
  }
</script>
<style>
	tr.impar {   background-color: #CCCCCC; }
	tr.par { background-color: #FFFFFF;   }
.Estilo16 {
	font-family: "Trebuchet MS";
	font-size: 9px;
}
.Estilo17 {font-size: 14px}
</style>
</head>


<body   onload="AplicarCebra()">
<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../../conexiones/config_usu.php");


$B = 1;
$unico=$_REQUEST["unico"];
$cod_mercaderia=$_REQUEST["cod_mercaderia"];

if ($unico == 1){
    $sql="select * from monodrogas where cod_barra = '$cod_mercaderia' order by cod_droga, nombre_comercial asc ";
}
else{
	  $sql="select * from monodrogas where cod_droga like '$cod_mercaderia' or  nombre_comercial like '$cod_mercaderia%' or troquel like '$cod_mercaderia%' or cod_barra like '$cod_mercaderia%' order by cod_droga, nombre_comercial asc ";
}

	$result = $db->Execute($sql);
?>
<table width="834" border="0" cellpadding="0" cellspacing="0"  class="TablaCebra">
  <tr>
    <td colspan="9" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE MONODROGAS. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td width="242">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">STOCK</font></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   	
    <td width="212" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div></td>
    <td colspan="3" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COD BARRA </font></div></td>
    <td bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"> DROGA</font></div>      <div align="center"></div></td>
    <td width="32" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">EXI.</font></div></td>
    <td width="39" bgcolor="#F0F0F0"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Unidades</font></td>
    <td width="32" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Valor</font></div></td>
    <td width="38" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MOD</font></div></td>
  </tr>


<?php 	

 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	$cod_dr = $cod_droga;
$cod_droga=strtoupper($result->fields["cod_droga"]);
$troquel=strtoupper($result->fields["troquel"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$grupo=strtoupper($result->fields["grupo"]);
$presentacion=strtoupper($result->fields["presentacion"]);
 $cod_laboratorio=strtoupper($result->fields["laboratorio"]);
$frio=strtoupper($result->fields["frio"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);


 $sql1="select * from drogas where cod_droga = $cod_droga";			  
$result1 = $db->Execute($sql1);
$frio=strtoupper($result1->fields["frio"]);
$droga=strtoupper($result1->fields["droga"]);

 $sql1="select * from laboratorios where cod_laboratorio = $cod_laboratorio";			  
$result1 = $db->Execute($sql1);
$laboratorio=$result1->fields["laboratorio"];


 $sql1="select * from tr_existencias where cod_mercaderia = $cod_barra";			  
$result1 = $db->Execute($sql1);


$cod_merca=strtoupper($result1->fields["cod_mercaderia"]);

 $sql1="select sum(cantidad_ingresada - cantidad_salida) as existente from tr_existencias where cod_mercaderia = $cod_barra";			  
$result1 = $db->Execute($sql1);
$existente=strtoupper($result1->fields["existente"]);


$cont = $cont + 1;

if ($cod_merca != ""){

 $bande = $existente;
}
else
	  {
$bande = "";
	  }


 if ($cod_dr != $cod_droga){

?><tr>
  <td colspan="9">&nbsp;</td>
  </tr>

  <?php 
 }


?>  <tr>

    <td bgcolor="#FFFFCC"><div align="left"><font face="Trebuchet MS"><span class="Estilo17"><?php print("$nombre_comercial");?></span></font></div></td>
    <td width="86" bgcolor="#FFFFCC"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$cod_barra");?></font></div></td>
    <td width="136" bgcolor="#FFFFCC"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$presentacion");?></font> <font size="1" face="Trebuchet MS"> (<?php print("$cod_laboratorio");?> <?php print("$laboratorio");?>)</font></div></td>
    <td width="17" bgcolor="#FFFFCC"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$bande");?></font></div></td>
    <td bgcolor="#FFFFCC"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$droga");?> (<?php print("$cod_droga");?></font><span class="Estilo16">)</span></div>
    <div align="left"></div>    </td>
    <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/informes/existencia.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?> "><img src="../../../imagenes/office/069.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/stock/stock.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?>&&opciones=unidades"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/stock/stock.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?>&&opciones=valor"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="modificar_mercaderia.php?cod_barra=<?php print("$cod_barra");?>"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
</tr>
  <?php 


$result->MoveNext();
	}

?>
</table>
