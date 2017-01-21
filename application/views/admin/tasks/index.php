<script src="<?php echo base_url('assets/js/angularjs/controllers') ?>/tasksController.js"></script>
<div class="right_col" role="main" ng-controller="tasksController as data" >
	  <div class="">
		<div class="page-title">
		  <div class="title_left">
			<h3><?php echo $page_title; ?><small></small></h3>
			</div>
			<div style="color:red;"><b>{{successmessage}}</b></div>
		</div>
		<div class="clearfix"></div>
				<div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           	<th class="column-title">Tasks</th>
							<th class="column-title">Orginator</th>
							<th class="column-title">Reciever(s)</th>
							<th class="column-title">Functionality Type</th>
							<th class="column-title">Status</th>
							<th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
						<tbody>
						<tr dir-paginate="tag in tags|itemsPerPage:itemsPerPage" total-items="total_count">
						<td ng-bind="tag.taskName"></td>
						<td style="background-color:#08D5AA; color:#fff">
							<img style="width:50px;height:50px" src="{{tag.orginatorphoto}}" alt="..." class=" img-thumbnail img-circle">
							<span ng-bind="tag.orginatorName">
							</span>
						</td>
						<td>
						<a href="javascript:;" ng-click="showRecievers(tag.recieverData,tag.taskName)">
							<span ng-bind="tag.recieverData.length"></span>
							<!--i class="fa fa-users" aria-hidden="false"></i-->
						</a>
						</td>
						<td>
							
							<span ng-bind="tag.functionalityType"></span>
							<!--span ng-bind="tag.momName"></span-->
						</td>
						<td ng-bind="tag.statusText">
						</td>
				<td>
				<a href="javascript:;" ng-click="view_task(tag.taskID,tag.taskName,tag.functionalityType)" >View</a> | 
				<a href="javascript:;" ng-click="view_history(tag.taskID,tag.taskName,tag.functionalityType)" >Task History </a>
				</td>
					</tr>
					<tr ng-if="tags.length==0"><td colspan="100%" align="center" ><b style="color:red;">No <?php echo $page_title; ?></b></td></tr>
                </tbody>
			    </table>
				<loading></loading>
				<div class="pull-right">
					<dir-pagination-controls
					max-size="8"
					direction-links="true"
					boundary-links="true" 
					on-page-change="get_records(newPageNumber)">
					</dir-pagination-controls>
				</div>
	</div>
</div>
<!--Task Detail POP New -->
 <div class="modal fade"  id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="container modal-dialog">
	 <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
            
          <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ng-bind="taskName"></h4>
      </div>
            <div class="panel-body">
			 <div class="row">
              <div class="col-md-12 col-lg-12"> 
					<table class="table table-user-information table-bordered" style="margin-bottom:0px;">
                    <tbody>
					<tr>
						<td><b>Status</b></td>
						<td>Pending</td>
					</tr>
					<tr>
						<td><b >Created Date</b></td>
						<td>
							<span ng-bind="taskDetail.taskData.allotmentDate"></span>
						</td>
					</tr>
					<tr>
						<td><b>Due Date</b></td>
						<td><span ng-bind="taskDetail.taskData.dueDate"></span></td>
					</tr>
					<tr ng-if="taskDetail.taskData.revisedDate!=NULL">
						<td><b>Revised Date:</b></td>
						<td>
							<span ng-bind="taskDetail.taskData.revisedDate"></span>
						</td>
					</tr>
					<tr>
						<td><b>Functionality Type : </b></td>
						<td>
							<span  ng-bind="taskDetail.taskData.funType"></span>
						</td>
					</tr>
					<tr ng-if="taskDetail.taskData.groupName!=NULL">
						<td><b>Group Name: </b></td>
						<td>
							<span  ng-bind="taskDetail.taskData.groupName"></span>
						</td>
					</tr>
					<tr ng-if="taskDetail.taskData.momName!=NULL">
						<td><b>MOM Name: </b></td>
						<td>
							<span ng-bind="taskDetail.taskData.momName"></span>
						</td>
					</tr>
					<tr>
						<td colspan="2"><b>Description: </b> 
							<p ng-bind="taskDetail.taskData.taskDescription"></p>
						</td>
					</tr>
					
	<tr>
	<td colspan="2">
		<div style="background-color:#08D5AA;color:#fff;" class="row">
	
		<div class="col-md-2" align="left"> 
		<img alt="User Pic" src="{{taskDetail.taskData.userPhoto}}" class="media-object img-circle" width="60" height="60">
		</div>
		<div class="col-md-3" align="left" style="padding-top:22px"><span ng-bind="taskDetail.taskData.firstName"></span> <span ng-bind="taskDetail.taskData.lastName"></span></div>
		<div class="col-md-3" align="left" style="padding-top:22px"><span ng-bind="taskDetail.taskData.contactNo" ></span>
		</div>
		<div class="col-md-4" align="left" style="padding-top:22px"><span ng-bind="taskDetail.taskData.emailID" ></span></div>
	</div>
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<b>Reciever:</b>
 <div class="row">
 
 
  <div  class="col-md-6" align="left"  ng-repeat="resv in taskDetail.taskData.receiverData.receiverList
"  >
 
	  <div class="media" style="background-color:#f6f6f6;" >
		  <div class="media-left media-middle" style="padding-right:5px">
		  <a href="#"><img alt="User Pic" src="{{resv.userPhoto}}" class="media-object img-circle" width="60" height="60"></a>
		  </div>
	  <div class="media-body">
		<h5><span ng-bind="resv.firstName"></span> <span ng-bind="resv.lastName"></span></h5>
	  <h6 >
	  <span ng-bind="resv.contactNo"></span><br>
	  <span ng-bind="resv.emailID">asif@bookmyhouse.com</span>
	  </h6>
	  </div>
	  </div>
  
 </div>
</div> 
</td>
</tr>	
<tr>
<td colspan="2">
				<b>Followers:</b>
                <div class="row">
					
					  <div   style="background-color:#EDEDED"  class="col-md-5" align="left"  ng-repeat="resv in taskDetail.taskData.followingData.followingList
"  >
 
  <div class="media">
  <div class="media-left media-middle" style="padding-right:5px">
  <a href="#"><img alt="User Pic" src="{{resv.userPhoto}}" class="media-object img-circle" width="60" height="60"></a>
  </div>
  <div class="media-body">
  <h5><span ng-bind="resv.firstName"></span> <span ng-bind="resv.lastName"></span></h5>
    <h6 >
  <span ng-bind="resv.contactNo"></span><br>
  <span ng-bind="resv.emailID">asif@bookmyhouse.com</span>
  </h6>
  </div>
  </div>
 
 </div>
	</div>
		</td>
		</tr>	
	<tr>	
	<td colspan="2"><b>Tags:</b> 
	<span class="btn btn-default btn-sm"  ng-repeat="tag in taskDetail.taskData.taskTags
" class="btn btn-default" >{{tag}}</span>
	</td>
	</tr>
	<tr>
	
	<td colspan="2">
		
		<center>
			<button type="button" class="btn btn-primary btn-view-popup">Task History</button>
			<button type="button" class="btn btn-primary btn-view-popup">Task Media</button>
			<button type="button" class="btn btn-primary btn-view-popup">Task Chat</button>
		</center>
	</td>
	</tr>
	</tbody>
    </table>
     </div>
   </div>
	</div>
					<!--div class="panel-footer">
            		 <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
						<span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
							<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
						</span>
                    </div-->
					
			</div>
        </div>
      </div>
    </div>
</div>

 
 
 <!-- End of task Detail pop up Design-->









<!-- Task Detail -->
<div class="modal fade"  id="taskModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="container modal-dialog">
	 <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
            <div class="panel-heading">
				<h3 class="panel-title">
					<b ng-bind="taskName"></b>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h3>
		  </div>
            <div class="panel-body">
			 <div class="row">
              <div class="col-md-12 col-lg-12"> 
					<table class="table table-user-information">
                    <tbody>
					
					<tr>
						<td><b>Status</b></td>
						<td>Pending</td>
					</tr>
					<tr>
						<td><b >Start Date</b></td>
						<td>
							<span ng-bind="taskDetail.taskData.allotmentDate"></span>
						</td>
					</tr>
					<tr>
						<td><b>Due Date</b></td>
						<td><span ng-bind="taskDetail.taskData.dueDate"></span></td>
					</tr>
					<tr ng-if="taskDetail.taskData.revisedDate!=NULL">
						<td><b>Revised Date:</b></td>
						<td>
							<span ng-bind="taskDetail.taskData.revisedDate"></span>
						</td>
					</tr>
					
					<tr>
						<td><b>Functionality Type : </b></td>
						<td>
							<span  ng-bind="taskDetail.taskData.funType"></span>
						</td>
					</tr>
					
					<tr>
						<td colspan="2"><b>Description: </b> 
							<p ng-bind="taskDetail.taskData.taskDescription"></p>
						</td>
					</tr>
					<tr>
					<td colspan="2">
					<!--b>Orginator:</b--> 
					<table class="">
					<tr>
					<td>
					<div class="row">
				
					<div class="col-md-2 col-lg-2 " align="center"> 
					<img alt="User Pic"  style="width:100px;" src="{{taskDetail.taskData.userPhoto
}}" class="img-circle img-responsive"> 
					</div>
					
				  <div class="col-md-10 col-lg-10"> 
				
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>
						<b><span ng-bind="taskDetail.taskData.firstName"></span>
						<b><span ng-bind="taskDetail.taskData.lastName"></span></b></td>
                      </tr>
					   <tr>
                        <td><b><span ng-bind="taskDetail.taskData.contactNo" ></span></b></td>
                        <td><span ng-bind="taskDetail.taskData.emailID" ></span></td>
                      </tr>
					 </tbody>
                  </table>
				  
				  
				 </div>
              </div>
			</td>
		</tr>
		</table>
		</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<b>Reciever:</b> 
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				<div ng-repeat="resv in taskDetail.taskData.receiverData.receiverList
" class="col-md-2 col-lg-2 " align="center"> 
					
					<!--a href="javascript:;" ng-click="viewItem(resv)"-->
					
						<img alt="User Pic" src="{{resv.userPhoto}}" class="img-circle img-responsive">
					
					<!--/a-->
					
				</div>		
			</td>
		</tr>					
		
		
			<tr>
			<td colspan="2">
				<b>Followers:</b> 
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				
			
			
				<div ng-repeat="resv2 in taskDetail.taskData.followingData.receiverList" class="col-md-2 col-lg-2 " align="center"> 
					
						
					
					<!--a href="javascript:;" ng-click="viewItem(resv2)"-->
					<img alt="User Pic" src="{{resv2.userPhoto}}" class="img-circle img-responsive"> 
					<!--/a-->
				</div>		
			</td>
		</tr>	
		<tr>	
		<td colspan="2"><b>Tags:</b> 
		<span ng-repeat="tag in taskDetail.taskData.taskTags
" class="btn btn-default" >{{tag}}</span>							
		</td>
		</tr>
			<tr>
				<td colspan="2"><b></b> 
					<center>
						<span><b>Task History </b></span>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><b></b> 
					<center>
						<span><b> Task Media </b></span>
					</center>
				</td>
			</tr>
			<tr>
					<td colspan="2"><b></b> 
							<center>
							    <span><b>Task Chat</b></span>
							</center>
					</td>
		  </tr>
		</tbody>
               </table>
               </div>
              </div>
	</div>	
			<!--div class="panel-footer">
            		 <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
						<span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
							<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
						</span>
                    </div-->
					
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






