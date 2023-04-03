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
                                            <a class="btn btn-sm btn-square btn-light" href="<?php echo base_url();?>patient/patientinfo/<?php echo $no_rm; ?>" style="float:right;">
                                                Patient Data
                                            </a>
                                            <input type="hidden" value="<?php echo $this->uri->segment(1);?>" id="master_form_diagnosa">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;width:150px;" class="bg-dark-lt">Medical Record No</td>
                                        <td style="font-size:12px;width:40px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b><?php echo $patient_mr; ?><b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;" class="bg-dark-lt">Patient Name</td>
                                        <td style="font-size:12px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b><?php echo $patient_fullname; ?><b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;" class="bg-dark-lt">Patient Date of Birth</td>
                                        <td style="font-size:12px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b><?php echo $patient_dob; ?><b></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;" class="bg-dark-lt">Patient Unit</td>
                                        <td style="font-size:12px;" class="bg-dark-lt">:</td>
                                        <td style="font-size:12px;"><b><?php echo $unit_display; ?><b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
									<tr>
                                        <td style="font-size:13px;" class="bg-dark-lt">
											<b>DIAGNOSA -> SIRKULASI -> RISIKO PERFUSI SEREBRAL TIDAK EFEKTIF</b>
                                            <button class="btn btn-sm btn-primary btn-square" style="margin-left:535px;" onclick="saveDiagnosa()">
                                                Save
                                            </button>
                                            <button class="btn btn-sm btn-secondary btn-square" style="float:right;" onclick="history.back()">
                                                Back
                                            </button>
										</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row row-cards" style="font-size:12px;">
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
                                                            <?php echo $dataDiagnosaKeperawatan; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-luaran-7">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">
                                                                    <b>Setelah dilakukan intervensi keperawatan selama</b>
                                                                </label>
                                                                <?php echo $intdurasi; ?>
                                                                <input type="hidden" id="total_gejala_mayor" value="<?php echo $totalGejalaMayor;?>">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">Kemampuan Menuntaskan Aktivitas</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="menuntaskan_aktivitas">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Keluhan Nyeri</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="keluhan_nyeri">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Meringis</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="meringis">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Sikap Protektif</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="sikap_protektif">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Gelisah</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="gelisah">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kesulitan Tidur</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kesulitan_tidur">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Menarik Diri</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="menarik_diri">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Berfokus Pada Diri Sendiri</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="fokus_diri_sendiri">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Diaforesis</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="diaforesis">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Perasaan Depresi (Tertekan)</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="depresi">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Perasaan Takut Mengalami Cedera Berulang</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="cedera_berulang">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Anoreksia</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="anoreksia">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Perineum Terasa Tertekan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="perineum_tertekan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Uterus Teraba Membulat</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="uterus_membulat">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Ketegangan Otot</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="ketegangan_otot">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Pupil Dilatasi</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="pupil_dilatasi">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Muntah</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="muntah">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Mual</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="mual">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Frekuensi Nadi</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="frekuensi_nadi">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Pola Nafas</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="pola_nafas">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Tekanan Darah</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="tekanan_darah">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Proses Berfikir</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="proses_berfikir">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Fokus</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="fokus">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Fungsi Berkemih</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="fungsi_berkemih">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Perilaku</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="perilaku">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Nafsu Makan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="nafsu_makan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Pola Tidur</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="pola_tidur">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-intervensi-7">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label text-danger">
                                                                    <b>1. Intervensi Utama</b>
                                                                </label>
                                                                <div >
                                                                    <?php echo $intutama; ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label text-danger">
                                                                    <b>2. Intervensi Pendukung</b>
                                                                </label>
                                                                <div >
                                                                    <?php echo $intpendukung; ?>
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
      		</div>
   		</div>
		<?php $this->load->view("includes/allscripts.php");?>
        <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
            function saveDiagnosa() {
                var total_gejala_mayor = $("#total_gejala_mayor").val();
                
                var selectedDiagnosaGejalaMayor = new Array();
                $('input[name="diagnosa_record_gejala_mayor"]:checked').each(function() {
                    selectedDiagnosaGejalaMayor.push(this.value);
                });

                var min_total_gejala_mayor = (selectedDiagnosaGejalaMayor.length/total_gejala_mayor)*100;

                if (min_total_gejala_mayor < 80) {
                    alert("Gejala dan Tanda Mayor minimal 80% yang harus diisi");
                    return;
                }

                var selectedDiagnosa = new Array();
                $('input[name="diagnosa_record"]:checked').each(function() {
                    selectedDiagnosa.push(this.value);
                });

                var selectedIntervensiUtama = new Array();
                $('input[name="intervensi_keperawatan_utama"]:checked').each(function() {
                    selectedIntervensiUtama.push(this.value);
                });

                if (selectedIntervensiUtama.length == "" || selectedIntervensiUtama.length == "0" || selectedIntervensiUtama.length == 0) {
                    alert("Pilih minimal 1 intervensi utama");
                    return;
                }

                var selectedIntervensiPendukung = new Array();
                $('input[name="intervensi_keperawatan_pendukung"]:checked').each(function() {
                    selectedIntervensiPendukung.push(this.value);
                });

                if (selectedIntervensiPendukung.length == "" || selectedIntervensiPendukung.length == "0" || selectedIntervensiPendukung.length == 0) {
                    alert("Pilih minimal 1 intervensi pendukung");
                    return;
                }
                
                var durasi_intervensi = $("#durasi_intervensi").val();
                if (durasi_intervensi == 0 || durasi_intervensi == "") {
                    alert("Pilih durasi pada tab luaran keperawatan terlebih dahulu");
                    return;
                }

                var menuntaskan_aktivitas = $("#menuntaskan_aktivitas").val();
                var keluhan_nyeri = $("#keluhan_nyeri").val();
                var meringis = $("#meringis").val();
                var sikap_protektif = $("#sikap_protektif").val();
                var gelisah = $("#gelisah").val();
                var kesulitan_tidur = $("#kesulitan_tidur").val();
                var menarik_diri = $("#menarik_diri").val();
                var fokus_diri_sendiri = $("#fokus_diri_sendiri").val();
                var diaforesis = $("#diaforesis").val();
                var depresi = $("#depresi").val();
                var cedera_berulang = $("#cedera_berulang").val();
                var anoreksia = $("#anoreksia").val();
                var perineum_tertekan = $("#perineum_tertekan").val();
                var uterus_membulat = $("#uterus_membulat").val();
                var ketegangan_otot = $("#ketegangan_otot").val();
                var pupil_dilatasi = $("#pupil_dilatasi").val();
                var muntah = $("#muntah").val();
                var mual = $("#mual").val();
                var frekuensi_nadi = $("#frekuensi_nadi").val();
                var pola_nafas = $("#pola_nafas").val();
                var tekanan_darah = $("#tekanan_darah").val();
                var proses_berfikir = $("#proses_berfikir").val();
                var fokus = $("#fokus").val();
                var fungsi_berkemih = $("#fungsi_berkemih").val();
                var perilaku = $("#perilaku").val();
                var nafsu_makan = $("#nafsu_makan").val();
                var pola_tidur = $("#pola_tidur").val();
                var master_form_diagnosa = $("#master_form_diagnosa").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>diagnosa/savenewdiagnosa",
                    data: {selectedDiagnosaGejalaMayor:selectedDiagnosaGejalaMayor, selectedDiagnosa:selectedDiagnosa, selectedIntervensiUtama:selectedIntervensiUtama, selectedIntervensiPendukung:selectedIntervensiPendukung, durasi_intervensi:durasi_intervensi, menuntaskan_aktivitas:menuntaskan_aktivitas, keluhan_nyeri:keluhan_nyeri, meringis:meringis, sikap_protektif:sikap_protektif, gelisah:gelisah, kesulitan_tidur:kesulitan_tidur, menarik_diri:menarik_diri, fokus_diri_sendiri:fokus_diri_sendiri, diaforesis:diaforesis, depresi:depresi, cedera_berulang:cedera_berulang, anoreksia:anoreksia, perineum_tertekan:perineum_tertekan, uterus_membulat:uterus_membulat, ketegangan_otot:ketegangan_otot, pupil_dilatasi:pupil_dilatasi, muntah:muntah, mual:mual, frekuensi_nadi:frekuensi_nadi, pola_nafas:pola_nafas, tekanan_darah:tekanan_darah, proses_berfikir:proses_berfikir, fokus:fokus, fungsi_berkemih:fungsi_berkemih, perilaku:perilaku, nafsu_makan:nafsu_makan, pola_tidur:pola_tidur, master_form_diagnosa:master_form_diagnosa},
                    success: function (data) {
                        console.log(data);
                        alert("Berhasil menyimpan data, silahkan input intervensi");
                        window.location.replace("<?php echo base_url();?>intervensi");
                    }
                });

            }
        </script>
  	</body>
</html>