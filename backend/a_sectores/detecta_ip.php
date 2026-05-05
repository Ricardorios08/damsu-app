<?php function obtenerIP() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif (isset($_SERVER['HTTP_VIA'])) {
       $ip = $_SERVER['HTTP_VIA'];
    }
    elseif (isset($_SERVER['REMOTE_ADDR'])) {
       $ip = $_SERVER['REMOTE_ADDR'];
    }
    else {
       $ip = "0.0.0.0";
    }
    return $ip;
}

//De esta forma llamamos a la funcion y obtenemos la IP

echo $ip=obtenerIP(); 

$a = 10;

IF ($a >= 1){
echo "aa";
}
?>