      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Kelola Supplier</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="card">
      				<div class="card-header">
      					<a href="<?= base_url('master/supplier/tambah')?>" data-toggle="modal"
      						data-target="#modal-tambah" class="btn btn-primary">
      						<i class="fas fa-plus"></i> Tambah</a>
      				</div>
      				<div class="card-body table-responsive">
      					<table id="example1" class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>No</th>
      								<th>ID Supplier</th>
      								<th>Nama Supplier</th>
      								<th>No Telepon</th>
      								<th>Alamat</th>
      								<th>Action</th>
      							</tr>
      						</thead>
      						<tbody>
      							<?php 
								 	$no = 1; 
								  foreach($supplier as $s): ?>
      							<tr>
      								<td><?=$no?></td>
      								<td><?= $s['id_supplier']?></td>
      								<td><?= $s['nama_supplier']?></td>
      								<td><?= $s['no_telepon']?></td>
      								<td><?= $s['alamat']?></td>
      								<td>
      									<a href="#" data-toggle="modal" data-target="#modal-edit-supplier"
      										data-id="<?= $s['id_supplier'];?>" class="edit-supplier btn btn-primary">
      										<i class="fas fa-edit"></i>
      									</a>
      									<a href="#" data-id="<?= $s['id_supplier'];?>"
      										data-nama="<?= $s['nama_supplier'];?>" class="delete-supplier btn btn-danger">
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

      <div class="modal fade" id="modal-tambah">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Tambah Supplier</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="tambah-supplier" data-url="<?=base_url('master/supplier/tambah');?>" method="post">
      					<div class="card-body">
                          <div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Supplier</label>
      							<div class="col-sm-8">
      								<input type="text" name="id_supplier" readonly class="form-control"
      								value="<?= $auto_kode_supplier?>">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Supplier</label>
      							<div class="col-sm-8">
      								<input type="text" name="nama_supplier" class="form-control"
      									id="exampleInputEmail1" placeholder="Nama Supplier">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">No Telepon</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control"
      									placeholder="No Telepon" name="no_telepon">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
      							<div class="col-sm-8">
      								<textarea type="text" name="alamat" class="form-control"
      									placeholder="Alamat"></textarea>
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

      <div class="modal fade" id="modal-edit-supplier">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Edit Supplier</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="edit-supplier" data-url="<?=base_url('master/supplier/edit');?>" method="post">
      					<div class="card-body">
                          <div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Supplier</label>
      							<div class="col-sm-8">
      								<input type="text" name="id_supplier" readonly class="form-control"
      								>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Supplier</label>
      							<div class="col-sm-8">
      								<input type="text" name="nama_supplier" class="form-control"
      									id="exampleInputEmail1">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">No Telepon</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control"
      								 name="no_telepon">
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
      							<div class="col-sm-8">
      								<textarea type="text" id="alamat" name="alamat" class="form-control"
      								></textarea>
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