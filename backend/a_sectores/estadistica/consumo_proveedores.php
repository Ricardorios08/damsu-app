<script type="text/javascript">
function ocultamenu(){
  var menu = document.getElementById("Atributos");
  menu.style.display = "none";
}
function despliega(){
  var menu = document.getElementById("Atributos");
    if(menu.style.display == "none"){
      menu.style.display = "block";
    }
    else{
      menu.style.display = "none";
    }
}
</script>
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>
<style type="text/css">
<!--
.Estilo13 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo14 {
	font-size: 12px;
	font-family: "Trebuchet MS";
}
-->
</style>

<?php 
$dia = date("d");
$mes= date("m");
$anio = date("y");

$dia_d = $_REQUEST['dia'];
$mes_d = $_REQUEST['mes'];
$anio_d = $_REQUEST['anio'];


?>

<BODY>
<FORM ACTION="consumo_proveedores2.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#000099" scope="row"><div align="center"><span class="Estilo13">CONSULTA POR PROVEEDORES </span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right">Desde</div></td>
    <td align="center" scope="row"><div align="left">
      <input name = "dia" type = "text" id="dia_d" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
      /
      <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
      / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right">Hasta</div></td>
    <td align="center" scope="row"><div align="left">
      <input name = "dia2" type = "text" id="dia" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
      /
      <input name = "mes2" type = "text" id="mes" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
      / 20
  <input name = "anio2" type = "text" id="anio" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right">Proveedores</div></td>
    <td align="center" scope="row"><div align="left">
      <?php 
include ("../../conexiones/config_usu.php");
$sql="select * from proveedores ORDER BY denominacion";
$result = $db->Execute($sql);
echo "<select name=laboratorios[] size=1 id =laboratorio onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_proveedor"];
$a1=strtoupper($result->fields["denominacion"]);
echo"<option value=$cod>$a1 - $cod</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="40%" align="center" scope="row"><div align="right"></div></td>
    <td width="60%" align="center" scope="row"><div align="left">
      <input type="submit" name="Submit" value="CONSULTAR">
    </div></td>
  </tr>
</table>


<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  
   <tr>
   <td width="82" bgcolor="#B8B8B8"><div align="center">Cuenta</div></td>
   <td width="496" bgcolor="#B8B8B8"><div align="center">Denominacion</div></td>
   <td width="107" bgcolor="#B8B8B8"><div align="center">Entrados</div></td>
   <td width="107" bgcolor="#B8B8B8"><div align="center">Salidos</div></td>
  </tr>

<?PHP 
$sql="select * from tr_stock group by cuenta";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cuenta=$result->fields["cuenta"];


$sql2="select * from proveedores where cod_proveedor = $cuenta";
$result2 = $db->Execute($sql2);
$denominacion=$result2->fields["denominacion"];


$sql2="select count(cuenta) as entrados from tr_stock where cuenta = '$cuenta' and cod_movimiento = 1";
$result2 = $db->Execute($sql2);
$entrados=$result2->fields["entrados"];

$sql2="select count(cuenta) as salidos from tr_stock where cuenta = '$cuenta' and cod_movimiento = 6";
$result2 = $db->Execute($sql2);
$salidos=$result2->fields["salidos"];


?>

 <tr>
    <td><div align="center"><?PHP ECHO $cuenta;?></div></td>
    <td><div align="left"><?PHP ECHO $denominacion;?></div></td>
    <td><div align="center"><?PHP ECHO $entrados;?></div></td>
    <td><div align="center"><?PHP ECHO $salidos;?></div></td>
 </tr>
<?php 


	$result->MoveNext();
	}


	  ?>
</table>
