<?php get_header(); ?>    

<div id="main" class="clearfix">
  
  	<div id="maincontent">
		<h1><?php _e('Error 404: Page Not Found'); ?></h1>       
		<p><?php _e('Sorry, but it looks like the page you were looking for is not here. Why not try a search below?'); ?></p>
		<?php get_search_form(); ?>
    </div>
	  
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>