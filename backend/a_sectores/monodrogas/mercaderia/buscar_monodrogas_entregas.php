<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;

$a = 'ENTREGADOS 2014.xls';
 header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");
 
 $sql1 = "SELECT * FROM `tr_ventas_detalle`  WHERE  fecha between '2014-01-01' and '2014-06-10' AND tipo_fact = 001 and cod_mercaderia > 100000 group by cod_mercaderia order by precio_unitario desc limit 15";
$result1 = $db->Execute($sql1);


?>
<table width="887" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="8" valign="top" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE LAS 15 MONODROGAS ENTREGADAS MAS CARAS DESDE ENERO A JUNIO DE 2014. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#999999">
    <td width="57"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COD BARRA </font></div></td>
   	
    <td width="59"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">TROQUEL</font></div></td>
    <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div>      <div align="center"></div></td>
    <td width="44"><div align="center"><font size="2" face="Trebuchet MS">GRUPO</font></div></td>
    <td width="44"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">PRECIO</font></div></td>
    <td width="64"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">ENTREGADOS</font></div></td>
    <td width="73"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>
    <td width="221"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">DROGA</font></div></td>
  </tr>


<?php 	

 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
 $cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$precio_actualizado=strtoupper($result1->fields["precio_unitario"]);

  $sql="select COUNT(cod_mercaderia) as cant from `tr_ventas_detalle` where cod_mercaderia = '$cod_mercaderia' AND  fecha between '2014-01-01' and '2014-06-10' AND tipo_fact = 001  and cod_mercaderia > 100000";
$result = $db->Execute($sql);
 $cant=strtoupper($result->fields["cant"]);


 $sql="select * from monodrogas where cod_barra = '$cod_mercaderia'";
$result = $db->Execute($sql);


 $cod_droga=strtoupper($result->fields["cod_droga"]);
$troquel=strtoupper($result->fields["troquel"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$grupo=strtoupper($result->fields["grupo"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
$frio=strtoupper($result->fields["frio"]);
$grupo=strtoupper($result->fields["grupo"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);

switch ($grupo){
	case "1":{$grupo = "COMUN";break;}
	case "2":{$grupo = "COMUN";break;}
	case "3":{$grupo = "MONOCLONAL";break;}
}


$sql1="select * from drogas where cod_droga = $cod_droga";			  
$result11 = $db->Execute($sql1);
$droga=$result11->fields["droga"];



$total = $cant * $precio_actualizado;

?>  <tr bordercolor="#FFFFFF" bgcolor="#999999">
  <td bgcolor="#EDEDED"><font size="1" face="Trebuchet MS"><?php print("$cod_barra");?></font></td>

    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$troquel");?></font></div></td>
    <td width="291" bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$nombre_comercial");?></font> - <font size="1" face="Trebuchet MS"><?php print("$presentacion");?></font></div>      <div align="center"></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$grupo");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="right"><font size="1" face="Trebuchet MS"><?php echo number_format($precio_actualizado,2);?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$cant");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="right"><font size="1" face="Trebuchet MS"><?php echo number_format($total,2);?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$droga");?></font></div></td>
    </tr>
  <?php 


$result1->MoveNext();
	}

?>
</table>
