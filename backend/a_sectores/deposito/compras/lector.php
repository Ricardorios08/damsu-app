<table width="995" border="0">
  <tr bgcolor="#C4D7E6">
    <td colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">CARGA POR LECTOR</font></div></td>
    <td width="335" colspan="2"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fecha: </font><font color="#000000" size="2"><?php echo $fecha;?></font> </div></td>
  </tr>
  <tr bgcolor="#8080FF">
    <td width="140"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Operador</font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">: <?php echo $operador;?></font> </div></td>
    <td width="418"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Proveedor: <?php echo $nro_proveedor." - ".$denominacion;?></font>      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"> </font> </div></td>
    <td><div align="right"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">N&ordm; Comprobante: <?php echo $nro_factura;?></font> </div>      <div align="center"></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td height="31"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cod. Barra:</font></div></td>
    <td height="31"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#006600">

<?php if ($no_hacer_nada == 1){?>
		
		<input type = "text" name = "cod_barra" id="cod_barra" size = "13" value = "<?php  echo $cod_barra;?>" onKeyPress="return verif_caracter(this,event)"> <?php echo $nombre_comercial;?>
<?php }else{?>
<input type = "text" name = "cod_barra" id="cod_barra" size = "13"  onKeyPress="return verif_caracter(this,event)"> Troquel: <input type = "text" name = "troquel" id="troquel" size = "13"  onKeyPress="return verif_caracter(this,event)">

<?php }?>
</font></strong></font><font color="#000000" size="2"><input type = "hidden" name = "operador" value = "<?php echo $operador;?>">
      <input type = "hidden" name = "modo_carga" value = "<?php echo $modo_carga;?>">
      <input type = "hidden" name = "nro_proveedor" value = "<?php echo $nro_proveedor;?>">
      <input type = "hidden" name = "dia" value = "<?php echo $dia;?>">
      <input type = "hidden" name = "mes" value = "<?php echo $mes;?>">
      <input type = "hidden" name = "anio" value = "<?php echo $anio;?>">
      <input type = "hidden" name = "nro_factura" value = "<?php echo $nro_factura;?>">
	  <input type = "hidden" name = "grabar" value = "SI">
</font></div>      </td>
    <td height="31" colspan="2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cant.</font><font color="#000000" size="2">
    <input type = "text" name = "cantidad" id="cantidad" size = "4" onKeyPress="return verif_caracter(this,event)">
    </font><font size="2" face="Arial, Helvetica, sans-serif">Pr. Unit.</font>: $<font color="#000000" size="2">&nbsp;
    <input type = "text" name = "precio_unitario" id="precio_unitario" size = "7" >
    <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" onClick = "enter()" >
    <input name="Alta" type="submit" value="BUSCAR" id ="Alta" size = "10" onClick = "enter()" >
</font></td>
  </tr>
</table>
<?php $cod_barra = "";?>