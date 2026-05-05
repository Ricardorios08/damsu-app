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
.Estilo18 {font-size: 12px}
.Estilo22 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo23 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
}
</style>
</head>


<body   onload="AplicarCebra()">
<table width="850" border="0" cellpadding="0">
  <tr>
    <td colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE MONODROGAS EN EXISTENCIAS COIR. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
   <tr bgcolor="#B8B8B8">
    <td width="247"><div align="center" class="Estilo18"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></strong></div></td>
    <td width="277"><div align="center" class="Estilo18"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">COD BARRA </font></strong></div></td>
    <td width="276"><div align="center" class="Estilo18"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">DROGA</font></strong></div></td>
    <td width="40"><div align="center" class="Estilo18"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">EXI.</font></strong></div></td>
  </tr>
</table>
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
<table width="850" border="1" cellpadding="0" cellspacing="0"  class="TablaCebra">


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

  $sql1="select sum(cantidad) as existente from tr_ventas_detalle where cod_mercaderia = $cod_barra  and recibido_coir = 1 and preparado_coir = 0";			  
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

?>

  <?php 
 }


?>  <tr bgcolor="#FFFFFF">

    <td width="122" bgcolor="#FFFFFF"><div align="center" class="Estilo22"><?php print("$cod_barra");?></div>      <div align="center"></div></td>
    <td width="356" bgcolor="#FFFFFF"><span class="Estilo22"><?php print("$nombre_comercial");?> </span>      <div align="left" class="Estilo22"></div>      
      <span class="Estilo22"> <?php print("$droga");?>(<?php print("$cod_droga");?>)</span></td>
    <td width="251" bgcolor="#FFFFFF"><div align="left" class="Estilo22"><?php print("$presentacion");?>  </div></td>
    <td width="69" bgcolor="#AAE3FF"><div align="left" class="Estilo22"></div>
      <div align="center" class="Estilo23"><?php print("$bande");?></div></td>
    <td width="40"><div align="center" class="Estilo22"><a href="../consultas/informes_coir/existencia.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?> "><img src="../../../imagenes/office/069.ico" alt="Modificar" border = "0"></a></div></td>
    <!-- <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/stock/stock.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?>&&opciones=unidades"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="../consultas/stock/stock.php?troquel=<?php print("$troquel");?>&&cod_barra=<?php print("$cod_barra");?>&&opciones=valor"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="modificar_mercaderia.php?cod_barra=<?php print("$cod_barra");?>"><img src="../../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td> -->
</tr>
  <?php 


$result->MoveNext();
	}

?>
</table>
