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
	    <p class="wp-caption-text">A view from Tromsø university</p>
	</div>

Which will automatically refresh the live view from Troms&oslash; every 120 seconds


## Multiple images

The shortcode allows for multiple images on one page with different refresh rates.

## Plans for new versions

In version 1.4, I will add parameters to the shortcode to force reload even when the page doesn't have focus (not recommended). 
A parameter to add classes to the div.

