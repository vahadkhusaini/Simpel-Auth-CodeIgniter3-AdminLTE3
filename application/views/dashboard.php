      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
      	<section class="content-header">
      		<div class="container-fluid">
      			<div class="row mb-2">
      				<div class="col-sm-6">
      					<h1>Selamat Datang, <?=$this->session->userdata('name')?></h1>
      				</div>
      			</div>
      		</div><!-- /.container-fluid -->
      	</section>

      	<!-- Main content -->
      	<section class="content">
      		<div class="container-fluid">
      			<div class="row">
      				<div class="col-lg-3 col-6">
      					<!-- small box -->
      					<div class="small-box bg-info">
      						<div class="inner">
      							<h3><?=$pemesanan['hasil'];?></h3><h5><strong>Pemesanan</strong></h5>

      							<p>Belum Di Proses</p>
      						</div>
      						<div class="icon">
      							<i class="ion ion-bag"></i>
      						</div>
      						<a href="<?=base_url('transaksi/pemesanan')?>" class="small-box-footer"> Pemesanan <i
      								class="fas fa-arrow-circle-right"></i></a>
      					</div>
      				</div>
      				<!-- ./col -->
      				<div class="col-lg-3 col-6">
      					<!-- small box -->
      					<div class="small-box bg-success">
      						<div class="inner">
							  <h3><?=$pembelian['hasil'];?></h3><h5><strong>Pembelian</strong></h5>

      							<p>Belum Lunas</p>
      						</div>
      						<div class="icon">
      							<i class="ion ion-stats-bars"></i>
      						</div>
      						<a href="<?=base_url('transaksi/pelunasan')?>" class="small-box-footer">Pelunasan <i
      								class="fas fa-arrow-circle-right"></i></a>
      					</div>
      				</div>
      				<!-- ./col -->
      				<div class="col-lg-3 col-6">
      					<!-- small box -->
      					<div class="small-box bg-warning">
      						<div class="inner">
							  <h3><?=$barang['hasil'];?></h3><h5><strong>Item</strong></h5>

      							<p>Jumlah Barang</p>
      						</div>
      						<div class="icon">
      							<i class="ion ion-social-dropbox"></i>
      						</div>
      						<a href="<?=base_url('master/barang')?>" class="small-box-footer">Barang <i
      								class="fas fa-arrow-circle-right"></i></a>
      					</div>
      				</div>
      				
      			</div>
      			<!-- /.row -->
      		</div>
      	</section>
      </div>