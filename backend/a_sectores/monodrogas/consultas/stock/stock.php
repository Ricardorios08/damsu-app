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
.Estilo4 {font-size: xx-small}
.Estilo13 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12; }
-->
</style>
<BODY background="../../../IMAGENES/IZQUIERDA.PNG" class="Estilo4" onload ="ocultamenu()">
<FORM ACTION="stock_separar.php" method="post" TARGET = "central1">

<?php
 $cod_barra=$_REQUEST["cod_barra"];
$dia = date("d");
$mes= date("m");
$anio = date("y");


$mes_anterior  = date("m") - 1;

if ($mes_anterior == 0){
$mes_anterior = 12;
$anio = $anio - 1;
}


$mes_anterior =  str_pad($mes_anterior, 2, "0", STR_PAD_LEFT);

 $opciones=$_REQUEST["opciones"];

?>

<table width="60%" border="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#000099" scope="row"><div align="center"><span class="Estilo13">FICHA STOCK</span></div></td>
  </tr>
  
  <tr bgcolor="#E1F2EF">
    <td width="40%" align="center" scope="row"><div align="right" class="Estilo16">COD BARRA  
            
  </div></td>
    <td width="60%" align="center" scope="row"><div align="left">
      <input name = "cod_barra" type = "text" value="<?php echo $cod_barra;?>" size = "40">
    </div></td>
  </tr>



  <?php if ($opciones == "valor"){?>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right" class="Estilo16">Mostrar en </div></td>
    <td align="center" scope="row"><div align="left">
      <input name="opcion" type="radio" value="unidades" >
      Unidad
      <input name="opcion" type="radio" value="valor" checked>
    Valor</div></td>
  </tr>
<?php } else{ ?>

  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right" class="Estilo16">Mostrar en </div></td>
    <td align="center" scope="row"><div align="left">
      <input name="opcion" type="radio" value="unidades" checked>
      Unidad
      <input name="opcion" type="radio" value="valor">
    Valor</div></td>
  </tr>

  <?php } ?>





  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right" class="Estilo16">Desde</div></td>
    <td align="center" scope="row"><div align="left">
      <input name = "dia_d" type = "text" id="dia_d" value="<?php echo $dia;?>" size = "2">
  /
  <input name = "mes_d" type = "text" id="mes_d" value="<?php echo $mes_anterior;?>" size = "2">
  /
  <input name = "anio_d" type = "text" id="anio_d" value="<?php echo $anio;?>" size = "4">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right" class="Estilo16">Hasta</div></td>
    <td align="center" scope="row"><div align="left">
      <input name = "dia_h" type = "text" id="dia_h" value="<?php echo $dia;?>" size = "2">
  /
    <input name = "mes_h" type = "text" id="mes_h" value="<?php echo $mes;?>" size = "2">
  /
  <input name = "anio_h" type = "text" id="anio_h" value="<?php echo $anio;?>" size = "4">
    </div></td>
  </tr>
  <tr bgcolor="#000099">
    <td colspan="2" align="center" scope="row">
        <div align="center">

		<input name="tipo" type="radio" value="ACE"> ACE

          <input type="submit" name="Submit" value="CONSULTAR STOCK">
        </div></td>
    </tr>
</table>

<div align="center"></div>
</form>
