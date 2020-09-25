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
						Tambah Outlet Area
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
										<th>Kode Area</th>
										<th>Nama Outlet Area</th>
										<th>Nama Region</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $val) : ?>
										<tr>
											<td><?= $key + 1; ?></td>
											<td><?= $val['kd_area']; ?></td>
											<td><?= $val['nm_area']; ?></td>
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="fm_area">
					<input type="hidden" name="id" id="id" class="form-control">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Kode Area</label>
						<div class="col-md-3">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">ID</span>
								</div>
								<input type="text" class="form-control" name="kd_area" id="kd_area" onkeypress="return CheckNumeric()">
								<div class="input-group-append">
									<span class="input-group-text">a</span>
								</div>
							</div>
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Nama Outlet Area</label>
						<div class="col-md-6">
							<input type="text" name="nm_area" id="nm_area" class="form-control">
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Regional</label>
						<div class="col-md-3">
							<select name="li_region" id="li_region" class="form-control selectpicker"></select>
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

	$(document).ready(function() {
		region();
	});

	$(document).on('keydown', 'input', function() {
		$(this).css('text-transform', 'uppercase');
		$(this).parents().removeClass('is-invalid');
		$(this).removeClass('is-invalid');

		if ($(this).attr('id') == 'kd_area') {
			$(this).parent().next().empty();
		} else {
			$(this).next().empty();
		}
	});

	$(document).on('change', '.bootstrap-select', function() {
		$(this).next().removeClass('invalid-feedback d-block').empty();
	});

	$('#fm_modal').on('hide.bs.modal', function() {
		$('input').parents().removeClass('is-invalid');
		$('input').removeClass('is-invalid');
		$('.help-block').empty();
	})

	function region() {
		$.ajax({
			url: '<?= site_url('api/region') ?>',
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var html = '<option selected disabled>-- Please Select --</option>';
				for (var i = 0; i < data.length; i++) {
					html += '<option value="' + data[i].id + '">' + data[i].nm_region + '</option>';
				}

				$('#li_region').html(html);
				$('#li_region').selectpicker('refresh');
			}
		});
	}

	function fm_modal() {
		$('#fm_modal').modal('show');
		$('#fm_area')[0].reset();
		$('.modal-title').text('Tambah Data Outlet Area');

		$('#kd_area').attr('readonly', false);
		$('select').selectpicker('refresh');
	}

	function fm_submit() {
		if (method == 'add') url = '<?= site_url('admin/outlet/save_area') ?>';
		else url = '<?= site_url('admin/outlet/update_area') ?>';

		$.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: $('#fm_area').serialize(),
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
						if (data.inputerror[i] == 'kd_area') {
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
			url: '<?= site_url('admin/outlet/edit_area/') ?>' + key,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				$('#fm_modal').modal('show');
				$('#fm_area')[0].reset();
				$('.modal-title').text('Ubah Data Outlet Area');
				let kode = data.kd_area.split('ID');

				$('#id').val(data.id);
				$('#kd_area').attr('readonly', true);
				$('#kd_area').val(kode[1].substring(0, kode[1].length - 1));
				$('#nm_area').val(data.nm_area);
				$('#li_region').val(data.id_region);

				$('select').selectpicker('refresh');
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
					url: "<?= site_url('admin/outlet/delete_area/') ?>" + id,
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
