      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Kelola Barang</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div id="msg"></div>
      			<div class="card card-primary card-outline card-outline-tabs">
      				<div class="card-header p-0 border-bottom-0">
      					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
      						<li class="nav-item">
      							<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
      								href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
      								aria-selected="true">Barang</a>
      						</li>
      						<li class="nav-item">
      							<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
      								href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
      								aria-selected="false">Kategori</a>
      						</li>
      					</ul>
      				</div>
      				<div class="card-body">
      					<div class="tab-content" id="custom-tabs-one-tabContent">
      						<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
      							aria-labelledby="custom-tabs-one-home-tab">
      							<!-- /.card -->
      							<div class="card">
      								<div class="card-header">
      									<a href="<?= base_url('master/barang/tambah')?>" data-toggle="modal"
      										data-target="#modal-tambah-barang" class="btn btn-primary">
      										<i class="fas fa-plus"></i> Tambah</a>
      								</div>
      								<div class="card-body table-responsive">
      									<table id="example" class="table table-bordered table-striped">
      										<thead>
      											<tr>
      												<th>No</th>
      												<th>Kode Barcode</th>
      												<th>Nama Barang</th>
      												<th>Kategori</th>
													<th>Stok</th>									  
      												<th>Harga Beli</th>
      												<th>Action</th>
      											</tr>
      										</thead>
      										<tbody id="show_data">

      										</tbody>
      									</table>
      								</div>
      								<!-- /.card-body -->
      							</div>
      							<!-- /.card -->
      						</div>
      						<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
      							aria-labelledby="custom-tabs-one-profile-tab">
      							<!-- /.card -->
      							<div class="card">
      								<div class="card-header">
      									<a href="<?= base_url('master/barang/tambah')?>" data-toggle="modal"
      										data-target="#modal-tambah-kategori" class="btn btn-primary">
      										<i class="fas fa-plus"></i> Tambah</a>
      								</div>
      								<div class="card-body table-responsive p-0">
      									<table class="table table-bordered table-striped">
      										<thead>
      											<tr>
      												<th>No</th>
      												<th>Kode Kategori</th>
      												<th>Nama Kategori</th>
      												<th>Action</th>
      											</tr>
      										</thead>
      										<tbody>
      											<?php 
								 	$no = 1; 
								  foreach($kategori as $k): ?>
      											<tr>
      												<td><?=$no?></td>
      												<td><?= $k['id_kategori'];?></td>
      												<td><?= $k['nama_kategori']?></td>
      												<td>
      													<a href="#" data-toggle="modal"
      														data-target="#modal-edit-kategori"
      														data-id="<?= $k['id_kategori'];?>"
      														class="edit-kategori btn btn-primary">
      														<i class="fas fa-edit"></i>
      													</a>
      													<a href="#" data-id="<?= $k['id_kategori'];?>"
      														data-nama="<?= $k['nama_kategori'];?>"
      														class="delete-kategori btn btn-danger">
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
      					</div>
      				</div>

      			</div>
      	</section>
      </div>

      <!-- Modal Tambah Barang -->
      <div class="modal fade" id="modal-tambah-barang">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Tambah Barang</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="tambah-barang"
      					data-url="<?=base_url('master/barang/tambah_barang')?>" method="post">
      					<div class="card-body">
      						<!--- Ini untuk inputan Nama Supplier -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Barang</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" value="<?= $auto_kode_barang?>" readonly
      									name="id_barang">
      							</div>
      						</div>
      						<!--- Akhir inputan Nama Supplier -->
      						<!--- Ini untuk inputan Nama Supplier -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Kode Barcode</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" name="kode_barcode">
      							</div>
      						</div>
      						<!--- Akhir inputan Nama Supplier -->

      						<!--- Ini untuk inputan No Telepon -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Barang</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" name="nama_barang">
      							</div>
      						</div>
      						<!--- Akhir inputan No Telepon -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Kategori</label>
      							<div class="col-sm-8">
      								<select class="form-control" id="kategori" name="kategori">
      									<option disabled selected value="">Pilih Kategori</option>
      									<?php foreach($kategori as $k): ?>
      									<option value="<?= $k['id_kategori'];?>"><?= $k['nama_kategori'];?></option>
      									<?php endforeach; ?>
      								</select>
      							</div>
      						</div>
      						<!--- Ini untuk inputan Alamat -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Harga Beli</label>
      							<div class="col-sm-8">
      								<input type="number" class="form-control" name="harga_beli">
      							</div>
      						</div>
      						<!--- Akhiran inputan Alamat -->

      						<!--- Ini untuk inputan-->
      						<div class="form-group row">

      							<label for="inputPassword" class="col-sm-4 col-form-label">Stok</label>
      							<div class="col-sm-3">
      								<input type="number" class="form-control" name="stok">
      							</div>

      							<label for="inputPassword" class="col-sm-2 col-form-label">Satuan</label>
      							<div class="col-sm-3">
      								<select class="form-control" id="satuan" name="satuan">
      									<option disabled selected value="">Pilih</option>
      									<option value="pcs">PCS</option>
      									<option value="liter">Liter</option>
      									<option value="botol">Botol</option>
      									<option value="box">Box</option>
      									<option value="strip">Strip</option>
      								</select>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-md-4 col-form-label">Supplier</label>
      							<div class="col-md-8">
      								<div class="input-group">
      									<input type="hidden" readonly id="id_supplier" class="form-control"
      										name="id_supplier">
      									<input type="text" readonly id="nama_supplier" class="form-control"
      										name="nama_supplier" placeholder="Nama Supplier">
      									<div class="input-group-append">
      										<button data-toggle="modal" data-target="#Modal-Supplier"
      											class="btn btn-outline-primary" type="button">Pilih</button>
      									</div>
      								</div>
      							</div>
      						</div>
      						<!--- Akhiran inputan -->
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
      <!-- Akhir Modal Tambah Barang -->

      <!-- Modal Edit Barang -->
      <div class="modal fade" id="modal-edit-barang">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Edit Barang</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="edit-barang"
      					data-url="<?=base_url('master/barang/edit_barang');?>" method="post">
      					<div class="card-body">
      						<!--- Ini untuk inputan Nama Supplier -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Barang</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" readonly name="id_barang">
      							</div>
      						</div>
      						<!--- Akhir inputan Nama Supplier -->
      						<!--- Ini untuk inputan Nama Supplier -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Kode Barcode</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" name="kode_barcode">
      							</div>
      						</div>
      						<!--- Akhir inputan Nama Supplier -->

      						<!--- Ini untuk inputan No Telepon -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Barang</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" name="nama_barang">
      							</div>
      						</div>
      						<!--- Akhir inputan No Telepon -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Kategori</label>
      							<div class="col-sm-8">
      								<select class="form-control" id="kategori" name="kategori">
      									<option disabled selected value="">Pilih Kategori</option>
      									<?php foreach($kategori as $k): ?>
      									<option value="<?= $k['id_kategori'];?>"><?= $k['nama_kategori'];?></option>
      									<?php endforeach; ?>
      								</select>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Harga Beli</label>
      							<div class="col-sm-8">
      								<input type="number" class="form-control" name="harga_beli">
      							</div>
      						</div>
      						<!--- Akhiran inputan Alamat -->

      						<!--- Ini untuk inputan-->
      						<div class="form-group row">

      							<label for="inputPassword" class="col-sm-4 col-form-label">Stok</label>
      							<div class="col-sm-3">
      								<input type="number" class="form-control" name="stok">
      							</div>

      							<label for="inputPassword" class="col-sm-2 col-form-label">Satuan</label>
      							<div class="col-sm-3">
      								<select class="form-control" id="satuan" name="satuan">
      									<option disabled selected value="">Pilih</option>
      									<option value="pcs">PCS</option>
      									<option value="liter">Liter</option>
      									<option value="botol">Botol</option>
      									<option value="box">Box</option>
      									<option value="strip">Strip</option>
      								</select>
      							</div>
      						</div>
      						<div class="form-group row">
      							<label for="inputPassword" class="col-md-4 col-form-label">Supplier</label>
      							<div class="col-md-8">
      								<div class="input-group">
      									<input type="hidden" readonly id="id_supplier" class="form-control"
      										name="id_supplier">
      									<input type="text" readonly id="nama_supplier" class="form-control"
      										name="nama_supplier">
      									<div class="input-group-append">
      										<button data-toggle="modal" data-target="#Modal-Supplier"
      											class="btn btn-outline-primary" type="button">Pilih</button>
      									</div>
      								</div>
      							</div>
      						</div>
      					</div>
      					<!--- Akhiran inputan -->
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
      <!-- Akhir Modal Edit Barang -->

      <div class="modal fade" id="modal-tambah-kategori">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Tambah Kategori</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" data-url="<?=base_url('master/barang/tambah_kategori');?>"
      					id="tambah-kategori" method="post">
      					<div class="card-body">
      						<!--- Ini untuk inputan Nama Supplier -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Kategori</label>

      							<div class="col-sm-8">
      								<input type="text" class="form-control" value="<?= $auto_kode_kategori?>" readonly
      									name="id_kategori">
      							</div>
      						</div>
      						<!--- Akhir inputan Nama Supplier -->

      						<!--- Ini untuk inputan No Telepon -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Kategori</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" name="nama_kategori">
      							</div>
      						</div>
      						<!--- Akhiran inputan -->
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

      <div class="modal fade" id="modal-edit-kategori">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Edit Kategori</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<form action="javascript:void(0)" id="edit-kategori"
      					data-url="<?=base_url('master/barang/edit_kategori');?>" method="post">
      					<div class="card-body">
      						<!--- Ini untuk inputan Nama Supplier -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">ID Kategori</label>

      							<div class="col-sm-8">
      								<input type="text" class="form-control" readonly name="id_kategori">
      							</div>
      						</div>
      						<!--- Akhir inputan Nama Supplier -->

      						<!--- Ini untuk inputan No Telepon -->
      						<div class="form-group row">
      							<label for="inputPassword" class="col-sm-4 col-form-label">Nama Kategori</label>
      							<div class="col-sm-8">
      								<input type="text" class="form-control" name="nama_kategori">
      							</div>
      						</div>
      						<!--- Akhiran inputan -->
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

      <div class="modal fade bd-example-modal-lg" id="Modal-Supplier">
      	<div class="modal-dialog modal-lg">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Daftar Supplier</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<div class="table-responsive">
      					<table class="table table-hover table-bordered" width="100%" cellspacing="0">
      						<thead>
      							<tr>
      								<th>No</th>
      								<th>ID</th>
      								<th>Nama </th>
      								<th>Alamat</th>
      							</tr>
      						</thead>
      						<?php 
						$no=1; 
						foreach ($supplier as $row):
                    	?>
      						<tr class="supplier" data-id="<?= $row['id_supplier'] ?>"
      							data-nama="<?= $row['nama_supplier'] ?>">
      							<td><?= $no; ?></td>
      							<td><?= $row['id_supplier'] ?></td>
      							<td><?= $row['nama_supplier'] ?></td>
      							<td><?= $row['alamat'] ?></td>
      						</tr>
      						<?php
							$no++;
							endforeach;
							?>
      					</table>
      				</div>
      			</div>

      		</div>
      		<!-- /.modal-content -->
      	</div>
      	<!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

	  
