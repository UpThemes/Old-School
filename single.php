<?php 

get_header();
$up_options = upfw_get_options();

?>
<div id="main" class="clearfix">
  <div id="maincontent">
    
    	<?php oldschool_above_content_ads(); ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div>
        
          <?php 
					if(get_post_meta(get_the_ID(), 'thumbnail', true)){
            echo '<div class="leadin">';
						echo '<img alt="' . get_the_title() . '" src="' . get_bloginfo('stylesheet_directory') . '/timthumb/timthumb.php?src=' . get_post_meta(get_the_ID(), 'thumbnail', true) . '&w=480&h=200&zc=0"	 />';
						echo '</div>';
					}
					?>
    	    <h1 class="post"><a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>       
    			  <div class="posted"><?php _e('Posted on'); ?> <span><?php the_time('l, F j, Y'); ?></span> in <span><?php the_category(', ') ?></span></div>
      			<?php the_content(); ?>
      			<?php if (function_exists('the_tags')) { ?>
      				<?php the_tags('<div class="tags">Tags: ', ', ', '</div>'); ?>
    	  		<?php } ?>
  			  <div class="postmeta"><?php _e('Filed in'); ?> <?php the_category(', ') ?> <?php edit_post_link('Edit', ' | '); ?></div>
          <div class="navigation">
            <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
            <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
          </div>
          
      <?php comments_template(); ?>
      
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