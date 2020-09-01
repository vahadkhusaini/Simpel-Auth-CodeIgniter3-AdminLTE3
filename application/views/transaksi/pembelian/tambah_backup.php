      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Pembelian</h1>
      				</div>
      				<div class="col-sm-6">
      					<ol class="breadcrumb float-sm-right">
      						<li class="breadcrumb-item"><a href="#">Home</a></li>
      						<li class="breadcrumb-item active">Advanced Form</li>
      					</ol>
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
      					<h6 class="m-0 font-weight-bold text-primary">Form Pembelian</h6>
      				</div>
      				<div class="card-body">
      					<form method="post" action="<?=base_url('admin/akun/tambah'); ?>">
      						<div class="modal-body">
      							<div class="row pr-4">
      								<div class="col-md-4">
      									<input type="hidden" class="form-control" readonly name="idpembelian">
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">No
      											Pemesanan</label>
      										<div class="col-md-7">
      											<div class="input-group">
      												<input type="text" id="supplier" class="form-control"
      													name="no_pemesanan" placeholder="No Pemesanan">
      												<div class="input-group-append">
      													<button data-toggle="modal" data-target="#Modal-Pemesanan"
      														class="btn btn-outline-primary"
      														type="button">Pilih</button>
      												</div>
      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">No
      											Nota</label>
      										<div class="col-md-7">
      											<input type="text" class="form-control" name="no_nota">
      										</div>
      									</div>

      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">Tanggal
      											Beli</label>
      										<div class="col-md-7">
      											<input type="date" class="form-control" name="idpembelian">
      										</div>
      									</div>

      								</div>
      								<div class="col-md-4 pl-5">
      									<div class="form-group row">
      										<label for="inputPassword"
      											class="col-md-4 col-form-label">Supplier</label>
      										<div class="col-md-8">
      											<div class="input-group">
      												<input type="text" readonly id="supplier" class="form-control"
      													name="supplier" placeholder="Kode Supplier">
      												<div class="input-group-append">
      													<button data-toggle="modal" data-target="#Modal-Supplier"
      														class="btn btn-outline-primary"
      														type="button">Pilih</button>
      												</div>
      											</div>

      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-4 col-form-label"></label>
      										<div class="col-md-8">
      											<input type="text" readonly placeholder="Nama Supplier"
      												class="form-control" name="no_nota">
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-4 col-form-label">Tempo</label>
      										<div class="col-md-6">
      											<div class="input-group">
      												<input type="number" name="jumlah" class="form-control">
      												<div class="input-group-prepend">
      													<span class="input-group-text" id="basic-addon1">Hari</span>
      												</div>
      											</div>
      										</div>
      									</div>
      								</div>
      								<div class="col-md-4 pl-5">
      									<div class="form-group row">
      										<label for="inputPassword"
      											class="col-md-5 col-form-label">Keterangan</label>
      										<div class="col-md-7">
      											<textarea type="text" rows="3" class="form-control"
      												name="no_nota"></textarea>
      										</div>
      									</div>
      									<div class="form-group row pt-2">
      										<label for="inputPassword" class="col-md-5 col-form-label">
      											Jatuh Tempo</label>
      										<div class="col-md-7">
      											<input type="date" class="form-control" name="idpembelian">
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
      										<input type="hidden" class="form-control" readonly name="idpembelian">
      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-5 col-form-label">No
      												Pemesanan</label>
      											<div class="col-md-7">
      												<div class="input-group">
      													<input type="text" id="supplier" class="form-control"
      														name="no_pemesanan" placeholder="No Pemesanan">
      													<div class="input-group-append">
      														<button data-toggle="modal" data-target="#Modal-Pemesanan"
      															class="btn btn-outline-primary"
      															type="button">Pilih</button>
      													</div>
      												</div>
      											</div>
      										</div>
      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-5 col-form-label">No
      												Nota</label>
      											<div class="col-md-7">
      												<input type="text" class="form-control" name="no_nota">
      											</div>
      										</div>

      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-5 col-form-label">Tanggal
      												Beli</label>
      											<div class="col-md-7">
      												<input type="date" class="form-control" name="idpembelian">
      											</div>
      										</div>

      									</div>
      									<div class="col-md-6 pl-5">
      										<div class="form-group row">
      											<label for="inputPassword"
      												class="col-md-4 col-form-label">Supplier</label>
      											<div class="col-md-8">
      												<div class="input-group">
      													<input type="text" readonly id="supplier" class="form-control"
      														name="supplier" placeholder="Kode Supplier">
      													<div class="input-group-append">
      														<button data-toggle="modal" data-target="#Modal-Supplier"
      															class="btn btn-outline-primary"
      															type="button">Pilih</button>
      													</div>
      												</div>

      											</div>
      										</div>
      										<div class="form-group row">
      											<label for="inputPassword" class="col-md-4 col-form-label"></label>
      											<div class="col-md-8">
      												<input type="text" readonly placeholder="Nama Supplier"
      													class="form-control" name="no_nota">
      											</div>
      										</div>
      										<div class="form-group row">
      											<label for="inputPassword"
      												class="col-md-4 col-form-label">Tempo</label>
      											<div class="col-md-6">
      												<div class="input-group">
      													<input type="number" name="jumlah" class="form-control">
      													<div class="input-group-prepend">
      														<span class="input-group-text"
      															id="basic-addon1">Hari</span>
      													</div>
      												</div>
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
