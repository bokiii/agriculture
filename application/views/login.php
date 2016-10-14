
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Kagawaran ng Pagsasaka.</h3>
							<h1 class="white typed">Department of Agriculture</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Login</h3>   

				<form action="<?php echo base_url() . 'index.php/process/process_login'; ?>" method="post" class="popup-form" id="loginView">
					<div class="alert alert-danger" role="alert">Enter Valid Username, Password and Role</div>
					<input type="text" name="username" class="form-control form-white" placeholder="Username">
					<input type="password" name="password" class="form-control form-white" placeholder="Password">
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Role
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">Admin</a></li>
							<li class="animated lightSpeedIn"><a href="#">User</a></li>
						</ul>
					</div>   
					<input type="hidden" name="role" id="role" value="">
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
	
