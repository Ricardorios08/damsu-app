<?PHP 

include ("../../../conexiones/config_usu.php");

$sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where documento = 0";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $apellido=$result1->fields["apellido"];
  $nombre=$result1->fields["nombre"];
   $documento=$result1->fields["documento"];
$tipo_doc=$result1->fields["tipo_doc"];
$nro_factura=$result1->fields["nro_factura"];
$departamento=$result1->fields["departamento"];

 $sql = "SELECT * FROM tr_ventas_encabezado where nro_factura = '$nro_factura'";
 $result = $db->Execute($sql);
$departamento=$result->fields["departamento"];
$documento=$result->fields["documento"];



echo  $sql = "UPDATE `tr_ventas_detalle_depto` SET documento = '$documento'  WHERE `nro_factura` = '$nro_factura'";
$result = $db->Execute($sql);
ECHO "<BR>";


     $result1->MoveNext();
	}


ECHO "<BR>";

ECHO "<BR>";



$sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where cod_diagnostico like '' group by nro_factura";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $apellido=$result1->fields["apellido"];
  $nombre=$result1->fields["nombre"];
   $documento=$result1->fields["documento"];
$tipo_doc=$result1->fields["tipo_doc"];
$nro_factura=$result1->fields["nro_factura"];
$departamento=$result1->fields["departamento"];


  $sql = "SELECT * FROM paciente_diagnostico where documento = '$documento'";
 $result = $db->Execute($sql);
$cod_diagnostico=$result->fields["cod_diagnostico"];


echo  $sql = "UPDATE `tr_ventas_detalle_depto` SET `cod_diagnostico` = '$cod_diagnostico'  WHERE `nro_factura` = '$nro_factura'";
$result = $db->Execute($sql);
ECHO "<BR>";

     $result1->MoveNext();
	}




