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
                                            <?php
                                                $sql = "select * from t_diagnosa_keperawatan where diagnosa_form_id = 'D0001'";
                                                $query = $this->db->query($sql);
                                                if ($query->num_rows() > 0) {
                                                    foreach ($query->result() as $row) {
                                                        echo "<b>".$row->diag_keperawatan_name."</b><br>";

                                                        $sql = "select * from t_checkbox_diagnosa_keperawatan 
                                                                where sub_diagnosa_keperawatan_id = '".$row->diag_keperawatan_id."'";
                                                        $query = $this->db->query($sql);
                                                        if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {
                                                                echo "<label class='form-check'>
                                                                        <input class='form-check-input' type='checkbox' value='".$row->checkbox_diagosa_keperawatan_id."' disabled>
                                                                        <span class='form-check-label'>".$row->checkbox_diagnosa_keperawatan_name."</span>
                                                                      </label>";
                                                                
                                                            }
                                                        } else {
                                                            $sql = "select * from t_sub_diagnosa_keperawatan 
                                                                    where diag_keperawatan_id = '".$row->diag_keperawatan_id."'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                                foreach ($query->result() as $row) {
                                                                    echo "".$row->sub_diagnosa_keperawatan_name."<br>";

                                                                    $sql = "select * from t_checkbox_diagnosa_keperawatan 
                                                                            where sub_diagnosa_keperawatan_id = '".$row->sub_diagnosa_keperawatan_id."'";
                                                                    $query = $this->db->query($sql);
                                                                    if ($query->num_rows() > 0) {
                                                                        foreach ($query->result() as $row) {
                                                                            echo "<label class='form-check'>
                                                                                    <input class='form-check-input' type='checkbox' value='".$row->checkbox_diagosa_keperawatan_id."' disabled>
                                                                                    <span class='form-check-label'>".$row->checkbox_diagnosa_keperawatan_name."</span>
                                                                                </label>";
                                                                            
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                   }
                                                } else {
                                                   echo "";
                                                }
                                            ?>
                                        </td>
                                        <td class="no-border">

                                            <?php 
                                                $sql = "select * from t_luaran_kep_d0001_record where diag_master_record_id = 'D0001'";
                                                $query = $this->db->query($sql);
                                                if ($query->num_rows() > 0) {
                                                    foreach ($query->result() as $row) {
                                                       $int_duration = $row->intervensi_duration;

                                                       if ($row->batuk == "0") {
                                                            $batuk = "-";
                                                       } else if ($row->batuk == "1") {
                                                            $batuk = "Menurun (1)";
                                                       } else if ($row->batuk == "2") {
                                                            $batuk = "Cukup Menurun (2)";
                                                        } else if ($row->batuk == "3") {
                                                            $batuk = "Sedang (3)";
                                                        } else if ($row->batuk == "4") {
                                                            $batuk = "Cukup Meningkat (4)";
                                                        } else {
                                                            $batuk = "Meningkat (5)";
                                                        }

                                                        if ($row->sputum == "0") {
                                                            $sputum = "-";
                                                        } else if ($row->sputum == "1") {
                                                            $sputum = "Meningkat (1)";
                                                        } else if ($row->sputum == "2") {
                                                            $sputum = "Cukup Meningkat (2)";
                                                        } else if ($row->sputum == "3") {
                                                            $sputum = "Sedang (3)";
                                                        } else if ($row->sputum == "4") {
                                                            $sputum = "Cukup Menurun (4)";
                                                        } else {
                                                            $sputum = "Menurun (5)";
                                                        }

                                                        if ($row->mengi == "0") {
                                                            $mengi = "-";
                                                        } else if ($row->mengi == "1") {
                                                            $mengi = "Meningkat (1)";
                                                        } else if ($row->mengi == "2") {
                                                            $mengi = "Cukup Meningkat (2)";
                                                        } else if ($row->mengi == "3") {
                                                            $mengi = "Sedang (3)";
                                                        } else if ($row->mengi == "4") {
                                                            $mengi = "Cukup Menurun (4)";
                                                        } else {
                                                            $mengi = "Menurun (5)";
                                                        }

                                                        if ($row->wheezing == "0") {
                                                            $wheezing = "-";
                                                        } else if ($row->wheezing == "1") {
                                                            $wheezing = "Meningkat (1)";
                                                        } else if ($row->wheezing == "2") {
                                                            $wheezing = "Cukup Meningkat (2)";
                                                        } else if ($row->wheezing == "3") {
                                                            $wheezing = "Sedang (3)";
                                                        } else if ($row->wheezing == "4") {
                                                            $wheezing = "Cukup Menurun (4)";
                                                        } else {
                                                            $wheezing = "Menurun (5)";
                                                        }

                                                        if ($row->ronkhi == "0") {
                                                            $ronkhi = "-";
                                                        } else if ($row->ronkhi == "1") {
                                                            $ronkhi = "Meningkat (1)";
                                                        } else if ($row->ronkhi == "2") {
                                                            $ronkhi = "Cukup Meningkat (2)";
                                                        } else if ($row->ronkhi == "3") {
                                                            $ronkhi = "Sedang (3)";
                                                        } else if ($row->ronkhi == "4") {
                                                            $ronkhi = "Cukup Menurun (4)";
                                                        } else {
                                                            $ronkhi = "Menurun (5)";
                                                        }

                                                        if ($row->mekonium == "0") {
                                                            $mekonium = "-";
                                                        } else if ($row->mekonium == "1") {
                                                            $mekonium = "Meningkat (1)";
                                                        } else if ($row->mekonium == "2") {
                                                            $mekonium = "Cukup Meningkat (2)";
                                                        } else if ($row->mekonium == "3") {
                                                            $mekonium = "Sedang (3)";
                                                        } else if ($row->mekonium == "4") {
                                                            $mekonium = "Cukup Menurun (4)";
                                                        } else {
                                                            $mekonium = "Menurun (5)";
                                                        }

                                                        if ($row->dispnea == "0") {
                                                            $dispnea = "-";
                                                        } else if ($row->dispnea == "1") {
                                                            $dispnea = "Meningkat (1)";
                                                        } else if ($row->dispnea == "2") {
                                                            $dispnea = "Cukup Meningkat (2)";
                                                        } else if ($row->dispnea == "3") {
                                                            $dispnea = "Sedang (3)";
                                                        } else if ($row->dispnea == "4") {
                                                            $dispnea = "Cukup Menurun (4)";
                                                        } else {
                                                            $dispnea = "Menurun (5)";
                                                        }

                                                        if ($row->ortopnea == "0") {
                                                            $ortopnea = "-";
                                                        } else if ($row->ortopnea == "1") {
                                                            $ortopnea = "Meningkat (1)";
                                                        } else if ($row->ortopnea == "2") {
                                                            $ortopnea = "Cukup Meningkat (2)";
                                                        } else if ($row->ortopnea == "3") {
                                                            $ortopnea = "Sedang (3)";
                                                        } else if ($row->ortopnea == "4") {
                                                            $ortopnea = "Cukup Menurun (4)";
                                                        } else {
                                                            $ortopnea = "Menurun (5)";
                                                        }

                                                        if ($row->sulitbicara == "0") {
                                                            $sulitbicara = "-";
                                                        } else if ($row->sulitbicara == "1") {
                                                            $sulitbicara = "Meningkat (1)";
                                                        } else if ($row->sulitbicara == "2") {
                                                            $sulitbicara = "Cukup Meningkat (2)";
                                                        } else if ($row->sulitbicara == "3") {
                                                            $sulitbicara = "Sedang (3)";
                                                        } else if ($row->sulitbicara == "4") {
                                                            $sulitbicara = "Cukup Menurun (4)";
                                                        } else {
                                                            $sulitbicara = "Menurun (5)";
                                                        }

                                                        if ($row->sianosis == "0") {
                                                            $sianosis = "-";
                                                        } else if ($row->sianosis == "1") {
                                                            $sianosis = "Meningkat (1)";
                                                        } else if ($row->sianosis == "2") {
                                                            $sianosis = "Cukup Meningkat (2)";
                                                        } else if ($row->sianosis == "3") {
                                                            $sianosis = "Sedang (3)";
                                                        } else if ($row->sianosis == "4") {
                                                            $sianosis = "Cukup Menurun (4)";
                                                        } else {
                                                            $sianosis = "Menurun (5)";
                                                        }

                                                        if ($row->gelisah == "0") {
                                                            $gelisah = "-";
                                                        } else if ($row->gelisah == "1") {
                                                            $gelisah = "Meningkat (1)";
                                                        } else if ($row->gelisah == "2") {
                                                            $gelisah = "Cukup Meningkat (2)";
                                                        } else if ($row->gelisah == "3") {
                                                            $gelisah = "Sedang (3)";
                                                        } else if ($row->gelisah == "4") {
                                                            $gelisah = "Cukup Menurun (4)";
                                                        } else {
                                                            $gelisah = "Menurun (5)";
                                                        }

                                                        if ($row->frekuensi_nafas == "0") {
                                                            $frekuensi_nafas = "-";
                                                        } else if ($row->frekuensi_nafas == "1") {
                                                            $frekuensi_nafas = "Memburuk (1)";
                                                        } else if ($row->frekuensi_nafas == "2") {
                                                            $frekuensi_nafas = "Cukup Memburuk (2)";
                                                        } else if ($row->frekuensi_nafas == "3") {
                                                            $frekuensi_nafas = "Sedang (3)";
                                                        } else if ($row->frekuensi_nafas == "4") {
                                                            $frekuensi_nafas = "Cukup Membaik (4)";
                                                        } else {
                                                            $frekuensi_nafas = "Membaik (5)";
                                                        }

                                                        if ($row->pola_nafas == "0") {
                                                            $pola_nafas = "-";
                                                        } else if ($row->pola_nafas == "1") {
                                                            $pola_nafas = "Memburuk (1)";
                                                        } else if ($row->pola_nafas == "2") {
                                                            $pola_nafas = "Cukup Memburuk (2)";
                                                        } else if ($row->pola_nafas == "3") {
                                                            $pola_nafas = "Sedang (3)";
                                                        } else if ($row->pola_nafas == "4") {
                                                            $pola_nafas = "Cukup Membaik (4)";
                                                        } else {
                                                            $pola_nafas = "Membaik (5)";
                                                        }
                                                    }
                                                }
                                            ?>

                                            Setelah dilakukan intervensi keperawatan selama <b><u><?php echo $int_duration; ?></u></b> jam, bersihan jalan napas <b>meningkat</b>, 
                                            dengan kriteria hasil;
                                            <table class="table">
                                                <tr>
                                                    <td class="no-border" style="width:170px;">Batuk</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Produksi Sputum</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Mengi</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Wheezing</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Ronkhi</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Mekonium pada Neonatus</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Dispnea</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Ortopnea</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Sulit Bicara</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Sianosis</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Gelisah</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Frekuensi Nafas</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Pola Nafas</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="no-border">
                                            <b>1. Intervensi Utama</b>
                                            <br><br>
                                            <?php
                                                $sql = "select * from t_intervensi_keperawatan where diagnosa_form_id = 'D0001' 
                                                        and intervensi_status = '0'";
                                                $query = $this->db->query($sql);
                                                if ($query->num_rows() > 0) {
                                                   foreach ($query->result() as $row) {

                                                        $c = "";
                                                        $sql = "select * from t_diag_record where diag_master_record_id = 'D0001'";
                                                        $query = $this->db->query($sql);
                                                        if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row_record) {
                                                                if ($row_record->diag_record_value == $row->intervensi_keperawatan_id) {
                                                                    $c .= "checked";
                                                                } else {
                                                                    $c .= "";
                                                                }
                                                            }
                                                        }

                                                        echo "<label class='form-check'>
                                                                <input class='form-check-input' type='checkbox' ".$c." disabled>
                                                                <span class='form-check-label'>".$row->intervensi_keperawatan_name."</span>
                                                              </label>";
                                                   }
                                                } else {
                                                   echo "";
                                                }
                                            ?>
                                            <br>
                                            <b>2. Intervensi Pendukung</b>
                                            <br><br>
                                            <?php
                                                $sql = "select * from t_intervensi_keperawatan where diagnosa_form_id = 'D0001' 
                                                        and intervensi_status = '1'";
                                                $query = $this->db->query($sql);
                                                if ($query->num_rows() > 0) {
                                                   foreach ($query->result() as $row) {

                                                        $c = "";
                                                        $sql = "select * from t_diag_record where diag_master_record_id = 'D0001'";
                                                        $query = $this->db->query($sql);
                                                        if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row_record) {
                                                                if ($row_record->diag_record_value == $row->intervensi_keperawatan_id) {
                                                                    $c .= "checked";
                                                                } else {
                                                                    $c .= "";
                                                                }
                                                            }
                                                        }

                                                        echo "<label class='form-check'>
                                                                <input class='form-check-input' type='checkbox' ".$c." disabled>
                                                                <span class='form-check-label'>".$row->intervensi_keperawatan_name."</span>
                                                              </label>";
                                                   }
                                                } else {
                                                   echo "";
                                                }
                                            ?>
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