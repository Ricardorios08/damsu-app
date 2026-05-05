<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12;
}
-->
</style>
<table width="850" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="Estilo1"><div align="center"><strong>A&Ntilde;O: 2013 </strong></div></td>
  </tr>
  <tr>
    <td width="602" bgcolor="#B8B8B8" class="Estilo1"><div align="center">FUENTE</div></td>
    <td width="248" bgcolor="#B8B8B8" class="Estilo1"><div align="center">CANTIDAD</div></td>
	    <td width="248" bgcolor="#B8B8B8" class="Estilo1"><div align="center">%</div></td>
  </tr>
 
<?php
include ("../../../conexiones/config_usu.php");
 
 $sql="select count(fuente) as cantidad  from est_fuentes where fuente != 11 and fuente != 31 and fuente != 32 and fuente != 34 and fuente != 33";
$result = $db->Execute($sql);

 $cantidad_pacientes=strtoupper($result->fields["cantidad"]);

 $sql="select count(fuente) as cantidad , nombre_fuente, fuente from est_fuentes where fuente != 11 and fuente != 31 and fuente != 32 and fuente != 33  and fuente != 34  group by nombre_fuente";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cantidad=strtoupper($result->fields["cantidad"]);
$fuente=strtoupper($result->fields["fuente"]);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);


$porcentaje = round($cantidad * 100 / $cantidad_pacientes,2);

if ($fuente == 0){
$nombre_fuente = "SIN FUENTE";
}

$total_cantidad = $total_cantidad + $cantidad;
$total_por = $total_por + $porcentaje;
?>
 <tr>
    <td class="Estilo1"><?PHP echo $fuente;?> - <?PHP echo $nombre_fuente;?></td>
    <td class="Estilo1"><div align="center"><?PHP echo $cantidad;?></div></td>
	    <td class="Estilo1"><div align="center"><?PHP echo $porcentaje;?></div></td>
  </tr>
  

<?PHP
$result->MoveNext();
	}

?>
  <tr>
    <td bgcolor="#F0F0F0" class="Estilo1"><div align="right">TOTAL</div></td>
    <td bgcolor="#F0F0F0" class="Estilo1"><div align="center"><?PHP echo $total_cantidad;?></div></td>
	  <td bgcolor="#F0F0F0" class="Estilo1"><div align="center"><?PHP echo $total_por;?></div></td>
  </tr>
</table>


 

