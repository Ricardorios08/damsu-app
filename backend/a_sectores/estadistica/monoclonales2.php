<style type="text/css">
<!--
.Estilo77 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <tr>
    <td colspan="7" bgcolor="#B8B8B8"><div align="center"><span class="Estilo14">PRODUCTOS ENTREGADOS </span></div></td>
  </tr>
   <tr>
   <td width="57"><div align="center" class="Estilo77">
     <div align="center">Fecha</div>
   </div></td>
   <td width="227"><div align="center" class="Estilo77">
     <div align="center">Nombre Comercial </div>
   </div></td>
   <td width="237"><div align="center"><span class="Estilo77">DROGA</span></div></td>
   <td width="55"><div align="center"><span class="Estilo77">GRUPO 1 </span></div></td>
   <td width="54"><div align="center"><span class="Estilo77">GRUPO 2 </span></div></td>
   <td width="80"><div align="center"><span class="Estilo77">MONOCLONAL</span></div></td>
   <td width="74"><div align="center"><span class="Estilo77">PROV./PAC.</span></div></td>
  </tr>

<?PHP 


include ("../../conexiones/config_pro.php");
include ("../../funciones/funciones.php");

$leyenda = "PROXIMAMENTE";
include ("../../alertas/campo_informacion.php");
EXIT;


 $sql="select * from tr_stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' ORDER BY fecha, cod_mercaderia";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_mercaderia=$result->fields["cod_mercaderia"];

 $sql2 = "select * from monodrogas where cod_barra = '$cod_mercaderia'";
$result2 = $db->Execute($sql2);

 $grupo=$result2->fields["grupo"];
 $nombre_comercial=$result2->fields["nombre_comercial"];


$documento=$result->fields["documento"];
$cod_droga=$result->fields["cod_droga"];
$cantidad=$result->fields["cantidad"];
$precio_unitario=$result->fields["precio_unitario"];
$drogas=$result->fields["drogas"];


$nombre_paciente=$result->fields["nombre_paciente"];

$estado=$result->fields["estado"];
$fecha1=$result->fields["fecha"];
$fecha=fecha_argentina(strtoupper($result->fields["fecha"]));



switch ($grupo){
case "1":{$grupo1     = $precio_unitario;$grupo2 = "";$monoclonal = "";$to_grupo1  = $to_grupo1   + $precio_unitario;break;}
case "2":{$grupo2     = $precio_unitario;$grupo1 = "";$monoclonal = "";$to_grupo2  = $to_grupo2   + $precio_unitario;break;}
case "3":{$monoclonal = $precio_unitario;$grupo2 = "";$grupo1     = "";$to_monoclonal = $to_monoclonal + $precio_unitario;break;}
}


?>

 <tr>
    <td><div align="center" class="Estilo77"><?PHP ECHO $fecha;?></div></td>
    <td><span class="Estilo77"><?PHP ECHO $nombre_comercial;?></span></td>
    <td><span class="Estilo77"><?PHP ECHO $drogas;?></span></td>
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $grupo1;?></span></div></td>
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $grupo2;?></span></div></td>
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $monoclonal;?></span></div></td>
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $documento;?></span></div></td>
 </tr>
 
 
 
<?php 


	$result->MoveNext();
	}

$todo = $to_grupo1 + $to_grupo2 + $to_monoclonal;
	  ?>

	  <tr>
   <td bgcolor="#999999">&nbsp;</td>
   <td bgcolor="#999999">&nbsp;</td>
   <td bgcolor="#999999">&nbsp;</td>
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $to_grupo1;?></span></div></td>
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $to_grupo2;?></span></div></td>
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $to_monoclonal;?></span></div></td>
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $todo;?></span></div></td>
 </tr>

</table>
</form>
