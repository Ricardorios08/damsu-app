 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<script language="javascript">
function on_load()
{
document.getElementById("leyenda12").focus();
document.getElementById("leyenda12").style.backgroundColor = "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{


				case "fact":
				document.getElementById("nro_factura_nuevo").focus();

document.getElementById("fact").style.backgroundColor = "#FFFFFF";
document.getElementById("nro_factura_nuevo").style.backgroundColor = "#CCFFCC";
				break;
				
				case "nro_factura_nuevo":
				document.getElementById("leyenda1").focus();

document.getElementById("nro_factura_nuevo").style.backgroundColor = "#FFFFFF";
document.getElementById("leyenda1").style.backgroundColor = "#CCFFCC";
				break;
				
				
				case "leyenda1":
				document.getElementById("ok").focus();
document.getElementById("leyenda1").style.backgroundColor = "#FFFFFF";
document.getElementById("ok").style.backgroundColor = "#CCFFCC";


				break;
								
		}
		return false;
	}
	return true;
}


</script>

<style type="text/css">
<!--
.Estilo14 {color: #000000}
.Estilo15 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: "Trebuchet MS";
}
.Estilo16 {font-size: 12px}
.Estilo17 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo19 {font-family: "Trebuchet MS"}
.Estilo20 {color: #000000; font-size: 12px; }
-->
 </style>

<body onload = "on_load ()">
<?php 
include ("../../conexiones/config_pro.php");
//$nro_factura= $_REQUEST['nro_factura'];
$operador= $_REQUEST['operador'];
$tipo_fact = "x";



$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];

$fecha= $anio.$mes.$dia;
$producto= $_REQUEST['producto'];
$cod_merquita= $_REQUEST['cod_merquita'];
$cod_proveedor= $_REQUEST['cod_proveedor'];



$sql="select * from usuarios where id = '$operador'";
$result = $db->Execute($sql);
$nombre_operador=strtoupper($result->fields["usuario"]); 
$tipo_fact=strtoupper($result->fields["programa"]); 
if ($tipo_fact == 1){
$programa = "OSEP";
}
ELSE{
$programa = "PAPO";
}




$documento= $_REQUEST['documento'];

$nro_o=$_REQUEST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}

$sql = "SELECT * FROM `afiliaciones` where nro_os = $nro_os and documento = $documento order  by documento";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$nro_afiliado=$result->fields["nro_afiliado"];



$cantidad_existente= $_REQUEST['cantidad_existente'];
$porc_dto= $_REQUEST['porc_dto'];
$tipo_do=$_REQUEST["tipo_doc"];
	for ($i=0;$i<count($tipo_do);$i++)    
	{     
	$tipo_doc = $tipo_do[$i];    
	}





echo $sql7="select * from pacientes where documento like '$documento'";
$result7 = $db->Execute($sql7);
$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;

$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero

$nombre_completo = $apellido.", ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

$sql = "SELECT * FROM `ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nro_factura=strtoupper($result3->fields["nro_factura"]);


$fecha=date("d-m-Y");
?>


<FORM name="form" ACTION="factura_pap1.php" METHOD = "POST">


<table width="800" border="0">
  <tr bgcolor="#CCCCCC">
    <td height="32" colspan="2" ><div align="center" class="Estilo15" >
      <div align="center" class="Estilo14">      REVISAR  FACTURA E IMPRIMIR</div>
    </div> </td>
    </tr>
  <tr bgcolor="#C1F2FF">
    <td width="48%" bgcolor="#E6E6E6"><div align="right" class="Estilo19"><span class="Estilo16"><span class="Estilo20">N&ordm; FACTURA EMITIDO POR SISTEMA: </span></span></div></td>
    <td width="52%" bgcolor="#E6E6E6"><span class="Estilo14 Estilo19"><?php echo $nro_factura;?></span>
      <div align="center" class="Estilo19">
      <label></label>
  <!-- <input name="anterior" type="image" onClick="history.back()" onKeyPress="history.back()" src="../../../imagenes/flechas/izquierda.png" alt="anterior"> -->
      </div></td>
    </tr>
  <tr bgcolor="#C1F2FF">
    <td bgcolor="#E6E6E6"><div align="right" class="Estilo19"><span class="Estilo16"><span class="Estilo20">INGRESE LEYENDA </span></span></div></td>
    <td bgcolor="#E6E6E6"><span class="Estilo14 Estilo17 Estilo19">
      <input name="leyenda1" type="text" id="leyenda1" size="60" maxlength="30"  onKeyPress="return verif_caracter(this,event)">
	           <input name="operador1" type="hidden" value ="<?php echo $operador;?>">


     <!--  <input name="impri" type="image" src="../../../imagenes/botones/btn_imprimir.gif" id ="button3" value="IMPRI" onclick="return confirm('Si est&aacute;n todos los datos correctos IMPRIMA');"> -->

<script>
 function abrirVentana() {
	var nro_factura = <?php echo $nro_factura;?> 
    open("factura_pap.php?nro_factura=<?php print($nro_factura);?>&&programa=<?php print($programa);?>&&documento=<?php print($documento);?>&&operador=<?php print($operador);?>&&nro_factura_nuevo=<?php print($nro_factura_nuevo);?>","NOTA DE ENTREGA", "width=800,height=400,toolbar=no,directories=no,menubar=no,status=no");
}


</script>

    </span></td>
    </tr>
  <tr bgcolor="#C1F2FF">
    <td colspan="2" valign="middle" bgcolor="#CCCCCC"><div align="center" class="Estilo19">
      <input type="submit" name="Submit" value="Actualizar">
      <input name="button" type="button" id ="boton" style="font-size: 14 pt" onClick="history.back()" onKeyPress="history.back()" value="Corregir" src="../../../imagenes/flechas/izquierda.png">
      <span class="Estilo20"><img src="../../../imagenes/botones/btn_imprimir.gif"  alt="CONFIRMAR"  border = "0" onClick="abrirVentana()" target = "_blank"></span></div>      </td>
    </tr>
 </table>


 <?php $total_factura = 0;
$neto = 0;
$iva = 0;
$sumatoria = $cont;
		$cont = 0;

//include ("espacios_en_blancos.php");
$sumatoria = 0;?>
 </html>
</form>
</body>