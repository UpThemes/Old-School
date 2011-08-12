<?php
/*  Array Options:
   
   name (string)
   desc (string)
   id (string)
   type (string) - text, color, image, select, multiple, textarea, page, pages, category, categories
   value (string) - default value - replaced when custom value is entered - (text, color, select, textarea, page, category)
   options (array)
   attr (array) - any form field attributes
   url (string) - for image type only - defines the default image
    
*/

$options = array (

		array(	"name" => "Sidebar Ad Code",
						"desc" => "Please insert ad code for top sidebar ad spot.",
						"id" => "sidebar_ads",
						"type" => "textarea"),
		
		array(	"name" => "Above Content Ad Code",
						"desc" => "Please insert ad code for above content ad spot.",
						"id" => "above_content_ads",
						"type" => "textarea"),
		
		array(	"name" => "Below Content Ad Code",
						"desc" => "Please insert ad code for below content ad spot.",
						"id" => "below_content_ads",
						"type" => "textarea"),
		
		array(	"name" => "Footer Ad Code",
						"desc" => "Please insert ad code for top of footer ad spot.",
						"id" => "footer_ads",
						"type" => "textarea")
);

/* ------------ Do not edit below this line ----------- */

//Check if theme options set
global $default_check;
global $default_options;

if(!$default_check):
    foreach($options as $option):
        if($option['type'] != 'image'):
            $default_options[$option['id']] = $option['value'];
        else:
            $default_options[$option['id']] = $option['url'];
        endif;
    endforeach;
    $update_option = get_option('up_themes_'.UPTHEMES_SHORT_NAME);
    if(is_array($update_option)):
        $update_option = array_merge($update_option, $default_options);
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $update_option);
    else:
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $default_options);
    endif;
endif;

render_options($options);

?>