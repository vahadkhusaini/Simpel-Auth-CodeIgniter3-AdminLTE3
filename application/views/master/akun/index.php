      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Kelola Kelompok Akun</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="card">
      				<div class="card-header">
      					<a href="<?= base_url('master/akun/tambah')?>" id="button-tambah-akun" data-toggle="modal" data-target="#modal-tambah"
      						class="btn btn-primary">
      						<i class="fas fa-plus"></i> Tambah</a>
      				</div>
      				<div class="card-body table-responsive">
      					<table id="example1" class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>No</th>
      								<th>Kode Akun</th>
      								<th>Nama Akun</th>
      								<th>Action</th>
      							</tr>
      						</thead>
      						<tbody>
      							<?php 
								 	$no = 1; 
								  foreach($akun as $ak): ?>
      							<tr>
      								<td><?=$no?></td>
      								<td><?= $ak['id_akun']?></td>
      								<td><?= $ak['nama_akun']?></td>
      								<td>
      									<a href="#" data-toggle="modal" data-target="#modal-edit-akun"
      										data-id="<?= $ak['id_akun'];?>" class="edit-akun btn btn-primary">
      										<i class="fas fa-edit"></i>
      									</a>
      									<a href="#" data-id="<?= $ak['id_akun'];?>"
      										data-nama="<?= $ak['nama_akun'];?>" class="delete-akun btn btn-danger">
      										<i class="fas fa-trash-alt"></i>
      									</a>
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
      
      <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      	aria-hidden="true">
      	<div class="modal-dialog" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
      				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">×</span>
      				</button>
      			</div>
      			<form method="POST" id="tambah-akun" data-url="<?=base_url('master/akun/tambah');?>" action="javascript:void(0)">
				  <div class="modal-body">
      					<div class="form-group row">
      						<label for="staticEmail" class="col-sm-4 col-form-label">Kode Akun</label>
      						<div class="col-sm-8">
      							<input type="text" class="form-control" name="id_akun">
      						</div>
      						
      					</div>
      					<div class="form-group row">
      						<label for="inputPassword" class="col-sm-4 col-form-label">Nama Akun</label>
      						<div class="col-sm-8">
      							<input type="text" class="form-control" name="nama_akun">
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

      <div class="modal fade" id="modal-edit-akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      	aria-hidden="true">
      	<div class="modal-dialog" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
      				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">×</span>
      				</button>
      			</div>
      			<form method="POST" id="edit-akun" data-url="<?=base_url('master/akun/edit');?>" action="javascript:void(0)">
      				<div class="modal-body">
      					<div class="form-group row">
      						<label for="staticEmail" class="col-sm-4 col-form-label">Kode Akun</label>
      						<div class="col-sm-8">
      							<input type="text" readonly class="form-control" name="id_akun">
      						</div>
      						
      					</div>
      					<div class="form-group row">
      						<label for="inputPassword" class="col-sm-4 col-form-label">Nama Akun</label>
      						<div class="col-sm-8">
      							<input type="text" class="form-control" id="namaakun" name="nama_akun">
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