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
 
 $nro_receta = $_REQUEST['nro_receta_nuevo'];
$dia = date("d");
$mes= date("m");
$anio = date("y");

$hor = time();
date_default_timezone_set("America/Argentina/Mendoza");
$hora = date("H:i:s",$hor);

$horas = date("H",$hor);
$minutos= date("i",$hor);


  $sql="select * from receta where nro_receta = '$nro_receta'";
$result = $db->Execute($sql);

 $documento=$result->fields["nro_paciente"];
 $fecha_ingreso=$result->fields["fecha"];

 $dia_ingreso = substr($fecha_ingreso,8,2);
 $mes_ingreso = substr($fecha_ingreso,5,2);
  $anio_ingreso = substr($fecha_ingreso,2,2);



 $sql="select * from pacientes where `documento` = '$documento'";
$result = $db->Execute($sql);
$apellido=$result->fields["apellido"];
$nombre=$result->fields["nombre"];

$nombre_paciente = $apellido.", ".$nombre;

$fecha = date("Y-m-d");




?>

<BODY onload = "on_load()">



<FORM name="form" ACTION="guardar_entrega.php" METHOD = "POST">
  <table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td colspan="2" bgcolor="#C9C9C9"><div align="left"><font color="#0000FF" size="3" face="Trebuchet MS">PACIENTE: <?php echo $apellido;?> <?php echo $nombre;?> <?php print("$tipo_doc");?><?php echo $a; ?>
    </font></div>
    <div align="center"><a href="guardar_receta.php?operador=<?php print("$g");?>&&nro_paciente=<?php print("$a");?>&&nro_receta=<?php print("$nro_receta_nuevo");?>&&operador=<?php print("$operador");?>"></a></div></td>
    </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#EDEDED"><div align="right"><font size="2" face="Trebuchet MS">Fecha ingreso receta: </font></div></td>
    <td bgcolor="#EDEDED"><div align="left"> <font size="2" face="Trebuchet MS">
        <input name="dia_ingreso" type="text" id="dia_ingreso" value="<?php echo $dia_ingreso;?>" size="2" maxlength="2">
      /
      <input name="mes_ingreso" type="text" id="mes_ingreso" value="<?php echo $mes_ingreso;?>" size="2" maxlength="2">
      /20
      <input name="anio_ingreso" type="text" id="anio_ingreso" value="<?php echo $anio_ingreso;?>" size="2" maxlength="2">
      <input name="nro_receta" type="hidden"  value="<?php echo $nro_receta;?>" size="2" maxlength="2">
      <input name="documento" type="hidden"  value="<?php echo $documento;?>" size="2" maxlength="2">
    </font></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td width="371" bgcolor="#EDEDED">
      
      <div align="right"><font size="2" face="Trebuchet MS">Fecha entrega: </font></div>      </td>
    <td width="425" bgcolor="#EDEDED"><div align="left">
      <font size="2" face="Trebuchet MS">
      <input name="dia" type="text" id="dia" value="<?php echo $dia;?>" size="2" maxlength="2">
      /
      <input name="mes" type="text" id="mes" value="<?php echo $mes;?>" size="2" maxlength="2">
      /20
      <input name="anio" type="text" id="anio" value="<?php echo $anio;?>" size="2" maxlength="2">

	  <input name="nro_receta" type="hidden"  value="<?php echo $nro_receta;?>" size="2" maxlength="2">
 	  <input name="documento" type="hidden"  value="<?php echo $documento;?>" size="2" maxlength="2">
      </font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#EDEDED">
      
   
    
      <div align="right"><font size="2" face="Trebuchet MS">Hora:</font>      </div></td>
    <td bgcolor="#EDEDED"><div align="left"> <font size="2" face="Trebuchet MS">
        <input name="horas" type="text" id="horas" value="<?php echo $horas;?>" size="2" maxlength="2">
        :
      <input name="minutos" type="text" id="minutos" value="<?php echo $minutos;?>" size="2" maxlength="2">
    hs</font>.</div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td colspan="2" bgcolor="#C9C9C9"><label>
      <input type="submit" name="Submit" value="ENTREGAR AL PACIENTE">
    </label></td>
    </tr>
</table>

</form>
</body>







</html>

