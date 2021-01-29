<footer>
<?php 
	$tb_themeoptions = !is_array(get_option("tb_longwave_theme_footer_options")) ?  get_option("tb_longwave_theme_general_options") : array_merge(get_option("tb_longwave_theme_general_options"),get_option("tb_longwave_theme_footer_options"));?>
<?php if(isset($tb_themeoptions["tb_longwave_footer"])){ //footer on/off ?>
<!-- Begin Footer -->
<!-- Begin Footer Wrapper -->
 <div class="footer-wrapper"> 
	<!-- Begin Inner -->
	<div class="inner">
	    <div class="one-third widget">
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot Left") ) : ?>
				<h3 class="widget-title colored">Footer Widget Slot Left</h3>
	            <p>
	            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer Widget Slot Left
	            </p>
		    <?php endif; ?>
	    </div>
	    <div class="one-third widget">
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot Center") ) : ?>
				<h3 class="widget-title colored">Footer Widget Slot Center</h3>
	            <p>
	            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer Widget Slot Center
	            </p>
		   <?php endif; ?>
	    </div>
	    <div class="one-third widget last">
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot Right") ) : ?>
				<h3 class="widget-title colored">Footer Widget Slot Right</h3>
	            <p>
	            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer Widget Slot Right
	            </p>
		    <?php endif; ?>    
		</div>
		<div class="clear"></div>
  </div>
</div>
<!-- End Footer --> 
<?php }
 
if(isset($tb_themeoptions["tb_longwave_subfooter"])){ //subfooter on/off ?>
<!-- Begin Sub Footer Wrapper -->
  <div class="subfooter-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner">
		<div class="subfooter-left">      
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("SubFooter Widget Left") ) : ?>
				<p>Widget in <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> SubFooter Widget Left</p>
		    <?php endif; ?>
		</div>
		<div class="subfooter-right">      
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("SubFooter Widget Right") ) : ?>
				<p>Widget in <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> SubFooter Widget Right</p>
		    <?php endif; ?>
		</div>
    </div>
	<div class="clear"></div>
</div>
<!-- Begin Inner --> 
</div>
<!-- End Sub Footer Wrapper --> 
  
</div>
<!-- End Body Wrapper --> 
<?php } ?>
</footer>
<?php echo $tb_themeoptions["tb_longwave_analytics"];
wp_footer(); ?>
</body>
</html>