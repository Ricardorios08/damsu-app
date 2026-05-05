<?PHP

include ("../../../conexiones/config_usu.php");

 $sql1 = "SELECT * FROM `tr_ventas_encabezado`";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $apellido=$result1->fields["apellido"];
  $nombre=$result1->fields["nombre"];
   $documento=$result1->fields["documento"];
$tipo_doc=$result1->fields["tipo_doc"];
$nro_factura=$result1->fields["nro_factura"];
$departamento=$result1->fields["departamento"];

 $sql = "SELECT * FROM paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc' ";
 $result = $db->Execute($sql);
$cod_diagnostico=$result->fields["cod_diagnostico"];

 $sql = "SELECT * FROM pacientes where documento = '$documento' and tipo_doc = '$tipo_doc' ";
 $result = $db->Execute($sql);
$departamento=$result->fields["departamento"];



$cod_diagnostico = rtrim($cod_diagnostico);

echo $sql = "UPDATE `tr_ventas_encabezado` SET `cod_diagnostico` = '$cod_diagnostico' , `departamento` = '$departamento' WHERE `nro_factura` = '$nro_factura'";
$result = $db->Execute($sql);


     $result1->MoveNext();
	}

