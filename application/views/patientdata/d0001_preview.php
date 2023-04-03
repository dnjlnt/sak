<!doctype html>
<html lang="en">
	<?php $this->load->view("includes/common.php");?>
    <style>
        .no-border {
            border-bottom: none;
        }

        .label-patient {
            border: 1px solid #000;
            border-radius: 5px;
            padding: 22px 0px 10px 5px;
            height: 80px;
            font-size: 12px;
        }
    </style>
	<body style="background:#ffffff;">
		<div class="wrapper">
			<div class="page-wrapper">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <tr>
                                    <td style="width:220px;border:none;"><img src="<?php echo base_url();?>assets/static/Logo-CH.png" style="width:150px;"></td>
                                    <td style="width:950px;border:none;"><center><b>ASUHAN KEPERAWATAN</b></center></td>
                                    <td style="width:150px;border:none;" rowspan="2">
                                        <div class="label-patient">
                                            <label>00000002</label>
                                            <br>   
                                            <label>Denny Julianto</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:10px;border:none;">
                                        <b>
                                            Kategori : Fisiologis<br>
                                            Subkategori : Respirasi<br>
                                            Nama perawat : Denny Julianto<br>
                                            Tanggal dan Jam : 30 Juni 2022 09:05<br>
                                            Unit : Citra Garden City
                                        </b>
                                    </td>
                                    <td style="font-size:10px;border:none;">
                                        <center>
                                            <b>D. 0001 - Bersihan Jalan Napas Tidak Efektif</b>
                                            <br>
                                            <b>Definisi:</b> 
                                            Ketidakmampuan membersihkan sekret atau obstruksi jalan napas untuk mempertahankan jalan napas tetap paten
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Diagnosis Keperawatan</th>
                                        <th>Luaran Keperawatan</th>
                                        <th>Intervensi Keperawatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="font-size:11px;width:200px;">
                                        <td class="no-border"></td>
                                        <td class="no-border" style="width:300px;">
                                            <?php echo $diagnosakeperawatan; ?>
                                        </td>
                                        <td class="no-border">
                                            Setelah dilakukan intervensi keperawatan selama <b><u><?php echo $int_duration; ?></u></b> jam, bersihan jalan napas <b>meningkat</b>, 
                                            dengan kriteria hasil;
                                            <?php echo $luaranKep;?>
                                        </td>
                                        <td class="no-border">
                                            <b>1. Intervensi Utama</b>
                                            <br><br>
                                            <?php echo $intutama; ?>
                                            <br>
                                            <b>2. Intervensi Pendukung</b>
                                            <br><br>
                                            <?php echo $intpendukung; ?>
                                        </td>
                                    </tr>
                                    <tr style="font-size:11px;"></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
      		</div>
   		</div>
		<?php $this->load->view("includes/allscripts.php");?>
        <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  	</body>
</html>