<script src="<?php echo base_url('assets/js/angularjs/controllers') ?>/organizationsController.js"></script>
<div class="right_col" role="main" ng-controller="organizationsController as vm" >
    <div class="">
		<div class="page-title">
        <div class="title_left">
			<h3><?php echo $page_title; ?><small></small></h3>
			</div>
			<div growl></div>
		</div>
		
		<div class="clearfix"></div>
		<div class="table-responsive">
				<table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           <!--th class="column-title">
							Logo
							</th-->
							<th class="column-title">Company Name</th>
							<th class="column-title">Mobile Number</th>
							<th class="column-title">Address</th>
							<th class="column-title">pkg</th>
							<th class="column-title">
							 View   
							</th>
							<th class="column-title">Status </th>
							<th class="column-title">Actions</th>
                            <!--th class="column-title no-link last"><span class="nobr">Action</span-->
                            </th>
                          </tr>
                        </thead>
                        <tbody>
				<tr dir-paginate="tag in tags|filter:search|itemsPerPage:8">
				
				<!--td>
				<img  ng-if="tag.userPhoto!=''" alt="User Pic"  style="width:50px;" src="{{tag.userPhoto}}" class="img-circle img-responsive">
				<img  ng-if="tag.userPhoto==''" alt="User Pic"  style="width:50px;" src="../assets/images/default_avatar.png" class="img-circle img-responsive">
				</td-->
			
				<td ng-bind="tag.orgName"></td>
					<td>{{tag.orgPhone}}</td>
					<td>{{tag.orgAddress}},{{tag.orgCity}},{{tag.orgState}}.{{tag.orgCountry}} </td>
					<td>pkg</td>
					<td>view</td>
					<td>
					<span ng-if="tag.status==1" >
							<a href="javascript:;" ng-click="toggleStatus(tag.userID, '0')"  >
								<img height="20px" src="<?php echo base_url('assets/images/icons/green_status.png') ?>" />
							</a>
					</span>
					<span ng-if="tag.status==0" >
						<a href="javascript:;" ng-click="toggleStatus(tag.userID, '1')"  >
							<img  height="20px" src="<?php echo base_url('assets/images/icons/red_status.png') ?>" />
						</a>
					</span>
					</td>
					<td>
						----
					</td>
				</tr>
				<tr ng-if="industoryTypes.length==0"><td colspan="100%" align="center" ><b style="color:red;">No <?php echo $page_title; ?></b></td></tr>
                        </tbody>
                </table>
				<div class="pull-right">
				<dir-pagination-controls
					max-size="5"
					direction-links="true"
					boundary-links="true" >
				</dir-pagination-controls>
				</div>
			</div>
	</div>