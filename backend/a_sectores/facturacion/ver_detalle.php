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
include ("../../conexiones/config_pro.php");
include ("../mesa_entrada/a_pacientes/funcion_cambiar_estados.php");
$operador= $_REQUEST['operador'];
$a= $_REQUEST['documento'];

 $cod_paciente= $_REQUEST['cod_paciente'];
$tipo_doc= $_REQUEST['tipo_doc'];

$band= $_REQUEST['band'];

$band1= $_REQUEST['band1'];
$band3= $_REQUEST['band3'];
$band4= $_REQUEST['band4'];


IF ($band4 == 1){
$cod_renglon= $_REQUEST['cod_renglon'];

$sql="select * from receta_detalle_temp where cod_renglon = '$cod_renglon'";
$result = $db->Execute($sql);

$cod_droga1=$result->fields["cod_droga"];
$droga=$result->fields["nombre_droga"];
$cantidad=$result->fields["cantidad"];
$estado=$result->fields["estado"];

$estados=estados_receta($result->fields["estado"]);

$sql="delete from receta_detalle_temp where cod_renglon = '$cod_renglon'";
$result = $db->Execute($sql);

}

IF ($band3 == 1){
$cod_renglon= $_REQUEST['cod_renglon'];

$sql="delete from receta_detalle_temp where cod_renglon = '$cod_renglon'";
$result = $db->Execute($sql);

}




if ($band1 == 1){
$cod_droga= $_REQUEST['cod_droga'];


if ($cod_droga != ''){
$sql = "SELECT * FROM drogas  WHERE  cod_droga = $cod_droga";
$result = $db->Execute($sql);

$droga=strtoupper($result->fields["droga"]);

$sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result1 = $db->Execute($sql1);
$descripcion=strtoupper($result1->fields["nombre_comercial"]);
}

}else{
$cod_droga = "";
}


if ($band3 != 1){
$nro_receta_nuevo= $_REQUEST['nro_receta_nuevo'];
}

if ($band3 != 4){
$nro_receta_nuevo= $_REQUEST['nro_receta_nuevo'];
}


include ("variables.php");

if ($band == 1){

 $sql = "DELETE FROM receta_temp where operador = $operador";
$result = $db->Execute($sql);

  $sql1 = "DELETE FROM  receta_detalle_temp where operador = $operador";
$result1 = $db->Execute($sql1);


  $sql="select * from receta where  nro_receta = $nro_receta_nuevo order by fecha desc, nro_receta desc";
$result = $db->Execute($sql);

$fecha=$result->fields["fecha"];
$nro_receta=$result->fields["nro_receta"];
$nro_receta_nuevo =$nro_receta;

$documento=$result->fields["nro_paciente"];
$tipo_doc=$result->fields["tipo_doc"];

$nombre_paciente=$result->fields["nombre_paciente"];

  $sql = "INSERT INTO receta_temp (`fecha`, `nro_receta` , `tipo_doc` , `nro_paciente`, `nombre_paciente` , `estado` , `fecha_estado` , `operador`   ) VALUES ( '$fecha', '$operador', '$tipo_doc', '$documento', '$nombre_paciente' , '1' , '$hoy' ,  '$operador');";
$result = $db->Execute($sql);

   $sql="select * from receta_detalle where nro_receta = '$nro_receta_nuevo'";
$result = $db->Execute($sql);

 if (!$result) die("fallo 1".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_droga=$result->fields["cod_droga"];
$nombre_droga=$result->fields["nombre_droga"];
$cantidad=$result->fields["cantidad"];
$estado=$result->fields["estado"];


 $sql1 = "INSERT INTO receta_detalle_temp (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado` , `nro_paciente` , `cod_renglon`, `operador`) VALUES ('$operador', '$cod_droga', '$nombre_droga', '$cantidad', '$estado' ,'$cod_paciente' , '', '$operador' );";
$result1 = $db->Execute($sql1);

$result->MoveNext();
	} 

}
?>

<BODY onload = "on_load()">

<FORM name="form" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9"> 
    <td height="31" colspan="3" bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong> DETALLE RECETA</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td width="17%"><div align="center"><font size="2" face="Trebuchet MS">Nombre:</font></div></td>
    <td width="41%"><font size="2" face="Trebuchet MS">&nbsp; </font><font color="#000000" size="2" face="Trebuchet MS"> <?php echo $apellido; ?></font> <font color="#000000" size="2" face="Trebuchet MS">&nbsp; <?php echo $nombre; ?></font></td>
    <td width="42%"><div align="center"><font color="#000000" size="4" face="Trebuchet MS"><strong>RECETA</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td><div align="center"><font color="#000000" size="2" face="Trebuchet MS">DNI:</font></div></td>
    <td><font color="#000000" size="2" face="Trebuchet MS">&nbsp; </font><font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$tipo_doc");?> <strong>- <?php echo $a; ?></strong></font></strong></font></td>
    <td width="42%"><div align="center"><font size="4" face="Geneva, Arial, Helvetica, sans-serif"><?PHP echo $nro_receta_nuevo;?></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>

<?php if (($band == 1) or ($band4 == 1) or ($band3 == 1) or ($band1 == 1)){

$operador= $_REQUEST['operador'];
include ("mostrar_temp_mod.php");

}?>
</form>
</body>


<?php  
$band = "";

		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{

case "Volver Carga":
$nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];		
{
$cod_droga = $_REQUEST['cod_droga'];
$cantidad = $_REQUEST['cantidad'];
$documento= $_REQUEST['documento'];
include ("mostrar_temp_mod.php");
break;
				}

				case "OK":
				{

$operador= $_REQUEST['operador'];		
$nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];
$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];

$estado=$_POST["estados"];
for ($i=0;$i<count($estado);$i++)    
{     
$estados = $estado[$i];    
}

if ($estados == ""){
$estados = "0";
}

include ("../../../conexiones/config_pro.php");
$cod_droga = $_REQUEST['cod_droga'];

if (is_numeric($cod_droga)==false) {
include("buscar_drogas_mod.php");
exit;
}

$cantidad= $_REQUEST['cantidad'];

if ($cantidad == ""){
$leyenda = "NO INGRESO CANTIDAD";
include ("../../../alertas/campo_vacio.php");
exit;
}



if ($cod_droga != ""){


			$sql = "SELECT * FROM drogas  WHERE  cod_droga like '$cod_droga'";
			$result = $db->Execute($sql);
			$cod_droga=strtoupper($result->fields["cod_droga"]);
			$droga=strtoupper($result->fields["droga"]);

			if ($droga == ""){
				$leyenda = "NO EXISTE DROGA CON ESE NUMERO";
				include ("../../../alertas/campo_vacio.php");
				exit;
			}ELSE{
				

 




$cod_droga = "9";
			}

}
include ("mostrar_temp_mod.php");
break;
				}



	}
 }
?>
  </table>




</html>

