<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="." class="brand-link">
		<div id="profileImage">
			<span>BA</span>
			<span class="brand-text">BSM Alami</span>
		</div>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-3">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="./dashboard" class="nav-link" id="dashboard">
						<i class="nav-icon fas fa-desktop"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php if ($this->session->userdata('role') == 'admin') : ?>
					<li class="nav-item has-treeview">
						<a href="" class="nav-link" id="user">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Daftar Data User
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= site_url('admin/user-pusat') ?>" class="nav-link" id="pusat">
									<i class="far fa-circle nav-icon"></i>
									<p>Daftar User Pusat</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url('admin/user-cabang') ?>" class="nav-link" id="cabang">
									<i class="far fa-circle nav-icon"></i>
									<p>Daftar User Cabang</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="" class="nav-link" id="outlet">
							<i class="nav-icon fas fa-building"></i>
							<p>
								Daftar Data Outlet
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= site_url('admin/outlet-region') ?>" class="nav-link" id="region">
									<i class="far fa-circle nav-icon"></i>
									<p>Daftar Region</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url('admin/outlet-area') ?>" class="nav-link" id="area">
									<i class="far fa-circle nav-icon"></i>
									<p>Daftar Outlet Area</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url('admin/outlet-cabang') ?>" class="nav-link" id="cbg">
									<i class="far fa-circle nav-icon"></i>
									<p>Daftar Outlet Cabang</p>
								</a>
							</li>
						</ul>
					</li>
				<?php elseif ($this->session->userdata('role') == 'sales') : ?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link" id="finance">
							<i class="nav-icon fas fa-paste"></i>
							<p>
								Data Pembiayaan
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= site_url('sales/finance-new') ?>" class="nav-link" id="new">
									<i class="far fa-circle nav-icon"></i>
									<p>
										Daftar Pembiayaan Baru
										<span class="right badge badge-danger"><?= rand(1, 9) ?></span>
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url('sales/finance-proses') ?>" class="nav-link" id="proses">
									<i class="far fa-circle nav-icon"></i>
									<p>
										Pembiayaan On Progress
										<span class="right badge badge-danger"><?= rand(1, 9) ?></span>
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url('sales/finance-all') ?>" class="nav-link" id="all">
									<i class="far fa-circle nav-icon"></i>
									<p>Daftar Pembiayaan</p>
								</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
