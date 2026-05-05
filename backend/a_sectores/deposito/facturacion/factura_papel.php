<html>
<script>

</script> 

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">
<?

include ("../../../conexiones/config_pro.php");
$cod_detalle = $_REQUEST['cod_detalle'];
$nro_factura= $_REQUEST['nro_factura'];
$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$año= $_REQUEST['anio'];
$nro_cliente= $_REQUEST['nro_cliente'];
$matricula= $_REQUEST['matricula'];
$forma_pago= $_REQUEST['forma_pago'];
$cantidad= $_REQUEST['cantidad'];
$cod_mercaderia= $_REQUEST['cod_mercaderia'];
$band= $_REQUEST['band'];

?>
<style type="text/css">
<!--
.Estilo38 {font-family: "Courier New", Courier, mono}
.Estilo39 {font-size: 10px}
.Estilo40 {font-family: "Courier New", Courier, mono; font-size: 10px; }
-->
</style>


<table width="1255" height="715" border="0">
  <tr>
    <th width="502" valign="top" scope="col"><?include("detalle_factura_papel.php");?></th>
    <th width="41" valign="top" scope="col">&nbsp;</th>
    <th width="698" valign="top" scope="col"><?include("detalle_factura_papel.php");?></th>
  </tr>
</table>
</body>

<STYLE>
<!--
@page { size: 41.59cm 27.94cm }
-->
</STYLE>

<!-- <STYLE>
<!--
@page { size: 21.59cm 27.94cm }
-->
</STYLE> -->

</html>