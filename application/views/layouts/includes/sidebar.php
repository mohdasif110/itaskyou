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
					
					<li><a href="<?php echo base_url('admin/industorytype'); ?>"><i class="fa fa-circle"></i>Industry Type<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="<?php echo base_url('admin/subindustorytype'); ?>"><i class="fa fa-circle"></i>Sub Industry Type<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="<?php echo base_url('admin/tags'); ?>"><i class="fa fa-circle"></i>Tags<span class="fa fa-chevron-down"></span></a></li>

					<li><a href="<?php echo base_url('admin/organizations'); ?>"><i class="fa fa-circle"></i>Organizations<span class="fa fa-chevron-down"></span></a></li>

					
					<li><a href="<?php echo base_url('admin/api_users'); ?>"><i class="fa fa-circle"></i>Users<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="<?php echo base_url('admin/groups'); ?>"><i class="fa fa-circle"></i>Groups<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="<?php echo base_url('admin/moms'); ?>"><i class="fa fa-circle"></i>Minutes of Meeting<span class="fa fa-chevron-down"></span></a></li>
					
					<li><a href="<?php echo base_url('admin/tasks'); ?>"><i class="fa fa-circle"></i>Tasks<span class="fa fa-chevron-down"></span></a></li>
				</ul>
			</div>
		</div>
			<!-- /sidebar menu -->
			<!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!--a data-toggle="tooltip" data-placement="top" title="Settings">
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
			 </a-->
			</div>
		   <!--/menu footer buttons -->
		</div>

</div>