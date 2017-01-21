<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
			<!--div class="navbar nav_title" style="border: 0;">
              <a href="javascript:;" class="site_title"><i class="fa fa-paw"></i> <span>I Task You</span></a>
            </div-->
			<div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url('theme/production') ?>/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $userData->firstName." ".$userData->lastName; ?></h2>
              </div>
            </div>
			<!-- /menu profile quick info -->
			<br />
			<!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				<div class="menu_section">
				<h3>Menues</h3>
				<ul class="nav side-menu">
					
					<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-circle"></i>Dashboard<span class="fa fa-chevron-down"></span></a></li>
					<li><a href="<?php echo base_url('admin/countries'); ?>"><i class="fa fa-circle"></i>Country Code<span class="fa fa-chevron-down"></span></a></li>
					<li><a href="<?php echo base_url('admin/industorytype'); ?>"><i class="fa fa-circle"></i>Industory Type<span class="fa fa-chevron-down"></span></a></li>
					<li><a href="<?php echo base_url('admin/subindustorytype'); ?>"><i class="fa fa-circle"></i>Sub Industory Type<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="<?php echo base_url('admin/tags'); ?>"><i class="fa fa-circle"></i>Tags<span class="fa fa-chevron-down"></span></a></li>
					<li><a href="<?php echo base_url('admin/tasks'); ?>"><i class="fa fa-circle"></i>Tasks<span class="fa fa-chevron-down"></span></a></li>
					
					<!--li><a href="javascript:;"><i class="fa fa-circle"></i>Task Type<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="javascript:;"><i class="fa fa-circle"></i>Functionality Type<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="javascript:;"><i class="fa fa-circle"></i>Status<span class="fa fa-chevron-down"></span></a></li-->
				
					<!--li><a href="javascript:;" class="menusDome" rel="<?php echo base_url('admin/dashboard'); ?>" ><i class="fa fa-circle"></i>Dashboard<span class="fa fa-chevron-down"></span></a>
					<li><a href="javascript:;" class="menusDome" rel="<?php echo base_url('admin/countries'); ?>" ><i class="fa fa-circle"></i>Country Code<span class="fa fa-chevron-down"></span></a>
					<li><a href="javascript:;" class="menusDome"  rel="<?php echo base_url('admin/industorytype'); ?>" ><i class="fa fa-circle"></i>Industory Type<span class="fa fa-chevron-down"></span></a>
					<li><a href="javascript:;" class="menusDome" rel="#" ><i class="fa fa-circle"></i>Sub Industory Type<span class="fa fa-chevron-down"></span></a>
					<li><a href="javascript:;" class="menusDome" rel="#" ><i class="fa fa-circle"></i>Tags<span class="fa fa-chevron-down"></span></a-->
				</ul>
				
			</div>
		</div>
			<!-- /sidebar menu -->
			<!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip"  data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			 </a>
            </div>
            <!--/menu footer buttons -->
          </div>
</div>


