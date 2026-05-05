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

$band = $_REQUEST['band'];
$operador= $_REQUEST['operador'];

if ($band == 1){
$documento = $_REQUEST['documento'];
$tipo_doc = $_REQUEST['tipo_doc'];
$cod_paciente= $_REQUEST['cod_paciente'];



include ("../../../conexiones/config_usu.php");
include ("../../../funciones/funciones.php");

$sql="select * from pacientes where documento = $documento";
$result = $db->Execute($sql);

$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$nombre_completo = $apellido.", ".$nombre; 

	
}

$dia = date("d");
$mes= date("m");
$anio = date("Y");

$tipo = tipodoc($tipo_doc);

?>


<form action="guardar_diagnostico.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DIAGNOSTICOS (Registro de Tumor) </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Tipo Doc. </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><div align="left"><select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$tipo_doc";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$tipo");?></font></strong></font></option>
        </optgroup>
           <option value = "3">D.N.I </option>
        <option value = "1">L.E </option>
        <option value = "2">L.C </option>
        <option value = "5">C.E</option>
        <option value = "6">PAS</option>
        <option value = "6">C.I</option>
    </select></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="35%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        <input type="text" name="documento"  size="15" id="documento" value= "<?php echo $documento;?>" onKeyPress="return verif_caracter(this,event)">
        </font></strong> </font><font color="#000000" size="2" face="Trebuchet MS"><strong><?php echo $nombre_completo;?></strong></font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Programa</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <select name="programa[]" id="programa" onkeypress="return verif_caracter(this,event)">
        <option value="PAPO" selected>PAPO</option>
        <option value="OSEP">OSEP</option>
      </select>
    </font></td>
    <td width="6%" rowspan="5" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS">Base</font></div></td>
    <td width="31%" rowspan="7" valign="top" bgcolor="#E6E6E6"><font size="2"> 
      <select name="base[]" size="10" multiple id="base" onkeypress="return verif_caracter(this,event)">
        <option value="Sin Especificar" selected>Sin Especificar</option>
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
      </select>
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Diagnostico</font></div></td>
    <td width="28%" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from diagnostico ORDER BY nro_diagnostico, nombre_diagnostico";
$result = $db->Execute($sql);
echo "<select name=cod_diagnostico[] size=1 id =cod_diagnostico onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_diagnostico"];
$a1=strtoupper($result->fields["nombre_diagnostico"]);
$cod = str_pad($cod,  4, " "); 

echo"<option value=$cod>$cod - $a1</option>";
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
        <input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" value = "<?php echo $anio;?>"size="3" maxlength="4">
    </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localización</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="text" name="localizacion" id="localizacion"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Primarios Multiples </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input name="primario" type="radio" value="S" id="pri1" onKeyPress="return verif_caracter(this,event)">
      SI
      <input name="primario" type="radio" value="N"  id="pri2" onKeyPress="return verif_caracter(this,event)"> 
      NO
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Estadio</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS">
      <input type="text" name="estadio" id="estadio"  size="1"onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">&nbsp;</font></td>
    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fuente</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from fuentes ORDER BY nombre_fuente";
$result = $db->Execute($sql);
echo "<select name=fuente[] size=1 id =fuente onKeyPress='return verif_caracter(this,event)'>";
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
    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Matricula del Profesional</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <input type="text" name="matricula" id="matricula"  size="3"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="observaciones" id="observaciones"size="65" onKeyPress="return verif_caracter(this,event)">
   <input type="hidden" name="cod_paciente" value="<?php echo $cod_paciente;?>">
      <input type="hidden" name="operador" value="<?php echo $operador;?>">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2">
      <input type="Submit" name="Submit"  id ="siguiente" value="Siguiente">
    </font></div></td>
  </tr>
</table>
</form>