 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<script language="javascript">
function on_load()
{
document.getElementById("leyenda12").focus();
document.getElementById("leyenda12").style.backgroundColor = "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{


				case "fact":
				document.getElementById("nro_factura_nuevo").focus();

document.getElementById("fact").style.backgroundColor = "#FFFFFF";
document.getElementById("nro_factura_nuevo").style.backgroundColor = "#CCFFCC";
				break;
				
				case "nro_factura_nuevo":
				document.getElementById("leyenda1").focus();

document.getElementById("nro_factura_nuevo").style.backgroundColor = "#FFFFFF";
document.getElementById("leyenda1").style.backgroundColor = "#CCFFCC";
				break;
				
				
				case "leyenda1":
				document.getElementById("ok").focus();
document.getElementById("leyenda1").style.backgroundColor = "#FFFFFF";
document.getElementById("ok").style.backgroundColor = "#CCFFCC";


				break;
								
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo4 {font-family: Arial, Helvetica, sans-serif}
.Estilo14 {color: #000000}
.Estilo16 {font-size: 12px}
.Estilo17 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo18 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
.Estilo21 {color: #FFFFFF}
.Estilo23 {font-weight: bold; font-size: 12px; }
.Estilo24 {font-weight: bold; color: #000000; }
.Estilo26 {font-family: Arial, Helvetica, sans-serif; color: #FFFFFF;}
.Estilo27 {color: #000000; font-size: 12px;}
.Estilo28 {font-size: 14px}
.Estilo89 {color: #333333}
-->
 </style>
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print();  cerrar()"> 
<?php 
include ("../../../conexiones/config_pro.php");
//$nro_factura= $_REQUEST['nro_factura'];
$operador= $_REQUEST['operador'];



$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];

$fecha= $anio.$mes.$dia;
$producto= $_REQUEST['producto'];
$cod_merquita= $_REQUEST['cod_merquita'];
$cod_proveedor= $_REQUEST['cod_proveedor'];




$sql="select * from usuarios where id = '$operador'";
$result = $db->Execute($sql);
$nombre_operador=strtoupper($result->fields["usuario"]); 
$tipo_fact=strtoupper($result->fields["programa"]); 

$sql = "SELECT * FROM `ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nombre_operador=strtoupper($result3->fields["nombre_operador"]);




$documento= $_REQUEST['documento'];

$nro_o=$_REQUEST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}

$sql = "SELECT * FROM `afiliaciones` where nro_os = $nro_os and documento = $documento order  by documento";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$nro_afiliado=$result->fields["nro_afiliado"];



$cantidad_existente= $_REQUEST['cantidad_existente'];
$porc_dto= $_REQUEST['porc_dto'];
$tipo_do=$_REQUEST["tipo_doc"];
	for ($i=0;$i<count($tipo_do);$i++)    
	{     
	$tipo_doc = $tipo_do[$i];    
	}





$sql7="select * from pacientes where documento like '$documento'";
$result7 = $db->Execute($sql7);
$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;

$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero

$nombre_completo = $apellido.", ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 


$sql = "SELECT * FROM `ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nro_factura=strtoupper($result3->fields["nro_factura"]);


?>





<table width="95%" height="68" border="0">
      <!--DWLayoutTable-->
      <tr bgcolor="#FFFFFF">
        <td height="20" colspan="2"><div align="left" class="Estilo8  Estilo14"><span class="Estilo11 Estilo14  Estilo4"><span class="Estilo16">Sres:</span> <span class="Estilo21"><span class="Estilo18"><?php echo $nombre_completo." (".$tipo_doc." ".$documento.")";?></span></span></span></div></td>
        <td width="54%" height="20"><div align="right" class="Estilo26"><span class="Estilo16"><span class="Estilo11 Estilo4 Estilo14"><span class="Estilo27">Fecha: <?php echo $fecha;?></span></span></span></div></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td height="20" colspan="2"><div align="left" class="Estilo8 Estilo4"><span class="Estilo16">Domicilio:</span><span class="Estilo21"> <span class="Estilo21"><span class="Estilo18"><?php echo $direccion;?></span></span></span></div>          </td>
        <td height="20"><div align="right" class="Estilo8 Estilo4"><span class="Estilo16"><span class="Estilo16"> Control: <?php echo $nro_factura?></span></span></div></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="34%" height="20"><div align="left" class="Estilo7 Estilo4  Estilo21"></div>          <div align="left" class="Estilo8 Estilo16"><span class="Estilo8 Estilo4"><span class="Estilo16">Operador: <?php echo $operador;?> - <?php echo $nombre_operador;?></span></span></div>        </td>
        <td colspan="2"><div align="right" class="Estilo8"><span class="Estilo26"><span class="Estilo11  Estilo14"><span class="Estilo17"></span></span></span></div></td>
   </tr>
</table>

<table width="95%" border="0">
        <tr bgcolor="#FFFFFF"><td width="4%" height="21" valign="middle"><div align="center" class="Estilo4 Estilo7 Estilo10 Estilo16 Estilo14"></div>
            <div align="right" class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo14">
              <div align="center"><span class="Estilo4">Cant</span></div>
          </div>            </td>
        <td valign="middle"><div align="center" class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo14">
          <div align="center">Detalle</div>
        </div></td>
        <td width="13%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo89">Proveedor</span></div></td>
        <td width="13%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo14">Presentaci&oacute;n</span></div></td>
        <td width="8%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo89"> Lote</span></div></td>

        <td width="9%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo89"> Vto Lote</span></div></td>
        <td width="9%"><div align="center" class="Estilo11 Estilo16 Estilo14"><span class="Estilo4">Pr. Unit. </span></div></td>
        <td width="12%" height="21"><div align="center" class="Estilo11 Estilo16 Estilo14"><span class="Estilo4">Total</span></div></td>
      </tr>


<?php 

include("../../../conexiones/config_pro.php");
 $sql = "SELECT * FROM `ventas1_deta_temp`  WHERE  `nro_factura` = $nro_factura and tipo_fact = '$tipo_fact'";
$result3 = $db->Execute($sql);
if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {

$cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["cantidad"]);

$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$proveedor=strtoupper($result3->fields["proveedor"]);

$vto_lote = $mes_lote."/".$anio_lote;


$sql = "SELECT * FROM monodrogas  WHERE  troquel = $cod_mercaderia";
$result = $db->Execute($sql);

$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$presentacion=strtoupper($result->fields["nombre_comercial"]);

$id_tasa=strtoupper($result->fields["id_tasa"]);


$sql5="select * from proveedores where cod_proveedor = $proveedor";
$result5 = $db->Execute($sql5);
$nombre_proveedor=strtoupper($result5->fields["denominacion"]);

$sql2="select * from tasas where cod_tasa = $id_tasa";
$result2 = $db->Execute($sql2);

$iva_normal=strtoupper($result2->fields["iva_normal"]);


$sql1 = "SELECT * FROM existencias  WHERE  `cod_mercaderia` = $cod_mercaderia";
$result1 = $db->Execute($sql1);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cantidad_ingresada =$result1->fields["cantidad_ingresada"];
$cantidad_salida =$result1->fields["cantidad_salida"];

$sql18 = "SELECT SUM(cantidad_ingresada) as cant FROM existencias  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result18 = $db->Execute($sql18);
$cant_lotes=strtoupper($result18->fields["cant"]);

$sql18 = "SELECT SUM(cantidad_salida) as salid FROM existencias  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result18 = $db->Execute($sql18);
$cant_salid_lotes=strtoupper($result18->fields["salid"]);

$sql98 = "SELECT sum(cantidad) as cant_temp FROM `ventas1_deta_temp`  WHERE  `cod_mercaderia` = $cod_mercaderia";
$result98 = $db->Execute($sql98);
$cant_temp=$result98->fields["cant_temp"];

$cant_exis = ($cant_lotes - $cantidad_salid_lotes) - $cant_temp;
$cantidad_existente = ($cantidad_ingresada - $cantidad_salida) - $cant_temp;


$total = round($cantidad * $precio_actualizado,2);
$total_factura = $total_factura + $total;

$subtotal = $total_factura;
$cont = $cont + 1;

?><tr bgcolor="#FFFFFF">
    <td height="20" scope="col"><div align="center" class="Estilo7 Estilo4 Estilo16 Estilo14"><span class="Estilo40 Estilo14 Estilo17"><?php echo $cantidad;?></span></div></td>

    <td height="20" scope="col"><div align="center" class="Estilo14"  ">
        <div align="left" class="Estilo17" ><?php echo $cod_mercaderia. " - ".$presentacion?></div>
    </div></td>
    <td scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $nombre_proveedor;?></span></div></td>
    <td height="20" scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $descripcion;?></span></div></td>
    <td height="20" scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $lote;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $mes_lote." - ".$anio_lote;?></span></div></td>
    <td scope="col"><div align="right" class="Estilo40 Estilo17 Estilo7 Estilo4 Estilo16 Estilo14">
      <div align="right">$ <?php echo number_format($precio_actualizado,2);?></div>
    </div></td>
    <td scope="col"><div align="right" class="Estilo40 Estilo17 Estilo7 Estilo4 Estilo16 Estilo14">
      <div align="right">$ <?php echo number_format($total,2);?></div>
    </div></td>
   
  </tr>

<?php 
	 $result3->MoveNext();
		}
 
?>






<?php 
$sumatoria = $cont;
		$cont = 0;

include ("espacios_en_blancos.php");
$sumatoria = 0;?>

<tr bgcolor="#FFFFFF">
  <td height="20" colspan="2" scope="col"><div align="center"><span class="Estilo4 Estilo28"><strong>Subtotal: $ <?php echo number_format($subtotal,2);?></strong></span></div>    <div align="right"></div></td>
  <td height="20" colspan="4" scope="col"><div align="right"><span class="Estilo4 Estilo13"><span class="Estilo23"><span class="Estilo24"><span class="Estilo28"></span></span></span></span></div></td>
  <td colspan="2" scope="col"><div align="right"><span class="Estilo4 Estilo13"><span class="Estilo23"><span class="Estilo24"><span class="Estilo28"></span></span></span></span></div>    <div align="right"><span class="Estilo14 Estilo39 Estilo38 Estilo28  Estilo4"><strong>TOTAL: $ <?php echo number_format($total_factura,2);?>
   </strong></span></span></div></td>
  </tr>
</table>
<?php $total_factura = 0;
$neto = 0;
$iva = 0;?>
<table width="95%" height="68" border="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#FFFFFF">
    <td height="20" colspan="2"><div align="left" class="Estilo8  Estilo14"><span class="Estilo11 Estilo14  Estilo4"><span class="Estilo16">Sres:</span> <span class="Estilo21"><span class="Estilo18"><?php echo $nombre_completo." (".$tipo_doc." ".$documento.")";?></span></span></span></div></td>
    <td width="54%" height="20"><div align="right" class="Estilo26"><span class="Estilo16"><span class="Estilo11 Estilo4 Estilo14"><span class="Estilo27">Fecha: <?php echo $fecha;?></span></span></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="20" colspan="2"><div align="left" class="Estilo8 Estilo4"><span class="Estilo16">Domicilio:</span><span class="Estilo21"> <span class="Estilo18"><?php echo $direccion;?></span></span></div></td>
    <td height="20"><div align="right" class="Estilo8 Estilo4"><span class="Estilo16"> Control: <?php echo $nro_factura?></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="34%" height="20"><div align="left" class="Estilo7 Estilo4  Estilo21"></div>
        <div align="left" class="Estilo8 Estilo16"><span class="Estilo8 Estilo4"><span class="Estilo16">Operador: <?php echo $operador;?> - <?php echo $nombre_operador;?></span></span></div></td>
    <td colspan="2"><div align="right" class="Estilo8"><span class="Estilo26"><span class="Estilo11  Estilo14"><span class="Estilo17"></span></span></span></div></td>
  </tr>
</table>
<table width="95%" border="0">
  <tr bgcolor="#FFFFFF">
    <td width="4%" height="21" valign="middle"><div align="center" class="Estilo4 Estilo7 Estilo10 Estilo16 Estilo14"></div>
        <div align="right" class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo14">
          <div align="center"><span class="Estilo4">Cant</span></div>
      </div></td>
    <td valign="middle"><div align="center" class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo14">
        <div align="center">Detalle</div>
    </div></td>
    <td width="13%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo89">Proveedor</span></div></td>
    <td width="13%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo14">Presentaci&oacute;n</span></div></td>
    <td width="8%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo89"> Lote</span></div></td>
    <td width="9%" valign="middle"><div align="center" class="Estilo14"><span class="Estilo11 Estilo4 Estilo7 Estilo10 Estilo16 Estilo89"> Vto Lote</span></div></td>
    <td width="9%"><div align="center" class="Estilo11 Estilo16 Estilo14"><span class="Estilo4">Pr. Unit. </span></div></td>
    <td width="12%" height="21"><div align="center" class="Estilo11 Estilo16 Estilo14"><span class="Estilo4">Total</span></div></td>
  </tr>
  <?php 

include("../../../conexiones/config_pro.php");
 $sql = "SELECT * FROM `ventas1_deta_temp`  WHERE  `nro_factura` = $nro_factura and tipo_fact = '$tipo_fact'";
$result3 = $db->Execute($sql);
if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {

$cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["cantidad"]);

$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$proveedor=strtoupper($result3->fields["proveedor"]);

$vto_lote = $mes_lote."/".$anio_lote;


$sql = "SELECT * FROM monodrogas  WHERE  troquel = $cod_mercaderia";
$result = $db->Execute($sql);

$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$presentacion=strtoupper($result->fields["nombre_comercial"]);

$id_tasa=strtoupper($result->fields["id_tasa"]);


$sql5="select * from proveedores where cod_proveedor = $proveedor";
$result5 = $db->Execute($sql5);
$nombre_proveedor=strtoupper($result5->fields["denominacion"]);

$sql2="select * from tasas where cod_tasa = $id_tasa";
$result2 = $db->Execute($sql2);

$iva_normal=strtoupper($result2->fields["iva_normal"]);


$sql1 = "SELECT * FROM existencias  WHERE  `cod_mercaderia` = $cod_mercaderia";
$result1 = $db->Execute($sql1);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cantidad_ingresada =$result1->fields["cantidad_ingresada"];
$cantidad_salida =$result1->fields["cantidad_salida"];

$sql18 = "SELECT SUM(cantidad_ingresada) as cant FROM existencias  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result18 = $db->Execute($sql18);
$cant_lotes=strtoupper($result18->fields["cant"]);

$sql18 = "SELECT SUM(cantidad_salida) as salid FROM existencias  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result18 = $db->Execute($sql18);
$cant_salid_lotes=strtoupper($result18->fields["salid"]);

$sql98 = "SELECT sum(cantidad) as cant_temp FROM `ventas1_deta_temp`  WHERE  `cod_mercaderia` = $cod_mercaderia";
$result98 = $db->Execute($sql98);
$cant_temp=$result98->fields["cant_temp"];

$cant_exis = ($cant_lotes - $cantidad_salid_lotes) - $cant_temp;
$cantidad_existente = ($cantidad_ingresada - $cantidad_salida) - $cant_temp;


$total = round($cantidad * $precio_actualizado,2);
$total_factura = $total_factura + $total;

$subtotal = $total_factura;
$cont = $cont + 1;

?>
  <tr bgcolor="#FFFFFF">
    <td height="20" scope="col"><div align="center" class="Estilo7 Estilo4 Estilo16 Estilo14"><span class="Estilo40 Estilo14 Estilo17"><?php echo $cantidad;?></span></div></td>
    <td height="20" scope="col"><div align="center" class="Estilo14"  ">
        <div align="left" class="Estilo17" ><?php echo $cod_mercaderia. " - ".$presentacion?></div>
    </div></td>
    <td scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $nombre_proveedor;?></span></div></td>
    <td height="20" scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $descripcion;?></span></div></td>
    <td height="20" scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $lote;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo14"><span class="Estilo17"><?php echo $mes_lote." - ".$anio_lote;?></span></div></td>
    <td scope="col"><div align="right" class="Estilo40 Estilo17 Estilo7 Estilo4 Estilo16 Estilo14">
        <div align="right">$ <?php echo number_format($precio_actualizado,2);?></div>
    </div></td>
    <td scope="col"><div align="right" class="Estilo40 Estilo17 Estilo7 Estilo4 Estilo16 Estilo14">
        <div align="right">$ <?php echo number_format($total,2);?></div>
    </div></td>
  </tr>
  <?php 
	 $result3->MoveNext();
		}
 
?>
  <?php 
$sumatoria = $cont;
		$cont = 0;

include ("espacios_en_blancos.php");
$sumatoria = 0;?>
  <tr bgcolor="#FFFFFF">
    <td height="20" colspan="2" scope="col"><div align="center"><span class="Estilo4 Estilo28"><strong>Subtotal: $ <?php echo number_format($subtotal,2);?></strong></span></div>
        <div align="right"></div></td>
    <td height="20" colspan="4" scope="col"><div align="right"><span class="Estilo4 Estilo13"><span class="Estilo23"><span class="Estilo24"><span class="Estilo28"></span></span></span></span></div></td>
    <td colspan="2" scope="col"><div align="right"><span class="Estilo4 Estilo13"><span class="Estilo23"><span class="Estilo24"><span class="Estilo28"></span></span></span></span></div>
        <div align="right"><span class="Estilo14 Estilo39 Estilo38 Estilo28  Estilo4"><strong>TOTAL: $ <?php echo number_format($total_factura,2);?> </strong></span></div></td>
  </tr>
</table>
</html>

</body>