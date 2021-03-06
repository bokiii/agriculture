<section id="mainSection" ng-controller="dataInventory">  
	<div class="container">  
		<div class="row">   
			
			<div class="col-md-12">   
				
				<div class="page-header">
					<h1>Farmers Inventory</h1>   
				  	<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query</label>
							<input ng-model="query" type="text" class="form-control" placeholder="Search">
						</div>         
					</form>       
				</div>  

				<form id="dataDeleteForm" method="post" action="<?php echo base_url(); ?>index.php/data_inventory/delete_data">
					<div class="table-responsive">
					  	<table class="table">
						  	<thead>   
								<tr>  
									<th><input type="checkbox" class="main_check" /></th>
									<th>Last Name</th>
									<th>First Name</th>
									<th>Middle Name</th>  
									<th>Address</th>   
									<th>View</th>
								</tr>
						  	</thead>  
						  	<tbody>  
								<tr ng-repeat="data in datas | filter: query">  
									<td><input type="checkbox" name="data_id[]" value="{{data.id}}" class="sub_check" /></td>
									<td>{{data.last_name}}</td>
									<td>{{data.first_name}}</td>
									<td>{{data.middle_name}}</td>  
									<td>{{data.address}}</td>
									<td><a href="<?php echo base_url(); ?>index.php/data_inventory/get_data_by_id?id={{data.id}}">View</a></td>
								</tr>  
								
						  	</tbody>
					  	</table>     

						<?php if($this->session->userdata('user_priveleges')) {  ?>  

							<?php if($this->session->userdata('user_priveleges')['can_delete'] == 1) { ?>	
								<button type="submit" class="btn btn-common btn-delete pull-right">Delete</button>  
							<?php } ?>  

							<?php if($this->session->userdata('user_priveleges')['can_add'] == 1) { ?>
								<button type="button" class="btn btn-common btn-add pull-right" data-toggle="modal" data-target="#addDataModal">Add</button>      
							<?php } ?>  

						<?php } else { ?>      

							<button type="submit" class="btn btn-common btn-delete pull-right">Delete</button>  
							<button type="button" class="btn btn-common btn-add pull-right" data-toggle="modal" data-target="#addDataModal">Add</button>      

						<?php } ?>  
											
					</div> <!-- end table responsive -->    
				</form>
			</div>

		</div>
	</div>  

	<!-- below modal for add -->
	<div id="addDataModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<form id="addDataForm" action="<?php echo base_url(); ?>index.php/data_inventory/add_data" method="post">
				<div class="modal-content">
			      
			      	<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Data</h4>
			      	</div>
			     
			      	
			      	<div id="firstData" class="modal-body">      
				      	
				      	<p class="bg-danger confirmation_message">Failed</p>        
				      	
				      	<h4 class="mainLabel"><span class="label label-default">Farmer Personal Details </span></h4>
				    
						<div class="row">    
							<div class="col-md-4">   
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" ng-model="first_name" class="form-control" name="first_name" id="first_name">
								</div>
							</div>      

							<div class="col-md-4">   
								<div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input type="text" ng-model="middle_name" class="form-control" name="middle_name" id="middle_name">
								</div>
							</div>      

							<div class="col-md-4">   
								<div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" ng-model="last_name" class="form-control" name="last_name" id="last_name">
								</div>
							</div>      

							<div class="col-md-12">  
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" ng-model="address" class="form-control" name="address" id="address">
								</div>
							</div>      

							<div class="col-md-6">  
								<div class="form-group">
									<label for="civil_status">Civil Status</label> <br>
									<label class="radio-inline">
										<input type="radio" ng-model="civil_status" name="civil_status" id="single" value="single"> Single
									</label>
									<label class="radio-inline">
										<input type="radio" ng-model="civil_status" name="civil_status" id="married" value="married"> Married
									</label>
									<label class="radio-inline">
										<input type="radio" ng-model="civil_status" name="civil_status" id="widowed" value="widowed"> Widowed
									</label>
								</div>
							</div>  

							<div class="col-md-6">  
								<div class="form-group">
									<label for="gender">Gender</label> <br>
									<label class="radio-inline">
										<input type="radio" ng-model="gender" name="gender" id="male" value="male"> Male
									</label>
									<label class="radio-inline">
										<input type="radio" ng-model="gender" name="gender" id="female" value="female"> Female 
									</label>
								</div>
							</div>

						</div> <!-- end row -->
				      	
						<a id="firstNext" class="btn btn-add btn-common topBottomNavigate">Next</a>
			      	</div> <!-- end first data -->       

			      	<div id="secondData" class="modal-body">       
			      		<p class="bg-danger confirmation_message">Failed</p>      
						
						<a id="firstPrev" class="btn btn-add btn-common topBottomNavigate">Previous</a>

				      	<h4 class="mainLabel"><span class="label label-default">Farmer Assets</span></h4>

				      	<div class="row">  
					      	
							<div class="col-md-2">
						      	<div class="form-group">
									<label for="num_assets">No. of Assets</label>
									<input type="number" class="form-control" name="num_assets" id="num_assets" value="1" min="1">
								</div>     
							</div>   
							<div class="col-md-1">  
							</div>   
							<div id="assetMainContainer" class="col-md-9">  
								
								<div class="row assetContainer">  
									<div class="col-md-4">  
										<div class="form-group">
											<label for="asset">Asset</label>
											<input type="text" class="form-control asset" name="asset[]">
										</div>   
									</div>  
									<div class="col-md-8">  
										<div class="form-group">
											<label for="asset_description">Asset Description</label>
											<input type="text" class="form-control asset_description" name="asset_description[]">
										</div>   
									</div>
								</div>      

							</div> <!-- end asset main container -->	
						



						</div> <!-- end row -->
			      	</div> <!-- end second data -->      


			    
			      	<div id="addDataSubmitButtonContainer" class="modal-footer">  
			        	<button type="submit" class="btn btn-add btn-common">Add Data</button>
			      	</div>
		    	</div> <!-- end modal content -->  
	    	</form> <!-- end form -->
		</div>
	</div>  

	<!-- below modal for edit -->  

	


</section> <!-- end main section -->      

