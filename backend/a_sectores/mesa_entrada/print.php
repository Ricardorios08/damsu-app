<?php
$handle = printer_open("Canon Bubble-Jet BJC-1000");
echo printer_get_option($handle, PRINTER_DRIVERVERSION);
printer_close($handle);
?> 