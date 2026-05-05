<style type="text/css">
<!--
.Estilo26 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->


<!--
.Estilo67 {color: #FFFFFF; font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
-->

<!--
.Estilo81 {color: #000000}
.Estilo82 {font-family: "Trebuchet MS"}
.Estilo85 {font-size: 12px}
-->



</style>


<table width="800" border="0">
  <tr bgcolor="#E6E6E6">
    <td width="10%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo39 Estilo42 Estilo45 Estilo60 Estilo67 Estilo81 Estilo82 Estilo85">Cod. Droga</div></td>
    <td width="28%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60 Estilo67 Estilo81 Estilo82 Estilo85">Descripci&oacute;n</div></td>
    <td width="19%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60 Estilo67 Estilo81 Estilo82 Estilo85">Presentaci&oacute;n</div></td>
  </tr>

<?php 
	


$cod_mercaderia = $_REQUEST['cod_mercaderia'];
$matricula= $_REQUEST['matricula'];
$nro_cliente= $_REQUEST['nro_cliente'];
$operador= $_REQUEST['operador'];
$nro_protocolo= $_REQUEST['nro_protocolo'];

$presentacion = "";
$B = "";
$busca = "";
$operador = "";


$busca == "SI";

include("../../../conexiones/config_pro.php");

if ($cod_droga == ""){
$sql = "SELECT * FROM drogas order by droga";
}
else
{
 $sql = "SELECT * FROM drogas  WHERE  cod_droga like '$cod_droga%' OR droga like '$cod_droga%'";
}
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$cod_droga=strtoupper($result->fields["cod_droga"]);
$droga=strtoupper($result->fields["droga"]);


$sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result1 = $db->Execute($sql1);
$descripcion=strtoupper($result1->fields["nombre_comercial"]);





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
    <td height="20" bgcolor="#E6E6E6" class="Estilo61 Estilo82 Estilo85" scope="col"><div align="center"><a href="entrada_protocolo1.php?nro_protocolo=<?php print("$nro_protocolo");?>"><?php print("$cod_droga");?>
    
	</a></span>
</div>
      </div></td>
    <td bgcolor="#E6E6E6" scope="col"><span class="Estilo60 Estilo82 Estilo85"><a href="entrada_protocolo1.php?nro_protocolo=<?php print("$nro_protocolo");?>&&cod_droga=<?php print("$cod_droga");?>&&band1=1"><?php echo $descripcion;?></a></span></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60 Estilo82 Estilo85"><a href="entrada_protocolo1.php?nro_protocolo=<?php print("$nro_protocolo");?>"><?php echo $presentacion;?></a></div></td>
  </tr>

<?php 
   $result->MoveNext();
				}
				
	?>	
</table>

