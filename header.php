<?php $up_options = upfw_get_options(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>>
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(); ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<link rel="start" href="<?php bloginfo('url'); ?>" title="Home" />

	<?php wp_head(); ?>

</head>
<?php 
if( $up_options->featured_cat && $up_options->hide_homepage_images == 'no' )
	$body_id = "home";
else
	$body_id = "interior";	
?>
<body id="<?php echo $body_id; ?>" <?php body_class(); ?>>

	<div id="container">
		<div id="header">
	    <?php
			wp_nav_menu( array(
				'theme_location' => 'secondary_nav',
				'menu_class' => 'menu',
				'menu_id' => 'subnav',
				'container' => false,
				'fallback_cb' => 'oldschool_page_menu'
			) );
			
			if( !$up_options->hide_header_images ) :
			
				$thumbs = new WP_Query( 'showposts=10&posts_per_page=10&order=rand' );
				if( $thumbs->have_posts() ) : 
					?>
	
				<ul class="thumbs">
	
				<?php while ( $thumbs->have_posts() ) : $thumbs->the_post(); 
	
					if( has_post_thumbnail() ) :
					?>
					<li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>">
		
						<?php echo the_post_thumbnail( array( 32, 32 ) ); ?>
					
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

			<h1>
				<?php if( get_header_image() ): ?>
				<a href="<?php echo home_url(); ?>">
					<img id="logo" src="<?php header_image(); ?>" alt="<?php bloginfo('description') ?>" />
				</a>
				<?php else: ?>
				<div id="logo">
					<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
					<p class="desc"><?php bloginfo('description'); ?></p>			
				</div>
				<?php endif; ?>
      </h1>
      <?php
			wp_nav_menu( array(
				'theme_location' => 'primary_nav',
				'menu_class' => 'menu',
				'menu_id' => 'nav',
				'container' => false,
				'fallback_cb' => 'oldschool_category_menu'
			) );
			?>

		</div>