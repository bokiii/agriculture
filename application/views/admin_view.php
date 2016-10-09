
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Welcome <?php echo ucwords($this->session->userdata('username')); ?></h3>
							<h1 class="white typed">Department of Agriculture System</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				
				<div class="col-md-3">
					<div class="intro-table">  
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usersModal">Users</button>
					</div>
				</div> <!-- end col md 3 -->
				
				<div class="col-md-3">
					<div class="intro-table">
						<button type="button" class="btn btn-primary">Categories</button>
					</div>
				</div> <!-- end col md 3 --> 	 

			</div>
		</div>
	</section>    

	<div class="modal fade admin-modal" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="Users">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Users</h4>
				</div>
				<div class="modal-body">
					
					<div class="table-responsive">
					  <table class="table">
					   	<tr>
					   		<td>Action</td>
					   		<td>Username</td>
					   		<td>Password</td>  
					   		<td>Priveleges</td>  
					   		<td>Execute Action</td>  
					   	</tr>  
					   	<tr>  
							<td>  
								<label class="radio-inline">
								  <input type="radio" name="action" id="None" class="selectNoneClick" value="None" checked> None
								</label>
								<label class="radio-inline">
								  <input type="radio" name="action" id="Edit" class="selectEditClick" value="Edit"> Edit
								</label>
								<label class="radio-inline">
								  <input type="radio" name="action" id="Delete" class="selectDeleteClick" value="Delete"> Delete
								</label>
							</td>	
							<td class="hasValue"><input disabled type="text" value="Sample"></td>
							<td class="hasValue"><input disabled type="text" value="Sample"></td>  
							<td class="priveleges">  
								<label class="checkbox-inline">
								  <input type="checkbox" class="privelege_check" value="can_add" disabled> Can Add
								</label>
								<label class="checkbox-inline">
								  <input type="checkbox" class="privelege_check" value="can_delete" disabled> Can Delete
								</label>
								<label class="checkbox-inline">
								  <input type="checkbox" class="privelege_check" value="can_edit" disabled> Can Edit
								</label>
							</td>
							<td class="select-action">  
								<button disabled class="btn btn-select-action" data-dismiss="modal">Select Action</button>
							</td>
						</tr> 	  
						<tr>  
							<td>  
								<label class="radio-inline">
								  <input type="radio" name="action2" id="None" class="selectNoneClick" value="None" checked> None
								</label>
								<label class="radio-inline">
								  <input type="radio" name="action2" id="Edit" class="selectEditClick" value="Edit"> Edit
								</label>
								<label class="radio-inline">
								  <input type="radio" name="action2" id="Delete" class="selectDeleteClick" value="Delete"> Delete
								</label>
							</td>	
							<td class="hasValue"><input disabled type="text" value="Sample"></td>
							<td class="hasValue"><input disabled type="text" value="Sample"></td>   
							<td class="priveleges">  
								<label class="checkbox-inline">
								  <input type="checkbox" class="privelege_check" value="can_add" disabled> Can Add
								</label>
								<label class="checkbox-inline">
								  <input type="checkbox" class="privelege_check" value="can_delete" disabled> Can Delete
								</label>
								<label class="checkbox-inline">
								  <input type="checkbox" class="privelege_check" value="can_edit" disabled> Can Edit
								</label>
							</td>
							<td class="select-action">  
								<button disabled class="btn btn-select-action" data-dismiss="modal">Select Action</button>
							</td>
						</tr> 		  
						
						

					  </table>
					</div>

				
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	
	
	
























	
	
