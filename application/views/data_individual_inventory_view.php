<section id="mainSection" ng-controller="individualDataInventory">  
	<div class="container">  
		<div class="row">   
			
			<div class="col-md-12">   
				
				<div class="page-header">   
					<div class="row">  
						<div class="col-md-6"><p><strong>Name:</strong> {{data.last_name}}, {{data.first_name}} {{data.middle_name}}</p></div>
						<div class="col-md-6"><p><strong>Address:</strong> {{data.address}}</p></div>
						<div class="col-md-6"><p><strong>Civil Status:</strong> {{data.civil_status}}</p></div>
						<div class="col-md-6"><p><strong>Gender:</strong> {{data.gender}}</p></div>
					</div>  
				</div>     
			
				<div class="page-header">
				  <h1>Assets</h1>
				</div>

				<form id="dataAssetDeleteForm" method="post" action="<?php echo base_url(); ?>index.php/data_inventory/delete_data_asset">
					<div class="table-responsive">
					  	<table class="table">
						  	<thead>   
								<tr>  
									<th><input type="checkbox" class="main_check" /></th>
									<th>Asset</th>
									<th>Asset Description</th>  
									<th>Edit</th>
								</tr>
						  	</thead>  
						  	<tbody>  
								<tr ng-repeat="asset in data.data_assets">  
									<td><input type="checkbox" name="asset_id[]" value="{{asset.id}}" class="sub_check" /></td>
									<td>{{asset.asset}}</td>
									<td>{{asset.asset_description}}</td>
									<td>Edit</td>  
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
	</div>  

	<!-- below modal for edit -->  

	


</section> <!-- end main section -->      

