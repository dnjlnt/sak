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
                                                                <label class="form-label">Perilaku Sesuai Anjuran</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="perilaku_sesuai_anjuran">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Verbalisasi Minat Catatan Belajar</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="minat_catatan_belajar">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kemampuan Menjelaskan Pengetahuan Tentang Suatu Topik</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="menjelaskan_pengetahuan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kemampuan Menggambarkan Pengalaman Sebelumnya yang Sesuai Dengan Topik</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="menggambarkan_pengalaman">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Perilaku Sesuai Dengan Pengetahuan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="perilaku_sesuai_pengetahuan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Pertanyaan Tentang Masalah yang Dihadapi</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="pertanyaan_masalah">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Persepsi yang Keliru Terhadap Masalah</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="persepi_keliru">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Menjalani Pemeriksaan yang Kurang Tepat</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="pemeriksaan_kurang_tepat">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
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

                var perilaku_sesuai_anjuran = $("#perilaku_sesuai_anjuran").val();
                var minat_catatan_belajar = $("#minat_catatan_belajar").val();
                var menjelaskan_pengetahuan = $("#menjelaskan_pengetahuan").val();
                var menggambarkan_pengalaman = $("#menggambarkan_pengalaman").val();
                var perilaku_sesuai_pengetahuan = $("#perilaku_sesuai_pengetahuan").val();
                var pertanyaan_masalah = $("#pertanyaan_masalah").val();
                var persepi_keliru = $("#persepi_keliru").val();
                var pemeriksaan_kurang_tepat = $("#pemeriksaan_kurang_tepat").val();
                var perilaku = $("#perilaku").val();
                var master_form_diagnosa = $("#master_form_diagnosa").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>diagnosa/savenewdiagnosa",
                    data: {selectedDiagnosaGejalaMayor:selectedDiagnosaGejalaMayor, selectedDiagnosa:selectedDiagnosa, selectedIntervensiUtama:selectedIntervensiUtama, selectedIntervensiPendukung:selectedIntervensiPendukung, durasi_intervensi:durasi_intervensi, perilaku_sesuai_anjuran:perilaku_sesuai_anjuran, minat_catatan_belajar:minat_catatan_belajar, menjelaskan_pengetahuan:menjelaskan_pengetahuan, menggambarkan_pengalaman:menggambarkan_pengalaman, perilaku_sesuai_pengetahuan:perilaku_sesuai_pengetahuan, pertanyaan_masalah:pertanyaan_masalah, persepi_keliru:persepi_keliru, pemeriksaan_kurang_tepat:pemeriksaan_kurang_tepat, perilaku:perilaku, master_form_diagnosa:master_form_diagnosa},
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