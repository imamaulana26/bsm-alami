<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-6">
					<h1 class="m-0 text-dark">
						<?= $title; ?>
					</h1>
				</div><!-- /.col -->
				<div class="col-md-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v2</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<table id="dataTable" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>ID Pembiayaan</th>
										<th>Nama Nasabah</th>
										<th class="text-center">Tgl. Pengajuan</th>
										<th>Nilai Pengajuan</th>
										<th>Tenor</th>
										<th>Status</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div><!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('layout/script'); ?>
