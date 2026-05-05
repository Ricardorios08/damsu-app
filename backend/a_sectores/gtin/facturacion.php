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
.Estilo13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo6 {color: #0000FF}
.Estilo14 {font-family: "Trebuchet MS"}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 12px}
.Estilo19 {color: #FFFFFF}
.Estilo9 {font-size: 14px}
-->
</style>
</head>

<body>
<?PHP $id = $_REQUEST['id'];?>
<table width="154"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">FACTURACION</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
<li><a href="facturacion/entrada_factura.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >1. Ingresar FACTURA </a></li>
<!-- <li><a href="nota_debito/entrada_factura.php" target = "central1" class="Estilo54" > 2. Nota DEBITO </a></li>

<li><a href="nota_credito/entrada_factura.php" target = "central1" class="Estilo54" onClick="return confirm('¿Si tiene alguna Nota de Credito Pendiente se borrará?');">3. Nota CREDITO </a></li>
<li><a href="nota_credito_pesos/entrada_factura.php" target = "central1" class="Estilo54">4. N/ CREDITO PESOS </a></li> -->
<!-- <li><a href="consultas.php" target = "izquierda" class="Estilo54" >5. BUSCAR FACT. </a></li> -->
<li><a href="consultas/informes.php" target = "izquierda" class="Estilo74" >6. INFORMES</a></li>
<li><a href="informes.php" target = "izquierda" class="Estilo54" >7. ACTUALIZACIONES </a></li>




</ul>
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
