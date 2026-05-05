<?php
//Conectamos con la base de datos
	require('configuracion.inc.php'); 
	$enlace = mysql_connect($host,$usuario,$password); 
	mysql_select_db($db,$enlace); 
	
//Seleccionamos la informacion de la última encuesta insertada
	$consulta = "SELECT * FROM encuestas ORDER BY fecha DESC LIMIT 0,1"; 
	$consulta = mysql_query($consulta,$enlace); 
	while($row = mysql_fetch_array($consulta)){ 
		$titulo=$row["titulo"]; 
		$fecha=$row["fecha"];
		$id=$row['id'];
	}
?>
<body>
<form name="form1" method="post" action="votar.php">
  <table width="350" border="1">
    <tr> 
      <td colspan="2"><strong>Titulo</strong>: <?php echo $titulo; ?>
        <input type="hidden" name="id" value="<?php echo $id;?>"></td>
    </tr>
    <?php
	$sql = "SELECT texto, id FROM respuestas WHERE idenc="$id"";
	$sql = mysql_query($sql,$enlace); 
	while($row = mysql_fetch_array($sql)){ 
		$texto=$row["texto"]; 
		$idres=$row["id"];
?>
    <tr> 
      <td width="51"><input type="radio" name="opcion" value="<?php echo $idres; ?>"></td>
      <td width="283"><?php echo $texto; ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td><input type="submit" name="Submit" value="Enviar"></td>
		
      <td>Esta encuesta est&aacute; desde el <?php echo date('d-m-y',$fecha); ?></td>
    </tr>
    <tr>
      <td colspan="2"><a href="votar.php">Ver resultados</a></td>
    </tr>
  </table>
</form>
</body>