<!--top navigation -->
  <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('theme/production') ?>/images/img.jpg" alt=""><?php echo $userData->firstName." ".$userData->lastName; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <li><a href="javascript:;" data-toggle="modal" data-target="#profileModal" data-whatever="@getbootstrap"> Profile</a></li>
                    <!--li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li-->
					<li><a href="<?php echo base_url(); ?>admin/dashboard/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
			  </ul>
            </nav>
          </div>
	</div>
<!-- /top navigation -->
<!--- Add New industory Type ---> 			
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
		  <h4 class="modal-title" id="exampleModalLabel">Update Profile</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="javascript:;" class="btn btn-primary"  ng-click="saveIndustoryType()">Save</a>
		  
        </div>
      </div>
    </div>
	
</div>
<!--- End of Add New Industory Type-->  




