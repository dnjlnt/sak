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
									<tr>
                                        <td style="font-size:13px;" class="bg-dark-lt">
                                            <b>DIAGNOSA - SUB KATEGORI NUTRISI CAIRAN</b>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="history.back()">
                                                Back
                                            </button>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/respirasi">D. 0018. Berat Badan Berlebih</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/sirkulasi">D. 0019. Defisit Nutrisi</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan">D. 0020. Diare</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0021. Disfungsi Motilitas Gastrointestinal</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0022. Hipervolemia</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0023. Hipovolemia</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0024. Ikterik Neonatus</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0027. Ketidakstabilan Kadar Glukosa Darah</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0028. Menyusui Efektif</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0029. Menyusui Tidak  Efektif</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">D. 0030. Obesitas</a>
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