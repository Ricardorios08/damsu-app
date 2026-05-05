<?php
//Fijaos en que esta vez tenéis que añadir vosotros la informacion en mysql_connect
$enlace = mysql_connect('localhost','root','');
mysql_select_db('oncologico');

//Obtenemos el titulo de la última encuesta para colocarlo como título en nuestro gráfico
$consulta = "SELECT titulo, id FROM encuestas ORDER BY fecha DESC LIMIT 0,1";
$consulta = mysql_query($consulta,$enlace); 
$lado=mysql_num_rows($consulta);
while($row = mysql_fetch_array($consulta)){ 
  $titulo= $row['titulo'];
  $id=$row['id'];
}

//Obtenemos el numero de votos de cada opcion y los metemos en "votos[]"
$consulta = "SELECT votos, texto FROM respuestas WHERE idenc=$id";
$consulta = mysql_query($consulta,$enlace); 
$lado=mysql_num_rows($consulta);
while($row = mysql_fetch_array($consulta)){ 
  //Guardamos el texto en la variable temp. Este texto nos servirá como 
	//índice en el array votos[]
  $temp = $row['texto'];
  $votos[$temp]= $row['votos'];
}

//Variables del gráfico
$width = 500;		 //Ancho de la imagen
$espacioCol = 30;	//Espacio que habrá del principio de una columna a otra
$altoCol = 15;		//El alto de las columnas
$height = 2*count($votos)*$espacioCol+45;	//El alto de la imagen
$maxvoto = max($votos);	//Valor de la opcion mas votada
$maxlargo = $width-50;		//Largo que tendrá la opción mas votada
$coeficiente = (int)($maxlargo / $maxvoto);	//Coeficiente para calcular el largo de cada opcion

//Creamos la imagen con el alto y ancho asignados anteriormente	
$image = imagecreate($width,$height);

//Declaramos variables para los colores.	Al ser el gris el primer color que 
//declaramos, éste se quedará como color de fondo en la imagen
$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);
$blue = imagecolorallocate($image, 0x00, 0x00, 0xFF);

//Recorremos el array 'votos'
for($i=0; list($texto, $vot) = each($votos); $i++) {

  $labelfont = 2; //Fuente empleada para etiquetas
  //Dibujamos las barras
  //Coordenadas para definir el rectángulo
  $valign = ($i+1)*$espacioCol + 15;
  $halign = 30;
  $valign2 = $valign + $altoCol;
  $halign2 = $halign+$vot*$coeficiente;
  imagefilledrectangle($image,$halign,$valign,$halign2,$valign2,$blue);
  
  //Ponemos el índice de cada barra
  //Coordenadas para colocar los indices
  $indice = $i + 1;
  $halign = 15;
  imagestring($image, $labelfont, $halign, $valign, $indice, $black);
  
  //Leyenda: Numero de opcion + Texto + ( votos )
  //Coordenadas para colocar la leyenda
  $valign = ($i+1)*$espacioCol + (count($votos)*$espacioCol)+ 15;
  $halign = 30;
  $leyenda = "Opcion ".$indice.": ".$texto." ($vot)";
  imagestring($image, $labelfont, $halign, $valign, $leyenda, $black);		
}

//Asignamos tipografía y colocamos el título en la parte superior izquierda
$titlefont = 3;
imagestring($image, $titlefont, 10, 10, $titulo, $black);

//Dibujamos el recuadro que encierra el contenido
imagerectangle($image, $width - 5, 30, 5, $height - 5, $black);	

//Devolvemos la imagen
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>