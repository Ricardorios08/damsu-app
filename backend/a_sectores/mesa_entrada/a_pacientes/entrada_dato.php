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
				document.getElementById("tipo_doc").focus();
				break;
				case "tipo_doc":
				document.getElementById("apellido").focus();
				break;
				case "apellido":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("estado").focus();
				break;
				case "estado":
				document.getElementById("dia_estado").focus();
				break;
				case "dia_estado":
				document.getElementById("mes_estado").focus();
				break;
				case "mes_estado":
				document.getElementById("anio_estado").focus();
				break;
				case "anio_estado":
				document.getElementById("observaciones").focus();
				break;
				case "observaciones":
				document.getElementById("calle").focus();
				break;
				case "calle":
				document.getElementById("puerta").focus();
				break;

				case "puerta":
				document.getElementById("referencia").focus();
				break;
				case "referencia":
				document.getElementById("departamento").focus();
				break;
				case "departamento":
				document.getElementById("localidad").focus();
				break;
				case "localidad":
				document.getElementById("cod_postal").focus();
				break;
				case "cod_postal":
				document.getElementById("telefono").focus();
				break;
				
				case "telefono":
				document.getElementById("provincia").focus();
				break;
				
				case "provincia":
				document.getElementById("dia").focus();
				break;

				
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("sexo").focus();
				break;

				case "sexo":
				document.getElementById("lugar_nac").focus();
				break;
				
				case "lugar_nac":
				document.getElementById("estado_civil").focus();
				break;
				
				case "estado_civil":
				document.getElementById("siguiente").focus();
				break;




				case "calle_residencia":
				document.getElementById("puerta_residencia").focus();
				break;

				case "puerta_residencia":
				document.getElementById("referencia_residencia").focus();
				break;
				case "referencia_residencia":
				document.getElementById("localidad_residencia").focus();
				break;
				
				case "localidad_residencia":
				document.getElementById("cod_postal_residencia").focus();
				break;
				case "cod_postal_residencia":
				document.getElementById("telefono_residencia").focus();
				break;
				case "telefono_residencia":
				document.getElementById("celular_residencia").focus();
				break;
				case "celular_residencia":
				document.getElementById("nro_afiliado").focus();
				break;

				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("dia_a").focus();
				break;
				case "dia_a":
				document.getElementById("mes_a").focus();
				break;
				case "mes_a":
				document.getElementById("anio_a").focus();
				break;
				case "anio_a":
				document.getElementById("otros").focus();
				break;
				


				
		}
		return false;
	}
	return true;
}


</script>


<BODY  onload = "on_load()">

<?php 

$documento = $_REQUEST['documento'];
$operador= $_REQUEST['operador'];

?>



<form action="guardar_paciente.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="28" colspan="5" bgcolor="#CCCCCC"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>ALTA 
        DE PACIENTES</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="22%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div>      <div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
        </strong></font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><div align="left"><font size="2" face="Trebuchet MS"><strong><font color="#000000">
      <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)">
        <option value = "3">D.N.I </option>
        <option value = "1">L.E </option>
        <option value = "2">L.C </option>
        <option value = "5">C.E</option>
        <option value = "6">PAS</option>
        <option value = "6">C.I</option>
      </select>



      </font></strong>N&ordm;</font><font color="#000000" size="2" face="Trebuchet MS"><strong>
        <input type="text" name="documento"  size="15" id="documento" onKeyPress="return verif_caracter(this,event)" value="<?php echo $documento;?>">
    </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Apellido</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><strong> </strong></font><font color="#000000" size="2" face="Trebuchet MS">
    <input type="text" name="apellido" id="apellido"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font><font color="#000000" size="2" face="Trebuchet MS">Nombre</font><font color="#000000" size="2" face="Trebuchet MS">
    <input type="text" name="nombre"  id="nombre"  size="30" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Estado</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"> <font size="2" face="Trebuchet MS"> 
      <select name="estado[]" id="estado" onkeypress="return verif_caracter(this,event)">
        <option value="Activo">Activo</option>
        <option value ="Suspendido">Suspendido</option>
        <option value ="Fallecido">Fallecido</option>
      </select>
 Fecha Estado </font><font color="#000000" size="2" face="Trebuchet MS"> 
      <input type="text" name="dia_estado" id="dia_estado"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="mes_estado" id="mes_estado"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="anio_estado" id="anio_estado"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="observaciones" id="observaciones"size="65" onKeyPress="return verif_caracter(this,event)">
      </font></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#DDDDDD"> 
    <td colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>Domicilio</strong></font></div></td>
    <td colspan="3" bgcolor="#CCCCCC"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>Residencia</strong></font></div></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle </font></div></td>
    <td width="23%" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="calle"  id="calle" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td width="16%" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle </font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="calle_residencia"  id="calle_residencia" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="puerta" id="puerta" size="5" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="puerta_residencia" id="puerta_residencia" size="5" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="referencia" id ="referencia" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="referencia_residencia" id ="referencia_residencia" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Departamento</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2"> 
      <select name="departamento[]" id="departamento"onkeypress="return verif_caracter(this,event)">
        <optgroup label="Centro"> 
        <option value="Ciudad"><font size="2">Ciudad</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Godoy Cruz"><font size="2">Godoy Cruz</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Guaymallen"><font size="2">Guaymallen</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Lujan"><font size="2">Lujan</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Maipu"><font size="2">Maipu</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		</optgroup>
        <optgroup label="Valle de Uco"> 
        <option value="Tupungato"><font size="2">Tupungato</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Tunuyan"><font size="2">Tunuyan</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		        <option value="San Carlos"><font size="2">San Carlos</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        </optgroup>
        <optgroup label="Este">
		        <option value="San Martin"><font size="2">San Martin</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Santa Rosa"><font size="2">Santa Rosa</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		        <option value="Rivadavia"><font size="2">Rivadavia</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
        <option value="Junin"><font size="2">Junin</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		        <option value="La Paz"><font size="2">La Paz</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		</optgroup> 
		<optgroup label="Norte">
        <option value="Las Heras"><font size="2">Las Heras</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		        <option value="Lavalle"><font size="2">Lavalle</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		</optgroup>
				<optgroup label="Sur">
        <option value="Malargue"><font size="2">Malargue</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		        <option value="San Rafael"><font size="2">San Rafael</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		        <option value="Gral Alvear"><font size="2">Gral Alvear</font><font size="2"></font><font size="2"></font><font size="2"></font></option>
		</optgroup>
      </select>
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2">
      <input type="text" name="localidad_referencia" id ="localidad_residencia" size="20" onKeyPress="return verif_caracter(this,event)"> 
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2">
      <input type="text" name="localidad" id ="localidad" size="20" onKeyPress="return verif_caracter(this,event)"> 
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="cod_postal_residencia" id ="cod_postal_residencia" size="5" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="cod_postal" id ="cod_postal" size="5" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font size="2"><strong><font color="#000000" size="2"> 
      <input type="text" name="telefono_residencia" id="telefono_residencia"  size="9"onKeyPress="return verif_caracter(this,event)">
    </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono</font></div></td>
    <td bgcolor="#E6E6E6"><strong><font color="#000000" size="2"> 
      <input type="text" name="telefono" id="telefono"  size="9"onKeyPress="return verif_caracter(this,event)">
    </font></strong></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Celular</font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><strong><font size="2"><strong><font color="#000000" size="2"> 
</font><font size="2"><strong><font color="#000000" size="2">
<input type="text" name="celular_residencia" id="celular_residencia"  size="9"onKeyPress="return verif_caracter(this,event)">
</font></strong></font><font color="#000000" size="2">      </font></strong></font><font color="#000000" size="2"> </font></strong></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Provincia</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2">
      <select name="provincia[]" id="provincia"onkeypress="return verif_caracter(this,event)">
        <option value="Mendoza" selected>Mendoza</option>
        <option value="San Luis">San Luis</option>
        <option value="San Juan">San Juan</option>
        <option value="La Rioja">La Rioja</option>
        <option value="Santa Rosa">Santa Rosa</option>
        <option value="Neuquen">Neuquen</option>
        <option value="Rio Negro">Rio Negro</option>
        <option value="Chubut">Chubut</option>
        <option value="Tierra del Fuego">Tierra del Fuego</option>
        <option value="Cordoba">Cordoba</option>
        <option value="Catamarca">Catamarca</option>
        <option value="Tucuman">Tucuman</option>
        <option value="Salta">Salta</option>
        <option value="Jujuy">Jujuy</option>
        <option value="Misiones">Misiones</option>
        <option value="Corrientes">Corrientes</option>
        <option value="Chaco">Chaco</option>
        <option value="Buenos Aires">Buenos Aires</option>
        
        </optgroup>
                  </select>
    </font></td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DDDDDD"> 
    <td colspan="5" bgcolor="#CCCCCC"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>Datos 
        Personales </strong></font></div></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Fecha 
    Nac.</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2"> 
      <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Lugar 
    Nac. </font></div></td>
    <td width="18%" bgcolor="#E6E6E6"><font size="2"> 
      <input type="text" name="lugar_nac" id="lugar_nac" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td width="21%" rowspan="2" bgcolor="#E6E6E6"><div align="center"><font size="2"> <em><font color="#FF0000">* Si es extranjero completar Pais.</font></em></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Sexo</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2"> 
      <select name="sexo[]" id="sexo" onkeypress="return verif_caracter(this,event)">
        <option value="Masculino">Masculino</option>
        <option value ="Femenino">Femenino</option>
      </select>
    </font></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Estado Civil</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2"> 
      <select name="estado_civil[]" id="estado_civil" onkeypress="return verif_caracter(this,event)">
        <option value ="Ignorado">Ignorado</option>
		<option value ="Soltero/a">Soltero/a</option>
		<option value="Casado/a">Casado/a</option>
        <option value ="Concubino">Concubino</option>
		<option value ="Divorciado/a">Divorciado/a</option>
		<option value ="Separado">Separado</option>
		<option value ="Viudo/a">Viudo/a</option>
      </select>
    </font></td>
  </tr>
</table>



<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>AFILIACIONES</strong></font></div></td>
  </tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="44%" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Obra Social</font></div></td>
    <td width="56%" colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from obrasocial ORDER BY sigla";
$result = $db->Execute($sql);
echo "<select name=obrasocial[] size=1 id =obrasocial onKeyPress='return verif_caracter(this,event)'>";



echo"<option value=36>DAMSU</option>";


if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_os"];
$a1=strtoupper($result->fields["nombre_os"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"> <div align="left">  
        <font size="2" face="Trebuchet MS"> 
        <input type="text" name="nro_afiliado"  id="nro_afiliado" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fecha de afiliaci&oacute;n</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6">      <font size="2" face="Trebuchet MS">
      <input type="text" name="dia_a" id="dia_a"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="mes_a" id="mes_a"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="anio_a" id="anio_a"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="otros" id="otros"size="65" >
	   <input type="hidden" name="operador" value="<?php echo $operador;?>">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
    <input type="Submit" name="Submit2"  id= "Submit" value="GUARDAR PACIENTE">
    </font></div></td>
  </tr>
</table>
