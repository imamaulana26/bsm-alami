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
					<span class="btn btn-sm btn-primary float-right" onclick="fm_modal()">
						Tambah Region
					</span>
				</div>
				<!-- /.col -->
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
										<th>Kode Region</th>
										<th>Nama Region</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $val) : ?>
										<tr>
											<td><?= $key + 1; ?></td>
											<td><?= $val['kd_region']; ?></td>
											<td><?= $val['nm_region']; ?></td>
											<td class="text-center">
												<span class="btn btn-xs bg-gradient-success" onclick="ubah('<?= $val['id'] ?>')"><i class="fa fa-fw fa-xs fa-edit"></i></span>
												<span class="btn btn-xs bg-gradient-danger" onclick="hapus('<?= $val['id'] ?>')"><i class="fa fa-fw fa-xs fa-trash"></i></span>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
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

<!-- Modal -->
<div class="modal fade in" id="fm_modal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="fm_region">
					<input type="hidden" name="id" id="id" class="form-control">
					<div class="form-group row">
						<label class="col-md-3 col-form-label">Kode Region</label>
						<div class="col-md-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">ID</div>
								</div>
								<input type="text" class="form-control" id="kd_region" name="kd_region" onkeypress="return CheckNumeric()">
							</div>
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 col-form-label">Nama Region</label>
						<div class="col-md-5">
							<input type="text" name="nm_region" id="nm_region" class="form-control">
							<div class="help-block"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<span class="btn btn-primary" onclick="fm_submit()">Simpan</span>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('layout/script'); ?>

<script>
	var method = 'add';

	$(document).on('keydown', 'input', function() {
		$(this).css('text-transform', 'uppercase');
		$(this).parents().removeClass('is-invalid');
		$(this).removeClass('is-invalid');

		if ($(this).attr('id') == 'kd_region') {
			$(this).parent().next().empty();
		} else {
			$(this).next().empty();
		}
	});

	$('#fm_modal').on('hide.bs.modal', function() {
		$('input').parents().removeClass('is-invalid');
		$('input').removeClass('is-invalid');
		$('.help-block').empty();
	})

	function fm_modal() {
		$('#fm_modal').modal('show');
		$('#fm_region')[0].reset();
		$('.modal-title').text('Tambah Data Region');
	}

	function fm_submit() {
		if (method == 'add') url = '<?= site_url('admin/outlet/save_region') ?>';
		else url = '<?= site_url('admin/outlet/update_region') ?>';

		$.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: $('#fm_region').serialize(),
			success: function(data) {
				if (data.status == true) {
					$('#fm_modal').modal('hide');

					Swal.fire({
						title: "Sukses",
						text: data.msg,
						icon: data.icon,
						timer: 2000,
						showConfirmButton: false,
						// timerProgressBar: true,
						// onBeforeOpen: () => {
						// 	Swal.showLoading()
						// }
					}).then((result) => {
						if (result.dismiss === Swal.DismissReason.timer) {
							location.reload();
						}
					});
				} else {
					$('.help-block').addClass('invalid-feedback');

					for (var i = 0; i < data.inputerror.length; i++) {
						if (data.inputerror[i] == 'kd_region') {
							$('[name="' + data.inputerror[i] + '"]').parent().addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
						} else {
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
						}
					}

					$('.help-block').each(function(i) {
						$(this).addClass('d-block').text(data.error[i]);
					});
				}
			}
		});
	}

	function ubah(key) {
		method = 'update';
		$.ajax({
			url: '<?= site_url('admin/outlet/edit_region/') ?>' + key,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				$('#fm_modal').modal('show');
				$('#fm_region')[0].reset();
				$('.modal-title').text('Ubah Data Region');
				let kode = data.kd_region.split('ID');

				$('#id').val(data.id);
				$('#kd_region').val(kode[1]);
				$('#nm_region').val(data.nm_region);
			}
		});
	}

	function hapus(id) {
		Swal.fire({
			title: "Apakah anda yakin?",
			text: "Data yang dihapus tidak bisa dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: "<?= site_url('admin/outlet/delete_region/') ?>" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						Swal.fire({
							title: "Sukses",
							text: data.msg,
							icon: data.icon,
							timer: 2000,
							showConfirmButton: false,
							// timerProgressBar: true,
							// onBeforeOpen: () => {
							// 	Swal.showLoading()
							// }
						}).then((result) => {
							if (result.dismiss === Swal.DismissReason.timer) {
								location.reload();
							}
						});
					}
				});
			}
		})
	}
</script>

</body>

</html>
