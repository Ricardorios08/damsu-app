<?php

include ("../../../conexiones/config_pro.php");
$documento = $_REQUEST['documento'];
$documento_incorrecto = $_REQUEST['documento_incorrecto'];
$seguridad= $_REQUEST['seguridad'];

$sql="select * from pacientes where documento =  '$documento'";
$result = $db->Execute($sql);

$apellido=strtoupper($result->fields["apellido"]);
$nombre=strtoupper($result->fields["nombre"]);


$sql="select * from pacientes where documento =  '$documento_incorrecto'";
$result = $db->Execute($sql);

$apellido_i=strtoupper($result->fields["apellido"]);
$nombre_i=strtoupper($result->fields["nombre"]);


if ($documento == ""){
$leyenda = "NO INGRESO DOCUMENTO";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if ($documento_incorrecto == ""){
$leyenda = "NO INGRESO DOCUMENTO INCORRECTO";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if (($documento == "") AND ($documento_incorrecto == "")){
$leyenda = "NO INGRESO DOCUMENTOS";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if (($documento != "") AND ($documento_incorrecto == "")){
$leyenda = "NO INGRESO DOCUMENTO INCORRECTO";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if (($documento == "") AND ($documento_incorrecto != "")){
$leyenda = "NO INGRESO DOCUMENTO";
include ("../../../alertas/campo_informacion2.php");
exit;
}


if ($apellido == ""){
$leyenda = "NO EXISTE PACIENTE CON ESE DOCUMENTO";
include ("../../../alertas/campo_informacion2.php");
exit;
}



if ($apellido_i == ""){
$leyenda = "NO EXISTE PACIENTE INCORRECTO CON ESE DOCUMENTO";
include ("../../../alertas/campo_informacion2.php");
exit;
}


?>
<FORM ACTION="generar_uni.php" METHOD = "POST" enctype="multipart/form-data" name="form">
<table width="800" border="0" cellspacing="0">
        <tr bgcolor="#000099">
          <td height="35" colspan="3" bgcolor="#CCCCCC"><div align="center" class="Estilo16 Estilo54">UNIFICAR DOS PACIENTES CON DISTINTOS DOCUMENTOS POR ERROR DE CARGA </div></td>
        </tr>
        
        
        <tr bgcolor="#E8DCFC">
          <td width="50%" bgcolor="#E6E6E6"><div align="right" class="Estilo57">Documento CORRECTO </div></td>
          <td width="50%" colspan="2" bgcolor="#E6E6E6"><label>
            <input name="documento" type="text" id="documento" value = "<?php echo $documento;?>"> <?php echo $apellido;?> <?php echo $nombre;?>
          </label></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td bgcolor="#E6E6E6"><div align="right" class="Estilo57">Documento INCORRECTO </div></td>
          <td colspan="2" bgcolor="#E6E6E6"><label>
            <input name="documento_incorrecto" type="text" id="documento_incorrecto" value = "<?php echo $documento_incorrecto;?>"> <?php echo $apellido_i;?> <?php echo $nombre_i;?>
          </label></td>
        </tr>
        
        <tr bgcolor="#E8DCFC">
          <td bgcolor="#E6E6E6"><div align="right"><span class="Estilo59">CONTRASE&Ntilde;A DE SEGURIDAD </span></div></td>
          <td colspan="2" bgcolor="#E6E6E6"><input name="seguridad" type="password" id="seguridad"></td>
        </tr>
        
        <tr bgcolor="#E8DCFC">
          <td colspan="3" bgcolor="#CCCCCC"><div align="center"><span class="Estilo55"></span><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo9">
          <input name="Alta" type="submit" value= "CAMBIAR" id = "ok">
          </span></span></span></span></span></div></td>
        </tr>
  </table>
</form>
<?





