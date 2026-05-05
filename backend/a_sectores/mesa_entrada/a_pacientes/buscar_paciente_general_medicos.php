<link rel="stylesheet" type="text/css" media="screen" href="../../../menus1.css" />

<?php 


function microtime_float()
{
list($useg, $seg) = explode(" ", microtime());
return ((float)$useg + (float)$seg);
}

$tiempo_inicio = microtime(true);

// hago un bucle, simplemente para hacer un script que tarde un poco



include('../a_inc/inicio.php');// conexion y nabvar
include('../a_inc/bar_buscar_dni.php'); //barra de busqueda Dni


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
<table width="75%" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="236" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre</font></font></font></div></td>
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

   
	<td bgcolor="#FFFFFF"><font size="2" face="Trebuchet MS"><?php print("$nombre_completo");?>(<?php print("$tipodoc");?>) <?php print("$tipo_doc");?> - <?php print("$documento");?></font></td>
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


  

  
  <?php $result1->MoveNext();
	}

	?>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#FFFFFF">
	
	
	<div id="menuh">
	  <ul><li><a href="../receta/entrada_receta.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&id=<?php print("$id");?>&&operador=<?php print("$operador");?>&&band=1" target = 'central1'>+ RECETAS</a></li>

				
		</ul>
</div></td>
  </tr>
  <!-- <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="7" bgcolor="#E6E6E6"><div align="center"><font color="#000033"><em><font size="2" face="Trebuchet MS">DIAGNOSTICOS </font></em></font><font size="2" face="Trebuchet MS"><a href="../a_pacientes/entrada_diagnostico.php?documento=<?php print("$documento");?>&&band=1"><img src="../../../imagenes/office//1157.ico" alt="Modificar" border = "0"></a><font color="#000033"><em> PRESTACIONES </em></font><a href="../../direccion/hc_paciente.php?id=<?php print("$documento");?>"><img src="../../../imagenes/office//147.ico" alt="Modificar" border = "0"></a></font><a href="../a_pacientes/entrada_afiliaciones.php?documento=<?php print("$documento");?>&&band=1"><font color="#000033"><em><font size="2" face="Trebuchet MS"> AFILIACIONES</font></em></font><img src="../../../imagenes/office//100.ico" alt="Modificar" border = "0"></a><font color="#000033"><em><font size="2" face="Trebuchet MS"> RECETAS </font></em></font><font size="2" face="Trebuchet MS"><a href="../receta/entrada_receta.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&band=1"><img src="../../../imagenes/office//100.ico" alt="Modificar" border = "0"></a></font></div>      
      <div align="center"></div>
      <div align="center"></div>      <div align="center"></div></td>
  </tr> -->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td><table width="75%" border="0" align="center" cellspacing="0">
       
	
        <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <td width="75" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">N&deg; Receta </font></div></td>
          <td width="58" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
          <td width="116" height="24" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Estado</font></div></td>
          <td width="60" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Cambiar</font></div></td>
        </tr>
  
    </table></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td>      <IFRAME src="tabla_receta.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$id");?>" width="333" height="200" frameborder="0"> </IFRAME></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  
<?php 

$result->MoveNext();
	} 


?></table>


<?php if ($nombre == ""){?>
<table width="75%" border="0" cellspacing="0">		
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
    <td colspan="6"></td>
  </tr>
</table>
  


<?php }

$tiempo_fin = microtime(true);

echo "<br>Tiempo de ejecución: " . round($tiempo_fin - $tiempo_inicio, 2);



?>



