<?php 

get_header();
global $up_options;

?>

		<div id="main" class="clearfix">
			<div id="maincontent">
      
			<?php above_content_ads(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div>
        <h1 class="post"><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
       
			<?php endwhile; ?>
      
      <?php else : ?>
        <h1><?php _e('Not Found'); ?></h1>
        <p><?php _e('Sorry, but you are looking for something that is not here.'); ?></p>
        <?php include (TEMPLATEPATH . "/searchform.php"); ?>
        <div class="postmeta"></div>
      <?php endif; ?>
      
			<?php below_content_ads(); ?>

    </div>
      
	<?php get_sidebar() ?>

    </div>
<?php get_footer() ?>