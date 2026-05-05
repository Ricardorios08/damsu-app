<?php global $band;

include("../../../conexiones/config_pro.php");
include ("../../../conexiones/usuario_compra.php");
include("../../../funciones/funciones.php");

$id = $_REQUEST["id"];
$operador = $_REQUEST["id"];
$bande_buscar= $_REQUEST["bande_buscar"];

$documento= $_REQUEST["documento"];
$band_pri= $_REQUEST["band_pri"];

if ($band_pri == "SI"){

 $sql = "DELETE from compras1_encab_temp where operador = $id";
$result = $db->Execute($sql);
 $sql = "DELETE from compras1_deta_temp where operador = $id";
$result = $db->Execute($sql);


$nro_proveedor = $_REQUEST['documento'];
$informar = $_REQUEST['informar'];
include ("../../../conexiones/config_usu.php");
$sql="select * from pacientes where documento = $documento";
$result = $db->Execute($sql);
$apellido=strtoupper($result->fields["apellido"]);

if ($apellido == ""){
	$leyenda = "NO EXISTE PACIENTE CON ESE NUMERO";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
}



$dia= $_REQUEST['dia'];
if ($dia == ""){$dia = date("d");}
$mes= $_REQUEST['mes'];
if ($mes == ""){$mes = date("m");}
$anio= $_REQUEST['anio'];
if ($anio == ""){$anio = date("y");}



$fecha = $anio."-".$mes."-".$dia;


$fecha1 =$dia."-".$mes."-".$anio;

if(datecheck($fecha1)===false){
   $leyenda = "LA FECHA NO ES CORRECTA";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
}


$operador= $_REQUEST['id'];


$tipo_fac=$_REQUEST["tipo_fact"];
	for ($i=0;$i<count($tipo_fac);$i++)    
	{     
	$tipo_fact = $tipo_fac[$i];    
	}

$expendio= $_REQUEST['expendio'];

$nro_factura= $_REQUEST['nro_factura'];
$porcentaje_boni= $_REQUEST['porcentaje_boni'];
$porcentaje_dto= $_REQUEST['porcentaje_dto'];

if ($tipo_fact == ""){$tipo_fact = "B";}


$expendio = str_pad($expendio, 4, "0", STR_PAD_LEFT);
$nro_factura = str_pad($nro_factura, 8, "0", STR_PAD_LEFT);

$nro_factura = $tipo_fact.$expendio.$nro_factura;



if ($documento == ""){
	$leyenda = "NO PUEDE DEJAR EL CAMPO NRO DE PROVEEDOR EN BLANCO";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
}

/*if ($nro_factura == ""){
	$leyenda = "NO PUEDE DEJAR EL CAMPO NRO DE COMPROBANTE EN BLANCO";
	INCLUDE ("../../../alertas/campo_vacio.php");
	exit;
} */


//include ("../comprobar_fechas.php");

$periodo = date("m"); 
$anio1 = date("y"); 


/*  $sql="select gln from proveedores where cod_proveedor = '$nro_proveedor'";
$result = $db->Execute($sql);
				 
$gln=$result->fields["gln"];  */


 $sql = "INSERT INTO `tr_compras1_encab_temp` ( `nro_factura` , `cod_operacion` , `nro_proveedor` , `denominacion` , `fecha` , `descuento` , `bonificacion` , `periodo` , `anio` , `operador`  , `cod_movimiento`  , `gln_proveedor` , `informar`  ) VALUES ( '$nro_factura' , '$cod_operacion' , '$nro_proveedor' , '$denominacion', '$fecha' , '$porcentaje_dto' , '$porcentaje_boni' , '$periodo' , '$anio1' , '$id' , '$cod_movimiento' , '$gln' , '$informar')";
mysql_query($sql);
}



$a = $_REQUEST["cod_mercaderia"];
$b = $_REQUEST["cod_mercaderia1"];

if ($a != ''){
$cod_mercaderia = $a;
}
else
{
$cod_mercaderia = $b;
}


/*
if ($bande_buscar == "SI"){
$cod_mercaderia = $_REQUEST["cod_mercaderia"];

 $sql2 = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result2 = $db->Execute($sql2);

$descripcion=strtoupper($result2->fields["nombre_comercial"]);
$precio_actualizado=$result2->fields["precio_actualizado"];
}
*/

//////////////
$sql = "SELECT * FROM `tr_compras1_encab_temp`  WHERE operador = $id";
$result8 = $db->Execute($sql);

$nro_proveedor=$result8->fields["nro_proveedor"];
$fecha=$result8->fields["fecha"];
$cod_movimiento=$result8->fields["cod_movimiento"];
$nro_factura=$result8->fields["nro_factura"];
$porcentaje_boni=$result8->fields["porcentaje_boni"];
$porcentaje_dto=$result8->fields["porcentaje_dto"];

$sql="select * from pacientes where documento = $nro_proveedor";
$result8 = $db->Execute($sql);
$apellido=strtoupper($result8->fields["apellido"]);
$nombre=strtoupper($result8->fields["nombre"]);
$denominacion=$apellido." ".$nombre;

//////////////

include ("variables_temp.php");

$periodo = date("m"); 
$anio1 = date("y"); 



?>
<script>
function on_load()
{
document.getElementById("cod_mercaderia").focus();
document.getElementById("cod_mercaderia").select();
}

function on_producto()
{

	window.addEventListener('cod_mercaderia',selcampo,false);
function selcampo() {
   document.getElementById("cod_mercaderia").select();
}



}


function enter()
{
document.getElementById("cod_mercaderia").focus();
}


function verif_caracter(obj,evt)

{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	
	{
		switch(obj.id)
		{
				case "cod_mercaderia":
				document.getElementById("gtin").focus();
				break;
				case "gtin":
				document.getElementById("precio_unitario").focus();
				break;
				case "precio_unitario":
				document.getElementById("lote").focus();
				break;

								case "lote":
				document.getElementById("mes_lote").focus();
				break;

					
				case "mes_lote":
				document.getElementById("anio_lote").focus();
				break;

				case "anio_lote":
				document.getElementById("SI").focus();
				break;

				
				
		}
		return false;
	}
	return true;
}

function cambiar_color_over(celda){
   celda.style.backgroundColor="#66ff33"
}
function cambiar_color_out(celda){
   celda.style.backgroundColor="#FFFFFF"
} 

function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido_mercaderia.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, top = 35");
}

</script>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>



<body onload = "on_load()">



<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

<?php include ("../../../conexiones/usuario_compra.php");?>

<table width="800" border="0" cellspacing="0">
  <tr bgcolor="#B9CAF0">
    <td height="27" colspan="4"><div align="center"><font color="#000000" face="Trebuchet MS">ENTREGA DE MEDICAMENTOS </font></div></td>
    <td width="45%" height="27"><div align="right"><font color="#000000" face="Trebuchet MS"> <?php echo $nombre_usuario;?></font></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td colspan="4" bgcolor="#CCCCCC"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> Paciente </font>        <font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"> <?php echo $denominacion;?> (<?php echo $nro_proveedor;?>) &nbsp;&nbsp;&nbsp;&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif">Fecha/Compra: </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><?php echo $fecha1;?> &nbsp;&nbsp;&nbsp;&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></div></td>
    <td bgcolor="#CCCCCC"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"></font> <font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><?php  $nro_factura;?></font></div></td>
  </tr>
  
  <tr bgcolor="#E8DCFC">
    <td colspan="5" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
      
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">COD BARRA</font><font color="#006600">
      <?php if ($bande_buscar == "SI"){?>
      
      <input type = "text" name = "cod_mercaderia" id="cod_mercaderia" size = "20" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      
      <?php }else{?>
      
        <input type = "text" name = "cod_mercaderia" id="cod_mercaderia" size = "20" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      
        <?php }?>
      
        </font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <!-- <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > -->
    </font></strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><?php echo $descripcion;?></font>
    <input name="Alta" type="submit" value="OK" id ="Alta" size = "10"  onload = "on_producto()">
    </div></td>
  </tr>
  <!-- <tr bgcolor="#E8DCFC">
    <td width="13%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Lote</font></div></td>
    <td width="24%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Mes - A&ntilde;o </font></div></td>
    <td width="20%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Pr. Unit</font></div></td>
    <td width="11%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GTIN</font></div></td>
    <td bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Agregar</font></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><font color="#000000" size="2">
      <input type = "text" name = "lote" id="lote" size = "20" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2">
      <input type = "text" name = "mes_lote" id="mes_lote" size = "2" onKeyPress="return verif_caracter(this,event)" >
      /</font><font color="#000000" size="2"> 20
  <input name = "anio_lote" type = "text" id="anio_lote" onKeyPress="return verif_caracter(this,event)" size = "2" maxlength="2" >
</font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2">
      <input type = "text" name = "precio_unitario" id="precio_unitario" size = "5" value = "<?php echo $precio_actualizado;?>" onKeyPress="return verif_caracter(this,event)" >
    </font></div></td>
    <td bgcolor="#E6E6E6"><input type = "text" name = "gtin" id="gtin"  tabindex = "2" size = "25"></td>
    <td bgcolor="#E6E6E6"><div align="center">
      <input name="Alta" type="submit" value="SI" id ="SI" size = "10" >
      <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <input name="Alta" type="submit" value= "BUSCAR" id = "Alta">
    </font></strong></font></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td colspan="5" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
    <input name="id" type="hidden" value ="<?php echo $id;?>">

    </font></strong></font></td>
  </tr> -->
</table>

 <input name="id" type="hidden" value ="<?php echo $id;?>">



<?php 
if(isset($_REQUEST['Alta'])) {

	switch ($_REQUEST['Alta'])
					{
						
			case "SI":
				{


$id= $_REQUEST['id'];


include ("variables_temp.php");

/////////////////////////////////////////////////
$cod_mercaderia= $_REQUEST['cod_mercaderia'];
$cod_mercaderi = $_REQUEST['cod_mercaderia'];
$lote= $_REQUEST['lote'];
$mes_lote= $_REQUEST['mes_lote'];
$anio_lote= $_REQUEST['anio_lote'];
if (strlen($mes_lote) == 1){
$mes_lote= "0".$mes_lote;
}
$gtin= $_REQUEST['gtin'];

$nro_serie = substr($gtin,18,10);


/*
if ($lote == ""){
$lote =  substr($gtin,38,5);
}

if ($mes_lote == ""){
 $mes_lote = substr($gtin,32,2);
}


if ($anio_lote == ""){
$anio_lote = substr($gtin,30,2);
}
*/


$informar= $_REQUEST['informar'];


$precio_unitario= $_REQUEST['precio_unitario'];

IF ($precio_unitario == ""){
 $sql1 = "SELECT precio_unitario FROM monodrogas  WHERE troquel = $cod_mercaderia or troquel = $cod_mercaderia or cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql1);

$precio_unitario=$result8->fields["precio_unitario"];

}


/////////////////////////////////////////////////


 include ("refrescar.php");


 break;	}


 case "OK":
				{
$id= $_REQUEST['id'];
$informar= $_REQUEST['informar'];

include ("variables_temp.php");

/////////////////////////////////////////////////
$cod_mercaderia= $_REQUEST['cod_mercaderia'];

IF ($cod_mercaderia == ""){
include ("refrescar.php");
}
else
					{


if (is_numeric ($cod_mercaderia)) {  



 $sql2 = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result2 = $db->Execute($sql2);

$descripcion=strtoupper($result2->fields["nombre_comercial"]);
$presentacion=strtoupper($result2->fields["presentacion"]);
$cod_droga=strtoupper($result2->fields["cod_droga"]);
$precio_actualizado=$result2->fields["precio_actualizado"];


 $sql2 = "SELECT * FROM `drogas`  WHERE  cod_droga = $cod_droga";
$result2 = $db->Execute($sql2);
$droga=strtoupper($result2->fields["droga"]);



if ($descripcion == ""){
echo "PRODUCTO INEXISTENTE EN BASE";
<table width="800" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#999999"> 
    <td colspan="2"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>AaaLTA 
      DE MONODROGAS</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td width="50%" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Troquel</font> 
      </div></td>
    <td width="50%" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="codigo" id="codigo" onKeyPress="return verif_caracter(this,event)" size="10" >
      </font>      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Grupo</font> 
      </div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <select name="grupo[]" id="grupo" onkeypress="return verif_caracter(this,event)">
        <option value="1" selected>Grupo 1</option>
        <option value ="2">Grupo 2</option>
        <option value ="3">Monoclonal</option>
      </select>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre 
      Comercial </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="nombre"  id="nombre"  size="50" onKeyPress="return verif_caracter(this,event)">
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Droga</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">  <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from drogas ORDER BY droga";
$result = $db->Execute($sql);
echo "<select name=cod_droga[] size=1 id =cod_droga onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_droga"];
$a1=strtoupper($result->fields["droga"]);
echo"<option value=$cod>$a1 ($cod)</option>";
$result->MoveNext();
	}
echo"</select>";
?>     
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nueva Droga</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="nueva_droga" id="nueva_droga"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Presentaci&oacute;n</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="presentacion" id="presentacion"  size="30"onKeyPress="return verif_caracter(this,event)">
      (unidades y magnitud) </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Laboratorio</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from laboratorios ORDER BY laboratorio";
$result = $db->Execute($sql);
echo "<select name=laboratorios[] size=1 id =laboratorio onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_laboratorio"];
$a1=strtoupper($result->fields["laboratorio"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nuevo Laboratorio </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="nuevo_laboratorio" id="nuevo_laboratorio"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DCBB76"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Cadena 
      de frio </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="radio" name="cadenafrio" value="SI"tabindex="26" >
      SI 
      <input type="radio" name="cadenafrio" value="NO" tabindex="27"checked="TRUE">
      NO </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">C&oacute;digo 
      de Barras</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="cod_barra" id ="cod_barra" size="20" onKeyPress="return verif_caracter(this,event)">
      </font> </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Porcentaje 
      Diferencial </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="margendif" id ="margendif" size="5" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="observaciones" id ="observaciones" size="45" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Precio Actualizado </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="precio_actualizado" id ="precio_actualizado" size="10" onKeyPress="return verif_caracter(this,event)">
    </font>  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Cant x Caja </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="cant_caja" id ="cant_caja" size="5" onKeyPress="return verif_caracter(this,event)">
    </font>  </tr>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Informar a ANMAT </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="radio" name="informar_anmat" value="SI"tabindex="26" >
SI
<input type="radio" name="informar_anmat" value="NO" tabindex="27"checked="TRUE">
NO</font>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6">&nbsp;</td>
    <td bgcolor="#E6E6E6">  
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"> 
    <td colspan="2"><div align="center"> 
        <input type="Submit" name="Submit34" id = "guardar" value="GUARDAR" target = "arriba">
      </div></td>
  </tr>
</table>
}
else{

?>
 <input name="bande_buscar" type="hidden" value ="SI">
 <input name="cod_mercaderia1" type="hidden" value ="<?php $cod_mercaderia;?>">

<table width="800" border="0" cellspacing="0" onload = "on_producto()">
 <tr bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
      
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">ARTICULO:</font><font color="#006600">
      <!-- <?php if ($bande_buscar == "SI"){?>
      
      <input type = "text" name = "cod_mercaderia1" id="cod_mercaderia" size = "14" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      
      <?php }else{?>
      
        <input type = "text" name = "cod_mercaderia1" id="cod_mercaderia" size = "14" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      
        <?php }?> -->
      
        </font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <!-- <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > -->
    </font></strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><?php echo $descripcion;?> - <?php echo $presentacion;?> ( <?php echo $cod_droga;?> <?php echo $droga;?>) </font>
    <!-- <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > -->
    </div></td>
  </tr>  
  <tr bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">GTIN</font></div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="center">
      <input type = "text" name = "gtin" id="gtin" onKeyPress="return verif_caracter(this,event)" tabindex = "2" size = "130">
    </div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td width="19%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRECIO UNIT. </font></div></td>
    <td width="37%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="23%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">VENCIMIENTO MES / A&Ntilde;O</font></div></td>
    <td width="21%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">AGREGAR</font></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2">
        <input type = "text" name = "precio_unitario" id="precio_unitario" size = "5" value = "<?php echo $precio_actualizado;?>" onKeyPress="return verif_caracter(this,event)" >
    </font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2">
      <input type = "text" name = "lote" id="lote" size = "40" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2">
        <input type = "text" name = "mes_lote" id="mes_lote" size = "2" onKeyPress="return verif_caracter(this,event)" >
      /</font><font color="#000000" size="2"> 20
        <input name = "anio_lote" type = "text" id="anio_lote" onKeyPress="return verif_caracter(this,event)" size = "2" maxlength="2" >
</font></div></td>
    <td bgcolor="#E6E6E6"><div align="center">
        <input name="Alta" type="submit" value="SI" id ="SI" size = "10" >
        <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <!-- <input name="Alta" type="submit" value= "BUSCAR" id = "Alta"> -->
        </font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <input name="id2" type="hidden" value ="<?php echo $id;?>">
        <input name="informar" type="hidden" value ="<?php echo $informar;?>">
    </font></strong></font></div></td>
  </tr>
</table>

<?PHP
					
}


} else {
	
include ("refrescar1.php");	
	 
	 }
/////////////////////////////////////////////////
}



 break;	}




			case "BUSCAR":
				{
 $band = "SI";

$id= $_REQUEST['id'];
$informar= $_REQUEST['informar'];


include ("variables_temp.php");
$cod_mercaderia= $_REQUEST['cod_mercaderia'];
include ("refrescar1.php");

 break;	}

 
 

					}
}
?>