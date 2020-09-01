      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Laporan Stok</h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
			  <div class="col-md-3">
      				<div class="form-group">
      					<label>Periode</label>
      					<div class="input-group">
      						<div class="input-group-prepend">
      							<span class="input-group-text">
      								<i class="far fa-calendar-alt"></i>
      							</span>
      						</div>
      						<input type="text" class="form-control float-right" id="reservation">
      					</div>
      					<!-- /.input group -->
      				</div>
      				<!-- /.form group -->
      			</div>
      			<div class="col-md-3 pb-3">
      				<a href="<?= base_url('transaksi/pelunasan/tambah')?>" class="btn btn-primary">Tampilkan</a>
					<a href="<?= base_url('transaksi/pelunasan/tambah')?>" class="btn btn-success">Cetak</a>
      			</div>
      			<div class="card">
      				<div class="card-body table-responsive">
      					<table class="table table-bordered table-striped">
      						<thead>
      							<tr>
      								<th>Tanggal</th>
                                    <th>Nama Barang</th> 
                                    <th>Stok Masuk</th>  
                                    <th>Stok Keluar</th>
      							</tr>
      						</thead>
      						<tbody>
							  <?php 
									foreach($trans as $j): 						
									?>									
      							<tr>
      								<td><?=  date('d/m/Y', strtotime($j['tanggal_pembelian']))?></td>
                                      <td><?= $j['nama_barang'];?></td>   
                                    <td><?= $j['jumlah'];?></td>
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
