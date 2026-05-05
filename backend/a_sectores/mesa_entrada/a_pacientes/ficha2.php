<script language="javascript">
function on_load()
{
document.getElementById("documento").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "documento":
				document.getElementById("tipo_doc").focus();
				break;
				case "tipo_doc":
				document.getElementById("apellido").focus();
				break;
				case "apellido":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("estado").focus();
				break;
				case "estado":
				document.getElementById("dia_estado").focus();
				break;
				case "dia_estado":
				document.getElementById("mes_estado").focus();
				break;
				case "mes_estado":
				document.getElementById("anio_estado").focus();
				break;
				case "anio_estado":
				document.getElementById("observaciones").focus();
				break;
				case "observaciones":
				document.getElementById("calle").focus();
				break;
				case "calle":
				document.getElementById("puerta").focus();
				break;

				case "puerta":
				document.getElementById("referencia").focus();
				break;
				case "referencia":
				document.getElementById("departamento").focus();
				break;
				case "departamento":
				document.getElementById("localidad").focus();
				break;
				case "localidad":
				document.getElementById("cod_postal").focus();
				break;
				case "cod_postal":
				document.getElementById("telefono").focus();
				break;
				
				case "telefono":
				document.getElementById("dia").focus();
				break;
				
				
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("sexo").focus();
				break;

				case "sexo":
				document.getElementById("lugar_nac").focus();
				break;
				
				case "lugar_nac":
				document.getElementById("estado_civil").focus();
				break;
				
				case "estado_civil":
				document.getElementById("siguiente").focus();
				break;




				case "calle_residencia":
				document.getElementById("puerta_residencia").focus();
				break;

				case "puerta_residencia":
				document.getElementById("referencia_residencia").focus();
				break;
				case "referencia_residencia":
				document.getElementById("localidad_residencia").focus();
				break;
				
				case "localidad_residencia":
				document.getElementById("cod_postal_residencia").focus();
				break;
				case "cod_postal_residencia":
				document.getElementById("telefono_residencia").focus();
				break;
				case "telefono_residencia":
				document.getElementById("celular_residencia").focus();
				break;
				case "celular_residencia":
				document.getElementById("dia").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

<?php $a = $_GET['id'];
$tipo_doc = $_REQUEST['tipo_doc'];
include ("funcion_cambiar_estados.php");
include ("variables.php");
?>

<BODY onload = "on_load()">
<form action="guardar_paciente.php" method="post">

	<table width="800" border="1" cellspacing="0">
          
   
          <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="97" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Cantidad</font></div></td>
        <td width="452" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
        <td width="145" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">N&deg; FACR </font></div></td>
        <td width="88" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Modificar</font></div></td>
      </tr>
	  <?php 


	
 $sql3="select * from receta where nro_paciente like '$documento' and tipo_doc = '$tipo_doc' order by fecha desc, nro_receta desc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$fecha=$result3->fields["fecha"];

$fech = fecha_argentina($fecha);

$nro_receta=$result3->fields["nro_receta"];
$estado=$result3->fields["estado"];

$estad = estados_receta($estado);

  $sql6="SELECT * FROM `tr_ventas_encabezado` where nro_receta = $nro_receta";
$result6 = $db->Execute($sql6);

if (!$result6) die("fallo".$db->ErrorMsg());
  while (!$result6->EOF) {

$fecha=$result6->fields["fecha"];
$nro_rece=$result6->fields["nro_receta"];
$nro_factura_re=$result6->fields["nro_factura"];

$dia  = substr($fecha,8,2);
$mes  = substr($fecha,5,2);
$anio  = substr($fecha,0,4);
$fecha = $dia."/".$mes."/".$anio;

$fact = $fact." ".$nro_factura_re." (".$fecha.")";
	 $result6->MoveNext();
				}

?>


      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_receta");?></font></div></td>
        <td bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fact");?></font></div></td>

        <td bgcolor="#FFFFCC"><div align="center"><a href="../receta/ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"></a><a href="../receta/ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><img src="../../../imagenes/office//336.ico" alt="Modificar" border = "0"></a></div></td>
      </tr>

<?php 

$fact = "";

$sql4="select * from receta_detalle where nro_receta = $nro_receta";
$result4 = $db->Execute($sql4);


$cont = 0;
if (!$result4) die("fallo".$db->ErrorMsg());
  while (!$result4->EOF) {

$renglon = $renglon + 1;


  $cod_droga=strtoupper($result4->fields["cod_droga"]);
$cod_renglon=strtoupper($result4->fields["cod_renglon"]);
$estado=$result4->fields["estado"];
$nro_receta=$result4->fields["nro_receta"];


 
 $sql1 = "SELECT * FROM `monodrogas`  WHERE  troquel like '$cod_droga'";
$result1 = $db->Execute($sql1);
$cod_droga1=strtoupper($result1->fields["cod_droga"]);

 $sql1 = "SELECT * FROM `drogas`  WHERE  cod_droga like '$cod_droga1'";
$result1 = $db->Execute($sql1);
$nombre_droga=strtoupper($result1->fields["droga"]);

$estad = estados_receta($estado);


  $sql5="select sum(cantidad) from receta_detalle where nro_receta = $nro_receta and cod_droga = '$cod_droga'";
$result5 = $db->Execute($sql5);
 $cantidad=$result5->fields["cantidad"];

 $cont = $cont + 1;

 $sql1 = "SELECT * FROM tr_ventas_detalle  WHERE  nro_receta=  '$nro_receta'";
$result12 = $db->Execute($sql1);
$nro_factura=$result12->fields["nro_factura"];
$tipo_fact=$result12->fields["tipo_fact"];

   $sql1 = "SELECT * FROM tr_ventas_detalle  WHERE  nro_factura = '$nro_factura'  and nro_receta = '$nro_receta' and cod_droga = $cod_droga";
$result1 = $db->Execute($sql1);
$cod_droga_detalle=$result1->fields["cod_droga_detalle"];

 

 $sql1 = "SELECT count(cod_droga) as saldo FROM tr_ventas_detalle  WHERE  nro_factura = '$nro_factura' and tipo_fact = '$tipo_fact' and nro_receta = $nro_receta and cod_droga = $cod_droga";
$result1 = $db->Execute($sql1);
$saldo=$result1->fields["saldo"];

if ($cantidad == $saldo){
$estad = "COMPLETA";
}ELSE{
//$estad  ="PENDIENTE";
}
?>
<tr bordercolor="#FFFFCC" bgcolor="#E0EDF3"> 

 
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5"><font size="2" face="Trebuchet MS"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $cantidad;?></span></span></font></div></td>
     <td bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2">
       <div align="left"><font size="2" face="Trebuchet MS"><span class="Estilo26"><?php echo $nombre_droga."  (".$cod_droga.")";?> <?php echo $cod_droga_detalle;?></span></font></div>
     </div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><font size="2" face="Trebuchet MS"><span class="Estilo26"></span></font> <font size="2" face="Trebuchet MS"><span class="Estilo26"> <?php echo $estad;?></span></font></div></td>
    <td bgcolor="#E6E6E6" class="Estilo6"><div align="center"> <a href="entrada_receta.php?cod_renglon=<?php print("$cod_renglon");?>&&tipo_doc=<?php print("$tipo_doc");?>&&documento=<?php print("$a");?>&&operador=<?php print("$operador");?>&&band2=1" onClick="return confirm('¿Está seguro de borrar este producto?');"></a> <font size="2" face="Trebuchet MS"><span class="Estilo26"><?php echo $saldo;?></span></font></div></td>
  </tr>
  <?php 



	 $result4->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;







  $result3->MoveNext();
	}
	
	?>
</table>   

<br>
