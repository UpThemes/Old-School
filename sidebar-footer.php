<?php if ( ! dynamic_sidebar( 'footer-area' ) ) : // begin footer sidebar widgets ?>
			<li id="search">
				<h3><label for="s"><?php _e('Search'); ?></label></h3>
				<?php get_search_form(); ?>
			</li>

			<li id="pages">
				<h3><?php _e('Pages'); ?></h3>
				<ul>
					<?php wp_list_pages('title_li=&sort_column=post_title' ); ?>
				</ul>
			</li>

			<li id="categories">
				<h3><?php _e('Categories'); ?></h3>
				<ul>
					<?php wp_list_categories('title_li=&show_count=0&hierarchical=1'); ?> 
				</ul>
			</li>

			<li id="archives">
				<h3><?php _e('Archives'); ?></h3>
				<ul>
					<?php wp_get_archives('type=monthly') ?>
				</ul>
			</li>
<?php endif; // end footer sidebar widgets  ?>