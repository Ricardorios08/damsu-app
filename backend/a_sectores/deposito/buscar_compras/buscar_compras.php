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
    $sql="select * from tr_compras_encab";
}
else{
	 sql="select * from tr_compras_encab";
}

	$result = $db->Execute($sql);
?>
<table width="834" border="1" cellpadding="0" cellspacing="0"  class="TablaCebra">
  <tr>
    <td colspan="10" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE MONODROGAS . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">STOCK</font></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   	
    <td width="63"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COD BARRA </font></div></td>
    <td colspan="3"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div></td>
    <td colspan="2"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"> DROGA</font></div>      <div align="center"></div></td>
    <td width="32"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">EXI.</font></div></td>
    <td width="32"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Unidades</font></td>
    <td width="32"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Valor</font></div></td>
    <td width="36"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MOD</font></div></td>
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

$cont = $cont + 1;

if ($cod_merca != ""){

 $bande = "SI";
}
else
	  {
$bande = "";
	  }


 if ($cod_dr != $cod_droga){

?><tr>
  <td colspan="10">&nbsp;</td>
  </tr>

  <?php 
 }


?>  <tr>

    <td><div align="center"><font size="1" face="Trebuchet MS"><?php print("$cod_barra");?></font></div></td>
    <td width="205"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$nombre_comercial");?></font></div></td>
    <td width="172"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$presentacion");?></font> <font size="1" face="Trebuchet MS"> (<?php print("$cod_laboratorio");?> <?php print("$laboratorio");?>)</font></div></td>
    <td width="17"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$bande");?></font></div></td>
    <td width="17"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$cod_droga");?></font></div>
    <div align="left"></div></td>
    <td width="206"><font size="1" face="Trebuchet MS"><?php print("$droga");?></font></td>
    <td><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/informes/existencia.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?> "><img src="../../../imagenes/office/069.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/stock/stock.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?>&&opciones=unidades"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/stock/stock.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?>&&opciones=valor"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="1" face="Trebuchet MS"><a href="modificar_mercaderia.php?cod_barra=<?php print("$cod_barra");?>"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
</tr>
  <?php 


$result->MoveNext();
	}

?>
</table>
