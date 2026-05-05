<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;
$palabra=$_POST["busca"];

 $sql="select * from drogas_profe order by cod_droga asc ";
$result = $db->Execute($sql);
?>
<table width="800" border="0" cellspacing="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="12" bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS">LISTADO DE DROGAS AUTORIZADAS POR PROFE. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

     <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">COD DROGA</font></div></td>
    <td bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">DROGA</font></div></td>
  
    <td bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">NOMBRE COMERCIAL</font></div></td>
    <td width="25%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">GRUPO</font></div></td>
  </tr>
  <?php 


 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_droga=strtoupper($result->fields["cod_droga"]);

 $sql1="select * from drogas where cod_droga = $cod_droga";			  
$result1 = $db->Execute($sql1);
$tipo=strtoupper($result1->fields["tipo"]);
$droga=strtoupper($result1->fields["droga"]);


 $sql1="select * from monodrogas where cod_droga = $cod_droga";			  
$result11 = $db->Execute($sql1);
 // if (!$result11) die("fallo".$db->ErrorMsg());
 // while (!$result->EOF) {

$nombre_comercial=strtoupper($result11->fields["nombre_comercial"]);
$presentacion=strtoupper($result11->fields["presentacion"]);
$mostrar = $nombre_comercial." ".$presentacion;

//$result11->MoveNext();
//}

?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
       <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_droga");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$droga");?></font></div></td>
   
    <td bgcolor="#EDEDED"><font size="2" face="Trebuchet MS"><?php print("$mostrar");?></font></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$tipo");?></font></div></td>
  </tr>
  <?php 

$mostrar = "";

$result->MoveNext();
	}

?>
</table>
