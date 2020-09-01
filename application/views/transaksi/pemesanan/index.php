 
	  <script>
	  
	
	  </script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Kelola Pemesanan</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="card">
      				<div class="card-header">
      					<a href="<?= base_url('transaksi/pemesanan/tambah')?>"
      						class="btn btn-primary">
      						<i class="fas fa-plus"></i> Tambah</a>
      				</div>
      				<div class="card-body table-responsive">
      					<table id="trans" class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>Tanggal</th>
      								<th>No Pemesanan</th>
      								<th>Nama Supplier</th>
									<th>Status</th>
      								<th>Action</th>
      							</tr>
      						</thead>
      						<tbody>
							  <?php 
									foreach($trans as $t): 									
										$total_pemesanan = $t['subtotal']+$t['total_pajak'];
									?>									
      							<tr>
      								<td><?=  date('d/m/Y', strtotime($t['tanggal_pemesanan']))?></td>
      								<td><?= $t['id_pemesanan'];?></td>
      								<td><?= $t['nama_supplier'];?></td>
									<td><?= $t['status']?></td>
      								<td>
      									<!-- <a href="#" data-id="" class="edit-akun btn btn-primary">
      										<i class="fas fa-edit"></i>
      									</a>
      									<a href="#" class="delete-akun btn btn-danger">
      										<i class="fas fa-trash-alt"></i>
      									</a> -->
										<a href="<?= base_url('transaksi/pemesanan/cetak/'.$t['id_pemesanan'])?>" class="print-pemesanan btn btn-success">
      										<i class="fas fa-print"></i>
      									</a>
      								</td>
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