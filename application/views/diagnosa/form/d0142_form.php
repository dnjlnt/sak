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
                                                                <label class="form-label">Kebersihan Tangan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kebersihan_tangan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kebersihan Badan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kebersihan_badan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Nafsu Makan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="nafsu_makan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Demam</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="demam">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kemerahan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kemerahan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Nyeri</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="nyeri">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Bengkak</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="bengkak">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Vesikel</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="vesikel">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Cairan Berbau Busuk</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="cairan_berbau_busuk">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Spuntum Berwarna Hijau</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="spuntum">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Drainase Purulen</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="drainase_purulen">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Piuria</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="piuria">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Periode Malaise</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="periode_malaise">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Periode Menggigil</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="periode_menggigil">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Letargi</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="letargi">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Gangguan Kognitif</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="gangguan_kognitif">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kadar Sel Darah Putih</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="sel_darah_putih">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kultur Darah</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kultur_darah">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kultur Urine</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kultur_urine">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kultur Sputum</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kultur_sputum">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kultur Area Luka</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kultur_area_luka">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kultur Feses</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kultur_feses">
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

                var kebersihan_tangan = $("#kebersihan_tangan").val();
                var kebersihan_badan = $("#kebersihan_badan").val();
                var nafsu_makan = $("#nafsu_makan").val();
                var demam = $("#demam").val();
                var kemerahan = $("#kemerahan").val();
                var nyeri = $("#nyeri").val();
                var bengkak = $("#bengkak").val();
                var vesikel = $("#vesikel").val();
                var cairan_berbau_busuk = $("#cairan_berbau_busuk").val();
                var spuntum = $("#spuntum").val();
                var drainase_purulen = $("#drainase_purulen").val();
                var piuria = $("#piuria").val();
                var periode_malaise = $("#periode_malaise").val();
                var periode_menggigil = $("#periode_menggigil").val();
                var letargi = $("#letargi").val();
                var gangguan_kognitif = $("#gangguan_kognitif").val();
                var sel_darah_putih = $("#sel_darah_putih").val();
                var kultur_darah = $("#kultur_darah").val();
                var kultur_urine = $("#kultur_urine").val();
                var kultur_sputum = $("#kultur_sputum").val();
                var kultur_area_luka = $("#kultur_area_luka").val();
                var kultur_feses = $("#kultur_feses").val();
                var master_form_diagnosa = $("#master_form_diagnosa").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>diagnosa/savenewdiagnosa",
                    data: {selectedDiagnosaGejalaMayor:selectedDiagnosaGejalaMayor, selectedDiagnosa:selectedDiagnosa, selectedIntervensiUtama:selectedIntervensiUtama, selectedIntervensiPendukung:selectedIntervensiPendukung, durasi_intervensi:durasi_intervensi, kebersihan_tangan:kebersihan_tangan, kebersihan_badan:kebersihan_badan, nafsu_makan:nafsu_makan, demam:demam, kemerahan:kemerahan, nyeri:nyeri, bengkak:bengkak, vesikel:vesikel, cairan_berbau_busuk:cairan_berbau_busuk, spuntum:spuntum, drainase_purulen:drainase_purulen, piuria:piuria, periode_malaise:periode_malaise, periode_menggigil:periode_menggigil, letargi:letargi, gangguan_kognitif:gangguan_kognitif, sel_darah_putih:sel_darah_putih, kultur_darah:kultur_darah, kultur_urine:kultur_urine, kultur_sputum:kultur_sputum, kultur_area_luka:kultur_area_luka, kultur_feses:kultur_feses, master_form_diagnosa:master_form_diagnosa},
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