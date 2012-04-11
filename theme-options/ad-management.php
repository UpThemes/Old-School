<?php

$thistab = array(
	"name" => "ad_management",
	"title" => __("Ad Management","upfw"),
	'sections' => array(
		'ad_management' => array(
			'name' => 'ad_management',
			'title' => __( 'Ad Management', 'upfw' ),
			'description' => __( 'These settings control ads throughout the website.','upfw' )
		)
	)
);

$options = array(
	
	'sidebar_ads' => array(
		'tab' => $thistab['name'],
		"name" => "sidebar_ads",
		"title" => "Sidebar Ad Code",
		'description' => __( 'Please insert ad code for top sidebar ad spot.', 'storefrontal' ),
		'section' => 'ad_management',
		'since' => '1.0',
	    "id" => "ad_management",
	    "type" => "textarea"
	),'above_content_ads' => array(
		'tab' => $thistab['name'],
		"name" => "above_content_ads",
		"title" => "Above Content Ads",
		'description' => __( 'Please insert ad code for ads above the content.', 'storefrontal' ),
		'section' => 'ad_management',
		'since' => '1.0',
	    "id" => "ad_management",
	    "type" => "textarea"
	),'below_content_ads' => array(
		'tab' => $thistab['name'],
		"name" => "below_content_ads",
		"title" => "Below Content Ads",
		'description' => __( 'Please insert ad code for ads below the content.', 'storefrontal' ),
		'section' => 'ad_management',
		'since' => '1.0',
	    "id" => "ad_management",
	    "type" => "textarea"
	),'footer_ads' => array(
		'tab' => $thistab['name'],
		"name" => "footer_ads",
		"title" => "Footer Ad Code",
		'description' => __( 'Please insert ad code for footer ads.', 'storefrontal' ),
		'section' => 'ad_management',
		'since' => '1.0',
	    "id" => "ad_management",
	    "type" => "textarea"
	)

);

register_theme_options($options);
register_theme_option_tab($thistab);

?>