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
include ("../a_pacientes/funcion_cambiar_estados.php");

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


$nro_receta_nuevo= $_REQUEST['nro_receta_nuevo'];

include ("../a_pacientes/variables.php");

if ($band == 1){

 $sql = "TRUNCATE TABLE receta_temp";
$result = $db->Execute($sql);

 $sql1 = "TRUNCATE TABLE receta_detalle_temp";
$result1 = $db->Execute($sql1);


 $sql="select * from receta where nro_paciente = '$a' and nro_receta = $nro_receta_nuevo order by fecha desc, nro_receta desc";
$result = $db->Execute($sql);

$fecha=$result->fields["fecha"];
$nro_receta=$result->fields["nro_receta"];
$nro_receta_nuevo =$nro_receta;

$nro_paciente=$result->fields["nro_paciente"];
$nombre_paciente=$result->fields["nombre_paciente"];

$sql = "INSERT INTO receta_temp (`fecha`, `nro_receta`, `nro_paciente`, `nombre_paciente`) VALUES ( '$fecha', '$nro_receta_nuevo', '$nro_paciente', '$nombre_paciente');";
$result = $db->Execute($sql);

 $sql="select * from receta_detalle where nro_receta = '$nro_receta_nuevo' and nro_paciente = $a";
$result = $db->Execute($sql);

 if (!$result) die("fallo 1".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_droga=$result->fields["cod_droga"];
$nombre_droga=$result->fields["nombre_droga"];
$cantidad=$result->fields["cantidad"];
$estado=$result->fields["estado"];


$sql1 = "INSERT INTO receta_detalle_temp (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado` , `nro_paciente`) VALUES ('$nro_receta_nuevo', '$cod_droga', '$nombre_droga', '$cantidad', '$estado' ,'$a' );";
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
    <td width="36550%" colspan="10"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>MODIFICAR RECETA DEL PACIENTE: </strong><?php echo $apellido; ?></font> <font color="#000000" size="2" face="Trebuchet MS">&nbsp; <?php echo $nombre; ?> <strong>DNI: </strong></font><font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$tipo_doc");?> <strong>- <?php echo $a; ?></strong></font></strong></font></div></td>
  </tr>

  
  
</table>

<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td bgcolor="#E6E6E6" ><div align="right"><font color="#000000" size="2" face="Trebuchet MS"><strong> RECETA: </strong></font></div>
      <div align="center"></div></td>
    <td bgcolor="#E6E6E6" ><font size="2" face="Trebuchet MS"><?PHP echo $nro_receta_nuevo;?></font></td>
    <td width="158" rowspan="5" bgcolor="#E6E6E6" ><div align="center"><a href="guardar_receta_mod.php?nro_receta=<?php print("$nro_receta_nuevo");?>&&nro_paciente=<?php print("$a");?>" onClick="return confirm('¿Está seguro de Guardar la Receta?');"><img src="../../../imagenes/actualizar_receta.jpg" onMouseOver="this.src='../../../imagenes/actualizar_receta_sobre.jpg';" onMouseOut="this.src='../../../imagenes/actualizar_receta.jpg';"/></a></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td width="126" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">DROGA:
      
    </font></div></td>
    <td width="510" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">
      <?php if ($band1 == 1){
		   ?>
      <input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10" value = "<?php echo $cod_droga;?>">
      <?php }elseif ($band4 == 1){?>
      <input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10" value = "<?php echo $cod_droga1;?>"><?php }else{?>
      <input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10">
      <?php }?>
  &nbsp;<?php echo $droga;?> <?php echo $descripcion;?> </font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">CANTIDAD:</font></div></td>
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">
    
	  <?php if ($band4 == 1){?>
	  <input type="text" name="cantidad" id="cantidad"  size = "2" value = "<?php echo $cantidad;?>" />
     <?php } else {?>
 <input type="text" name="cantidad" id="cantidad"  size = "2" />
 <?php }?>

	  
	  <input type="hidden" name="nro_receta_nuevo" value = "<?php echo $nro_receta_nuevo;?>" />
      <input type="hidden" name="documento" value = "<?php echo $a;?>" />
    </font></div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><label>
      <div align="right"><font color="#000000" size="2" face="Trebuchet MS">ESTADO:</font></div>
    </label></td>
    <td bgcolor="#E6E6E6"><div align="left">
      
	 <?php if ($band4 == 1){?>
	 
	 <select name="estados[]" id="estados"onkeypress="return verif_caracter(this,event)">
         <optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$estado";?>"> <?php echo $estados;?></option>
		</optgroup>
      <option value="0">PENDIENTE</option>
        <option value="1">PREPARADO</option>
        <option value="2">FACTURADO</option>
        <option value="3">INCOMPLETO</option>
        <option value="4">EN ESPERA</option>
        <option value="5">FINALIZADO</option>
        </select>
<?php } else {?>

	  <select name="estados[]" id="estados[]">
        <option value="0" selected>PENDIENTE</option>
        <option value="1">PREPARADO</option>
        <option value="2">FACTURADO</option>
        <option value="3">INCOMPLETO</option>
        <option value="4">EN ESPERA</option>
        <option value="5">FINALIZADO</option>
      </select>

	   <?php }?>


    </div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="left"></div></td>
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="submit" name="Alta" value="OK" id = "Alta" />
      </font><font color="#000000" size="2" face="Trebuchet MS">
        <input type="submit" name="Alta" value="Volver Carga" id = "Alta" />
      </font></div></td>
    </tr>
</table>

<?php if (($band == 1) or ($band4 == 1) or ($band3 == 1)){

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
$nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];				{
$cod_droga = $_REQUEST['cod_droga'];
$cantidad = $_REQUEST['cantidad'];
$documento= $_REQUEST['documento'];
include ("mostrar_temp_mod.php");
break;
				}

				case "OK":
				{

$nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];
$documento= $_REQUEST['documento'];

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
				

$sql = "INSERT INTO `receta_detalle_temp` (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado`, `nro_paciente`, `cod_renglon`) VALUES ('$nro_receta_nuevo', '$cod_droga', '$droga', '$cantidad', '$estados', '$documento', NULL);";
$result = $db->Execute($sql);


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

