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
                                                                <label class="form-label">Asupan Cairan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="asupan_cairan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Haluaran Urine</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="haluaran_urin">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Kelembaban Membran Mukosa</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="kelembaban_membran">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Asupan Makanan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="asupan_makanan">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Menurun</option>
                                                                        <option value="2">2. Cukup Menurun</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Meningkat</option>
                                                                        <option value="5">5. Meningkat</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Edema</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="edema">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Dehidrasi</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="dehidrasi">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Asites</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="asites">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Konfusi</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="konfusi">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Meningkat</option>
                                                                        <option value="2">2. Cukup Meningkat</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Menurun</option>
                                                                        <option value="5">5. Menurun</option>
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
                                                                <label class="form-label">Denyut Nadi Radial</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="denyut_nadi_radial">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Tekanan Arteri Rata-Rata</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="tekanan_arteri">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Membran Mukosa</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="membran_mukosa">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Mata Cekung</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="mata_cekung">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Turgor Kulit</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="turgor_kulit">
                                                                        <option value="0">Tidak Ada</option>
                                                                        <option value="1">1. Memburuk</option>
                                                                        <option value="2">2. Cukup Memburuk</option>
                                                                        <option value="3">3. Sedang</option>
                                                                        <option value="4">4. Cukup Membaik</option>
                                                                        <option value="5">5. Membaik</option>
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                <label class="form-label">Berat Badan</label>
                                                                <div id="select-luaran-intervensi-batuk">
                                                                    <select class="form-control" id="berat_badan">
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

                var asupan_cairan = $("#asupan_cairan").val();
                var haluaran_urin = $("#haluaran_urin").val();
                var kelembaban_membran = $("#kelembaban_membran").val();
                var asupan_makanan = $("#asupan_makanan").val();
                var edema = $("#edema").val();
                var dehidrasi = $("#dehidrasi").val();
                var asites = $("#asites").val();
                var konfusi = $("#konfusi").val();
                var tekanan_darah = $("#tekanan_darah").val();
                var denyut_nadi_radial = $("#denyut_nadi_radial").val();
                var tekanan_arteri = $("#tekanan_arteri").val();
                var membran_mukosa = $("#membran_mukosa").val();
                var mata_cekung = $("#mata_cekung").val();
                var turgor_kulit = $("#turgor_kulit").val();
                var berat_badan = $("#berat_badan").val();
                var master_form_diagnosa = $("#master_form_diagnosa").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>diagnosa/savenewdiagnosa",
                    data: {selectedDiagnosaGejalaMayor:selectedDiagnosaGejalaMayor, selectedDiagnosa:selectedDiagnosa, 
                           selectedIntervensiUtama:selectedIntervensiUtama, selectedIntervensiPendukung:selectedIntervensiPendukung, 
                           durasi_intervensi:durasi_intervensi, asupan_cairan:asupan_cairan, haluaran_urin:haluaran_urin, 
                           kelembaban_membran:kelembaban_membran, asupan_makanan:asupan_makanan, edema:edema, dehidrasi:dehidrasi, asites:asites, 
                           konfusi:konfusi, tekanan_darah:tekanan_darah, denyut_nadi_radial:denyut_nadi_radial, tekanan_arteri:tekanan_arteri, 
                           membran_mukosa:membran_mukosa, mata_cekung:mata_cekung, turgor_kulit:turgor_kulit, berat_badan:berat_badan, 
                           master_form_diagnosa:master_form_diagnosa},
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