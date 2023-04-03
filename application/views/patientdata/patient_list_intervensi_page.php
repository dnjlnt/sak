<!doctype html>
<html lang="en">
	<?php $this->load->view("includes/common.php");?>
	<body >
		<div class="">
			<div class="page-wrapper">
                <div class="container-xl" style="max-width:1350px;">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <tr class="text-white bg-muted">
                                        <td colspan="5"><b>Patient Information</b></td>
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
											<b>LIST DATA PATIENT</b>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="history.back();">
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
                                                    <th style="width:50px;">NO.</th>
                                                    <th>INTERVENSI KEPERAWATAN</th>
                                                    <th>JENIS INTERVENSI</th>
                                                    <th>DIBUAT OLEH</th>
                                                    <th>DIBUAT TANGGAL</th>
                                                    <th style="width:300px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:11px;">
                                                <?php echo $listintervensi; ?>
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
            function diagnosaPreview(master_diag_record_id, master_form_diagnosa) {
                var left = (screen.width - 500) / 2;
                var top = (screen.height - 500) / 4;
                window.open('<?php echo base_url();?>patient/previewdiagnosa/'+master_diag_record_id+'/'+master_form_diagnosa, '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
            }
        </script>
  	</body>
</html>