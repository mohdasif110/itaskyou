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
							<th class="column-title">Funcationality Type</th>
							<th class="column-title">Status</th>
							
							<th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            
                          </tr>
                        </thead>
                        <tbody>
						
						<tr dir-paginate="tag in tags|filter:search|itemsPerPage:8">
						<td ng-bind="tag.taskName"></td>
						<td ng-bind="tag.orginatorName"></td>
						<td>
								<ul  type="1" ng-repeat=" touser in tag.recieverData" >
									<li>{{touser.firstName}}  {{touser.lastName}} </li>
								</ul>
						</td>
						<td ng-bind="tag.functionalityType"></td>
						<td ng-bind="tag.statusText"></td>
						<td><a href="javascript:;" ng-click="view_task(tag.taskID,tag.taskName)" >View</a></td>
						</tr>
						<tr ng-if="tags.length==0"><td colspan="100%" align="center" ><b style="color:red;">No <?php echo $page_title; ?></b></td></tr>
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


<!--- Add New tag ---> 			
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel" ng-bind="task_name"></h4>
        </div>
        <div class="modal-body">
				
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>
<!--- End of Add New Industory Type--> 
</div>	
