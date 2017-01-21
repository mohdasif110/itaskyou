<script src="<?php echo base_url('assets/js/angularjs/controllers') ?>/industorytypeController.js"></script>
<div class="right_col" role="main" ng-controller="industorytypeController as data" >
          <div class="">
		    <div class="page-title">
              <div class="title_left">
                <h3><?php echo $page_title; ?><small></small></h3>
				</div>
			 
				<div style="color:red;"><b>{{successmessage}}</b></div>
			 
			 
			 	<!--div class="x_content bs-example-popovers" style="display: block;">
					
				<div role="alert" class="alert alert-success alert-dismissible fade in">
				
				<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
					{{successmessage}}..
				 </div>
				  
                  <!--div role="alert" class="alert alert-info alert-dismissible fade in">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                  </div>
                  <div role="alert" class="alert alert-warning alert-dismissible fade in">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                  </div>
                  <div role="alert" class="alert alert-danger alert-dismissible fade in">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                  </div>
                </div-->
			
				 <div class="pull-right">
						<button class="btn btn-primary" type="button"   data-toggle="modal" data-target="#industoryTypeModal" data-whatever="@getbootstrap" >Add New Industory Type</button>
				</div>
			
			</div>
		 <div class="clearfix"></div>
		  
		 <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <!--th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" id="check-all" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </th-->
							
							<th class="column-title">
							<!--input type="text" ng-model="search" class="form-control" style="width:40% !important;" placeholder="industry Type"-->
							Industory Type
							</th>
                            <th class="column-title">Status </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            
                          </tr>
                        </thead>
                        <tbody>
						<tr dir-paginate="industorytype in industoryTypes|filter:search|itemsPerPage:8">
						 <!--td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                         </td-->
						<td>{{industorytype.type}}</td>
						<td> 
						<span ng-if="industorytype.status==1"  >
								<a href="javascript:;" ng-click="toggleStatus(industorytype.typeID, '0')"  >
									<img height="20px" src="<?php echo base_url('assets/images/icons/green_status.png') ?>" />
								</a>
						</span>
						<span ng-if="industorytype.status==0" ><a href="javascript:;" ng-click="toggleStatus(industorytype.typeID, '1')"  ><img  height="20px" src="<?php echo base_url('assets/images/icons/red_status.png') ?>" /></a></span>
						</td>
						<td>
						
						<a href="javascript:;" ng-click="edit_industory_type(industorytype.typeID,industorytype.type)" >
						<img  height="20px" src="<?php echo base_url('assets/images/icons/edit.png') ?>" />
						</a>
						
						<a href="javascript:;" ng-click="delete_industory_type(industorytype.typeID,industorytype.type)" >
						<img  height="20px" src="<?php echo base_url('assets/images/icons/delete.png') ?>" />
						</a>
						
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
		
<!--- Add New industory Type ---> 			
<div class="modal fade" id="industoryTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Add New Industory Type</h4>
        </div>
        <div class="modal-body">
          <form>
			
			<span style="color:red;text-align:center">{{message}}</span>
		  
		  <div class="form-group">
              <label for="recipient-name" class="form-control-label">Industory Type:</label>
              <input type="text" class="form-control"  name="industorytype" ng-model="industorytype" required>
            </div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="javascript:;" class="btn btn-primary"  ng-click="saveIndustoryType()">Save</a>
		  
        </div>
      </div>
    </div>
</div>
<!--- End of Add New Industory Type--> 

<!--- Edit -->

<!--- Add New industory Type ---> 			
<div class="modal fade" id="industoryTypeModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Edit Industory Type</h4>
        </div>
        <div class="modal-body">
          <form>
			
			<span style="color:red;text-align:center">{{message}}</span>
		  
		  <div class="form-group">
              <label for="recipient-name" class="form-control-label">Industory Type:</label>
              
			  <input type="text" class="form-control"  name="industorytypeedit" ng-model="industorytypeedit" required>
			  <input type="hidden" class="form-control"  name="editTypeID" ng-model="editTypeID" required>
			 	
				
			 
            </div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="javascript:;" class="btn btn-primary"  ng-click="saveIndustoryTypeEdit()">Save</a>
		</div>
      </div>
    </div>
</div>
<!--- End of Add New Industory Type--> 
<!-- End of Edit -->
		
</div>			



 
	
			