<!-- jQuery -->
<script src="<?php echo $base_url; ?>js/jquery-1.11.3.min.js?v=<?php echo $version; ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $base_url; ?>js/bootstrap.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/main_function.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/summernote.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/about_us.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/services.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/testimonial.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/jquery.dataTables.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/dataTables.tableTools.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php echo $base_url; ?>js/jquery.validate.min.js?v=<?php echo $version;?>" type="text/javascript"></script>
<!--<script src="<?php //echo $base_url; ?>js/jquery-ui.min.js?v=<?php //echo $version; ?>"></script> -->
<script src="<?php echo $base_url;?>js/iosOverlay.js?v=<?php echo $version;?>"></script>    
<script src="<?php echo $base_url;?>js/spin.min.js?v=<?php echo $version;?>"></script>    

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.js"></script>
<!-- Latest compiled and minified Locales -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/locale/bootstrap-table-en-US.min.js"></script>


<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.js"></script>-->

<!-- Latest compiled and minified Locales -->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/locale/bootstrap-table-zh-CN.min.js"></script>-->

<script type="text/javascript">
    main.base_url = "<?php echo $base_url; ?>";
    main.base_app = "<?php echo $base_app; ?>";
    $(document).ready(function () {
        $('.summernote').summernote();
        //$('#services_desc').summernote();
        
        //$('#detail_testimonial').dataTable();

//        $('#detail_testimonial').dataTable({
//            "processing": true,
//            "serverSide": true,
//            "ajax": "scripts/objects.php",
//            "columns": [
//                {"data": "first_name"},
//                {"data": "last_name"},
//                {"data": "position"},
//                {"data": "office"},
//                {"data": "start_date"},
//                {"data": "salary"}
//            ]
//        });

        $('#information_form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
                
        $("#proj_table").bootstrapTable({}).on('click-row.bs.table', function (e, row, $element) {
                alert('Event: click-row.bs.table, data: ' + JSON.stringify(row));
            });
    });
</script>