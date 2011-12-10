<form method="get" action="<?php echo home_url(); ?>/">
	<fieldset>
		<input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
		<input type="image" src="<?php echo get_template_directory_uri(); ?>/images/search-btn.png" name="submit" class="submit" />
	</fieldset>
</form>