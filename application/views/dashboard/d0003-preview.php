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
                                            <b>D. 0003 - Gangguan Pertukaran Gas</b>
                                            <br>
                                            <b>Definisi:</b> 
                                            Kelebihan atau kekurangan oksigenasi dan atau eleminasi karbondioksida pada membran alveolus-kapiler.
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
                                                $sql = "select * from t_diagnosa_keperawatan where diagnosa_form_id = 'D0003'";
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
                                            Setelah dilakukan intervensi keperawatan selama <b><u></u></b> jam, bersihan jalan napas <b>meningkat</b>, 
                                            dengan kriteria hasil;
                                            <table class="table">
                                                <tr>
                                                    <td class="no-border" style="width:200px;">Tingkat Kesadaran</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Dispnea</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Bunyi Nafas Tambahan</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Pusing</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Penglihatan Kabur</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Diaforesis</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Gelisah</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Napas cuping hidung</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">PCO2</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">PO2</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Takikardia</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">pH Arteri</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Sianosis</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Pola nafas</td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">Warna kulit </td>
                                                    <td class="no-border" colspan="5">: <b>-</b></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="no-border">
                                            <b>1. Intervensi Utama</b>
                                            <br><br>
                                            <?php
                                                $sql = "select * from t_intervensi_keperawatan where diagnosa_form_id = 'D0003' 
                                                        and intervensi_status = '0'";
                                                $query = $this->db->query($sql);
                                                if ($query->num_rows() > 0) {
                                                   foreach ($query->result() as $row) {

                                                        echo "<label class='form-check'>
                                                                <input class='form-check-input' type='checkbox' disabled>
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
                                                $sql = "select * from t_intervensi_keperawatan where diagnosa_form_id = 'D0003' 
                                                        and intervensi_status = '1'";
                                                $query = $this->db->query($sql);
                                                if ($query->num_rows() > 0) {
                                                   foreach ($query->result() as $row) {

                                                        $c = "";
                                                        $sql = "select * from t_diag_record where diag_master_record_id = 'D0003'";
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