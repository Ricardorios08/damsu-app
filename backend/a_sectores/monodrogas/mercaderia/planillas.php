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
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">PLANILLAS</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>


<li><a href="diario_vta/consultas.php" target = "central1" class="Estilo54" >1. Planilla Diaria</a></li>
<li><a href="profe/consultas.php" target = "central1" class="Estilo54" >2. Planilla PROFE</a></li>
<li><a href="mes/consultas.php" target = "central1" class="Estilo54" >3. Planilla MENSUAL </a></li>
 <li><a href="diario_vta_envio_coir/consultas.php" target = "central1" class="Estilo54" >4. Planilla COIR </a></li>  	
 <li><a href="inventario/inventario.php" target = "central1" class="Estilo54" >5. Inventario Coir </a></li>  
 
<FORM ACTION="../monodrogas/mercaderia/buscar_monodrogas_coir.php" method="post" TARGET = "central1">

<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">BUSCAR COIR</div></td>
  </tr>
</table>

    <table width="160" border="0">
      
      <tr>
        <td width="150" colspan="2"><div align="right" class="Estilo22">
          <div align="left"><font size="2"></font><font size="2">
            <input name = "cod_mercaderia" type = "text" id="cod_mercaderia" size = "20" / class="ctxt">
          </font></div>
        </div>          </td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
            <input type = "submit" name = "ok" value = "BUSCAR" / class="bot1">
        </font></div></td>
      </tr>
      <tr>
        <td colspan="2"><label>
          <div align="center"><span class="Estilo24">
          <input name="unico" type="checkbox" id="unico" value="1" />
          UNICO</span></div>
        </label></td>
      </tr>
  </table>
</FORM>


</body>
</html>
