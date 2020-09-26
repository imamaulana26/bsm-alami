<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title; ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<p>Jumlah Nasabah</p>
							<p>15 Nasabah</p>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.col -->

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="fas fa-chart-line"></i></span>

						<div class="info-box-content">
							<p>Outstanding Pembiayaan</p>
							<p>Rp <?= number_format(1800000000, 0, '.', ',') ?></p>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.col -->

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger"><i class="fas fa-ban"></i></span>

						<div class="info-box-content">
							<p>Pembiayaan Ditolak</p>
							<p>0 Pembiayaan</p>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.col -->

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>

						<div class="info-box-content">
							<p>Pembiayaan Disetujui</p>
							<p>1 Pembiayaan</p>
						</div>
						<!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.col -->
			</div><!-- /.row -->

			<div class="row">
				<div class="info-box">
					<div class="col-md-12">
						<table class="table table-bordered table-hover" id="tbl_warning">
							<thead>
								<tr>
									<th>#</th>
									<th>ID Pembiayaan</th>
									<th>Nama Nasabah</th>
									<th class="text-center">Tgl. Jatuh Tempo Invoice</th>
									<th class="text-center">Nominal Tagihan</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($data as $dt) :
									$db_tgl = date_create($dt['tgl_jatem']);
									$now = date_create(date('Y-m-d'));
									$diff = date_diff($db_tgl, $now);
									if ($diff->format('%a') <= 100) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $dt['kd_invoice']; ?></td>
											<td>
												<?= $dt['nm_perusahaan']; ?>
												<div class="dropdown-divider"></div>
												<?= $dt['kd_perusahaan']; ?>
											</td>
											<td class="text-center">
												<?= tgl_indo($dt['tgl_jatem']); ?>
												<div class="dropdown-divider"></div>
												<?= $diff->format('%R%a day(s)'); ?>
											</td>
											<td class="text-center">
												Rp <?= number_format($dt['nom_tagihan'], 0, '.', ',') ?>
											</td>
										</tr>
								<?php endif;
								endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--/. container-fluid -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('layout/script'); ?>

<script>
	$('#tbl_warning').DataTable({
		'paging': true,
		'searching': true,
		'ordering': false,
		'info': true,
	});
</script>

</body>

</html>
