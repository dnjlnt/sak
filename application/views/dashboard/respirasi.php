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
											<b>DIAGNOSA - RESPIRASI</b>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="history.back()">
                                                Back
                                            </button>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/d0001" id="text-1">Bersihan Jalan Nafas Tidak Efektif</a>
                                            <button class="btn btn-primary btn-sm btn-square" style="float:right;font-size:10px;" onclick="copyToClipboard('#text-1')">
	                                            Copy
                                            </button>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/d0002" id="text-2">Gangguan Penyapihan Ventilator</a>
                                            <button class="btn btn-primary btn-sm btn-square" style="float:right;font-size:10px;" onclick="copyToClipboard('#text-2')">
	                                            Copy
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan" id="text-3">Gangguan Pertukaran Gas</a>
                                            <button class="btn btn-primary btn-sm btn-square" style="float:right;font-size:10px;" onclick="copyToClipboard('#text-3')">
	                                            Copy
                                            </button>
                                        </td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi" id="text-4">Gangguan Ventilasi Spontan</a>
                                            <button class="btn btn-primary btn-sm btn-square" style="float:right;font-size:10px;" onclick="copyToClipboard('#text-4')">
	                                            Copy
                                            </button>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi" id="text-5">Pola Napas Tidak Efektif</a>
                                            <button class="btn btn-primary btn-sm btn-square" style="float:right;font-size:10px;" onclick="copyToClipboard('#text-5')">
	                                            Copy
                                            </button>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi" id="text-6">Risiko Aspirasi</a>
                                            <button class="btn btn-primary btn-sm btn-square" style="float:right;font-size:10px;" onclick="copyToClipboard('#text-6')">
	                                            Copy
                                            </button>
										</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
      		</div>
   		</div>
		<?php $this->load->view("includes/allscripts.php");?>
        <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
            function copyToClipboard(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();
            }

            function seeBarcodePatient(rm_doc_id) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>searchemr/getBarcodePatient",
                    data: {rm_doc_id:rm_doc_id},
                    success: function (data) {
                        var left = (screen.width - 500) / 2;
                        var top = (screen.height - 500) / 4;
                        window.open('http://www.google.com', '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
                    }
                });
            }
        </script>
  	</body>
</html>