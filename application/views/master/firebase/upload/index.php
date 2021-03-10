      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Upload To Firebase</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="card">
                  	<?= $this->session->flashdata('msg');?>
      				<form action="<?= base_url('master/upload/do_upload')?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="main_image" name="image">
                                    <label class="custom-file-label" for="customFile">Tambahkan Gambar</label>
                                </div>
                            </div>
                            <hr class="sidebar-divider">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                            <i class=""></i>
                            Upload
                            </button>
                        </div>
                    </form>
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

<script>
 
</script>