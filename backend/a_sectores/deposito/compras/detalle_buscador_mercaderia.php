<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.Estilo4 {color: #333333}
.Estilo5 {color: #000000}
-->
</style>

<?php include("../../../conexiones/config_usu.php");

if ($palabra == ""){

$sql = "SELECT * FROM `monodrogas`";
}else{
$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$palabra' or nombre_comercial like '$palabra%'";
}
$result = $db->Execute($sql);



?>

<table width="103%" border="0">
  <tr bgcolor="#FFBC79">
    
	    <td width="14%" scope="col"><div align="center" class="Estilo26 Estilo1 Estilo2 Estilo5">TROQUEL</div></td>
    <td width="36%" scope="col"><div align="center" class="Estilo28 Estilo1 Estilo2 Estilo5">MONODROGA</div></td>
	    <td width="17%" scope="col"><div align="center" class="Estilo28 Estilo1 Estilo2 Estilo5"> LABORATORIO</div></td>
		       <td width="17%" scope="col"><div align="center" class="Estilo28 Estilo1 Estilo2 Estilo5"> PRESENTACION</div></td>
    
  </tr><?php 

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);
$troquel=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);




?><tr bgcolor="#FFFFBF">
   
    <td scope="col"><div align="center"><span class="Estilo26 Estilo1 Estilo2 Estilo5"><?php echo $troquel;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo28 Estilo1 Estilo2 Estilo4">
	<a href="pagina2.php?nro_proveedor=<?php echo $nro_proveedor;?>&&operador=<?php echo $operador;?>&&modo_carga=<?php echo $modo_carga;?>&&nro_factura=<?php echo $nro_factura;?>&&dia=<?php echo $dia;?>&&mes=<?php echo $mes;?>&&anio=<?php echo $anio;?>"><?php echo $nombre_comercial;?></a></span></div></td>
	    <td scope="col"><div align="center"><span class="Estilo26 Estilo2 Estilo1 Estilo4"><?php echo $laboratorio;?></span></div></td>
		   

            <td scope="col"><div align="center"><span class="Estilo28 Estilo1 Estilo2 Estilo4"><?php echo $presentacion;?></span></div></td>
  </tr>
<?php 


	        

	 $result->MoveNext();
				}

