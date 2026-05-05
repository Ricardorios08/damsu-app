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
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo15 {font-family: "Trebuchet MS"}
.Estilo16 {font-size: 12px}
.Estilo17 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo18 {font-family: Arial, Helvetica, sans-serif; color: #000000;}
-->
</style>

<?php 
$dia = date("d");
$mes= date("m");
$anio = date("Y");

$dia_d = $_REQUEST['dia'];
$mes_d = $_REQUEST['mes'];
$anio_d = $_REQUEST['anio'];


?>

<BODY>
<FORM ACTION="consumo_ca_pacientes.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row"><div align="center"><span class="Estilo13">CONSUMO LISTADO DE PACIENTES CA MAMA </span><span class="Estilo17">(versi&oacute;n 2019)</span> </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="376" align="center" bgcolor="#F0F0F0" scope="row"><div align="right" class="Estilo15 Estilo16">A&Ntilde;O</div></td>
    <td width="414" align="center" bgcolor="#FFFFFF" scope="row"><div align="left" class="Estilo17">
       <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "4" maxlength = "4">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" bgcolor="#F0F0F0" scope="row"><div align="right" class="Estilo17">Cod Tumor </div></td>
    <td align="center" bgcolor="#FFFFFF" scope="row"><div align="left" class="Estilo17"><span class="Estilo79 Estilo58 ">
        <span class="Estilo79 Estilo58 Estilo15">
        <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from diagnostico   ORDER BY nro_diagnostico";
$result = $db->Execute($sql);
echo "<select name=cod_agrupado[] size=1 id =obrasocial onKeyPress='return verif_caracter(this,event)'>";


if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_diagnostico"];
$a1=strtoupper($result->fields["nombre_diagnostico"]);
echo"<option value=$cod>$cod - $a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
        </span>    </span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" bgcolor="#F0F0F0" scope="row"><div align="right"><span class="Estilo17">Excel</span></div></td>
    <td align="center" bgcolor="#FFFFFF" scope="row"><div align="left">
      <input type="checkbox" name="excel" value="1">
    </div></td>
  </tr>

 
       
       <tr bgcolor="#B8B8B8">
         <td colspan="2"><div align="center" class="Estilo3">
           <input type="submit" name="Submit" value="CONSULTAR">
         </div></td>
       </tr>
       

     </table>




