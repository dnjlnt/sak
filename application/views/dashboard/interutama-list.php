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
											<b>INTERVENSI UTAMA</b>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/respirasi">Dukungan Ventilasi</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/sirkulasi">Latihan Batuk efektif</a>
										</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nutrisicairan">Manajemen jalan Napas</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/eliminasi">Pemantauan Respirasi</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/aktivitasistirahat">Pemberian Obat Inhalasi</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/neurosensori">Pencegahan Aspirasi</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/reproduksiseksualitas">Pengaturan Posisi</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/nyerikenyamanan">Pengontrolan Infeksi</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/integritasego">Integritas Ego</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/pertumbuhanperkembangan">Pertumbuhan dan Perkembangan</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/kebersihandiri">Kebersihan Diri</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/penyuluhanpembelajaran">Penyuluhan dan Pembelajaran</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/interaksisosial">Interaksi Sosial</a>
										</td>
                                    </tr>
									<tr>
                                        <td style="font-size:12px;">
											<a href="<?php echo base_url();?>dashboard/keamananproteksi">Keamanan dan Proteksi</a>
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