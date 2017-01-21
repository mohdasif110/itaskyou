<script src="<?php echo base_url('assets/js/angularjs/controllers') ?>/usersController.js"></script>
<div class="right_col" role="main" ng-controller="usersController as vm" >
          <div class="">
		 
		 <div class="page-title">
            
			<div class="title_left">
               <h3><?php echo $page_title; ?><small></small></h3>
				</div>
			<div growl></div>
			<!--div class="pull-right">
					<button class="btn btn-primary" type="button"   ng-click="newItem()"  data-whatever="@getbootstrap" >Add New <?php echo $page_title; ?></button>
			</div-->
		</div>
		<div class="clearfix"></div>
		<div class="table-responsive">
				<table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           <th class="column-title">
							Photo
							</th>
							
							<th class="column-title">
							 <!--input type="text" ng-model="search" class="form-control" style="width:40% !important;" placeholder="Sub Industory Type"--> Users 
							</th>
							<th class="column-title">Email Address</th>
							<th class="column-title">Contact No</th>
							<th class="column-title">Industry Type</th>
							<th class="column-title">Sub Industry Type</th>
							<th class="column-title">Status </th>
							<th class="column-title">Actions</th>
                            <!--th class="column-title no-link last"><span class="nobr">Action</span-->
                            </th>
                          </tr>
                        </thead>
                        <tbody>
				<tr dir-paginate="tag in tags|filter:search|itemsPerPage:8">
				<td>
					<img  ng-if="tag.userPhoto!=''" alt="User Pic"  style="width:50px;" src="{{tag.userPhoto}}" class="img-circle img-responsive">
					
					<img  ng-if="tag.userPhoto==''" alt="User Pic"  style="width:50px;" src="../assets/images/default_avatar.png" class="img-circle img-responsive">
				</td>
				<!--td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
               </td-->
				<td>{{tag.firstName}} {{tag.lastName}}</td>
					<td>{{tag.emailID}}</td>
					<td>{{tag.contactNo}} </td>
					<td>{{tag.industryType}}</td>
					<td> {{tag.subIndustryTypeID}}</td>
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
					<a href="javascript:;" ng-click="userSetting(tag)" />Setting</a>
					|
					<a href="javascript:;" ng-click="viewItem(tag)" >View</a>
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