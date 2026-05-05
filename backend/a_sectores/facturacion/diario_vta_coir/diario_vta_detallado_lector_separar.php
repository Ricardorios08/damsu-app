<script language="javascript">
function on_load()
{
document.getElementById("gtin").focus();
   document.body.style.zoom = "100%" 
}


 


</script>
	

 


	<style type="text/css">


<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo74 {font-family: Arial, Helvetica, sans-serif}
.Estilo75 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->


</style>


<link rel="stylesheet" type="text/css" media="screen" href="../../../menus.css" />
<link href="../../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../../../css/botonera.css" rel="stylesheet" type="text/css" />
 

<body > 



<?php 
 $id = $_REQUEST['id']; 

$nro_factura;



?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo70 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo72 {font-size: 12px}
.Estilo72 {font-family: Arial, Helvetica, sans-serif}
.Estilo74 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
</style>

<?php 

  $band = $_REQUEST['band'];

  if ($band == 1){
  $fecha = $_REQUEST['fecha'];
 $gtin = $_REQUEST['gtin'];
 $fuente = $_REQUEST['fuente'];

 
 if ($gtin != ''){
include ("../../../conexiones/config_pro.php");
echo $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  gtin = '$gtin'";
$result5 = $db->Execute($sql3);
$recibido_coir=$result5->fields["recibido_coir"];
$indicado_coir=$result5->fields["indicado_coir"];

$hoy = date('Y-m-d');

if (($recibido_coir == 1) and ($indicado_coir == 0)){
//echo "desmarcar";
$sql = "UPDATE `tr_ventas_detalle` SET `recibido_coir` = '0' ,  fecha_recibido = '0000-00-00' WHERE `gtin` = '$gtin' and recibido_coir = 1";
$result = $db->Execute($sql);
}else{

//echo "marcar";
$sql = "UPDATE `tr_ventas_detalle` SET `recibido_coir` = '1' ,  fecha_recibido = '$hoy' WHERE `gtin` = '$gtin' and recibido_coir = 0";
$result = $db->Execute($sql);
}
  }

  }


?>

 


 <BODY onload = "on_load()"> 


<FORM ACTION="diario_vta_detallado_lector_separar.php?nro_paciente=<?php print("$nro_paciente");?>&&fuente=<?php print("$fuente");?>" method="post" TARGET = "central1">


<table width="900" border="0" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#F0F0F0">
    <td colspan="9"><div align="center" class="Estilo74"><strong>RECIBIR MONODROGAS: <?php ECHO $fecha_a;?></strong></div></td>
  </tr>



  <tr valign="middle" bgcolor="#FFFFFF">
    <td height="34" colspan="9"><div align="center" class="Estilo74">
      <div align="left">Gtin: 
          <input name="gtin" type="text" class = "ctxt" id="gtin" size="80">
            <input type="submit" name="Submit" value="Recibir" class = "bot1"/>
		         <input type="hidden" name="fecha" value="<?php echo $fecha;?>">
			   	         <input type="hidden" name="band" value="1">
      </div>
    </div></td>
  </tr>

 <tr bgcolor="#DAFAFC">
     <td width="10%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Movimiento</span>
     </div>
     <td width="12%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Comprobante</span></span></div></td>
     <!-- <td width="5%"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Proveedor</span></div></td> -->
<td width="32%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Paciente</span></span></div></td>
<td width="7%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">OS</span></div></td>
<td width="9%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Documento</span></div></td>
 
<td width="10%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Fuente</span></div></td>
<td width="9%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Total</span></div></td>
   </tr>
<tr valign="middle" bgcolor="#F0F0F0">
  <td colspan="9"><iframe src="diario_vta_detallado_lector.php?fecha=<?php print("$fecha");?>&&fuente=<?php print("$fuente");?>&&id=<?php print("$id");?>" width="900" height="600" frameborder="0"></iframe></td>
</tr>
</table>



</form>
