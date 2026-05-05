<?php 
$operador= $_REQUEST['operador'];

include ("../../../conexiones/config_usu.php");
echo $sql7="delete from detalle_receta_temp where nro_receta = $operador";
//$result7 = $db->Execute($sql7);

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
    <td bgcolor="#E6E6E6" ><div align="right"><font color="#000000" size="2" face="Trebuchet MS"> RECETA<strong>: </strong></font></div>
      <div align="center"></div></td>
    <td bgcolor="#E6E6E6" ><font size="2" face="Trebuchet MS"><?PHP echo $nro_receta_nuevo;?></font></td>
    <td width="265" bgcolor="#EDEDED" ><div align="center"></div></td>
    <td width="158" rowspan="6" bgcolor="#E6E6E6" ><div align="center"><a href="guardar_receta_mod.php?nro_receta=<?php print("$nro_receta_nuevo");?>&&nro_paciente=<?php print("$a");?>&&operador=<?php print("$operador");?>" onClick="return confirm('¿Está seguro de Guardar la Receta?');"><img src="../../../imagenes/actualizar_receta.jpg" onMouseOver="this.src='../../../imagenes/actualizar_receta_sobre.jpg';" onMouseOut="this.src='../../../imagenes/actualizar_receta.jpg';"/></a></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td width="126" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">DROGA:
      
    </font></div></td>
    <td width="403" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">
      <?php if ($band1 == 1){
		   ?>
      <input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10" value = "<?php echo $cod_droga;?>">
      <?php }elseif ($band4 == 1){?>
      <input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10" value = "<?php echo $cod_droga1;?>"><?php }else{?>
      <input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10">
      <?php }?>
  &nbsp;<?php echo $droga;?> <?php echo $descripcion;?> </font></div></td>
    <td width="265" bgcolor="#EDEDED" ><font size="2" face="Trebuchet MS">CAMBIAR ESTADO A</font></td>
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
  	  <input type="hidden" name="operador" value = "<?php echo $operador;?>" />
      <input type="hidden" name="documento" value = "<?php echo $a;?>" />
	  <input type="hidden" name="tipo_doc" value = "<?php echo $tipo_doc;?>" />

    </font></div></td>
    <td width="265" bgcolor="#EDEDED" ><font size="2" face="Trebuchet MS"> TODA LA RECETA</font></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td rowspan="2" bgcolor="#E6E6E6"><font size="2">
      <label>
      <div align="right"><font color="#000000" size="2" face="Trebuchet MS">ESTADO:</font></div>
      <font size="2">
      </label>
      </font></td>
    <td rowspan="2" bgcolor="#E6E6E6"><div align="left">
      
	 <?php if ($band4 == 1){?>
	 
	 <select name="estados[]" id="estados"onkeypress="return verif_caracter(this,event)">
         <optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$estado";?>"> <?php echo $estados;?></option>
		</optgroup>
        <option value="0">SIN PREPARAR</option>
        <option value="1">ARCHIVADO</option>
        <option value="2">PEDIDO</option>
        <option value="3">PENDIENTE</option>
        <option value="4">RECHAZADO</option>
        <option value="5">PREPARADO</option>
		<option value="6">FACTURADO</option>
		<option value="7">ENTREGADO</option>
        </select>

	
<?php } else {?>

	  <select name="estados[]" id="estados[]">
     <option value="0">SIN PREPARAR</option>
        <option value="1">ARCHIVADO</option>
        <option value="2">PEDIDO</option>
        <option value="3">PENDIENTE</option>
        <option value="4">RECHAZADO</option>
        <option value="5">PREPARADO</option>
		<option value="6">FACTURADO</option>
		<option value="7">ENTREGADO</option>
      </select>

	   <?php }?>


    </div></td>
    <td width="265" bgcolor="#EDEDED" >
	
	<select name="estados_receta[]" id="e">
      <option value="0">SIN PREPARAR</option>
      <option value="1">ARCHIVADO</option>
      <option value="2">PEDIDO</option>
      <option value="3">PENDIENTE</option>
      <option value="4">RECHAZADO</option>
      <option value="5">PREPARADO</option>
      <option value="6">FACTURADO</option>
      <option value="7">ENTREGADO</option>
    </select></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#EDEDED" ><a href="guardar_receta_mod.php?nro_receta=<?php print("$nro_receta_nuevo");?>&&nro_paciente=<?php print("$a");?>&&operador=<?php print("$operador");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Guardar la Receta?');"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="submit" name="Alta2" value="CAMBIAR" id = "Alta2" />
    </font></a></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="left"><font size="2"></font></div></td>
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="submit" name="Alta" value="OK" id = "Alta" />
      </font><font color="#000000" size="2" face="Trebuchet MS">
        <input type="submit" name="Alta" value="Volver Carga" id = "Alta" />
      </font></div></td>
    <td width="265" bgcolor="#EDEDED" ><a href="borrar_receta_detalle.php?nro_receta=<?php print("$nro_receta_nuevo");?>&&nro_paciente=<?php print("$a");?>&&operador=<?php print("$operador");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar el detalle de la Receta?');">Borrar detalle Receta</a></td>
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

case "CAMBIAR":{
$nro_receta_nuevo = $_REQUEST['nro_receta_nuevo'];		

$estados_recet=$_POST["estados_receta"];
for ($i=0;$i<count($estados_recet);$i++)    
{     
$estados_receta = $estados_recet[$i];    
}

$estados_receta;
include ("../../../conexiones/config_pro.php");
$sql = "UPDATE `receta_detalle` SET `estado` = '$estados_receta' WHERE nro_receta = $nro_receta_nuevo";
$result = $db->Execute($sql);


//include ("mostrar_temp_mod.php");
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
				

 $sql = "INSERT INTO receta_detalle_temp (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado` , `nro_paciente` , `cod_renglon`, `operador`) VALUES ('$operador', '$cod_droga', '$nombre_droga', '$cantidad', '$estados' ,'$cod_paciente' , '', '$operador' );";
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
