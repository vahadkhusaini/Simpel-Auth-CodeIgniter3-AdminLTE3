      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Pemesanan</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<section class="content">
      		<!-- Begin Page Content -->
      		<div class="container-fluid">

      			<!-- Basic Card Example -->
      			<div class="card card=default">
      				<div class="card-header">
      					<h6 class="m-0 font-weight-bold text-primary">Form Pemesanan</h6>
      				</div>
      				<div class="card-body">
      					<form action="javascript:void(0)" id="tambah-pemesanan" method="post">
      						<div class="modal-body">
      							<div class="row pr-4">
      								<div class="col-md-6">
      									<input type="hidden" class="form-control" readonly name="idpembelian">
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">No
      											Pemesanan</label>
      										<div class="col-md-7">
      											<input type="text" id="supplier" class="form-control"
      												name="no_pemesanan" readonly value="<?=$auto_kode?>">
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">Tanggal
      											Pemesanan</label>
      										<div class="col-md-7">
      											<div class="input-group">
      												<div class="input-group-prepend">
      													<span class="input-group-text">
      														<i class="far fa-calendar-alt"></i>
      													</span>
      												</div>
      												<input type="text" id="basicDate" name="tanggal"
      													class="form-control">
      											</div>
      										</div>
      									</div>
      								</div>
      								<div class="col-md-6 pl-5">
      									<div class="form-group row">
      										<label for="inputPassword"
      											class="col-md-4 col-form-label">Supplier</label>
      										<div class="col-md-8">
      											<div class="input-group">
      												<input type="text" readonly class="form-control"
      													name="id_supplier" id="id_supplier"
      													placeholder="Kode Supplier">
      												<div class="input-group-append">
      													<button data-toggle="modal" data-target="#Modal-Supplier"
      														class="btn btn-outline-primary"
      														type="button">Pilih</button>
      												</div>
      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="nama_supplier" class="col-md-4 col-form-label"></label>
      										<div class="col-md-8">
      											<input type="text" readonly placeholder="Nama Supplier"
      												class="form-control" id="nama_supplier" name="nama_supplier">
      										</div>
      									</div>
      								</div>
      							</div>
      						</div>
      						<!-- Form Element sizes -->
      						<div class="card card-success">
      							<div class="card-header">
      								<h3 class="card-title">Daftar Barang</h3>
      							</div>
      							<div class="card-body">
      								<div class="row pr-4">
      									<div class="col-md-6">
      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-5 col-form-label">
      												Kode Barang
      											</label>
      											<div class="col-md-7">
      												<div class="input-group">
      													<input type="text" class="form-control" name="kode_barang"
      														readonly id="kode_barang" placeholder="Kode Barang">
      													<div class="input-group-append">
      														<button data-toggle="modal" data-target="#Modal-Barang"
      															class="btn btn-outline-success"
      															type="button">Pilih</button>
      													</div>
      												</div>
      											</div>
      										</div>
      										<div class="form-group row">
      											<label for="barcode" class="col-md-5 col-form-label">
      												Barcode
      											</label>
      											<div class="col-md-7">
      												<input type="text" class="form-control" id="barcode"
      													placeholder="Kode Barcode" readonly name="barcode">
      											</div>
      										</div>

      										<div class="form-group row">
      											<label for="nama_barang" class="col-md-5 col-form-label">
      												Nama Barang
      											</label>
      											<div class="col-md-7">
      												<input type="text" class="form-control" id="nama_barang"
      													placeholder="Nama Barang" readonly name="nama_barang">
      											</div>
      										</div>
											<div class="form-group row">
      											<label for="nama_barang" class="col-md-5 col-form-label">
      												Pajak
      											</label>
      											<div class="col-md-7">
													<select class="form-control" id="pajak" name="pajak">
														<option selected disabled>Pilih Pajak</option>
														<option value="0">Tidak ada</option>
														<option value="1">PPN</option>
													</select>
      											</div>
      										</div>
      									</div>
      									<div class="col-md-6 pl-5">
      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-5 col-form-label">
      												Harga
      											</label>
      											<div class="col-md-7">
      												<div class="input-group">
      													<div class="input-group-prepend">
      														<span class="input-group-text"
      															id="basic-addon1">Rp.</span>
      													</div>
      													<input type="number" id="harga_barang" name="harga_barang"
      														class="form-control">
      												</div>
      											</div>
      										</div>
      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-5 col-form-label">
      												Jumlah Barang
      											</label>
      											<div class="col-md-4">
      													<input type="number" name="jumlah" id="jumlah"
      														class="form-control">
      											</div>
												  <div class="col-md-3">
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
      											<label for="inputPassword" class="col-md-5 col-form-label">
      												Total
      											</label>
      											<div class="col-md-7">
      												<div class="input-group">
      													<div class="input-group-prepend">
      														<span class="input-group-text"
      															id="basic-addon1">Rp.</span>
      													</div>
      													<input type="number" name="total" id="total" readonly
      														class="form-control">
      												</div>
      											</div>
      										</div>
      									</div>
      								</div>
      								<!-- End Row -->
      								<div class="row">
      									<div class="col-md-6 pl-4">
      										<div class="form-group row pt-3">
      											<input type="button" id="add_to_cart" class="btn btn-success mr-2"
      												value="TAMBAH">
      											<button class="btn btn-warning">RESET</button>
      										</div>
      									</div>
      								</div>
      								<div class="row">
      									<div class="col-md-12">
      										<div class="col-lg-12">
      											<div class="table-responsive">
      												<table class="table table-bordered table-hover table-striped">
      													<thead>
      														<tr class="info">
      															<th>No</th>
      															<th>Barcode</th>
      															<th>Nama Barang</th>
      															<th>Qty</th>
																<th>Satuan</th>
      															<th>Harga</th>
      															<th>Total</th>
      															<th>PPN (10%)</th>
      															<th>Action</th>
      														</tr>
      													</thead>
      													<tbody id="show_cart">
      													</tbody>
      												</table>
      											</div>
      										</div>
      									</div>
      								</div>
      							</div>
      							<!-- /.card-body -->
      						</div>
      						<!-- /.card -->
      						<div class="modal-footer">
      							<button class="btn btn-primary" type="submit">Simpan</button>
      						</div>
      					</form>
      				</div>
      			</div>

      		</div>
      	</section>
      </div>
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

      <div class="modal fade bd-example-modal-lg" id="Modal-Barang">
      	<div class="modal-dialog modal-lg">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Daftar Barang</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<div class="table-responsive">
      					<table class="table table-hover table-bordered" id="example2" width="100%" cellspacing="0">
      						<thead>
      							<tr>
      								<th>No</th>
      								<th>Kode Barang</th>
      								<th>Nama Barang </th>
      								<th>Harga Barang</th>
      							</tr>
      						</thead>
      						<?php 
						$no=1; 
						foreach ($barang as $row):
                    	?>
      						<tr class="barang" data-kode="<?= $row['id_barang'] ?>"
      							data-barcode="<?= $row['kode_barcode'] ?>"
								data-nama="<?= $row['nama_barang'] ?>"
								  
      							data-harga="<?= $row['harga_beli'] ?>" 
								data-satuan="<?= $row['satuan'] ?>">
      							<td><?= $no; ?></td>
      							<td><?= $row['id_barang'] ?></td>
      							<td><?= $row['nama_barang'] ?></td>
      							<td><?= $row['harga_beli'] ?></td>
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
