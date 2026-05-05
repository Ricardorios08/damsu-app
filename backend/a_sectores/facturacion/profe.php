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
    <td bgcolor="#666666"><div align="center" class="titulo">ENTREGAS/DEV.</div></td>
  </tr>
</table>
<div id="menuv">
		<ul>
			<ul>
			 			  
<!-- <li><a href="entrada_factura.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >1. FACTURA GTIN </a></li> -->
<!-- <li><a href="deterioro/entrada_deterioro.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >1. Informar ANMAT</a></li>


<li><a href="facturacion/entrada_factura.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >2. N/C Programa</a></li> -->

<!-- <li><a href="facturacion/entrada_factura.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >1. FACTURA UNICO </a></li> -->
<!-- <li><a href="facturacion/entrada_factura.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >3. N/C Unico </a></li> -->

<!-- <li><a href="../proveeduria/consultas/informes.php" target = "izquierda" class="Estilo74" >6. INFORMES</a></li>
<li><a href="../proveeduria/informes.php" target = "izquierda" class="Estilo54" >7. ACTUALIZACIONES </a></li> -->


<li><a href="diario_vta/consultas.php" target = "central1" class="Estilo54" >1. Planilla Diaria</a></li>
<li><a href="profe/consultas.php" target = "central1" class="Estilo54" >2. Planilla PROFE</a></li>
<li><a href="mes/consultas.php" target = "central1" class="Estilo54" >3. Planilla MENSUAL </a></li>
   <li><a href="nota_devolucion/entrada_nota.php?id=<?php print("$id");?>" target = "central1" class="Estilo54" >4. Devolución PO</a></li>  

  <li><a href="../facturacion_unico/cartel_anulada.php" target = "central1" class="Estilo54" >5. Cartel ANULADA</a></li>  
   <li><a href="profe/agregar_profe.php" target = "central1" class="Estilo54" >6. AGREGAR PROFE</a></li>  

 <li><a href="profe/sacar_profe.php" target = "central1" class="Estilo54" >7. SACAR PROFE</a></li>  

 <li><a href="profe/drogas_profe.php" target = "central1" class="Estilo54" >8. ENTREGAS PROFE AUT</a></li>  
  <li><a href="profe/drogas_profe_todos.php" target = "central1" class="Estilo54" >8. ENTREGAS</a></li>  
    <li><a href="profe/drogas_detalle.php" target = "central1" class="Estilo54" >8. DROGAS DETALLE</a></li>  
 <!-- <li><a href="profe/drogas_profe_pac.php" target = "central1" class="Estilo54" >9. DROGAS PROFE PAC</a></li>   -->
 <li><a href="profe/drogas_profe_pac1.php" target = "central1" class="Estilo54" >9. PAC. DE PROFE</a></li>  
<li><a href="profe/drogas_profe_pac1_diagnostico.php" target = "central1" class="Estilo54" >9. PAC. PROFE DIAG</a></li>  
<li><a href="profe/consumo_profe.php" target = "central1" class="Estilo54" >10. CONS. X DROGAS</a></li>  
<li><a href="profe/consumo_profe_paciente.php" target = "central1" class="Estilo54" >11. CONS.PACI AUT</a></li>  
<li><a href="profe/consumo_profe_paciente_coope.php" target = "central1" class="Estilo54" >12. CONS.PACI AUT (coope)</a></li>  
<!-- <li><a href="libro_iva//libro_iva.php" target = "izquierda" class="Estilo54" >5. Libros Mensuales</a></li> -->



</ul>
		</ul>
</div>
  
  <BR>

  <?php $anio = date("y");?>
  


<!-- 

<form action ="libro_iva/buscar_facturas.php" method="post" target ="central1">
  <table width="154"  border="0">
    <tr bgcolor="#990033"> </tr>
    <tr>
      <td bgcolor="#666666"><div align="center" class="Estilo3">LIBROS MENSUALES</div></td>
    </tr>
  </table>
  <table width="154" border="0" cellspacing="0"> 
        
        <tr>
          <td colspan="2"><div align="center" class="Estilo16">
            <select name="tipo_libro[]" id="tipo_libro[]" onkeypress="return verif_caracter(this,event)">
              <option value="ventas" selected>ENTREGAS.</option>
			 <option value="compras_unico">DEVOLUCIONES</option>    
			  <option value="compras">COMPRAS</option>
            </select>
          </div></td>
        </tr>
        <tr>
          <td width="55"> <div align="right" class="Estilo16">A&ntilde;o: </div></td>
          <td width="89"><span class="Estilo16">
          20 
              <input name = "anio" type = "text" value="<?php echo $anio;?>" size = "2" maxlength ="2">
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo16">Mes:
          </div></td>
          <td><span class="Estilo16">
            <select name="mes[]" id="select3" onkeypress="return verif_caracter(this,event)">
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
          </span></td>
        </tr>
        
			<td colspan="2">
            <div align="center" class="Estilo16">
              <select name="ordenar[]" id="select5" onkeypress="return verif_caracter(this,event)">
                <option value ="fecha" selected>FECHA</option>
                <option value ="factura">FACTURA</option>
              </select>
            </div></td></tr>
			<tr>
			  <td colspan="2"><div align="center" class="Estilo16">N&ordm; Registro:
		          <input name = "registro" type = "text" id="registro" value="" size = "2">
		      </div></td>
    </tr>
			<tr>
			  <td colspan="2"><div align="center" class="Estilo16">N&ordm; Hoja:&nbsp; &nbsp; &nbsp;
			      <input name = "hoja" type = "text" id="hoja" value="" size = "2">
			  </div></td>
    </tr>
        <tr>
          <td colspan="2" bgcolor="#666666"><div align="center" class="Estilo16">
            <input type = "submit" name = "ok" value = "CONSULTAR">
          </div></td>
        </tr>
       <!--  <tr>
          <td colspan="2"><div align="center"><A HREF="errores.php" target = "central">Errores</A></div></td>
        </tr> -->


	

 <form action="../estadistica/entregas/imprimir_pdf.php" method="post" target = "central1">
<table width="166"  border="0">
  <tr bgcolor="#990033"> </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#666666"><div align="center" class="titulo">ENTREGAS</div></td>
  </tr>
  
  

  <tr>
    <td align="center" class="Estilo79" scope="row">Ing.
      <input type = "text" name = "nro_factura" size = "6"  class="ctxt">
	  <input name="Submit" type="submit" value="OK"  class="bot1"></td>
  </tr>
  <tr>
    <td align="center" class="Estilo7" scope="row"></td>
  </tr>
</table>
  </form> 


</body>
</html>
