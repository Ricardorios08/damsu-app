<link rel="stylesheet" type="text/css" media="screen" href="../../../menus1.css" />

<?php 


function microtime_float()
{
list($useg, $seg) = explode(" ", microtime());
return ((float)$useg + (float)$seg);
}

$tiempo_inicio = microtime(true);

// hago un bucle, simplemente para hacer un script que tarde un poco




include ("../../../conexiones/config_usu.php");

function tipodoc($a){
	switch ($a){
		case "3": {$a = "D.N.I";break;}
		case "1": {$a = "L.E";break;}
		case "2": {$a = "L.C";break;}
		case "5": {$a = "C.E";break;}
		case "6": {$a = "PAS";break;}
		case "7": {$a = "C.I";break;}
	}

	RETURN $a;
}

$modifica = "";
$direccion = "";
$nro = "";
$nombre = "";






$B = 1;
if ($bander != 1){
	 $operador = $_REQUEST['id'];

	$id= $_REQUEST['id'];
$palabra = $_REQUEST['busca'];
$tipo_doc = $_REQUEST['tipo_doc'];


    list($ape,$nom) = explode("+",$palabra);

     $ape; // Imprime 12

	 $nom; // Imprime 01
}



if (is_numeric($palabra)==false) {


if ($palabra == ""){
$sql="select * from pacientes where `apellido` != '' order by apellido limit 30";
}else{

$sql="select * from pacientes where documento like '$palabra%' or apellido like '$ape%' and nombre like '$nom%' order by apellido limit 30";
}
}
else
{
if ($palabra == ""){
$sql="select * from pacientes where `apellido` != '' order by apellido limit 30";
}else{

 if ($tipo_doc != ""){
 $sql="select * from pacientes where documento like '$palabra' and tipo_doc = $tipo_doc order by apellido limit 30";
 }
 else
	{
 $sql="select * from pacientes where documento like '$palabra' order by apellido limit 30";
	}

}
}



$result = $db->Execute($sql);
?>
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td colspan="6" bordercolor="#E6E6E6" bgcolor="#000099"><div align="center"><font color="#FFFFFF" face="Trebuchet MS">LISTADO DE PACIENTES PROGRAMA ONCOLOGICO </font></div></td>
  </tr>
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="236" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre</font></font></font></div></td>
    <td width="152" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Documento</font></font></div></td>
    <td colspan="2" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Direcci&oacute;n</font></font></div></td>
	<td width="135" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Localidad</font></font></div></td>
	<td width="63" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Tel&eacute;fono</font></font></div></td>
<?php if ($modifica == "SI"){?>
	<?php }?>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$documento=strtoupper($result->fields["documento"]);
$cod_paciente=strtoupper($result->fields["cod_paciente"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);

$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$nombre_completo = $apellido." ".$nombre; 

$calle=strtoupper($result->fields["calle"]);
$puerta=strtoupper($result->fields["puerta"]);
$telefono=strtoupper($result->fields["telefono"]);

$direccion= $calle." ".$puerta;
$estado=strtoupper($result->fields["estado"]);
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);

$tipodoc = tipodoc($tipo_doc);


	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$nombre_completo");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
	
	(<?php print("$tipodoc");?>) <?php print("$tipo_doc");?> - <?php print("$documento");?></font></td>
	    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$direccion");?></font></td>
    <td bgcolor="#E6E6E6"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$localidad");?></font></div></td>
     <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$telefono");?></font></td>
    </tr>
  
  <?PHP 
	 $sql1="select * from afiliaciones where documento like '$documento' and tipo_doc = '$tipo_doc'";
$result1 = $db->Execute($sql1);
	
	
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 $nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);


$sql2="select * from obrasocial where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$nombre_os=strtoupper($result2->fields["sigla"]);


	?>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="left"><font size="2" face="Trebuchet MS">Obra Social</font>: <font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_os");?></font></div></td>
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font>: <font size="2" face="Trebuchet MS"><?php echo $nro_afiliado;?></font></div></td>
    <td colspan="4" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha afiliaci&oacute;n: <?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></font></div></td>
  </tr>
  

  
  
  
  <?php $result1->MoveNext();
	}

	?>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="6" bgcolor="#E6E6E6">
	
	
	<div id="menuh">
		<ul>
				<li><a href="../a_pacientes/ficha1.php?id=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" target = 'central1'>DATOS PERSONALES</a></li>

<li><a href="../a_pacientes/ficha3.php?id=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" target = 'central1'>DIAGNOSTICO</a></li>

			<li><a href="../a_pacientes/ficha2.php?id=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" target = 'central1'>QUIMIO</a></li>

					<li><a href="../a_pacientes/ficha4.php?id=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" target = 'central1'>PRESTACIONES</a></li>

<!-- <li><a href="../a_pacientes/modificar_pacientes.php?id=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" target = 'central1'>MODIF. PACIENTE</a></li> -->

			<!-- <li><a href="../a_pacientes/entrada_diagnostico.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&cod_paciente=<?php print("$cod_paciente");?>&&band=1" id="primero" target = "central1" >+ DIAGNOSTICO</a></li>
			<li><a href="../../direccion/registrar_prestaciones2.PHP?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" target = 'central1'>+ PRESTACIONES</a></li>
			<li><a href="../a_pacientes/entrada_afiliaciones.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&band=1" target = 'central1' >+ AFILIACIONES</a></li>
			

			<li><a href="../receta/entrada_receta.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&id=<?php print("$id");?>&&operador=<?php print("$operador");?>&&band=1" target = 'central1'>+ RECETAS</a></li>

				<li><a href="../../a_sectores/monodrogas/compras/pagina1.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&id=<?php print("$id");?>&&operador=<?php print("$id");?>&&band=1" target = 'central1'>+ DONACION</a></li> -->
		</ul>
</div></td>
  </tr>
  <!-- <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="7" bgcolor="#E6E6E6"><div align="center"><font color="#000033"><em><font size="2" face="Trebuchet MS">DIAGNOSTICOS </font></em></font><font size="2" face="Trebuchet MS"><a href="../a_pacientes/entrada_diagnostico.php?documento=<?php print("$documento");?>&&band=1"><img src="../../../imagenes/office//1157.ico" alt="Modificar" border = "0"></a><font color="#000033"><em> PRESTACIONES </em></font><a href="../../direccion/hc_paciente.php?id=<?php print("$documento");?>"><img src="../../../imagenes/office//147.ico" alt="Modificar" border = "0"></a></font><a href="../a_pacientes/entrada_afiliaciones.php?documento=<?php print("$documento");?>&&band=1"><font color="#000033"><em><font size="2" face="Trebuchet MS"> AFILIACIONES</font></em></font><img src="../../../imagenes/office//100.ico" alt="Modificar" border = "0"></a><font color="#000033"><em><font size="2" face="Trebuchet MS"> RECETAS </font></em></font><font size="2" face="Trebuchet MS"><a href="../receta/entrada_receta.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&band=1"><img src="../../../imagenes/office//100.ico" alt="Modificar" border = "0"></a></font></div>      
      <div align="center"></div>
      <div align="center"></div>      <div align="center"></div></td>
  </tr> -->
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="3" valign="top" bgcolor="#E6E6E6"><IFRAME src="tabla_prestaciones.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" width="450" height="150" frameborder="0"> </IFRAME></td>
    <td colspan="3" valign="top" bgcolor="#E6E6E6"><IFRAME src="tabla_receta_nav.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$id");?>" width="333" height="200" frameborder="0"> </IFRAME></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="6" bgcolor="#999999"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td width="69"></td>
    <td width="133"></td>
    <td></td>
    <td></td>
  </tr>
  
  <?php 

$result->MoveNext();
	} 


?></table>


<?php if ($nombre == ""){?>
<table width="800" border="0" cellspacing="0">		
<tr bgcolor="#FFFF99">
<td colspan="6" bgcolor="#999999"><div align="center"><font face="Trebuchet MS"><strong>NO EXISTE PACIENTE CON ESAS CARACTERISTICAS</strong></font></div></td>
</tr>
<tr bgcolor="#FFFF99">
<td colspan="6" bgcolor="#999999"><div align="center"><font face="Trebuchet MS"><a href="entrada_dato.php?documento=<?php print("$palabra");?>&&operador=<?php print("$operador");?>" class="Estilo2">INGRESAR NUEVO PACIENTE</a></font></div></td>
 </tr>
<?php }else{?>
  <tr>
    <td colspan="6"></td>
  </tr>
  <tr>
    <td colspan="6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"></td>
  </tr>
</table>
  


<?php }

$tiempo_fin = microtime(true);

echo "<br>Tiempo de ejecución: " . round($tiempo_fin - $tiempo_inicio, 2);



?>



