<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
<table width="800 px" class = "class"  >
  <tr >
    <td bgcolor="#99D0EE" ><div align="center" >COD</div></td>
    <td bgcolor="#99D0EE" ><div align="center" >DESCRIPCION</div></td>
	<td bgcolor="#99D0EE"  ><div align="center" >PRESENTACION</div></td>
 
  </tr>

<?php 
	


$cod_mercaderia = $_REQUEST['cod_mercaderia'];

include("../../../conexiones/config_pro.php");

if ($cod_mercaderia == ""){
 $sql = "SELECT * FROM `monodrogas` order by nombre_comercial";
}
else
{

  $sql = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` LIKE '$cod_mercaderia%' or troquel LIKE '$cod_mercaderia%' or nombre_comercial  LIKE '$cod_mercaderia%')";
}
$result = $db->Execute($sql);

if (!$result) die("fallo22".$db->ErrorMsg());

 while (!$result->EOF) {

$sql = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";

 $cod_merca=strtoupper($result->fields["troquel"]);
 $descripcion=strtoupper($result->fields["nombre_comercial"]);
 $presentacion=strtoupper($result->fields["presentacion"]);
 $grupo =$result->fields["grupo"];
if ($descripcion == ""){

$result->MoveNext();
}
else
	 {
 


?>

  <tr >
    <td ><a href="pagina2.php?cod_mercaderia=<?php print("$cod_merca");?>&&id=<?php print("$id");?>&&prestador=<?php print("$prestador");?>&&bande_buscar=SI"><?php print("$cod_merca");?>
</span></td>
    <td > <?php echo $presentacion;?></span></div>	</div></td>
     <td > <?php echo $presentacion;?></span></div>	</div></td>
  </tr>

<?php 
   $result->MoveNext();
				}
				}

 


	
	?>	
</table>

