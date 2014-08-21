<?php
/*
Plugin Name: Image autorefresh shortcode
Plugin URI: http://site.uit.no
Description: Small shortcode plugin created specifically for reloading images for site.uit.no/spaceweather
Version: 1
Author: Klaske van Vuurden
Author URI: http://no.linkedin.com/in/klaskevanvuurden/
Copyright: Klaske van Vuurden
*/



defined('ABSPATH') or die("Don't access directly!");


/* input: shortcode with keywords src and refresh_time
 *
 * output: div containing image + jquery that reloads the image in interval refresh_time
 *
 */

//[image-autorefresh src="image-url" refresh_time=number_of_seconds]
function image_autorefresh_shortcode($atts){
	$a = shortcode_atts( array(
			'src' => $atts['src'],
			'refresh_time' => 'something else',
	), $atts );
	
	return 'This is a test...' . $a['src'];
}
add_shortcode('image-autorefresh', 'image_autorefresh_shortcode');


