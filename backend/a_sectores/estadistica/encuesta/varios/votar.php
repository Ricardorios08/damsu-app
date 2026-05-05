<?php 
require('configuracion.inc.php'); 
$enlace = mysql_connect($host, $usuario, $password); 
mysql_select_db($db,$enlace);
		
//Obtenemos el titulo de la encuesta
$consulta = "SELECT titulo FROM encuestas ORDER BY fecha DESC LIMIT 1,0";
$consulta = mysql_query($consulta,$enlace); 
$lado=mysql_num_rows($consulta);
while($row = mysql_fetch_array($consulta)){ 
	$titulo= $row['titulo'];
}
		
//Obtenemos el numero actual de votos para la opción elegida
//Comprobamos si $opcion no está vacío porque posteriormente este mismo 
//fichero lo utilizaremos para ver resultados sin tener que votar necesariamente
if(!empty($opcion)) {
	$consulta = "SELECT votos FROM respuestas WHERE id=$opcion"; 
	$consulta = mysql_query($consulta,$enlace); 
	$lado=mysql_num_rows($consulta);
	while($row = mysql_fetch_array($consulta)){ 
		$votos= $row['votos'];
	}
		
//Incrementamos en uno los votos totales
	$votos = $votos + 1;
//Y actualizamos la base de datos
	$consulta = "UPDATE respuestas SET votos = $votos WHERE id=$opcion";
	mysql_query($consulta,$enlace);
}
?>