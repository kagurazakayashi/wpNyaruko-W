	<!-- Footer -->
<!--</div>-->
<?php $wpNyarukoOption = get_option('wpNyaruko_options'); ?>
	<div id="foot" class="bannerimgs">
      <div id="bannertw"></div>
      <div id="footbox">
				<p><?php echo $wpNyarukoOption['wpNyarukoFooter']; ?></p>
      </div>
  </div>
</div>
<!--end wrapper-->
<?php wp_footer(); ?>
</body>
</html>