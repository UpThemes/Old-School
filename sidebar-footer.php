<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : // begin primary sidebar widgets ?>
			<li id="search">
				<h3><label for="s"><?php _e('Search'); ?></label></h3>
				<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="20" tabindex="1" />
						<input id="searchsubmit" name="searchsubmit" type="submit" value="Search" tabindex="2" />
					</div>
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