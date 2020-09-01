<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="Logo"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Toko Retail</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="<?=base_url('dashboard')?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?= $this->uri->segment('1') == 'master' ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link <?= $this->uri->segment('1') == 'master' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-folder"></i>
						<p>
							Master Data
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
					<?php if($this->session->userdata('hak_akses') == '1'):?>
						<li class="nav-item">
							<a href="<?= base_url('master/pengguna') ?>" class="nav-link <?= $title == 'Pengguna' ? 'active' : ''?>">
								<i class="fas fa-users nav-icon"></i>
								<p>Pengguna</p>
							</a>
						</li>
					<?php endif; ?>
						<li class="nav-item">
							<a href="<?= base_url('master/barang') ?>" class="nav-link <?= $title == 'Barang' ? 'active' : ''?>">
								<i class="fas fa-barcode nav-icon"></i>
								<p>Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('master/supplier') ?>" class="nav-link <?= $title == 'Supplier' ? 'active' : ''?>">
								<i class="far fa-address-card nav-icon"></i>
								<p>Supplier</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('master/akun') ?>" class="nav-link <?= $title == 'Akun' ? 'active' : ''?>">
								<i class="fas fa-wallet nav-icon"></i>
								<p>Akun</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?= $this->uri->segment('1') == 'transaksi' ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link <?= $this->uri->segment('1') == 'transaksi' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-coins"></i>
						<p>
							Transaksi
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview <?= $this->uri->segment('1') == 'transaksi' ? 'active' : '' ?>">
						<li class="nav-item">
							<a href="<?= base_url('transaksi/pemesanan')?>" class="nav-link <?= $title == 'Pemesanan' ? 'active' : ''?>">
								<i class="fas fa-shopping-cart nav-icon"></i>
								<p>Pemesanan</p>
							</a>
							<a href="<?= base_url('transaksi/pembelian')?>" class="nav-link <?= $title == 'Pembelian' ? 'active' : ''?>">
								<i class="fas fa-cart-plus nav-icon"></i>
								<p>Pembelian</p>
							</a>
							<a href="<?= base_url('transaksi/retur')?>" class="nav-link <?= $title == 'Retur Pembelian' ? 'active' : ''?>">
								<i class="fas fa-box-open nav-icon"></i>
								<p>Retur Pembelian</p>
							</a>
							<a href="<?= base_url('transaksi/pelunasan')?>" class="nav-link <?= $title == 'Pelunasan' ? 'active' : ''?>">
								<i class="fas fa-dollar-sign nav-icon"></i>
								<p>Pelunasan</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?= $this->uri->segment('1') == 'laporan' ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link  <?= $this->uri->segment('1') == 'laporan' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Laporan
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('laporan/pembelian')?>" class="nav-link <?= $this->uri->segment('2') == 'pembelian' ? 'active' : '' ?>">
									<i class="fas fa-file-invoice nav-icon"></i>
									<p>Laporan Pembelian</p>
							</a>
							<a href="<?= base_url('laporan/jurnal')?>" class="nav-link <?= $this->uri->segment('2') == 'jurnal' ? 'active' : '' ?>">
								<i class="fas fa-pen-nib nav-icon"></i>
								<p>Jurnal Pembelian</p>
							</a>
							
						</li>
					</ul>
				</li>
<!-- 
				<li class="nav-item">
					<a href="#" class="nav-link" onclick="logout()">
						<i class="nav-icon fas fa-sign-out-alt text-danger"></i>
						<p class="text">Keluar</p>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
