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
.Estilo58 {font-size: 12px}
.Estilo61 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
-->
</style>
<BODY background="../../IMAGENES/fondo.jpg"" class="Estilo4" onload ="ocultamenu()">

<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central">
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

function multicarg(documento1,documento2)
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
.Estilo54 {font-size: 12px}
.Estilo55 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo61 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Estilo71 {font-size: 10px}
.Estilo72 {font-size: 12px; color: #000000; }
.Estilo73 {font-size: 12px; color: #FFFFFF;}
.Estilo74 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo75 {font-size: 10px; color: #000000;}
-->
</style>
<BODY background="../../../IMAGENES/IZQUIERDA.PNG" class="Estilo4" onload ="ocultamenu()">

<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central">
<table width="179" border="0">
  <tr>
    <th width="173" height="28" bgcolor="#006699" scope="col"><span class="Estilo61">FACTURACION</span></th>
  </tr>
  <tr>
    <td align="center" bgcolor="#E0EDF3" scope="row"><div align="center" class="Estilo12"><a href="../proveeduria/facturacion/entrada_factura.php" target = "central" class="Estilo54" onclick="return confirm('¿Si tiene alguna Factura Pendiente se borrará?');">1. NOTA DE ENTREGA </a></div></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E0EDF3" scope="row"><div align="center" class="Estilo12"><a href="nota_debito/entrada_factura.php" target = "central" class="Estilo54" >2. NOTA DEBITO </a></div></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E0EDF3" scope="row"><div align="center" class="Estilo12"><a href="nota_credito/entrada_factura.php" target = "central" class="Estilo54" onclick="return confirm('¿Si tiene alguna Nota de Credito Pendiente se borrará?');">3. NOTA CREDITO </a></div></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E0EDF3" scope="row"><span class="Estilo12"><a href="nota_credito_pesos/entrada_factura.php" target = "central" class="Estilo54">4. N/ CREDITO PESOS </a></span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E0EDF3" scope="row"><span class="Estilo12"><a href="../proveeduria/consultas.php" target = "izquierda" class="Estilo54" >5. BUSCAR FACT. </a></span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#006699" scope="row"><span class="Estilo55 Estilo6 Estilo7 Estilo58">PROCESOS</span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#C4D7E6" scope="row"><a href="consultas/informes.php" target = "izquierda" class="Estilo74 Estilo7 Estilo58" >1. INFORMES</a></td>
  </tr>
  <tr>
    <td valign="middle" bgcolor="#C4D7E6" class="Estilo4" scope="row"><div align="center" class="Estilo12"><a href="informes.php" target = "izquierda" class="Estilo54" >2. ACTUALIZACIONES </a></div></td>
  </tr>
</table>

<div align="center"></div>
<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central">
<table width="175" border="0">
    <tr>
      <td bgcolor="#E0EDF3" scope="col"><table width="178" height="224" border="0">
        <tr>
          <td width="182" height="24" bgcolor="#006699">
            <div align="center" class="Estilo61">CONSULTAS</div></td>
        </tr>
        <tr>
          <td height="18" valign="middle" bgcolor="#C4D7E6" class="Estilo12" scope="row"><div align="center">
              <input type="text" name="textfield">
          </div></td>
        </tr>
        <tr>
          <td height="18" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >PACIENTES</a></div></td>
        </tr>
        <tr>
          <td height="18" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >HISTORIA CLINICA </a></div></td>
        </tr>
        <tr>
          <td height="18" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >EXISTENCIAS</a></div></td>
        </tr>
        <tr>
          <td height="18" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >FICHA DE EXISTENCIAS</a></div></td>
        </tr>
        <tr>
          <td height="18" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >RECETAS</a></div></td>
        </tr>
        <tr>
          <td height="17" valign="middle" bgcolor="#E0EDF3" class="Estilo12" scope="row"><div align="center"><a href="proveedores/compra_proveedores/compras_pro.php" target = "central" class="Estilo12" >COMPROBANTES</a></div></td>
        </tr>
        <tr>
          <td height="17" valign="middle" bgcolor="#0000CC" class="Estilo12" scope="row"><div align="center"><span class="Estilo61">IR A </span></div></td>
        </tr>
        <tr>
        </tr><tr><td bgcolor="#C4D7E6" scope="col"><div align="center" class="Estilo7"><A HREF="javascript:multicarga('../../validar/admin.php', '../../validar/cuadros.htm')">Principal</A></div></td>
    </tr>
<tr>
  </tr><tr><td bgcolor="#C4D7E6" scope="col"><div align="center" class="Estilo7"><font color="#0000FF"><a href="../../index.html" target ="_parent">Salir</a></font></div></td>
    </tr>
      </table>
	  
	  </FORM>