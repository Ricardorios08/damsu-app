<style type="text/css">
<!--
.Estilo2 {color: #000000; }
.Estilo4 {font-family: "Trebuchet MS"}
.Estilo10 {font-family: "Trebuchet MS"; font-size: 11px; }
.Estilo13 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo14 {font-size: 12px}
.Estilo18 {font-size: 10px}
.Estilo19 {font-weight: bold}
.Estilo20 {font-weight: bold}
-->
</style>

<?php

include ("../../../conexiones/config_usu.php");

/*
$sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where cod_diagnostico like '' group by nro_factura";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $apellido=$result1->fields["apellido"];
  $nombre=$result1->fields["nombre"];
   $documento=$result1->fields["documento"];
$tipo_doc=$result1->fields["tipo_doc"];
$nro_factura=$result1->fields["nro_factura"];
$departamento=$result1->fields["departamento"];


 echo $sql = "SELECT * FROM paciente_diagnostico where documento = '$documento'";
 $result = $db->Execute($sql);
$cod_diagnostico=$result->fields["cod_diagnostico"];


echo  $sql = "UPDATE `tr_ventas_detalle_depto` SET `cod_diagnostico` = '$cod_diagnostico'  WHERE `nro_factura` = '$nro_factura'";
$result = $db->Execute($sql);


     $result1->MoveNext();
	}

exit;


*/


$cod_agrupad=$_POST["cod_agrupado"];
for ($i=0;$i<count($cod_agrupad);$i++)    
{     
$cod_agrupado = $cod_agrupad[$i];    
}

$zona=$_POST["zonas"];
for ($i=0;$i<count($zona);$i++)    
{     
$zonas = $zona[$i];    
}




$anio = $_POST["anio"];
$mes= $_POST["mes"];


?>

<table width="995" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="21" bgcolor="#FFFFFF"><div align="center"><span class="Estilo4">A&Ntilde;O: 20<?php echo $anio;?></span></div></td>
  </tr>
  
  <tr>
    <td colspan="21" bgcolor="#FFFFFF"><div align="left" class="Estilo4">
      <div align="center">CANTIDAD DE PACIENTES QUE CONSUMEN MONOCLONALES<?php echo $nombre_agrupado;?></div>
    </div>      
    <div align="center" class="Estilo4"></div></td>
  </tr>
  <tr>
    <td bgcolor="#B8B8B8"><span class="Estilo13">DIAGNOSTICO</span></td>
<td colspan="4" bgcolor="#B8B8B8"><div align="center" class="Estilo4 Estilo14 Estilo19"><div align="center"><span class="Estilo2">ENE</span></div></div></td>
<td colspan="4" bgcolor="#B8B8B8"><div align="center" class="Estilo4 Estilo14 Estilo20"><div align="center"><span class="Estilo13">FEB</span></div></div></td>

    <td colspan="4" bgcolor="#B8B8B8"><div align="center"><strong><span class="Estilo13">MAR</span></strong></div></td>
    <td colspan="4" bgcolor="#B8B8B8"><div align="center"><strong><span class="Estilo13">ABR</span></strong></div></td>
    <!-- <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MAY</span></div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">JUN</span></div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">JUL</span></div></td>
	 <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">AGO</span></div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">SET</span></div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo5 Estilo4"> 
      <div align="center">OCT </div>
    </div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">NOV</span></div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">DIC</span></div></td>
	<td bgcolor="#B8B8B8"><div align="center"><span class="Estilo13">MON</span></div></td> -->
  </tr>

 <tr>
   <td>&nbsp;</td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">MON</span></div></td>
   <td bgcolor="#99FFCC"><div align="center" class="Estilo18"><span class="Estilo4">NO MON </span></div></td>
  </tr>
<?PHP 


 $sql="select * from tr_ventas_encabezado group by cod_diagnostico";
$result20 = $db->Execute($sql);

if (!$result20) die("fallo".$db->ErrorMsg());
  while (!$result20->EOF) {
 $cod_diagnostico=$result20->fields["cod_diagnostico"];


  $sql="select * from diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result = $db->Execute($sql);

 $nombre_agrupado=$result->fields["nombre_diagnostico"];


include ("meses.php");


?>

 <tr>
    <td><span class="Estilo4"><?php echo $nombre_agrupado;?></span></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_ene;?></span></div></td>
	<td><div align="center"><span class="Estilo10"><?php echo $cant_depto_ene_no;?></span></div></td>
	<td><div align="right"><span class="Estilo10"><?php echo $suma_ene;?></span></div></td>
	<td><div align="right">
	  <div align="right"><span class="Estilo10"><?php echo $suma_ene_no;?></span></div>
	</div></td>
	<td bgcolor="#99FFCC"><div align="center"><span class="Estilo10"><?php echo $cant_depto_feb;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="center"><span class="Estilo10"><?php echo $cant_depto_feb_no;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="right"><span class="Estilo10"><?php echo $suma_feb;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="right"><span class="Estilo10"><?php echo $suma_feb_no;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_mar;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_mar_no;?></span></div></td>
    <td><div align="right"><span class="Estilo10"><?php echo $suma_mar;?></span></div></td>
    <td><div align="right"><span class="Estilo10"><?php echo $suma_mar_no;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="center"><span class="Estilo10"><?php echo $cant_depto_abr;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="center"><span class="Estilo10"><?php echo $cant_depto_abr_no;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="right"><span class="Estilo10"><?php echo $suma_abr;?></span></div></td>
    <td bgcolor="#99FFCC"><div align="right"><span class="Estilo10"><?php echo $suma_abr_no;?></span></div></td>
    <!-- <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_may;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_jun;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_jul;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_ago;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_set;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_oct;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_nov;?></span></div></td>
    <td><div align="center"><span class="Estilo10"><?php echo $cant_depto_dic;?></span></div></td> -->
  </tr>
 
<?PHP

$tot = "";

$cant_depto_ene = "";
$cant_depto_feb = "";
$cant_depto_mar = "";
$cant_depto_abr = "";
$cant_depto_may = "";
$cant_depto_jun = "";
$cant_depto_jul = "";
$cant_depto_ago = "";
$cant_depto_set = "";
$cant_depto_oct = "";
$cant_depto_nov = "";
$cant_depto_dic = "";
$total_anual = "";
$promedio_anual = "";


 $result20->MoveNext();
	}


?>
</table>

 
<?PHP


?>
