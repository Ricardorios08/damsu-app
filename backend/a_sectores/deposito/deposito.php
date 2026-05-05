<script type="text/javascript">
function ocultamenu(){
  var menu = document.getElementById("Atributos");
  menu.style.display = "none";
}
function despliega(){
  var menu = document.getElementById("Atributos");
    if(menu.style.display == "none"){
      menu.style.display = "block";
    }
    else{
      menu.style.display = "none";
    }
}
</script>
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>
<style type="text/css">
<!--
.Estilo4 {font-size: xx-small}
.Estilo6 {color: #FFFFFF}
.Estilo7 {font-family: Arial, Helvetica, sans-serif}
.Estilo12 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo1 {
	color: #0000FF;
	font-size: 12px;
}
.Estilo58 {font-size: 12px}
.Estilo59 {font-size: 12}
.Estilo61 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
.Estilo62 {
	color: #000099;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<BODY background="../../IMAGENES/fondo.jpg" class="Estilo4" onload ="ocultamenu()">

<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central">
  <table width="179" height="285" border="0">
    <tr> 
      <td width="173" height="28" bgcolor="#C4D7E6" scope="col"><div align="center"><span class="Estilo62">DEPOSITO</span></div></td>
    </tr>
    <tr>
      <td height="22" valign="middle" bgcolor="#000099" class="Estilo12" scope="row"><div align="center" class="Estilo6">PROCESOS</div></td>
    </tr>
    <tr>
      <td height="14" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="compras/pagina1.php" target = "central" class="Estilo7 Estilo58" >INGRESOS</a></div></td>
    </tr>
    <tr>
      <td height="14" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >AJUSTES</a></div></td>
    </tr>
    <tr>
      <td height="14" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >INVENTARIO</a></div></td>
    </tr>
    <tr>
      <td height="14" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >INFORMES</a></div></td>
    </tr>
    <tr>
      <td height="14" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >AUDITORIA</a></div></td>
    </tr>
    <tr> 
      <td height="24" bgcolor="#000099"> <div align="center" class="Estilo61">ACTUALIZACIONES</div></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#C4D7E6" class="Estilo12" scope="row"><font color="#0000FF"><a href="mercaderia/drogas.php" target = "central" ><img src="../../imagenes/merca.jpg" width ="20" height= "20" alt="Proveedores" border = "0"> REGISTRO DROGA </a></font></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#C4D7E6" class="Estilo12" scope="row"><a href="mercaderia/entrada_mercaderia.php" target = "central" ><img src="../../imagenes/merca.jpg" width ="20" height= "20" alt="Proveedores" border = "0"> BASE MEDICAMENTO</a></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#C4D7E6" scope="row"><div align="left"><span class="Estilo12"><a href="proveedores/entrada_dato.php" target = "central" ><img src="../../imagenes/office/097.ico" alt="Mercaderia" width="22" height="18" border = "0"> PROVEEDORES</a></span></div></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#C4D7E6" scope="row"><div align="left"><a href="mercaderia/entrada_laboratorio.php" target = "central" class="Estilo12 Estilo59" ><IMG SRC="../../imagenes/office/097.ico" alt="Mercaderia" width="22" height="18" border = "0"> <span class="Estilo58">LABORATORIOS</span></a></div></td>
    </tr>

    <tr bgcolor="#000099"> 
      <td colspan="2" scope="col"><div align="center" class="Estilo6 Estilo1 Estilo7"><font color="#FFFFFF">BUSCAR</font></div></td>
    </tr>
    <tr bgcolor="#E0EDF3"> 
      <td colspan="2" scope="col"><div align="center"> <font color="#FFFFFF"> 
          <select name="opciones[]" id="opciones" onkeypress="return verif_caracter(this,event)">
            <option value ="proveedores">Proveedores</option>
            <option value="laboratorios">Laboratorios</option>
			<option value="vademecum">Vademecum</option>
			<option value="drogas">Drogas</option>
          </select>
      </font></div></td>
    </tr>
    <tr bgcolor="#E0EDF3"> 
      <td colspan="2" scope="col">Ingrese
        <input type = "text" name = "busca" size = "7"> 
        <input type = "hidden" name = "buscador_rapido" value = "2"></td>
    </tr>
    <tr bgcolor="#E0EDF3"> 
      <td colspan="2" scope="col"><div align="center"> 
          <input type="submit" name="Submit" value="Buscar">
      </div></td>
    </tr>

    <tr>
      <td width="173" bgcolor="#000099" scope="col"><div align="center" class="Estilo6">Ir a...</div></td>
    </tr>
    <tr>
      <td bgcolor="#C4D7E6" scope="col"><div align="center"><A HREF="javascript:multicarga('../../validar/admin.php', '../../validar/cuadros.htm')">Principal</A></div></td>
    </tr>
    <tr>
      <td bgcolor="#C4D7E6" scope="col"><div align="center"><font color="#0000FF"><a href="../../index.html" target ="_parent">Salir</a></font><font color="#0000FF"></font><font color="#0000FF"></font></div></td>
    </tr>
  </table>


</form>