

<?php 

$nro_receta= $_REQUEST['nro_receta'];
$documento= $_REQUEST['documento'];
$operador= $_REQUEST['operador'];


?>
<BODY onload = "on_load()">
<form action="borrar_receta_clave.php" method="post" target = "central1">
<table width="95%" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>BORRAR RECETA </strong></font></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif">CONTRASEÑA DE SEGURIDAD <font color="#000000">
      <input type="password" name="contra" >
    </font><font color="#000000">
    <input type="hidden" name="nro_receta" value = "<?php echo $nro_receta;?>">
	    <input type="hidden" name="documento" value = "<?php echo $documento;?>">
		    <input type="hidden" name="operador" value = "<?php echo $operador;?>">
    </font></font>
    <div align="center"></div>      <div align="center"></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#B8B8B8"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000000">
    </font></font></div>      <div align="center"><font size="2"><strong><font size="2">
    <input type="Submit" name="Alta"  id ="Alta" value="ok">
    </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"></font></div>    <div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        </font></strong> </font></div>    <div align="left"></div>    <div align="left"><font size="2"><strong><font size="2">
        </font><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
</table>

</form>