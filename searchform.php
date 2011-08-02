			<form method="get" action="<?php bloginfo('url'); ?>/">
			  <fieldset>
					<input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
					<input type="image" src="<?php bloginfo('template_url'); ?>/images/search-btn.png" name="submit" class="submit"/>
				</fieldset>
			</form>