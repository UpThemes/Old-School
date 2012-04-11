<?php

$thistab = array(
	"name" => "general_settings",
	"title" => __("General Settings","upfw"),
	'sections' => array(
		'general_settings' => array(
			'name' => 'general_settings',
			'title' => __( 'General Settings', 'upfw' ),
			'description' => __( 'Settings that control various bits of functionality on your website.','upfw' )
		)
	)
);

$options = array(
	
	'featured_cat' => array(
		'tab' => $thistab['name'],
		"name" => "featured_cat",
		"title" => "Featured Category",
		'description' => __( 'Select the category that will be be used for the featured items on the homepage.', 'oldschool' ),
		'section' => 'general_settings',
		'default' => 'uncategorized',
		'since' => '1.0',
	    "id" => "general_settings",
	    "type" => "category"
	),'hide_header_images' => array(
		'tab' => $thistab['name'],
		"name" => "hide_header_images",
		"title" => "Hide Header Images?",
		'description' => __( 'Do you want to hide the header images under the secondary navigation?', 'storefrontal' ),
		'section' => 'general_settings',
		'since' => '1.0',
	    "id" => "general_settings",
	    "type" => "select",
	    "default" => "yes",
			"valid_options" => array(
				'yes' => array(
					"name" => "yes",
					"title" => __( 'Yes', 'oldschool' )
				),
				'no' => array(
					"name" => "no",
					"title" => __( 'No', 'oldschool' )
				)
			)
	),'hide_homepage_images' => array(
		'tab' => $thistab['name'],
		"name" => "hide_homepage_images",
		"title" => "Hide Homepage Images?",
		'description' => __( 'Do you want to hide the homepage images under the primary navigation?', 'storefrontal' ),
		'section' => 'general_settings',
		'since' => '1.0',
	    "id" => "general_settings",
	    "type" => "select",
	    "default" => "yes",
			"valid_options" => array(
				'yes' => array(
					"name" => "yes",
					"title" => __( 'Yes', 'oldschool' )
				),
				'no' => array(
					"name" => "no",
					"title" => __( 'No', 'oldschool' )
				)
			)
	),'feedburner' => array(
		'tab' => $thistab['name'],
		"name" => "feedburner",
		"title" => "Feedburner",
		'description' => __( 'Add your username to redirect RSS feeds to Feedburner.', 'oldschool' ),
		'section' => 'general_settings',
		'since' => '1.0',
	    "id" => "general_settings",
	    "type" => "text"
	),'footer_text' => array(
		'tab' => $thistab['name'],
		"name" => "footer_text",
		"title" => "Footer Text",
		'description' => __( 'Enter the text you\'d like to have in the footer.', 'oldschool' ),
		'default' => "&copy; Copyright ".date('Y').' - '.get_bloginfo('name'),
		'section' => 'general_settings',
		'since' => '1.0',
	    "id" => "general_settings",
	    "type" => "textarea"
	)

);

register_theme_options($options);
register_theme_option_tab($thistab);

?>