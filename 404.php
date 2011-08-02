<?php get_header() ?>    

  <div id="main" class="clearfix">
  
  	<div id="maincontent">
			<h1><?php _e('Error 404: Page Not Found'); ?></h1>       
			<p><?php _e('Sorry, but it looks like the page you wanted is not here. Why not try a search below?'); ?></p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
    </div>
	  
    <?php get_sidebar() ?>

  </div>

<?php get_footer() ?>