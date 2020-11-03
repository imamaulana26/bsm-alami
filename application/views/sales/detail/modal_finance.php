<!-- Modal -->
<div class="modal fade in" id="detail_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title-detail"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card card-primary card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="pic-tab" data-toggle="pill" href="#tab-pic" role="tab" aria-controls="tab-pic" aria-selected="true"><i class="fa fa-user mr-1"></i> Profile PIC</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="perusahaan-tab" data-toggle="pill" href="#tab-perusahaan" role="tab" aria-controls="tab-perusahaan" aria-selected="false"><i class="fa fa-building mr-1"></i> Perusahaan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="pengajuan-tab" data-toggle="pill" href="#tab-pengajuan" role="tab" aria-controls="tab-pengajuan" aria-selected="false"><i class="fa fa-calendar mr-1"></i> Pengajuan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="dokumen-tab" data-toggle="pill" href="#tab-dokumen" role="tab" aria-controls="tab-dokumen" aria-selected="false"><i class="fa fa-folder mr-1"></i> Dokumen</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="keuangan-tab" data-toggle="pill" href="#tab-keuangan" role="tab" aria-controls="tab-keuangan" aria-selected="false"><i class="fa fa-money-check-alt mr-1"></i> Lap. Keuangan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="analisa-tab" data-toggle="pill" href="#tab-analisa" role="tab" aria-controls="tab-analisa" aria-selected="false"><i class="fa fa-check-square mr-1"></i> Checklist RAC</a>
							</li>

							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="history-tab" data-toggle="pill" href="#tab-history" role="tab" aria-controls="tab-history" aria-selected="false" style="display: none;"><i class="fa fa-history mr-1"></i> History Penagihan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="agunan-tab" data-toggle="pill" href="#tab-agunan" role="tab" aria-controls="tab-agunan" aria-selected="false" style="display: none;">Analisa Aspek Agunan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="usulan-tab" data-toggle="pill" href="#tab-usulan" role="tab" aria-controls="tab-usulan" aria-selected="false" style="display: none;">Usulan & Analisa Pembiayaan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="syarat-tab" data-toggle="pill" href="#tab-syarat" role="tab" aria-controls="tab-syarat" aria-selected="false" style="display: none;">Syarat Pembiayaan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link detail-menu-tab" id="komite-tab" data-toggle="pill" href="#tab-komite" role="tab" aria-controls="tab-komite" aria-selected="false" style="display: none;">Catatan Komite</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content" id="custom-tabContent">
							<div class="tab-pane fade" id="tab-pic" role="tabpanel" aria-labelledby="pic-tab">
								<form id="fm_pic">
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>ID Penerima Pembiayaan</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="id_penerima" id="id_penerima" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Nama Lengkap</label>
											<input type="text" class="form-control" name="nm_lengkap" id="nm_lengkap" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Alamat Email</label>
											<input type="email" class="form-control" name="almt_email" id="almt_email" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>No. Handphone</label>
											<input type="text" class="form-control" name="no_hp" id="no_hp" onkeypress="return CheckNumeric()" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Alamat Tempat Tinggal</label>
										<textarea class="form-control" name="alamat" id="alamat" readonly></textarea>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Nama Perusahaan</label>
											<input type="text" class="form-control" name="perusahaan_pic" id="perusahaan_pic" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Jabatan di Perusahaan</label>
											<input type="text" class="form-control" name="jabatan" id="jabatan" readonly>
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="tab-perusahaan" role="tabpanel" aria-labelledby="perusahaan-tab">
								<form id="fm_perusahaan">
									<h5 class="mb-3"><i class="fa fa-building"></i> Profile Perusahaan</h5>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Nama Perusahaan</label>
											<input type="text" class="form-control" name="nm_perusahaan" id="nm_perusahaan" readonly>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Jenis Industri</label>
											<input type="text" class="form-control" name="industri" id="industri" readonly>
										</div>
										<div class="form-group col-md-6">
											<label>Jenis Sub Industri</label>
											<input type="text" class="form-control" name="sub_industri" id="sub_industri" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Deskripsi Perusahaan</label>
										<textarea class="form-control" name="desk_perusahaan" id="desk_perusahaan" readonly></textarea>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Tanggal Pendirian (Sesuai Akta)</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="tgl_pendirian" id="tgl_pendirian" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-calendar"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Provinsi</label>
											<input type="text" class="form-control" name="provinsi" id="provinsi" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Kota/Kabupaten</label>
											<input type="text" class="form-control" name="kota_kab" id="kota_kab" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Alamat Perusahaan</label>
										<textarea class="form-control" name="almt_perusahaan" id="almt_perusahaan" readonly></textarea>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>NPWP Perusahaan</label>
											<input type="text" class="form-control" name="npwp_perusahaan" id="npwp_perusahaan" readonly>
										</div>
										<div class="form-group col-md-6">
											<label>No. Telepon Perusahaan</label>
											<input type="text" class="form-control" name="no_telp_perusahaan" id="no_telp_perusahaan" onkeypress="return CheckNumeric()" readonly>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Email Perusahaan</label>
											<input type="text" class="form-control" name="email_perusahaan" id="email_perusahaan" readonly>
										</div>
										<div class="form-group col-md-6">
											<label>Website Perusahaan</label>
											<input type="text" class="form-control" name="web_perusahaan" id="web_perusahaan" readonly>
										</div>
									</div><br>

									<h5 class="mb-3"><i class="fa fa-user"></i> Pemegang Saham</h5>
									<table id="tbl_pemegang_saham" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Jenis Pemegang Saham</th>
												<th>Nama Pemegang Saham</th>
												<th class="text-center">Kepemilikan</th>
												<th>Nomor KTP Pemegang Saham</th>
												<th>NPWP Persorangan</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
									<br>

									<h5 class="mb-3"><i class="fa fa-user"></i> Profile Pengurus/Direksi Sesuai Akta Terbaru</h5>
									<table id="tbl_pengurus" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Lengkap</th>
												<th>Jabatan</th>
												<th>Nomor KTP Pengurus</th>
												<th>NPWP Pengurus</th>
												<th>Email Pengurus</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
									<br>

									<h5 class="mb-3"><i class="fa fa-university"></i> Informasi Rekening Bank Perusahaan</h5>
									<label>Rekning ini adalah rekening tujuan penerimaan pembiayaan</label>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Nama Bank</label>
											<input type="text" class="form-control" name="bank_penerima" id="bank_penerima" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Nomor Rekening</label>
											<input type="text" class="form-control" name="no_rek_penerima" id="no_rek_penerima" onkeypress="return CheckNumeric()" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Nama Rekening</label>
											<input type="text" class="form-control" name="nm_rek_penerima" id="nm_rek_penerima" readonly>
										</div>
									</div>
									<label>Rekning ini adalah rekening tujuan pengembalian pembiayaan</label>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Nama Bank</label>
											<input type="text" class="form-control" name="bank_pengembalian" id="bank_pengembalian" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Nomor VA</label>
											<input type="text" class="form-control" name="no_va_pengembalian" id="no_va_pengembalian" onkeypress="return CheckNumeric()" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Atas Nama VA</label>
											<input type="text" class="form-control" name="nm_va_pengembalian" id="nm_va_pengembalian" readonly>
										</div>
									</div>
									<br>

									<h5 class="mb-3"><i class="fa fa-exclamation-triangle"></i> Pernyataan Kepatuhan Syariah</h5>
									<div class="form-check">
										<input type="checkbox" checked disabled class="form-check-input" id="point_1">
										<label class="form-check-label" for="point_1" style="cursor: pointer">Bisnis yang kami jalankan <b>tidak bergerak</b> dalam penjualan makanan dan minuman non-halal, seperti minuman keras dan daging babi.</label>
									</div>
									<div class="form-check">
										<input type="checkbox" checked disabled class="form-check-input" id="point_2">
										<label class="form-check-label" for="point_2" style="cursor: pointer">Bisnis yang kami jalankan <b>tidak bergerak</b> dalam aktivitas yang berkaitan dengan prostitusi, judi atau narkoba.</label>
									</div>
									<div class="form-check">
										<input type="checkbox" checked disabled class="form-check-input" id="point_3">
										<label class="form-check-label" for="point_3" style="cursor: pointer">Bisnis yang kami jalankan <b>tidak bergerak</b> dalam penjualan komoditas yang belum dipastikan kehalalannya menurut aturan syariah diantaranya rokok.</label>
									</div>
									<div class="form-check">
										<input type="checkbox" checked disabled class="form-check-input" id="point_4">
										<label class="form-check-label" for="point_4" style="cursor: pointer">Bisnis yang kami jalankan <b>tidak bergerak</b> dibidang perhotelan dan pariwisata non-syariah.</label>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="tab-pengajuan" role="tabpanel" aria-labelledby="pengajuan-tab">
								<form id="fm_pengajuan">
									<h5 class="title mb-3"></h5>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Jenis Pembiayaan</label>
											<input type="text" class="form-control" name="jns_pembiayaan" id="jns_pembiayaan" readonly>
										</div>
										<div class="form-group col-md-2">
											<label>Tenor Pembiayaan</label>
											<input type="text" class="form-control" name="tenor" id="tenor" readonly>
										</div>
										<div class="form-group col-md-1">
											<label>Mata Uang</label>
											<input type="text" class="form-control" name="mata_uang" id="mata_uang" value="IDR" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Nilai Pembiayaan yang diajukan</label>
											<input type="text" class="form-control" name="nom_pengajuan" id="nom_pengajuan" readonly>
											<span class="form-text text-muted">Nominal Pembiayaan Rp 5 juta sampai dengan Rp 2 milyar</span>
										</div>
									</div>
									<div class="form-group">
										<label>Tujuan Penggunaan Dana</label>
										<textarea class="form-control" name="tujuan_pengajuan" id="tujuan_pengajuan" readonly></textarea>
									</div>
									<br>

									<h5 class="mb-3"><i class="fa fa-clipboard-list"></i> Daftar Agunan</h5>
									<label>Agunan 1</label>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Jenis Agunan</label>
											<input type="text" class="form-control" value="Invoice / Tagihan" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Pemberi Kerja</label>
											<input type="text" class="form-control" name="pemberi_kerja" id="pemberi_kerja" readonly>
										</div>
										<div class="form-group col-md-2">
											<label>Jumlah Tagihan</label>
											<input type="text" class="form-control" name="jml_tagihan" id="jml_tagihan" onkeypress="return CheckNumeric()" readonly>
										</div>
									</div>
									<table id="tbl_tagihan" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nomor Tagihan</th>
												<th>Nilai Tagihan (tidak termasuk pajak)</th>
												<th>Tanggal Tagihan</th>
												<th>Tanggal Jatuh Tempo</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
									<div class="form-group">
										<label>Deskripsi Pekerjaan</label>
										<input type="text" class="form-control" name="desk_pekerjaan" id="desk_pekerjaan" readonly>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Hubungan Dengan Pemberi Kerja / <i>Bouwheer</i></label>
											<input type="text" class="form-control" name="hub_bouwheer" id="hub_bouwheer" readonly>
										</div>
										<div class="form-group col-md-6">
											<label>Email Pemberik Kerja / <i>Bouwheer</i></label>
											<input type="text" class="form-control" name="email_bouwheer" id="email_bouwheer" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Deskripsi Pekerjaan</label>
										<textarea class="form-control" name="info_bouwheer" id="info_bouwheer" readonly></textarea>
									</div>
									<label>Rekening Pembayaran Tagihan</label>
									<div class="form-row">
										<div class="form-group col-md-3">
											<label>Nama Bank</label>
											<input type="text" class="form-control" name="bank_tagihan" id="bank_tagihan" readonly>
										</div>
										<div class="form-group col-md-3">
											<label>Nomor Rekening</label>
											<input type="text" class="form-control" name="no_rek_tagihan" id="no_rek_tagihan" readonly>
										</div>
										<div class="form-group col-md-3">
											<label>Nama Pemilik Rekening</label>
											<input type="text" class="form-control" name="nm_rek_tagihan" id="nm_rek_tagihan" readonly>
										</div>
										<div class="form-group col-md-3">
											<label>Nomor Virtual Account</label>
											<input type="text" class="form-control" name="no_va_tagihan" id="no_va_tagihan" readonly>
										</div>
									</div>
									<label>Agunan 2</label>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>Jenis Agunan</label>
											<input type="text" class="form-control" value="Jaminan Personal" readonly>
										</div>
										<div class="form-group col-md-6">
											<label>Nama Penjamin</label>
											<input type="text" class="form-control" name="nm_penjamin" id="nm_penjamin" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Deskripsi Singkat Penjamin</label>
										<textarea class="form-control" name="desk_penjamin" id="desk_penjamin" readonly></textarea>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="tab-dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
								<form id="fm_dokumen">
									<h5 class="mb-3"><i class="fa fa-folder-open"></i> Dokumen Perusahaan</h5>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>NPWP Perusahaan</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_npwp_perusahaan" id="ft_npwp_perusahaan" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>SIUP</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_siup" id="ft_siup" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Akta Pendirian</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_akta_pendirian" id="ft_akta_pendirian" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>SK Menkumham</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_sk_menkumham" id="ft_sk_menkumham" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Akta Perubahan Anggaran Dasar Terakhir</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_anggran_akhir" id="ft_anggran_akhir" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>TDP</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_tdp" id="ft_tdp" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
									</div>

									<h5 class="mb-3"><i class="fa fa-user"></i> Pemegang Saham</h5>
									<table id="tbl_ft_pemegang_saham" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Pemegang Saham</th>
												<th>KTP Pemegang Saham</th>
												<th>NPWP Pemegang Saham</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>

									<h5 class="mb-3"><i class="fa fa-user"></i> Pengurus Perusahaan</h5>
									<table id="tbl_ft_pengurus" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Pengurus Perusahaan</th>
												<th>KTP Pengurus Perusahaan</th>
												<th>NPWP Pengurus Perusahaan</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>

									<h5 class="mb-3"><i class="fa fa-clipboard-list"></i> Daftar Agunan</h5>
									<label>Agunan 1 ( Invoice / Tagihan )</label><br>
									<table id="tbl_ft_tagihan" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>No Tagihan</th>
												<th>Invoice / Faktur</th>
												<th>SPK / PO</th>
												<th>Faktur Pajak</th>
												<th>Berita Acara Serah Terima</th>
												<th>Tanda Terima Invoice (Invoice Receipt)</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>

									<h5 class="mb-3"><i class="fa fa-paste"></i> Dokumen Lainnya</h5>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Laporan Keuangan</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_lap_keuangan" id="ft_lap_keuangan" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Riwayat Tagihan</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_riwayat_tagihan" id="ft_riwayat_tagihan" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Rekening Koran (6 bulan terakhir)</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_rek_koran" id="ft_rek_koran" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Dokumen Kontrak dengan bohir terkait pembiayaan yang diajukan</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_kontrak_bouwheer" id="ft_kontrak_bouwheer" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="tab-keuangan" role="tabpanel" aria-labelledby="keuangan-tab">
								<form id="fm_keuangan">
									<h5 class="mb-3"><i class="fa fa-hand-holding-usd"></i> Kapasiltas & Modal</h5>
									<label>Note : Isi laporan keuangan dalam format ribuan (Ex: 1.000.000.000 isi dengan 1.000.000)</label>
									<div id="li_lap_keuangan"></div>

									<label>Hasil Survey</label>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Tanggal Survey</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="tgl_survey" id="tgl_survey" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-calendar"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Lokasi Survey</label>
											<input type="text" class="form-control" name="lok_surey" id="lok_survey" readonly>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Pihak yang melakukan survey</label>
											<input type="text" class="form-control" name="pihak_survey" id="pihak_survey" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>Pihak yang menerima kunjungan & jabatan (PIC Benef)</label>
											<input type="text" class="form-control" name="pic_benef" id="pic_benef" readonly>
										</div>
										<div class="form-group col-md-4">
											<label>No Kontak PIC</label>
											<input type="text" class="form-control" name="no_kontak_pic" id="no_kontak_pic" onkeypress="return CheckNumeric()" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Hasil Survey</label>
										<textarea class="form-control" name="hasil_survey" id="hasil_survey" readonly></textarea>
									</div>

									<label>Dokumentasi Survey</label>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Dokumentasi</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_dokumentasi" id="ft_dokumentasi" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><span class="fa fa-paperclip" style="color: #007bff;"></span></span>
												</div>
											</div>
										</div>
									</div>

									<h5 class="mb-3">Aspek Operasional</h5>
									<label>Portofolio Bisnis</label>
									<table id="tbl_aspek" class="tbl_detail table table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Bulan Tahun Proyek</th>
												<th>Nama Proyek</th>
												<th>Nilai Proyek</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</form>
							</div>
							<div class="tab-pane fade" id="tab-analisa" role="tabpanel" aria-labelledby="analisa-tab">
								<form id="fm_analisa" method="post" action="<?= site_url('sales/finance/simpan_rac') ?>">
									<input type="hidden" name="kd_invoice" id="kd_invoice" class="form-control">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th style="width: 15px;">#</th>
												<th class="text-center">Aspek</th>
												<th class="text-center">Kriteria</th>
												<th class="text-center" style="width: 15%;">Pemenuhan Kriteria</th>
											</tr>
											<tr>
												<th class="text-center" colspan="4">Calon Buyer</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>KYC</td>
												<td>
													Tidak terdaftar dalam Daftar Hitam Nasional (DHN) Penarik Cek dan/atau Bilyet Giro Kosong, baik atas nama Badan Usaha, Pengurus dan/atau Pemegang Saham.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kyc_buyer" id="kyc_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="kyc_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kyc_buyer" id="kyc_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="kyc_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Trade Checking</td>
												<td>
													Tidak terdapat informasi negatif dan tidak sedang menghadapi/terlibat masalah hukum yang material dan mengganggu kelangsungan usahan calon buyer.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="td_buyer" id="td_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="td_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="td_buyer" id="td_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="td_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Klasifikasi Sektor Usaha (khusus untuk perusahaan swasta)</td>
												<td>
													Masuk ke dalam klasifikasi "industri menarik" atau "industri netral" sesuai dengan portofolio guideline BSM posisi ter-update.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="sektor_buyer" id="sektor_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="sektor_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="sektor_buyer" id="sektor_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="sektor_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>Pengalaman & Kapabilitas Usaha</td>
												<td>
													Usaha telah berjalan minimal 3 (tiga) tahun dan/atau manajemen memiliki pengalaman mengelola bisnis sesuai bidang usahanya minimal 3 (tiga) tahun.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kap_buyer" id="kap_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="kap_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kap_buyer" id="kap_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="kap_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>Histori Pembayaran</td>
												<td>
													Tidak memiliki histori pembayaran macet kepada seller/supplier/agent/distributor/kontraktor selama 2 (dua) tahun terakhir.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="history_buyer" id="histori_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="histori_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="history_buyer" id="histori_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="histori_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>Pembayaran</td>
												<td>
													Melalui rekening escrow seller atau rekening virtual account seller yang telah diblokir sejumlah plafond pencairan di BSM.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pembayaran_buyer" id="pembayaran_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="pembayaran_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pembayaran_buyer" id="pembayaran_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="pembayaran_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td rowspan="2">7</td>
												<td rowspan="2">Project/Invoice</td>
												<td>
													a. Termasuk dalam daftar proyek pemerintah seperti daftar proyek PSN, dll.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="inv_a_buyer" id="inv_a_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="inv_a_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="inv_a_buyer" id="inv_a_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="inv_a_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													b. Untuk swasta dapat di verifikasi dalam rencana kerja perusahaan tahun anggaran.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="inv_b_buyer" id="inv_b_buyer1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="inv_b_buyer1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="inv_b_buyer" id="inv_b_buyer0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="inv_b_buyer0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
										</tbody>
										<thead>
											<tr>
												<th class="text-center" colspan="4">Calon Seller</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Kolektibilitas</td>
												<td>
													Memiliki kolektibilitas lancar (kol.1) pada Bank dan/atau Bank lain atas nama Perorangan atau Badan Usaha, selama periode minimal 6 bulan terakhir sesuai hasil ideb (apabila memiliki pembiayaan di Bank).
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kol_seller" id="kol_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="kol_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kol_seller" id="kol_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="kol_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>KYC</td>
												<td>
													Tidak terdaftar dalam Daftar Hitam Nasional (DHN) Penarik Cek dan/atau Bilyet Giro Kosong, baik atas nama Badan Usaha, Pengurus dan/atau Pemegang Saham.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kyc_seller" id="kyc_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="kyc_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="kyc_seller" id="kyc_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="kyc_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td rowspan="2">3</td>
												<td rowspan="2">Trade Checking</td>
												<td>
													1. Tidak terdapat informasi negatif dan tidak sedang menghadapi/terlibat masalah hukum yang material dan mengganggu kelangsungan usaha calon buyer.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="td_1_seller" id="td_1_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="td_1_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="td_1_seller" id="td_1_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="td_1_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													2. Tidak terafiliasi (memiliki hubungan kepemilikan, kepengurusan, kekeluargaan) dengan buyer.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="td_2_seller" id="td_2_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="td_2_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="td_2_seller" id="td_2_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="td_2_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>Klasifikasi Sektor Usaha (khusus untuk perusahaan swasta)</td>
												<td>
													Masuk ke dalam klasifikasi "industri menarik" atau "industri netral" sesuai dengan portofolio guideline BSM posisi ter-update.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="sektor_seller" id="sektor_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="sektor_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="sektor_seller" id="sektor_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="sektor_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td rowspan="2">5</td>
												<td rowspan="2">Pengalaman Usaha</td>
												<td>
													1. Merupakan supplier/agent/distributor/kontraktor rekanan buyer berdasarkan rekomendasi buyer atau kontrak atau dokumen kerjasama lainnya.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pengalaman_1_seller" id="pengalaman_1_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="pengalaman_1_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pengalaman_1_seller" id="pengalaman_1_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="pengalaman_1_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													2. Telah bekerjasama dengan buyer minimal 1 tahun terakhir dengan histori penyelesaian pekerjaan baik.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pengalaman_2_seller" id="pengalaman_2_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="pengalaman_2_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pengalaman_2_seller" id="pengalaman_2_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="pengalaman_2_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>Pembayaran Invoice</td>
												<td>
													Melalui rekening escrow seller atau rekening virtual account seller yang telah diblokir sejumlah plafond pencairan di BSM.
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pembayaran_seller" id="pembayaran_seller1" value="1" style="cursor: pointer;" required>
														<label class="form-check-label" for="pembayaran_seller1" style="cursor: pointer;">Terpenuhi</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="pembayaran_seller" id="pembayaran_seller0" value="0" style="cursor: pointer;" required>
														<label class="form-check-label" for="pembayaran_seller0" style="cursor: pointer;">Tdk Terpenuhi</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<button type="submit" class="btn btn-primary btn_analisa float-right">Simpan</button>
								</form>
							</div>

							<div class="tab-pane fade" id="tab-history" role="tabpanel" aria-labelledby="history-tab">
								<table class="table table-bordered" id="tbl_perhitungan">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Pemberi Kerja</th>
											<th>Nama Perkerjaan</th>
											<th>Periode Perkerjaan</th>
											<th>Avg. Tagihan/bln</th>
											<th>Periode Tagihan</th>
											<th>Avg. Hari Tagihan</th>
											<th>Rekening Tagihan</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
								<p>Ket : Periode tagihan disesuaikan dengan jangka waktu proyek yang telah dikerjakan.</p>

								<div class="row pt-2">
									<div class="col-md-12">
										<h5><b>Perhitungan Limit Wa`ad</b></h5>
									</div>
									<div class="col-md-5">
										<table class="table" id="tbl_waad"></table>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tab-agunan" role="tabpanel" aria-labelledby="agunan-tab">
								<div class="row">
									<div class="col-md-8">
										<table class="table table-bordered" id="tbl_agunan">
											<thead>
												<tr>
													<th>#</th>
													<th>Data Agunan</th>
													<th style="width: 200px;">Nilai Pasar</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<table class="table" id="tbl_analisa_agn"></table>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tab-usulan" role="tabpanel" aria-labelledby="usulan-tab">
								<div class="row">
									<div class="col-md-10">
										<table class="table" id="tbl_usulan"></table>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tab-syarat" role="tabpanel" aria-labelledby="syarat-tab">
							</div>

							<div class="tab-pane fade" id="tab-komite" role="tabpanel" aria-labelledby="komite-tab">
								<div class="row">
									<div class="col-md-12">
										<table class="table" id="tbl_komite">
											<thead>
												<tr>
													<th>Tgl. Komite</th>
													<th>Pengusul Pembiayaan</th>
													<th>Pemutus Pembiayaan</th>
													<th>Hasil Komite</th>
													<th>Catatan Komite</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</div>
</div>
