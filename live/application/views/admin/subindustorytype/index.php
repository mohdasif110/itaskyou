<script src="<?php echo base_url('assets/js/angularjs/controllers') ?>/subindustorytypeController.js"></script>
<div class="right_col" role="main" ng-controller="subindustorytypeController as data" >
          <div class="">
		    <div class="page-title">
              <div class="title_left">
                <h3><?php echo $page_title; ?><small></small></h3>
				</div>
				
				<div style="color:red;"><b>{{successmessage}}</b></div>
			
			<div class="pull-right">
					<button class="btn btn-primary" type="button"   ng-click="newItem()"  data-whatever="@getbootstrap" >Add New <?php echo $page_title; ?></button>
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
							 
							 <!--input type="text" ng-model="search" class="form-control" style="width:40% !important;" placeholder="Sub Industory Type"--> Sub Industory Type
							 </th>
							
							<th class="column-title">Industory Type</th>
                            
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
						<td>{{industorytype.subType}}</td>
						<td>{{industorytype.type}}</td>
						<td> 
						<span ng-if="industorytype.status==1"  >
								<a href="javascript:;" ng-click="toggleStatus(industorytype.subTypeID, '0')"  >
									<img height="20px" src="<?php echo base_url('assets/images/icons/green_status.png') ?>" />
								</a>
						</span>
						<span ng-if="industorytype.status==0" ><a href="javascript:;" ng-click="toggleStatus(industorytype.subTypeID, '1')"  ><img  height="20px" src="<?php echo base_url('assets/images/icons/red_status.png') ?>" /></a></span>
						</td>
						<td>
						
						<a href="javascript:;" ng-click="editItem(industorytype.subTypeID,industorytype.subType,industorytype.typeID)" >
						<img  height="20px" src="<?php echo base_url('assets/images/icons/edit.png') ?>" />
						</a>
						
						<a href="javascript:;" ng-click="deleteItem(industorytype.subTypeID,industorytype.type)" >
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

		<!--div id="message1" class="alert alert-warning alert-dismissable flyover flyover-centered">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{successmessage}}
		</div-->	

	
	
	
	
<!--div id="error-container">
 <div>  
	 <div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">×</button>
		Demo  Message
	 </div>
   </div>
</div-->

 		
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
          <h4 class="modal-title" id="exampleModalLabel">Add New <?php echo $page_title; ?></h4>
        </div>
        <div class="modal-body">
          <form  class="form-horizontal form-label-left">
		
			<span style="color:red;text-align:center">{{message}}</span>
			
			<div class="form-group">
				
				<label class="control-label col-md-3" for="last-name">Industory  Type<span class="required"></span>
				</label>
				<div class="col-md-7">
				 <select class="form-control col-md-7 col-xs-12" tabindex="-1 name="industorytype" ng-model="industorytype">
				<option value="">--Select--</option>
				<option ng-repeat=" indType in industorytypedropDown" value="{{indType.typeID}}">{{indType.type}}</option>
				</select>
				</div>
			
			</div>
			
			
			<div class="form-group">
				
				<label class="control-label col-md-3" for="last-name"><?php echo $page_title; ?><span class="required"></span>
				</label>
				<div class="col-md-7">
				  <input type="text" id="subindustorytype" name="subindustorytype" ng-model="subindustorytype" required  required="required" class="form-control col-md-7 col-xs-12">
				</div>
			
			</div>
		</form>
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="javascript:;" class="btn btn-primary"  ng-click="saveItem()">Save</a>
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
          <h4 class="modal-title" id="exampleModalLabel">Edit <?php echo $page_title; ?></h4>
        </div>
        <div class="modal-body">
		
		<form  class="form-horizontal form-label-left">
			
			<span style="color:red;text-align:center">{{message}}</span>
			
			<div class="form-group">
				
				<label class="control-label col-md-3" for="last-name">Industory Type<span class="required"></span>
				</label>
				<div class="col-md-7">
				 <select class="form-control col-md-7 col-xs-12" tabindex="-1 name="industorytypeedit" ng-model="industorytypeedit">
				<option value="">--Select--</option>
				<option ng-repeat=" indType in industorytypedropDown" value="{{indType.typeID}}">{{indType.type}}</option>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3" for="last-name"><?php echo $page_title; ?><span class="required"></span>
				</label>
				<div class="col-md-7">
				  <input type="text" id="subindustorytypeedit" name="subindustorytypeedit" ng-model="subindustorytypeedit" required  required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<input type="hidden" ng-model="subTypeIDedit"  name="subTypeIDedit" id="subTypeIDedit" >
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="javascript:;" class="btn btn-primary"  ng-click="updateItem()">Save</a>
		</div>
      </div>
    </div>
</div>
<!--- End of Add New Industory Type--> 
<!-- End of Edit -->
</div>	
