<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description"content="">
<meta charset="utf-8">
<title>DAMSU</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<script>


</script>


    

    <?php
include ("../../conexiones/config_pro.php");

$nro_factura= $_REQUEST['nro_factura'];

$sql = "SELECT * FROM `tr_ventas_encabezado` where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$fecha=$result->fields["fecha"];
 
$nro_fact = str_pad($nro_factura, 10, "0", STR_PAD_LEFT);

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $dia."/".$mes."/".$anio;

 




 $documento=$result->fields["documento"];
 $denominacion=$result->fields["denominacion"];



    ?>
    <body onload="on_load ()">
    <FORM ACTION="guardar_modificacion.php" METHOD="POST" enctype="multipart/form-data"name="form">
	<br>
    <div class = 'container'>
	<table class="table">
	  <!--DWLayoutTable-->
    <tr>
    <td colspan="2" bgcolor="#C6C9F2" class="bg-info text-white"><h3 align="center">Modificar Cabecera <?php echo $nro_factura;?> <?php echo $documento;?> - <?php echo $denominacion;?> </h3></td>
    </tr>
    <tr>
    <td width="525"><div align="right">Paciente: </div></td>
    <td width="560"><?php echo $denominacion;?></td>
    </tr>
    <tr>
    <td><div align="right">Documento</div></td>
    <td>
    <input name="documento"class="form-control"style="width: 40% !important;"type="text"id="documento"onKeyPress="return verif_caracter(this,event)" value="<?php echo $documento;?>"size="8">    
	
	<input name="nro_factura" type="hidden"  value="<?php echo $nro_factura;?>">    </td>
    </tr>
    <tr>
      <td><div align="right">Contrase&ntilde;a</div></td>
      <td><input name="password"class="form-control"style="width: 40% !important;" type="password"id="password"onKeyPress="return verif_caracter(this,event)" size="8">      </td>
    </tr>
    
    





    <tr bgcolor="#B8B8B8">
      <td height="26" colspan="2" valign="top"><div align="center">
      <input name="Alta" class="btn btn-info" type="submit" value="GUARDAR" id="Alta" size="10"  onClick="enter()">
      </center>
      <input type="hidden"name="band"value="NO">
      <input type="hidden"name="band_pri"value="SI">
      </div></td>
    </tr>
    </table>
	</div>
    </form>


    


    </body>
    </html>