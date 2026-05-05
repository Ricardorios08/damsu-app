<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<script language="javascript">
function on_load()
{
document.getElementById("forma_pago").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "forma_pago":
document.getElementById("cod_mercaderia").style.backgroundColor =  "#CCFFCC";
document.getElementById("cod_mercaderia").focus();
				break;

				case "cod_mercaderia":
document.getElementById("cod_mercaderia").style.backgroundColor = "#ffffff";	document.getElementById("cantidad").style.backgroundColor =  "#CCFFCC";
				document.getElementById("cantidad").focus();
				break;
				
				case "cantidad":
document.getElementById("cod_mercaderia").style.backgroundColor = "#CCFFFF";	document.getElementById("cantidad").style.backgroundColor =  "#CCFFFF";

				document.getElementById("OK").focus();
				break;
				
				
		}
		return false;
	}
	return true;
}

function abrirVentan() {
	var cod_detalle = <?echo $cod_detalle;?> 
    open("buscador_rapido.php","miVentana", "width=300,height=200,toolbar=no,directories=no,menubar=no,status=no, top = 35");
}
</script>
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
.Estilo28 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Estilo21 {font-size: 10px; color: #006633; }
.Estilo22 {color: #006633; font-size: 10px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
.Estilo26 {	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Estilo30 {color: #FFFFFF}
.Estilo31 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #FFFFFF; }
.Estilo32 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	color: #000000;
	background-color: #E8DCFC;
	cursor: crosshair;
	text-align: center;
}
.Estilo33 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; color: #006633;}
-->
</style>
</head>

<?

$nro_factura= $_REQUEST['nro_factura'];
$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$año= $_REQUEST['anio'];
$nro_cliente= $_REQUEST['nro_cliente'];
$matricula= $_REQUEST['matricula'];



	if (($nro_cliente !="" and $matricula!="")){

	echo "No Puede ingresar Nº de Cliente y Matricula a la vez";
	?>
	<a href="entrada_factura.php" target = "central"> [Volver]</a>
	<?
}
elseif ($nro_cliente!=""){
 include("../../../conexiones/config_pro.php");
$sql="select * from clientes where cuenta like '$nro_cliente'";
$result = $db->Execute($sql);
$denominacion=strtoupper($result->fields["denominacion"]);
$todo = $denominacion." (".$nro_cliente.")";
$band = "cliente";
}
elseif ($matricula!=""){ 
 include("../../../conexiones/config.inc.php");
$sql="select * from datos_laboratorio where nro_laboratorio like '$matricula'";
$result=$db->Execute($sql);

$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$matricula1=$result->fields["matricula"];

$sql1="select * from datos_personales where matricula like '$matricula1'";
$result1 = $db->Execute($sql1);

$nombre=strtoupper($result1->fields["nombre"]);
$apellido=strtoupper($result1->fields["apellido"]);
$nombre_responsable=$apellido.", ".$nombre." (".$matricula.")";

$todo="Lab. ".$nombre_laboratorio." / Resp. ".$nombre_responsable;
$band = "cuenta";
}



?>


<body onload = "on_load ()">
<FORM name="form" ACTION="entrada_factura_3.php"" METHOD = "POST">
<table width="103%" border="0">
  <tr bgcolor="#E1F2EF">
    <td width="80%" bgcolor="#000099"><div align="left" class="Estilo28 Estilo30">
      <div align="right"><strong>pag2 N&ordm; FACTURA: <?echo $nro_factura;?></strong></div>
    </div></td>
    <td width="20%" bgcolor="#000099"><div align="right" class="Estilo31">FECHA   <?echo $dia;?> / <?echo $mes;?> / <?echo $año;?> </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td colspan="2"><span class="Estilo28">Nombre o Raz&oacute;n Social: <?echo $todo;?></span> </td>
  </tr>
  <tr bgcolor="#E6E6E6">

	<td height="26" colspan="2"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26">
  
	 <input name="forma_pago" type="text" class="Estilo32" id="forma_pago" onKeyPress="return verif_caracter(this,event)" value="1" size = "1">
    </span></span></span></span>
  
<?if ($band == "cuenta"){?>
	  1-Contado
  / 2-Liquidaci&oacute;n <?}?>
  
<?if ($band == "cliente"){?>
  1-Contado / 2-Cuenta Corriente<?}?>


  </td>
  </tr>
  <tr bgcolor="#E6E6E6">
    <td height="26" colspan="2"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26">
      Producto
                <input name="cod_mercaderia" type="text" id="cod_mercaderia" size = "5" onKeyPress="return verif_caracter(this,event)">
                Cantidad
                <input name="cantidad" type="text" id="cantidad" size = "5" onKeyPress="return verif_caracter(this,event)">

<input name="matricula" type="hidden" value ="<?echo $matricula;?>">
<input name="nro_cliente" type="hidden" value ="<?echo $nro_cliente;?>">
<input name="dia" type="hidden" value ="<?echo $dia;?>">
<input name="mes" type="hidden" value ="<?echo $mes;?>">
<input name="anio" type="hidden" value ="<?echo $año;?>">
<input name="nro_factura" type="hidden" value ="<?echo $nro_factura;?>">
<input name="pasada" type="hidden" value ="1">

               <input name="Alta" type="submit" value= "OK" id = "OK" >
    </span></span></span></span></td>
  </tr>
</table>
</form>
		
</html>
