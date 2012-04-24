<?php

require_once('admin/admin.php');
require_once('theme-options/ad-management.php');
require_once('theme-options/general-settings.php');

function oldschool_setup_theme() {

	add_theme_support( 'nav-menus' );
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	
	register_nav_menus( array(
		'primary_nav' => 'Primary Navigation',
		'secondary_nav' => 'Secondary Navigation'
	) );

	add_image_size('featured-slider',980,240,1);
	add_image_size('featured-thumb',300,250,1);
	add_image_size('post-image',180,180,1);
	
}
add_action( 'after_setup_theme', 'oldschool_setup_theme' );

function oldschool_init(){

	register_default_headers( array (
		'default' => array (
			'url' => '%s/images/logo.png',
			'thumbnail_url' => '%s/images/logo.png',
			'description' => __( 'Old School Logo', 'oldschool' ) )
		)
	);

	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'oldschool_header_image_width', 227 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'oldschool_header_image_height',	54 ) );
	define( 'HEADER_TEXTCOLOR', apply_filters( 'oldschool_header_image_textcolor', "#ff4a4b" ) );
	
	add_custom_image_header('', 'oldschool_header_image_style','oldschool_header_image_style_admin');

	function oldschool_header_image_style(){
		echo "<style type='text/css'>";
		echo "#logo a{";
		echo "height: " . HEADER_IMAGE_HEIGHT . "px";
		echo "width: " . HEADER_IMAGE_WIDTH . "px";
		echo "background-image:"; header_image(); echo ";"; 
		echo "}";
		echo "</style>";

	}

	function oldschool_header_image_style_admin(){
		echo "<style type='text/css'>";
		echo "#logo{";
		echo "margin-bottom: 0.3em;";
		echo "}";
		echo "#logo a{";
		echo "height: " . HEADER_IMAGE_HEIGHT . "px";
		echo "width: " . HEADER_IMAGE_WIDTH . "px";
		echo "background-image:"; header_image(); echo ";"; 
		echo "font-family: Neuton;";
		echo "color: #ff4a4b;";
		echo "font-size: 53px;";
		echo "font-weight: normal;";
		echo "text-decoration: none;";
		echo "}";
		echo "p.desc{";
		echo "text-transform: uppercase;";
		echo "font-family: Neuton;";
		echo "font-size: 17px;";
		echo "color: #6b6666;";
		echo "}";
		echo "</style>";
		echo "<h1 id='logo'><a href=" . get_bloginfo('url') . ">" . get_bloginfo('name') . "</a></h1>";
		echo "<p class='desc'>" . get_bloginfo('description') . "</h1>";

	}

}
add_action( 'after_setup_theme', 'oldschool_init' );

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

function oldschool_no_posts() {
	?>
<h1><?php _e( 'Not Found', 'oldschool' ); ?></h1>
<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'oldschool' ); ?></p>
<?php get_search_form(); ?>
<div class="postmeta"></div>
	<?php
}

function oldschool_above_content_ads(){
	$up_options = upfw_get_options();
    if($up_options->above_content_ads){ ?>
    <div class="adspot">
      <?php echo $up_options->above_content_ads; ?> 
    </div>
    <?php } 
}

function oldschool_below_content_ads(){
	$up_options = upfw_get_options();
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

?>