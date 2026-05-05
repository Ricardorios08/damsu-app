<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<BODY onload = "on_load()">

<?php 
$nro_factura = $_REQUEST['nro_factura'];
$documento = $_REQUEST['documento'];
$estado = $_REQUEST['estado'];

	  include ("../../../conexiones/config.inc.php");
$sql7="select * from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);
$apellido=$result7->fields["apellido"];
$nombre=$result7->fields["nombre"];
$nombre_completo = $apellido." ".$nombre; 

?>


<FORM name="form" ACTION="guardar_estado.php" METHOD = "POST">
<table width="850" border="0" cellpadding="0">
  <tr bgcolor="#B8B8B8">
    <td height="45" colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>CAMBIAR ESTADO FACTURA </strong></font></div></td>
  </tr>
  <tr>
    <td width="404" bgcolor="#F0F0F0"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Factura</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> N&deg;: </font></div></td>
    <td width="440"><font size="2" face="Arial, Helvetica, sans-serif"><?PHP echo $nro_factura;?></font></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Documento: </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?PHP echo $documento;?></font></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Apellido: </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?PHP echo $nombre_completo;?></font></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Estado actual: </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?PHP echo $estado;?></font></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cambiar Estado: </font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;
    </font>      <font size="2">&nbsp;
    </font>    
	
	<select name="estados[]" id="estados"onkeypress="return verif_caracter(this,event)">

      <option value="RECIBIDO"><font size="2" face="Arial, Helvetica, sans-serif">RECIBIDO</font></option>
      <option value="DISPONIBLE"><font size="2" face="Arial, Helvetica, sans-serif">DISPONIBLE</font></option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
        <input type="submit" name="Alta" value="CAMBIAR ESTADO" id = "Alta" />
		        <input type="hidden" name="documento" value="<?php $documento;?>">
				  <input type="hidden" name="nro_factura" value="<?php $nro_factura;?>">
	  <input type="hidden" name="nro_factura" value="<?php $nro_factura;?>">


    </font></div></td>
  </tr>
</table>
</body>
</html>
