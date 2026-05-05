 

<?php 
include ("../../../conexiones/config_usu.php");

//tabla mercaderia
$codigo=$_POST["codigo"];
$grup=$_POST["grupo"];
	for ($i=0;$i<count($grup);$i++)    
	{     
	$grupo = $grup[$i];  
				}
$nombre=$_POST["nombre"];

$informar_anmat=$_POST["informar_anmat"];

$nueva_droga=$_POST["nueva_droga"];

if ($nueva_droga != ""){

	$sql="select * from drogas ORDER BY cod_droga desc";
$result = $db->Execute($sql);

$cod=$result->fields["cod_droga"] + 1;
 $sql = "INSERT INTO drogas (`tipo`, `cod_droga`, `droga`) VALUES ('1', '$cod', '$nueva_droga')";
mysql_query($sql);

}else
{

$cod_drog=$_POST["cod_droga"];
	for ($i=0;$i<count($cod_drog);$i++)    
	{     
	$cod_droga = $cod_drog[$i];  
		
		}


}


$nuevo_laboratorio=$_POST["nuevo_laboratorio"];

if ($nuevo_laboratorio != ""){

	$sql="select * from laboratorios ORDER BY cod_laboratorio desc";
$result = $db->Execute($sql);

$cod=$result->fields["cod_laboratorio"] + 1;
 $sql = "INSERT INTO laboratorios (`cod_laboratorio`, `laboratorio`) VALUES ('$cod', '$nuevo_laboratorio')";
mysql_query($sql);

}else{


$laboratorio=$_POST["laboratorios"];
	for ($i=0;$i<count($laboratorio);$i++)    
	{     
	$laboratorios = $laboratorio[$i];  
		
		}


}





$presentacion=$_POST["presentacion"];


$cadenafrio=$_POST["cadenafrio"];
$cod_barra=$_POST["cod_barra"];
$margendif=$_POST["margendif"];
$observaciones=$_POST["observaciones"];

$cant_caja=$_POST["cant_caja"];
$precio_actualizado=$_POST["precio_actualizado"];


IF ($cant_caja == ""){
	$cant_caja = 1;
}


$sql = "INSERT INTO `monodrogas` ( `troquel`, `grupo`, `nombre_comercial`, `cod_droga`, `presentacion`, `laboratorio`, `cadena_frio`, `cod_barra`, `porcentaje_diferencial`, `precio_actualizado`, `observaciones`, `cant_caja` , `informar`) VALUES ('$codigo' , '$grupo' , '$nombre' , '$cod_droga' , '$presentacion' , '$laboratorios' , '$cadenafrio' , '$cod_barra' , '$margendif' , '$precio_actualizado' , '$observaciones' , '$cant_caja' , '$informar_anmat')";
mysql_query($sql);


 
include ("../../monodrogas/mercaderia/entrada_mercaderia.php");

?>

