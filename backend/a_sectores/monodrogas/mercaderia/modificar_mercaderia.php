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

<?php 
$cod_barra = $_REQUEST['cod_barra'];


include ("variables.php");?>
<BODY onload = "on_load()">
  <form action="mod_mercaderia.php" method="post">
<table width="800" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#999999"> 
    <td colspan="2"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>ALTA 
      DE MONODROGAS</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td width="47%" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Troquel</font> 
      </div></td>
    <td width="53%" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="codigo" type="text" id="codigo" onKeyPress="return verif_caracter(this,event)" value="<?php echo $troquel;?>" size="10" >
      </font>      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Grupo</font> 
      </div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <select name="grupo[]" id="grupo" onkeypress="return verif_caracter(this,event)">
<option value selected= "<?php  print("$grupo");?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$nombre_grupo");?></font></strong></font></option>
        <option value="1" >Grupo 1</option>
        <option value ="2">Grupo 2</option>
        <option value ="3">Monoclonal</option>
      </select>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre 
      Comercial </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="nombre" type="text"  id="nombre" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nombre_comercial;?>"  size="35">
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Droga</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">  <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from drogas ORDER BY droga";
$result = $db->Execute($sql);
echo "<select name=cod_droga[] size=1 id =cod_droga onKeyPress='return verif_caracter(this,event)'>";

 ?><option value selected= "<?php print("$cod_droga");?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$nombre_droga");?></font></strong></font></option><?php

echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_droga"];
$a1=strtoupper($result->fields["droga"]);
echo"<option value=$cod>$a1 ($cod) </option>";
$result->MoveNext();
	}
echo"</select>";
?>     
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nueva Droga</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="nueva_droga" id="nueva_droga"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Presentaci&oacute;n</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="presentacion" type="text" id="presentacion"onKeyPress="return verif_caracter(this,event)" value="<?php echo $presentacion;?>"  size="30">
      (unidades y magnitud) </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Laboratorio</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from laboratorios GROUP BY cod_laboratorio ORDER BY cod_laboratorio";
$result = $db->Execute($sql);
echo "<select name=laboratorios[] size=1 id =laboratorio onKeyPress='return verif_caracter(this,event)'>";

 ?><option value selected= "<?php  "$cod_laboratorio";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$laboratorio");?> (<?php print("$cod_laboratorio");?>)</font></strong></font></option><?php


echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_laboratorio"];
$a1=strtoupper($result->fields["laboratorio"]);
echo"<option value=$cod>$a1 ($cod)</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nuevo Laboratorio </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="nuevo_laboratorio" id="nuevo_laboratorio"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DCBB76"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Cadena 
      de frio </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="radio" name="cadenafrio" value="SI"tabindex="26" >
      SI 
      <input type="radio" name="cadenafrio" value="NO" tabindex="27"checked="TRUE">
      NO </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">C&oacute;digo 
      de Barras</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="cod_barra" type="hidden" value = "<?php echo $cod_barra;?>">
    <?php echo $cod_barra;?></font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Modificar por Codigo </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input name="nuevo_cod_barra" type="text" id ="nuevo_cod_barra" onKeyPress="return verif_caracter(this,event)" size="20">
Contrase&ntilde;a
<input name="contrasena" type="password" id ="contrasena" onKeyPress="return verif_caracter(this,event)" size="4" maxlength="4">
    </font>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Porcentaje 
      Diferencial </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="margendif" type="text" id ="margendif" onKeyPress="return verif_caracter(this,event)" value="<?php echo $porc_dif;?>" size="5">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="observaciones" type="text" id ="observaciones" onKeyPress="return verif_caracter(this,event)" value="<?php echo $observaciones;?>" size="45">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Precio Actualizado </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input name="precio_actualizado" type="text" id ="precio_actualizado" onKeyPress="return verif_caracter(this,event)" value="<?php echo $precio_actualizado;?>" size="10">
    </font>  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Cant x Caja </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input name="cant_caja" type="text" id ="cant_caja" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cant_caja;?>" size="5">
    </font>  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Informar a ANMAT </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      
	  
	  
<?php if (($informar == "SI") or ($informar == "si")){
?><input type="radio" name="informar_anmat" value="SI" tabindex="26" checked>SI
<input type="radio" name="informar_anmat" value="NO" tabindex="27" >NO<?php
	}else{
?><input type="radio" name="informar_anmat" value="SI" tabindex="26" >SI
<input type="radio" name="informar_anmat" value="NO" tabindex="27" checked>NO<?php
	}
	?>



</font>  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6">&nbsp;</td>
    <td bgcolor="#E6E6E6">  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"> 
    <td colspan="2"><div align="center"> 
        <input type="Submit" name="Submit34" id = "guardar" value="GUARDAR" target = "arriba">
      </div></td>
  </tr>
</table>
</form>
