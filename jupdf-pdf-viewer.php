<?php
/*
Plugin Name: jupdf pdf viewer
Description: PDF viewer on your pages and posts with jupdf
Version: 0.1.0
Author: Yukio HORI
Author URI: http://whitebase.org/horiyuki
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
add_shortcode("jupdf-viewer", "jupdf_handler");

function jupdf_handler($incomingfrompost) {
  //set parameter defaults
  $incomingfrompost=shortcode_atts(array(
    'file' => 'bad-file.pdf',
    'height' => '450px',
    'width' => '600px',
  ), $incomingfrompost);

  $jupdf_output = jupdf_function($incomingfrompost);
  //send back text to replace shortcode in post
  return $jupdf_output;
}

function jupdf_function($param) {
  $viewer= plugins_url("jupdf/index.html", __FILE__);

  $file = $param["file"];
  $width = $param["width"];
  $height = $param["height"];

  $buf = <<< EOS
<!-- start jupdf viewer -->
<iframe src="$viewer?file=$file" width="$width" height="$height" scrolling="no"  allowfullscreen webkitallowfullscreen></iframe>
<!-- end jupdf viewer -->
EOS;

  return $buf;
}
?>
