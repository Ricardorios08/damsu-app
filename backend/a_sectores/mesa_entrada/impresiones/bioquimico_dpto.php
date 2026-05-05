<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">


<?php 
//global $buscador_rapido;

$fecha = date('d/m/Y');
$buscador_rapido=2;
$buscador_rapido;
 include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "bioquimica");

$B = 1;


$sql="select * from datos_personales  order by localidad asc ";

	$result = $db->Execute($sql);
?>
LISTADO DE BIOQUIMICOS . <br />
Emitido el: <?php echo $fecha;?>
<table width="83%" height="58" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300"> 

<td width="5%" bgcolor="#FFFF99"><div align="center"><font color="#000000"><strong><font size="2">MATRICULA</font></strong></font></div></td>
<td width="11%" bgcolor="#FFFF99"><div align="center"><font color="#000000"><strong><font size="2">APELLIDO</font></strong></font></div></td>
<td width="10%" bgcolor="#FFFF99"><div align="center"><font color="#000000"><strong><font size="2">NOMBRE</font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#000000"><strong><font size="2">DOMICILIO</font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#000000"><strong><font size="2">LOCALIDAD</font></strong></font></div></td>
<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#000000"><strong><font size="2">TELEFONO</font></strong></font></div></td>

</tr>	
<?php 
 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $id=$result->fields["matricula"];

	$sql1="select * from datos_estudio where matricula = '$id'";
	$result1 = $db->Execute($sql1);

$matricula=$result1->fields["matricula"];


$apellido=strtoupper($result->fields["apellido"]);
$nombre=strtoupper($result->fields["nombre"]);

$domicilio=strtoupper($result->fields["domicilio"]); 
$nro_domicilio=$result->fields["nro_domicilio"];
$localidad=strtoupper($result->fields["localidad"]);
$telefono=$result->fields["telefono"];

	if ($B == 1) {

?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"><?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFCC" bgcolor="#FFFFCC"> <?php 

			}






		?>
     <td><font size="2"><?php print("$id");?></font></td>
	 <td><font size="2"><?php print("$apellido");?></font></td>
     <td><font size="2"><?php print("$nombre");?></font></td>
    <td><font size="2"><?php print("$domicilio");?></font></td>
    <td><font size="2"><?php print("$localidad");?></font></td>
	    <td><font size="2"><?php print("$telefono");?></font></td>
		
		

  </tr>
	  
    
<?php 

$result->MoveNext();
	}

?>
</table>

</body>

