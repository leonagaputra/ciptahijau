<!-- jQuery -->
    <script src="<?php echo $base_url;?>js/jquery-1.11.3.min.js?v=<?php echo $version;?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $base_url;?>js/bootstrap.min.js?v=<?php echo $version;?>"></script>
    <script src="<?php echo $base_url;?>js/main_function.js?v=<?php echo $version;?>"></script>
    <script src="<?php echo $base_url;?>js/summernote.min.js?v=<?php echo $version;?>"></script>
    <script src="<?php echo $base_url;?>js/about_us.js?v=<?php echo $version;?>"></script>
    <script src="<?php echo $base_url;?>js/services.js?v=<?php echo $version;?>"></script>
    <script type="text/javascript">
        main.base_url = "<?php echo $base_url;?>";
        main.base_app = "<?php echo $base_app;?>";        
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>