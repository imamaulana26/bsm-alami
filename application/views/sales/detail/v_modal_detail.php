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
								<a class="nav-link detail-menu-tab" id="analisa-tab" data-toggle="pill" href="#tab-analisa" role="tab" aria-controls="tab-analisa" aria-selected="false"><i class="fa fa-balance-scale mr-1"></i> Analisa Pembiayaan</a>
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
										<tbody>
											<!-- <tr>
												<td>1</td>
												<td>Perseorangan</td>
												<td>Berri Suandi</td>
												<td class="text-center">60 %</td>
												<td>3175092406910008</td>
												<td>89.057.289.4-009.000</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Perseorangan</td>
												<td>Rani Kusuma Pratiwi</td>
												<td class="text-center">40 %</td>
												<td>3276024610900003</td>
												<td>89.057.289.4-008.000</td>
											</tr> -->
										</tbody>
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
										<tbody>
											<!-- <tr>
												<td>1</td>
												<td>Eko Budhi Suprasetiawan</td>
												<td>Komisaris</td>
												<td>3176062207770005</td>
												<td>89.057.279.4-008.000</td>
												<td>esuprasetiawan@alamisharia.co.id</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Agus Haryanto</td>
												<td>Direktur</td>
												<td>3166060709900005</td>
												<td>88.040.279.4-008.000</td>
												<td>bsuandi07@gmail.com</td>
											</tr> -->
										</tbody>
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
										<tbody>
											<!-- <tr>
												<td>1</td>
												<td>122120212647</td>
												<td>Rp 2.000.000.000,00</td>
												<td>21 Desember 2020</td>
												<td>31 Desember 2020</td>
											</tr> -->
										</tbody>
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
									<!-- <label id="txt_invoice">Invoice 1 ( 122120212647 )</label>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Invoice / Faktur</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_invoice" id="ft_invoice" value="invoice-barang-532x628.png" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-paperclip"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>SPK / PO</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_spk" id="ft_spk" value="SPK.jpg" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-paperclip"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Faktur Pajak</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_faktur_pajak" id="ft_faktur_pajak" value="Fakturpajak.jpg" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-paperclip"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Berita Acara Serah Terima</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_ba_serah_terima" id="ft_ba_serah_terima" value="BAserahterima.jpg" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-paperclip"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-4">
											<label>Tanda Terima Invoice (Invoice Receipt)</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="ft_tanda_terima" id="ft_tanda_terima" value="Tandaterimainvoice.png" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-paperclip"></i></span>
												</div>
											</div>
										</div>
									</div> -->

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
									<!-- <div class="form-row">
										<div class="form-group col-md-4">
											<label>Periode</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="periode" id="periode" value="Desember" readonly>
												<div class="input-group-append" style="cursor: pointer;">
													<span class="input-group-text"><i class="fa fa-calendar"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Pendapatan</label>
											<input type="text" class="form-control" name="pendapatan" id="pendapatan" value="Rp 3.000.000.000,00" readonly>
											<span class="form-text text-muted">Total Penjualan</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Laba Kotor</label>
											<input type="text" class="form-control" name="laba_kotor" id="laba_kotor" value="Rp 2.800.000.000,00" readonly>
											<span class="form-text text-muted">Pendapatan dikurangi Harga Pokok Produksi atau biaya yang langsung berhubungan dengan penjualan</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Laba Operasional</label>
											<input type="text" class="form-control" name="laba_operasional" id="laba_operasional" value="Rp 2.600.000.000,00" readonly>
											<span class="form-text text-muted">Laba kotor dikurangi biaya marketing dan umum. Semua biaya disini adalah biaya operasional yang tidak berkaitan langsung dengan penjualan</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Laba Bersih</label>
											<input type="text" class="form-control" name="laba_bersih" id="laba_bersih" value="Rp 2.500.000.000,00" readonly>
											<span class="form-text text-muted">Laba operasional dikurangi biaya non-operasional, beban bunga dan beban pajak</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Piutang Dagang</label>
											<input type="text" class="form-control" name="piutang_dagang" id="piutang_dagang" value="Rp 100.000.000,00" readonly>
											<span class="form-text text-muted">Tagihan yang belum dibayarkan oleh pembeli</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Total Asset</label>
											<input type="text" class="form-control" name="total_asset" id="total_asset" value="Rp 10.000.000.000,00" readonly>
											<span class="form-text text-muted">Total asset perusahaan yang melingkupi kas, asset tetap, piutang, dan lainnya</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Total Hutang</label>
											<input type="text" class="form-control" name="total_hutang" id="total_hutang" value="Rp 500.000.000,00" readonly>
											<span class="form-text text-muted">Total hutang berbunga terhadap institusi keuangan seperti bank, leasing dan hutang terhadap pemegang saham</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Ekuitas</label>
											<input type="text" class="form-control" name="ekuitas" id="ekuitas" value="Rp 2.000.000.000,00" readonly>
											<span class="form-text text-muted">Modal dari perusahaan, suntikan dana dari pemegang saham dan akumulasi dari laba ditahan</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Aktiva Lancar</label>
											<input type="text" class="form-control" name="aktiva_lancar" id="aktiva_lancar" value="Rp 1.000.000.000,00" readonly>
											<span class="form-text text-muted">Aktiva Lancar</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Hutang Lancar</label>
											<input type="text" class="form-control" name="hutang_lancar" id="hutang_lancar" value="Rp 100.000.000,00" readonly>
											<span class="form-text text-muted">Hutang Lancar</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Margin Laba Bersih</label>
											<input type="text" class="form-control" name="margin_laba" id="margin_laba" value="83,33 %" readonly>
											<span class="form-text text-muted">Laba Bersih terhadap Pendapatan</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Rasio Hutang terhadap Modal</label>
											<input type="text" class="form-control" name="ratio_hutang" id="ratio_hutang" value="0,25" readonly>
											<span class="form-text text-muted">Total Hutang terhadap Modal</span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>Current Ratio</label>
											<input type="text" class="form-control" name="current_ratio" id="current_ratio" value="10" readonly>
											<span class="form-text text-muted">Activa Lancar terhadap Hutang Lancar</span>
										</div>
									</div> -->

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
								<form id="fm_analisa" method="post" action="<?= site_url('sales/finance_all/simpan_rac') ?>">
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
									<button type="submit" class="btn btn-primary float-right">Simpan</button>
								</form>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Understood</button>
			</div> -->
		</div>
	</div>
</div>
