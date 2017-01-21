<!DOCTYPE html>
<html lang="en">
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
    <link href="<?php echo base_url('theme'); ?>/build/css/custom.min.css" rel="stylesheet">
	</head>
   <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		
		<?php render_side_bar(); ?>
		<?php render_top_bar(); ?>
		
		 <?php echo $body; ?>
	
	<!-- jQuery -->
    <script src="<?php echo base_url('theme'); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url('theme'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Custom Theme Scripts -->
   <script src="<?php echo base_url('theme'); ?>/build/js/custom.min.js"></script>

   
  </body>
</html>