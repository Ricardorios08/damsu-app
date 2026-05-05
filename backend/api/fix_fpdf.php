<?php
$file = 'c:/laragon/www/damsu-app/backend/drivers/fpdf/fpdf.php';
$content = file_get_contents($file);
$content = preg_replace('/\$(\w+)\{([^}]+)\}/', '$$1[$2]', $content);
file_put_contents($file, $content);
echo "Fixed FPDF curly braces.\n";
?>
