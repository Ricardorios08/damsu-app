<BODY background="pescar.bmp"><CENTER><TABLE WIDTH="90%" BORDER=0><TR><TD>  

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
$cod_drog=$_POST["cod_droga"];
	for ($i=0;$i<count($cod_drog);$i++)    
	{     
	$cod_droga = $cod_drog[$i];  
		
		}
$presentacion=$_POST["presentacion"];
$laboratorio=$_POST["laboratorios"];
	for ($i=0;$i<count($laboratorio);$i++)    
	{     
	$laboratorios = $laboratorio[$i];  
		
		}
$cadenafrio=$_POST["cadenafrio"];
$cod_barra=$_POST["proveedor"];
$margendif=$_POST["margendif"];
$observaciones=$_POST["observaciones"];

echo $sql = "INSERT INTO `monodrogas` ( `troquel` , `grupo` , `nombre_comercial` , `cod_droga` , `presentacion` , `laboratorio` , `cadena_frio` , `cod_barra` , `porcentaje_diferencial` , `observaciones` ) VALUES ('$codigo' , '$grupo' , '$nombre' , '$cod_droga' , '$presentacion' , '$laboratorios' , '$cadenafrio' , '$cod_barra' , '$margendif' , '$observaciones' )";
mysql_query($sql);





include ("../../proveeduria/mercaderia/entrada_mercaderia.php");

?>

