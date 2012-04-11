<div id="sidebar-content">

  <div id="dual-column">
  
    <div class="adblock">
			<?php
			$up_options = upfw_get_options();
			echo $up_options->sidebar_ads;
			?>
    </div>
  
  </div>

	<div id="primary" class="column">
		<ul class="xoxo">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('left-column') ) : // begin primary sidebar widgets ?>
			<li id="search">
				<h3><label for="s"><?php _e('Search'); ?></label></h3>
        <form method="get" action="<?php bloginfo('url'); ?>/">
          <fieldset>
            <input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
            <input type="image" src="<?php bloginfo('template_url'); ?>/images/search-btn.png" name="submit" class="submit"/>
          </fieldset>
        </form>
      </li>

			<li id="pages">
				<h3><?php _e('Pages'); ?></h3>
				<ul>
					<?php wp_list_pages('title_li=&sort_column=post_title' ) ?>
				</ul>
			</li>

			<li id="categories">
				<h3><?php _e('Categories'); ?></h3>
				<ul>
					<?php wp_list_categories('title_li=&show_count=0&hierarchical=1') ?> 
				</ul>
			</li>

			<li id="archives">
				<h3><?php _e('Archives'); ?></h3>
				<ul>
<?php wp_get_archives('type=monthly') ?>

				</ul>
			</li>
<?php endif; // end primary sidebar widgets  ?>
		</ul>
	</div><!-- #primary .aside -->


	<div id="secondary" class="column">
		<ul class="xoxo">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('right-column') ) : // begin  secondary sidebar widgets ?>

<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&show_images=1') ?>

			<li id="rss-links">
				<h3><?php _e('RSS Feeds'); ?></h3>
				<ul>
					<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> Posts RSS feed" rel="alternate" type="application/rss+xml"><?php _e('All posts'); ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> Comments RSS feed" rel="alternate" type="application/rss+xml"><?php _e('All comments'); ?></a></li>
				</ul>
			</li>

			<li id="meta">
				<h3><?php __('Meta') ?></h3>
				<ul>
					<?php wp_register() ?>

					<li><?php wp_loginout() ?></li>
					<?php wp_meta() ?>

				</ul>
			</li>
<?php endif; // end secondary sidebar widgets  ?>
		</ul>
	</div><!-- #secondary .aside -->
</div>