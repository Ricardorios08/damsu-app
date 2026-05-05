 <?php  


include ("../../../conexiones/config_usu.php");
include("../../../conexiones/config_pro.php");


$id = $_REQUEST['id'];
$sql="select * from proveedores where cod_proveedor =  $id";
$result = $db->Execute($sql);


$cod_proveedor=strtoupper($result->fields["cod_proveedor"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$cod_area=strtoupper($result->fields["cod_area"]);
$domicilio=strtoupper($result->fields["domicilio"]);
$telefono=strtoupper($result->fields["telefono"]);
$cod_area_celular=strtoupper($result->fields["cod_area_celular"]);
$celular=strtoupper($result->fields["celular"]);
$servicio=$result->fields["servicio"];
$denominacion_reducida=strtoupper($result->fields["denominacion_reducida"]);
$mail=strtoupper($result->fields["mail"]);
$gln=strtoupper($result->fields["gln"]);



?>






