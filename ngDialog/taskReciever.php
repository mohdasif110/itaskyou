<div>&nbsp;</div>
<div class="container-fluid">
	<h4><span ng-bind="taskName"></span></h4>
	
	<div>
		<table class="table table-striped">
			<tr ng-repeat="ru in udata" >
				<td  style="background-color:#08D5AA; color:#fff" colspan="3">
				<img style="width:50px;height:50px" src="{{ru.userPhoto}}" alt="..." class=" img-thumbnail">
				</td>
				<td style="background-color:#08D5AA; color:#fff">
					<span ng-bind="ru.firstName"></span>
					<span ng-bind="ru.lastName"></span>
				</td>
				<td>
					<span ng-bind="ru.emailID"></span><br />
				</td>
				<td>
					<span ng-bind="ru.countryPhoneCode"> </span><span ng-bind="ru.contactNo"></span>
				</td>
				<td>
					<span ng-bind="ru.industryType"></span> /
					<span ng-bind="ru.subIndustryTypeID"></span>
				</td>
			</tr>
		</table>
	</div>
</div>