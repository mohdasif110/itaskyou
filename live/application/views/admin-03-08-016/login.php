<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>I Task you Admin Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url('assets');   ?>/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
         <h1 class="text-center">I task You</h1>
      </div>
      <div class="modal-body">
			<div style="color:red;text-align: center;"><?php echo validation_errors(); ?></div>
			<?php echo form_open('admin'); ?>
		   <div class="form-group">
              <input type="text"  name="username"  id="username" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password"  name="password" id="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              
            </div>
          </form>
      </div>
		<div class="modal-footer">
          <div class="col-md-12">
          </div>	
      </div>
  </div>
  </div>
</div>
		<!-- script references -->
		<script src="<?php echo base_url('assets');   ?>/js/jquery.min.js"></script>
		<script src="<?php echo base_url('assets');   ?>/js/bootstrap.min.js"></script>
	</body>
</html>
