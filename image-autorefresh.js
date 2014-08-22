/**
 * Created by kvu022 on 8/22/14.
 */

jQuery(document).ready(function(){


    //todo find a better way to determine width
   jQuery('img.image_autorefresh').width(jQuery('#content').width());

    jQuery(document).focus(function(){
        jQuery('img.image_autorefresh').each(function(){
               d = new Date();
               this.attr("src", this.data("src") + "?" + d.getTime());
        });

    });

});