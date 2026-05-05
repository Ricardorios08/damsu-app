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
.Estilo22 {font-family: "Trebuchet MS"}
.Estilo19 {color: #FFFFFF}
.Estilo21 {font-family: Arial, Helvetica, sans-serif}
.Estilo1 {color: #0000FF}
.Estilo12 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo58 {font-size: 12px}
.Estilo61 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
.Estilo63 {	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: medium;
	color: #FFFFFF;
}
-->
</style>
</head>

<body>
<table width="154"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">PREPARACION</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
<li><a href="compras/pagina1.php" target = "central1" class="Estilo7 Estilo58" >1. HISTORIA CLINICA </a></li>
<li><a href="proveedores/compra_proveedores/compras_pro.php" target = "central1" class="Estilo12" >2. EXISTENCIA </a></li>
<li><a href="proveedores/compra_proveedores/compras_pro.php" target = "central1" class="Estilo12" >3. PROTOCOLO</a></li>
<li><a href="proveedores/compra_proveedores/compras_pro.php" target = "central1" class="Estilo12" >4. RECETAS</a></li>
<li><a href="proveedores/compra_proveedores/compras_pro.php" target = "central1" class="Estilo12" >5. PACIENTES</a></li>
<li><a href="protocolo/entrada_protocolo.php" target = "central1" >6. CARGA PROTOCOLO </a></li>

<li><a href="mercaderia/drogas.php" target = "central1" >7. MOD.  RECETA</a></li>

</ul>
		</ul>
</div>
  
  <table width="154" border="0">
    
    <tr bgcolor="#000099">
      <td width="153" colspan="2" bgcolor="#666666" scope="col"><div align="center" class="Estilo6 Estilo1"><span class="Estilo3">Buscar</span></div></td>
    </tr>
    <tr >
      <td colspan="2" scope="col"><div align="center"> <font color="#FFFFFF">
          <select name="opciones[]" id="opciones" onkeypress="return verif_caracter(this,event)">
            <option value ="proveedores">Proveedores</option>
            <option value="laboratorios">Laboratorios</option>
            <option value="vademecum">Vademecum</option>
            <option value="drogas">Drogas</option>
          </select>
      </font></div></td>
    </tr>
    <tr >
      <td colspan="2" scope="col">Ingrese
        <input type = "text" name = "busca" size = "7" />
          <input type = "hidden" name = "buscador_rapido" value = "2" /></td>
    </tr>
    <tr >
      <td colspan="2" scope="col"><div align="center">
          <input type="submit" name="Submit" value="Buscar" />
      </div></td>
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
