<?php
//Desarrollado por Jesus Liñán
//ribosomatic.com
//Puedes hacer lo que quieras con el código
//pero visita la web cuando te acuerdes

//Configuracion de la conexion a base de datos
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "oncologico"; 

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 

mysql_select_db($bd_base, $con); 

//consulta todos los empleados

$sql=mysql_query("SELECT * FROM pacientes",$con);

?>

<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td colspan="5" bordercolor="#E6E6E6" bgcolor="#FFFFFF"><font color="#000000" face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font></td>
    <td colspan="2" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font size="2" face="Trebuchet MS">Agregar</font></div></td>
    <td colspan="2" bordercolor="#E6E6E6" bgcolor="#FFFFFF"><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font></td>
    <td colspan="2" valign="top" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Historia Clinica</font></font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="46" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Doc.</font></font></div></td>
    <td width="158" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre </font></font></div></td>
    <td width="110" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Direcci&oacute;n</font></font></div></td>
	<td width="62" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Localidad</font></font></div></td>
	<td width="54" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Tel&eacute;fono</font></font></div></td>
<td width="62" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Afiliaci&oacute;n </font></font></div></td>
<td width="70" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Diagnostico</font></font></div></td>


	<td width="46" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Ficha</font></font></div></td>

  <td width="62" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Recetas</font></font></div></td>
    <td width="54" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Prest.</font></font></div></td>
    <td width="54" valign="top" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Drogas</font></font></div></td>
  </tr>

  <?php


while($row = mysql_fetch_array($sql)){


$nombre=$row['nombre'];
$apellido=$row['apellido'];
$calle=$row['calle'];
$puerta=$row['puerta'];
$telefono=$row['telefono'];
$estado=$row['estado'];
$localidad=$row['localidad'];
$departamento=$row['departamento'];
$documento=$row['documento'];

$nombre_completo = $apellido.", ".$nombre; 


$direccion= $calle." ".$nro;



    ?>

   
	<td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$documento");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$nombre_completo");?></font></td>
	    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$direccion");?></font></td>
    <td bgcolor="#E6E6E6"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$localidad");?></font></div></td>
     <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$telefono");?></font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../a_pacientes/entrada_afiliaciones.php?documento=<?php print("$documento");?>&&band=1"><IMG SRC="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../a_pacientes/entrada_diagnostico.php?documento=<?php print("$documento");?>&&band=1"><IMG SRC="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>

    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../a_pacientes/ficha.php?id=<?php print("$documento");?>"><IMG SRC="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a> </font></div></td>

  <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../receta/entrada_receta.php?id=<?php print("$documento");?>"><IMG SRC="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../../direccion/hc_paciente.php?id=<?php print("$documento");?>"><IMG SRC="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
        <td valign="top" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../../direccion/hc_paciente.php?id=<?php print("$documento");?>"><IMG SRC="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font><font face="Trebuchet MS"></font></div></td>
  </tr>
  <?php 



}
?>