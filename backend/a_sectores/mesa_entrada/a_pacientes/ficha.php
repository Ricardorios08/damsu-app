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
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#B9CAF0"> 
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>FICHA DE PACIENTES </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><div align="left">      <font size="2" face="Trebuchet MS"><strong><font color="#000000">      <?php print("$tipo_doc");?> <strong>- <?php echo $a; ?></strong></font> </strong> </font></div>      </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $apellido; ?></font> <font color="#000000" size="2" face="Trebuchet MS">&nbsp;
 <?php echo $nombre; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Estado</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6">      <font size="2" face="Trebuchet MS"><?php print("$estado");?> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fecha Estado<font color="#000000"><strong>:</strong></font></font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><strong><?php echo $dia_estado; ?> / <?php echo $mes_estado; ?> / <?php echo $anio_estado; ?></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
  <?php echo $observaciones; ?>    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#B9CAF0"> 
    <td colspan="4"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DOMICILIO</strong></font></div></td>
    <td colspan="9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>RESIDENCIA</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $calle; ?> </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $calle_residencia; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $puerta; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $puerta_residencia; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">  <?php echo $referencia; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $referencia_residencia; ?>    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Departamento</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 

  <?php print("$departamento");?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $localidad_residencia; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">      <?php echo $localidad; ?>
      </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $cod_postal_residencia; ?>    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $cod_postal; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"><strong><font color="#000000" face="Trebuchet MS"> 
    <?php echo $telefono_residencia; ?>  </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><strong><font color="#000000" size="2" face="Trebuchet MS"> 
   <?php echo $telefono; ?>   </font></strong></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Celular</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><strong> 
    <font size="2"><strong><font color="#000000" face="Trebuchet MS">
    <?php echo $celular_residencia; ?> </font></strong></font> </strong></font> </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Provincia</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><strong><font color="#000000" size="2" face="Trebuchet MS"> <?php echo $provincia; ?> </font></strong></td>
    <td colspan="7" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#B9CAF0">
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DATOS PERSONALES </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Fecha 
        Nac.</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
  <?php echo $dia; ?>    / 
      <?php echo $mes; ?>
      /  <?php echo $anio; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Lugar 
        Nac. </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $lugar_nac; ?>  </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Sexo</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$sexo");?>  </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Estado Civil</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
   <?php print("$estado_civil");?> </font></td>
  </tr>
  
  <?php 
  
   $sql1="select * from afiliaciones where documento like '$a'";
$result1 = $db->Execute($sql1);
	
	?>

  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#B9CAF0">
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>AFILIACIONES A OBRAS SOCIALES </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font></div></td>
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Obra Social</font></div></td>
    <td colspan="4" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha </font></div></td>
    <td colspan="5" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
  </tr>
  
  <?php 
  
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);


$sql2="select * from obrasocial where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);


	?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $nro_afiliado;?></font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_os");?></font></td>
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></font></div></td>
    <td colspan="5" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $otros;?></font></td>
  </tr>
  
  <?php $result1->MoveNext();
	}
	
	
	$sql3="select * from paciente_diagnostico where documento like '$documento'";
$result3 = $db->Execute($sql3);


	
	?>
	
	
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#B9CAF0">
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DIAGNOSTICOS</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td width="55" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
    <td colspan="2" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Diagnostico</font></div></td>
    <td colspan="3" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Localizacion</font></div></td>
    <td width="62" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS"> Multiples </font></div></td>
    <td colspan="2" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Estad&iacute;o</font></div></td>
    <td colspan="2" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Fuente</font></div></td>
    <td width="91" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Bases</font></div></td>
    <td width="85" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Matricula </font></div>      <div align="center"></div></td>
  </tr>
  
  <?php 
  
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$nro_ficha=$result3->fields["nro_ficha"];
$documento=$result3->fields["documento"];
$cod_diagnostico=$result3->fields["cod_diagnostico"];
$fecha_diagnostico=fecha_argentina($result3->fields["fecha_diagnostico"]);
$base=$result3->fields["base"];
$cod_fuente=$result3->fields["cod_fuente"];
$matricula=$result3->fields["matricula"];
$observaciones=$result3->fields["observaciones"];
$primario=$result3->fields["primario"];
$estadio=$result3->fields["estadio"];

$sql4="select * from diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result4 = $db->Execute($sql4);

$nombre_diagnostico=$result4->fields["nombre_diagnostico"];


$sql4="select * from fuentes where nro_fuente like '$cod_fuente'";
$result4 = $db->Execute($sql4);

$nombre_fuente=$result4->fields["nombre_fuente"];

?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td valign="top" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fecha_diagnostico");?></font></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_diagnostico");?></font></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="center">
      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$localizacion");?></font></div>
    </div></td>
    <td width="1">&nbsp;</td>
    <td valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$primarios");?></font></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estadio");?></font></div></td>
    <td width="38" valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_fuente");?></font></div></td>
    <td width="1">&nbsp;</td>
    <td valign="top" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$base");?></font></td>
    <td valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$matricula");?></font></div>      <div align="center"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$observaciones");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td width="91"></td>
    <td width="235"></td>
    <td width="60"></td>
    <td width="8"></td>
    <td></td>
    <td></td>
    <td width="25"></td>
    <td width="19"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <?php 
  
  $result3->MoveNext();
	}
	
	?>
</table>



	<table width="800" border="1" cellspacing="0">
          
   
          <tr bordercolor="#FFFFFF" bgcolor="#B9CAF0">
            <td colspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Ultimas 12 recetas </font></strong></div></td>
            <td colspan="2" bgcolor="#FFFFFF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../receta/ampliar_receta.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1">Ampliar Busqueda recetas </a></font></strong></div></td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="97" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Cantidad</font></div></td>
        <td width="452" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
        <td width="145" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">N&deg; FACTURA</font></div></td>
        <td width="88" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Modificar</font></div></td>
      </tr>
	  <?php 


	
 $sql3="select * from receta where nro_paciente like '$documento' and tipo_doc = '$tipo_doc' order by fecha desc, nro_receta desc limit 12";
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
 <?php

$sql="select * from prestaciones_pacientes where documento = $documento";
	$result = $db->Execute($sql);
?>
<table width="800" border="1" cellpadding="0" cellspacing="0">
  
  <tr bordercolor="#0066FF" bgcolor="#B9CAF0"> 


    <td width="3%"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
    <td width="3%"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">N&ordm;</font></font></div></td>
    <td width="39%"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre y Descripcion </font></font></div></td>
    <td width="9%"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Precio</font></font></div></td>
    <td width="7%"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Cant. </font></font></div></td>
    <td width="7%"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Pres. </font></font></div></td>
    <td width="7%"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Fuente</font></font></div></td>
 
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_prestacion=strtoupper($result->fields["cod_prestacion"]);

$sql3 = "SELECT * FROM `prestaciones` where cod_prestacion = '$cod_prestacion'";
$result3 = $db->Execute($sql3);

$descripcion=strtoupper($result3->fields["descripcion"]);
$caracteristica=strtoupper($result3->fields["caracteristica"]);


$precio=strtoupper($result->fields["precio"]);
$cupo_mensual=strtoupper($result->fields["nombre_reducido_fuente"]);
$cant_realizado=strtoupper($result->fields["cant_realizado"]);
$observaciones=strtoupper($result->fields["observaciones"]);


$nombre_prestador=strtoupper($result->fields["nombre_prestador"]);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);


$cod_operacion=strtoupper($result->fields["cod_operacion"]);
$fecha_prestacion=strtoupper($result->fields["fecha_prestacion"]);
$documento=strtoupper($result->fields["documento"]);

$dia = substr($fecha_prestacion,8,2);
$mes = substr($fecha_prestacion,5,2);
$anio = substr($fecha_prestacion,0,4);
$fecha_prestacion = $dia."-".$mes."-".$anio;


?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 

   
	<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$fecha_prestacion");?></font></div></td>
    <td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_prestacion");?></font></div></td>
    <td><font size="2" face="Trebuchet MS"><?php print("$descripcion");?> <?php print("$caracteristica");?></font></td>
	    <td><div align="center">
	      <font size="2" face="Trebuchet MS">$ <?php print("$precio");?></font>
	    </div></td>
		<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cant_realizado");?></font></div></td>
        <td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$nombre_prestador");?></font></div></td>
        <td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$nombre_fuente");?></font></div></td>
     
</tr>
  <?php 

$result->MoveNext();
	}

?>
</table>


