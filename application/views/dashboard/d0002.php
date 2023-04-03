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
                                        <td colspan="5"><b>Patient Information</b></td>
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
											<b>DIAGNOSA - RESPIRASI - GANGGUAN PENYAPIHAN VENTILATOR</b>
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
                                                                            <span class="form-check-label">Option 3</span>
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
                                                                <div class="form-footer">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <div >
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" id="luaran_intervensi_batuk" type="checkbox">
                                                                            <span class="form-check-label">Batuk efektif/mampu batuk</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk" style="display:none;">
                                                                            <select class="form-control">
                                                                                <option>Menurun</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Meningkat</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Produksi Sputum</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Mengi</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Wheezing</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Ronkhi</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Mekonium pada neonatus</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Dispnea</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Ortopnea</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Sulit bicara</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Sianosis</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Gelisah</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Meningkat</option>
                                                                                <option>Cukup Meningkat</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Menurun</option>
                                                                                <option>Menurun</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Frekuensi napas</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Memburuk</option>
                                                                                <option>Cukup Memburuk</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Membaik</option>
                                                                                <option>Membaik</option>
                                                                            </select>
                                                                            <br>
                                                                        </div>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pola napas</span>
                                                                        </label>
                                                                        <div id="select-luaran-intervensi-batuk">
                                                                            <select class="form-control">
                                                                                <option>Memburuk</option>
                                                                                <option>Cukup Memburuk</option>
                                                                                <option>Sedang</option>
                                                                                <option>Cukup Membaik</option>
                                                                                <option>Membaik</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-footer">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                                                                    <label class="form-label">
                                                                        <b>1. Intervensi Utama</b>
                                                                    </label>
                                                                    <div >
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Latihan batuk efektif</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Manajemen jalan nafas</span>
                                                                        </label>
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <span class="form-check-label">Pemantauan respirasi</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">
                                                                        <b>2. Intervensi Pendukung</b>
                                                                    </label>
                                                                    <div >
                                                                        <label class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
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
                                                                <div class="form-footer">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
            checkBox_luaran_intervensi_batuk = document.getElementById('luaran_intervensi_batuk').addEventListener('click', event => {
                if(event.target.checked) {
                    $("#select-luaran-intervensi-batuk").show();
                } else {
                    $("#select-luaran-intervensi-batuk").hide();
                }
            });
            // function seeBarcodePatient(rm_doc_id) {
            //     $.ajax({
            //         type: "post",
            //         url: "<?php echo base_url();?>searchemr/getBarcodePatient",
            //         data: {rm_doc_id:rm_doc_id},
            //         success: function (data) {
            //             var left = (screen.width - 500) / 2;
            //             var top = (screen.height - 500) / 4;
            //             window.open('http://www.google.com', '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
            //         }
            //     });
            // }

            
        </script>
  	</body>
</html>