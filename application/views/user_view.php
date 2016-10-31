<section id="mainSection" ng-controller='users'>  
	<div class="container">  
		<div class="row">   
			
			<div class="col-md-12">   
				
				<div class="page-header">
				  <h1>Users</h1>
				</div>

				<form id="userDeleteForm" method="post" action="<?php echo base_url(); ?>index.php/users/delete_user">
					<div class="table-responsive">
					  	<table class="table">
						  	<thead>   
								<tr>  
									<th><input type="checkbox" class="main_check" /></th>
									<th>Username</th>
									<th>Password</th>
									<th>Role</th>   
									<th>Can Add</th>
									<th>Can Edit</th>
									<th>Can Delete</th>
									<th>Edit</th>
								</tr>
						  	</thead>  
						  	<tbody>  
								<tr ng-repeat="user in users">  
									<td><input type="checkbox" name="user_id[]" value="{{user.id}}" class="sub_check" /></td>
									<td>{{user.username}}</td>
									<td>{{user.password}}</td>
									<td>{{user.role}}</td>  
									<td>{{user.can_add}}</td>
									<td>{{user.can_edit}}</td>
									<td>{{user.can_delete}}</td>
									<td><a href="#" role="button" ng-click="getUserById(user.id)" data-toggle="modal" data-target="#editModal">Edit</a></td>
								</tr>  
								

						  	</tbody>
					  	</table>     

						<button type="submit" class="btn btn-common btn-delete pull-right">
							Delete
						</button>  

					  	<button type="button" class="btn btn-common btn-add pull-right" data-toggle="modal" data-target="#addModal">
							Add
						</button>      
					
											
					</div> <!-- end table responsive -->    
				</form>
			</div>

		</div>
	</div>  

	<!-- below modal for add -->
	<div id="addModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<form id="addUserForm" action="<?php echo base_url(); ?>index.php/users/add_user" method="post">
				<div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add User</h4>
			      </div>
			      <div class="modal-body">   
			      	<p class="bg-danger confirmation_message">Failed</p>      

			      	<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>  
					
					<div class="form-group">
						<label for="role">User Priveleges</label>
						<div class="checkbox">
						  <label>
						    <input type="checkbox" name="can_add" value="1"> &nbsp; Can Add
						  </label>
						</div>  
						<div class="checkbox">
						  <label>
						    <input type="checkbox" name="can_edit" value="1"> &nbsp; Can Edit
						  </label>
						</div>   
						<div class="checkbox">
						  <label>
						    <input type="checkbox" name="can_delete" value="1"> &nbsp; Can Delete
						  </label>
						</div>
					</div>  
				
			      </div> <!-- end modal body -->
			      <div class="modal-footer">  
			        <button type="submit" class="btn btn-add btn-common">Add User</button>
			      </div>
		    	</div>  
	    	</form>
		</div>
	</div>  

	<!-- below modal for edit -->  

	<div id="editModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<form id="updateUserForm" action="<?php echo base_url(); ?>index.php/users/update_user" method="post">
				<div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
			      </div>
			      <div class="modal-body">   
			      	<p class="bg-danger confirmation_message">Failed</p>      

			      	<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{username}}" required>
					</div>
					<div class="form-group">
						<label for="password">Password (Leave password blank if you don't want to change your current password.)</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>  
					
					<div class="form-group">
						<label for="role">User Priveleges</label>
						<div class="checkbox">
							<label ng-bind-html="canAdd">
						  	</label>
						</div>  
						<div class="checkbox">
							<label ng-bind-html="canEdit">
							</label>
						</div>   
						<div class="checkbox">
							<label ng-bind-html="canDelete">
							</label>
						</div>
					</div>    

					<input type="hidden" name="user_update_id" value={{id}}>
				
			      </div> <!-- end modal body -->
			      <div class="modal-footer">    
			      	<button type="reset" class="btn btn-add btn-common">Reset</button>
			        <button type="submit" class="btn btn-add btn-common">Update User</button>
			      </div>
		    	</div>  
	    	</form>
		</div>
	</div>  



</section> <!-- end main section -->      

