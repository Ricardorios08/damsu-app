	<table width="300" border="1" align="center" cellspacing="0">
     
	  <?php 
include ("../../../conexiones/config_usu.php");
include ("../../../funciones/funciones.php");
//include ("funcion_cambiar_estados.php");
$operador= $_REQUEST['operador'];
 $documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];
$cod_paciente= $_REQUEST['cod_paciente'];
	
 $sql3="select * from receta where nro_paciente like '$documento' and tipo_doc = '$tipo_doc' order by fecha desc, nro_receta desc LIMIT 10";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$fecha=$result3->fields["fecha"];

$fech = fecha_argentina($fecha);

$nro_receta=$result3->fields["nro_receta"];
$estado=$result3->fields["estado"];
$esta_rece=$result3->fields["estado"];


$hora_entrega=$result3->fields["hora_entrega"];
$fecha_entrega=$result3->fields["fecha_entrega"];
$fecha_entrega_ver = fecha_argentina($fecha_entrega);

  $sql="select * from receta_detalle where nro_receta = '$nro_receta' order by estado";
$result = $db->Execute($sql);

 if (!$result) die("fallo 1".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_droga=$result->fields["cod_droga"];
$nombre_droga=$result->fields["nombre_droga"];
$cantidad=$result->fields["cantidad"];
 $estado_receta=$result->fields["estado"];


 $a = $estado_receta;

 if ($a == $estado_receta){


$result->MoveNext();
 }else
	  {
$a = $estado_receta;
$result->MoveNext();
	  }




	} 







 $estad = estados_receta($a);

$esta_rece = estados_receta_reducida($esta_rece);
  $sql6="SELECT * FROM `tr_ventas_encabezado` where nro_receta = $nro_receta";
$result6 = $db->Execute($sql6);

$nro_rece=$result6->fields["nro_receta"];

if ($nro_rece != ""){

$estad = "FACTURADO";
}



if ($esta_rece == "EN"){
$estad = $fecha_entrega_ver." - ".$hora_entrega;
}

IF ($estad == "FACTURADO"){
?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="72" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"> <a href="../a_pacientes/entregar_receta.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"> <?php print("$nro_receta");?></a></font></div></td>
        <td width="38" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td width="108" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estad");?></font></div></td>
        <td width="64" bgcolor="#E6E6E6"><div align="center"><a href="../receta/ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><img src="../../../imagenes/office//336.ico" alt="Modificar" border = "0"> </a></div></td>
      </tr>
      <?php 
}ELSE{
?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS" <a href="../a_pacientes/entregar_receta.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><?php print("$nro_receta");?></a></font></div></td>
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estad");?></font></div></td>
        <td bgcolor="#E6E6E6"><div align="center"><a href="../receta/ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><img src="../../../imagenes/office//336.ico" alt="Modificar" border = "0"></a><a href="../receta/borrar_receta.php?nro_receta=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><img src="../../../imagenes/office//007.ico" alt="Modificar" border = "0"></a></div></td>
      </tr>
      <?php 

}
  $result3->MoveNext();
	}
	
	?>
    </table>   
