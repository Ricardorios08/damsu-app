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
 
<link href="../../../menus.css" rel="stylesheet" type="text/css" />
<link href="../../../css/botonera.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo4 {font-size: xx-small}
.Estilo22 {font-family: "Trebuchet MS"}
.Estilo55 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
</head>

<body>

<?PHP $id = $_REQUEST['id'];?>


<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">INVENTARIO</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
 
<li><a href="../inventario/cierre/consulta.php" target = "central1">1. VER INVENTARIOS</a></li>
<li><a href="../../monodrogas/mercaderia/monodrogas.php" target = "central1">2. MONODROGAS</a></li>
<li><a href="../../monodrogas/mercaderia/unico.php" target = "central1">2'. UNICO</a></li>
<li><a href="../inventario/existencia_actual_unico.php" target = "central1">3. EXISTENCIA UNICO </a></li>
<li><a href="../inventario/existencia_actual_unico_dif.php" target = "central1">4. DIFERENCIAS UNICO</a></li>
<li><a href="../inventario/existencia_actual_po.php" target = "central1">5. EXISTENCIA PO</a></li>
<li><a href="../inventario/existencia_actual_po_dif.php" target = "central1">6. DIFERENCIAS PO </a></li>


<li><a href="../inventario/gtin//pagina2.php?id=<?php print("$id");?>" target = "central1">7. INVENTARIO GTIN</a></li>
<li><a href="../inventario/unico//pagina2.php?id=<?php print("$id");?>" target = "central1">8. INVENTARIO UNICO</a></li>
<!-- <li><a href="../inventario/unico_inicial//pagina2.php?id=<?php print("$id");?>" target = "central1">UNICO INICIAL</a></li> -->
<li><a href="../inventario/controla/controla.php?id=<?php print("$id");?>" target = "central1">9. GENERAR CONTROL</a></li>
<li><a href="../inventario/controla/detalle_inventario.php?id=<?php print("$id");?>" target = "central1">10. VER POR GTIN</a></li>
<li><a href="../inventario/controla/detalle_agrupa.php?id=<?php print("$id");?>" target = "central1">11. VER AGRUPADO</a></li>
  <!-- <li><a href="../inventario/gtin/inventario_gtin.php?id=<?php print("$id");?>" target = "central1">9. CONTROLA INV.</a></li>   -->
<li><a href="../inventario/cierre/cierre.php?id=<?php print("$id");?>" target = "central1">12. CIERRE INVENT.</a></li>

<li><a href="../inventario/cambio_precio/cambio_precio.php" target = "central1">13. CAMBIO $ ACE</a></li>
<li><a href="../inventario/listado_existencia_laboratorio.php" target = "central1">14. LAB</a></li>
<li><a href="../inventario/borrar_inventario/borrar_inventario.php" target = "central1">15. BORRAR INVENTARIO</a></li>
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
