<?php 
$modifica = "";
$direccion = "";
$nro = "";
$nombre = "";
include ("../../../conexiones/config_usu.php");
include ("funcion_cambiar_estados.php");


$B = 1;

$palabra = $_REQUEST['busca'];

 




//echo $sql="select * from pacientes where apellido != '' and apellido like 'D%' order by apellido";
 $sql="select * from pacientes where apellido != '' and nombre = '' order by apellido";
$result = $db->Execute($sql);
?>
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td colspan="7" bordercolor="#E6E6E6" bgcolor="#000099"><div align="center"><font color="#FFFFFF" face="Trebuchet MS">LISTADO DE PACIENTES PROGRAMA ONCOLOGICO </font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="139" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Doc.</font></font></div></td>
    <td width="252" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre </font></font></div></td>
    <td colspan="2" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Direcci&oacute;n</font></font></div></td>
	<td width="104" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Localidad</font></font></div></td>
	<td width="54" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Tel&eacute;fono</font></font></div></td>
<td width="61" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Ficha</font></font></div></td>
<?php if ($modifica == "SI"){?>
	<?php }?>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$documento=strtoupper($result->fields["documento"]);
$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);



list($a,$b) = explode(",",$apellido);
 $a;

$apel=trim($a); 
$nomb=trim($b); 
$apellido = $apel." ".$nomb;


list($ape,$nom, $nom2, $nom3) = explode(" ",$apellido);

if (($ape == "DE") and ($nom == "LA")){
list($ape,$nom, $nom2, $nom3) = explode(" ",$apellido);
 $ape = $ape." ".$nom." ".$nom2;
 $nom = $nom3;

} ELSEif (($ape != '') and ($nom == "DE")){
list($ape,$nom, $nom2, $nom3) = explode(" ",$apellido);
 $ape = $ape." ".$nom." ".$nom2;
 $nom = $nom3;




}ELSEIF (($ape == "DE") and ($nom == "LOS")){
list($ape,$nom, $nom2, $nom3) = explode(" ",$apellido);
 $ape = $ape." ".$nom." ".$nom2;
 $nom = $nom3;


}ELSEIF ($ape == "DE"){
 $ape = $ape." ".$nom;
 $nom = $nom2;

 }ELSEIF ($ape == "DEL"){
 $ape = $ape." ".$nom;
 $nom = $nom2;

  }ELSEIF ($ape == "DI"){
 $ape = $ape." ".$nom;
 $nom = $nom2;

  }ELSEIF ($ape == "LO"){
 $ape = $ape." ".$nom;
 $nom = $nom2;

  }ELSEIF ($ape == "SAN"){
 $ape = $ape." ".$nom;
 $nom = $nom2;

}ELSEIF ($ape == "D"){
$ape = $ape." ".$nom;
$nom = $nom2;
}ELSEIF ($ape == "DA"){
$ape = $ape." ".$nom;
$nom = $nom2;
}ELSE{
list($ape,$nom, $nom2 , $nom3) = explode(" ",$apellido);
$nom = $nom." ".$nom2." ".$nom3;
}

$documento=$result->fields["documento"];


 $sql5 = "UPDATE `pacientes` SET `apellido` = '$ape', `nombre` = '$nom' WHERE `documento` = '$documento'";
$result5 = $db->Execute($sql5);



$calle=strtoupper($result->fields["calle"]);
$puerta=strtoupper($result->fields["puerta"]);
$telefono=strtoupper($result->fields["telefono"]);

$direccion= $calle." ".$nro;
$estado=strtoupper($result->fields["estado"]);
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);



	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$documento");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php //print("$nombre_completo");?>  <?php print("$ape");?> / <?php print("$nom");?> </font></td>
	    <td colspan="2" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$direccion");?></font></td>
    <td bgcolor="#E6E6E6"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$localidad");?></font></div></td>
     <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$telefono");?></font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../a_pacientes/ficha.php?id=<?php print("$documento");?>"><img src="../../../imagenes/office//009.ico" alt="Modificar" border = "0"></a></font></div></td>
    </tr>
  
  <tr>
    <td></td>
    <td></td>
    <td width="70"></td>
    <td width="106"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <?php 

$result->MoveNext();
	} 


?></table>


