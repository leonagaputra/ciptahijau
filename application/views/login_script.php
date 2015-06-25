<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
        <script src="<?php echo $base_url;?>js/jquery-1.10.1.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>js/jquery-migrate-1.2.1.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo $base_url;?>js/jquery-ui/jquery-ui-1.10.1.custom.min.js?v=<?php echo $version;?>" type="text/javascript"></script>      
	<script src="<?php echo $base_url;?>js/bootstrap-L.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="js/excanvas.min.js"></script>
	<script src="js/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo $base_url;?>js/jquery.slimscroll.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>js/jquery.blockui.min.js?v=<?php echo $version;?>" type="text/javascript"></script>  
	<script src="<?php echo $base_url;?>js/jquery.cookie.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo $base_url;?>js/jquery.validate.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>js/jquery.backstretch.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>js/select2.min.js?v=<?php echo $version;?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo $base_url;?>js/app.js?v=<?php echo $version;?>" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>js/login-soft.js?v=<?php echo $version;?>" type="text/javascript"></script>      
        <script src="<?php echo $base_url;?>js/main_function.js?v=<?php echo $version;?>" type="text/javascript"></script>      
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
            main.base_url = "<?php echo $base_url;?>";
            main.base_app = "<?php echo $base_app;?>"; 
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->