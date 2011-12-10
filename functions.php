<?php


function oldschool_setup_theme() {

	add_theme_support( 'nav-menus' );
	
	register_nav_menus( array(
		'primary_nav' => 'Primary Navigation',
		'secondary_nav' => 'Secondary Navigation'
	) );

	add_theme_support('post-thumbnails');

	add_image_size('featured-slider',980,240,1);
	add_image_size('featured-thumb',300,250,1);
	add_image_size('post-image',180,180,1);
}
add_action( 'after_setup_theme', 'oldschool_setup_theme' );


function oldschool_widgets_init() {

	// Register Widgetized areas.
	// Area 1
    register_sidebar( array(
       	'name' => 'Left Column',
       	'id' => 'left-column',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ) );

	// Area 2
    register_sidebar( array(
       	'name' => 'Right Column',
       	'id' => 'right-column', 
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ) );

	// Footer
    register_sidebar( array(
       	'name' => 'Footer',
       	'id' => 'footer-area', 
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ) );
}
add_action( 'widgets_init', 'oldschool_widgets_init' );


function oldschool_enqueue_styles() {

	// Define stylesheet path
	$oldschool_css_path = get_template_directory_uri( '/' );
	// Enqueue print stylesheet
	wp_enqueue_style(
		'oldschool-print',
		$oldschool_css_path . '/print.css',
		array(),
		false,
		'print'
	);
	// Enqueue IE6 stylesheet
	wp_enqueue_style(
		'oldschool-ie6',
		$ap_css_path . '/css/ie6.css',
		array(),
		false,
		'screen'
	);
	// Enqueue IE7 stylesheet
	wp_enqueue_style(
		'oldschool-ie7',
		$ap_css_path . '/css/ie7.css',
		array(),
		false,
		'screen'
	);
	// Add IE conditionals
	global $wp_styles;
	$wp_styles->add_data( 'oldschool-ie6', 'conditional', 'IE 6' );
	$wp_styles->add_data( 'oldschool-ie7', 'conditional', 'IE 7' );
}
add_action( 'wp_enqueue_scripts', 'oldschool_enqueue_styles' );


function oldschool_enqueue_scripts() {
	if ( ! is_admin() ) {
		// Enqueue jQuery
		wp_enqueue_script('jquery');
		// Enqueue custom menu script
		wp_enqueue_script(
			'oldschool-menu',
			get_template_directory_uri() . '/js/menu.js',
			array( 'jquery' )
		);
		// Enqueue comment-reply script
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'oldschool_enqueue_scripts' );


function oldschool_filter_body_class( $classes ) {
	if ( is_singular() ) {
		global $post;
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'oldschool_filter_body_class' );



function above_content_ads(){
	global $up_options;
    if($up_options->above_content_ads){ ?>
    <div class="adspot">
      <?php echo $up_options->above_content_ads; ?> 
    </div>
    <?php } 
}


function below_content_ads(){
	global $up_options;
    if($up_options->below_content_ads){ ?>
    <div class="adspot">
      <?php echo $up_options->below_content_ads; ?> 
    </div>
    <?php }
}


function oldschool_page_menu(){
	
	echo "<ul id='subnav'>";

	wp_list_pages('title_li=');
	echo '<li class="search">';
	include('searchform.php');
	echo '</li>';
		
	echo "</ul>";
		

}

function oldschool_category_menu(){
	
	echo "<ul id='nav' class='menu'>";

	wp_list_categories('title_li=');
		
	echo "</ul>";
		

}

// Bootstrap the UpThemes Framework
include("admin/admin.php");

?>