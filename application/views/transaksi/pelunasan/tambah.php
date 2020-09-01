      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Pelunasan</h1>
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
      					<h6 class="m-0 font-weight-bold text-primary">Form Pelunasan</h6>
      				</div>
      				<div class="card-body">
      					<form action="javascript:void(0)" id="tambah-pelunasan" method="post">
      						<div class="modal-body">
      							<div class="row pr-4">
      								<div class="col-md-6">
      									<input type="hidden" class="form-control" readonly name="idpembelian">
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">No Nota</label>
      										<div class="col-md-7">
      											<div class="input-group">
      												<input type="text" readonly class="form-control" name="no_nota"
      													id="no_nota" placeholder="Nomor Nota">
      												<div class="input-group-append">
      													<button data-toggle="modal" data-target="#Data-Pembelian"
      														class="btn btn-outline-primary"
      														type="button">Pilih</button>
      												</div>
      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">No
      											Pelunasan</label>
      										<div class="col-md-7">
      											<input type="text" id="no_pelunasan" class="form-control" name="no_pelunasan"
      												readonly>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-5 col-form-label">Tanggal
      											Pelunasan</label>
      										<div class="col-md-7">
      											<div class="input-group">
      												<div class="input-group-prepend">
      													<span class="input-group-text">
      														<i class="far fa-calendar-alt"></i>
      													</span>
      												</div>
      												<input type="text" id="tanggal-pelunasan" name="tanggal_pelunasan"
      													class="form-control">
      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword"
      											class="col-md-5 col-form-label">Supplier</label>
      										<div class="col-md-7">
      											<div class="input-group">
      												<input type="text" readonly class="form-control"
      													name="id_supplier" id="id_supplier"
      													placeholder="Kode Supplier">

      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="nama_supplier" class="col-md-5 col-form-label"></label>
      										<div class="col-md-7">
      											<input type="text" readonly placeholder="Nama Supplier"
      												class="form-control" id="nama_supplier" name="nama_supplier">
      										</div>
      									</div>
      								</div>

      								<div class="col-md-6 pl-5">
      									<div class="form-group row">
      										<label for="inputPassword"
      											class="col-md-4 col-form-label">Keterangan</label>
      										<div class="col-md-8">
      											<div class="input-group">
      												<textarea readonly class="form-control" name="keterangan"
      													id="keterangan" placeholder="Keterangan"></textarea>

      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="inputPassword" class="col-md-4 col-form-label">Total
      											</label>
      										<div class="col-md-8">
      											<div class="input-group">
      												<input type="number" readonly class="form-control"
      													name="total" id="total"
      													placeholder="Total">

      											</div>
      										</div>
      									</div>
      									<div class="form-group row">
      										<label for="nama_supplier" class="col-md-4 col-form-label">Retur</label>
      										<div class="col-md-8">
      											<input type="number" readonly placeholder="Retur"
      												class="form-control" id="retur" name="retur">
      										</div>
      									</div>
										  <div class="form-group row">
      										<label for="nama_supplier" class="col-md-4 col-form-label">Total Bayar</label>
      										<div class="col-md-8">
      											<input type="number" readonly placeholder="Total Pembayaran"
      												class="form-control" id="totalbayar" name="totalbayar">
      										</div>
      									</div>
      									<!-- <div class="small-box bg-info">
      										<div class="inner">
                                               <p>Dibayarkan sebesar</p>
											   <div>
											   		Rp.<span><h3 class="totalbayar"></h3></span>
												</div>
      										</div>
      									</div> -->
      								</div>
      							</div>
      						</div>
      						<!-- Form Element sizes -->

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

      <div class="modal fade bd-example-modal-lg" id="Data-Pembelian">
      	<div class="modal-dialog modal-lg">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title">Pilih Data Pembelian</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<div class="table-responsive">
      					<table class="table table-hover table-bordered" width="100%" cellspacing="0">
      						<thead>
      							<tr>
      								<th>Tanggal</th>
      								<th>No Nota</th>
      								<th>Nama Supplier</th>
      								<th>Total Transaksi</th>
      							</tr>
      						</thead>
      						<tbody>
      							<?php 
									foreach($trans as $t): 									
										$total_pemb = $t['subtotal']+$t['total_pajak'];
									?>
      							<tr class="lunasi" data-id="<?= $t['no_nota']?>"
      								data-nama="<?= $t['nama_supplier']?>" data-id-supp="<?= $t['id_supplier']?>"
      								data-status="<?=$t['status']?>" data-total="<?= $total_pemb ?>">
      								<td><?=  date('d/m/Y', strtotime($t['tanggal_pembelian']))?></td>
      								<td><?= $t['id_pembelian'];?></td>
      								<td><?= $t['nama_supplier'];?></td>
      								<td>Rp. <?= number_format($total_pemb)?></td>
      							</tr>
      							<?php
								endforeach; ?>
      						</tbody>
      					</table>
      				</div>
      			</div>

      		</div>
      		<!-- /.modal-content -->
      	</div>
      	<!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
