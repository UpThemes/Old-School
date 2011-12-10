<?php 
global $up_options;
$featured_thumb_query_args = array(
	'showposts' => 3,
	'cat'		=> get_cat_id( $up_options->featured_cat )
);
$featured_thumb_query = new WP_Query( $featured_thumb_query_args );
//query_posts('showposts=3&cat=' . get_cat_id($up_options->featured_cat));
if( $featured_thumb_query->have_posts() ) : 
?>

<ul class="featured-thumbs">

<?php while ( $featured_thumb_query->have_posts() ) : $featured_thumb_query->the_post(); 	

	if( has_post_thumbnail() ) :
		?>
		<li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>">

		<?php echo the_post_thumbnail( 'featured-thumb' ); ?>
	
		</a></li>
		<?php
	endif;

endwhile;
?>
</ul>
<?php
endif;
wp_reset_postdata();
//wp_reset_query();
?>