<?php

$mes = "01";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}



$mes = "02";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}


$mes = "03";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}


$mes = "04";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}

$mes = "05";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}

$mes = "06";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 6){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}


$mes = "07";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}



$mes = "08";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}


$mes = "09";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}


$mes = "10";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}

$mes = "11";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 0){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}

$mes = "12";
$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Masculino'";
$result = $db->Execute($sql);
$femenino=strtoupper($result->fields["cantidad"]); // numero
 
$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = 'Femenino'";
$result = $db->Execute($sql);
$masculino=strtoupper($result->fields["cantidad"]); // numero

$sql="select count(documento) as cantidad from `est_departamento` where departamento = '$departamento' and provincia = 'mendoza' and fecha between '$desde' and '$hasta' and sexo = ''";
$result = $db->Execute($sql);
$sin_sexo=strtoupper($result->fields["cantidad"]); // numero

$cantidad = $femenino + $masculino + $sin_sexo;

if ($cantidad > 6){
$sql = "INSERT INTO est_departamento_final (`departamento`, `mes`, `anio`,`cantidad` , `masculino` , `femenino`) VALUES ('$departamento', '$mes' , '$anio' ,'$cantidad' , '$masculino' , '$femenino')";
$result = $db->Execute($sql);
}