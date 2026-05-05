<?
//include ("encabezado_factura");
include ("numero_a_letras.php");

//$b = format($total_acumulado,2);
//echo $b = number_format($total_acumulado, 2, '.', ',');



$numero = explode('.',$total_acumulado);
$a = num2letras($numero[0])." con ".substr($numero[1],0,2)."/100";

?>





<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo1 {
	color: #0000FF;
	font-size: 18px;
}
-->
</style>
</head>

<body>
<table width="516" border="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="44" colspan="2">&nbsp;</td>
    <td width="280">&nbsp;</td>
  </tr>
  <tr>
    <td width="96">&nbsp;</td>
    <td colspan="2"><strong>SON PESOS: <span class="Estilo1"><?echo $a;?></span></strong></td>
  </tr>
  <tr>
    <td><div align="justify"></div></td>
    <td colspan="2"><div align="justify">CONDICIONES DE PAGO La presente factura deberá ser abonada a la ASOCIACION BIOQUIMICA DE MENDOZA, en su sede de calle Belgrano N º 925 Ciudad (5500) MENDOZA, dentro de los 30 días de recibida, vencido ese plazo la deuda será actualizada y devengará los intereses que fija el Banco de la Nacion Argentina en las operaciones de descuentos de documentos comerciales.</div></td>
  </tr>
  <tr>
    <td><div align="justify"></div></td>
    <td colspan="2"><div align="justify">Las ordenes OBSERVADAS, se solicita realizar ajustes parciales de las prescripciuones m&eacute;dicas auditadas, conceptuando los d&eacute;bitos efectuados y remitir ocasionalmente, si es necesario, fotocopias de la misma, y en caso de cumplimentaci&oacute;n de la orden (FALTA DE FIRMA DEL PROFESIONAL Y/O AFILIADO, ETC.) devolver original. </div></td>
  </tr>
  <tr>
    <td><div align="justify"></div></td>
    <td colspan="2"><div align="justify">Los d&eacute;bitos a que pudiere dar lugar la presente factura deber&aacute;n ser realizados dentro de los quince (15) d&iacute;as de recibida, devolviendo la documentaci&oacute;n observada. En caso de d&eacute;bitos parciales deber&aacute; acompa&ntilde;arse fotocopia de la solicitud m&eacute;dica y de la orden de practica. </div></td>
  </tr>
  <tr>
    <td><div align="justify"></div></td>
    <td colspan="2"><div align="justify">PASADO EL TERMINO ANTES FIJADO CADUCAR&Aacute; EL DERECHO DE EFECTUARLOS TENIENDOSE POR ACEPTADA DEFINITIVAMENTE LA FACTURA. </div></td>
  </tr>
  <tr>
    <td height="21" colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Mendoza,<?echo $hoy;?> </td>
  </tr>
  <tr>
    <td height="21" colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">.....................................</div></td>
  </tr>
  <tr>
    <td colspan="3"><p align="right">P/ASOC. BIOQUIMICA </p>    </td>
  </tr>
  <tr>
    <td height="44" colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26" colspan="2" valign="top">RECIBIDO EL ....../......../....... </td>
    <td valign="top"><div align="right">por...........................</div></td>
  </tr>
  <tr>
    <td colspan="3"> <div align="right">aclaracion y sello </div></td>
  </tr>
  <tr>
    <td height="3"></td>
    <td width="126"></td>
    <td></td>
  </tr>
</table>
</body>
</html>
