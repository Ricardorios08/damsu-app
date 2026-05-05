<?php 

include ("../../../conexiones/config_pro.php");

$a = $_GET['id'];
$SQL="Delete From mercaderia where codigo = $a";
$db->Execute($SQL);


include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "proveeduria");

 $sql="select * from mercaderia";
 $result = $db->Execute($sql);

?>

<table width="83%" height="58" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="11"><div align="center"><strong><font color="#FFFFCC">LISTADO DE MERCADERIA </font></strong></div></td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
<td width="5%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">CODIGO</font></strong></font></div></td>
    <td width="11%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">PRODUCTO</font></strong></font></div></td>
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">TIPO</font></strong></font></div></td>
	    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">PRESENTACION</font></strong></font></div></td>
		    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">PROVEEDOR</font></strong></font></div></td>
			<td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">MODIFICAR </font></strong></font></div></td>
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">ELIMINAR </font></strong></font></div></td>
    <td width="12%" bgcolor="#FFFF99"><div align="center"><font color="#006633"><strong><font size="2">FICHA </font></strong></font></div></td>
  </tr>

<?php 
if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cuenta=strtoupper($result->fields["cuenta"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$estado=strtoupper($result->fields["estado"]);

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
<td><div align="center"><font size="2"><?php print("$codigo");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$nombre");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$tipo");?></font></div></td>
	<td><div align="center"><font size="2"><?php print("$presentacion");?></font></div></td>
    <td><div align="center"><font size="2"><?php print("$proveedor");?></font></div></td>

    <td><div align="center"><font size="2"><a href="modificar.php?id=<?php print("$codigo");?>" target = "central">[Modificar]</a></font></div></td>
    <td><div align="center"><font size="2"> <a href="borra.php?id=<?php print("$codigo");?>">[Eliminar]</a> </font></div></td>
    <td><div align="center"><font size="2"> <a href="ficha.php?id=<?php print("$codigo");?>">[Ficha]</a></font></div></td>
  </tr>
<?php 



	?>


