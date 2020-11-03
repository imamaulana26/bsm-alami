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
					<li class="nav-item has-treeview">
						<a href="" class="nav-link" id="module">
							<i class="nav-icon fas fa-th-large"></i>
							<p>
								Module
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="" class="nav-link" id="pagawai">
									<i class="far fa-circle nav-icon"></i>
									<p>Pegawai</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link" id="jaringan">
									<i class="far fa-circle nav-icon"></i>
									<p>Jaringan Kantor</p>
								</a>
							</li>
						</ul>
					</li>
				<?php elseif ($this->session->userdata('role') == 'staff') : ?>
					<li class="nav-item">
						<a href="<?= site_url('staff/finance') ?>" class="nav-link" id="finance">
							<i class="nav-icon fas fa-clipboard"></i>
							<p>Daftar Pembiayaan</p>
						</a>
					</li>
				<?php else : ?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link" id="finance">
							<i class="nav-icon fas fa-paste"></i>
							<p>
								Data Pembiayaan
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<?php
							$finance_new = $this->db->get_where('tbl_list_pembiayaan', ['status' => null])->num_rows();
							$on_proses = $this->db->get_where('tbl_list_pembiayaan', ['status !=' => 'Pencairan Berhasil', 'status !=' => 'Proses pencairan'])->num_rows();
							$pencairan = $this->db->get_where('tbl_list_pembiayaan', ['status' => 'Proses pencairan'])->num_rows();

							$where = "(a.status = 'Proses komite' or a.status = 'Revisi komite') and c.unit_kerja = '" . $_SESSION['cabang'] . "'";
							$komite = $this->db->select('*')->from('tbl_list_pembiayaan a')
								->join('tbl_user c', 'a.kode_ao_pemproses = c.kode_ao', 'left')
								->where($where)
								->get()->num_rows();

							if ($this->session->userdata('jabatan') == 'ABBM') : ?>
								<li class="nav-item">
									<a href="<?= site_url('sales/finance-new') ?>" class="nav-link" id="new">
										<i class="far fa-circle nav-icon"></i>
										<p>
											Daftar Pembiayaan Baru
											<?php if ($finance_new > 0) : ?>
												<span class="right badge badge-danger"><?= $finance_new ?></span>
											<?php endif; ?>
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('sales/finance-proses') ?>" class="nav-link" id="proses">
										<i class="far fa-circle nav-icon"></i>
										<p>
											Pembiayaan On Progress
											<?php if ($on_proses > 0) : ?>
												<span class="right badge badge-danger"><?= $on_proses ?></span>
											<?php endif; ?>
										</p>
									</a>
								</li>
							<?php elseif ($this->session->userdata('jabatan') == 'AM') : ?>
								<li class="nav-item">
									<a href="<?= site_url('sales/finance-komite') ?>" class="nav-link" id="komite">
										<i class="far fa-circle nav-icon"></i>
										<p>
											Proses Komite
											<?php if ($komite > 0) : ?>
												<span class="right badge badge-danger"><?= $komite ?></span>
											<?php endif; ?>
										</p>
									</a>
								</li>
							<?php else : ?>
								<li class="nav-item">
									<a href="<?= site_url('sales/finance') ?>" class="nav-link" id="all">
										<i class="far fa-circle nav-icon"></i>
										<p>Daftar Pembiayaan</p>
									</a>
								</li>
							<?php endif; ?>
							<li class="nav-item">
								<a href="<?= site_url('sales/finance-pencairan') ?>" class="nav-link" id="pencairan">
									<i class="far fa-circle nav-icon"></i>
									<p>
										Proses Pencairan
										<?php if ($pencairan > 0) : ?>
											<span class="right badge badge-danger"><?= $pencairan ?></span>
										<?php endif; ?>
									</p>
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
