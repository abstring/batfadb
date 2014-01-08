<?php
header("Content-type: image/png");
// set the width and height of the new image in pixels
$width = 200;
$height = 200;

// create a pointer to a new true colour image
$im = ImageCreateTrueColor($width, $height); 

// switch on image antialising if it is available
ImageAntiAlias($im, true);

// sets background to white
$white = ImageColorAllocate($im, 255, 255, 255); 
ImageFillToBorder($im, 0, 0, $white, $white);

// define a black colour
$black = ImageColorAllocate($im, 0, 0, 0);
$red = ImageColorAllocate($im, 255, 0, 0);

// make a new line and add it to the image
ImageLine($im, 10, 10, 250, 300, $black);

// add another line, this time a dashed line!
ImageDashedLine($im, 30, 10, 280, 300, $red);

// send the new PNG image to the browser
ImagePNG($im);

// destroy the reference pointer to the image in memory to free up resources
ImageDestroy($im); 

?>