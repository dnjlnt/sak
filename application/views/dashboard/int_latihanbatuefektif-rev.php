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
											<b>INTERVENSI UTAMA - LATIHAN BATUK EFEKTIF</b>
                                            <button class="btn btn-sm btn-secondary" style="float:right;" onclick="window.location.replace('<?php echo base_url();?>dashboard/d0001')">
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
                                        <form>
                                            <div class="form-group mb-3">
                                                <label class="form-label" id="label-1">
                                                    <b>Observasi;</b>
                                                </label>
                                                <div >
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Spasme jalan napas</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Hipersekresi jalan napas</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Disfungsi neuromusukular</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Benda asing dalam jalan napas</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    <b>Terapeutik;</b>
                                                </label>
                                                <div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Batuk tidak efektif/tidak mampu batuk</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Sputum berlebih/obstruksi di jalan napas/mekonium di jalan napas (pada neonatus)</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Mengi/wheezing dan atau ronkhi</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    <b>Edukasi;</b>
                                                </label>
                                                <div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Dispnea</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Sulit bicara</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Ortopnea</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Frekuensi napas berubah</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Pola napas berubah</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    <b>Kolaborasi;</b>
                                                </label>
                                                <div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label"></span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
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
        
        <script type="text/javascript">
           window.onbeforeunload = function (e) {
                e = e || window.event;
                if (e) {
                    e.returnValue = 'Any string';
                }
                return 'Any string';
            };
        </script>
        <script>
            // function seeBarcodePatient(rm_doc_id) {
            //     $.ajax({
            //         type: "post",
            //         url: "<?php echo base_url();?>searchemr/getBarcodePatient",
            //         data: {rm_doc_id:rm_doc_id},
            //         success: function (data) {
            //             var left = (screen.width - 500) / 2;
            //             var top = (screen.height - 500) / 4;
            //             window.open('http://www.google.com', '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
            //         }
            //     });
            // }
        </script>
  	</body>
</html>