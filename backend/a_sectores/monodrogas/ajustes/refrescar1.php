<style type="text/css">
<!--
.Estilo30 {color: #FFFFFF}
.Estilo39 {font-family: Arial, Helvetica, sans-serif}
.Estilo42 {font-size: 12px}
.Estilo47 {
	font-family: "Trebuchet MS";
	font-size: 14px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>

<FORM name="form" ACTION="pagina2.php" METHOD = "POST">




<table width="800" border="1" cellspacing="0">
  

<?php 
	


$cod_mercaderia = $_REQUEST['cod_mercaderia'];

include("../../../conexiones/config_pro.php");

if ($cod_mercaderia1 == ""){
 $sql = "SELECT * FROM `monodrogas` WHERE laboratorio like 'UNICO%' order by nombre_comercial";
}
else
{

 $sql = "SELECT * FROM `monodrogas`  WHERE  troquel LIKE '$cod_mercaderia1' order by cod_droga";
}
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {



 $cod_merca=strtoupper($result->fields["troquel"]);
 $descripcion=strtoupper($result->fields["nombre_comercial"]);
 $presentacion=strtoupper($result->fields["presentacion"]);
 $grupo =$result->fields["grupo"];
 $cod_droga=$result->fields["cod_droga"];
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);


 



$precio_actualizado = $precio_actualizado / $cant_caja;



$sql3 = "SELECT * FROM `drogas`  WHERE  cod_droga= $cod_droga";
$result3 = $db->Execute($sql3);
$nombre_droga=strtoupper($result3->fields["droga"]);



if ($descripcion == ""){

$result->MoveNext();
}
else
	 {



?>
<tr bgcolor="#000099">
    <td colspan="5" bgcolor="#EDEDED" scope="col">
    <span class="Estilo47">PRODUCTO: <?php print("$cod_merca");?> &nbsp;&nbsp;<?php echo $descripcion;?> &nbsp;&nbsp;<?php echo $nombre_droga;?> (<?php echo $cod_droga;?>) &nbsp;&nbsp; <?php echo $presentacion;?>  &nbsp;&nbsp;<?php echo $grupo;?>      </span></td>
  </tr>
  <tr bgcolor="#000099">
    <td width="23%" bgcolor="#666666" scope="col"><div align="center" class="Estilo1 Estilo30 Estilo39 Estilo42">LOTE</div></td>
    <td width="20%" bgcolor="#666666" scope="col"><div align="center" class="Estilo1 Estilo30 Estilo39 Estilo42"> MES / A&Ntilde;O </div></td>
    <td width="28%" bgcolor="#666666" scope="col"><div align="center"><span class="Estilo1 Estilo30 Estilo39 Estilo42">PRECIO UNITARIO</span></div>
    <div align="center" class="Estilo1 Estilo30 Estilo39 Estilo42"></div>      <div align="center" class="Estilo1 Estilo30 Estilo39 Estilo42"></div></td>
    <td width="24%" bgcolor="#666666" scope="col"><div align="center"><span class="Estilo1 Estilo30 Estilo39 Estilo42">CANTIDAD</span></div></td>
    <td width="5%" bgcolor="#666666" scope="col">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td scope="col"><font color="#000000" size="2">
      <input type = "text" name = "lote" id="lote1" size = "30" onKeyPress="return verif_caracter(this,event)">
    </font></td>
    <td scope="col"><div align="center"><font color="#000000" size="2">
      <input type = "text" name = "mes_lote" id="mes_lote1" size = "2" onKeyPress="return verif_caracter(this,event)" >
      /</font><font color="#000000" size="2"> 20
  <input name = "anio_lote" type = "text" id="anio_lote1" onKeyPress="return verif_caracter(this,event)" size = "2" maxlength="2" >
</font></div></td>
    <td scope="col"><div align="center"><font color="#000000" size="2">
      <input name = "precio_unitario" type = "text" id="precio_unitario1" onKeyPress="return verif_caracter(this,event)" value="<?php echo $precio_actualizado;?>" size = "5" >
    </font></div></td>
    <td scope="col"><div align="center">
      <input type = "text" name = "cantidad" id="cantidad1" onKeyPress="return verif_caracter(this,event)" tabindex = "2" size = "2">


    </div></td>
    <td scope="col"><input type="submit" name="Alta" id = "OK" value="OK"></td>
  </tr>
  

<?php 
   $result->MoveNext();
				}
				}

 
	
	?>	


      <input type = "hidden" name = "bande_buscar" value = "SI">
      <input type = "hidden" name = "cod_mercaderia" value = "<?php echo $cod_merca;?>">
      <input type = "hidden" name = "id" value = "<?php echo $id;?>">
</table>

