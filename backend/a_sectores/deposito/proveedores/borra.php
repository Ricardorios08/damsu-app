<?php 

include ("../../../conexiones/config_pro.php");

$a = $_GET['id'];
$SQL="Delete From clientes where cuenta = $a";
$db->Execute($SQL);

include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "proveeduria");

 $sql="select * from clientes";
 $result = $db->Execute($sql);

?>

<table width="83%" height="58" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="11"><div align="center"><strong><font color="#FFFFCC">LISTADO DE PROVEEDORES </font></strong></div></td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
<td width="5%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">CUENTA</font></strong></font></div></td>
    <td width="11%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">RAZON SOCIAL O APELLIDO</font></strong></font></div></td>
    <td width="10%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">TELEFONO</font></strong></font></div></td>
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">MODIFICAR </font></strong></font></div></td>
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">ELIMINAR </font></strong></font></div></td>
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">FICHA </font></strong></font></div></td>
  </tr>

<?php 
if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cuenta=strtoupper($result->fields["cuenta"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$telefono=strtoupper($result->fields["telefono_1"]);

					  }




	if ($B == 1) {

?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <?php 

			}
			  $result->MoveNext();
?>
 <td><div align="center"><font size="2"><?php print("$cuenta");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$denominacion");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$telefono");?></font></div></td>
    <td><div align="center"><font size="2"><a href="modificar.php?id=<?php print("$cuenta");?>" target = "central">[Modificar]</a></font></div></td>
    <td><div align="center"><font size="2"> <a href="borra.php?id=<?php print("$cuenta");?>">[Eliminar]</a> </font></div></td>
    <td><div align="center"><font size="2"> <a href="ficha.php?id=<?php print("$cuenta");?>">[Ficha]</a></font></div></td>
  </tr>
<?php 



	?>