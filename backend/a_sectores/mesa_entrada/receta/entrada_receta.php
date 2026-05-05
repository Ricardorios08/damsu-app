<script language="javascript">
function on_load()
{
document.getElementById("cod_droga").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_droga":
				document.getElementById("cantidad").focus();
								break;
				
		}
		return false;
	}
	return true;
}


</script>
<?php 
include ("../../../conexiones/config_pro.php");
$band2= $_REQUEST['band2']; // asssssssss




if ($band2 == 1){
$cod_renglon= $_REQUEST['cod_renglon'];
$operador= $_REQUEST['operador'];
 $sql1 = "DELETE FROM  receta_detalle_temp where cod_renglon = $cod_renglon";
$result1 = $db->Execute($sql1);
}else{
 $operador= $_REQUEST['operador'];
  $g =  $_REQUEST['operador'];
}

$operador;


$a= $_REQUEST['documento'];

 $tipo_doc1 = $_REQUEST['tipo_doc'];




$band= $_REQUEST['band'];

$band1= $_REQUEST['band1'];




$hoy = date("Y-m-d");
if ($band1 == 1){
$cod_droga= $_REQUEST['cod_droga'];
$operador = $_REQUEST['op'];
if ($cod_droga != ''){
$sql = "SELECT * FROM drogas  WHERE  cod_droga = $cod_droga";
$result = $db->Execute($sql);

$droga=strtoupper($result->fields["droga"]);

$sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result1 = $db->Execute($sql1);
$descripcion=strtoupper($result1->fields["nombre_comercial"]);

//include ("mostrar_temp.php");


}

}else{
$cod_droga = "";
}


$nro_receta_nuevo= $_REQUEST['nro_receta_nuevo'];
$operador= $_REQUEST['operador'];
include ("../a_pacientes/variables.php");

if ($band == 1){

  $sql = "DELETE FROM receta_temp where operador = $operador";
$result = $db->Execute($sql);

 $sql1 = "DELETE FROM  receta_detalle_temp where operador = $operador";
$result1 = $db->Execute($sql1);

$sql="select * from paciente_diagnostico where `documento` = '$documento' and tipo_doc = $tipo_doc1";
$result = $db->Execute($sql);
$diag=$result->fields["nro_ficha"];

if ($diag == ""){
$leyenda = "DEBE INGRESAR UN DIAGNOSTICO PARA PODER CARGAR RECETAS";
include ("../../../alertas/campo_informacion2.php");
exit;
}

  $sql="select * from pacientes where `documento` = '$documento' and tipo_doc = $tipo_doc1";
$result = $db->Execute($sql);
$apellido=$result->fields["apellido"];
$nombre=$result->fields["nombre"];

$nombre_paciente = $apellido.", ".$nombre;

$fecha = date("Y-m-d");

  $sql="select * from receta where tipo_doc = '$tipo_doc' and nro_paciente = $documento order by fecha desc, nro_receta desc ";
$result = $db->Execute($sql);

 $nro_receta_ultima=$result->fields["nro_receta"];



 $sql="select * from receta";
$result = $db->Execute($sql);

$nro_receta=$result->fields["nro_receta"];
$nro_receta_nuevo =$nro_receta + 1;


 $sql = "INSERT INTO receta_temp (`fecha`, `nro_receta` , `tipo_doc` , `nro_paciente`, `nombre_paciente` , `estado` , `fecha_estado` , `operador`   ) VALUES ( '$fecha', '$operador', '$tipo_doc', '$documento', '$nombre_paciente' , '1' , '$hoy' ,  '$operador');";
$result = $db->Execute($sql);

if ($nro_receta_ultima > 0){
   $sql="select * from receta_detalle where nro_receta = '$nro_receta_ultima'";
$result = $db->Execute($sql);

 if (!$result) die("fallo211".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_droga=$result->fields["cod_droga"];
$nombre_droga=$result->fields["nombre_droga"];
$cantidad=$result->fields["cantidad"];

 $sql1 = "INSERT INTO receta_detalle_temp (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado` , `nro_paciente` , `cod_renglon`, `operador`) VALUES ('$operador', '$cod_droga', '$nombre_droga', '$cantidad', '0' ,'$cod_paciente' , '', '$operador' );";
$result1 = $db->Execute($sql1);

$result->MoveNext();
	} 

}

}


?>

<BODY onload = "on_load()">

<FORM name="form" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
  <table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td height="39" colspan="2" bgcolor="#C9C9C9"><div align="left"><font color="#0000FF" size="3" face="Trebuchet MS">PACIENTE: <?php echo $apellido;?>, <?php echo $nombre;?> <?php print("$tipo_doc");?><?php echo $a; ?>
    </font></div></td>
    <td rowspan="2" bgcolor="#EDEDED" ><div align="center"><a href="guardar_receta.php?operador=<?php print("$g");?>&&nro_paciente=<?php print("$a");?>&&nro_receta=<?php print("$nro_receta_nuevo");?>&&operador=<?php print("$operador");?>&&tipo_doc=<?php print("$tipo_doc");?>"><img src="../../../imagenes/actualizar_receta.jpg" onMouseOver="this.src='../../../imagenes/actualizar_receta_sobre.jpg';" onMouseOut="this.src='../../../imagenes/actualizar_receta.jpg';"/></a></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td colspan="2" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">DROGA:

 <?php if ($band1 == 1){?>	   
<input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10" value = "<?php echo $cod_droga;?>"><?php }else{?>
<input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "20"> <?php }?>
&nbsp;<?php echo $droga;?> <?php echo $descripcion;?>

   

    </font><font color="#000000" size="2" face="Trebuchet MS">CANT</font><font color="#000000" size="2" face="Trebuchet MS">
    <input type="text" name="cantidad" id="cantidad"  size = "2" />

	    <input type="hidden" name="nro_receta_nuevo" value = "<?php echo $nro_receta_nuevo;?>">
			    <input type="hidden" name="documento" value = "<?php echo $a;?>" />
 <input type="hidden" name="tipo_doc" value = "<?php echo $tipo_doc;?>">
<input type="hidden" name="operador" value = "<?php echo $operador;?>">

    </font><font color="#000000" size="2" face="Trebuchet MS">
    <input type="submit" name="Alta" value="OK" id = "Alta" />
    </font><font color="#000000" size="2" face="Trebuchet MS">
    <input type="submit" name="Alta" value="Refresca Detalle" id = "Alta" />
    <input type="submit" name="Alta" value="Ver Protocolo" id = "Alta" />
    </font></div></td>
    </tr>
</table>

<?php if ($band == 1){

$operador;
include ("mostrar_temp.php");

}?>

<?php if ($band2 == 1){

$operador;
include ("mostrar_temp.php");

}?>


</form>
</body>


<?php  
$band = "";

		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{

case "Refresca Detalle":
	 $operador= $_REQUEST['operador'];

 $nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];				{
$cod_droga = $_REQUEST['cod_droga'];
$cantidad = $_REQUEST['cantidad'];
$documento= $_REQUEST['documento'];
include ("mostrar_temp.php");
break;
				}

				case "Ver Protocolo":
	 $operador= $_REQUEST['operador'];

 $nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];				{
$cod_droga = $_REQUEST['cod_droga'];
$cantidad = $_REQUEST['cantidad'];
$documento= $_REQUEST['documento'];
include ("tabla_protocolo.php");
break;
				}



				case "OK":
				{

$nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];
$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];
$operador= $_REQUEST['operador'];
$band5 = 1;



include ("../../../conexiones/config_pro.php");
$cod_droga = $_REQUEST['cod_droga'];

if (is_numeric($cod_droga)==false) {
include("buscar_drogas.php");
exit;
}

$cantidad= $_REQUEST['cantidad'];

if ($cantidad == ""){
$leyenda = "NO INGRESO CANTIDAD";
include ("../../../alertas/campo_informacion2.php");
exit;
}



if ($cod_droga != ""){
			$sql = "SELECT * FROM drogas  WHERE  cod_droga like '$cod_droga'";
			$result = $db->Execute($sql);
			$cod_droga=strtoupper($result->fields["cod_droga"]);
			$droga=strtoupper($result->fields["droga"]);

			if ($droga == ""){
				$leyenda = "NO EXISTE DROGA CON ESE NUMERO";
				include ("../../../alertas/campo_informacion2.php");
				exit;
			}ELSE{
				

$sql = "INSERT INTO `receta_detalle_temp` (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado`, `nro_paciente`, `cod_renglon` , `operador`) VALUES ('$operador', '$cod_droga', '$droga', '$cantidad', '0', '$documento', NULL , '$operador');";
$result = $db->Execute($sql);


$cod_droga = "9";
			}

}
include ("mostrar_temp.php");
break;
				}



	}
 }
?>
  </table>




</html>

