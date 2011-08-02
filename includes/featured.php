            <?php 
			global $up_options;
			query_posts('showposts=3&cat=' . get_cat_id($up_options->featured_cat));
            if(have_posts()): 
            ?>

            <ul class="featured-thumbs">

            <?php while (have_posts()) : the_post(); 

				if(has_post_thumbnail()):
	            ?>
	            <li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>">
	
					<?php echo the_post_thumbnail('featured-thumb'); ?>
	            
				</a></li>
				<?php
				endif;

            endwhile;
			?>
            </ul>
            <?php
			endif;
			wp_reset_query();
			?>