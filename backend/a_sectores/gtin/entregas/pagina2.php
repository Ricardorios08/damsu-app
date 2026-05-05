<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
 <meta charset="utf-8">
<title>DAMSU</title>
 <!-- Bootstrap core CSS -->

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<!--
.Estilo1 {color: #000066}
.Estilo2 {color: #000000}
.Estilo3 {color: #666666}
.Estilo4 {font-size: 18px}
-->

 <!-- Bootstrap core CSS -->
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>


  </style>
  </head>
  
  <?php global $band;

include("../../../conexiones/config_pro.php");

include ("../../../conexiones/usuario_compra.php");
include("../../../funciones/funciones.php");

// Bandera para controlar el foco en 'gtin'. Se inicializa en false.
$poner_foco_en_gtin = false;

$id = $_REQUEST["id"];
$operador = $_REQUEST["id"];
$bande_buscar= $_REQUEST["bande_buscar"];

$documento= $_REQUEST["documento"];
$band_pri= $_REQUEST["band_pri"];

$prestado=$_REQUEST["prestador"];
	for ($i=0;$i<count($prestado);$i++)    
	{     
	$gln = $prestado[$i];    
	}


if ($gln == ""){
?><CENTER><h3>DEBE SELECCIONAR UN PRESTADOR </h3></center><?php 
exit;
}
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


$sql = "INSERT INTO `tr_compras1_encab_temp` ( `nro_factura` , `cod_operacion` , `nro_proveedor` , `denominacion` , `fecha` , `descuento` , `bonificacion` , `periodo` , `anio` , `operador`  , `cod_movimiento`  , `gln_proveedor` , `informar`  ) VALUES ( '' , '$cod_operacion' , '$nro_proveedor' , '$denominacion', '$fecha' , '$porcentaje_dto' , '$porcentaje_boni' , '$periodo' , '$anio1' , '$id' , '$cod_movimiento' , '$gln' , '$informar')";
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
$apellido=$result8->fields["apellido"];
$nombre=$result8->fields["nombre"];
$denominacion=$apellido." ".$nombre;

//////////////
 
include ("variables_temp.php");
 
$periodo = date("m"); 
$anio1 = date("y"); 



?>
<script>
// Esta función se ejecuta cuando la página termina de cargar.
// Decide dónde poner el foco basándose en la bandera PHP.
function on_load()
{
    <?php
    if ($poner_foco_en_gtin) {
        // Si la bandera es true, PHP escribe el código para poner el foco en 'gtin'.
        echo 'document.getElementById("gtin").focus();';
    } else {

		 echo 'document.getElementById("gtin").focus();';
        // Si la bandera es false, el foco va a 'cod_mercaderia'.
       // echo 'document.getElementById("cod_mercaderia").focus();';
       // echo 'document.getElementById("cod_mercaderia").select();';
    }
    ?>
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
<title>Documento sin título</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>



<body onload = "on_load()">



<FORM name="form" ACTION="<?php  echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">

<?php include ("../../../conexiones/usuario_compra.php");?>

<table width="803" border="0" cellspacing="0" class="table-striped">
  <tr bgcolor="#B9CAF0">
    <td height="45" colspan="2"><div align="center" class="Estilo3"><font face="Trebuchet MS">ENTREGA DE MEDICAMENTOS </font></div>      
    <div align="right"><font color="#000000" face="Trebuchet MS"> </font></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="164" bgcolor="#CCCCCC">Enviar al prestador:  </td>
    <td width="635" bgcolor="#CCCCCC"><?php echo $nombre_prestador;?> <?php echo $gln;?></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td bgcolor="#CCCCCC"><div align="left">Paciente: </div>      <div align="right"> </td>
    <td bgcolor="#CCCCCC"><?php echo $denominacion;?> (<?php echo $nro_proveedor;?>)</td>
  </tr>
  
   <?php if ($bande_buscar == "SI"){?>
  <tr bgcolor="#F0F0F0">
    <td colspan="2"><div align="left"> COD BARRA 
     <input type = "text" name = "cod_mercaderia" id="cod_mercaderia" size = "15" value = "<?php echo $cod_mercaderia;?>"  onKeyPress="return verif_caracter(this,event)" style = "width: 25% !important;">
      <input name="Alta" type="submit" value="OK" id ="Alta" size = "10"  onload = "on_producto()" class="btn btn-success">
      <input name="Alta" type="submit" value="VER" id ="Alta" size = "10"  onload = "on_producto()" class="btn btn-warning">   	</td>
  </tr> 
      <?php }else{?>
        <tr bgcolor="#F0F0F0">
    <td colspan="2"><div align="left"> COD BARRA 
        <input type = "text" name = "cod_mercaderia" id="cod_mercaderia" size = "20" value = "<?php echo $cod_mercaderia;?>"   onKeyPress="return verif_caracter(this,event)" style = "width: 25% !important;">
        <input name="Alta" type="submit" value="OK" id ="Alta" size = "10"  onload = "on_producto()" class="btn btn-success">
        <input name="Alta" type="submit" value="VER" id ="Alta" size = "10"  onload = "on_producto()" class="btn btn-warning">      	</td>
  </tr>
        <?php }?>

  <tr bgcolor="#F0F0F0">
    <td colspan="2"><?php echo $descripcion;?></td>
  </tr>
  <!-- <tr bgcolor="#E8DCFC">
    <td width="13%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Lote</font></div></td>
    <td width="24%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Mes - Año </font></div></td>
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

<?php

 $prestador;
 $gln;
?>
 <input name="id" type="hidden" value ="<?php echo $id;?>">
  <input name="prestador" type="hidden" value ="<?php echo $gln;?>">



<?php 
if(isset($_REQUEST['Alta'])) {

	switch ($_REQUEST['Alta'])
					{
						
			case "SI":
				{


$id= $_REQUEST['id'];
 $prestador = $_REQUEST['prestador'];

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

case "VER":{

 $prestador = $_REQUEST['prestador'];
$id= $_REQUEST['id'];
$informar= $_REQUEST['informar'];
$cod_mercaderia= $_REQUEST['cod_mercaderia'];



include ("refrescar.php");
break;	}


case "GUARDAR":
				{

$prestador = $_REQUEST['prestador'];
$id= $_REQUEST['id'];
$informar= $_REQUEST['informar'];
$cod_mercaderia= $_REQUEST['cod_mercaderia'];


//tabla mercaderia
$codigo=$_POST["codigo"];
$grup=$_POST["grupo"];
	for ($i=0;$i<count($grup);$i++)    
	{     
	$grupo = $grup[$i];  
				}
$nombre=$_POST["nombre"];

$informar_anmat=$_POST["informar_anmat"];

$nueva_droga=$_POST["nueva_droga"];

if ($nueva_droga != ""){

	$sql="select * from drogas ORDER BY cod_droga desc";
$result = $db->Execute($sql);

$cod=$result->fields["cod_droga"] + 1;
 $sql = "INSERT INTO drogas (`tipo`, `cod_droga`, `droga`) VALUES ('1', '$cod', '$nueva_droga')";
mysql_query($sql);

}else
{

$cod_drog=$_POST["cod_droga"];
	for ($i=0;$i<count($cod_drog);$i++)    
	{     
	$cod_droga = $cod_drog[$i];  
		
		}


}


$nuevo_laboratorio=$_POST["nuevo_laboratorio"];

if ($nuevo_laboratorio != ""){

	$sql="select * from laboratorios ORDER BY cod_laboratorio desc";
$result = $db->Execute($sql);

$cod=$result->fields["cod_laboratorio"] + 1;
 $sql = "INSERT INTO laboratorios (`cod_laboratorio`, `laboratorio`) VALUES ('$cod', '$nuevo_laboratorio')";
mysql_query($sql);

}else{


$laboratorio=$_POST["laboratorios"];
	for ($i=0;$i<count($laboratorio);$i++)    
	{     
	$laboratorios = $laboratorio[$i];  
		
		}


}


$presentacion=$_POST["presentacion"];
$cadenafrio=$_POST["cadenafrio"];
$cod_barra=$_POST["cod_barra"];
$margendif=$_POST["margendif"];
$observaciones=$_POST["observaciones"];

$cant_caja=$_POST["cant_caja"];
$precio_actualizado=$_POST["precio_actualizado"];

IF ($cant_caja == ""){
	$cant_caja = 1;
}

  $sql = "INSERT INTO `monodrogas` ( `troquel`, `grupo`, `nombre_comercial`, `cod_droga`, `presentacion`, `laboratorio`, `cadena_frio`, `cod_barra`, `porcentaje_diferencial`, `precio_actualizado`, `observaciones`, `cant_caja` , `informar`) VALUES ('$codigo' , '$grupo' , '$nombre' , '$cod_droga' , '$presentacion' , '$laboratorios' , '$cadenafrio' , '$cod_barra' , '$margendif' , '$precio_actualizado' , '$observaciones' , '$cant_caja' , '$informar_anmat')";
mysql_query($sql);


break;
				}

					
 case "OK":
				{
$prestador = $_REQUEST['prestador'];
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
?> <center><h4> PRODUCTO INEXISTENTE EN BASE </h4> </center>
<table width="800" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#999999"> 
    <td><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>ALTA 
      DE PRODUCTO </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td width="76%" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="codigo" id="codigo" class="form-control"  placeholder="Troquel" onKeyPress="return verif_caracter(this,event)" size="10" >
      </font>      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <select name="grupo[]" id="grupo" class="form-control"  placeholder="Grupo" onkeypress="return verif_caracter(this,event)">
        <option value="1" selected>Grupo 1</option>
        <option value ="2">Grupo 2</option>
        <option value ="3">Monoclonal</option>
      </select>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="nombre"  id="nombre"  class="form-control"  placeholder="Nombre 
      Comercial" size="50" onKeyPress="return verif_caracter(this,event)">
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
	
	
	
<select  class="selectpicker" data-live-search="true"  data-width="100%"   placeholder="Droga" name="cod_droga[]">
<?php
echo"<option value=>Seleccione Droga</option>";
include("../../../conexiones/db.php");
$con = connect();
if (!$con->set_charset("utf8")) {die("Error cargando el conjunto de caracteres utf8");}
$consulta = "SELECT * FROM drogas";
$resultado = mysqli_query($con , $consulta);
$contador=0;
while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++; 
$cod_droga = $misdatos["cod_droga"];
$droga =  $misdatos["droga"];
echo"<option value=$cod_droga>$droga ($cod_droga)</option>";
}?>          
</select>


     
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" class="form-control" name="nueva_droga" placeholder="Nueva Droga" id="nueva_droga"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" class="form-control" name="presentacion" id="presentacion"   placeholder="Presentación" size="30"onKeyPress="return verif_caracter(this,event)">
      (unidades y magnitud) </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
     <select  class="selectpicker" data-live-search="true"  data-width="100%"   placeholder="nueva_droga" name="laboratorios[]">
<?php
echo"<option value=>Seleccione Laboratorio</option>";
$con = connect();
if (!$con->set_charset("utf8")) {die("Error cargando el conjunto de caracteres utf8");}
$consulta = "select * from laboratorios ORDER BY laboratorio";
$resultado = mysqli_query($con , $consulta);
$contador=0;
while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++; 
$cod_laboratorio = $misdatos["cod_laboratorio"];
$laboratorio =  $misdatos["laboratorio"];
echo"<option value=$cod_laboratorio>$laboratorio ($cod_laboratorio)</option>";
}?>          
</select>
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" class="form-control" name="nuevo_laboratorio" id="nuevo_laboratorio"   placeholder="Nuevo Laboratorio" size="30"onKeyPress="return verif_caracter(this,event)">
    </font>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DCBB76"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">  
      </font><font color="#000000" size="2" face="Trebuchet MS">Cadena de frio</font><font size="2" face="Trebuchet MS">
      <input type="radio" name="cadenafrio" value="SI"tabindex="26" >
      SI 
      <input type="radio" name="cadenafrio" value="NO" tabindex="27"checked="TRUE">
      NO </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="cod_barra"  placeholder="Código 
      de Barras" class="form-control" id ="cod_barra" size="20" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      </font> </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="margendif"  placeholder="Porcentaje" class="form-control"  id ="margendif" size="5" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="observaciones"  placeholder="Observaciones" class="form-control" id ="observaciones" size="45" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="precio_actualizado"  placeholder="Precio Actualizado" class="form-control" id ="precio_actualizado" size="10" onKeyPress="return verif_caracter(this,event)">
    </font>  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="cant_caja"  placeholder="Cant x Caja" class="form-control" id ="cant_caja" size="5" onKeyPress="return verif_caracter(this,event)">
    </font>  </tr>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      </font><font color="#000000" size="2" face="Trebuchet MS">Informar a ANMAT</font>:<font size="2" face="Trebuchet MS">
<input type="radio" name="informar_anmat" value="SI"tabindex="26" >
SI
<input type="radio" name="informar_anmat" value="NO" tabindex="27"checked="TRUE">
NO</font>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"> 
    <td><div align="center"> 
        <input type="Submit" name="Alta" id = "guardar" value="GUARDAR" class="btn btn-primary">
		  
      </div></td>
  </tr>
</table>

<?php }else{ ////////////////////////////////////////////////////////////////////////////// 
// Si el código llega aquí, el producto SÍ existe.
// Se enciende la bandera para que JavaScript ponga el foco en 'gtin'.
$poner_foco_en_gtin = true;
?> 
 <input name="bande_buscar" type="hidden" value ="SI">
 <input name="cod_mercaderia1" type="hidden" value ="<?php $cod_mercaderia;?>">

<table width="800" border="0" cellspacing="0" onload = "on_producto()">
 <tr bgcolor="#B9CAF0">
    <td height="35" colspan="6"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>PRODUCTO: </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><span class="Estilo1">
        <!-- <?php if ($bande_buscar == "SI"){?>
      
      <input type = "text" name = "cod_mercaderia1" id="cod_mercaderia" size = "14" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      
      <?php }else{?>
      
        <input type = "text" name = "cod_mercaderia1" id="cod_mercaderia" size = "14" value = "<?php echo $cod_mercaderia;?>" onKeyPress="return verif_caracter(this,event)">
      
        <?php }?> -->
      
        <!-- <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > -->
        </span></strong></font><span class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $descripcion;?> - <?php echo $presentacion;?> ( <?php echo $cod_droga;?> <?php echo $droga;?>) </font></span>
    <!-- <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" > -->
    </div></td>
  </tr>  
  <tr bgcolor="#F0F0F0">
    <td colspan="6">
    
      <input type = "text"  class="form-control" name = "gtin" id="gtin" placeholder="GTIN" onKeyPress="return verif_caracter(this,event)" tabindex = "2" size = "130" style = "width: 75% !important;">
    </td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td width="19%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PRECIO UNIT. </font></div></td>
    <td width="30%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="15%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">MES</font></div></td>
    <td width="15%" colspan="2"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">AÑO</font></div></td>
    <td width="21%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">AGREGAR</font></div></td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td><div align="center"><font color="#000000" size="2">
        <input type = "text"  class="form-control" name = "precio_unitario" id="precio_unitario" size = "5" value = "<?php echo $precio_actualizado;?>" onKeyPress="return verif_caracter(this,event)" >
    </font></div></td>
    <td><div align="center"><font color="#000000" size="2">
      <input type = "text"  class="form-control" name = "lote" id="lote" size = "40" style = "width: 40% !important;" onKeyPress="return verif_caracter(this,event)">
    </font></div></td>
    <td><div align="center"><font color="#000000" size="2">
        <input type = "text" name = "mes_lote"  class="form-control" id="mes_lote"   style = "width: 40% !important;"onKeyPress="return verif_caracter(this,event)" >
      </font></div></td>
    <td><div align="right"><font color="#000000" size="2">20 
    </font></div></td>
    <td><div align="center"><font color="#000000" size="2">
      <input name = "anio_lote" type = "text" id="anio_lote"  class="form-control" style = "width: 40% !important;" onKeyPress="return verif_caracter(this,event)"  maxlength="2" >
    </font></div></td>
    <td><div align="center">
        <input name="Alta" type="submit" value="SI" id ="SI" size = "10" class="btn btn-success">
        <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <!-- <input name="Alta" type="submit" value= "BUSCAR" id = "Alta"> -->
        </font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">
        <input name="id" type="hidden" value ="<?php echo $id;?>">
        <input name="informar" type="hidden" value ="<?php echo $informar;?>">
	  <input name="prestador" type="hidden" value ="<?php echo $gln;?>">
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


 <script src="../vendors/bootstrap/dist/js/bootstrap1.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>


   <!-- Contenido -->    
       <script src="../vendors/jquery/dist/jquery1.min.js"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>  
  



    <!-- NProgress -->
<!--     <script src="../vendors/nprogress/nprogress.js"></script>
 -->    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>









</body>
</html>