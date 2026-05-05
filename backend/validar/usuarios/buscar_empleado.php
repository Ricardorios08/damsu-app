<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo7 {font-family: Arial, Helvetica, sans-serif}
.Estilo8 {
	font-size: 10px;
	font-family: "Trebuchet MS";
}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo13 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
.Estilo14 {
	font-size: 12px;
	font-family: "Trebuchet MS";
}
-->
</style>
<link href="../../css/fondo.css" rel="stylesheet" type="text/css" />
  
<?php 
$buscador_rapido=$_POST["buscador_rapido"];
$B= 1;
$busqued=$_POST["busqueda"];
	for ($i=0;$i<count($busqued);$i++)    
	{     
$busqueda = $busqued[$i];    
	}




$mod=$_POST["mod"];
$busca=$_POST["busca"];
$palabra = $busca;

$busqueda = "VARIOS";
switch ($busqueda){
	case "VARIOS":{


?>

<style type="text/css">
<!--
.Estilo18 {color: #000000; }
.Estilo19 {font-family: "Trebuchet MS"}
.Estilo20 {font-size: 10px}
-->
</style>
<table width="800" border="0">
  <tr bgcolor="#C9FADF">
    <td colspan="11" bgcolor="#B8B8B8" scope="col"><div align="center" class="Estilo7">AGENDA</div></td>
  </tr>
  <tr bgcolor="#000099">
    <td width="17%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Apellido</div></td>
    <td width="15%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Nombre</div></td>
    <!-- <td width="9%" scope="col"><div align="center"><span class="Estilo5">Direccion</span></div></td> -->
    <td width="6%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Telefono</div></td>
    <td width="6%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Celular</div></td>
    <td width="7%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Interno</div></td>
    <td width="12%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Sector</div></td>
    <td width="12%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Puesto</div></td>
    <td width="7%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Cumple</div></td>


<?php if ($mod == "SI"){?>
    <td width="5%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Mod</div></td>
    <td width="5%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Borrar</div></td>
	<?php }?>
	<td width="5%" bgcolor="#999999" scope="col"><div align="center" class="Estilo18">Ficha</div></td>
  </tr>
  	<?php 


if ($buscador_rapido == 2){
	 
	include ("../../conexiones/config.inc.php");
}else{
	include ("../conexiones/config.inc.php");
}

if ($busca == ""){
   $sql = "SELECT * FROM `empleados` order by apellido";
}
else{
	$sql = "SELECT * FROM `empleados` where apellido like '%$busca%' or nombre like '%$busca%' or puesto like '%$busca%' or sector like '%$busca%' or interno like '$busca%' order by apellido";
}


$result = $db->Execute($sql);
 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$id=$result->fields["id"];
$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$direccion=strtoupper($result->fields["direccion"]);
$telefono=$result->fields["telefono"];
$celular =strtoupper($result->fields["celular"]);
$email=$result->fields["email"];
$interno=strtoupper($result->fields["interno"]);
$sector=strtoupper($result->fields["sector"]);
$puesto=strtoupper($result->fields["puesto"]);
$mes=strtoupper($result->fields["mes"]);
$anio=strtoupper($result->fields["anio"]);

?>
<tr>
    <td height="34" colspan="2" bordercolor="#E1F2EF" class="Estilo5 Estilo8" scope="col"><?php echo $apellido;?> <?php echo $nombre;?>
    <div align="center"></div></td>
    <!--  <td scope="col"><?php echo $direccion;?></td> -->
    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo11 Estilo14"><strong><?php echo $telefono;?></strong></div></td>
    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo11 Estilo19"><?php echo $celular;?></div></td>
    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo11 Estilo19"><?php echo $interno;?></div></td>

    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo11 Estilo19"><?php echo $sector;?></div></td>
	<td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo11 Estilo19"><?php echo $puesto;?></div></td>
    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo11 Estilo19"><?php echo $mes."/".$anio;?></div></td>
    

<?php if ($mod == "SI"){?>
    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo19"><a href="entrada_empl_mod.php?id=<?php print("$id");?>" target="central"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0">
    </a></div></td>
    <td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo19"><a href="borra.php?id=<?php print("$id");?>&&apellido=<?php print("$apellido");?>"><IMG SRC="../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a> </div></td>
	<td bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="center" class="Estilo19"><a href="ficha.php?id=<?php print("$id");?>"><IMG SRC="../../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </div></td>
<?php }else{?>
	<td width="3%" class="Estilo5" scope="col"><div align="center" class="Estilo19"><a href="usuarios/ficha.php?id=<?php print("$id");?>"><IMG SRC="../imagenes/office//005.ico" alt="Ficha" border = "0"></a> </div></td>
<?php }?>
  </tr>
<tr>
  <td height="21" colspan="5" bordercolor="#E1F2EF" class="Estilo13" scope="col"><div align="left" class="Estilo19"><span class="Estilo20"><span class="Estilo18"><?php echo $direccion;?></span></span></div></td>
  <td colspan="7" bordercolor="#E1F2EF" class="Estilo5" scope="col"><div align="left" class="Estilo19"><span class="Estilo20">
  
  <a href="mailto:<?php echo $email;?>?subject=Notificacion ABM">
<?php echo $email;?></a> 

</span></div></td>
  </tr>
<tr>
  <td height="21" colspan="12" class="Estilo13" scope="col"><hr noshade> </td>
  </tr>

<?php 
$result->MoveNext();
	}

?>
</table>

<?php break;
	}
	
	case "OBRA":{
	include ("../../a_sectores/secretaria/a_obras sociales/os_agenda.php");
	BREAK;
	}

case "BIOQUIMICOS":{
	$no_borrar = "SI";
	include("../../a_sectores/secretaria/a_bioquimicos/buscar_bioquimicos1.php");
	BREAK;
	}

case "CUENTAS":{
		$no_borrar = "SI";
	include ("../../a_sectores/secretaria/a_cuentas/laboratorio_agenda.php");
	BREAK;
	}
	}?>