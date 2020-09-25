<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<!-- <li class="nav-item d-none d-sm-inline-block">
			<a href="index3.html" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="#" class="nav-link">Contact</a>
		</li> -->
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown dropdown-menu-right">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<?= $this->session->userdata('nama'); ?>
				<i class="ml-2 fa fa-fw fa-cogs"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-md">
				<a href="#" class="dropdown-item">
					<i class="fas fa-user mr-2"></i> Profile
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?= site_url('auth/logout') ?>" class="dropdown-item">
					<i class="fas fa-power-off mr-2"></i> Sign Out
				</a>
			</div>
		</li>
	</ul>
</nav>
<!-- /.navbar -->
