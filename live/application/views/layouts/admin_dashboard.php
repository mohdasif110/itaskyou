<!DOCTYPE html>
<html lang="en" ng-app="itaskyou" >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I Task Yoou | Administrator </title>
	
	<!-- Bootstrap -->
    <link href="<?php echo base_url('theme'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('theme'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('theme'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('theme'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url('theme'); ?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url('theme'); ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url('theme'); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url('theme'); ?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('theme'); ?>/build/css/custom.min.css" rel="stylesheet">
	
	<!-- End of Bootstrap-->
	<!-- Angular --->
	<script src="<?php echo base_url('assets/js/angularjs') ?>/angular.min.js"></script>
	<script src="<?php echo base_url('assets/js/angularjs') ?>/lib/dirPagination.js"></script>
	<script src="<?php echo base_url('assets/js/angularjs') ?>/ng_app.js"></script>
	<!-- End of Angular-->
</head>
  <body class="nav-md">
    <div class="container body"  >
      <div class="main_container">
		<?php render_side_bar();?>
		<?php render_top_bar(); ?>
		<!--div id="laodView"></div-->
		<?php $this->load->view("admin/".$view ,$mydata);?>
	<!-- jQuery -->
    <script src="<?php echo base_url('theme'); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('theme'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('theme'); ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('theme'); ?>/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('theme'); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('theme'); ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
	<!--script src="<?php echo base_url('theme'); ?>/js/moment/moment.min.js"></script>
    <script src="<?php echo base_url('theme'); ?>/js/datepicker/daterangepicker.js"></script-->
	<!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url('theme'); ?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url('theme'); ?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url('theme'); ?>/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url('theme'); ?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url('theme'); ?>/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('theme'); ?>/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url('theme'); ?>/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url('theme'); ?>/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url('theme'); ?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url('theme'); ?>/vendors/starrr/dist/starrr.js"></script>
    
	<script src="<?php echo base_url('theme'); ?>/bootbox.min.js"></script>
	
	<!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('theme'); ?>/build/js/custom.js"></script>


	
	<?php $this->load->view("layouts/modals/adminprofile");?>
	
	
	
	
</body>
</html>