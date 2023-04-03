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
                                                    <th style="width:50px;">No.</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:11px;">
                                                <tr>
                                                    <td style="width:50px;">1.</th>
                                                    <td>
                                                        <a href="<?php echo base_url();?>dashboard/patientdatabasedondate">23 Juni 2022</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td style="width:50px;">2.</th>
                                                    <td>
                                                        <a href="<?php echo base_url();?>dashboard/patientdatabasedondate">22 Juni 2022</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td style="width:50px;">3.</th>
                                                    <td>
                                                        <a href="<?php echo base_url();?>dashboard/patientdatabasedondate">21 Juni 2022</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td style="width:50px;">4.</th>
                                                    <td>
                                                        <a href="<?php echo base_url();?>dashboard/patientdatabasedondate">20 Juni 2022</a>
                                                    </th>
                                                </tr>
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
  	</body>
</html>