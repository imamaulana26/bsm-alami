<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Select -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/template') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/template') ?>/plugins/toastr/toastr.min.js"></script>
<!-- Sweetalert2 -->
<script src="<?= base_url('assets/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
<!-- Editor -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/template') ?>/plugins/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
<?php if ($this->uri->segment(2) == 'dashboard') : ?>
	<script src="<?= base_url('assets/template') ?>/dist/js/pages/dashboard2.js"></script>
<?php endif; ?>
<!-- My Script -->
<script src="<?= base_url('assets') ?>/js/style.js"></script>

<!-- active menu -->
<script>
	var uri = '<?= $this->uri->segment(2) ?>';
	var exp = uri.split('-');

	$('.nav-link').removeClass('active');

	if (uri == 'dashboard') {
		$('#dashboard').addClass('active');
	}

	// menu finance
	if (exp[0] == 'finance') {
		$('#finance').addClass('active');
		$('#finance').parent().addClass('menu-open');

		if (exp[1] == 'new') {
			$('#new').addClass('active');
		} else if (exp[1] == 'proses') {
			$('#proses').addClass('active');
		} else if (exp[1] == 'komite') {
			$('#komite').addClass('active');
		} else if (exp[1] == 'pencairan') {
			$('#pencairan').addClass('active');
		} else {
			$('#all').addClass('active');
		}
	}

	// menu user
	if (exp[0] == 'user') {
		$('#user').addClass('active');
		$('#user').parent().addClass('menu-open');

		if (exp[1] == 'pusat') {
			$('#pusat').addClass('active');
		} else {
			$('#cabang').addClass('active');
		}
	}

	// menu outlet
	if (exp[0] == 'outlet') {
		$('#outlet').addClass('active');
		$('#outlet').parent().addClass('menu-open');

		if (exp[1] == 'region') {
			$('#region').addClass('active');
		} else if (exp[1] == 'area') {
			$('#area').addClass('active');
		} else {
			$('#cbg').addClass('active');
		}
	}
</script>

<script>
	// # check number javascript
	function CheckNumeric() {
		return event.keyCode >= 48 && event.keyCode <= 57;
	}
	// # check number javascript

	function formatNpwp(value) {
		if (typeof value === 'string') {
			return value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, '$1.$2.$3.$4-$5.$6');
		}
	}

	function formatRp(val) {
		var number_string = val.toString(),
			split = number_string.split('.'),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		return rupiah = split[1] != undefined ? 'Rp ' + rupiah + ',' + split[1] : 'Rp ' + rupiah;
	}

	function formatTgl(val) {
		let bln = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		var exp = val.split('-');

		return exp[2] + ' ' + bln[exp[1] - 1] + ' ' + exp[0];
	}

	function roundUp(num, precision) {
		precision = Math.pow(10, precision)
		return Math.ceil(num * precision) / precision
	}

	$('#dataTable').DataTable({
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': false,
		'info': true,
		'autoWidth': false,
		'responsive': true
	});

	$(document).ready(function() {
		var width = $(window).width();

		if (width < 1007) {
			$('.tbl_detail').DataTable({
				'paging': false,
				'lengthChange': true,
				'searching': false,
				'ordering': false,
				'info': false,
				'autoWidth': false,
				'responsive': true,
				'scrollX': true
			});
		} else {
			$('.tbl_detail').DataTable({
				'paging': false,
				'lengthChange': true,
				'searching': false,
				'ordering': false,
				'info': false,
				'autoWidth': false,
				'responsive': true
			});
		}
	});
</script>
