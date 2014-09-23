=== Image autorefresh shortcode ===
Contributors: kvu022
Tags: shortcode, refresh, autorefresh, image, reload, jquery, interval
Requires at least: 2.6
Tested up to: 3.9.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Small WordPress shortcode plugin created specifically for reloading images for site.uit.no/spaceweather

== Description ==
More info at [the GitHub repository](https://github.com/klasske/wp_image_autorefresh)

# Image autorefresh shortcode

Image autorefresh shortcode is a small shortcode plugin for [WordPress](http://wordpress.org) that allows images in your post that reload on a regular interval

## How to use the plugin

After installing and activating of the plugin in your WordPress page, you can add the following shortcode anywhere in your post or page text:

    [image-autorefresh src="image-url"]

This will create a left aligned`<div>` containing your image. It will refresh every 60 seconds.

You can specify a different refresh time

    [image-autorefresh src="image-url" refresh_time=10]

Add a caption

    [image-autorefresh src="image-url" caption="Your caption"]

Or specify a different alignment (`left`, `right`, `center` or `none`)

    [image-autorefresh src="image-url" align="center"]

    
Add width and height in pixels   

    [image-autorefresh src="image-url" width=320 height=240]
    
Add classes to the image

    [image-autorefresh src="image-url" class="your_custom_class"]
    
Add a custom query string to the image    

    [image-autorefresh src="image-url" query_string="usr=test_user&password=some_password"]

## Examples

The shortcode

    [image-autorefresh
        src="http://weather.cs.uit.no/wcam0_snapshots/wcam0_latest_small.jpg"
        refresh_time=120
        caption="A view from Tromsø university"
        align="center"]

will generate the following code inside your post:

    <script>
	    setInterval(function()
        {
            d = new Date();
            image = jQuery('img#image_autorefresh_timb8XZCWL');
            image.attr("src", image.data("src") + "?" + d.getTime());
        }, 120000);
	</script>

    <div class="wp-caption aligncenter">
	    <img src="http://weather.cs.uit.no/wcam0_snapshots/wcam0_latest_small.jpg"
	         data-src="http://weather.cs.uit.no/wcam0_snapshots/wcam0_latest_small.jpg"
	         class="image_autorefresh"
	         id="image_autorefresh_timb8XZCWL"
	         data-refresh="120"
	         style="width: 640px;">
	    <p class="wp-caption-text">A view from Troms&oslash; university</p>
	</div>

Which will automatically refresh the live view from Troms&oslash; every 120 seconds


## Multiple images

The shortcode allows for multiple images on one page with different refresh rates.

== Installation ==
1. Unpack \"wp_image_autorefresh.zip\" to the \"/wp-content/plugins/\" directory.
2. Activate the plugin through the \"Plugins\" menu in WordPress.
3. Place shortcode  in your post.


== Frequently Asked Questions ==

= Can I add multiple images in one post? =

Yes, you can sue the shortcode multiple times and set different refresh intervals for each.

== Changelog ==

= 1.3 =
* Added the parameter `query_string` to add any query parameters necessary to load the image

= 1.2 =
* Added height, width and class parameters.

= 1.1 =
* Images are only reloaded when they are in a window which currently has focus.

= 1 =
* Initial release.
