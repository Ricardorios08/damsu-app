<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Encuesta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menub ar=no,scrollbar=no,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script> 


</head>

<body bgcolor="#000000">
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">Que 
  eliges tu???? </font></strong></font></p>
<form name="form1" method="post" action="encuesta.php">
  <p> <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"> 
    <input type="radio" name="voto" value="Opción A">
    <font color="#00FF00">Opci&oacute;n A</font></font></p>
  <p> <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"> 
    <input type="radio" name="voto" value="Opción B">
    <font color="#00FF00">Opci&oacute;n B</font></font></p>
  <p> <font color="#FFFFFF">
    <input type="submit" name="Submit" value="Enviar">
    </font></p>
</form>
<p><font size="1" face="Arial, Helvetica, sans-serif" color="#ffffff"><a href="javascript:popUpWindow('encuesta.php?clscr=1', 100, 100, 400, 250)" title="Ver Resultados">Ver Resultados</a></p>
</body>
</html>
