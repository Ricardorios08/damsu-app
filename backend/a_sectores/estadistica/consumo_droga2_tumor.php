<style type="text/css">
<!--
.Estilo77 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo82 {
	font-size: 24px;
	font-family: "Trebuchet MS";
	color: #0000FF;
}
.Estilo87 {font-family: "Trebuchet MS"; color: #FF0000; font-size: 12px; }
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

 $sql2 = "select * from drogas where cod_droga = '$laboratorios'";
$result2 = $db->Execute($sql2);

 $denominacion=strtoupper($result2->fields["droga"]);


?> 
<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <tr>
    <td colspan="9" bgcolor="#FFFFFF"><div align="center"><span class="Estilo14">CONSUMO POR DROGA PO  DESDE EL:<?PHP ECHO $fecha_d1;?>  HASTA <?PHP ECHO $fecha_h1;?>   </span></div></td>
  </tr>
  <tr>
    <td height="44" colspan="9" bgcolor="#EDEDED"><div align="center"><span class="Estilo82"><?PHP ECHO $denominacion;?> (<?PHP ECHO $laboratorios;?>)</span></div></td>
  </tr>
   <tr>
     <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
     <td bgcolor="#FFFFFF">&nbsp;</td>
     <td colspan="4" bgcolor="#FFFFFF"><div align="right" class="Estilo87">Transporte: </div></td>
     <td bgcolor="#FFFFFF"><div align="center" class="Estilo87"><?PHP ECHO $saldo;?></div></td>
   </tr>
   <tr>
   <td width="221" bgcolor="#FFFFFF"><div align="center" class="Estilo77">
     <div align="center">Nombre Comercial </div>
   </div></td>
   <td width="202" bgcolor="#FFFFFF">&nbsp;</td>
   <td width="60" bgcolor="#FFFFFF"><div align="center" class="Estilo77">Troquel</div></td>
   <td width="179" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">LABORATORIO</span></div></td>
   <td width="24" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">A</span></div></td>
   <td width="28" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">E</span></div></td>
   <td width="24" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">S</span></div></td>
   <td width="44" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">EXIS. </span></div></td>
  </tr>
  
  <?php



//$sql="select * from tr_stock where fecha between '$fecha_d' and '$fecha_h' and laboratorio = '$laboratorios' group by cod_mercaderia ORDER BY fecha, cod_mercaderia";

   $sql="select * from tr_stock  where (cod_droga = '$laboratorios' and laboratorio != 1) or (cod_droga = '$laboratorios' and laboratorio != 2) or (cod_droga = '$laboratorios' and laboratorio != 13) group by cod_mercaderia ORDER BY fecha, cod_mercaderia";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_mercaderia=$result->fields["cod_mercaderia"];

     $sql="select sum(cantidad) as ingreso from tr_stock where (fecha < '$fecha_d'  and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and laboratorio !=1) or (fecha < '$fecha_d'  and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and laboratorio !=2) or (fecha < '$fecha_d'  and cod_droga = '$laboratorios' and cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and laboratorio !=13)";
$result2 = $db->Execute($sql);
 $tr_ingreso=$result2->fields["ingreso"];
 

     $sql="select sum(cantidad) as egreso from tr_stock where (fecha < '$fecha_d'  and cod_droga = '$laboratorios' and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6  and laboratorio !=1 ) or  (fecha < '$fecha_d'  and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6 and  laboratorio !=2 ) or (fecha < '$fecha_d'  and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6 and  laboratorio !=13 )";
$result2 = $db->Execute($sql);

 

 $tr_egreso=$result2->fields["egreso"];

$saldo_anterior = $tr_ingreso - $tr_egreso;


  $sql="select sum(cantidad) as ingreso from tr_stock where (fecha between '$fecha_d' and '$fecha_h' and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and laboratorio !=1) or (fecha between '$fecha_d' and '$fecha_h' and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and laboratorio !=2) or (fecha between '$fecha_d' and '$fecha_h' and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and laboratorio !=13)";
$result2 = $db->Execute($sql);
 $ingreso=$result2->fields["ingreso"];


  $sql="select sum(cantidad) as egreso from tr_stock where (fecha between '$fecha_d' and '$fecha_h' and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6 and laboratorio !=1) or (fecha between '$fecha_d' and '$fecha_h' and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6 and laboratorio !=2) or (fecha between '$fecha_d' and '$fecha_h' and cod_droga = '$laboratorios'and cod_mercaderia = $cod_mercaderia and cod_movimiento = 6 and laboratorio !=13)";
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

$laboratorio=$result->fields["laboratorio"];
$nombre_paciente=$result->fields["nombre_paciente"];

$estado=$result->fields["estado"];
$fecha1=$result->fields["fecha"];
$fecha=fecha_argentina(strtoupper($result->fields["fecha"]));


$cod_movimiento=$result->fields["cod_movimiento"];

$to_ingreso = $to_ingreso + $ingreso;
$to_egreso = $to_egreso + $egreso;
$to_anterior = $to_anterior + $saldo_anterior;
$saldo = $saldo_anterior +  $ingreso - $egreso;
$to_saldo = $saldo_anterior + $to_ingreso - $to_egreso;

 $sql21 = "select * from laboratorios where cod_laboratorio = '$laboratorio'";
$result21 = $db->Execute($sql21);

 $nombre_laboratorio=$result21->fields["laboratorio"];

?>

 <tr>
    <td bgcolor="#FFFFFF"><span class="Estilo77"><?PHP ECHO $nombre_comercial;?></span></td>
    <td bgcolor="#FFFFFF"><span class="Estilo77"><?PHP ECHO $presentacion;?></span></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $troquel;?></span></div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo77"><?PHP ECHO $nombre_laboratorio;?></span></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $saldo_anterior;?></span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $ingreso;?></span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $egreso;?></span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $saldo;?></span></div></td>
  </tr>
 
 
 
<?php 


	$result->MoveNext();
	}

  
$todo = $to_debe - $to_haber;
$to_saldo = $to_anterior + $to_ingreso - $to_egreso;
	  ?>

	  <tr>
   <td colspan="2" bgcolor="#EDEDED">&nbsp;</td>
   <td bgcolor="#EDEDED">&nbsp;</td>
   <td bgcolor="#EDEDED">&nbsp;</td>
   <td bgcolor="#EDEDED"><div align="center"><span class="Estilo77"><?PHP ECHO $to_anterior;?></span></div></td>
   <td bgcolor="#EDEDED"><div align="center"><span class="Estilo77"><?PHP ECHO $to_ingreso;?></span></div></td>
   <td bgcolor="#EDEDED"><div align="center"><span class="Estilo77"><?PHP ECHO $to_egreso;?></span></div></td>
   <td bgcolor="#EDEDED"><div align="center"><span class="Estilo77"><?PHP ECHO $to_saldo;?></span></div></td>
  </tr>
</table>
</form>
