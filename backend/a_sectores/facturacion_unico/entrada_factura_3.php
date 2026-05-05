<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">



<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo4 {
	color: #006633;
	font-size: 10px;
	font-weight: bold;
}
.Estilo6 {font-size: 12}
.Estilo16 {font-family: Arial, Helvetica, sans-serif}
.Estilo26 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->


<!--
.Estilo67 {color: #FFFFFF; font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.Estilo70 {color: #FFFFFF}
.Estilo71 {font-size: 10px}
.Estilo72 {font-size: 12px; color: #000000; }
-->

<!--
.Estilo83 {font-size: 10px; font-family: Arial, Helvetica, sans-serif;}
.Estilo84 {font-size: 12px}
.Estilo85 {color: #000000}
.Estilo60 {font-size: 12px; color: #000000; font-family: "Trebuchet MS"; }
.Estilo61 {color: #000000; font-family: "Trebuchet MS"; }
.Estilo62 {color: #000000; font-family: "Trebuchet MS"; font-size: 10px; }
.Estilo63 {font-size: 10px; color: #006633;}
.Estilo64 {font-family: "Trebuchet MS"}
.Estilo65 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->



</style>

<script language="javascript">
function on_load()
{
document.getElementById("cod_barra").focus();
document.getElementById("cod_barra").style.backgroundColor =  "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_barra":
document.getElementById("cod_barra").style.backgroundColor =  "#FFFFFF";
document.getElementById("proveedor").style.backgroundColor =  "#CCFFCC";
document.getElementById("proveedor").focus();
				break;

				case "proveedor":
document.getElementById("proveedor").style.backgroundColor =  "#FFFFFF";
document.getElementById("cantidad").style.backgroundColor =  "#CCFFCC";
document.getElementById("cantidad").focus();
				break;
				
				case "cantidad":
document.getElementById("cantidad").style.backgroundColor =  "#FFFFFF";
document.getElementById("Alta").style.backgroundColor =  "#CCFFCC";
document.getElementById("Alta").focus();
				break;
		
				
				
		}
		return false;
	}
	return true;
}

function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, location = 01, top = 35");
}

</script>


</head>

<?php 
echo "Entrada Factura 3";
$tipo_fact = "x";

include ("../../../conexiones/config_pro.php");
$nro_factura= $_REQUEST['nro_factura'];


$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];

$fecha= $anio.$mes.$dia;
$producto= $_REQUEST['producto'];
$cod_merquita= $_REQUEST['cod_merquita'];
$cod_proveedor= $_REQUEST['cod_proveedor'];
$operador= $_REQUEST['operador'];


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



$sql = "UPDATE tr_ventas1_encab_temp SET `nro_os` = '$nro_os', `nombre_os` = '$nombre_os' WHERE operador = $operador;";



$cantidad_existente= $_REQUEST['cantidad_existente'];
$porc_dto= $_REQUEST['porc_dto'];
$tipo_do=$_REQUEST["tipo_doc"];
	for ($i=0;$i<count($tipo_do);$i++)    
	{     
	$tipo_doc = $tipo_do[$i];    
	}





$sql7="select * from pacientes where documento like '$documento'";
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


$sql="select * from tr_ventas_encabezado where tipo_fact = '$tipo_fact' and nro_cuenta = '$documento'  ORDER BY nro_factura DESC";
$result = $db->Execute($sql);

 $nro_factura_anterior = $result->fields["nro_factura"];
 $fecha_factura_anterior  = $result->fields["fecha"];
  $tipo_fact_ant  = $result->fields["tipo_fact"];



 $dia_anterior= substr($fecha_factura_anterior,8,2);
 $mes_anterior= substr($fecha_factura_anterior,5,2);
 $anio_anterior = substr($fecha_factura_anterior,0,4);
$fecha_factura_anterior = $dia_anterior."-".$mes_anterior."-".$anio_anterior;





 



include("../../../conexiones/config_pro.php");

$sql = "INSERT INTO `tr_ventas1_encab_temp` ( `tipo_fact` , `nro_factura` , `cod_operacion` , `tipo` , `nro_cliente` , `nro_cuenta` , `plan` , `operador` , `denominacion` , `fecha` , `forma_pago` , `porc_dto`) VALUES ( '$fact'  , '$nro_factura' , '$cod_operacion' , '$tipo_iva' , '$nro_cliente' , '$matricula1' , '$plan' , '$operador' , '$todo1' , '$fecha' , '$forma_pago' , '$porc_dto' )";
//mysql_query($sql);


?>

<script>

function abrirVentana() {
	var cod_detalle = <?php  $cod_detalle;?> 
    open("factura_papel.php?cod_detalle=<?php print($cod_detalle);?>&&nro_factura=<?php print($nro_factura);?>&&nro_cliente=<?php print($nro_cliente);?>&&matriculae=<?php print($matricula);?>&&forma_pago=<?php print($forma_pago);?>&&dia=<?php print($dia);?>&&mes=<?php print($mes);?>&&anio=<?php print($anio);?>&&todo=<?php print($todo);?>&&direccion=<?php print($direccion);?>&&cuit=<?php print($cuit);?>&&tipo_fact=<?php print($tipo_fact);?>","MERCADERIA", "width=1000,height=1000,toolbar=no,directories=no,menubar=no,status=no");
} 
</script>

<body onload = "on_load ()">
<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<?php include("../../../conexiones/config_pro.php");
$sql8 = "SELECT * FROM `tr_ventas1_encab_temp` where nro_factura = $nro_factura";
$result8 = $db->Execute($sql8);
$plan=strtoupper($result8->fields["plan"]);?>
<table width="800" border="0">
          <!--DWLayoutTable-->
          <tr bgcolor="#000099">
            <td colspan="5" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67"><div align="left" class="Estilo70">
              <div align="left"><span class="Estilo83"><span class="Estilo6 Estilo70 Estilo16 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo60"><span class="Estilo85 Estilo67"><span class="Estilo61"><span class="Estilo84">N&ordm; ENTREGA:</span> <?php echo $nro_factura;?></span></span> <span class="Estilo61">&nbsp;&nbsp;&nbsp;&nbsp;</span>Paciente: <?php echo $nombre_completo;?>&nbsp;&nbsp;&nbsp;</span></span></span></span><span class="Estilo4 Estilo6 Estilo70  Estilo16"><span class="Estilo4 Estilo16  Estilo6"><span class="Estilo71"><span class="Estilo60"> &nbsp;&nbsp;&nbsp;</span></span></span></span></span><span class="Estilo62">&nbsp;</span><span class="Estilo60">Fecha: <?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio?></span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="Estilo85">Operador: <?php echo $nombre_operador;?> <?php echo $operador;?></span></div>
            </div>              </td>
    </tr>
          
          <tr bgcolor="#C4D7E6">
            <td width="12%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64">Domicilio: </span></span></span></span></span></span></td>
            <td colspan="3" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo strtoupper($direccion);?></span></span></span></span></span></span></td>
            <td width="24%" rowspan="3" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67 Estilo85"> <div align="center"><a href="control_nro_factura.php?&&nro_factura=<?php print("$nro_factura");?>&&nro_factura_nuevo=<?php print("$nro_factura_nuevo");?>&&programa=<?php print("$programa");?>&&documento=<?php print("$documento");?>&&operador=<?php print("$operador");?>&&cuit=<?php print("$cuit");?>"><IMG SRC="../../../imagenes/flechas/derecha.png" width="137" height="66"alt="CONFIRMAR"  border = "0"></a> </div></td>
          </tr>
          <tr bgcolor="#C4D7E6">
            <td bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64">Diagnostico: </span></span></span></span></span></span></td>
            <td colspan="3" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo strtoupper($nombre_diagnostico);?></span></span></span></span></span></span></td>
          </tr>
          <tr bgcolor="#C4D7E6">
            <td bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64">Obra Social:  &nbsp;&nbsp;</span></span></span></span></span></span></td>
            <td width="39%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo $nombre_os;?></span></span></span></span></span></span></td>
            <td width="14%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><div align="right"><span class="Estilo72 Estilo85 Estilo64">Afiliado:</span></div></td>
            <td width="11%" bordercolor="#000000" bgcolor="#E6E6E6" class="Estilo67"><div align="center"><span class="Estilo26"><span class="Estilo70"><span class="Estilo6 Estilo16 Estilo70 Estilo63"><span class="Estilo16 Estilo6 Estilo63"><span class="Estilo71"><span class="Estilo72 Estilo85 Estilo64"><?php echo $nro_afiliado;?></span></span></span></span></span></span></div></td>
          </tr>
          
          <tr bgcolor="#B09268">
            <td colspan="5" bordercolor="#000000" bgcolor="#CCCCCC" class="Estilo67 Estilo85 Estilo65">COD BARRA O TROQUEL: 
              <input name="cod_barra" type="text"  id ="cod_barra" value = "<?php echo $cod_merquita;?>" onKeyPress='return verif_caracter(this,event)' size="15">             
               PROVEEDOR: 
              <input name="proveedor" type="text" id ="proveedor" value="<?php echo $cod_proveedor;?>" onKeyPress="return verif_caracter(this,event)" size="4">
              CANTIDAD:
              <input name="cantidad" type="text" id ="cantidad" onKeyPress="return verif_caracter(this,event)" size="4">
            <input name="Alta" type="submit" id="Alta" value="OK"> <input name="Alta" type="submit" value= "BUSCAR" id = "ok1">
		    <input name="Alta" type="submit" value= "PROVEEDOR" id = "ok2"></td>
    </tr>
                      <input name="documento" type="hidden" value ="<?php echo $documento;?>">
                      <input name="tipo_doc" type="hidden" value ="<?php echo $tipo_doc;?>">
 <input name="operador" type="hidden" value ="<?php echo $operador;?>">
  <input name="tipo_fact" type="hidden" value ="<?php echo $tipo_fact;?>">

							 <input name="dia" type="hidden" value ="<?php echo $dia;?>">
                      <input name="mes" type="hidden" value ="<?php echo $mes;?>">
                      <input name="anio" type="hidden" value ="<?php echo $anio;?>">
					   <input name="nro_os[]" type="hidden" value ="<?php echo $nro_os;?>">
  </table>

</form>




  <?php 
		


		

		if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "OK":
				{
$operador = $_REQUEST['operador'];
$nro_factura_nuevo= $_REQUEST['nro_factura_nuevo'];
$tipo_fact= $_REQUEST['tipo_fact'];
if ($nro_factura_nuevo != ""){

$sql = "SELECT * FROM `tr_ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nro_factura=strtoupper($result3->fields["nro_factura"]);

$sql = "UPDATE `tr_ventas1_encab_temp` SET `nro_factura` = '$nro_factura_nuevo'   WHERE `nro_factura` = '$nro_factura' and `tipo_fact` = '$tipo_fact' ";
mysql_query($sql);
$sql = "UPDATE `tr_ventas1_deta_temp` SET `nro_factura` = '$nro_factura_nuevo'  WHERE `nro_factura` = '$nro_factura' and `tipo_fact` = '$tipo_fact' ";
mysql_query($sql);
$nro_factura = $nro_factura_nuevo;

}


$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];
 $cantidad= $_REQUEST['cantidad'];
$mes_actual =  date("m");
$anio_actual=  date("y");
include("../../../conexiones/config_pro.php");
$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_barra' or `troquel` = '$cod_barra' ";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);

$sql = "SELECT * FROM `existencias`  WHERE  `cod_mercaderia` = $cod_mercaderia and proveedor = $proveedor";
$result = $db->Execute($sql);

$cantidad_ingresada=strtoupper($result->fields["cantidad_ingresada"]);
 $cantidad_salida=strtoupper($result->fields["cantidad_salida"]);

 $sql1 = "SELECT * FROM existencias  WHERE  (`cod_mercaderia` = '$cod_mercaderia' and anio_lote > '$anio_actual' and proveedor = $proveedor) or (`cod_mercaderia` = '$cod_mercaderia' and anio_lote = '' and proveedor = $proveedor) or (`cod_mercaderia` = '$cod_mercaderia' and anio_lote = '$anio_actual' and mes_lote >= '$mes_actual' and proveedor = $proveedor) or (`cod_mercaderia` = '$cod_mercaderia' and anio_lote = '00' and mes_lote = '00' and proveedor = $proveedor) or (`cod_mercaderia` = '$cod_mercaderia' and anio_lote = '' and mes_lote = '' and proveedor = $proveedor)order by anio_lote, mes_lote";
$result1 = $db->Execute($sql1);

$sql18 = "SELECT SUM(cantidad_ingresada) as cant FROM existencias  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result18 = $db->Execute($sql18);
$cant_lotes=strtoupper($result18->fields["cant"]);

$sql18 = "SELECT SUM(cantidad_salida) as salid FROM existencias  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result18 = $db->Execute($sql18);
$cant_salid_lotes=strtoupper($result18->fields["salid"]);

$sql19 = "SELECT SUM(cantidad) as cant FROM ventas1_deta_temp  WHERE  `cod_mercaderia` = '$cod_mercaderia' ";
$result19 = $db->Execute($sql19);
$cant_temp=strtoupper($result19->fields["cant"]);

$cantidad_stock = $cant_lotes - $cant_salid_lotes - $cant_temp;


if ($cantidad_stock < $cantidad){
	$leyenda = "No alcanza la cantidad requerida en Existencia quedan ".number_format($cantidad_stock);
	include ("../../../alertas/campo_vacio.php");
	include_once ("mostrar_detalle.php");
	exit;
}

if ($cantidad_stock == 0){
	//$leyenda = "No alcanza la cantidad requerida en Existencia o no ingreso nada";
	//include ("../../../alertas/campo_informacion.php");
	include_once ("mostrar_detalle.php");
	exit;
}

$band = "NO";


 $merca=strtoupper($result1->fields["cod_mercaderia"]);

if ($merca == ""){
$leyenda = "PRODUCTO VENCIDO O INEXISTENTE";
	include ("../../../alertas/campo_informacion.php");
	//include_once ("mostrar_detalle.php");
	exit;
}

if (!$result1) die("fallo".$db->ErrorMsg());

 while (!$result1->EOF) { 


	 
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
 $cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);



if ($cantidad_ingresada - $cantidad_salida != 0) {

 $cantidad_existente = $cantidad_ingresada - $cantidad_salida;
 $band;
switch ($band){

	case "NO":{
	
		if ($cantidad < $cantidad_existente){// cantidad menor que existencia
		include ("cuentas.php");
		include ("mostrar_detalle.php");
	
		exit;
		}elseif($cantidad == $cantidad_existente){ // cantidad igual que existencia

	
		$cantidad_salida1 = $cantidad_salida1 + $cantidad;
		include ("cuentas.php");
		include ("mostrar_detalle.php");
		
		exit;
		}elseif($cantidad > $cantidad_existente){  // cantidad mayor que existencia
		$dif = $cantidad - $cantidad_existente;
		$cantidad_restante = $cantidad - $dif;
		include ("cuentas_bucle.php");
		$band = "SI";
		$result1->MoveNext();}
break;
	}

	
	case "SI":{
		if ($dif < $cantidad_existente){       // Diferencia menor que existencia
		include ("cuentas.php");
		include ("mostrar_detalle.php");
		
		exit;
		}elseif($dif == $cantidad_existente){   // Diferencia igual que existencia
		include ("cuentas.php");
		include ("mostrar_detalle.php");
		
		exit;
		}elseif($dif > $cantidad_existente){    // Diferencia mayor que existencia
		$dif = $dif - $cantidad_existente;
		$cantidad_restante = $cantidad - $dif;
		include ("cuentas_bucle.php");
		
		$result1->MoveNext();
		
		include ("mostrar_detalle.php");
		}
		break;
		
	}

}
 


$result1->MoveNext();
 }
 else
	 {
	 $result1->MoveNext();
	 }// mueve registro
 }
	
	 include ("refrescar.php");
	
	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}
case "BUSCAR":
				{
$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];

include("refrescar1.php");


	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}

				case "BUSCAR PROVEEDOR":
				{
$cod_barra = $_REQUEST['cod_barra'];
$proveedor= $_REQUEST['proveedor'];

include("refrescar_prov.php");


	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}


case "CAMBIAR NUMERO NOTA DE ENTREGA":
				{

$operador = $_REQUEST['operador'];
$nro_factura_nuevo= $_REQUEST['nro_factura_nuevo'];
$tipo_fact= $_REQUEST['tipo_fact'];
if ($nro_factura_nuevo != ""){

$sql = "SELECT * FROM `tr_ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nro_factura=strtoupper($result3->fields["nro_factura"]);

$sql = "UPDATE `tr_ventas1_encab_temp` SET `nro_factura` = '$nro_factura_nuevo'   WHERE `nro_factura` = '$nro_factura' and `tipo_fact` = '$tipo_fact' ";
mysql_query($sql);
$sql = "UPDATE `tr_ventas1_deta_temp` SET `nro_factura` = '$nro_factura_nuevo'  WHERE `nro_factura` = '$nro_factura' and `tipo_fact` = '$tipo_fact' ";
mysql_query($sql);
$nro_factura = $nro_factura_nuevo;

}
include ("mostrar_detalle.php");




	 ?>
  
  </div>
  </th>
  
    </tr>
    <?php 
			break;
				}

	}
 }
?>
    </table>

	  <table width="800" border="1">
    <tr>
      <td><div align="center"><strong>EN CASO DE NO COINCIDIR CAMBIAR POR: <span class="Estilo67 Estilo70">
          <input name="nro_factura_nuevo" type="text" id ="nro_factura_nuevo" value="<?php  if (isset($_REQUEST['nro_factura_nuevo'])) echo $_REQUEST['nro_factura_nuevo'];?>" onKeyPress="return verif_caracter(this,event)" size="4">
          <input name="Alta2" type="submit" value= "CAMBIAR NUMERO NOTA DE ENTREGA" id = "Alta2">
      </span></strong></div></td>
    </tr>
  </table>

  </form>
 
  


