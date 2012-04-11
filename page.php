<?php 

get_header();
$up_options = upfw_get_options();

?>
<div id="main" class="clearfix">
	<div id="maincontent">
      
		<?php oldschool_above_content_ads(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div>
				<h1 class="post"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
       
			<?php endwhile; ?>
      
		<?php else : ?>

			<?php oldschool_no_posts(); ?>

		<?php endif; ?>
      
		<?php oldschool_below_content_ads(); ?>

    </div>
      
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>