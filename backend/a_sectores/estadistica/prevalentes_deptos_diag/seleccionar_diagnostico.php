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
<style type="text/css">
<!--
.Estilo58 {font-size: 12px}
.Estilo15 {font-family: "Trebuchet MS"}
-->
</style>
</head>

<body>
<!-- <li><a href="carga_datos.php" target = "central1" class="Estilo7 Estilo58" >1. Cargar Encuesta </a></li> -->
<!-- <li><a href="resultado_encuesta1.php" target = "central1" class="Estilo7 Estilo58" >2. Resultado Encuesta</a></li> -->
 

<!-- <li><a href="direccion/pacientes_atendidos_entrega.php" target = "central1" class="Estilo7 Estilo58" >7. Cantidad de Entregas</a></li> -->
<!-- <li><a href="direccion/grafico1.php" target = "central1" class="Estilo7 Estilo58" >5. Prueba</a></li>
<li><a href="direccion/grafico2.php" target = "central1" class="Estilo7 Estilo58" >5. Prueba</a></li>
<li><a href="direccion/diag/ex.php" target = "central1" class="Estilo7 Estilo58" >5. Prueba</a></li> -->

<!-- <li><a href="../ver_asiento_gtin.php" target = "central1" class="Estilo7 Estilo58" >5. Prueba</a></li> -->
<!-- <li><a href="existencia/consulta.php" target = "central1" class="Estilo7 Estilo58" >5. Existencia</a></li>  -->
<?PHP 
  $mes = date("m");
  $anio3 = date("y");

  $anio2 = date("y") - 1;
$anio1 = date("y") - 2;


  ?>
<form action="ver_diagnosticos.php" method="post" target = "central1">
     <table width="152"  border="0">
       
       <tr>
         <td colspan="2" bgcolor="#666666"><div align="center" class="Estilo3">DIAGNOSTICOS</div></td>
       </tr>
       
       <tr>
         <td colspan="2" align="center" class="Estilo79 Estilo58 Estilo15" scope="row"><?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from tr_ventas_encabezado group by cod_diagnostico ORDER BY cod_diagnostico";
$result = $db->Execute($sql);
echo "<select name=cod_agrupado[] size=1 id =obrasocial onKeyPress='return verif_caracter(this,event)'>";


if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_diagnostico"];
$a1=strtoupper($result->fields["nombre_diagnostico"]);
echo"<option value=$cod>$cod</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
       </tr>
	    
       <tr>
         <td width="53" align="center" class="Estilo79 Estilo58 Estilo15" scope="row">A&ntilde;o: </td>
         <td width="89" align="center" class="Estilo79 Estilo58 Estilo15" scope="row"><input name = "anio" type = "text" id="anio" value = "<?php echo $anio3;?>" size = "4" maxlength="4" /></td>
       </tr>
       
       <tr>
         <td colspan="2" align="center" class="Estilo7" scope="row"><input name="Submit2" type="submit" value="BUSCAR" /></td>
       </tr>
     </table>
</form> 
</body>
</html>
