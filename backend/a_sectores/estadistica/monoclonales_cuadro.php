<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo3 {font-size: 12px}
.Estilo5 {font-size: 12}
.Estilo6 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo7 {font-family: "Trebuchet MS"; font-size: 12px; font-weight: bold; }
-->
</style>

 
<?PHP 


include ("../../conexiones/config_pro.php");
include ("../../funciones/funciones.php");



$sql="select sum(total) as grupo1 from tr_stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' and grupo = 1";
$result = $db->Execute($sql);
$grupo1=$result->fields["grupo1"];

$sql="select sum(total) as grupo2 from tr_stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' and grupo = 2";
$result = $db->Execute($sql);
$grupo2=$result->fields["grupo2"];

$sql="select sum(total) as grupo3 from tr_stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' and grupo = 3";
$result = $db->Execute($sql);
$grupo3=$result->fields["grupo3"];


 $sql="select sum(total) as grupo1_u from stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' and grupo = 1";
$result = $db->Execute($sql);
 $grupo1_u=$result->fields["grupo1_u"];

  $sql="select sum(total) as grupo2_u from stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' and grupo = 2";
$result = $db->Execute($sql);
$grupo2_u=$result->fields["grupo2_u"];

  $sql="select sum(total) as grupo3_u from stock where cod_movimiento =  6  and fecha between '$fecha_d' and '$fecha_h' and grupo = 3";
$result = $db->Execute($sql);
$grupo3_u=$result->fields["grupo3_u"];


$sql="select sum(precio_unitario) as dev_grupo1 from stock where (cod_movimiento =  3  and fecha between '$fecha_d' and '$fecha_h' and grupo = 1) or (cod_movimiento =  2  and fecha between '$fecha_d' and '$fecha_h' and grupo = 1)";
$result = $db->Execute($sql);
$dev_grupo1=$result->fields["dev_grupo1"];

$sql="select sum(precio_unitario) as dev_grupo2 from stock where (cod_movimiento =  3  and fecha between '$fecha_d' and '$fecha_h' and grupo = 1) or (cod_movimiento =  2  and fecha between '$fecha_d' and '$fecha_h' and grupo = 2)";
$result = $db->Execute($sql);
$dev_grupo2=$result->fields["dev_grupo2"];

$sql="select sum(precio_unitario) as dev_grupo3 from stock where (cod_movimiento =  3  and fecha between '$fecha_d' and '$fecha_h' and grupo = 1) or (cod_movimiento =  2  and fecha between '$fecha_d' and '$fecha_h' and grupo = 3)";
$result = $db->Execute($sql);
$dev_grupo3=$result->fields["dev_grupo3"];



$unico_1 = $grupo1_u - $dev_grupo1;
$unico_2 = $grupo2_u - $dev_grupo2;
$unico_3 = $grupo3_u - $dev_grupo2;

$total_ace = $grupo1 + $grupo2 + $grupo3;
$total_unico = $unico_1 + $unico_2 + $unico_3;

$total_gastado = $total_ace + $total_unico;
$monoclonales = $grupo3 + $unico_3;
?>

<table width="800" border="0">
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">ESTADISTICA CONSUMO MENSUAL </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<table width="800" border="0">
  <tr>
    <td width="150" rowspan="3" bgcolor="#CCCCCC"><div align="center" class="Estilo7">ACE</div></td>
    <td width="502" colspan="3"><span class="Estilo6">GRUPO 1</span></td>
    <td width="134"><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $grupo1;?></span></div></td>
  </tr>
  <tr>
    <td colspan="3"><span class="Estilo6">GRUPO 2</span></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $grupo2;?></span></div></td>
  </tr>
  <tr>
    <td colspan="3"><span class="Estilo6">MONOCLONALES</span></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $grupo3;?></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo3"></span></td>
    <td colspan="3"><span class="Estilo3"></span></td>
    <td><HR noshade></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="right" class="Estilo6">TOTAL ACE </div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $total_ace;?></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo3"></span></td>
    <td colspan="3"><span class="Estilo3"></span></td>
    <td><span class="Estilo3"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><span class="Estilo6">ENTREGAS</span></div></td>
    <td><div align="center"><span class="Estilo6">DEVOLUCIONES</span></div></td>
    <td><div align="right"><span class="Estilo5"><span class="Estilo5"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></div></td>
  </tr>
  <tr>
    <td rowspan="3" bgcolor="#CCCCCC"><div align="center"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo5"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></div>      <div align="center" class="Estilo7">UNICO</div></td>
    <td><span class="Estilo6">GRUPO 1</span></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $grupo1_u;?></span></div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $dev_grupo1;?></span></div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $dev_grupo3;?></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo6">GRUPO 2</span></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $grupo2_u;?></span></div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $dev_grupo2;?></span></div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $unico_2;?></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo6">MONOCLONALES</span></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $grupo3_u;?></span></div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $dev_grupo3;?></span></div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $unico_3;?></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo3"></span></td>
    <td colspan="3"><span class="Estilo3"></span></td>
    <td><HR noshade></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="right" class="Estilo6">TOTAL UNICO </div></td>
    <td><div align="right" class="Estilo3"><span class="Estilo1"><?php echo $total_unico;?></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="right" class="Estilo6">TOTAL GASTADO </div></td>
    <td><div align="right"><span class="Estilo6"><?php echo $total_gastado;?></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="right" class="Estilo6">MONOCLONALES</div></td>
    <td><div align="right"><span class="Estilo6"><?php echo $monoclonales;?></span></div></td>
  </tr>
</table>


</form>
