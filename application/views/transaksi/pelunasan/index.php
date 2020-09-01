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

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="card">
      				<div class="card-header">
      					<a href="<?= base_url('transaksi/pelunasan/tambah')?>"
      						class="btn btn-primary">
      						<i class="fas fa-plus"></i> Tambah</a>
							
      				</div>
      				<div class="card-body table-responsive">
      					<table id="example2" class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>Tanggal</th>
      								<th>No Nota</th>
      								<th>Nama Supplier</th>
                                    <th>Total Transaksi</th>
									<th>Action</th>
      							</tr>
      						</thead>
      						<tbody>
							  <?php 
									foreach($trans as $t):
									?>									
      							<tr>
      								<td><?=  date('d/m/Y', strtotime($t['tanggal_pelunasan']))?></td>
      								<td><?= $t['no_nota'];?></td>
      								<td><?= $t['nama_supplier'];?></td>
      								<td>Rp. <?= number_format($t['jumlah_bayar'])?></td>
									<td><a href="<?=base_url('transaksi/pelunasan/cetak/'.$t['id_pelunasan'])?>"
      						class="print-pelunasan btn btn-primary">
      						<i class="fas fa-print"></i> Cetak</a></td>
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
