 <?php 
  
  //echo "<pre>";
  //print_r($countries);
  //exit;
 ?>
 
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $page_title; ?><small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
		 <div class="clearfix"></div>
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>Name</th>
                          <th>status</th>
						  <th>Action</th>
						  
                        </tr>
                      </thead>
                      <tbody>
            <?php 
			$rnum				=	1;
			foreach($countries as $country)
			{ 
			?>
			<tr>
				<td><?php echo $rnum; ?></td>
                <td><?php echo $country->name; ?></td>
                <td><?php echo $country->status; ?></td>
				<td>...</td>
            </tr>
			<?php
				
				$rnum++;
			}
		?> 
        </tbody>
                    </table>
					</div>
                </div>
              </div>
		
		
		</div>
</div>			
			