<?php
// public/assets/images/placeholder.php
header('Content-Type: image/png');

$width = $_GET['w'] ?? 400;
$height = $_GET['h'] ?? 300;
$text = $_GET['text'] ?? 'Imagem';

$image = imagecreate($width, $height);
$bg_color = imagecolorallocate($image, 240, 240, 240);
$text_color = imagecolorallocate($image, 100, 100, 100);

imagefill($image, 0, 0, $bg_color);

$font_size = 5;
$text_width = imagefontwidth($font_size) * strlen($text);
$text_height = imagefontheight($font_size);

$x = ($width - $text_width) / 2;
$y = ($height - $text_height) / 2;

imagestring($image, $font_size, $x, $y, $text, $text_color);

imagepng($image);
imagedestroy($image);
