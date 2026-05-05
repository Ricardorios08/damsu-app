<style type="text/css">
<!--
.Estilo77 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo82 {
	font-size: 24px;
	font-family: "Trebuchet MS";
	color: #0000FF;
}
-->
</style>


<?PHP 


include ("../../conexiones/config_pro.php");
include ("../../funciones/funciones.php");

$dia_d = $_REQUEST['dia'];
$mes_d = $_REQUEST['mes'];
$anio_d = $_REQUEST['anio'];

$dia_h = $_REQUEST['dia2'];
$mes_h = $_REQUEST['mes2'];
$anio_h = $_REQUEST['anio2'];


$fecha_d = $anio_d."-".$mes_d."-".$dia_d;
$fecha_h = $anio_h."-".$mes_h."-".$dia_h;

$laboratorio=$_POST["laboratorios"];
	for ($i=0;$i<count($laboratorio);$i++)    
	{     
	$laboratorios = $laboratorio[$i];  
		
		}

 $sql2 = "select * from proveedores where cod_proveedor = '$laboratorios'";
$result2 = $db->Execute($sql2);

 $denominacion=$result2->fields["denominacion"];


?> 
<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <tr>
    <td colspan="7" bgcolor="#B8B8B8"><div align="center"><span class="Estilo14">CONSUMO POR PROVEEDOR</span></div></td>
  </tr>
  <tr>
    <td height="44" colspan="7" bgcolor="#CCCCCC"><div align="center"><span class="Estilo82"><?PHP ECHO $denominacion;?></span></div></td>
  </tr>
   <tr>
   <td width="57"><div align="center" class="Estilo77">
     <div align="center">Fecha</div>
   </div></td>
   <td width="227"><div align="center" class="Estilo77">
     <div align="center">Nombre Comercial </div>
   </div></td>
   <td width="237"><div align="center"><span class="Estilo77">DROGA</span></div></td>
   <td width="55"><div align="center"><span class="Estilo77">DEBE </span></div></td>
   <td width="54"><div align="center"><span class="Estilo77">HABER </span></div></td>

   <td width="74"><div align="center"><span class="Estilo77">PROV./PAC.</span></div></td>
  </tr>
  
  <?php
  $sql="select * from tr_stock where fecha between '$fecha_d' and '$fecha_h' and cuenta = '$laboratorios' ORDER BY fecha, cod_mercaderia";
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


$cod_movimiento=$result->fields["cod_movimiento"];

switch ($cod_movimiento){

case "1":{$debe = $precio_unitario;	$to_debe = $to_debe + $precio_unitario;$haber = "";break;}
case "6":{$haber = $precio_unitario;	$to_haber = $to_haber + $precio_unitario;$debe = "";break;}
}



?>

 <tr>
    <td><div align="center" class="Estilo77"><?PHP ECHO $fecha;?></div></td>
    <td><span class="Estilo77"><?PHP ECHO $nombre_comercial;?></span></td>
    <td><span class="Estilo77"><?PHP ECHO $drogas;?></span></td>
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $debe;?></span></div></td>
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $haber;?></span></div></td>
 
    <td><div align="center"><span class="Estilo77"><?PHP ECHO $documento;?></span></div></td>
 </tr>
 
 
 
<?php 


	$result->MoveNext();
	}

$todo = $to_debe - $to_haber;
	  ?>

	  <tr>
   <td bgcolor="#999999">&nbsp;</td>
   <td bgcolor="#999999">&nbsp;</td>
   <td bgcolor="#999999">&nbsp;</td>
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $to_debe;?></span></div></td>
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $to_haber;?></span></div></td>
 
   <td bgcolor="#999999"><div align="center"><span class="Estilo77"><?PHP ECHO $todo;?></span></div></td>
 </tr>
</table>
</form>
