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
<style type="text/css">
<!--
.Estilo4 {font-size: xx-small}
.Estilo22 {font-family: "Trebuchet MS"}
.Estilo55 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo59 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000099; }
.Estilo60 {font-size: 12px; color: #000099; }
.Estilo7 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<table width="154"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">PROVEEDORES</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
<li><a href="proveedores/entrada_dato.php" target = "central1" >Ingreso  PROVEEDORES</a></li>

  <form action="separar_busqueda.php" method = "post" name="form" target = "central1" id="form">
    <div align="center"></div>
    <table width="140" border="0">
    <tr>
      <td bgcolor="#000099" scope="col"><div align="center"></div></td>
    </tr>
    <tr>
      <td scope="col"><span class="Estilo8">
          <select name="opciones[]" id="busqueda">
            <option value="mod_pro">PROVEEDORES</option>
            
            </optgroup>
          </select>
          <br />
          <input type = "text" name = "busca" size = "10" />
          <input type = "submit" name = "ok" value = "OK" />
          <input type="hidden" name="buscador_rapido" value="2" />
      </td>
    </tr>
  </form>
</li></ul>
		</ul>
</div>
  
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
