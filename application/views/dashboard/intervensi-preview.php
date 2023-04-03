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
                                    <td style="width:200px;border:none;">
                                        <img src="<?php echo base_url();?>assets/static/Logo-CH.png" style="width:150px;">
                                    </td>
                                    <td style="width:950px;border:none;"><center><b>INTERVENSI KEPERAWATAN</b></center></td>
                                    <td style="width:150px;border:none;" rowspan="2">
                                        <div class="label-patient">
                                            <label>00000002</label>
                                            <br>   
                                            <label>Denny Julianto</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:10px;border:none;">Tanggal/Bulan/Tahun: 23/Juni/2022</td>
                                    <td style="font-size:10px;border:none;">
                                        <center>
                                            <b>Diagnosa Keperawatan No: </b>
                                            <br>
                                            <input type="checkbox" id="vehicle1" checked disabled name="vehicle1" value="Bike">
                                            <label for="vehicle1"> Intervensi Utama</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="vehicle2" disabled name="vehicle2" value="Car">
                                            <label for="vehicle2"> Intervensi Pendukung</label><br>
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
                                        <th rowspan="2" style="border:none;text-align:center;padding-bottom:25px;width:900px;">Latihan Batuk Efektif</th>
                                        <th colspan="2" style="text-align:center;">PPJA</th>
                                    </tr>
                                    <tr>
                                        <th style="border:none;text-align:center;">Nama</th>
                                        <th style="border:none;text-align:center;">Paraf</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="font-size:11px;width:200px;">
                                        <td class="no-border">
                                            <b>Observasi;</b>
                                            <br>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Identifkasi pemantauan batuk</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Monitor adanya retensi sputum</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Monitor tanda dan gejala infeksi saluran napas</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Monitor intake dan output cairan (misal; jumlah dan karakteristik) </span>
                                            </label>
                                        </td>
                                        <td class="no-border" align="center">Veronica Chain</td>
                                        <td class="no-border"></td>
                                    </tr>
                                    <tr style="font-size:11px;width:200px;">
                                        <td class="no-border">
                                            <b>Terapeutik;</b>
                                            <br>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Atur posisi semi-fowler atau fowler pasien</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Pasang  perlak dipangkuan pasien</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Buang sekret pada tempat sputum</span>
                                            </label>
                                        </td>
                                        <td class="no-border" align="center">Veronica Chain</td>
                                        <td class="no-border"></td>
                                    </tr>
                                    <tr style="font-size:11px;width:200px;">
                                        <td class="no-border">
                                            <b>Edukasi;</b>
                                            <br>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Jelaskan tujuan dan prosedur batuk efektif</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Anjurkan tarik napas dalam melalui hidung selama 4 detik, ditahan selama 2 detik, kemudian </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">keluarkan dari mulut, dengan bibir mencucu </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Atur intervensi pemantauan respirasi sesuai kondisi pasien (dibulatkan) selama 8 detik</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Anjurkan mengulang tarik napas dalam hingga 3 kali</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <span class="form-check-label">Anjurkan  batuk dengan kuat langsung setelah tarik napas dalam yang ke-3</span>
                                            </label>
                                        </td>
                                        <td class="no-border" align="center">Veronica Chain</td>
                                        <td class="no-border"></td>
                                    </tr>
                                    <tr style="font-size:11px;width:200px;">
                                        <td class="no-border">
                                            <b>Kolaborasi;</b>
                                            <br>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                            </label>
                                        </td>
                                        <td class="no-border" align="center">Veronica Chain</td>
                                        <td class="no-border"></td>
                                    </tr>
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