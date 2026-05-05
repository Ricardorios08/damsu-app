	<table width="430" border="1" align="center" cellspacing="0">
     
	  <?php 

	  include ("../../../conexiones/config_usu.php");

include ("../../../funciones/funciones.php");
$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];

 $sql3="select * from paciente_diagnostico where documento like '$documento' and tipo_doc = $tipo_doc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$nro_ficha=$result3->fields["nro_ficha"];
$documento=$result3->fields["documento"];
$cod_diagnostico=$result3->fields["cod_diagnostico"];

  $cod_diagnostico = str_replace(' ', '', $cod_diagnostico);


$fecha_diagnostico=fecha_argentina($result3->fields["fecha_diagnostico"]);
$base=$result3->fields["base"];
$cod_fuente=$result3->fields["cod_fuente"];
$matricula=$result3->fields["matricula"];
$observaciones=$result3->fields["observaciones"];
$primario=$result3->fields["primario"];
$estadio=$result3->fields["estadio"];

  $sql4="select * from diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result4 = $db->Execute($sql4);

 $nombre_diagnostico=$result4->fields["nombre_diagnostico"];


$sql4="select * from fuentes where nro_fuente like '$cod_fuente'";
$result4 = $db->Execute($sql4);

$nombre_fuente=$result4->fields["nombre_fuente"];

?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="54" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<a href="../a_pacientes/modificar_des_diagnostico.php?id=<?php print("$documento");?>" target = "central1"><?php print("$fecha_diagnostico");?></a>

</font></div></td>

        <td width="330" height="24" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_diagnostico");?></font></div></td>

	    <td width="32" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"> <a href="../a_pacientes/borra_paciente_diagnostico.php?id=<?php print("$nro_ficha");?>&&documento=<?php print("$documento");?>&&tipo_doc=<?php print("$tipo_doc");?>" onclick="return confirm('¿Está seguro de borrar este DIAGNOSTICO?');" target = "central1"><img src="../../../imagenes/office//419.ico" alt="Modificar" border = "0"></a></font></div></td>


      </tr>
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  