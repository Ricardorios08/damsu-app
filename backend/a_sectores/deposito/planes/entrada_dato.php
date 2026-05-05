<script language="javascript">
function on_load()
{
document.getElementById("plan").focus();
document.getElementById("plan").style.backgroundColor = "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "plan":
				document.getElementById("descuento_1").focus();
				document.getElementById("plan").style.backgroundColor = "#ffffff";
				document.getElementById("descuento_1").style.backgroundColor = "#CCFFCC";

				break;

				case "descuento_1":
				document.getElementById("descuento_2").focus();
				document.getElementById("descuento_1").style.backgroundColor = "#ffffff";
				document.getElementById("descuento_2").style.backgroundColor = "#CCFFCC";
				break;

			case "descuento_2":
				document.getElementById("recargo_1").focus();
				document.getElementById("descuento_2").style.backgroundColor = "#ffffff";
				document.getElementById("recargo_1").style.backgroundColor = "#CCFFCC";
				break;



				case "recargo_1":
				document.getElementById("recargo_2").focus();
				document.getElementById("recargo_1").style.backgroundColor = "#ffffff";
				document.getElementById("recargo_2").style.backgroundColor = "#CCFFCC";
				break;

				case "recargo_2":
				document.getElementById("recargo_flete").focus();
				document.getElementById("recargo_2").style.backgroundColor = "#ffffff";
				document.getElementById("recargo_flete").style.backgroundColor = "#CCFFCC";
				break;
				
				case "recargo_flete":
document.getElementById("cuotas").focus();
document.getElementById("recargo_flete").style.backgroundColor = "#ffffff";
document.getElementById("cuotas").style.backgroundColor = "#CCFFCC";
				break;
				
				case "cuotas":
				document.getElementById("recargo_mensual").focus();
				document.getElementById("cuotas").style.backgroundColor = "#ffffff";
				document.getElementById("recargo_mensual").style.backgroundColor = "#CCFFCC";
				break;

				case "recargo_mensual":		
document.getElementById("guardar").focus();
document.getElementById("recargo_mensual").style.backgroundColor = "#ffffff";
				break;
		}
		return false;
	}
	return true;
}


</script>

<?php $hoy = date("d/m/y");

include ("../../../conexiones/config_pro.php");
 $sql="select * from clientes GROUP BY cuenta ORDER BY cuenta DESC";
$result = $db->Execute($sql);
 $cuenta=($result->fields["cuenta"] + 1);
?>


<BODY onload = "on_load ()">
<FORM name="form" ACTION="guardar_clientes.php" METHOD = "POST">
<table width="103%" border="0">
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#000099"> 
      <td height="34" colspan="3"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>ALTA DE CLIENTES NO ASOCIADOS</strong></font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
      <td width="27%" bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">N&ordm; Plan </font>
      </div></td>
      <td width="40%" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="plan" id="plan" onKeyPress="return verif_caracter(this,event)" size="5" value = "<?php echo $plan;?>"> 
      </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font><font color="#006633" size="2" face="Arial, Helvetica, sans-serif">&nbsp;
      
      </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;     </font>      
      <div align="right"></div></td>
      <td width="40%" bgcolor="#E1F2EF"><font color="#006633" size="2" face="Arial, Helvetica, sans-serif">&nbsp;
      </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fecha</font>:<font color="#006633" size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="fecha" id="fecha" onKeyPress="return verif_caracter(this,event)" size="8" value="<?php echo $hoy;?>">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE">
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Descuento 1 </font> </div></td>
      <td colspan="2" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="descuento_1" id="descuento_1"  size="5" onKeyPress="return verif_caracter(this,event)">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Descuento 2 </font></div></td>
      <td colspan="2" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="descuento_2"  id="descuento_2"  size="5" onKeyPress="return verif_caracter(this,event)">                
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Recargo 1 </font></div></td>
      <td colspan="2" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="recargo_1" id="recargo_1"  size="5"onKeyPress="return verif_caracter(this,event)">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Recargo 2 </font></div></td>
      <td colspan="2" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="recargo_2" id="recargo_2"  size="5"onKeyPress="return verif_caracter(this,event)">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Recargo Flete </font></div></td>
    <td colspan="2" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="recargo_flete" id ="recargo_flete" size="5" onKeyPress="return verif_caracter(this,event)">      
    </font></tr>
    <tr bordercolor="#FFFFFF"> 
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cuotas</font></div></td>
      <td colspan="2" bgcolor="#E1F2EF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        </font>        <font size="2">
        </font>      </div>        
        <font size="2" face="Arial, Helvetica, sans-serif">
        <input type="text" name="cuotas" id ="cuotas" size="5" onKeyPress="return verif_caracter(this,event)">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
      <td bgcolor="#C1F2FF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Recargo Mensual </font></div></td>
      <td colspan="2" bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="recargo_mensual" id="recargo_mensual" size="10" onKeyPress="return verif_caracter(this,event)">
      </font></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
      <td>&nbsp;</td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input type="Submit" name="guardar" id= "guardar" value="GUARDAR PLAN" target = "arriba">
      </font></td>
    </tr>
</table>
  <br>
</form>
  
