<?php 
$dia = date("d");
$mes = date("m");
$anio = date("Y");


SWITCH ($mes){
	case "01":{$mes22 = "ENERO";break;}
	case "02":{$mes22 = "FEBRERO";break;}
	case "03":{$mes22 = "MARZO";break;}
	case "04":{$mes22 = "ABRIL";break;}
	case "05":{$mes22 = "MAYO";break;}
	case "06":{$mes22 = "JUNIO";break;}
	case "07":{$mes22 = "JULIO";break;}
	case "08":{$mes22 = "AGOSTO";break;}
	case "09":{$mes22 = "SETIEMBRE";break;}
	case "10":{$mes22 = "OCTUBRE";break;}
	case "11":{$mes22 = "NOVIEMBRE";break;}
	case "12":{$mes22 = "DICIEMBRE";break;}
}


include ("../../../conexiones/config_usu.php");

$sql2="select COUNT(preg1) as total from encuesta1";
$result2 = $db->Execute($sql2);
$total =strtoupper($result2->fields["total"]);

?>
<style type="text/css">
<!--
.Estilo76 {font-family: "Trebuchet MS"}
.Estilo78 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo80 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
-->
</style>

<table width="800" border="0">
  <tr>
    <td height="54"><div align="center"><strong>PROGRAMA ONCOLOGICO PROVINCIAL </strong></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo78">Mendoza a los <?php echo $dia;?> dias de <?php echo $mes22;?> de <?php echo $anio;?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo76">Resultados encuesta pacientes y/o familiares atendidos en el &quot;Programa Oncol&oacute;gico Provincial&quot;.</div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo80">Cantidad de Pacientes/familiares encuestados a la fecha: <?php echo $total;?>  </span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>


<table width="800" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">Trato recibido por el personal de Recepción</div></td>
    <td bgcolor="#CCCCCC"><div align="center">Trato recibido por el personal de Secretaria</div></td>
  </tr>
  <tr>
    <td width="369"><div align="center">

      <?PHP 
	  $preg = "preg1";
echo $pregunta1 = "";

	  include ("resultado1.php");?>
    </div></td>
    <td width="421"><div align="center">
      <?PHP 
	  	  $preg = "preg2";


include ("resultado1.php");?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">Demora en Recetas</div></td>
    <td bgcolor="#CCCCCC"><div align="center">Demora en Monoclonales</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <?PHP
	  $preg = "preg3";
 

include ("resultado2.php");?>
    </div></td>
    <td><div align="center">
      <?PHP 
	  	  $preg = "preg4";
 

	  include ("resultado3.php");?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">Claridad de la información por el Personal</div></td>
    <td bgcolor="#CCCCCC"><div align="center">Limpieza y aseo</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <?PHP 	  $preg = "preg5";
 


	  include ("resultado1.php");?>
    </div></td>
    <td><div align="center">
      <?PHP 
	  	  $preg = "preg6";
 

include ("resultado1.php");?>
    </div></td>
  </tr>
</table>