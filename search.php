<?php get_header(); ?>

  <div id="main" class="clearfix">
  
    <div id="maincontent">
    
		<?php above_content_ads(); ?>
    
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2 class="pagetitle"><?php _e('Search Results'); ?></h2>

		<?php if(has_post_thumbnail()) $has_post_thumbnail = true; ?>
        
        <div id="post-<?php the_ID(); ?>" class="postwrapper clearfix <?php if($has_post_thumbnail) echo "has-post-thumbnail"; ?>">
			<?php 
			if($has_post_thumbnail):
				echo '<div class="leadin">';
				echo the_post_thumbnail('post-image');
				echo '</div>';
			endif;
			?>
            
            <div class="post_content">
                
                <h1 class="post"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
                <div class="metadata">
                	<span class="comments"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span><?php the_time('F j, Y'); ?> <?php edit_post_link('(edit)'); ?>
                </div>
                
                <?php echo the_content('Continue Reading &raquo;'); ?>     
                
                <?php if (function_exists('the_tags')) { ?>
                    <?php the_tags('<div class="tags">Tags: ', ', ', '</div>'); ?>
                <?php } ?>
                </div>
                
			</div>
		<?php endwhile; ?>

		<?php else : ?>
			<h1><?php _e('Not Found'); ?></h1>
			<p><?php _e('Sorry, but you are looking for something that is not here.'); ?></p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			<div class="postmeta"></div>
		<?php endif; ?>

			<?php below_content_ads(); ?>

			<div class="navigation">
				<?php posts_nav_link('&#8734;','Go Forward In Time &raquo;','&laquo; Go Back in Time'); ?>
			</div>
    </div>
      
	  <?php get_sidebar() ?>

  </div>

<?php get_footer(); ?>