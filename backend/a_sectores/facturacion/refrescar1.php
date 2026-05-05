

<table width="800" border="0">
  <tr bgcolor="#E6E6E6">
    <td width="9%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo39 Estilo42 Estilo45 Estilo16 Estilo60 Estilo67 Estilo69 Estilo86">Cod.</div></td>
    <td width="25%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo16 Estilo60 Estilo67 Estilo69 Estilo86">Descripcion</div></td>
    <td width="16%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo16 Estilo60 Estilo67 Estilo69 Estilo86">Presentaci&oacute;n</div></td>
    <td width="9%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo87"><span class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60  Estilo16">Lote</span></div></td>
    <td width="10%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo87"><span class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60  Estilo16">Vencimiento</span></div></td>
    <td width="10%" bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60  Estilo16 Estilo69">Serie</span></div></td>
    <td width="9%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo87"><span class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60  Estilo16">GTIN</span></div></td>
    <td width="8%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo87"><span class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60  Estilo16">Precio</span></div></td>
    <td width="14%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo87"><span class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60  Estilo16">Prov.</span></div></td>
  </tr>

<?php 
	

 $gtin;
$cod_mercaderia = $_REQUEST['gtin'];
$matricula= $_REQUEST['matricula'];
$nro_cliente= $_REQUEST['nro_cliente'];
$operador= $_REQUEST['operador'];
$nro_serie= $_REQUEST['nro_serie'];
$busca == "SI";
include("../../conexiones/config_pro.php");

if ($cod_mercaderia == ""){
 $sql = "SELECT monodrogas.*,tr_existencias.* FROM monodrogas,tr_existencias where cantidad_salida = 0 and monodrogas.cod_barra = tr_existencias.cod_mercaderia "; 
}
else
{
  $sql = "SELECT monodrogas.*,tr_existencias.* FROM monodrogas,tr_existencias where ((cantidad_salida = 0 and  troquel like '$cod_mercaderia%' and monodrogas.cod_barra = tr_existencias.cod_mercaderia and  tr_existencias.nro_serie like '%$nro_serie%') or (cantidad_salida = 0 and  nombre_comercial like '$cod_mercaderia%' and monodrogas.cod_barra = tr_existencias.cod_mercaderia and  tr_existencias.nro_serie like '%$nro_serie%'))";
}

$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$descripcion=strtoupper($result->fields["nombre_comercial"]);
$cod_merca=strtoupper($result->fields["troquel"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$proveedor=strtoupper($result->fields["proveedor"]);


 $cod_merquita=strtoupper($result->fields["cod_mercaderia"]);
$nro_proveedor=strtoupper($result->fields["proveedor"]);
 $gtin=strtoupper($result->fields["gtin"]);

 $nro_serie=strtoupper($result->fields["nro_serie"]);





$lote=strtoupper($result->fields["lote"]);

$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$vto_lote=$mes_lote."/".$anio_lote;

$nombre=strtoupper($result->fields["nombre"]);
$presentacion=strtoupper($result->fields["presentacion"]);


$sql5="select * from proveedores where cod_proveedor = $nro_proveedor";
$result5 = $db->Execute($sql5);
$proveedor=strtoupper($result5->fields["denominacion"]);


$precio_actualizado = number_format($precio_actualizado,2);
$contar = $contar + 1;



if ($cod_merquita == ""){
$result->MoveNext();
}
else {
if ($descripcion == ""){

$result->MoveNext();
}
else
	 {
 if ($B == 1) {

?>
  <tr bordercolor="#FFFFFF" bgcolor="#CCFFCC" class="Estilo26" >
    <?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?>
  <tr bordercolor="#FFFFCC" bgcolor="#E1F2EF" class="Estilo26">
    <?php 

			}





			?>
    <td height="20" bgcolor="#E6E6E6" class="Estilo61" scope="col"><div align="center"><a href="entrada_factura_4.php?documento=<?php print("$documento");?>&&operador=<?php print("$operador");?>&&gtin=<?php print("$gtin");?>&&nro_serie=<?php print("$nro_serie");?>&&matricula1=<?php print("$matricula");?>&&nro_factura=<?php print("$nro_factura");?>&&dia=<?php print("$dia");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$anio");?>&&producto=<?php print("$descripcion");?>&&nro_os[]=<?php print("$nro_os");?>&&cod_merquita=<?php print("$cod_merquita");?>&&cantidad_existente=<?php print("$cantidad_existente");?>&&cod_merca=<?php print("$cod_merca");?>&&manual=1&&pasada=1&&no_hacer_nada=<?php print("$no_hacer_nada");?>"><?php print("$cod_merca");?>
    
	</a></span>
</div>
    </div></td>
    <td bgcolor="#E6E6E6" scope="col"><span class="Estilo60"><?php echo $descripcion;?></span></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $presentacion;?></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $lote;?>
</div>
    <div align="center" class="Estilo60"></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $vto_lote;?>
</div>
    <div align="center" class="Estilo60"></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center"><span class="Estilo60"><?php echo $nro_serie;?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $gtin;?>
</div>
    <div align="center" class="Estilo60"></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center"><span class="Estilo60">$ <?php echo $precio_actualizado;?></span></div></td>
	    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $nro_proveedor;?> <?php echo $proveedor;?>  </tr>

<?php 


   $result->MoveNext();
				}
				}

 
 }
	?>	
</table>

