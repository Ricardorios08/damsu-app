<link rel="stylesheet" type="text/css" media="screen" href="../../menus1.css" />

<?php 


function microtime_float()
{
list($useg, $seg) = explode(" ", microtime());
return ((float)$useg + (float)$seg);
}

$tiempo_inicio = microtime(true);

// hago un bucle, simplemente para hacer un script que tarde un poco




include ("../../conexiones/config_usu.php");

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

$id= $_REQUEST['id'];




$B = 1;
if ($bander != 1){
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
<style type="text/css">
<!--
.Estilo1 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo4 {
	font-size: 24px;
	color: #CC0099;
}
.Estilo5 {
	font-size: 24px;
	font-family: "Trebuchet MS";
	color: #CC0099;
}
.Estilo6 {font-size: 18px}
.Estilo8 {font-family: "Trebuchet MS"; font-size: 18px; }
-->
</style>
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  
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


$estado=strtoupper($result->fields["estado"]);
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);
$direccion= $calle." ".$puerta;


$tipodoc = tipodoc($tipo_doc);


    $sql8 = "SELECT * FROM `paciente_diagnostico` where documento = '$documento'";
$result8 = $db->Execute($sql8);
$cod_fuente=$result8->fields["cod_fuente"];

    $sql8 = "SELECT * FROM fuentes where nro_fuente = '$cod_fuente'";
$result8 = $db->Execute($sql8);
$nombre_fuente=$result8->fields["nombre_fuente"];




	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td height="38" colspan="6" bgcolor="#E6E6E6"><div align="center"><span class="Estilo4">
	  
	  <font face="Trebuchet MS"><?php print("$nombre_completo");?></font></span>
	    <span class="Estilo5"> (<?php print("$documento");?>)</span></div>
    <div align="left"></div></td>
    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td width="139" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Doc.</font></font></div></td>
    <td width="249" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Direcci&oacute;n</font></font></div></td>
    <td colspan="3" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Localidad</font></font></div></td>
    <td width="66" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Tel&eacute;fono</font></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">(<?php print("$tipodoc");?>) <?php print("$tipo_doc");?> - <?php print("$documento");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$direccion");?></font></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$departamento");?></font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$telefono");?></font></div></td>
  </tr>


  <!-- <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="7" bgcolor="#E6E6E6"><div align="center"><font color="#000033"><em><font size="2" face="Trebuchet MS">DIAGNOSTICOS </font></em></font><font size="2" face="Trebuchet MS"><a href="../a_pacientes/entrada_diagnostico.php?documento=<?php print("$documento");?>&&band=1"><img src="../../../imagenes/office//1157.ico" alt="Modificar" border = "0"></a><font color="#000033"><em> PRESTACIONES </em></font><a href="../../direccion/hc_paciente.php?id=<?php print("$documento");?>"><img src="../../../imagenes/office//147.ico" alt="Modificar" border = "0"></a></font><a href="../a_pacientes/entrada_afiliaciones.php?documento=<?php print("$documento");?>&&band=1"><font color="#000033"><em><font size="2" face="Trebuchet MS"> AFILIACIONES</font></em></font><img src="../../../imagenes/office//100.ico" alt="Modificar" border = "0"></a><font color="#000033"><em><font size="2" face="Trebuchet MS"> RECETAS </font></em></font><font size="2" face="Trebuchet MS"><a href="../receta/entrada_receta.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&band=1"><img src="../../../imagenes/office//100.ico" alt="Modificar" border = "0"></a></font></div>      
      <div align="center"></div>
      <div align="center"></div>      <div align="center"></div></td>
  </tr> -->
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#62B0FF"><div align="center"><span class="Estilo8">OBRA SOCIAL: <?php print("$nombre_fuente");?></span></div></td>
    <td bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="top" bgcolor="#69FF62"><div align="center" class="Estilo1 Estilo6"><strong>PRESTADOR</strong></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="3" bgcolor="#E6E6E6"><iframe src="tablas_entrega_papo.php?cod_paciente=<?php print("$cod_paciente");?>&&tipo_doc=<?php print("$tipo_doc");?>&&id=<?php print("$id");?>" width="395" height="500" frameborder="0"> </iframe></td>
    <td colspan="3" valign="top" bgcolor="#E6E6E6"><IFRAME src="tablas_entrega_coir.php?documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&cod_paciente=<?php print("$cod_paciente");?>&&operador=<?php print("$id");?>&&id=<?php print("$id");?>" width="395" height="500" frameborder="0"> </IFRAME></td>
  </tr>
  
  <tr>
    <td></td>
    <td></td>
    <td width="2"></td>
    <td width="199"></td>
    <td width="133"></td>
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



