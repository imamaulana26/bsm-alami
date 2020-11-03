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
										<th>Pemproses</th>
										<th>ID Pembiayaan</th>
										<th>Nama Nasabah</th>
										<th class="text-center">Tgl. Pengajuan</th>
										<th class="text-center">Nilai Pengajuan</th>
										<th class="text-center">Tenor</th>
										<?php if ($_SESSION['jabatan'] == 'BBRM') : ?>
											<th class="text-center">Action</th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($data as $dt) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $dt['nama']; ?></td>
											<td>
												<span onclick="detail_modal('<?= $dt['kd_invoice'] ?>')" style="cursor: pointer; color: #007BFF;">
													<?= $dt['kd_invoice']; ?>
												</span>
											<td>
												<?= $dt['nm_perusahaan']; ?>
												<div class="dropdown-divider"></div>
												<?= $dt['kd_perusahaan']; ?>
											</td>
											<td class="text-center"><?= tgl_indo($dt['tgl_pengajuan']); ?></td>
											<td>Rp <?= number_format($dt['nom_pengajuan'], 2, ',', '.') ?></td>
											<td class="text-center"><?= $dt['tenor']; ?> Bulan</td>
											<?php if($_SESSION['jabatan'] == 'BBRM') : ?>
												<td class="text-center"><a href="#">Print <i class="fa fa-fw fa-print"></i></a></td>
											<?php endif; ?>
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
<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title-view"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body preview"></div>
		</div>
	</div>
</div>

<?php $this->load->view('sales/detail/modal_finance'); ?>
<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('layout/script'); ?>

<script>
	$(document).ready(function() {
		var key = '',
			file = '',
			msg = '<?= $this->session->flashdata('msg') ?>';

		$('#editor').editor({
			uiLibrary: 'bootstrap4'
		});
	});

	$('#exampleModal').on('hidden.bs.modal', function() {
		$('#detail_modal').modal('show');
		$('.detail-menu-tab').first().addClass('active');
		$('.tab-pane').first().addClass('show active');
	});

	$('#detail_modal').on('hide.bs.modal', function() {
		$('.detail-menu-tab').removeClass('active');
		$('.tab-pane').removeClass('show active');
	});

	$('.fa.fa-paperclip').on('click', function() {
		const key = $('#kd_invoice').val();
		const file = $(this).parent().parent().prev().val();
		const path = '../assets/files/' + key + '/' + file;
		const exp = file.split('.');

		$('#detail_modal').modal('hide');
		$('#exampleModal').modal('show');
		$('.modal-title-view').html(file + '<a href="<?= site_url('files/download/') ?>' + key + '/' + file + '" class="ml-2"><i class="fa fa-fw fa-download fa-xs"></i></a>');
		if (exp[1] == 'pdf') {
			$('.modal-body.preview').html('<iframe frameborder="0" style="width: 100%; height: 480px;" src="' + path + '"></iframe>');
		} else {
			$('.modal-body.preview').html('<img style="width: 100%; height: auto;" src="' + path + '"></img>');
		}
	});

	$('tbody').on('click', '.fa.fa-paperclip', function() {
		const key = $('#kd_invoice').val();
		const file = $(this).parent().text();
		const path = '../assets/files/' + key + '/' + file;
		const exp = file.split('.');

		$('#detail_modal').modal('hide');
		$('#exampleModal').modal('show');
		$('.modal-title-view').html(file + '<a href="<?= site_url('files/download/') ?>' + key + '/' + file + '" class="ml-2"><i class="fa fa-fw fa-download fa-xs"></i></a>');
		if (exp[1] == 'pdf') {
			$('.modal-body.preview').html('<iframe frameborder="0" style="width: 100%; height: 480px;" src="' + path + '"></iframe>');
		} else {
			$('.modal-body.preview').html('<img style="width: 100%; height: auto;" src="' + path + '"></img>');
		}
	});
</script>

<script>
	function detail_modal(key) {
		$('#detail_modal').modal('show');
		$('.modal-title-detail').text('Detail Form Pengajuan Pembiayaan');

		$('.detail-menu-tab').first().addClass('active');
		$('.tab-pane').first().addClass('show active');

		$.ajax({
			url: '<?= site_url('sales/finance/detail/') ?>' + key,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				let pembiayaan = res.pembiayaan;
				let pic = res.pic;
				let perusahaan = res.perusahaan;
				let pengurus = res.pengurus;
				let portofolio = res.portofolio;
				let keuangan = res.keuangan;
				let pemegang_saham = res.pemegang_saham;
				let ag_tagihan = res.ag_tagihan;
				let tagihan = res.tagihan;
				let jaminan = res.jaminan;
				let dokumen = res.dokumen;
				let survey = res.survey;
				let analisa = res.analisa;

				// fm_pic
				$('#id_penerima').val(pic.dokumen_pic);
				$('#nm_lengkap').val(pic.nm_penerima);
				$('#almt_email').val(pic.email_pic);
				$('#no_hp').val(pic.no_telp_pic);
				$('#alamat').val(pic.alamat_pic);
				$('#perusahaan_pic').val(pic.nm_perusahaan_pic);
				$('#jabatan').val(pic.jabatan_pic);

				// fm_perusahaan
				$('#nm_perusahaan').val(perusahaan.nm_perusahaan);
				$('#industri').val(perusahaan.industri);
				$('#sub_industri').val(perusahaan.sub_industri);
				$('#desk_perusahaan').val(perusahaan.desk_perusahaan);
				$('#tgl_pendirian').val(formatTgl(perusahaan.tgl_pendirian));
				$('#provinsi').val(perusahaan.provinsi);
				$('#kota_kab').val(perusahaan.kabupaten);
				$('#almt_perusahaan').val(perusahaan.almt_perusahaan);
				$('#npwp_perusahaan').val(formatNpwp(perusahaan.npwp_perusahaan));
				$('#no_telp_perusahaan').val(perusahaan.no_telp_perusahaan);
				$('#email_perusahaan').val(perusahaan.email_perusahaan);
				$('#web_perusahaan').val(perusahaan.website_perusahaan);
				$('#bank_penerima').val(perusahaan.bank_penerima);
				$('#no_rek_penerima').val(perusahaan.no_rek_penerima);
				$('#nm_rek_penerima').val(perusahaan.nm_rek_penerima);
				$('#bank_pengembalian').val(perusahaan.bank_tujuan);
				$('#no_va_pengembalian').val(perusahaan.no_va_tujuan);
				$('#nm_va_pengembalian').val(perusahaan.nm_va_tujuan);

				var tr_saham = '';
				for (var i = 0; i < pemegang_saham.length; i++) {
					tr_saham += '<tr>';
					tr_saham += '<td>' + (i + 1) + '</td>';
					tr_saham += '<td>' + pemegang_saham[i].jns_pemegang_saham + '</td>';
					tr_saham += '<td>' + pemegang_saham[i].nm_pemegang_saham + '</td>';
					tr_saham += '<td class="text-center">' + pemegang_saham[i].kepemilikan + ' %</td>';
					tr_saham += '<td>' + pemegang_saham[i].ktp_pemegang_saham + '</td>';
					tr_saham += '<td>' + formatNpwp(pemegang_saham[i].npwp_pemegang_saham) + '</td>';
					tr_saham += '</tr>';
				}
				$('#tbl_pemegang_saham tbody').html(tr_saham);

				var tr_pengurus = '';
				for (var i = 0; i < pengurus.length; i++) {
					tr_pengurus += '<tr>';
					tr_pengurus += '<td>' + (i + 1) + '</td>';
					tr_pengurus += '<td>' + pengurus[i].nm_pengurus + '</td>';
					tr_pengurus += '<td>' + pengurus[i].jbtn_pengurus + '</td>';
					tr_pengurus += '<td>' + pengurus[i].ktp_pengurus + '</td>';
					tr_pengurus += '<td>' + formatNpwp(pengurus[i].npwp_pengurus) + '</td>';
					tr_pengurus += '<td>' + pengurus[i].email_pengurus + '</td>';
					tr_pengurus += '</tr>';
				}
				$('#tbl_pengurus tbody').html(tr_pengurus);

				// fm_pengajuan
				$('#fm_pengajuan h5.title').html('<i class="fa fa-info-circle"></i> Informasi Pembiayaan / ' + key + ' / ' + perusahaan.kd_perusahaan);
				$('#jns_pembiayaan').val(pembiayaan.jns_pembiayaan);
				$('#tenor').val(pembiayaan.tenor + ' bulan');
				$('#nom_pengajuan').val(formatRp(pembiayaan.nom_pengajuan));
				$('#tujuan_pengajuan').val(pembiayaan.tujuan_pembiayaan);

				$('#pemberi_kerja').val(ag_tagihan.nm_pemberi_kerja);
				$('#jml_tagihan').val(tagihan.length);
				var tr_tagihan = '';
				for (var i = 0; i < tagihan.length; i++) {
					tr_tagihan += '<tr>';
					tr_tagihan += '<td>' + (i + 1) + '</td>';
					tr_tagihan += '<td>' + tagihan[i].no_tagihan + '</td>';
					tr_tagihan += '<td>' + formatRp(tagihan[i].nom_tagihan) + '</td>';
					tr_tagihan += '<td>' + formatTgl(tagihan[i].tgl_tagihan) + '</td>';
					tr_tagihan += '<td>' + formatTgl(tagihan[i].tgl_jatem) + '</td>';
					tr_tagihan += '</tr>';
				}
				$('#tbl_tagihan tbody').html(tr_tagihan);
				$('#hub_bouwheer').val(ag_tagihan.hub_pemberi_kerja);
				$('#email_bouwheer').val(ag_tagihan.email_pemberi_kerja);
				$('#info_bouwheer').val(ag_tagihan.info_pemberi_kerja);
				$('#desk_pekerjaan').val(ag_tagihan.desk_pekerjaan);
				$('#bank_tagihan').val(ag_tagihan.nm_bank);
				$('#no_rek_tagihan').val(ag_tagihan.no_rek);
				$('#nm_rek_tagihan').val(ag_tagihan.nm_rek_bank);
				$('#no_va_tagihan').val(ag_tagihan.no_va);

				$('#nm_penjamin').val(jaminan.nm_penjamin);
				$('#desk_penjamin').val(jaminan.desk_penjamin);

				// fm_dokumen
				$('#ft_npwp_perusahaan').val(perusahaan.ft_npwp_perusahaan);
				$('#ft_siup').val(perusahaan.ft_siup_perusahaan);
				$('#ft_akta_pendirian').val(perusahaan.ft_akta_pendirian);
				$('#ft_sk_menkumham').val(perusahaan.ft_sk_menkumham);
				$('#ft_anggran_akhir').val(perusahaan.ft_akta_perubahan);
				$('#ft_tdp').val(perusahaan.ft_tdp_perusahaan);

				var tr_ft_saham = '';
				for (var i = 0; i < pemegang_saham.length; i++) {
					tr_ft_saham += '<tr>';
					tr_ft_saham += '<td>' + (i + 1) + '</td>';
					tr_ft_saham += '<td>' + pemegang_saham[i].nm_pemegang_saham + '</td>';
					tr_ft_saham += '<td>' + pemegang_saham[i].ft_ktp_pemegang_saham + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_saham += '<td>' + pemegang_saham[i].ft_npwp_pemegang_saham + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_saham += '</tr>';
				}
				$('#tbl_ft_pemegang_saham tbody').html(tr_ft_saham);

				var tr_ft_pengurus = '';
				for (var i = 0; i < pengurus.length; i++) {
					tr_ft_pengurus += '<tr>';
					tr_ft_pengurus += '<td>' + (i + 1) + '</td>';
					tr_ft_pengurus += '<td>' + pengurus[i].nm_pengurus + '</td>';
					tr_ft_pengurus += '<td>' + pengurus[i].ft_ktp_pengurus + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_pengurus += '<td>' + pengurus[i].ft_npwp_pengurus + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_pengurus += '</tr>';
				}
				$('#tbl_ft_pengurus tbody').html(tr_ft_pengurus);

				var tr_ft_tagihan = '';
				for (var i = 0; i < tagihan.length; i++) {
					tr_ft_tagihan += '<tr>';
					tr_ft_tagihan += '<td>' + (i + 1) + '</td>';
					tr_ft_tagihan += '<td>' + tagihan[i].no_tagihan + '</td>';
					tr_ft_tagihan += '<td>' + tagihan[i].ft_faktur + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_tagihan += '<td>' + tagihan[i].ft_spk + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_tagihan += '<td>' + tagihan[i].ft_faktur_pajak + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_tagihan += '<td>' + tagihan[i].ft_ba_serah_terima + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_tagihan += '<td>' + tagihan[i].ft_tanda_terima + '<i class="fa fa-paperclip ml-2" style="color: #007bff; cursor: pointer"></i></td>';
					tr_ft_tagihan += '</tr>';
				}
				$('#tbl_ft_tagihan tbody').html(tr_ft_tagihan);

				// fm_lap_keuangan
				$('#ft_lap_keuangan').val(dokumen.lap_keuangan);
				$('#ft_riwayat_tagihan').val(dokumen.history_tagihan);
				$('#ft_rek_koran').val(dokumen.rek_koran);
				$('#ft_kontrak_bouwheer').val(dokumen.dok_kontrak);

				var content = '';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Periode</label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="periode[]" value="` + keuangan[i].periode + `" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Pendapatan</label>
										<input type="text" class="form-control" name="pendapatan[]" value="` + formatRp(keuangan[i].pendapatan) + `" readonly>
										<span class="form-text text-muted">Total Penjualan</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Laba Kotor</label>
										<input type="text" class="form-control" name="laba_kotor[]" value="` + formatRp(keuangan[i].laba_kotor) + `" readonly>
										<span class="form-text text-muted">Pendapatan dikurangi Harga Pokok Produksi atau biaya yang langsung berhubungan dengan penjualan</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Laba Operasional</label>
										<input type="text" class="form-control" name="laba_operasional[]" value="` + formatRp(keuangan[i].laba_operasional) + `" readonly>
										<span class="form-text text-muted">Laba kotor dikurangi biaya marketing dan umum. Semua biaya disini adalah biaya operasional yang tidak berkaitan langsung dengan penjualan</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Laba Bersih</label>
										<input type="text" class="form-control" name="laba_bersih[]" value="` + formatRp(keuangan[i].laba_bersih) + `" readonly>
										<span class="form-text text-muted">Laba operasional dikurangi biaya non-operasional, beban bunga dan beban pajak</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Piutang Dagang</label>
										<input type="text" class="form-control" name="piutang_dagang[]" value="` + formatRp(keuangan[i].piutang_dagang) + `" readonly>
										<span class="form-text text-muted">Tagihan yang belum dibayarkan oleh pembeli</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Total Asset</label>
										<input type="text" class="form-control" name="total_asset[]" value="` + formatRp(keuangan[i].total_aset) + `" readonly>
										<span class="form-text text-muted">Total asset perusahaan yang melingkupi kas, asset tetap, piutang, dan lainnya</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Total Hutang</label>
										<input type="text" class="form-control" name="total_hutang[]" value="` + formatRp(keuangan[i].total_hutang) + `" readonly>
										<span class="form-text text-muted">Total hutang berbunga terhadap institusi keuangan seperti bank, leasing dan hutang terhadap pemegang saham</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Ekuitas</label>
										<input type="text" class="form-control" name="ekuitas[]" value="` + formatRp(keuangan[i].ekuitas) + `" readonly>
										<span class="form-text text-muted">Modal dari perusahaan, suntikan dana dari pemegang saham dan akumulasi dari laba ditahan</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Aktiva Lancar</label>
										<input type="text" class="form-control" name="aktiva_lancar[]" value="` + formatRp(keuangan[i].aktiva_lancar) + `" readonly>
										<span class="form-text text-muted">Aktiva Lancar</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Hutang Lancar</label>
										<input type="text" class="form-control" name="hutang_lancar[]" value="` + formatRp(keuangan[i].hutang_lancar) + `" readonly>
										<span class="form-text text-muted">Hutang Lancar</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Margin Laba Bersih</label>
										<input type="text" class="form-control" name="margin_laba[]" value="` + keuangan[i].mrg_laba_bersih + ` %" readonly>
										<span class="form-text text-muted">Laba Bersih terhadap Pendapatan</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Rasio Hutang terhadap Modal</label>
										<input type="text" class="form-control" name="ratio_hutang[]" value="` + keuangan[i].ratio_hutang + `" readonly>
										<span class="form-text text-muted">Total Hutang terhadap Modal</span>
									</div>`;
				}
				content += '</div>';
				content += '<div class="form-row">';
				for (var i = 0; i < keuangan.length; i++) {
					content += `<div class="form-group col-md-4">
										<label>Current Ratio</label>
										<input type="text" class="form-control" name="current_ratio[]" value="` + keuangan[i].current_ratio + `" readonly>
										<span class="form-text text-muted">Activa Lancar terhadap Hutang Lancar</span>
									</div>`;
				}
				content += '</div>';

				$('#li_lap_keuangan').html(content);

				$('#tgl_survey').val(formatTgl(survey.tgl_survey));
				$('#lok_survey').val(survey.lok_survey);
				$('#pihak_survey').val(survey.pic_survey);
				$('#pic_benef').val(survey.pic_kunjungan);
				$('#no_kontak_pic').val(survey.telp_pic_kunjungan);
				$('#hasil_survey').val(survey.hasil_survey);
				$('#ft_dokumentasi').val(survey.dok_survey);

				var tr_aspek = '';
				for (var i = 0; i < portofolio.length; i++) {
					tr_aspek += '<tr>';
					tr_aspek += '<td>' + (i + 1) + '</td>';
					tr_aspek += '<td>' + portofolio[i].bln_thn_proyek + '</td>';
					tr_aspek += '<td>' + portofolio[i].nm_proyek + '</td>';
					tr_aspek += '<td>' + formatRp(portofolio[i].nilai_proyek) + '</td>';
					tr_aspek += '<td>' + portofolio[i].sts_proyek + '</td>';
					tr_aspek += '</tr>';
				}
				$('#tbl_aspek tbody').html(tr_aspek);

				// fm_analisa
				$('#kd_invoice').val(key);
				if (analisa != null) {
					$('input:radio[name="kyc_buyer"][value="' + analisa.kyc_buyer + '"]')[0].checked = true;
					$('input:radio[name="td_buyer"][value="' + analisa.trade_buyer + '"]')[0].checked = true;
					$('input:radio[name="sektor_buyer"][value="' + analisa.sektor_buyer + '"]')[0].checked = true;
					$('input:radio[name="kap_buyer"][value="' + analisa.kapabilitas_buyer + '"]')[0].checked = true;
					$('input:radio[name="history_buyer"][value="' + analisa.history_buyer + '"]')[0].checked = true;
					$('input:radio[name="pembayaran_buyer"][value="' + analisa.pembayaran_buyer + '"]')[0].checked = true;
					$('input:radio[name="inv_a_buyer"][value="' + analisa.project_buyer_a + '"]')[0].checked = true;
					$('input:radio[name="inv_b_buyer"][value="' + analisa.project_buyer_b + '"]')[0].checked = true;
					$('input:radio[name="inv_b_buyer"][value="' + analisa.project_buyer_b + '"]')[0].checked = true;
					$('input:radio[name="kol_seller"][value="' + analisa.kol_seller + '"]')[0].checked = true;
					$('input:radio[name="kyc_seller"][value="' + analisa.kyc_seller + '"]')[0].checked = true;
					$('input:radio[name="td_1_seller"][value="' + analisa.trade_seller_1 + '"]')[0].checked = true;
					$('input:radio[name="td_2_seller"][value="' + analisa.trade_seller_2 + '"]')[0].checked = true;
					$('input:radio[name="sektor_seller"][value="' + analisa.sektor_seller + '"]')[0].checked = true;
					$('input:radio[name="pengalaman_1_seller"][value="' + analisa.pengalaman_seller_1 + '"]')[0].checked = true;
					$('input:radio[name="pengalaman_2_seller"][value="' + analisa.pengalaman_seller_2 + '"]')[0].checked = true;
					$('input:radio[name="pembayaran_seller"][value="' + analisa.pembayaran_seller + '"]')[0].checked = true;

					$(':radio:not(:checked)').attr('disabled', true);
					$('.btn-primary').css('display', 'none');
				} else {
					$('#fm_analisa')[0].reset();

					if ('<?= $_SESSION['jabatan'] ?>' != 'BBRM') {
						$(':radio:not(:checked)').attr('disabled', true);
						$('.btn_analisa').css('display', 'none');
					} else {
						$(':radio:not(:checked)').attr('disabled', false);
						$('.btn_analisa').css('display', 'block');
					}
				}

				if (pembiayaan.status == 'Analisa aspek agunan') {
					fun_history(key);
				}

				if (pembiayaan.status == 'Proses usulan pembiayaan') {
					fun_history(key);
					fun_agunan(key);
				}

				if (pembiayaan.status == 'Input syarat pembiayaan') {
					fun_history(key);
					fun_agunan(key);
					fun_usulan(key);
				}

				if (pembiayaan.status == 'Proses komite') {
					fun_history(key);
					fun_agunan(key);
					fun_usulan(key);
					fun_syarat(key);
				} else {
					fun_history(key);
					fun_agunan(key);
					fun_usulan(key);
					fun_syarat(key);
					fun_komite(key);
				}
			}
		});
	}

	function fun_history(key) {
		var content = '',
			tbl_content = '',
			avg_bln = 0,
			avg_hari = 0;

		$('#history-tab').css('display', 'block');

		$.ajax({
			url: '<?= site_url('sales/finance/detail/') ?>' + key,
			type: 'post',
			dataType: 'json',
			success: function(data) {
				let pembiayaan = data.pembiayaan;
				let history = data.history;

				for (let i = 0; i < history.length; i++) {
					avg_bln += history[i].avg_tagihan_bln / history.length;
					avg_hari += history[i].avg_tagihan_hari / history.length / 30;

					content += '<tr>';
					content += '<td>' + (i + 1) + '</td>';
					content += '<td>' + history[i].nm_pemberi_kerja + '</td>';
					content += '<td>' + history[i].nm_pekerjaan + '</td>';
					content += '<td>' + history[i].periode_pekerjaan + '</td>';
					content += '<td>' + formatRp(history[i].avg_tagihan_bln) + '</td>';
					content += '<td>' + history[i].periode_tagihan + '</td>';
					content += '<td>' + history[i].avg_tagihan_hari + ' Hari</td>';
					content += '<td>' + history[i].rek_tagihan + '</td>';
					content += '</tr>';
				}

				tbl_content += '<tr><th>Rata-rata Tagihan per bulan</th><td>' + formatRp(avg_bln) + '</td></tr>';
				tbl_content += '<tr><th>Rata-rata Hari Tagihan</th><td>' + Math.ceil(avg_hari) + ' Hari</td></tr>';
				tbl_content += '<tr><th>Maksimal Limit Wa`ad</th><td>' + formatRp(avg_bln * Math.ceil(avg_hari)) + '</td></tr>';
				tbl_content += '<tr style="background-color: #e4e4e4"><th>Usulan Wa`ad</th><th>' + formatRp(pembiayaan.usulan_waad) + '</th></tr>';

				$('#tab-history tbody').html(content);
				$('#tab-history #tbl_waad').html(tbl_content);
			}
		});
	}

	function fun_agunan(key) {
		var cont_agunan = '',
			tbl_agunan = '';

		$('#agunan-tab').css('display', 'block');

		$.ajax({
			url: '<?= site_url('sales/finance/detail/') ?>' + key,
			type: 'post',
			dataType: 'json',
			success: function(data) {
				let agunan = data.agunan;
				let analisa_agn = data.analisa_agn;

				for (let i = 0; i < agunan.length; i++) {
					cont_agunan += '<tr>';
					cont_agunan += '<td style="width: 15px">' + (i + 1) + '</td>';
					cont_agunan += '<td>' + agunan[i].data_agunan + '</td>';
					cont_agunan += '<td>' + formatRp(agunan[i].nilai_pasar) + '</td>';
					cont_agunan += '</tr>';
				}

				tbl_agunan += '<tr>';
				tbl_agunan += '<th>Total Nilai Agunan</th>';
				tbl_agunan += '<td>' + formatRp(analisa_agn.total_agunan) + '</td>';
				tbl_agunan += '</tr>';
				tbl_agunan += '<tr>';
				tbl_agunan += '<th>OS Pembiayaan Exsisting</th>';
				tbl_agunan += '<td>' + formatRp(analisa_agn.os_eksisting) + '</td>';
				tbl_agunan += '</tr>';
				tbl_agunan += '<tr>';
				tbl_agunan += '<th>Tambahan Pembiayaan</th>';
				tbl_agunan += '<td>' + formatRp(analisa_agn.tambahan_pembiayaan) + '</td>';
				tbl_agunan += '</tr>';
				tbl_agunan += '<tr>';
				tbl_agunan += '<th>Total Exposure</th>';
				tbl_agunan += '<td>' + formatRp(analisa_agn.total_exposure) + '</td>';
				tbl_agunan += '</tr>';
				tbl_agunan += '<tr style="background-color: #e4e4e4">';
				tbl_agunan += '<th>CCR Agunan Fixed Asset</th>';
				tbl_agunan += '<th>' + analisa_agn.fixed_asset + ' %</th>';
				tbl_agunan += '</tr>';

				$('#tbl_agunan tbody').html(cont_agunan);
				$('#tbl_analisa_agn').html(tbl_agunan);
			}
		});
	}

	function fun_usulan(key) {
		var content = '',
			tbl_content = '';

		$('#usulan-tab').css('display', 'block');

		$.ajax({
			url: '<?= site_url('sales/finance/detail/') ?>' + key,
			type: 'post',
			dataType: 'json',
			success: function(data) {
				let usulan = data.usulan;


				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Skim Pembiayaan</th>';
				tbl_content += '<td>' + usulan.skim_pembiayaan + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Sifat Pembiayaan</th>';
				tbl_content += '<td>' + usulan.sifat_pembiayaan + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Tujuan Pembiayaan</th>';
				tbl_content += '<td>' + usulan.tujuan_pembiayaan + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Jangka Waktu Wa`ad</th>';
				tbl_content += '<td>' + usulan.tenor_waad + ' Bulan</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Jangka Waktu per Penarikan</th>';
				tbl_content += '<td>' + usulan.jk_penarikan + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Cara Pencairan</th>';
				tbl_content += '<td>' + usulan.cara_pencairan + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Sumber dan Cara Pelunasan</th>';
				tbl_content += '<td>' + usulan.sumber_pelunasan + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">Biaya-Biaya</th>';
				tbl_content += '<td>&nbsp;</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">a. Biaya Administrasi</th>';
				tbl_content += '<td>' + formatRp(usulan.biaya_admin) + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';
				tbl_content += '<th style="width: 150px">b. Biaya Asuransi Penjaminan</th>';
				tbl_content += '<td>' + formatRp(usulan.biaya_penjamin) + '</td>';
				tbl_content += '</tr>';
				tbl_content += '<tr>';

				for (let i = 0; i < data.biaya_lain.length; i++) {
					content += `<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">` + data.biaya_lain[i].nama + `</label>
										<div class="col-sm my-auto">
											` + formatRp(data.biaya_lain[i].nominal) + `
										</div>
									</div>`;
				}

				tbl_content += '<th style="width: 150px">c. Biaya Lain-lain</th>';
				tbl_content += '<td class="py-1">' + content + '</td>';
				tbl_content += '</tr>';

				$('#tbl_usulan').html(tbl_content);
			}
		});
	}

	function fun_syarat(key) {
		var content = '';

		$('#syarat-tab').css('display', 'block');

		$.ajax({
			url: '<?= site_url('sales/finance/detail/') ?>' + key,
			type: 'post',
			dataType: 'json',
			success: function(data) {
				let syarat = data.syarat;

				content += '<label>Syarat Penandatanganan Akad Pembiayaan</label>';
				for (let i = 0; i < syarat.akad.length; i++) {
					content += '<p class="ml-3">' + (i + 1) + ') ' + syarat.akad[i] + '</p>';
				}

				content += '<label>Syarat Pencairan Pembiayaan</label>';
				for (let i = 0; i < syarat.cair.length; i++) {
					content += '<p class="ml-3">' + (i + 1) + ') ' + syarat.cair[i] + '</p>';
				}

				content += '<label>Syarat Lain-lain</label>';
				for (let i = 0; i < syarat.lain.length; i++) {
					content += '<p class="ml-3">' + (i + 1) + ') ' + syarat.lain[i] + '</p>';
				}

				$('#tab-syarat').html(content);
			}
		});
	}

	function fun_komite(key) {
		var content = '';

		$('#komite-tab').css('display', 'block');

		$.ajax({
			url: '<?= site_url('sales/finance/detail/') ?>' + key,
			type: 'post',
			dataType: 'json',
			success: function(data) {
				let komite = data.komite;

				for (let i = 0; i < komite.length; i++) {
					content += '<tr>';
					content += '<td class="align-top" width="10%">' + komite[i].tgl_komite + '</td>';
					content += '<td class="align-top">';
					content += komite[i].nm_marketing + ' - Marketing<br>';
					content += komite[i].nm_risk_officer + ' - RRO<br>';
					content += komite[i].nm_abbm + ' - ABBM';
					content += '</td>';
					content += '<td class="align-top">' + komite[i].nm_area_manager + ' - AM</td>';
					content += '<td class="align-top" style="text-transform: capitalize">' + komite[i].hasil_komite + '</td>';
					content += '<td class="align-top" width="50%">' + komite[i].catatan_komite + '</td>';
					content += '</tr>';
				}

				$('#tbl_komite tbody').html(content);
			}
		});
	}
</script>
