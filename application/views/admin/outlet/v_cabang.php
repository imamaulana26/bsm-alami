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
						Tambah Outlet Cabang
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
										<th>Kode Cabang</th>
										<th>Nama Outlet Cabang</th>
										<th>Nama Outlet Area</th>
										<th>Nama Region</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $val) : ?>
										<tr>
											<td><?= $key + 1; ?></td>
											<td><?= $val['kd_cabang']; ?></td>
											<td><?= $val['nm_cabang']; ?></td>
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
				<form id="fm_cabang">
					<input type="hidden" name="id" id="id" class="form-control">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Kode Cabang</label>
						<div class="col-md-3">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">ID</div>
								</div>
								<input type="text" class="form-control" id="kd_cabang" name="kd_cabang" onkeypress="return CheckNumeric()">
							</div>
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
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Nama Outlet Area</label>
						<div class="col-md-6">
							<select name="li_area" id="li_area" class="form-control selectpicker">
								<option selected disabled>-- Please Select --</option>
							</select>
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Nama Outlet Cabang</label>
						<div class="col-md-6">
							<input type="text" name="nm_cabang" id="nm_cabang" class="form-control">
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
		area();
	});

	$(document).on('keydown', 'input', function() {
		$(this).css('text-transform', 'uppercase');
		$(this).parents().removeClass('is-invalid');
		$(this).removeClass('is-invalid');

		if ($(this).attr('id') == 'kd_cabang') {
			$(this).parent().next().empty();
		} else {
			$(this).next().empty();
		}
	});

	$(document).on('change', '.bootstrap-select', function() {
		$(this).next().removeClass('invalid-feedback d-block').empty();
	});

	$('#fm_modal').on('hide.bs.modal', function() {
		region();
		area();

		$('input').parents().removeClass('is-invalid');
		$('input').removeClass('is-invalid');
		$('.help-block').empty();

		$('select').selectpicker('refresh');
	});

	$('#li_region').on('change', function() {
		$.ajax({
			url: '<?= site_url('api/get_area/') ?>' + $(this).val(),
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var html = '<option selected disabled>-- Please Select --</option>';
				for (var i = 0; i < data.length; i++) {
					html += '<option value="' + data[i].kd_area + '">' + data[i].nm_area + '</option>';
				}

				$('#li_area').html(html);
				$('#li_area').selectpicker('refresh');
			}
		});
	});

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

	function area() {
		$.ajax({
			url: '<?= site_url('api/area') ?>',
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var html = '<option selected disabled>-- Please Select --</option>';
				for (var i = 0; i < data.length; i++) {
					html += '<option value="' + data[i].kd_area + '">' + data[i].nm_area + '</option>';
				}

				$('#li_area').html(html);
				$('#li_area').selectpicker('refresh');
			}
		});
	}

	function fm_modal() {
		$('#fm_modal').modal('show');
		$('#fm_cabang')[0].reset();
		$('.modal-title').text('Tambah Data Outlet Cabang');
		$('#kd_cabang').attr('readonly', false);

		$('select').selectpicker('refresh');
	}

	function fm_submit() {
		var url = '';
		if (method == 'add') url = '<?= site_url('admin/outlet/save_cabang') ?>';
		else url = '<?= site_url('admin/outlet/update_cabang') ?>';

		$.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: $('#fm_cabang').serialize(),
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
						if (data.inputerror[i] == 'kd_cabang') {
							$('[name="' + data.inputerror[i] + '"]').parent().addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').parent().next().addClass('d-block').text(data.error[i]);
						} else if (data.inputerror[i] == 'li_region' || data.inputerror[i] == 'li_area') {
							$('[name="' + data.inputerror[i] + '"]').parent().addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').parent().next().addClass('d-block').text(data.error[i]);
						} else {
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').next().addClass('d-block').text(data.error[i]);
						}
					}

					// $('.help-block').each(function(i) {
					// 	$(this).addClass('d-block').text(data.error[i]);
					// });
				}
			}
		});
	}

	function ubah(key) {
		method = 'update';
		
		$.ajax({
			url: '<?= site_url('admin/outlet/edit_cabang/') ?>' + key,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				$('#fm_modal').modal('show');
				$('#fm_cabang')[0].reset();
				$('.modal-title').text('Ubah Data Outlet Cabang');
				let kode = data.kd_cabang.split('ID');

				$('#id').val(data.id);
				$('#kd_cabang').attr('readonly', true);
				$('#kd_cabang').val(kode[1]);
				$('#nm_cabang').val(data.nm_cabang);
				$('#li_region').val(data.region);
				$('#li_area').val(data.area);

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
					url: "<?= site_url('admin/outlet/delete_cabang/') ?>" + id,
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
