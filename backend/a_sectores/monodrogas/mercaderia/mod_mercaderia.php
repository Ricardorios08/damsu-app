 

<?php 
include ("../../../conexiones/config_usu.php");

//tabla mercaderia.
$cod_barra=$_POST["cod_barra"];

$nuevo_cod_barra=$_POST["nuevo_cod_barra"];
$contrasena=$_POST["contrasena"];



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
 $sql = "INSERT INTO drogas (`tipo`, `cod_droga`, `droga`) VALUES ('3', '$cod', '$nueva_droga')";
mysql_query($sql);

}else
{

$cod_drog=$_POST["cod_droga"];
	for ($i=0;$i<count($cod_drog);$i++)    
	{     
	$cod_droga = $cod_drog[$i];  
		
		}


}



if ($cod_droga == ""){

$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$cod_droga=$result->fields["cod_droga"];
}

if ($grupo == ""){

$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$grupo=$result->fields["grupo"];
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

if ($laboratorios == ""){
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$laboratorios=$result->fields["laboratorio"];
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



if ($nuevo_cod_barra == ""){

 $sql = "UPDATE monodrogas SET `troquel` = '$codigo' , `grupo` = '$grupo', `nombre_comercial` = '$nombre', `cod_droga` = '$cod_droga', `presentacion` = '$presentacion', `laboratorio` = '$laboratorios', `porcentaje_diferencial` = '$porcentaje_diferencia', `precio_actualizado` = '$precio_actualizado', `observaciones` = '$observaciones', `cant_caja` = '$cant_caja' , `cadena_frio` = '$cadena_frio' , `informar` = '$informar_anmat'   WHERE cod_barra = $cod_barra";
mysql_query($sql);
$leyenda = "SE MODIFICO LA MONODROGA";
}
else{

	if ($contrasena == "4321"){
 $sql = "UPDATE monodrogas SET `cod_barra` = '$nuevo_cod_barra' , `grupo` = '$grupo', `nombre_comercial` = '$nombre', `cod_droga` = '$cod_droga', `presentacion` = '$presentacion', `laboratorio` = '$laboratorios', `porcentaje_diferencial` = '$porcentaje_diferencia', `precio_actualizado` = '$precio_actualizado', `observaciones` = '$observaciones', `cant_caja` = '$cant_caja' , `cadena_frio` = '$cadena_frio' , `informar` = '$informar_anmat'   WHERE cod_barra = $cod_barra";
mysql_query($sql);
$leyenda = "SE MODIFICO LA MONODROGA";
	}
	ELSE
	{
$leyenda = "NO SE MODIFICO LA MONODROGA. ERROR CONTRASEÑA";
	}

}



 $sql1 = "UPDATE `tr_existencias` SET precio_unitario = '$precio_actualizado' WHERE  cod_barra = $cod_barra and proveedor = 110  and cantidad_ingresada - cantidad_salida > 0";
$result1 = $db->Execute($sql1);



include ("../../../alertas/campo_informacion.php");

?>

