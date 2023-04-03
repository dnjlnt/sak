<!doctype html>
<html lang="en">
	<?php $this->load->view("includes/common.php");?>
	<body >
		<div class="wrapper">
			<div class="page-wrapper">
                <div class="container-xl">
                    <div class="page-header d-print-none">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <tr class="text-white bg-muted">
                                        <td colspan="4"><b>Patient Information</b></td>
                                        <td>
                                            <a class="btn btn-sm btn-square btn-light" href="<?php echo base_url();?>dashboard/patientdata" style="float:right;">
                                                Patient Data
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;width:130px;" rowspan="5">
                                            <img src="<?php echo base_url();?>assets/dist/img/avatar.png">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;width:150px;" class="bg-dark-lt">Medical Record No</td>
                                        <td style="font-size:12px;width:40px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b>00000002<b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;" class="bg-dark-lt">Patient Name</td>
                                        <td style="font-size:12px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b>Denny Julianto<b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;" class="bg-dark-lt">Patient Date of Birth</td>
                                        <td style="font-size:12px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b>24 Juli 1994<b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;" class="bg-dark-lt">Patient Unit</td>
                                        <td style="font-size:12px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b>Ciputra Hospital Citra Garden City<b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
									<tr>
                                        <td style="font-size:13px;" class="bg-dark-lt">
											<b>DIAGNOSA - RESPIRASI - BERSIHAN JALAN NAFAS TIDAK EFEKTIF</b>
                                            <button class="btn btn-sm btn-primary" style="margin-left:740px;" onclick="history.back()">
                                                Save
                                            </button>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="history.back()">
                                                Back
                                            </button>
										</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row row-cards">
                            <div class="col-md-12">
                                <div class="card">
                                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-diagnosis-7" class="nav-link active" data-bs-toggle="tab">Diagnosis Keperawatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-luaran-7" class="nav-link" data-bs-toggle="tab">Luaran Keperawatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-intervensi-7" class="nav-link" data-bs-toggle="tab">Intervensi Keperawatan</a>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-diagnosis-7">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" id="label-1">
                                                                        <b>Bersihkan jalan napas tidak efektif berhubungan dengan;</b>
                                                                    </label>
                                                                    <div >
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Spasme jalan napas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Hipersekresi jalan napas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Disfungsi neuromusukular</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Benda asing dalam jalan napas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Adanya jalan napas buatan</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Sekresi yang tertahan</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Hiperplasia dinding jalan napas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Prose infeksi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Respon alergi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Efek agen farmakologis (misal: anastesi)</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>
                                                                        Dibuktikan dengan;
                                                                    </label>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">
                                                                        <b>Gejala dan Tanda Mayor;</b>
                                                                    </label>
                                                                    <label>Subjektif; (tidak tersedia)</label>
                                                                    <br>
                                                                    <label>Objektif;</label>
                                                                    <br><br>
                                                                    <div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Batuk tidak efektif/tidak mampu batuk</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Sputum berlebih/obstruksi di jalan napas/mekonium di jalan napas (pada neonatus)</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Mengi/wheezing dan atau ronkhi</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">
                                                                        <b>Gejala dan Tanda Minor;</b>
                                                                    </label>
                                                                    <label>Subjektif;</label>
                                                                    <br><br>
                                                                    <div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Dispnea</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Sulit bicara</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Ortopnea</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Frekuensi napas berubah</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pola napas berubah</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Kesadaran menurun</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">
                                                                        <b>Kondisi Klinis Terkait;</b>
                                                                    </label>
                                                                    <div>
                                                                        <label>1. Gullian Barre Syndrome</label><br>
                                                                        <label>2. Sklerosis Multiple</label><br>
                                                                        <label>3. Myasthenia Gravis</label><br>
                                                                        <label>4. Prosedur Diagnostik (mis : Bronkhodkopi, Transesophageal Echocardiography/TEE)</label><br>
                                                                        <label>5. Depresi sistem saraf pusat</label><br>
                                                                        <label>6. Cedera kepala</label><br>
                                                                        <label>7. Stroke</label><br>
                                                                        <label>8. Kuadriplegia</label><br>
                                                                        <label>9. Sindrom aspirasi mekonium</label><br>
                                                                        <label>10. Infeksi saluran napas</label><br>
                                                                        <label>11. Asma</label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-luaran-7">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">
                                                                        <b>Lamanya intervensi</b>
                                                                    </label>
                                                                    <select class="form-control">
                                                                        <option>Pilih Durasi</option>
                                                                        <option>1 X 3 Jam</option>
                                                                        <option>1 X 6 Jam</option>
                                                                        <option>1 X 12 Jam</option>
                                                                        <option>1 X 24 Jam</option>
                                                                        <option>2 X 24 Jam</option>
                                                                        <option>3 X 24 Jam</option>
                                                                        <option>4 X 24 Jam</option>
                                                                        <option>5 X 24 Jam</option>
                                                                        <option>6 X 24 Jam</option>
                                                                        <option>7 X 24 Jam</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Batuk efektif/mampu batuk</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Produksi Sputum</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Mengi</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Wheezing</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Ronkhi</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Mekonium pada neonatus</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Dispnea</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Ortopnea</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Sulit bicara</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Sianosis</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Gelisah</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Frekuensi napas</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                        <br>
                                                                    </div>
                                                                    <label class="form-label">Pola napas</label>
                                                                    <div id="select-luaran-intervensi-batuk">
                                                                        <select class="form-control">
                                                                            <option>Pilih Tingkatan</option>
                                                                            <option>1. Menurun</option>
                                                                            <option>2. Cukup Menurun</option>
                                                                            <option>3. Sedang</option>
                                                                            <option>4. Cukup Meningkat</option>
                                                                            <option>5. Meningkat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-intervensi-7">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label text-danger">
                                                                        <b>1. Intervensi Utama</b>
                                                                    </label>
                                                                    <div >
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="chxbx_latihan_batuk_efektif">
                                                                            <span class="form-check-label">Latihan batuk efektif</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="chxbx_manajemen_jalan_nafas">
                                                                            <span class="form-check-label">Manajemen jalan nafas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="chxbx_pemantauan_respirasi">
                                                                            <span class="form-check-label">Pemantauan respirasi</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label text-danger">
                                                                        <b>2. Intervensi Pendukung</b>
                                                                    </label>
                                                                    <div >
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" id="chxbx" type="checkbox">
                                                                            <span class="form-check-label">Dukungan kepatuhan program pengobatan</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Edukasi fisioterapi dada</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Edukasi pengukuran respirasi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Fisioterapi dada</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Konsultasi via telepon</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen asma</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen alergi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen anafilaksis</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen isolasi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen ventilasi mekanik</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen jalan napas buatan</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pemberian obat inhalasi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pemberian obat interpleura</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pemberian obat intradermal</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pemberian obat nasal</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pencegahan aspirasi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pengaturan posisi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Penghisapan jalan napas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Penyapihan ventilasi mekanik</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Perawatan trakheostomi</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Skrining tuberkulosis</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Stabilisasi jalan nafas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Terapi oksigen</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      		</div>
   		</div>
		<?php $this->load->view("includes/allscripts.php");?>
        <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
            // chxbx = document.getElementById('chxbx').addEventListener('click', event => {
            //     if(event.target.checked) {
            //         var left = (screen.width - 500) / 2;
            //         var top = (screen.height - 500) / 4;
            //         window.open('<?php echo base_url();?>', '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
            //     } else {

            //     }
            // });

            // chxbx_latihan_batuk_efektif = document.getElementById('chxbx_latihan_batuk_efektif').addEventListener('click', event => {
            //     if(event.target.checked) {
            //         window.location.replace("<?php echo base_url();?>dashboard/getform_intlatihanbatukefektif");
            //     } else {

            //     }
            // });

            // chxbx_manajemen_jalan_nafas = document.getElementById('chxbx_manajemen_jalan_nafas').addEventListener('click', event => {
            //     if(event.target.checked) {
            //         window.location.replace("<?php echo base_url();?>dashboard/getform_intmanjalannafas");
            //     } else {

            //     }
            // });

            // chxbx_pemantauan_respirasi = document.getElementById('chxbx_pemantauan_respirasi').addEventListener('click', event => {
            //     if(event.target.checked) {
            //         window.location.replace("<?php echo base_url();?>dashboard/getform_intpemantauanrespirasi");
            //     } else {

            //     }
            // });
            
        </script>
  	</body>
</html>