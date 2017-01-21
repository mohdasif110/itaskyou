<script src="<?php echo base_url('assets/js/angularjs/controllers') ?>/momsController.js"></script>
<div class="right_col" role="main" ng-controller="momsController as vm" >
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
				 <th class="column-title">Name</th>
				 <th class="column-title">Created By</th>
				 <th class="column-title">Created Date</th>
				 <th class="column-title">Modified Date</th>
				 <th class="column-title">Status </th>
				 <th class="column-title">Action</th>
			  </tr>
			</thead>
		    <tbody>
				<tr dir-paginate="group in tags|filter:search|itemsPerPage:6">
				<td>
				<!--img  class="img-thumbnail" style="width:50px;height:50px" src="{{group.groupPhoto}}" alt="..."-->
				<span ng-bind="group.momName"></span>
				</td>
				<!--td> 
					<img  style="width:50px;height:50px" src="{{group.userPhoto}}" alt="..." class=" img-thumbnail img-circle">
					<!--span ng-bind="group.firstName"></span>
					<span ng-bind="group.lastName"></span>
				</td-->
		   <td style="background-color:#08D5AA; color:#fff">
				<img style="width:50px;height:50px" src="{{group.userPhoto}}" alt="..." class=" img-thumbnail img-circle">
					<span ng-bind="group.firstName"></span>
					<span ng-bind="group.lastName"></span>
			</td>
			<td ng-bind="group.createdDate"></td>
			<td ng-bind="group.modifiedDate"></td>
			<td>
				<span ng-if="group.status==1" >
					<a href="javascript:;" ng-click="toggleStatus(group.momID, '0')"  >
						<img height="20px" src="<?php echo base_url('assets/images/icons/green_status.png') ?>" />
					</a>
				</span>
				<span ng-if="group.status==0" >
					<a href="javascript:;" ng-click="toggleStatus(group.momID, '1')"  >
						<img  height="20px" src="<?php echo base_url('assets/images/icons/red_status.png') ?>" />
					</a>
				</span>
			</td>
			
			<!--td><a href="javascript:;" ng-click="viewItem(group)" >View</a></td-->
			
			<td>
			<span> 
				<a href="javascript:;" ng-click="viewItem(group.momID)" ><i class="fa fa-tasks" aria-hidden="true"></i> </a>
			</span>
				<!--span> 
				<i class="fa fa-users" aria-hidden="true"></i> 
			</span-->
			</td>
			</tr>
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
		
	<div class="modal fade" id="groupModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="container modal-dialog">
	 <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
            <div class="panel-heading">
				<h3 class="panel-title">
						<b><span ng-bind="groupDetailData.momName"></span></b>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</h3>
			</div>
			<div class="panel-body">
				 
				 <div class="row">
						<div class="col-md-12 col-lg-12" style="background-color:#F3F2ED;pedding:3px;">
							<div class="col-md-2">
								<img class="img-thumbnail" src="http://bookmyhouse.com/media/unit/2015/06/revanta_10_banner.jpg" alt="...">
								</div>
								<div class="col-md-10" style="background-color:;">
								<b>MOM Name : </b><span ng-bind="groupDetailData.momName"></span><br />
								<b>Created By : </b>
								<span ng-bind="groupDetailData.firstName"></span>
								<span ng-bind="groupDetailData.lastName"></span><br />
								<b>Created Date : </b><span ng-bind="groupDetailData.createdDate"></span><br />
							  </div>
						</div>
				 </div>

				 <div class="row">
				 <hr />
				 <div class="col-md-11 col-lg-12" style="background-color:#F3F2ED;pedding:3px;">
					<p ng-bind="groupDetailData.groupDescription"></p>
				 </div>
				</div>
				<div class="row" ng-show="groupDetailData.participant.length>0">
					<div class="col-md-11 col-lg-12" style="background-color:#F3F2ED;pedding:3px;">
						<b>Participants:</b>
						<!--{{groupDetailData.participant}} -->
						<div>	
						<span ng-repeat= "menberData in groupDetailData.participant">
								<img style="width:50px;height:50px" src="{{menberData.userPhoto}}" alt="..." class=" img-thumbnail img-circle" />
						</span>	
						</div>
						<!--table  class="table">
										<tr  ng-repeat= "menberData in groupDetailData.groupMembersData">
											<td style="padding:0px; !important; vertical-align:center !important;">
												
												<img style="width:50px;height:50px" src="{{menberData.userPhoto}}" alt="..." class=" img-thumbnail img-circle" />
							
												
											</td>
											<td style="padding:0px; !important; vertical-align:center !important;">
												<span ng-bind="menberData.firstName"></span>
												<span ng-bind="menberData.lastName"></span>
											</td>
											<td style="padding:0px; !important; vertical-align:center !important;">
												<span ng-bind="menberData.contactNo"></span>
											</td>
											<td style="padding:0px; !important; vertical-align:center !important;">
												<span ng-bind="menberData.emailID"></span>
											</td>
										</tr>
						</table-->
			</div>
			 </div>
			 <div class="row" ng-show="groupDetailData.tasks.length>0" >
				<div class="col-md-11 col-lg-12" style="background-color:#F3F2ED;pedding:3px;">
						<b>MOM Tasks : </b>
						<!--{{groupDetailData.groupMembersData}}-->
						 <table  class="table">
							<tr  ng-repeat= "menberData in groupDetailData.tasks">
								
								<td style="padding:0px; !important; vertical-align:center !important;"><span ng-bind="menberData.taskName"></span></td>
								
								<td style="padding:0px; !important; vertical-align:center !important;"><span ng-bind="menberData.allotmentDate"></span></td>
								
								<td style="padding:0px; !important; vertical-align:center !important;"><span ng-bind="menberData.dueDate"></span></td>
							</tr>
						</table>
				 </div>
			 </div>
			<hr />
			<div class="row" observation ng-show="groupDetailData.observation.length>0" >
				<div class="col-md-11 col-lg-12" style="background-color:#F3F2ED;pedding:3px;">
						<b>MOM Observations : </b>
						<!--{{groupDetailData.groupMembersData}}-->
						 <table  class="table">
							<tr  ng-repeat= "observ in groupDetailData.observation">
								
								<td style="padding:0px; !important; vertical-align:center !important;"><span ng-bind="observ.observationName"></span></td>
							
								<td style="padding:0px; !important; vertical-align:center !important;"><span ng-bind="observ.createdDate"></span></td>
							</tr>
						</table>
				 </div>
			 </div>
		</div>
	</div>
	</div>
    </div>
    </div>
    </div>
</div>
<style>
	.btn-circle-lg {
	  width: 90px;
	  height: 90px;
	  text-align: center;
	  padding: 13px 4px 13px;
	  font-size: 30px;  
	}
	.bg-row {
		background-color:#ddd;
		margin-bottom:1px;
		padding:6px 3px 6px;
		color:#000;
	}
</style>		
</div>
