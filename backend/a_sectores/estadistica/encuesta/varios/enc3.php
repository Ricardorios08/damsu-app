<?php
//Conectamos con la base de datos
require('configuracion.inc.php'); 
$enlace = mysql_connect($host, $usuario, $password); 
mysql_select_db($db,$enlace); 

//Obtenemos la fecha del sistema
$fecha = time(); 

//Insertamos la nueva encuesta
$sql = "INSERT INTO encuestas (titulo, fecha) VALUES ('$titulo', '$fecha') "; 
$sql = mysql_query($sql); 

//Ahora obtenemos el ID de la encuesta que acabamos de insertar
$sql = "SELECT id FROM encuestas ORDER BY fecha DESC LIMIT 0,1";
$sql = mysql_query($sql);
while($row = mysql_fetch_array($sql)){ 
	$id=$row["id"];
} 

//Recorremos todas las preguntas
for($i=1; $i<=$respuestas; $i++){

//Obtenemos el texto de la pregunta
	$preg = p.$i;
	$texto = $$preg;

//Y lo insertamos
	$sql = "INSERT INTO respuestas(texto, votos, idenc) VALUES("$texto", 0, $id)";
	$sql = mysql_query($sql);
	}
 ?>
<div align="center"><strong>Felicidades!! Si todo ha ido bien, tu encuesta ha 
  sido insertada!! </strong> </div>