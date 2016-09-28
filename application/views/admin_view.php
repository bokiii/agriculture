
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
				...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sucess">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	
	
	
























	
	
