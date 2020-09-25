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
						Tambah User
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
			<?php $uri = $this->uri->segment(2);
			$exp = explode('-', $uri); ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<table id="dataTable" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>NIP User</th>
										<th>Nama Lengkap</th>
										<th>Jabatan</th>
										<th>Group Unit Kerja</th>
										<?php if ($exp[1] != 'pusat') : ?>
											<th>Regional</th>
										<?php endif; ?>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $key => $val) : ?>
										<tr>
											<td><?= $key + 1; ?></td>
											<td><?= $val['nip']; ?></td>
											<td>
												<?= $val['nama']; ?><br>
												<span class="text-primary"><?= $val['email']; ?></span>
											</td>
											<td><?= $val['jabatan']; ?></td>
											<?php if ($exp[1] == 'pusat') : ?>
												<td>KANTOR PUSAT</td>
											<?php else : ?>
												<td><?= $val['nm_area']; ?></td>
												<td><?= $val['nm_region']; ?></td>
											<?php endif; ?>
											<td class="text-center">
												<span class="btn btn-xs bg-gradient-success m-1" onclick="ubah('<?= $val['nip'] ?>')"><i class="fa fa-fw fa-xs fa-edit"></i></span>
												<span class="btn btn-xs bg-gradient-danger m-1" onclick="hapus('<?= $val['nip'] ?>')"><i class="fa fa-fw fa-xs fa-trash"></i></span>
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
				<form id="fm_user">
					<input type="hidden" name="role" id="role" class="form-control" value="<?= $this->uri->segment(2) ?>">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">NIP User</label>
						<div class="col-md-3">
							<input type="text" name="nip_user" id="nip_user" class="form-control" onkeypress="return CheckNumeric()">
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Nama Lengkap</label>
						<div class="col-md-6">
							<input type="text" name="nama_user" id="nama_user" class="form-control">
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Email</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" name="email_user" id="email_user" class="form-control">
								<div class="input-group-append">
									<div class="input-group-text">@bsm.co.id</div>
								</div>
							</div>
							<div class="help-block"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Jabatan</label>
						<div class="col-md-3">
							<select name="jbtn_user" id="jbtn_user" class="form-control selectpicker"></select>
							<div class="help-block"></div>
						</div>
					</div>
					<div id="lv_user" style="display: none;">
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Regional</label>
							<div class="col-md-3">
								<select name="li_region" id="li_region" class="form-control selectpicker">
									<option selected disabled>-- Please Select --</option>
									<?php foreach ($region as $ro) : ?>
										<option value="<?= $ro['id'] ?>"><?= $ro['nm_region'] ?></option>
									<?php endforeach; ?>
								</select>
								<div class="help-block"></div>
							</div>
						</div>
						<div class="form-group row" id="group_unit" style="display: none;">
							<label class="col-md-2 col-form-label">Group Unit Kerja</label>
							<div class="col-md-6">
								<select name="unit_kerja" id="unit_kerja" class="form-control selectpicker"></select>
								<div class="help-block"></div>
							</div>
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
	var segment = '<?= $this->uri->segment(2) ?>';
	var uri = segment.split('-');

	if (uri[1] == 'pusat') {
		$('#lv_user').css('display', 'none');
	} else {
		$('#lv_user').css('display', 'block');
	}

	$(document).on('keydown', 'input', function() {
		$(this).parents().removeClass('is-invalid');
		$(this).removeClass('is-invalid');

		if ($(this).attr('id') == 'email_user') {
			$(this).parent().next().empty();
		} else {
		$(this).css('text-transform', 'uppercase');
			$(this).next().empty();
		}
	});

	$(document).on('change', '.bootstrap-select', function() {
		$(this).next().removeClass('invalid-feedback d-block').empty();
	});

	$('#fm_modal').on('hide.bs.modal', function() {
		jabatan();
		outlet();

		$('input').parents().removeClass('is-invalid');
		$('input').removeClass('is-invalid');
		$('.help-block').empty();

		$('select').selectpicker('refresh');
	});

	$(document).ready(function() {
		jabatan();
		outlet();

		$('#li_region').on('change', function() {
			$('#group_unit').css('display', 'flex');
			$.ajax({
				url: '<?= site_url('api/get_area/') ?>' + $(this).val(),
				type: 'post',
				dataType: 'json',
				success: function(data) {
					var html = '<option disabled selected>-- Please Select --</option>';
					for (var i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].kd_area + '">' + data[i].nm_area + '</option>';
					}

					$('#unit_kerja').html(html);
					$('#unit_kerja').selectpicker('refresh');
				}
			});
		});

		// $('input').on('keypress', function() {
		// 	if ($(this).attr('id') == 'email_user') {
		// 		$(this).next().next().next().text('');
		// 	} else {
		// 		$(this).next().text('');
		// 	}

		// 	$(this).parent().removeClass('is-invalid');
		// 	$(this).removeClass('is-invalid');
		// });
	});

	function fm_modal() {
		$('#fm_modal').modal('show');
		$('#fm_user')[0].reset();
		$('.modal-title').text('Tambah Data User');

		$('select').selectpicker('refresh');
	}

	function outlet() {
		$.ajax({
			url: '<?= site_url('api/area') ?>',
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var html = '<option disabled selected>-- Please Select --</option>';
				for (var i = 0; i < data.length; i++) {
					html += '<option value="' + data[i].kd_area + '">' + data[i].nm_area + '</option>';
				}

				$('#unit_kerja').html(html);
				$('select').selectpicker('refresh');
			}
		});
	}

	function jabatan() {
		var list = [];
		var li = '<option disabled selected>-- Please Select --</option>';
		if (uri[1] == 'pusat') list = ['GH', 'DH', 'Team Leader', 'Officer'];
		else list = ['AM', 'BM', 'ABBM', 'BBRM'];

		for (var i = 0; i < list.length; i++) {
			li += '<option value="' + list[i] + '">' + list[i] + '</option>';
		}

		$('#jbtn_user').html(li);
		$('select').selectpicker('refresh');
	}

	function fm_submit() {
		var url = '';
		if (method == 'add') url = '<?= site_url('admin/user/save') ?>';
		else url = '<?= site_url('admin/user/update') ?>';

		$.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: $('#fm_user').serialize(),
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
						if (data.inputerror[i] == 'email_user') {
							$('[name="' + data.inputerror[i] + '"]').parent().addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').parent().next().addClass('d-block').text(data.error[i]);
						} else if (data.inputerror[i] == 'jbtn_user' || data.inputerror[i] == 'li_region' || data.inputerror[i] == 'unit_kerja') {
							$('[name="' + data.inputerror[i] + '"]').parent().addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').parent().next().addClass('d-block').text(data.error[i]);
						} else {
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').next().addClass('d-block').text(data.error[i]);
						}
					}
				}
			}
		});
	}

	function ubah(key) {
		method = 'update';
		$('#group_unit').css('display', 'flex');

		$.ajax({
			url: '<?= site_url('admin/user/edit/') ?>' + key,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				$('#fm_modal').modal('show');
				$('#fm_user')[0].reset();
				$('.modal-title').text('Ubah Data User');
				let mail = data.email.split('@');

				$('#nip_user').attr('readonly', true);
				$('#nip_user').val(data.nip);
				$('#nama_user').val(data.nama);
				$('#email_user').val(mail[0]);
				$('#jbtn_user').val(data.jabatan);
				$('#region').val(data.id);
				$('#unit_kerja').val(data.group_unit_kerja);

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
					url: "<?= site_url('admin/user/delete/') ?>" + id,
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
