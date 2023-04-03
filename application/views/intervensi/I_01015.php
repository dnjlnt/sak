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
											<b>INTERVENSI <?php echo $int_status; ?> - <?php echo $int_form_name; ?></b>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="window.location.replace('<?php echo base_url();?>intervensi')">
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
                                        <?php echo $intervensicontent; ?>
                                        <div class="form-footer">
                                            <?php echo $buttonSave; ?>
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
            function saveIntervensi(master_diag_record_number, int_record_id) {
                
                if (typeof($('input[name="chckbx_int_observasi"]').html()) != 'undefined') {
                    var selectedIntervensiObservasi = new Array();
                    $('input[name="chckbx_int_observasi"]:checked').each(function() {
                        selectedIntervensiObservasi.push(this.value);
                    });

                    if (selectedIntervensiObservasi.length == "0" || selectedIntervensiObservasi.length == 0) {
                        alert("Pilih minimal 1 observasi");
                        return;
                    }
                } else {
                    var selectedIntervensiObservasi = "";
                }

                if (typeof($('input[name="chckbx_int_terapeutik"]').html()) != 'undefined') {
                    var selectedIntervensiTerapeutik = new Array();
                    $('input[name="chckbx_int_terapeutik"]:checked').each(function() {
                        selectedIntervensiTerapeutik.push(this.value);
                    });

                    if (selectedIntervensiTerapeutik.length == "0" || selectedIntervensiTerapeutik.length == 0) {
                        alert("Pilih minimal 1 terapeutik");
                        return;
                    }
                } else {
                    var selectedIntervensiTerapeutik = "";
                }

                if (typeof($('input[name="chckbx_int_edukasi"]').html()) != 'undefined') {
                    var selectedIntervensiEdukasi = new Array();
                    $('input[name="chckbx_int_edukasi"]:checked').each(function() {
                        selectedIntervensiEdukasi.push(this.value);
                    });

                    if (selectedIntervensiEdukasi.length == "0" || selectedIntervensiEdukasi.length == 0) {
                        alert("Pilih minimal 1 edukasi");
                        return;
                    }
                } else {
                    var selectedIntervensiEdukasi = "";
                }

                if (typeof($('input[name="chckbx_int_kolabolasi"]').html()) != 'undefined') {
                    var selectedIntervensiKolaborasi = new Array();
                    $('input[name="chckbx_int_kolabolasi"]:checked').each(function() {
                        selectedIntervensiKolaborasi.push(this.value);
                    });

                    if (selectedIntervensiKolaborasi.length == "0" || selectedIntervensiKolaborasi.length == 0) {
                        alert("Pilih minimal 1 kolaborasi");
                        return;
                    }
                } else {
                    var selectedIntervensiKolaborasi = "";
                }

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>I_01006/saveintervensi",
                    data: {master_diag_record_number:master_diag_record_number, int_record_id:int_record_id, selectedIntervensiObservasi:selectedIntervensiObservasi, selectedIntervensiTerapeutik:selectedIntervensiTerapeutik, selectedIntervensiEdukasi:selectedIntervensiEdukasi, selectedIntervensiKolaborasi:selectedIntervensiKolaborasi},
                    success: function (data) {
                        alert("Sukses menyimpan data");
                        window.location.replace("<?php echo base_url();?>intervensi");
                    }
                });
            }
        </script>
  	</body>
</html>