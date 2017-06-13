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
<?php wp_footer(); 
$consolelog = "";
if (isset($wpNyarukoOption['wpNyarukoConsoleLog']) && $wpNyarukoOption['wpNyarukoConsoleLog'] != "") {
  $consolelog = $wpNyarukoOption['wpNyarukoConsoleLog'];
}
if($wpNyarukoOption['wpNyarukoConsoleLogT']!='') {
  $pageetime=microtime(true);
  $pagetotal=($pageetime-$GLOBALS['pagestime'])*1000;
  $consolelog=$consolelog.' '.sprintf("%.4f", $pagetotal).' ms';
}
if ($consolelog != "") {
  echo "<script language='javascript' type='text/javascript'>console.log('".$consolelog."');</script>";
}
?>
</body>
</html>