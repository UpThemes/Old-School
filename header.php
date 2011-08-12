<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
/* Title Function */
    if(function_exists('up_title')):
        echo "<title>".up_title()."</title>";
    else:
        echo "<title>";
        wp_title('');
        if(!is_home())echo ' - '.get_bloginfo('name');
        echo "</title>";
    endif;
    
    /* SEO */
    do_action('up_seo');
?>
 
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/print.css" media="print" />
<link rel="start" href="<?php bloginfo('url'); ?>" title="Home" />

<!--[if IE 6]>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/DD_belatedPNG.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/ie6.css" media="screen" />
<script type="text/javascript">
DD_belatedPNG.fix("body,#logo,input.s,#maincontent .postwrapper,#sidebar-content .column h3,.commentlist .comment-feed,.commentlist,.commentlist li,#footer h3,.submit,.powered-by,#footertext,.twitter-avatar img");
</script>
<![endif]-->

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/ie7.css" media="screen" />
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php upfw_rss(); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php

global $up_options;

if (is_singular()) {
	wp_enqueue_script( 'comment-reply' );
}

?>

<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/menu.js"></script>

<?php wp_head(); ?>

</head>
<body <?php if (is_home()) { ?>id="home"<?php } else { ?>id="interior" class="<?php echo $post->post_name; ?>"<?php } ?>>

  <div id="container">
		<div id="header">
	        <?php
			
			if(function_exists('wp_nav_menu')):
							   
			wp_nav_menu(array(
				'theme_location' => 'secondary_nav',
				'menu_class' => 'menu',
				'menu_id' => 'subnav',
				'container' => false,
				'fallback_cb' => 'up_page_menu'
			));
			
			else: ?>
        	<?php up_page_menu( 'pages', 8 ); ?>
            <?php endif; ?>
            
            <?php
			
			if( !$up_options->hide_header_images ):
			
				$thumbs = new WP_Query('showposts=10&posts_per_page=10&order=rand');
				if($thumbs->have_posts()): 
				?>
	
				<ul class="thumbs">
	
				<?php while ($thumbs->have_posts()) : $thumbs->the_post(); 
	
					if(has_post_thumbnail()):
					?>
					<li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>">
		
						<?php echo the_post_thumbnail(array(32,32)); ?>
					
					</a></li>
					<?php
					endif;
	
				endwhile;
				?>
				</ul>
				<?php
				endif;
				
			endif;
				
			?>
            
			<h1><a href="<?php bloginfo('url'); ?>">
            	<?php if($up_options->logo): ?>
                	<img id="logo" src="<?php echo $up_options->logo; ?>" alt="<?php bloginfo('name'); ?>" /></a>
                <?php else: ?>
                	<img id="logo" src="<?php bloginfo('stylesheet_directory') ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
                
                <?php endif; ?>
            </h1>
	        <?php
			if(function_exists('wp_nav_menu')):
							   
			wp_nav_menu(array(
				'theme_location' => 'primary_nav',
				'menu_class' => 'menu',
				'menu_id' => 'nav',
				'container' => false,
				'fallback_cb' => 'up_category_menu'
			));
			
			else: ?>
        	<?php up_category_menu(); ?>
            <?php endif; ?>

		</div>