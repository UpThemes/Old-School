<?php global $up_options; ?>
	
  </div>
  <div id="footer">
    <div class="adspot">
      <?php echo $up_options->footer_ads; ?> 
    </div>
    <div class="inner">
      <ul>
        <?php get_sidebar('footer'); ?>
      </ul>
    </div>
    <div class="clearboth"></div>
    <div id="footertext" class="inner">
      <div class="powered-by"><?php _e('Powered by WordPress.'); ?></div>
      <?php echo $up_options->footer_text; ?>
    </div>
  </div>
  
  <?php wp_footer() ?>
  
</body>
</html>