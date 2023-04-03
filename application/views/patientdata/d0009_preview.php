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
                                            Subkategori : Sirkulasi<br>
                                            Nama perawat : Denny Julianto<br>
                                            Tanggal dan Jam : 30 Juni 2022 09:05<br>
                                            Unit : Citra Garden City
                                        </b>
                                    </td>
                                    <td style="font-size:10px;border:none;">
                                        <center>
                                            <b>D. 0009 - Perfusi Perifer Tidak Efektif</b>
                                            <br>
                                            <b>Definisi:</b> 
                                            Penurunan sirkulasi darah pada level kapiler yang dapat mengganggu metabolisme tubuh.
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
                                            Setelah dilakukan intervensi keperawatan selama <b><u><?php echo $int_duration; ?></u></b> jam, perfusi perifer <b>meningkat</b>, 
                                            dengan kriteria hasil;
                                            <table class="table">
                                                <tr>
                                                    <td class="no-border" style="width:170px;">Batuk</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $batuk;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Produksi Sputum</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $sputum;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Mengi</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $mengi;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Wheezing</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $wheezing;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Ronkhi</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $ronkhi;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Mekonium pada Neonatus</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $mekonium;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Dispnea</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $dispnea;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Ortopnea</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $ortopnea;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Sulit Bicara</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $sulitbicara;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Sianosis</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $sianosis;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Gelisah</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $gelisah;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Frekuensi Nafas</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $frekuensi_nafas;?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Pola Nafas</td>
                                                    <td class="no-border" colspan="5">: <b><?php echo $pola_nafas;?></b></td>
                                                </tr>
                                            </table>
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