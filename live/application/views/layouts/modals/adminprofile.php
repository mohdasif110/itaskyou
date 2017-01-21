<!--- Add New industory Type ---> 			
<div class="modal fade" id="adminprofilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Edit <?php echo $page_title; ?></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal form-label-left">
			
			<span style="color:red;text-align:center">{{message}}</span>
		  
			<div class="form-group">
              <label for="recipient-name" class="form-control-label"><?php echo $page_title; ?>:</label>
              
			  <input type="text" class="form-control"  name="industorytypeedit" ng-model="industorytypeedit" required>
			  <input type="hidden" class="form-control"  name="editsubTypeID" ng-model="editsubTypeID" required>
				</div>
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