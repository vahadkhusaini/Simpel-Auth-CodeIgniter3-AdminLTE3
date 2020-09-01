<body onload="startTime()" class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!--  -->

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" id="base_url" data-url="<?=base_url()?>" class="nav-link">
						<div id="txt"></div>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">|</a>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
						<a href="#" data-toggle="modal" data-target="#modal-edit-profile" class="dropdown-item">
							<i class="fas fa-user mr-2"></i> Ubah Profile
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-changepass">
							<i class="fas fa-key mr-2"></i> Ubah Password 
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('auth/logout');?>" id="logout" class="dropdown-item">
							<i class="fas fa-sign-out-alt text-danger mr-2"></i><span class="text-danger">Keluar</span>
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<div class="modal fade" id="modal-edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      	aria-hidden="true">
      	<div class="modal-dialog" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
      				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">×</span>
      				</button>
      			</div>
      			<form method="POST" id="edit-profile" data-url="<?=base_url('auth/edit_profile')?>" action="javascript:void(0)">
				  <div class="modal-body">
      					<div class="form-group row">
      						<label for="staticEmail" class="col-sm-4 col-form-label">Nama Pengguna</label>
      						<div class="col-sm-8">
							  	<input type="hidden" class="form-control" value="<?=$this->session->userdata('id')?>" name="id">
      							<input type="text" class="form-control" value="<?=$this->session->userdata('username')?>" name="username">
      						</div>
      						
      					</div>
      					<div class="form-group row">
      						<label for="inputPassword" class="col-sm-4 col-form-label">Nama Lengkap</label>
      						<div class="col-sm-8">
      							<input type="text" value="<?=$this->session->userdata('name')?>" class="form-control" name="name">
      						</div>
      					</div>
      				</div>
      				<div class="modal-footer">
      					<button class="btn btn-primary" type="submit">Simpan</button>
      				</div>
      			</form>
      		</div>
      	</div>
      </div>

	  <div class="modal fade" id="modal-changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      	aria-hidden="true">
      	<div class="modal-dialog" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
      				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">×</span>
      				</button>
      			</div>
      			<form method="POST" id="change-password" data-url="<?=base_url('auth/change_password');?>" action="javascript:void(0)">
				  <div class="modal-body">
      					<div class="form-group row">
      						<label for="staticEmail" class="col-sm-4 col-form-label">Password Lama</label>
      						<div class="col-sm-8">
      							<input type="password" class="form-control" name="oldpass">
      						</div>
      						
      					</div>
      					<div class="form-group row">
      						<label for="inputPassword" class="col-sm-4 col-form-label">Password Baru</label>
      						<div class="col-sm-8">
      							<input type="password" class="form-control" name="newpass">
      						</div>
      					</div>
      				</div>
      				<div class="modal-footer">
      					<button class="btn btn-primary" type="submit">Simpan</button>
      				</div>
      			</form>
      		</div>
      	</div>
      </div>
