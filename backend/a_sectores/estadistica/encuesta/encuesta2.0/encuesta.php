<?php 
$titulo = "Que eliges tu?"; //titulo de tu encuesta
$archivo = "votos.txt";     //archivo donde almacena los votos
$archivoip = "ips.txt";		//archivo donde almacena las IP's de los votantes

function YaVotaste() {		//funcion para ver si ya votaste o no, segun la IP
global $archivoip;
global $REMOTE_ADDR;
$ips = fopen($archivoip, "r");
while (!feof($ips)) {
	$ip = fgets($ips, 20);

	if ($ip == $REMOTE_ADDR . "\r\n") {
		$coincide = 1;
		break;
		}
	}
	fclose($ips);
	if (!$coincide) {
	$ips = fopen($archivoip, "a");
	fputs($ips, $REMOTE_ADDR . "\r\n");
	fclose($ips);
	return false;
	}
	else {
	return true;
	}
}
function agregaVotacion($voto) {		//funcion para agregar el voto
	global $archivo;
	$leer_votacion = fopen($archivo, "r");
	$tu_voto = fread($leer_votacion, filesize($archivo));
	fclose($leer_votacion);
	$votos = split('[|:]', $tu_voto);
	for ($i = 1; $i < count($votos); $i = $i + 2) {
	$nombre = $i - 1;
	if ($votos[$nombre] == $voto) {
		$votos[$i]++;
		}

	if ($i == (count($votos) - 1)) {
		$act_Voto .= $votos[$nombre] . ":" . $votos[$i];
		}
	else {
		$act_Voto .= $votos[$nombre] . ":" . $votos[$i] . "|";
		}
	}

	$escribe_archivo = fopen($archivo, "w");
	fputs($escribe_archivo, $act_Voto);
	fclose($escribe_archivo);
}


function mostrar($msgs) {			//funcion para mostrar la votación y sus resultados
	global $titulo, $archivo;

	echo "<html>";
	echo "<head>";
	echo "<title>$titulo - Resultados</title>";
	
	global $clscr;
	echo "</head>";
	echo "<body>";
	
		
	echo "<font face='Tahoma' size='2'>";
	$leer_votacion = fopen($archivo, "r");
	$tu_voto = fread($leer_votacion, filesize($archivo));
	fclose($leer_votacion);
	$votos = split('[|:]', $tu_voto);
	echo "<u><b>Resultados</b></u><br>";
	
	for ($i = 1; $i < count($votos); $i = $i + 2)
	{
	$total_votos += $votos[$i];
	}

	for ($i = 1; $i < count($votos); $i = $i + 2) {
	$nombre = $i - 1;
	if ($total_votos == 0) {
	$porcnt = 0;
	}
	else {
	$porcnt = $votos[$i] / $total_votos * 100;
	$porcnt = round($porcnt, 1);
	}

	echo "<br>";
	echo "\t$votos[$nombre] -> ";
	echo "\t<b>$votos[$i]</b> votos <br>";

		
	if ($porcnt == 0) {
	echo "\t<img src=barra.jpg width=$porcnt height=15> <br><b>$porcnt%</b>";
	}

		
	else {
	echo "\t<img src=barra.jpg width=$porcnt height=15> <br><b>$porcnt%</b> <br>";
	}

	
		echo "<br>";
	}
	echo "Total Votos: <b>$total_votos</b><br>";
	if($clscr==1)
	{
		echo "<a href=javascript:window.close();>Cerrar</a>";
	}
	else
	{
		echo "<a href=javascript:history.back(-1);>Volver</a>";
	}
		
	if (isset($msgs)) {
		echo "$msgs";
	}
 	echo "<br>";
	echo "</body>";
	echo "</html>";
}

if (!isset($voto)) {
	mostrar("");
	exit;
}
if (YaVotaste()) {
	mostrar("<br><br><b>Tu Ya Votaste...</b>");
	exit;
}
agregaVotacion($voto);
mostrar("");

?>