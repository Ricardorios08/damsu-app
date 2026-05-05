<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

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
				document.getElementById("dosis").focus();
				
				break;
				case "dosis":
				document.getElementById("frecuencia").focus();
				break;
				case "frecuencia":
				document.getElementById("cantidad_ciclos").focus();
				break;
				 
				
				
								
		}
		return false;
	}
	return true;
}


</script>


</head>

<BODY onload = "on_load()">



<?php  
include ("../../../conexiones/config_pro.php");

$band=$_REQUEST["band"];
$band1=$_REQUEST["band1"];
$band2=$_REQUEST["band2"];

if ($band2 == 1){
 $cod_detalle=$_REQUEST["cod_detalle"];
$sql = "DELETE FROM `protocolo_detalle_temp` WHERE cod_detalle = $cod_detalle";
$result = $db->Execute($sql);
}



$nro_protocolo = $_REQUEST['nro_protocolo'];

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

if ($band == 1){
$diagnostic=$_POST["diagnostico"];
for ($i=0;$i<count($diagnostic);$i++)    
{     
$diagnostico= $diagnostic[$i];    
}
$situacion = $_REQUEST['situacion'];
$linea = $_REQUEST['linea'];
$esquema = $_REQUEST['esquema'];
$plan = $_REQUEST['plan'];
$alternativa = $_REQUEST['alternativa'];
$nro_protocolo = $_REQUEST['nro_protocolo'];

$sql="select * from diagnostico where nro_diagnostico = '$diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

 $sql = "INSERT INTO `protocolo_temp` ( `nro_protocolo` , `nro_diagnostico` , `situacion` , `linea` , `plan` , `esquema` , `alternativa` ) VALUES ( '$nro_protocolo'  , '$diagnostico' , '$situacion' , '$linea' , '$plan' , '$esquema' , '$alternativa')";
mysql_query($sql);
}else
{

 $sql="select * from `protocolo_temp` where `nro_protocolo` = '$nro_protocolo'";
$result = $db->Execute($sql);
$situacion=strtoupper($result->fields["situacion"]); 
$linea=strtoupper($result->fields["linea"]); 
$esquema=strtoupper($result->fields["esquema"]); 
$plan=strtoupper($result->fields["plan"]); 
$alternativa=strtoupper($result->fields["alternativa"]); 
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]); 

$sql="select * from diagnostico where nro_diagnostico = '$nro_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

}
?>

<FORM name="form" ACTION="<?php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td colspan="2" bgcolor="#999999" ><div align="center"><font color="#000000" face="Trebuchet MS"><strong>INCORPORA PROTOCOLOS</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td width="678" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">Diagnostico: </font>
	    
        <font color="#000000" size="2" face="Trebuchet MS">
        <?php   echo $nombre_diagnostico;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Situacion:

        <?php   echo $situacion;?>
      </font></div></td>
    <td width="118" rowspan="4" bgcolor="#E6E6E6"><a href="guardar_protocolo.php?nro_protocolo=<?php print("$nro_protocolo");?>"><img src="../../../imagenes/actualizar.jpg" alt="Modificar" border = "0"></a></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">Linea: 
          <?php   echo $linea;?> 
      </font> <font color="#000000" size="2" face="Trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Plan:

      <?php  echo $plan;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Esquema:
<?php   echo $esquema;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alternativa: :
<?php   echo $alternativa;?>
      </font></div>      </td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">DROGA:

<?php 

if ($band1 == 1){?>	   
<input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10" value = "<?php echo $cod_droga;?>"><?php }else{?>
<input type="text" name="cod_droga" id="cod_droga" onKeyPress="return verif_caracter(this,event)" size = "10"> <?php }?>


&nbsp;<?php echo $droga;?> <?php echo $descripcion;?>
		  <input type="hidden" name="diagnostico[]" value="<?php  echo $diagnostico;?>">
		  <input type="hidden" name="situacion" value="<?php  echo $situacion;?>">
		  <input type="hidden" name="linea" value="<?php  echo $linea;?>">
		  <input type="hidden" name="esquema" value="<?php  echo $esquema;?>">
		  <input type="hidden" name="plan" value="<?php  echo $plan;?>">
		  <input type="hidden" name="alternativa" value="<?php  echo $alternativa;?>">
		  <input type="hidden" name="nro_protocolo" value="<?php  echo $nro_protocolo;?>">
    </font></div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS">&nbsp;DOSIS:
      <input type="text" name="dosis" id="dosis" onkeypress="return verif_caracter(this,event)" size = "10" />
  &nbsp;&nbsp;&nbsp;FRECUENCIA:
  <input type="text" name="frecuencia" id="frecuencia" onkeypress="return verif_caracter(this,event)" size = "10" />
  &nbsp;&nbsp;CANT. CICLOS:
  <input type="text" name="cantidad_ciclos" id="cantidad_ciclos"  size = "2" />
  <input type="submit" name="Alta" value="OK" id = "Alta" />
  <input type="submit" name="Alta" value="Volver Carga" id = "Alta" />
    </font></div></td>
    </tr>
</table>
<?php 
if ($band2 == 1){
include ("mostrar_temp.php");
}
?>


</form>
</body>

<?php  

		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{

case "Volver Carga":
				{
$cod_droga = $_REQUEST['cod_droga'];
$dosis = $_REQUEST['dosis'];
$frecuencia= $_REQUEST['frecuencia'];
$nro_protocolo= $_REQUEST['nro_protocolo'];
$cantidad_ciclos= $_REQUEST['cantidad_ciclos'];


 


include ("mostrar_temp.php");
break;
				}

				case "OK":
				{




include ("../../../conexiones/config_pro.php");
$cod_droga = $_REQUEST['cod_droga'];

if (is_numeric($cod_droga)==false) {
include("buscar_drogas.php");
exit;
}

$nro_protocolo= $_REQUEST['nro_protocolo'];
$dosis = $_REQUEST['dosis'];
$frecuencia= $_REQUEST['frecuencia'];
$cantidad_ciclos= $_REQUEST['cantidad_ciclos'];

if ($dosis == ""){
$leyenda = "NO INGRESO DOSIS";
include ("../../../alertas/campo_vacio.php");
exit;
}

if ($frecuencia == ""){
$leyenda = "NO INGRESO FRECUENCIA";
include ("../../../alertas/campo_vacio.php");
exit;
}

if ($cantidad_ciclos == ""){
$leyenda = "NO INGRESO CANTIDAD DE CICLOS";
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
				
$sql = "INSERT INTO `protocolo_detalle_temp` ( `cod_detalle` , `nro_protocolo` , `cod_droga` , `forma_farmaceutica` , `dosis` , `frecuencia` , `cantidad_ciclos` )  VALUES ( ''  , '$nro_protocolo' , '$cod_droga' , '$droga' , '$dosis' , '$frecuencia' , '$cantidad_ciclos')";
mysql_query($sql);

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
