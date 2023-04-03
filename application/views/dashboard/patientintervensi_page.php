<!doctype html>
<html lang="en">
	<?php $this->load->view("includes/common.php");?>
    <style>
        .btn-diag-mini {
            font-size:10px;
        }
    </style>
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
											<b>LIST DATA PATIENT 23 JUNI 2022 - DIAGNOSA A</b>
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
                                                    <th style="width:500px;">Intervensi Keperawatan</th>
                                                    <th>Jenis Intervensi</th>
                                                    <th>Dibuat Oleh</th>
                                                    <th>Dibuat Tanggal</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:11px;">
                                                <tr>
                                                    <td style="width:50px;">1.</th>
                                                    <td>Intervensi A</th>
                                                    <td>Intervensi Utama</td>
                                                    <td>Denny Julianto</td>
                                                    <td>23 Juni 2022 14:00</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Edit Intervensi
                                                        </a>
                                                        <button onclick="previewIntervensi()" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Lihat Form Intervensi
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:50px;">2.</th>
                                                    <td>Intervensi B</th>
                                                    <td>Intervensi Utama</td>
                                                    <td>Denny Julianto</td>
                                                    <td>23 Juni 2022 14:00</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Edit Intervensi
                                                        </a>
                                                        <button onclick="previewIntervensi()" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Lihat Form Intervensi
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:50px;">3.</th>
                                                    <td>Intervensi C</th>
                                                    <td>Intervensi Utama</td>
                                                    <td>Denny Julianto</td>
                                                    <td>23 Juni 2022 14:00</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Edit Intervensi
                                                        </a>
                                                        <button onclick="previewIntervensi()" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Lihat Form Intervensi
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:50px;">4.</th>
                                                    <td>Intervensi D</th>
                                                    <td>Intervensi Pendukung</td>
                                                    <td>Denny Julianto</td>
                                                    <td>23 Juni 2022 14:00</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Edit Intervensi
                                                        </a>
                                                        <button onclick="previewIntervensi()" class="btn btn-sm btn-light btn-square btn-diag-mini">
                                                            Lihat Form Intervensi
                                                        </button>
                                                    </td>
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
        <script>
            function previewIntervensi() {
                var left = (screen.width - 500) / 2;
                var top = (screen.height - 500) / 4;
                window.open('<?php echo base_url();?>dashboard/previewintervensi', '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
            }
        </script>
  	</body>
</html>