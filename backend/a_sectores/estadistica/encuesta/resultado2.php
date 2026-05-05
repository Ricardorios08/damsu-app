
<?php

include ("../../../conexiones/config_usu.php");


$sql2="select count($preg) as total from encuesta1";
$result2 = $db->Execute($sql2);
 $total =strtoupper($result2->fields["total"]);

 $sql2="select count($preg) as res from encuesta1 where $preg = 1";
$result2 = $db->Execute($sql2);
$preg1_1=round($result2->fields["res"],1);
 $sql2="select count($preg) as res from encuesta1 where $preg = 2";
$result2 = $db->Execute($sql2);
$preg1_2=round($result2->fields["res"],1);
$sql2="select count($preg) as res from encuesta1 where $preg = 3";
$result2 = $db->Execute($sql2);
$preg1_3=round($result2->fields["res"],1);
$sql2="select count($preg) as res from encuesta1 where $preg = 4";
$result2 = $db->Execute($sql2);
$preg1_4=round($result2->fields["res"],1);
$sql2="select count($preg) as res from encuesta1 where $preg = 5";
$result2 = $db->Execute($sql2);
$preg1_5=round($result2->fields["res"],1);
$sql2="select count($preg) as res from encuesta1 where $preg = 6";
$result2 = $db->Execute($sql2);
$preg1_6=round($result2->fields["res"],1);

if ($total > 0){
$preg1_1 = round($preg1_1 / $total  * 100,2);
$preg1_2 = round($preg1_2 / $total  * 100,2);
$preg1_3 = round($preg1_3 / $total  * 100,2);
$preg1_4 = round($preg1_4 / $total  * 100,2);
$preg1_5 = round($preg1_5 / $total  * 100,2);
$preg1_6 = round($preg1_6 / $total  * 100,2);
}

/*
echo "<br>";


echo "\t REGULAR <img src=barra_roja.jpg width=$preg1_2 height=15>  <b>$preg1_2% </b> <br>";
echo "\t BUENO <img src=barra_verde.jpg width=$preg1_3 height=15>  <b>$preg1_3% </b> <br>";
echo "\t MUY BUENO <img src=barra_naranja.jpg width=$preg1_4 height=15>  <b>$preg1_4% </b> <br>";
echo "\t EXCELENTE <img src=barra_azul.jpg width=$preg1_5 height=15>  <b>$preg1_5% </b> <br>";


*/
///////////////////////////////////////////////



?>

<table width="400" height="250" border="0">
  <tr>
    <td width="140"><div align="right">De 30 min a 1 hs.</div></td>
    <td width="256"><?PHP echo "\t <img src=barra_azul.jpg width=$preg1_1 height=15>  <b>$preg1_1% </b> <br>";?></td>
  </tr>
  <tr>
    <td><div align="right">Más de 1 Hora</div></td>
    <td width="256"><?PHP echo "\t <img src=barra_naranja.jpg width=$preg1_2 height=15>  <b>$preg1_2% </b> <br>";?></td>
  </tr>
  <tr>
    <td><div align="right">Más de 1 día</div></td>
    <td width="256"><?PHP echo "\t <img src=barra_verde.jpg width=$preg1_3 height=15>  <b>$preg1_3% </b> <br>";?></td>
  </tr>
      <tr>
    <td><div align="right">NO UTILIZA</div></td>
    <td width="351"><?PHP echo "\t <img src=barra_roja.jpg width=$preg1_6 height=15>  <b>$preg1_6% </b> <br>";?></td>
    <td>&nbsp;</td>
  </tr>
</table>
