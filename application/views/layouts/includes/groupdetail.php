<div class="modal fade" id="tagModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="container modal-dialog">
	 <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
            <div class="panel-heading">
			
				<h3 class="panel-title">
				<b>{{userInfo.firstName}} {{userInfo.lastName}}</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		  </h3>
		  </div>
            <div class="panel-body">
              
			  <div class="row">
                <div class="col-md-2 col-lg-2 " align="center"> 
				
				<img alt="User Pic" src="{{userInfo.userPhoto}}" class="img-circle img-responsive"> </div>
				<div class="col-md-10 col-lg-10"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Industry:</b></td>
                        <td>{{userInfo.industryType}} <span ng-if="userInfo.subIndustryTypeID!=null"> -</span>  {{userInfo.subIndustryTypeID}}  </td>
                      </tr>
					<tr>
                        <td><b>Email:</b></td>
                        <td>{{userInfo.emailID}}</td>
                      </tr>
					  <tr>
                        <td><b>Contact Number:</b></td>
                        <td> {{userInfo.countryPhoneCode}} {{userInfo.contactNo}} </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
               </div>
              </div>
		
		<div class="row bg-row"  ng-repeat=" (key,value) in taskCountInfo" >
			<h5><b ng-bind="key"></b></h5>
			 <center>
				<div  class="col-md-12 pull-right" >
					
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-circle-lg btn-primary"><span class="panel-title">Total <p ng-bind="value.allTaskCount"></p><span></a>
					
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-circle-lg btn-default"><span class="panel-title">In Progress 
					<p ng-bind="value.InProgressCount">3</p><span></a>
					
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-circle-lg btn-success"><span class="panel-title">Completed <p ng-bind="value.CompletedCount" >3</p></span></a>
					
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-circle-lg btn-danger"><span class="panel-title">Overdue <p ng-bind="value.OverdueCount">4</p></span></a>
					
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-circle-lg btn-warning"><span class="panel-title">Pending <p ng-bind="value.PendingCount">4</p></span></a>
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-circle-lg btn-info"><span class="panel-title">Declined <p  ng-bind="value.DeclinedCount">4</p></span></a>
				</div>
		   </center>
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