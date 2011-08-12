<?php

wp_enqueue_script('jquery');

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

function widgets_init() {
	if ( !function_exists('register_sidebars') )
		return;

	// Register Widgetized areas.
	// Area 1
    register_sidebar(array(
       	'name' => 'Left Column',
       	'id' => 'left-column',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

	// Area 2
    register_sidebar(array(
       	'name' => 'Right Column',
       	'id' => 'right-column', 
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

	// Area 2
    register_sidebar(array(
       	'name' => 'Footer',
       	'id' => 'footer', 
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));

	add_theme_support( 'nav-menus' );
	
	if(function_exists('register_nav_menu')):
	
		register_nav_menu( 'primary_nav' , 'Primary Navigation' );
		register_nav_menu( 'secondary_nav' , 'Secondary Navigation' );
	
	endif;

}

function up_page_menu(){
	
	echo "<ul id='subnav'>";

	wp_list_pages('title_li=');
	echo '<li class="search">';
	include('searchform.php');
	echo '</li>';
		
	echo "</ul>";
		

}

function up_category_menu(){
	
	echo "<ul id='nav' class='menu'>";

	wp_list_categories('title_li=');
		
	echo "</ul>";
		

}

// Runs our code at the end to check that everything needed has loaded
add_action( 'init', 'widgets_init' );

add_theme_support('post-thumbnails');

add_image_size('featured-slider',980,240,1);
add_image_size('featured-thumb',300,250,1);
add_image_size('post-image',180,180,1);

// Bootstrap the UpThemes Framework
include("admin/admin.php");

?>