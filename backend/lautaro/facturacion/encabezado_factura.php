<?global $count;
global $sigla;
global $denominacion;
global $domicilio_l;
global $cuit;
global $mes_actual;
global $importe;
global $total_importe_ordenes;
global $valor_677;
global $contame;
global $observaciones;
global $cont1;
global $band;
global $material;
global $importe;
global $importe1;
global $importe_998;
global $mes_actual;
include ("../../conexiones/config_os.php");

$mes1=$_POST["mes1"];
	for ($i=0;$i<count($mes1);$i++)    
	{     
	$mes_1= $mes1[$i];    
	}


function redondear($valor) {
$float_redondeado=round($valor * 100) / 100;
return $float_redondeado;
}

$hoy = date("d/m/y");
$observaciones = "NINGUNA";
$nro_factura = $_REQUEST['nro_factura'];

$mes= $_REQUEST['mes'];
$año= $_REQUEST['hoy'];
$nro_os = $_REQUEST['nro_os'];
$nro_os2 = $_REQUEST['nro_os2'];
$nro_labo = $_REQUEST['nro_laboratorio'];


$anio=date("y");


$periodo= $mes." - ".$año;

//if (strlen($anio) == 4){
//$anio = substr($anio,2);
//}

switch ($mes)
					{
		case "ENERO":{$periodo1= "01".$año; $mes_actual="01";}break;
		case "FEBRERO":{$periodo1= "02".$año;$mes_actual="02";}break;
		case "MARZO":{$periodo1= "03".$año;$mes_actual="03";}break;
		case "ABRIL":{$periodo1= "04".$año;$mes_actual="04";}break;
		case "MAYO":{$periodo1= "05".$año;$mes_actual="05";}break;
		case "JUNIO":{$periodo1= "06".$año;$mes_actual="06";}break;
		case "JULIO":{$periodo1= "07".$año;$mes_actual="07";}break;
		case "AGOSTO":{$periodo1= "08".$año;$mes_actual="08";}break;
		case "SETIEMBRE":{$periodo1= "09".$año;$mes_actual="09";break;}
		case "OCTUBRE":{$periodo1= "10".$año;$mes_actual="10";}break;
		case "NOVIEMBRE":{$periodo1= "11".$año;$mes_actual="11";}break;
		case "DICIEMBRE":{$periodo1= "12".$año;$mes_actual="12";}break;
					}


$sql="select * from datos_os where nro_os like '$nro_os'";
$result = $db->Execute($sql);
  
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $domicilio_l=ucwords($result->fields["domicilio_l"]);
 $denominacion=ucwords($result->fields["denominacion"]);
 $cuit=ucwords($result->fields["cuit"]);
 $sigla=ucwords($result->fields["sigla"]);

$result->MoveNext();
	}

//*********************** encabezados *******************************************************************

?>
<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
.Estilo6 {font-size: 12px}
.Estilo9 {font-size: 12px; font-weight: bold; }
.Estilo10 {font-size: 16px}
.Estilo11 {color: #FF0000}
.Estilo12 {color: #0000CC}
-->
</style>

<table width="635" border="0">
    <tr bgcolor="#FFFFCC">
      <td width="274" rowspan="6"><div align="center">
        <p><span class="Estilo9"><strong>ASOCIACION BIOQUIMICA DE MENDOZA <BR>
          PERSONERIA JURIDICA DTO. NRO 2201/69 <BR>
      BELGRANO 925 - 5500 - MENDOZA<br>
        Telefono: 424-6974</strong><BR>
      IVA RESPONSABLE INSCRIPTO </span></strong>      </div></td>
      <td width="110" rowspan="6"><div align="center" class="Estilo1">&quot;B&quot;</div></td>
      <th bordercolor="#CCCCCC"><div align="right" class="Estilo6">Factura Nº: </div></th>
      <th bordercolor="#CCCCCC"><div align="left" class="Estilo6"><?echo $nro_factura;?></div></th>
  </tr>
  <tr>
    <th width="106" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="right" class="Estilo6">Fecha: </div></th>
    <th width="127" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="left" class="Estilo6"><?echo $hoy;?> </div></th>
  </tr>
  <tr>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="right" class="Estilo6">C.U.I.T N&ordm;: </div></th>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="left" class="Estilo6">30-54550865-2</div></th>
  </tr>
  <tr>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="right" class="Estilo6">Ingresos Brutos: </div></th>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="left" class="Estilo6">Exento</div></th>
  </tr>
  <tr>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="right" class="Estilo6">Jub. Comercio: </div></th>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="left" class="Estilo6">54550865</div></th>
  </tr>
  <tr>
    <th height="17" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="right" class="Estilo6">inicio Activ: </div></th>
    <th bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="left" class="Estilo6">24/05/69 </div></th>
  </tr>
  <tr bgcolor="#FDE3CC" class="Estilo6">
    <td colspan="4"><em>OBRA SOCIAL: <?print("$denominacion");?> 
      <?print "(".$sigla.")";?>
      <? print "(".$nro_os.")";?> </em><em>
      </em></td>
  </tr>
  <tr bgcolor="#FDE3CC" class="Estilo6">
    <td><em>DOMICILIO: <?print("$domicilio_l");?>
    </em></td>
    <td colspan="3"><?print("$periodo");?></td>
  </tr>
  <tr bgcolor="#FDE3CC" class="Estilo6">
    <td><em>I.V.A: Consumidor Final</em></td>
    <td colspan="3"><em>C.U.I.T. <?print("$cuit");?></em></td>
  </tr>
</table>

 
  
  