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
				document.getElementById("dia").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

<?php  

 
 $cod_paciente = $_REQUEST['cod_paciente'];



include ("../../../conexiones/config_usu.php");

 $sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);

$cod_paciente=strtoupper($result->fields["cod_paciente"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);
$documento=strtoupper($result->fields["documento"]);
$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$calle=strtoupper($result->fields["calle"]);
$puerta=strtoupper($result->fields["puerta"]);
$telefono=$result->fields["telefono"];
$direccion= $calle." ".$nro;
$estado=strtoupper($result->fields["estado"]);
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);

$fecha_estado=$result->fields["fecha_estado"];
$dia_estado=substr($fecha_estado,8,2);
$mes_estado=substr($fecha_estado,5,2);
$anio_estado=substr($fecha_estado,0,4);

$observaciones=strtoupper($result->fields["observaciones"]);

$referencia=strtoupper($result->fields["referencia"]);
$cod_postal=strtoupper($result->fields["cod_postal"]);
$calle_residencia=strtoupper($result->fields["calle_residencia"]);
$puerta_residencia=strtoupper($result->fields["puerta_residencia"]);
$referencia_residencia=strtoupper($result->fields["referencia_residencia"]);
$localidad_residencia=strtoupper($result->fields["localidad_residencia"]);
$cod_postal_residencia=strtoupper($result->fields["cod_postal_residencia"]);
$telefono_residencia=strtoupper($result->fields["telefono_residencia"]);
$celular_residencia=strtoupper($result->fields["celular_residencia"]);

$provincia=strtoupper($result->fields["provincia"]);

$fecha_nac=$result->fields["fecha_nac"];
$dia=substr($fecha_nac,8,2);
$mes=substr($fecha_nac,5,2);
$anio=substr($fecha_nac,0,4);


$lugar_nac=strtoupper($result->fields["lugar_nac"]);
$sexo=strtoupper($result->fields["sexo"]);
$estado_civil=strtoupper($result->fields["estado_civil"]);
$autorizados_profe=strtoupper($result->fields["autorizados_profe"]);


$sql1="select * from afiliaciones where documento = $documento";
$result1 = $db->Execute($sql1);

$nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);




 $sql2="select * from paciente_diagnostico where documento = $documento  order by fecha_diagnostico desc";
$result2 = $db->Execute($sql2);

$nro_ficha=$result2->fields["nro_ficha"];

 $cod_diagnostico=$result2->fields["cod_diagnostico"];
$fecha_diagnostico=$result2->fields["fecha_diagnostico"];
$base=$result2->fields["base"];
$cod_fuente=$result2->fields["cod_fuente"];
$matricula=$result2->fields["matricula"];
$observaciones=$result2->fields["observaciones"];

$sql3="select * from diagnostico where nro_diagnostico like '$cod_diagnostico' ";
$result3 = $db->Execute($sql3);

$nombre_diagnostico=$result3->fields["nombre_diagnostico"];


$sql4="select * from fuentes where nro_fuente like '$cod_fuente'";
$result4 = $db->Execute($sql4);

$nombre_fuente=$result4->fields["nombre_fuente"];

?>

<BODY onload = "on_load()">
<form action="mod_paciente.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="5" valign="top" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>MODFICAR PACIENTES</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="22%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
        <input name="documento" type="text" id="documento" onKeyPress="return verif_caracter(this,event)" value="<?php echo $documento;?>"  size="15">
    </strong></font><font size="2" face="Trebuchet MS"> Tipo / doc</font>
    <select name="tipo_doc[]" id="tipo_doc"onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$tipo_doc";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$tipo_doc");?></font></strong></font></option>
        </optgroup>
        <option value = "3">D.N.I</option>
        <option value = "1">L.E</option>
        <option value = "2">L.C</option>
        <option value = "5">C.E</option>
        <option value = "6">PAS</option>
        <option value = "6">C.I</option>
    </select>
     Modificar por: <font color="#000000" size="2" face="Trebuchet MS"><strong>
     <input name="documento_nuevo" type="text" id="documento_nuevo" onKeyPress="return verif_caracter(this,event)"  size="15">
     </strong></font></div>      </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Apellido</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <input name="apellido" type="text" id="apellido"onKeyPress="return verif_caracter(this,event)" value="<?php  echo $apellido; ?>"  size="30">
 Nombre 
      <input name="nombre" type="text"  id="nombre" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $nombre; ?>"  size="30">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Estado</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><select name="estado[]" id="estado" onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$estado";?>"> <font size="2" face="Trebuchet MS">
        <?php  print("$estado");?>
        </font></option>
        </optgroup>
        <option value="Activo"><font size="2" face="Trebuchet MS">Activo</font></option>
        <option value ="Renuncia"><font size="2" face="Trebuchet MS">Renuncia</font></option>
        <option value ="Baja"><font size="2" face="Trebuchet MS">Baja</font></option>
        <option value ="Suspendido"><font size="2" face="Trebuchet MS">Suspendido</font></option>
        <option value ="Vitalicio"><font size="2" face="Trebuchet MS">Vitalicio</font></option>
        <option value ="Fallecido"><font size="2" face="Trebuchet MS">Fallecido</font></option>
        </select>
        <font size="2" face="Trebuchet MS"> Fecha Estado </font><font color="#000000" size="2" face="Trebuchet MS"> 
      <input name="dia_estado" type="text" id="dia_estado"onKeyPress="return verif_caracter(this,event)" value="<?php  echo $dia_estado; ?>" size="2" maxlength="2">
      / 
      <input name="mes_estado" type="text" id="mes_estado"onKeyPress="return verif_caracter(this,event)" value="<?php  echo $mes_estado; ?>" size="2" maxlength="2">
      / 
      <strong>
      <input name="anio_estado" type="text" id="anio_estado"onKeyPress="return verif_caracter(this,event)" value="<?php  echo $anio_estado; ?>" size="3" maxlength="4">
    </strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="4" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="observaciones" type="text" id="observaciones" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $observaciones; ?>"size="65">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DDDDDD"> 
    <td colspan="2" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>Domicilio</strong></font></div></td>
    <td colspan="3" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>Residencia</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle </font></div></td>
    <td width="23%" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="calle" type="text"  id="calle" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $calle; ?>" size="40">
    </font></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Calle </font></div></td>
    <td width="45%" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="calle_residencia" type="text"  id="calle_residencia" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $calle_residencia; ?>" size="40">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="puerta" type="text" id="puerta" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $puerta; ?>" size="5">
    </font></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Puerta</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="puerta_residencia" type="text" id="puerta_residencia" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $puerta_residencia; ?>" size="5">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="referencia" type="text" id ="referencia" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $referencia; ?>" size="20">
    </font></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Referencia</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="referencia_residencia" type="text" id ="referencia_residencia" onKeyPress="return verif_caracter(this,event)" value="<?php  echo $referencia_residencia; ?>" size="20">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Departamento</font></div></td>
    <td bgcolor="#E6E6E6"><select name="departamento[]" id="departamento"onkeypress="return verif_caracter(this,event)">
	
	<optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$departamento";?>"> <font size="2" face="Trebuchet MS"><?php print("$departamento");?></font></option>
		</optgroup>

		<optgroup label="Gran Mendoza"> 
        <option value="Ciudad"><font size="2" face="Trebuchet MS">Ciudad</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Godoy Cruz"><font size="2" face="Trebuchet MS">Godoy Cruz</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Las Heras"><font size="2" face="Trebuchet MS">Las Heras</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Guaymallen"><font size="2" face="Trebuchet MS">Guaymallen</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Lujan"><font size="2" face="Trebuchet MS">Lujan</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Maipu"><font size="2" face="Trebuchet MS">Maipu</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
		</optgroup>
        <optgroup label="Valle de Uco"> 
        <option value="Tupungato"><font size="2" face="Trebuchet MS">Tupungato</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Tunuyan"><font size="2" face="Trebuchet MS">Tunuyan</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
		        <option value="San Carlos"><font size="2" face="Trebuchet MS">San Carlos</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        </optgroup>
        <optgroup label="Este">
		        <option value="San Martin"><font size="2" face="Trebuchet MS">San Martin</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Junin"><font size="2" face="Trebuchet MS">Junin</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
		        <option value="Rivadavia"><font size="2" face="Trebuchet MS">Rivadavia</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Beltran"><font size="2" face="Trebuchet MS">Beltran</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
		        <option value="Rivadavia"><font size="2" face="Trebuchet MS">La Paz</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
        <option value="Beltran"><font size="2" face="Trebuchet MS">Santa Rosa</font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font><font size="2" face="Trebuchet MS"></font></option>
</optgroup>


            </select>    </td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input name="localidad_residencia" type="text" id ="localidad_residencia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $localidad_residencia; ?>" size="20"> 
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Localidad</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input name="localidad" type="text" id ="localidad" onKeyPress="return verif_caracter(this,event)" value="<?php echo $localidad; ?>" size="20"> 
    </font></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">C.Postal</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="cod_postal_residencia" type="text" id ="cod_postal_residencia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_postal_residencia; ?>" size="5">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Postal</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="cod_postal" type="text" id ="cod_postal" onKeyPress="return verif_caracter(this,event)" value="<?php echo $cod_postal; ?>" size="5">
    </font></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2"><strong><font color="#000000" face="Trebuchet MS"> 
      <input name="telefono_residencia" type="text" id="telefono_residencia"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono_residencia; ?>"  size="9">
    </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Telefono</font></div></td>
    <td bgcolor="#E6E6E6"><strong><font color="#000000" size="2" face="Trebuchet MS"> 
      <input name="telefono" type="text" id="telefono"onKeyPress="return verif_caracter(this,event)" value="<?php echo $telefono; ?>"  size="9">
    </font></strong></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Celular</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2"><strong><strong> 
    <strong><font color="#000000" face="Trebuchet MS">
    <input name="celular_residencia" type="text" id="celular_residencia"onKeyPress="return verif_caracter(this,event)" value="<?php echo $celular_residencia; ?>"  size="9">
    </font></strong> </strong> </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Provincia</font></div></td>
    <td bgcolor="#E6E6E6"><select name="provincia[]" id="provincia"onkeypress="return verif_caracter(this,event)">
        <optgroup label="Opcion Seleccionada">
        <option value selected= "<?php  "$provincia";?>"> <font size="2" face="Trebuchet MS"><?php print("$provincia");?></font></option>
        </optgroup>
        <optgroup label="PROVINCIAS">
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
    </td>
    <td colspan="2" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="5" bgcolor="#999999"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>Datos 
    Personales </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Fecha 
        Nac.</font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <input name="dia" type="text" id="dia"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia; ?>" size="2" maxlength="2">
      / 
      <input name="mes" type="text" id="mes"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes; ?>" size="2" maxlength="2">
      / 
      <input name="anio" type="text" id="anio"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio; ?>" size="3" maxlength="4">
    </font></td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Lugar 
    Nac. </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="lugar_nac" type="text" id="lugar_nac" onKeyPress="return verif_caracter(this,event)" value="<?php echo $lugar_nac; ?>" size="20">
    <em><font color="#FF0000" size="1">* Si es extranjero completar Pais.</font></em></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Sexo</font></div></td>
    <td bgcolor="#E6E6E6"><select name="sexo[]" id="sexo" onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php "$sexo";?>"> <font color="#000000" size="2" face="Trebuchet MS"><?php print("$sexo");?></font></option>
        </optgroup>
        <option value="Masculino"><font color="#000000" size="2" face="Trebuchet MS">Masculino</font></option>
        <option value ="Femenino"><font color="#000000" size="2" face="Trebuchet MS">Femenino</font></option>
      </select>    </td>
    <td colspan="2" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">E. Civil</font></div></td>
    <td bgcolor="#E6E6E6"><select name="estado_civil[]" id="estado_civil" onkeypress="return verif_caracter(this,event)"><optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php "$estado_civil";?>"> <font color="#000000" size="2" face="Trebuchet MS"><?php print("$estado_civil");?></font></option>
        </optgroup>
        <option value="Casado/a"><font color="#000000" size="2" face="Trebuchet MS">Casado/a</font></option>
        <option value ="Soltero/a"><font color="#000000" size="2" face="Trebuchet MS">Soltero/a</font></option>
        <option value ="Divorciado/a"><font color="#000000" size="2" face="Trebuchet MS">Divorciado/a</font></option>
        <option value ="Viudo/a"><font color="#000000" size="2" face="Trebuchet MS">Viudo/a</font></option>
      </select>    </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><font size="2" face="Arial, Helvetica, sans-serif">Paciente autorizado profe</font> </td>
    <td bgcolor="#E6E6E6"><form name="form1" method="post" action="">
     
	  
 

<?php if ($autorizados_profe == 1){?>
	  <input name="autorizados_profe" type="checkbox" id="autorizados_profe" value="0" checked>
<?php }else{?>
<input name="autorizados_profe" type="checkbox" id="autorizados_profe" value="1" >
<?php }?>


    </form></td>
    <td colspan="2" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td colspan="5" valign="top" bgcolor="#999999"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="hidden" name="tipo"  value="modificar">
      <input type="hidden" name="nro_os"  value="<?php echo $nro_os;?>">
      <input type="hidden" name="nro_afiliado"   value="<?php echo $nro_afiliado;?>">
      <input type="hidden" name="otros"   value="<?php echo $otros;?>">
      <input type="hidden" name="sigla"   value="<?php echo $sigla;?>">
	        <input type="hidden" name="cod_paciente"   value="<?php echo $cod_paciente;?>">
      
      <input type="hidden" name="mod"   value="SI">
      
      <input type="Submit" name="Submit"  id= "siguiente" value="GUARDAR MODIFICACION">
    </font></div></td>
  </tr>
</table>
