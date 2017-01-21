<!DOCTYPE html>
<html lang="en" ng-app="itaskyou">
<?php 

 $sessionData						=	$this->session->userdata('logged_in');	
 
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I Task You | Administrator </title>
	
	<link href="<?php echo base_url('theme'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('theme'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<?php if(isset($sessionData->userID) && $sessionData->userID!=''){ ?>
	
	<!-- Bootstrap -->
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
    <link href="<?php echo base_url('theme'); ?>/build/css/custom.css" rel="stylesheet">
	
	<!--link rel="stylesheet" href="<?php echo base_url() ?>/node_modules/angular-material/angular-material.css"-->
	
	<!-- End of Bootstrap-->
	<!-- Angular --->
	
	<link href="<?php echo base_url('assets/css') ?>/angular-growl.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css') ?>/ngDialog/ngDialog.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css') ?>/ngDialog/ngDialog-theme-default.css">
	<script src="<?php echo base_url('assets/js/angularjs') ?>/angular.min.js"></script>
	<script src="<?php echo base_url('assets/js') ?>/ngDialog/ngDialog.js"></script>
	<!--script src="<?php echo base_url() ?>/node_modules/angular-aria/angular-aria.js"></script>
    <script src="<?php echo base_url() ?>/node_modules/angular-animate/angular-animate.js"></script>
    <script src="<?php echo base_url() ?>/node_modules/angular-material/angular-material.js"></script-->
	<script src="<?php echo base_url('assets/js/angularjs') ?>/lib/dirPagination.js"></script>
	<script src="<?php echo base_url('assets/js/angularjs') ?>/angular-growl.min.js"></script>
	<script src="<?php echo base_url('assets/js/angularjs') ?>/ng_app.js"></script>
	<!-- End of Angular-->
	<?php } ?>
	<script src="<?php echo base_url('theme'); ?>/vendors/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url('theme'); ?>/vendors/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url('theme'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
 </head>


<?php 

if(isset($sessionData->userID) && $sessionData->userID!=''){ ?>
 <body class="nav-md" >
 

	<div class="container body">
      <div class="main_container">
		<?php render_side_bar();?>
		<?php render_top_bar(); ?>
		<!--div id="laodView"></div-->
		<?php $this->load->view("admin/".$view ,$mydata);?>
	<!-- jQuery -->

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
	<input type="hidden" name="admin_base_url" id="admin_base_url" value="<?php echo base_url('admin'); ?>/" />

<style>	
	#ajaxspiner {  
    position:absolute;
    top:0;
    left:0;
    width:100%;
	height:100%;
	z-index:1000;
    background-color:white;
    opacity: .8;
	
 }
.ajax-loader {
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -32px; /* -1 * image width / 2 */
    margin-top: -32px;  /* -1 * image height / 2 */
    display: block;     
}
</style>

<div id="ajaxspiner">
	<img  src="<?php echo base_url('assets/images'); ?>/gears.gif" class="ajax-loader"/>
</div>

<script>
$(window).load(function(){
	$('#ajaxspiner').fadeOut();
});
</script>	

	<div class="modal fade" id="load_page_action2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-body">
				
				<b>Your session has expired, please re-logon.<a style="color:red" href="<?php echo base_url(); ?>admin/dashboard/logout">Login</a></b>    
			
			</div>
		 </div>
		</div>
	</div>
<?php
	$this->load->view('layouts/includes/popup');
?>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});
</script>
<script>

$(window).load(function(){
	
	setTimeout(function(){checkAuth()}, 5000);
	function checkAuth(){
		$.ajax({ 
			url: '<?php echo base_url('admin/authentication'); ?>',
			success: function (response) {
				
				if(response=='N'){
					
					$('#load_page_action2').modal();
				}
			}
		});
	  }
  });

</script>
 
 
</body>
<?php }else{ ?>

<style>	
	
	#ajaxspiner {  
    position:absolute;
    top:0;
    left:0;
    width:100%;
	height:100%;
	z-index:1000;
    background-color:white;
    opacity: .8;
	
 }
.ajax-loader {
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -32px; /* -1 * image width / 2 */
    margin-top: -32px;  /* -1 * image height / 2 */
    display: block;     
}
</style>

<!--div id="ajaxspiner">
	<img  src="<?php echo base_url('assets/images'); ?>/gears.gif" class="ajax-loader"/>
</div-->

<script>
$(window).load(function(){
	
	$('#load_page_action2').modal();
	
});
</script>

	<div class="modal fade" id="load_page_action2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-body">
				Your session has expired, please re-logon.<a href="<?php echo base_url(); ?>admin/dashboard/logout">Login</a>  
			</div>
		 </div>
		</div>
	</div>
	
<?php } ?>

</html>