<?php 
include ("../../../conexiones/config_usu.php");
$a = $_GET['id'];
$sql="select * from obrasocial where nro_os like '$a'";
$result = $db->Execute($sql);


$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);
$cobertura_drogas=strtoupper($result->fields["cobertura_drogas"]);
$cobertura_material=strtoupper($result->fields["cobertura_material"]);
$cobertura_internacion=strtoupper($result->fields["cobertura_internacion"]);
$cobertura_estudios=strtoupper($result->fields["cobertura_estudios"]);
$recargo_facturacion=strtoupper($result->fields["recargo_facturacion"]);
$convenio_osep=strtoupper($result->fields["convenio_osep"]);
$domicilio=strtoupper($result->fields["domicilio"]);
$localidad=strtoupper($result->fields["localidad"]);
$cod_postal=strtoupper($result->fields["cod_postal"]);
$cod_area=strtoupper($result->fields["cod_area"]);
$telefono=strtoupper($result->fields["telefono"]);
$tel_fax=strtoupper($result->fields["tel_fax"]);
$email=strtoupper($result->fields["email"]);
?>