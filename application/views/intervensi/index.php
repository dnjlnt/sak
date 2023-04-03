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
											<b>INTERVENSI LIST</b>
                                            <button class="btn btn-sm btn-secondary btn-square" style="float:right;" onclick="history.back()">
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
                                    <div class="card-body">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px;">No.</th>
                                                    <th>Intervensi</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:11px;">
                                                <?php echo $rowintervensi; ?>
                                            </tbody>
                                        </table>
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
                var selectedDiagnosa = new Array();
                $('input[name="diagnosa_record"]:checked').each(function() {
                    selectedDiagnosa.push(this.value);
                });

                var durasi_intervensi = $("#durasi_intervensi").val();
                if (durasi_intervensi == 0 || durasi_intervensi == "") {
                    alert("Pilih Lamanya Intervensi");
                    return;
                }

                var batuk = $("#batuk").val();
                var sputum = $("#sputum").val();
                var mengi = $("#mengi").val();
                var wheezing = $("#wheezing").val();
                var ronkhi = $("#ronkhi").val();
                var mekonium = $("#mekonium").val();
                var dispnea = $("#dispnea").val();
                var ortopnea = $("#ortopnea").val();
                var sulit_bicara = $("#sulit_bicara").val();
                var sianosis = $("#sianosis").val();
                var gelisah = $("#gelisah").val();
                var frekuensi_nafas = $("#frekuensi_nafas").val();
                var pola_nafas = $("#pola_nafas").val();
                var master_form_diagnosa = $("#master_form_diagnosa").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>diagnosa/savenewdiagnosa",
                    data: {selectedDiagnosa:selectedDiagnosa, durasi_intervensi:durasi_intervensi, batuk:batuk, sputum:sputum, mengi:mengi, wheezing:wheezing, ronkhi:ronkhi, mekonium:mekonium, dispnea:dispnea, ortopnea:ortopnea, sulit_bicara:sulit_bicara, sianosis:sianosis, gelisah:gelisah, frekuensi_nafas:frekuensi_nafas, pola_nafas:pola_nafas, master_form_diagnosa:master_form_diagnosa},
                    success: function (data) {
                        console.log(data);
                        window.location.replace("<?php echo base_url();?>intervensi");
                    }
                });

            }
        </script>
  	</body>
</html>