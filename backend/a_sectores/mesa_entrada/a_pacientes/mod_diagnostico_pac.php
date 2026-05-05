<script language="javascript">
function on_load()
{
document.getElementById("documento").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "documento":
				document.getElementById("programa").focus();
				break;
				case "programa":
				document.getElementById("cod_diagnostico").focus();
				break;

				case "cod_diagnostico":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("localizacion").focus();
				break;

				case "localizacion":
				document.getElementById("pri1").focus();
				break;
				
				case "pri1":
				document.getElementById("pri2").focus();
				break;

				case "pri2":
				document.getElementById("estadio").focus();
				break;


				case "estadio":
				document.getElementById("fuente").focus();
				break;
				case "fuente":
				document.getElementById("matricula").focus();
				break;
				case "matricula":
				document.getElementById("observaciones").focus();
				break;
				case "observaciones":
				document.getElementById("siguiente").focus();
				break;
								
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load()">

<?php 

 

 $cod_paciente = $_REQUEST['cod_paciente'];
 

include ("../../../conexiones/config_usu.php");
$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);

$nombre=strtoupper($result->fields["nombre"]);
$documento=strtoupper($result->fields["documento"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);

$apellido=strtoupper($result->fields["apellido"]);
$nombre_completo = $apellido.", ".$nombre; 

	
 $sql="select * from `paciente_diagnostico` where documento = $documento and tipo_doc = $tipo_doc";
$result = $db->Execute($sql);

 $cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]);
$fecha_diagnostico=strtoupper($result->fields["fecha_diagnostico"]);
$localizacion=strtoupper($result->fields["localizacion"]);
$base=$result->fields["base"];
  $primario_multiple=strtoupper($result->fields["primario_multiple"]);
$estadio=strtoupper($result->fields["estadio"]);
$cod_fuente=strtoupper($result->fields["cod_fuente"]);
$matricula=strtoupper($result->fields["matricula"]);
$observaciones=strtoupper($result->fields["observaciones"]);
$programa=strtoupper($result->fields["programa"]);


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);
 	
$sql="select * from fuentes where nro_fuente = '$cod_fuente'";
$result = $db->Execute($sql);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);


$dia = substr($fecha_diagnostico,8,2);
$mes= substr($fecha_diagnostico,5,2);
$anio = substr($fecha_diagnostico,0,4);


?>


<form action="mod_diag_pac.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DIAGNOSTICOS (Registro de Tumor) </strong></font></div></td>
  </tr>
  
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="35%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        <input type="hidden" name="documento"  size="15" id="documento" value= "<?php echo $documento;?>">
		   <input type="hidden" name="tipo_doc"  size="15" id="documento" value= "<?php echo $tipo_doc;?>">


        </font></strong> </font><font color="#000000" size="2" face="Trebuchet MS"><strong><?php echo $nombre_completo;?> <?php echo $tipo_doc;?> - <?php echo $documento;?></strong></font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Programa</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">


      <select name="programa[]" id="programa" onkeypress="return verif_caracter(this,event)">

	    <option value selected= "<?php  "$programa";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$programa");?></font></strong></font></option>
<optgroup label="Cambiar por:">

        <option value="PAPO" selected>PAPO</option>
        <option value="OSEP">OSEP</option>
      </select>
    </font></td>
    <td width="6%" rowspan="5" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS">Base</font></div></td>
    <td width="31%" rowspan="5" valign="top" bgcolor="#E6E6E6"><font size="2"> 
      <select name="base[]" size="10" multiple id="base" onkeypress="return verif_caracter(this,event)">


   <option value selected= "<?php  "$base";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$base");?></font></strong></font></option>
<optgroup label="Cambiar por:">


        <option value="Sin Especificar">Sin Especificar</option>
        <option value="Certificado de Defuncion">Certificado de Defunción</option>
        <option value="Clínica">Clínica</option>
        <option value="Diagnostico por imagenes y/o endoscopias">Diagnostico por 
        imagenes y/o endoscopias</option>
        <option value="Cirugía Exploratoria/autopsia">Cirugía Exploratoria/autopsia</option>
        <option value="Marcadores Especificos">Marcadores Especificos</option>
        <option value="Citologia/Cito-hematología">Citologia/Cito-hematología</option>
        <option value="Histologia de Metastasis">Histologia de Metastasis</option>
        <option value="Histología de Tumor Primario">Histología de Tumor Primario</option>
        <option value="Autopsia c/ histologia simultanea o previa">Autopsia c/ 
        histologia simultanea o previa</option>

		</optgroup>
      </select>
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Diagnostico</font></div></td>
    <td width="28%" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from diagnostico ORDER BY nombre_diagnostico";
$result = $db->Execute($sql);
echo "<select name=cod_diagnostico[] size=1 id =cod_diagnostico onKeyPress='return verif_caracter(this,event)'>";


  ?> <option value selected= "<?php  "$cod_diagnostico";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$nombre_diagnostico");?></font></strong></font></option>
<optgroup label="Cambiar por:">

<?php 

echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_diagnostico"];
$a1=strtoupper($result->fields["nombre_diagnostico"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Fecha de Diagnostico</font></div></td>
    <td bgcolor="#E6E6E6"> <div align="left">  
        <font size="2" face="Trebuchet MS"> 
        <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" value = "<?php echo $dia;?>" size="2" maxlength="2">
        / 
        <input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" value = "<?php echo $mes;?>" size="2" maxlength="2">
        / 
        <input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" value = "<?php echo $anio;?>" size="3" maxlength="4">
    </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localización</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="text" name="localizacion" id="localizacion"  value = "<?php echo $localizacion;?>" size="30"onKeyPress="return verif_caracter(this,event)">

	        <input type="hidden" name="cod_paciente" id="cod_paciente"  value = "<?php echo $cod_paciente;?>">


    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Primarios Multiples </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">


	<?php if (($primario_multiple == "") or ($primario_multiple == "N")){?>
      <input name="primario_multiple" type="radio" value="S" id="pri1" onKeyPress="return verif_caracter(this,event)" >
      SI
      <input name="primario_multiple" type="radio"  id="pri2" onKeyPress="return verif_caracter(this,event)" value="N" checked> 
      NO
	  <?php }else{?>

      <input name="primario_multiple" type="radio" id="pri1" onKeyPress="return verif_caracter(this,event)" value="S" checked selected>
      SI
      <input name="primario_multiple" type="radio" value="N"  id="pri2" onKeyPress="return verif_caracter(this,event)" > 
      NO


<?php }?>


    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Estadio</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="text" name="estadio" id="estadio"  value = "<?php echo $estadio;?>" size="1"onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">&nbsp;</font></td>
    <td valign="top" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fuente</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from fuentes ORDER BY nombre_fuente";
$result = $db->Execute($sql);
echo "<select name=fuente[] size=1 id =fuente onKeyPress='return verif_caracter(this,event)'>";

?>
<option value selected= "<?php  "$cod_fuente";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$nombre_fuente");?></font></strong></font></option>
<optgroup label="Cambiar por:">
<?php

echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_fuente"];
$a1=strtoupper($result->fields["nombre_fuente"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">&nbsp;</font></td>
    <td valign="top" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Matricula del Profesional</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <input type="text" name="matricula" id="matricula"   value = "<?php echo $matricula;?>"  size="3"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="observaciones" id="observaciones"   value = "<?php echo $observaciones;?>" size="65" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2">
      <input type="Submit" name="Submit"  id ="siguiente" value="MODIFICAR DIAGNOSTICO">
    </font></div></td>
  </tr>
</table>
</form>