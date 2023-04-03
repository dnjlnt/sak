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
											<b>DIAGNOSA - SUB KATEGORI REPRODUKSI DAN SEKSUALITAS</b>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="history.back()">
                                                Back
                                            </button>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/respirasi">D. 0032. Risiko Defisit Nutrisi</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/sirkulasi">D. 0036. Risiko Keseimbangan Cairan</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan">D. 0039. Resiko Gangguan Integritas Kulit</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan">D. 0069. Disfungsi Seksual</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan">D. 0070. Kesiapan Persalinan</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan">D. 0071. Pola Seksual Tidak efektif</a>
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