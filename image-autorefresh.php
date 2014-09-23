<?php
/*
Plugin Name: Image autorefresh shortcode
Plugin URI: https://github.com/klasske/wp_image_autorefresh
Description: Ligthweight shortcode plugin created specifically for reloading images that are refreshed on a regular basis (for example from live camera feeds)
Version: 1.3
Author: Klaske van Vuurden
Author URI: https://github.com/klasske/
Copyright: Klaske van Vuurden
*/


defined('ABSPATH') or die("Don't access directly!");

//[image-autorefresh src="image-url" refresh_time=number_of_seconds caption=text align=left]
function image_autorefresh_shortcode($atts){
	$a = shortcode_atts( array(
			'src' => includes_url() . 'images/wlw/wp-watermark.png',
			'refresh_time' => 60,
			'caption' => '',
			'align' => 'left',
			'width' => 0,
			'height' => 0,
			'class' => '',
			'query_string' => ''	
	), $atts );

   /* second version: allows multiple images per page with random string */

   $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

	ob_start();
	?>
	<script>
	    setInterval(function()
        {
            if(document.hasFocus()){
               d = new Date();
               image = jQuery('img#image_autorefresh_<?php echo $randomString ?>');
               if(image.data("query") == ''){
	               image.attr("src", image.data("src") + "?" + d.getTime());
               }else{
	               image.attr("src", image.data("src") + "?" + d.getTime() + "&" + image.data("query"));
               }    
            }
        }, <?php echo $a['refresh_time']; ?>000);

	</script>

	<div class="<?php echo '' != $a['caption'] ? 'wp-caption ': ''; ?>align<?php echo $a['align']; ?>">
	<img src="<?php echo $a['src']; echo ($a['query_string'] != '') ? '?' . $a['query_string'] : ''; ?>" 
		 data-src="<?php echo $a['src']; ?>"
	     data-query="<?php echo $a['query_string']; ?>"
	     class="image_autorefresh<?php 
	     echo ($a['width'] > 0) ? ' image_autorefresh_changed_width' : ''; 
	     echo ($a['class'] != '') ? ' ' . $a['class'] : ''; 
	     ?>" 
	     id="image_autorefresh_<?php echo $randomString ?>"
	     data-refresh="<?php echo $a['refresh_time']; ?>"
	     <?php echo ($a['width'] > 0) ? 'width="' . $a['width'] . '"' : '' ?>
	     <?php echo ($a['height'] > 0) ? 'height="' . $a['height'] . '"' : '' ?>
	     >
	<?php echo '' != $a['caption'] ? '<p class="wp-caption-text">' . $a['caption'] . '</p>' : ''; ?>
	</div>
	<?php
	return ob_get_clean();
}

//enqueue script (if not already there)
function image_autorefresh_scripts() {
    wp_enqueue_script("jquery-image-autorefresh", plugins_url("/image-autorefresh.js", __FILE__ )  , array('jquery', 'jquery-ui-core'));
}

add_action( 'wp_enqueue_scripts', 'image_autorefresh_scripts' );
add_shortcode('image-autorefresh', 'image_autorefresh_shortcode');

