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


<table width="800" border="1" cellspacing="0">
  <tr bgcolor="#E6E6E6">
    <td width="20%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo39 Estilo42 Estilo45 Estilo60 Estilo67 Estilo81 Estilo82 Estilo85">Cod. Droga</div></td>
    <td width="80%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo1 Estilo45 Estilo39 Estilo42 Estilo60 Estilo67 Estilo81 Estilo82 Estilo85">Descripci&oacute;n</div></td>
  </tr>

<?php 
	


$cod_mercaderia = $_REQUEST['cod_mercaderia'];
$matricula= $_REQUEST['matricula'];
$nro_cliente= $_REQUEST['nro_cliente'];
$a = $operador;
$nro_receta_nuevo= $_REQUEST['nro_receta_nuevo'];


$operador;

$presentacion = "";
$B = "";
$busca = "";


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

if (!$result) die("fallo2".$db->ErrorMsg());

 while (!$result->EOF) {

$cod_droga=strtoupper($result->fields["cod_droga"]);
$droga=strtoupper($result->fields["droga"]);






 if ($B == 1) {

?>
  <tr bordercolor="#FFFFCC" bgcolor="#E1F2EF" class="Estilo26">
    <?php 

			}





			?>
    <td height="20" bgcolor="#E6E6E6" class="Estilo61 Estilo82 Estilo85" scope="col"><div align="center"><?php print("$cod_droga");?>
    
</span>
</div>
      </div></td>
    <td bgcolor="#E6E6E6" scope="col"><span class="Estilo60 Estilo82 Estilo85"><a href="entrada_receta.php?nro_receta_nuevo=<?php print("$nro_receta_nuevo");?>>&&cod_droga=<?php print("$cod_droga");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>&&operador=<?php print("$operador");?>&&band1=1"><?php echo $droga;?></a></span></td>
  </tr>

<?php 
   $result->MoveNext();
				}
				
	?>	
</table>

