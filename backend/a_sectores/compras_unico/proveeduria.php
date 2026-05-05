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
-->
</style>
</head>

<body>

<?PHP $id = $_REQUEST['id'];?>
<table width="154"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">DEPOSITO</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
<ul><li><a href="../gtin/compras/pagina1.php?id=<?php print("$id");?>" target = "central1"> 1. INGRESO (GTIN) </a>  <ul>
<ul><li><a href="../inventario/inventario/carga_inventario/pagina1.php?id=<?php print("$id");?>" target = "central1"> 2. CARGA INVENTARIO </a>  <ul>

    <ul>
     <!-- <li><a href="../proveeduria/compras/pagina1.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >2. INGRESO (UNICO) </a></li> -->
	  
	<!-- <li><a href="mercaderia/entrada_mercaderia.php" id="primero" target = "central1" >2. ING. MERCADERIA</a></li>
		<li><a href="../deposito/mercaderia/entrada_laboratorio.php" id="primero" target = "central1" >2. ING. LABORATORIO</a></li>
			<li><a href="mercaderia/drogas.php" id="primero" target = "central1" >2. ING. DROGA</a></li> -->
		 </ul>
  </ul>
</li>



</ul>

		</ul>
</div>


<FORM ACTION="buscar/buscar_compras.php" method="post" TARGET = "central1">

<table width="154"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">COMPRAS</div></td>
  </tr>
</table>

    <table width="160" border="0">
      
      <tr>
        <td width="57"><div align="right" class="Estilo22"><font size="2">A&ntilde;o: </font></div></td>
        <td width="93"><span class="Estilo22"><font size="2">
        <input name = "anio" type = "text" value="<?php echo $anio;?>" size = "6" />
        </font></span></td>
      </tr>
      <tr>
        <td><div align="right" class="Estilo22"><font size="2">Mes: </font></div></td>
        <td><span class="Estilo22"><font size="2">
        <select name="mes[]" id="select3" onkeypress="return verif_caracter(this,event)">
          <option value = "13" selected="selected">TODOS</option>
          <option value = "01" >ENE</option>
          <option value = "02">FEB</option>
          <option value = "03">MAR</option>
          <option value = "04">ABR</option>
          <option value = "05">MAY</option>
          <option value = "06">JUN</option>
          <option value = "07">JUL</option>
          <option value = "08">AGO</option>
          <option value = "09">SET</option>
          <option value = "10">OCT</option>
          <option value = "11">NOV</option>
          <option value = "12">DIC</option>
        </select>
        </font></span></td>
      </tr>
      <tr>
        <td colspan="2"><div align="left" class="Estilo22"><font size="2"> Por:
              <select name="buscar_por[]" id="select5" onkeypress="return verif_caracter(this,event)">
                <option value ="compras" selected="selected">PROGRAMA</option>
                <option value ="compras_unico" >UNICO</option>
              </select>
        </font></div></td>
      </tr>
      <tr>
        <td><div align="right" class="Estilo22"><font size="2">N&ordm;</font></div></td>
        <td><span class="Estilo22"><font size="2">
        <input type = "text" name = "nro_factura" size = "9" />
        </font></span></td>
      </tr>
      <tr>
        <td><div align="right" class="Estilo22"><font size="2">Cli/Pro</font></div></td>
        <td><span class="Estilo22"><font size="2">
        <input name = "cliente_proveedor" type = "text" id="cliente_proveedor" size = "9" />
        </font></span></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
            <input type = "submit" name = "ok" value = "BUSCAR" />
        </font></div></td>
      </tr>
  </table>
</FORM>

<FORM ACTION="../monodrogas/mercaderia/buscar_monodrogas.php" method="post" TARGET = "central1">

<table width="154"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="Estilo3">MERCADERIA</div></td>
  </tr>
</table>

    <table width="160" border="0">
      
      <tr>
        <td width="150" colspan="2"><div align="right" class="Estilo22"><font size="2"></font><font size="2">
          <input name = "cod_mercaderia" type = "text" id="cod_mercaderia" size = "22" />
        </font></div>          </td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
            <input type = "submit" name = "ok" value = "BUSCAR" />
        </font></div></td>
      </tr>
  </table>
</FORM>
  
</body>
</html>
