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
include ("../mesa_entrada/a_pacientes/funcion_cambiar_estados.php");
include ("variables.php");
?>

<BODY onload = "on_load()">
<form action="guardar_paciente.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9"> 
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>FICHA DE PACIENTES </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento:</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><div align="left">      <font size="2" face="Trebuchet MS"><strong><font color="#000000">      <?php print("$tipo_doc");?> <strong>- <?php echo $a; ?></strong></font> </strong> </font></div>      </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre: </font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php echo $apellido; ?></font> <font color="#000000" size="2" face="Trebuchet MS">&nbsp;
 <?php echo $nombre; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Estado: </font></div></td>
    <td colspan="11" bgcolor="#E6E6E6">      <font size="2" face="Trebuchet MS"><?php print("$estado");?> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fecha Estado<font color="#000000"><strong>:</strong></font></font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><strong><?php echo $dia_estado; ?> / <?php echo $mes_estado; ?> / <?php echo $anio_estado; ?></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones: </font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
  <?php echo $observaciones; ?>    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9"> 
    <td colspan="4"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DOMICILIO</strong></font></div></td>
    <td colspan="9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>RESIDENCIA</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $calle; ?> </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $calle_residencia; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $puerta; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $puerta_residencia; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">  <?php echo $referencia; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $referencia_residencia; ?>    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Departamento: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 

  <?php print("$departamento");?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $localidad_residencia; ?>   </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">      <?php echo $localidad; ?>
      </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $cod_postal_residencia; ?>    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $cod_postal; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"><strong><font color="#000000" face="Trebuchet MS"> 
    <?php echo $telefono_residencia; ?>  </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><strong><font color="#000000" size="2" face="Trebuchet MS"> 
   <?php echo $telefono; ?>   </font></strong></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Celular: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><strong> 
    <font size="2"><strong><font color="#000000" face="Trebuchet MS">
    <?php echo $celular_residencia; ?> </font></strong></font> </strong></font> </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DATOS PERSONALES </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Fecha 
        Nac.:</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
  <?php echo $dia; ?>    / 
      <?php echo $mes; ?>
      /  <?php echo $anio; ?>    </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Lugar 
        Nac.: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $lugar_nac; ?>  </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Sexo: </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$sexo");?>  </font></td>
    <td colspan="7" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Estado Civil: </font></div></td>
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
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
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
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
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
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_diagnostico");?></font></div></td>
    <td colspan="3" valign="top" bgcolor="#E6E6E6"><div align="center">
      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$localizacion");?></font></div>
    </div></td>
    <td valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$primarios");?></font></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estadio");?></font></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_fuente");?></font></div></td>
    <td valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$base");?></font></div></td>
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
    <td width="1"></td>
    <td></td>
    <td width="25"></td>
    <td width="19"></td>
    <td width="38"></td>
    <td width="1"></td>
    <td></td>
    <td></td>
  </tr>
  
  <?php 
  
  $result3->MoveNext();
	}
	
	?>
</table>



	<table width="800" border="1" cellspacing="0">
          
          <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
            <td colspan="6" bgcolor="#C9C9C9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>HISTORIAL RECETAS</strong></font></div></td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="97" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Cantidad</font></div></td>
        <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS"><font size="2">Nombre Droga </font> </font></div></td>
        <td bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Nombre Comercial </font></div></td>
        <td bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Factura</font></div></td>
        <td width="77" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS"> Estado</font></div></td>
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

$nro_rece=$result6->fields["nro_receta"];


  $sql1 = "SELECT * FROM `tr_ventas_encabezado`  WHERE  nro_receta = $nro_receta";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$fecha_factura=strtoupper($result1->fields["fecha"]);
$nro_factura=strtoupper($result1->fields["nro_factura"]);

$nro_fact = $nro_fact." ".$nro_factura;
 $result1->MoveNext();
				}

$fecha_factura = fecha_argentina($fecha_factura);
?>


      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td bgcolor="#FFFFCC"><div align="center"></div></td>
        <td width="206" bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td width="71" bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Rec: <?php print("$nro_receta");?></font></div></td>
        <td width="246" bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fecha_factura");?> </font></div></td>
        <td width="77" bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_fact");?></font></div></td>
        <td bgcolor="#FFFFCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font></div></td>
      </tr>

<?php 

$nro_fact = "";
$fecha_factura = "";
 $sql4="select * from receta_detalle where nro_receta = $nro_receta";
$result4 = $db->Execute($sql4);


$cont = 0;
if (!$result4) die("fallo".$db->ErrorMsg());
  while (!$result4->EOF) {

$renglon = $renglon + 1;


$cod_droga=strtoupper($result4->fields["cod_droga"]); // troquel
$cod_renglon=strtoupper($result4->fields["cod_renglon"]);
$estado=$result4->fields["estado"];


 $sql1 = "SELECT * FROM `monodrogas`  WHERE  troquel like '$cod_droga'";
$result1 = $db->Execute($sql1);

$cod_droga1=strtoupper($result1->fields["cod_droga"]);


 $sql1 = "SELECT * FROM `drogas`  WHERE  cod_droga like '$cod_droga1'";
$result1 = $db->Execute($sql1);

$nombre_droga=strtoupper($result1->fields["droga"]);


  $sql1 = "SELECT * FROM `tr_ventas_detalle`  WHERE  nro_factura= $nro_factura";
$result1 = $db->Execute($sql1);


$estad = estados_receta($estado);

$cantidad=$result4->fields["cantidad"];

 $cont = $cont + 1;



?>
<tr bordercolor="#FFFFCC" bgcolor="#E0EDF3"> 

 
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5"><font size="2" face="Trebuchet MS"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $cantidad;?></span></span></font></div></td>
     <td colspan="2" bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2">
       <div align="left"><font size="2" face="Trebuchet MS"><span class="Estilo26"><?php echo $nombre_droga." (".$cod_droga1.")";?></span></font></div>
     </div></td>
     <td colspan="2" bgcolor="#E6E6E6" scope="col"><font size="2" face="Trebuchet MS"><span class="Estilo26"><?php echo "(".$cod_droga.") ".$nombre_comercial;?></span></font></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><font size="2" face="Trebuchet MS"><span class="Estilo26"></span></font> <font size="2" face="Trebuchet MS"><span class="Estilo26"> <?php echo $estad;?></span></font></div></td>
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
