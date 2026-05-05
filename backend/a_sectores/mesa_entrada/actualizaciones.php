<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.Estilo3 {
	font-family: "Trebuchet MS";
	color: #FFFFFF;
}
-->
</style>
<link href="../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../css/botonera.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo22 {font-family: "Trebuchet MS"}
.Estilo19 {color: #FFFFFF}
.Estilo21 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<form action="busquedas.php" method="post" target = "central1">

<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">MAESTROS</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
<li><a href="a_obras sociales/entrada_os.php" target = "central1" >1. OBRA SOCIAL</a></li>
<li><a href="a_pacientes/entrada_des_fuente.php" target = "central1" >2. FUENTES</a></li>
<li><a href="a_pacientes/entrada_des_diagnostico.php" target = "central1" > 3. DIAGNOSTICOS</a></li>
<li><a href="a_pacientes/entrada_des_prestaciones.php" target = "central1" >4. PRESTACIONES </a></li>
<li><a href="protocolo/entrada_protocolo.php" target = "central1" >5. CARGA PROTOCOLO </a></li>

<li><a href="../monodrogas/mercaderia/entrada_mercaderia.php" id="primero" target = "central1" >6. MONODROGAS</a></li>
<li><a href="../monodrogas/laboratorio/entrada_laboratorio.php" id="primero" target = "central1" >7. LABORATORIO</a></li>
<li><a href="../monodrogas/mercaderia/drogas.php" id="primero" target = "central1" >8. DROGA</a></li>
<li><a href="../monodrogas/proveedores/entrada_dato.php" id="primero" target = "central1" >9. PROVEEDORES</a></li>

<li><a href="a_pacientes/listado_pac.php" target = "central1" >2. PACI MAMA</a></li>

</ul>
		</ul>
</div>
  
  <table width="166" border="0">
    <tr>
         <td bgcolor="#666666"><div align="center" class="titulo">BUSCAR</div></td>
    </tr>
    
    <tr>
      <td><select name="busqueda[]" id="select2"><optgroup label="Pacientes">
        <div align="center">
        <option value="obra_social" selected="selected"><span class="Estilo22">OBRA SOCIAL</span></option>
        <option value="fuentes"><span class="Estilo22">FUENTES</span></option>
        <option value="diagnosticos"><span class="Estilo22">DIAGNOSTICOS</span></option>
        <option value="prestaciones"><span class="Estilo22">PRESTACIONES</span></option>
        <option value="protocolos"><span class="Estilo22">PROTOCOLOS</span></option>

		<option value="monodrogas"><span class="Estilo22">MONODROGAS</span></option>
		<option value="monodrogas_precio"><span class="Estilo22">MONO PRECIO</span></option>
<option value="monodrogas_entregas"><span class="Estilo22">MONO ENTREGAS</span></option>
		<option value="monodrogas_sin_lab"><span class="Estilo22">MONO. SIN-LAB</span></option>
			<option value="monodrogas_sin_dro"><span class="Estilo22">MONO. SIN-DRO</span></option>
			<option value="monodrogas_cant"><span class="Estilo22">MONO. CANT</span></option>
			<option value="monodrogas_repe"><span class="Estilo22">MONO. CONTROL</span></option>

		<option value="drogas"><span class="Estilo22">DROGAS</span></option>
			<option value="drogas_profe"><span class="Estilo22">DROGAS AUT PROFE</span></option>
		<option value="laboratorios"><span class="Estilo22">LABORATORIOS</span></option>
		<option value="proveedores"><span class="Estilo22">PROVEEDORES</span></option>




        </div>
        </optgroup>

        </select>
          </div>      </td>
    </tr>
    
    <tr>
      <td><span class="Estilo22">
      <input type = "text" name = "busca" size = "12" / class="ctxt">
      <input type = "submit" name = "ok" value = "OK" / class="bot1" >
      <input type="hidden" name="buscador_rapido" value="2" / >
      </span></td>
    </tr>
  </table>
  <!-- <form action="separar_busqueda.php" method="post" target = "central1">
<table width="152"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">BUSCAR</div></td>
  </tr>
  
  <tr>
    <td align="center" class="Estilo7" scope="row"><div align="right" class="Estilo78 Estilo80">
        <select name="opciones[]" id="opciones" onkeypress="return verif_caracter(this,event)">
          <option value ="Existencia">Mercaderia</option>
          <option value ="Mercaderia">Modificar</option>
        </select>
        <input type = "hidden" name = "buscador_rapido" value = "2" />
    </div></td>
  </tr>
  <tr>
    <td align="center" class="Estilo79" scope="row">Ingrese
      <input type = "text" name = "busca" size = "7" /></td>
  </tr>
  <tr>
    <td align="center" class="Estilo7" scope="row"><input name="Submit" type="submit" value="BUSCAR" /></td>
  </tr>
</table>
  </form> -->
  
</body>
</html>
