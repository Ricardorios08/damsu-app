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
function on_load()
    {
    document.getElementById("nro_proveedor").focus();
    }

    function enter()
    {
    document.getElementById("nro_proveedor").focus();
    }


    function verif_caracter(obj,evt)

    {

    evt=(evt)?evt:event;
    var charCode=(evt.charCode)?evt.charCode:((evt.which)?evt.which:evt.keyCode);
    if(charCode==13)


    {
    switch(obj.id)
    {
    case"operador":
    document.getElementById("nro_proveedor").focus();
    break;
    case"nro_proveedor":
    document.getElementById("dia").focus();
    break;
    case"dia":
    document.getElementById("mes").focus();
    break;


    case"mes":
    document.getElementById("anio").focus();
    break;
    case"anio":
    document.getElementById("expendio").focus();
    break;

    case"expendio":
    document.getElementById("nro_factura").focus();
    break;

    case"nro_factura":
    document.getElementById("porcentaje_boni1").focus();
    break;

    case"porcentaje_boni1":
    document.getElementById("porcentaje_boni").focus();
    break;

    case"porcentaje_boni":
    document.getElementById("porcentaje_dto").focus();
    break;

    case"cod_mercaderia":
    document.getElementById("porcentaje_dto").focus();
    break;


    }
    return false;
    }
    return true;
    }


    function abrirVentan(){
    var cod_detalle=<?php echo $cod_detalle;?>
    open("buscador_rapido.php","miVentana","width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, top = 35");
    }


    </script>


    </head>

    <?php

    $id=$_REQUEST['id'];
    $usuario=$_REQUEST['id'];
    $documento=$_REQUEST['documento'];

    $dia=date("d");
    $mes=date("m");
    $anio=date("y");


    include("../../../conexiones/config_pro.php");
    include("../../../conexiones/usuario_compra.php");

    $sql8="SELECT * FROM `pacientes` where documento = '$documento'";
    $result8=$db->Execute($sql8);
    $apellido=$result8->fields["apellido"];
    $nombre=$result8->fields["nombre"];


    $sql="DELETE FROM tr_compras1_encab_temp where operador = $id";
    $result=$db->Execute($sql);

    $sql="DELETE FROM tr_compras1_deta_temp where operador = $id";
    $result=$db->Execute($sql);


    ?>
    <body onload="on_load ()">
    <FORM ACTION="pagina2.php"METHOD="POST"enctype="multipart/form-data"name="form">
	<br>
    <div class = 'container'>
	<table class="table">
	  <!--DWLayoutTable-->
    <tr>
    <td class="bg-info text-white"colspan="2"><h3 align="center">ENTREGAR A PRESTADORES</h3></td>
    </tr>
    <tr>
    <td width="525"><div align="right">Paciente: </div></td>
    <td width="560">
    <?php echo $apellido;?> <?php echo $nombre;?>
    <input type="hidden"name="id"value="<?php echo $id;?>"onKeyPress="return verif_caracter(this,event)">
    <?php $nombre_usuario;?>
    </td>
    </tr>
    <tr>
    <td><div align="right">Documento</div></td>
    <td>
    <input name="documento"class="form-control"style="width: 40% !important;"type="text"id="documento"onKeyPress="return verif_caracter(this,event)"value="<?php echo $documento;?>"size="8">
    </td>
    </tr>
    <tr>
    <td><div align="right">Fecha de Entrega:</div></td>
    <td>
    <input type="text"name="dia"id="dia"size="2"onKeyPress="return verif_caracter(this,event)"value="<?php echo $dia;?>"maxlength="2">
    /
    <input type="text"name="mes"id="mes"size="2"onKeyPress="return verif_caracter(this,event)"value="<?php echo $mes;?>"maxlength="2">
    /20
    <input type="text"name="anio"id="anio"size="4"onKeyPress="return verif_caracter(this,event)"value="<?php echo $anio;?>"maxlength="2">
    </td>
    </tr>

    <tr>
      <td><div align="right">Prestador:</div></td>
      <td><?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from usuario where rol LIKE 'PRESTADOR' ORDER BY nombre_usuario";
$result = $db->Execute($sql);
echo "<select name=prestador[] size=1 id =cod_diagnostico onKeyPress='return verif_caracter(this,event)'> required ";
echo"<option value=''>Seleccione</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$id_prestador=$result->fields["id"];
$nombre_usuario=strtoupper($result->fields["nombre_usuario"]);
 

echo"<option value=$id_prestador>$nombre_usuario ($id_prestador)</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
    </tr>





    <tr bgcolor="#B8B8B8">
      <td height="26" colspan="2" valign="top"><div align="center">
      <input name="Alta" class="btn btn-info" type="submit" value="CONTINUAR" id="Alta" size="10"  onClick="enter()">
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