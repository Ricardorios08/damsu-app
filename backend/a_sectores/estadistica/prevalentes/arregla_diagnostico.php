<?PHP

include ("../../../conexiones/config_usu.php");

 $sql1 = "SELECT * FROM diagnostico";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $nro_diagnostico=$result1->fields["nro_diagnostico"];
 $nombre_diagnostico=$result1->fields["nombre_diagnostico"];

$nuevo_diagnostico= rtrim($nro_diagnostico);
$nombre_diagnostico= rtrim($nombre_diagnostico);
echo $sql = "UPDATE diagnostico SET  `nombre_diagnostico` = '$nombre_diagnostico'  WHERE `nro_diagnostico` = '$nro_diagnostico'";
$result = $db->Execute($sql);


     $result1->MoveNext();
	}

