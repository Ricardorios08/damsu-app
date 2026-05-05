<style type="text/css">
<!--
.Estilo4 {font-family: "Trebuchet MS"}
.Estilo87 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>


<?php
$cont = "";
$renglon = "";
include("../../conexiones/config_pro.php");

if ($palabra == ""){
$sql="select * from `protocolo`";
}else{
 $sql="select * from `protocolo` where `nro_protocolo` like '%$palabra%' or nombre_diagnostico  like '%$palabra%'";
}
$result = $db->Execute($sql);

?>
<table width="800" border="1" cellspacing="0">
 
<?php

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {


$situacion=strtoupper($result->fields["situacion"]); 
$linea=strtoupper($result->fields["linea"]); 
$esquema=strtoupper($result->fields["esquema"]); 
$plan=strtoupper($result->fields["plan"]); 
$alternativa=strtoupper($result->fields["alternativa"]); 
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]); 
$nro_protocolo=strtoupper($result->fields["nro_protocolo"]); 



 $sql1="select * from diagnostico where nro_diagnostico like '$nro_diagnostico' ";
$result1 = $db->Execute($sql1);
$nombre_diagnostico=strtoupper($result1->fields["nombre_diagnostico"]); 
		 	
?> 
<tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="42" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">N&deg;  </font></font></div></td>
    <td width="242" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2"><font color="#FFFFFF">DIAGNOSTICO</font> </font></font></div></td>
    <td width="250" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">SITUACION</font></font></div></td>
	
<td width="56" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">LINEA</font></font></div></td>
<td width="69" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">ESQUEMA</font></font></div></td>
	<td width="30" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">PLAN</font></font></div></td>
	<td width="81" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">ALTERNATIVA</font></font></div></td>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_protocolo");?></font></td>
    <td><span class="Estilo87"><?php print("$nombre_diagnostico");?></span></td>
	    <td><span class="Estilo87"><?php print("$situacion");?></span></td>
		 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$linea");?></font></div></td>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$esquema");?></font></div></td>
		  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$plan");?></font></div></td>
		  		  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$alternativa");?></font></div></td>
<?php if ($palabra != ''){?>
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <td colspan="7"><span class="Estilo87">
    <?php include ("ver_detalle_protocolo.php");?></span></td>

  <?php 

}
else{?>
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <td colspan="7"><div align="right"><a href="a_pacientes/ver_detalle1.php?nro_protocolo=<?php print("$nro_protocolo");?>" class="Estilo87">Mostrar Detalle del Protocolo</a>
    
   </div></td>

<?php
	}
 $result->MoveNext();
				}

	
?>
</table>
