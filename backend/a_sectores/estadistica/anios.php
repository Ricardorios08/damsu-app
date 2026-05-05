
 <tr>
    <td colspan="5" bgcolor="#FFFFFF"><div align="center"><span class="Estilo14"><?php echo $anio1;?> </span></div></td>
  </tr>
   <tr>
   <td width="150" bgcolor="#FFFFFF"><div align="center" class="Estilo77">Paciente</div></td>
<td width="25" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Fecha Nac</span></div></td>
   <td width="25" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Edad</span></div></td>
<td width="25" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Edad Resonancia</span></div></td>
   <td width="25" bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Cant</span></div></td>
  </tr>

  <?php



     $sql="SELECT * FROM `prestaciones_pacientes` WHERE `cod_prestacion` LIKE 'RMN' and fecha_prestacion between '$desde' and '$hasta' group by documento ORDER BY `documento` ASC ";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$documento=$result->fields["documento"];

   $sql="select * from pacientes where documento = '$documento'";
$result2 = $db->Execute($sql);
 $apellido=$result2->fields["apellido"];
 $nombre=$result2->fields["nombre"];
  $fecha_nac=$result2->fields["fecha_nac"];

IF ($fecha_nac == "0000-00-00"){
$edad = "SIN CARGAR";
}ELSE{
$edad = calculaEdad($fecha_nac);
}

$dia = substr($fecha_nac,8,2);
$mes= substr($fecha_nac,5,2);
$anio = substr($fecha_nac,0,4);
$fecha_nac = $dia."/".$mes."/".$anio;

 $edad. " ".$apellido." ".$edad_1;

if (($edad < $edad_1) AND ($edad != "SIN CARGAR")){
   $sql="select sum(cant_realizado) as egreso from `prestaciones_pacientes` WHERE `cod_prestacion` LIKE 'RMN' and fecha_prestacion between '$desde' and '$hasta' and documento = '$documento'";
$result2 = $db->Execute($sql);
 $tr_egreso=$result2->fields["egreso"];

$cant = $cant + 1;
$cantidad_estudios = $cantidad_estudios + $tr_egreso;

$cant2 = $cant2 + 1;
$cantidad_estudios2 = $cantidad_estudios2 + $tr_egreso;


$edad_resonancia = $edad - $edad_menos;

?>

 <tr>
<td bgcolor="#FFFFFF"><span class="Estilo77"> <?PHP ECHO $apellido;?> <?PHP ECHO $nombre;?></span></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">  <?PHP ECHO $fecha_nac;?></span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">  <?PHP ECHO $edad;?></span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">  <?PHP ECHO $edad_resonancia;?></span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $tr_egreso;?></span></div></td>
  </tr>
 
 
 
<?php 
}



	$result->MoveNext();
	}

  
	  ?>




	  <tr>
	  <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">TOTAL <?PHP $anio1;?> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Cantidad de Pacientes </span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $cant2;?></span></div></td>
      <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Cantidad estudios</span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $cantidad_estudios2;?></span></div></td>
  </tr>

  <tr>
	  <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">&nbsp; </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
</tr>

  <?php

  $cant2 = "";
$cantidad_estudios2 = "";