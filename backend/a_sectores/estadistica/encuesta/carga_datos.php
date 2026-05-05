<script language="javascript">
function on_load()
{
document.getElementById("codigo").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "codigo":
				document.getElementById("grupo").focus();
				break;
				case "grupo":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("cod_droga").focus();
				break;,
				case "cod_droga":
				document.getElementById("nueva_droga").focus();
				break;
				case "nueva_droga":
				document.getElementById("presentacion").focus();
				break;
				
				case "presentacion":
				document.getElementById("laboratorio").focus();
				break;
				case "laboratorio":
				document.getElementById("nuevo_laboratorio").focus();
				break;
				case "nuevo_laboratorio":
				document.getElementById("cod_barra").focus();
				break;,
				case "cod_barra":
				document.getElementById("precio_actualizado").focus();
				break;
				case "precio_actualizado":
				document.getElementById("guardar").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load()">

<?php 
include ("../../../conexiones/config_usu.php");

$sql2="select COUNT(preg1) as total from encuesta1";
$result2 = $db->Execute($sql2);
$total =strtoupper($result2->fields["total"]);



$sql2="select * from encuesta1 order by fecha desc";
$result2 = $db->Execute($sql2);
$fecha=strtoupper($result2->fields["fecha"]);


$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio= substr($fecha,2,2);

 $fecha = $dia.$mes.$anio;

if ($fecha == ""){
$dia = date("d");
$mes = date("m");
$anio= date("y");
}



?>
  <form action="guardar_encuesta.php" method="post">
<table width="800" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#999999">
    <td colspan="3"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>TRATO DEL PERSONAL. CARGADAS: <?php echo $total;?> </strong></font></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#999999"> 
    <td colspan="3" bgcolor="#AED7FF">FECHA ENCUESTA: 
      <label>
      <input name="dia" type="text" id="dia" value="<?php echo $dia;?>" size="2" maxlength="2">
      /
      <input name="mes" type="text" id="mes" value="<?php echo $mes;?>" size="2" maxlength="2">
      /20
      <input name="anio" type="text" id="anio" value="<?php echo $anio;?>" size="2" maxlength="2">
      </label></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td width="4%" bgcolor="#FFFFFF"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">1.</font> 
      </div></td>
    <td width="27%" bgcolor="#FFFFFF"><div align="left"><font size="2" face="Trebuchet MS">Personal de Recepci&oacute;n</font></div></td>
    <td width="69%" bgcolor="#FFFFFF"><div align="left"><font size="2" face="Trebuchet MS">
      <input type="radio" name="preg1" value="1"tabindex="26" >
      MALA
      <input type="radio" name="preg1" value="2" tabindex="27">
      REGULAR </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg1" value="3" tabindex="27">
        BUENO </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg1" value="4" tabindex="27">
          MUY BUENO
          <input type="radio" name="preg1" value="5" tabindex="27">
      EXCELENTE&nbsp;&nbsp;&nbsp;&nbsp; </font><font size="2" face="Trebuchet MS">
      <input name="preg1" type="radio" tabindex="27" value="6" checked>
NO UTILIZA </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td bgcolor="#FFFFDF"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">2.</font> 
      </div></td>
    <td bgcolor="#FFFFDF"><font size="2" face="Trebuchet MS">Secretaria</font></td>
    <td bgcolor="#FFFFDF"><div align="left"><font size="2" face="Trebuchet MS">
      <input type="radio" name="preg2" value="1"tabindex="26" >
      MALA
      <input type="radio" name="preg2" value="2" tabindex="27">
      REGULAR </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg2" value="3" tabindex="27">
        BUENO </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg2" value="4" tabindex="27">
          MUY BUENO
          <input type="radio" name="preg2" value="5" tabindex="27">
      EXCELENTE </font><font size="2" face="Trebuchet MS">
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input name="preg2" type="radio" tabindex="27" value="6" checked>
NO UTILIZA </font></div></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#FFFFFF"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">3.</font></div></td>
    <td bgcolor="#FFFFFF"><font size="2" face="Trebuchet MS">Demora recetas       
    </font>
    <td bgcolor="#FFFFFF"><div align="left"><font size="2" face="Trebuchet MS">
      <input type="radio" name="preg3" value="1"tabindex="26" >
      30 min a 1 hs
      <input type="radio" name="preg3" value="2" tabindex="27">
      + 1 Hora </font><font size="2" face="Trebuchet MS">
        <input type="radio" name="preg3" value="3" tabindex="27">
    M&aacute;s de 1 d&iacute;a </font> <font size="2" face="Trebuchet MS">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="preg3" type="radio" tabindex="27" value="6" checked>
NO UTILIZA </font></div>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#FFFFDF"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">4.</font></div></td>
    <td bgcolor="#FFFFDF"><font size="2" face="Trebuchet MS">Demora Monoclonales   
    </font>
    <td bgcolor="#FFFFDF"><div align="left"><font size="2" face="Trebuchet MS">
      <input type="radio" name="preg4" value="1"tabindex="26" >
      1 Semana 
  &nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="preg4" value="2" tabindex="27">
      + 15 d&iacute;as </font><font size="2" face="Trebuchet MS">
        <input type="radio" name="preg4" value="3" tabindex="27">
        M&aacute;s de 15 d&iacute;as
       &nbsp; <input type="radio" name="preg4" value="4" tabindex="27">
    1 Mes </font><font size="2" face="Trebuchet MS">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="preg4" type="radio" tabindex="27" value="6" checked>
NO UTILIZA </font></div>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#FFFFFF"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">5.</font></div></td>
    <td bgcolor="#FFFFFF"><font size="2" face="Trebuchet MS">Inf. por parte del personal   
    </font>
    <td bgcolor="#FFFFFF"><div align="left"><font size="2" face="Trebuchet MS">
      <input type="radio" name="preg5" value="1"tabindex="26" >
      MALA
      <input type="radio" name="preg5" value="2" tabindex="27">
      REGULAR </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg5" value="3" tabindex="27">
        BUENO </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg5" value="4" tabindex="27">
          MUY BUENO
          <input type="radio" name="preg5" value="5" tabindex="27">
    EXCELENTE </font> <font size="2" face="Trebuchet MS">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input name="preg5" type="radio" tabindex="27" value="6" checked>
NO UTILIZA </font></div>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#FFFFDF"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">6.</font></div></td>
    <td bgcolor="#FFFFDF"><font size="2" face="Trebuchet MS">Limpieza y aseo   
    </font>
    <td bgcolor="#FFFFDF"><div align="left"><font size="2" face="Trebuchet MS">
      <input type="radio" name="preg6" value="1"tabindex="26" >
      MALA
      <input type="radio" name="preg6" value="2" tabindex="27">
      REGULAR </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg6" value="3" tabindex="27">
        BUENO </font><font size="2" face="Trebuchet MS">
          <input type="radio" name="preg6" value="4" tabindex="27">
          MUY BUENO
          <input type="radio" name="preg6" value="5" tabindex="27">
    EXCELENTE </font> <font size="2" face="Trebuchet MS">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input name="preg6" type="radio" tabindex="27" value="6" checked>
NO UTILIZA </font></div>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"> 
    <td colspan="3"><div align="center"> 
        <input type="Submit" name="Submit34" id = "guardar" value="GUARDAR" target = "arriba">
      </div></td>
  </tr>
</table>



<?php



//include ("resultado1.php");
?>


  </form>
