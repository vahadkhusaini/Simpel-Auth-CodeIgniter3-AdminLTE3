      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Kelola Pengguna</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="card">
      				<div class="card-header">
      					<a href="<?= base_url('master/pengguna/tambah')?>" data-toggle="modal"
      						data-target="#modal-tambah" class="btn btn-primary">
      						<i class="fas fa-plus"></i> Tambah</a>
      				</div>
      				<div class="card-body table-responsive">
      					<table class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>No</th>
      								<th>Nama Pengguna</th>
      								<th>Status</th>
                      				<th>Hak Akses</th>
      								<th>Action</th>
      							</tr>
      						</thead>
      						<tbody>
      							<?php 
								 	$no = 1; 
								  foreach($user as $u): ?>
      							<tr>
									
      								<td><?=$no?></td>
      								<td><?= $u['nama_pengguna'];?></td>
									<td><?= $u['status'] == '1' ? 
									  '<a href="javascript:void(0)" class="badge badge-success item_hapus">Aktif</a>' 
									  : 
									  '<a href="javascript:void(0)" class="badge badge-danger item_hapus">Tidak Aktif</a>' ?>
									</td>
                  <td><?= $u['hak_akses'] == '1' ? 'Superadmin' : 'Admin'; ?>
                  
                  </td>
      								<td>
      									<button data-toggle="modal"
      										data-target="#modal-edit-user"  <?= $this->session->userdata('username') == $u['nama_pengguna'] ? 'disabled' : '' ?> data-id="<?= $u['id_pengguna'];?>" class="edit-pengguna btn btn-primary">
      										<i class="fas fa-edit"></i>
      									</button>
      									<button <?= $this->session->userdata('username') == $u['nama_pengguna'] ? 'disabled' : '' ?> 
										  data-id="<?= $u['id_pengguna'];?>" data-nama="<?= $u['nama_pengguna'];?>"
      										class="delete-user btn btn-danger">
      										<i class="fas fa-trash-alt"></i>
      									</button>
      								</td>
      							</tr>
      							<?php 
									$no++;
								endforeach; ?>
      						</tbody>
      					</table>
      				</div>
      				<!-- /.card-body -->
      			</div>
      			<!-- /.card -->
      		</div>
      	</section>
      </div>

      <div class="modal fade" id="modal-tambah">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Tambah Pengguna</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="tambah_pengguna" data-url="<?=base_url('master/pengguna/tambah')?>" method="POST">
      					<div class="card-body">
						  <div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Pengguna</label>
      							<div class="col-sm-8">
      								<input readonly type="text" name="id_pengguna" value="<?= $auto_kode ?>" class="form-control"
      								>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Pengguna</label>
      							<div class="col-sm-8">
      								<input type="text" name="nama_pengguna" class="form-control"
      									id="exampleInputEmail1" placeholder="Nama Pengguna">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Lengkap</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" id="nama_lengkap"
      									placeholder="Nama Lengkap" name="nama_lengkap">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
      							<div class="col-sm-8">
      								<input type="password" name="password" class="form-control" id="password"
      									placeholder="Password">
      							</div>
      						</div>
                  <div class="form-group row">
      							<label for="exampleInputEmail1" class="col-sm-4 col-form-label">Hak Akses</label>
      							<div class="col-sm-8">
                        <select class="form-control" id="satuan" name="hakakses">
                          <option disabled selected value="">Pilih</option>
                          <option value="1">Superadmin</option>
                          <option value="0">Admin</option>
                        </select>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="exampleInputEmail1" class="col-sm-4 col-form-label">Status</label>
      							<div class="col-sm-8 pt-2">
      								<div class="input-group">
      									<div class="form-check form-check-inline pr-3">
      										<input class="form-check-input" type="radio" name="status"
      											id="aktif" value="1" checked>
      										<label class="form-check-label" for="aktif">
      											Aktif
      										</label>
      									</div>
      									<div class="form-check form-check-inline">
      										<input class="form-check-input" type="radio" name="status"
      											id="tidak-aktif" value="0">
      										<label class="form-check-label" for="tidak-aktif">
      											Tidak Aktif
      										</label>
      									</div>
      								</div>
      							</div>
      						</div>
      						<div class="form-group float-right pt-5">
      							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      							<button type="submit" class="btn btn-primary ml-2">Simpan</button>
      						</div>
      					</div>
      				</form>
      			</div>

      		</div>
      		<!-- /.modal-content -->
      	</div>
      	<!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-edit-user">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Edit Pengguna</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="edit-pengguna" data-url="<?=base_url('master/pengguna/edit')?>" method="post">
      					<div class="card-body">
						  <div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Pengguna</label>
      							<div class="col-sm-8">
      								<input readonly type="text" name="id_pengguna" class="form-control"
      									>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Pengguna</label>
      							<div class="col-sm-8">
      								<input type="text" name="nama_pengguna" class="form-control"
      								>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Lengkap</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control"
      								 name="nama_lengkap">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="exampleInputEmail1" class="col-sm-4 col-form-label">Status</label>
      							<div class="col-sm-8 pt-2">
      								<div class="input-group">
      									<div class="form-check form-check-inline pr-3">
      										<input class="form-check-input" type="radio" name="status"
      											id="edit-aktif" value="1">
      										<label class="form-check-label" for="edit-aktif">
      											Aktif
      										</label>
      									</div>
      									<div class="form-check form-check-inline">
      										<input class="form-check-input" type="radio" name="status"
      											id="edit-tidak-aktif" value="0">
      										<label class="form-check-label" for="edit-tidak-aktif">
      											Tidak Aktif
      										</label>
      									</div>
      								</div>
      							</div>
      						</div>
							  <div class="form-group float-right pt-5">
      							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      							<button type="submit" class="btn btn-primary ml-2">Simpan</button>
      						</div>
      					</div>
      				</form>
      			</div>

      		</div>
      		<!-- /.modal-content -->
      	</div>
      	<!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<script>
 
</script>