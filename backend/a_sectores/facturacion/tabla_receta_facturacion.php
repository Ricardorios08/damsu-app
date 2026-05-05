	<table width="382" border="1" align="center" cellspacing="0" bordercolor="#000000">
     
	  <?php 
include ("../../conexiones/config_usu.php");
include ("../../funciones/funciones.php");
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

 $sql6="SELECT * FROM `tr_ventas_encabezado` where nro_receta = $nro_receta";
$result6 = $db->Execute($sql6);

$nro_rece=$result6->fields["nro_receta"];

if ($nro_rece != ""){

$estad = "FACTURADO";
}

IF ($estad == "AFACTURADO"){
?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="51" bgcolor="#FF9966"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><?php print("$nro_receta");?></a></font></div></td>
        <td width="51" bgcolor="#FF9966"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td colspan="5" bgcolor="#FF9966"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estad");?></font></div>          <div align="center"><a href="entrada_factura_tabla.php?cod_paciente=<?php print("$cod_paciente");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&nro_receta=<?php print("$nro_receta");?>&&band=1" target = "central1"></a></div>          <div align="center"><a href="entrada_factura_tabla.php?cod_paciente=<?php print("$cod_paciente");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&nro_receta=<?php print("$nro_receta");?>&&band=1" target = "central1"></a></div></td>
      </tr>
      <?php 
}ELSE{
?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
             <td width="51" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><?php print("$nro_receta");?></a></font></div></td>
        <td width="51" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td width="142" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estad");?></font></div></td>
        <td width="12" bgcolor="#E6E6E6">			<div align="center"><a href="../../a_sectores/mesa_entrada/receta/ver_detalle.php?nro_receta_nuevo=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><img src="../../imagenes/office//336.ico" alt="Modificar" border = "0"></a></div></td>
        <td width="32" bgcolor="#E6E6E6"><div align="center"><a href="../../a_sectores/mesa_entrada/receta/borrar_receta.php?nro_receta=<?php print("$nro_receta");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band=1" target = "central1"><img src="../../imagenes/office//007.ico" alt="Modificar" border = "0"></a></div></td>
        <td width="32" bgcolor="#E6E6E6"><div align="center"><a href="entrada_factura_tabla.php?cod_paciente=<?php print("$cod_paciente");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&nro_receta=<?php print("$nro_receta");?>&&band=1" target = "central1"><img src="../../imagenes/office//452.ico" alt="Modificar" border = "0"></a></div></td>
        <td width="32" bgcolor="#E6E6E6"><div align="center"><a href="../facturacion_unico/entrada_factura.php?cod_paciente=<?php print("$cod_paciente");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&nro_receta=<?php print("$nro_receta");?>&&band=1" target = "central1"><img src="../../imagenes/office//259.ico" alt="Modificar" border = "0"></a></div></td>
      </tr>
      <?php 

}
  $result3->MoveNext();
	}
	
	?>
    </table>   
