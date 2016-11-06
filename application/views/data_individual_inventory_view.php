<section id="mainSection" ng-controller="individualDataInventory">  
	<div class="container for_print">  
		
		<div class="row">  
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
				<button type="button" id="print" class="btn btn-common btn-add pull-right">Print</button> 
			</div>
		</div>


		<div class="row">   
			
			<div class="col-md-12">   
				
				<div class="page-header">   
					<div class="row">  
						<div class="col-md-6"><p><strong>Name:</strong> {{data.last_name}}, {{data.first_name}} {{data.middle_name}}</p></div>
						<div class="col-md-6"><p><strong>Address:</strong> {{data.address}}</p></div>
						<div class="col-md-6"><p><strong>Civil Status:</strong> {{data.civil_status}}</p></div>
						<div class="col-md-6"><p><strong>Gender:</strong> {{data.gender}}</p></div>   
						<div class="col-md-12 pull-left notForPrint">  
							<a href="#" role="button" ng-click="getDataPersonalDetailsById(data.id)" data-toggle="modal" data-target="#editPersonalDetailModal">Edit</a>
						</div>
					</div>  
				</div>     
			
				<div class="page-header">
					<h1>Assets</h1>  
				  	<form id="searchContainer" class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query</label>
							<input ng-model="query" type="text" class="form-control" placeholder="Search">
						</div>         
					</form>      
				</div>

				<form id="dataAssetDeleteForm" method="post" action="<?php echo base_url(); ?>index.php/data_inventory/delete_data_asset">
					<div class="table-responsive">
					  	<table class="table">
						  	<thead>   
								<tr>  
									<th class="notForPrint"><input type="checkbox" class="main_check" /></th>
									<th>Asset</th>
									<th>Asset Description</th>  
									<th class="notForPrint">Edit</th>
								</tr>
						  	</thead>  
						  	<tbody>  
								<tr ng-repeat="asset in data.data_assets | filter: query">  
									<td class="notForPrint"><input type="checkbox" name="asset_id[]" value="{{asset.id}}" class="sub_check" /></td>
									<td>{{asset.asset}}</td>
									<td>{{asset.asset_description}}</td>
									<td class="notForPrint"><a href="#" role="button" ng-click="getAssetById(asset.id)" data-toggle="modal" data-target="#editModal">Edit</a></td>  
								</tr>  
								
						  	</tbody>
					  	</table>     

						<button type="submit" class="btn btn-common btn-delete pull-right">
							Delete
						</button>  

					  	<button type="button" class="btn btn-common btn-add pull-right" data-toggle="modal" data-target="#addDataModal">
							Add
						</button>      
					
											
					</div> <!-- end table responsive -->    
				</form>
			</div>

		</div>
	</div>  

	<!-- below modal for add -->
	<div id="addDataModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<form id="addDataAssetForm" action="<?php echo base_url(); ?>index.php/data_inventory/add_data_asset" method="post">
				<div class="modal-content">
			      
			      	<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Assets</h4>
			      	</div>
			     
			      	
			      	<div class="modal-body">      
				      	
				      	<p class="bg-danger confirmation_message">Failed</p>        
				      	
						<div class="row">       

							<div class="col-md-4">   
								<div class="form-group">
									<label for="asset">Asset</label>
									<input type="text" class="form-control" name="asset" id="asset" required>
								</div>
							</div>      

							<div class="col-md-8">   
								<div class="form-group">
									<label for="asset_description">Asset Description</label>
									<input type="text" class="form-control" name="asset_description" id="asset_description" required>
								</div>
							</div>             

							<input type="hidden" name="data_personal_detail_id" value="{{data.id}}">

						</div> <!-- end row -->
				      	
			      	</div> <!-- end modal body --> 
			    
			      	<div class="modal-footer">  
			        	<button type="submit" class="btn btn-add btn-common">Add</button>
			      	</div>  

		    	</div> <!-- end modal content -->  
	    	</form> <!-- end form -->
		</div>
	</div>  <!-- end add modal -->

	<!-- below modal for edit -->  
	<div id="editModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<form id="dataAssetUpdateForm" action="<?php echo base_url(); ?>index.php/data_inventory/update_data_asset" method="post">
				<div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit Asset</h4>
			      </div>
			      <div class="modal-body">   
			      	<p class="bg-danger confirmation_message">Failed</p>      
					
			    	<div class="row">       

						<div class="col-md-4">   
							<div class="form-group">
								<label for="asset">Asset</label>
								<input type="text" class="form-control" name="asset" id="asset" value="{{data_asset.asset}}" required>
							</div>
						</div>      

						<div class="col-md-8">   
							<div class="form-group">
								<label for="asset_description">Asset Description</label>
								<input type="text" class="form-control" name="asset_description" id="asset_description" value="{{data_asset.asset_description}}" required>
							</div>
						</div>             

						<input type="hidden" name="asset_id" value="{{data_asset.id}}">   

					</div> <!-- end row -->


			      </div> <!-- end modal body -->
			      <div class="modal-footer">    
			      	<button type="reset" class="btn btn-add btn-common">Reset</button>
			        <button type="submit" class="btn btn-add btn-common">Update Asset</button>
			      </div>
		    	</div>  
	    	</form>
		</div>
	</div> <!-- end edit modal -->    

	<!-- below modal for edit personal detail --> 
	<div id="editPersonalDetailModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<form id="dataPersonalDetailUpdateForm" action="<?php echo base_url(); ?>index.php/data_inventory/update_data_personal_detail" method="post">
				<div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title" id="myModalLabel">Edit Personal Details</h4>
			      	</div>
			      	<div class="modal-body">   
			      		<p class="bg-danger confirmation_message">Failed</p>        
				      	
						<div class="row">    
							<div class="col-md-4">   
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control" name="first_name" id="first_name" value="{{dataPersonalDetails.first_name}}" required>
								</div>
							</div>      

							<div class="col-md-4">   
								<div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input type="text" class="form-control" name="middle_name" id="middle_name" value="{{dataPersonalDetails.middle_name}}" required>
								</div>
							</div>      

							<div class="col-md-4">   
								<div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control" name="last_name" id="last_name" value="{{dataPersonalDetails.last_name}}" required>
								</div>
							</div>      

							<div class="col-md-12">  
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" class="form-control" name="address" id="address" value="{{dataPersonalDetails.address}}" required>
								</div>
							</div>      

							<div class="col-md-6">  
								<div class="form-group" ng-bind-html="civilStatusHtml">
								</div>
							</div>  

							<div class="col-md-6">  
								<div class="form-group" ng-bind-html="genderHtml">
								</div>
							</div>   

							<input type="hidden" name="id" value="{{dataPersonalDetails.id}}">

						</div> <!-- end row -->
			      </div> <!-- end modal body -->  

			      <div class="modal-footer">    
			      	<button type="reset" class="btn btn-add btn-common">Reset</button>
			        <button type="submit" class="btn btn-add btn-common">Update</button>
			      </div>
		    	</div>  
	    	</form>
		</div>
	</div> <!-- end edit modal -->  
	

</section> <!-- end main section -->      

