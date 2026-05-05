<style type="text/css">
<!--
.Estilo77 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo82 {
	font-size: 24px;
	font-family: "Trebuchet MS";
	color: #0000FF;
}
.Estilo90 {font-family: "Trebuchet MS"; font-size: 12px; color: #000000; }
.Estilo91 {color: #000000; }
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


$fecha_d1 = $dia_d."-".$mes_d."-".$anio_d;
$fecha_h1 = $dia_h."-".$mes_h."-".$anio_h;


$laboratorio=$_POST["laboratorios"];
	for ($i=0;$i<count($laboratorio);$i++)    
	{     
	$laboratorios = $laboratorio[$i];  
		
		}

 $sql2 = "select * from laboratorios where cod_laboratorio = '$laboratorios'";
$result2 = $db->Execute($sql2);

 $denominacion=strtoupper($result2->fields["laboratorio"]);


?> 
<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <!--DWLayoutTable-->
  <tr>
    <td height="21" colspan="9" bgcolor="#FFFFFF"><div align="center"><span class="Estilo14">CONSUMO POR LABORATORIO EN PESOS  DESDE EL:<?PHP ECHO $fecha_d1;?>  HASTA <?PHP ECHO $fecha_h1;?>   </span></div></td>
  </tr>
  <tr>
    <td height="44" colspan="9" bgcolor="#EDEDED"><div align="center"><span class="Estilo82"><?PHP ECHO $denominacion;?> (<?PHP ECHO $laboratorios;?>)</span></div></td>
  </tr>
   
   <tr>
   <td width="340" height="21" bordercolor="#B8B8B8" bgcolor="#B8B8B8"><div align="center" class="Estilo90">
     <div align="center">Nombre Comercial </div>
   </div></td>
   <td width="84" bordercolor="#B8B8B8" bgcolor="#B8B8B8"><div align="center" class="Estilo90">Troquel</div></td>
   <td width="191" bordercolor="#B8B8B8" bgcolor="#B8B8B8"><div align="center" class="Estilo91"><span class="Estilo77">Presentacion</span></div></td>
   <td colspan="5" bordercolor="#B8B8B8" bgcolor="#B8B8B8"><span class="Estilo90">DROGA</span></td>
   <td width="115" valign="top" bordercolor="#B8B8B8" bgcolor="#B8B8B8"><div align="center" class="Estilo91"><span class="Estilo77">IMPORTE</span></div></td>
  </tr>
  
  <?php



//$sql="select * from tr_stock where fecha between '$fecha_d' and '$fecha_h' and laboratorio = '$laboratorios' group by cod_mercaderia ORDER BY fecha, cod_mercaderia";

    $sql="select * from tr_stock  where laboratorio = '$laboratorios' group by cod_mercaderia ORDER BY drogas, fecha, cod_mercaderia";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_mercaderia=$result->fields["cod_mercaderia"];

    $sql="select sum(precio_unitario) as egreso from tr_stock where fecha between '20$fecha_d'  and '20$fecha_h' and laboratorio = '$laboratorios' and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6";
$result2 = $db->Execute($sql);
 $egreso=$result2->fields["egreso"];

 
 $sql2 = "select * from monodrogas where cod_barra = '$cod_mercaderia'";
$result2 = $db->Execute($sql2);

 $grupo=$result2->fields["grupo"];
 $nombre_comercial=$result2->fields["nombre_comercial"];
 $presentacion=$result2->fields["presentacion"];
 $troquel=$result2->fields["troquel"];
$documento=$result->fields["documento"];
$cod_droga=$result->fields["cod_droga"];
//$cantidad=$result->fields["cantidad"];
$precio_unitario=$result->fields["precio_unitario"];
$drogas=$result->fields["drogas"];


$nombre_paciente=$result->fields["nombre_paciente"];

$estado=$result->fields["estado"];
$fecha1=$result->fields["fecha"];
$fecha=fecha_argentina(strtoupper($result->fields["fecha"]));


$cod_movimiento=$result->fields["cod_movimiento"];

$to_egreso = $to_egreso + $egreso;


 $sql11 = "SELECT *  FROM drogas WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $drogas=$result11->fields["droga"];


if ($egreso > 0){
	$egreso = number_format($egreso,2);
}

if ($egreso > 0){

?>

 <tr>
   <td height="21" bgcolor="#FFFFFF"><span class="Estilo77"><?PHP ECHO $cod_mercaderia;?> <?PHP ECHO $nombre_comercial;?></span></td>
    <td bgcolor="#FFFFFF"><span class="Estilo77"><?PHP ECHO $troquel;?></span></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $presentacion;?></span></div></td>
    <td colspan="5" bgcolor="#FFFFFF"><span class="Estilo77"><?PHP ECHO $drogas;?></span>      <div align="center"></div></td>

    <td bgcolor="#FFFFFF"><div align="right"><span class="Estilo77"><?PHP ECHO $egreso;?></span></div></td>
 </tr>
 
 
 
 
<?php 
}



	$result->MoveNext();
	}

  
 if ($to_egreso > 0){
	$to_egreso = number_format($to_egreso,2);
}
 
	  ?>

	  <tr>
   <td height="21" colspan="8" bgcolor="#EDEDED"><div align="center"><span class="Estilo77"></span></div>     <div align="center"><span class="Estilo77"></span></div>     <div align="center"><span class="Estilo77"></span></div>     <div align="center"></div></td>
   <td><div align="right"><span class="Estilo77"><?PHP ECHO $to_egreso;?></span></div></td>
  </tr>
</table>
</form>
