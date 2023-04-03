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
											<b>INTERVENSI UTAMA - MANAJEMEN JALAN NAFAS</b>
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
                                                        <span class="form-check-label">Monitor pola napas (frekuensi, kedalaman, usaha napas)</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Monitor bunyi napas tambahan (grugling, mengi, wheezing, ronkhi)</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Monitor sputum (jumlah, warna, aroma)</span>
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
                                                        <span class="form-check-label">Pertahankan kepatenan jalan napas dengan head-tilt dan chin-lift (jaw-thrust jika curiga trauma servikal)</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Posisikan semi-fowler atau fowler</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Berikan minum hangat</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Lakukan fisioterapi dada</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Lakukan penghisapan lendir kurang dari 15 detik</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Lakukan hiperoksigenasi sebelum penghisapan endotrakheal</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Keluarkan sumbatan benda padat dengan forsep Mc Gill</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Berikan oksigen</span>
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
                                                        <span class="form-check-label">Anjurkan asupan cairan 2000 ml/hari jika tidakada kontra indikasi</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Ajarkan teknik batuk efektif</span>
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