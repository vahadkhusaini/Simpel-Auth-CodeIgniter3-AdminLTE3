      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Laporan Pembelian</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
			  <label>Periode</label>
      			<div class="row">
      				<div class="col-md-3 pr-2">
      					<div class="form-group">
      						<div class="input-group">
      							<div class="input-group-prepend">
      								<span class="input-group-text">
      									<i class="far fa-calendar-alt"></i>
      								</span>
      							</div>
      							<input type="text" id="tanggal1" name="tanggal1" class="form-control">
      						</div>
      						<!-- /.input group -->
      					</div>
      					<!-- /.form group -->
      				</div>
					  <label class="pt-2 mr-2 ml-2">s/d</label>  
      				<div class="col-md-3 mr-2">
      					<div class="form-group">
      						<div class="input-group">
      							<div class="input-group-prepend">
      								<span class="input-group-text">
      									<i class="far fa-calendar-alt"></i>
      								</span>
      							</div>
      							<input type="text" id="tanggal2" name="tanggal2" class="form-control">
      						</div>
      						<!-- /.input group -->
      					</div>
      					<!-- /.form group -->
      				</div>
      				<div class="col-md-3">
      					<a href="#" id="tampilkan" class="btn btn-primary">Tampilkan</a>
      					<a href="<?=base_url('laporan/pembelian/cetak/')?>" id="cetak" class="btn btn-success">Cetak</a>
      				</div>
      			</div>

      			<div class="card">
      				<div class="card-body table-responsive">
      					<table id="trans" class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>Tanggal</th>
      								<th>No Nota</th>
      								<th>Nama Supplier</th>
      								<th>Total Transaksi</th>
      							</tr>
      						</thead>
      						<tbody id="show_report">
      							<?php 
									foreach($trans as $t): 									
										$total_pembelian = $t['subtotal']+$t['total_pajak'];
									?>
      							<tr>
      								<td><?=  date('d/m/Y', strtotime($t['tanggal_pembelian']))?></td>
      								<td><?= $t['no_nota'];?></td>
      								<td><?= $t['nama_supplier'];?></td>
      								<td>Rp. <?= number_format($total_pembelian)?></td>
      							</tr>
      							<?php
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

  