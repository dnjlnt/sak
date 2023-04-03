<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require './vendor/autoload.php';

class I_09297 extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library("pdfgenerator");
    }
	
	public function index() {
        $diag_record_number = $_GET['drm'];
        $int_record_id = $_GET['int_record_id'];
        $int_status = $_GET['int_status'];
        $form_intervensi_id = $this->uri->segment(1);

        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		$data['no_rm'] = $_GET['patient_mr'];
		$no_rm = $_GET['patient_mr'];

        if (strlen($no_rm) == "1" || strlen($no_rm) == 1) {
			$data['no_rm'] = "0000000".$no_rm;
		} else if (strlen($no_rm) == "2" || strlen($no_rm) == 2) {
			$data['no_rm'] = "000000".$no_rm;
		} else if (strlen($no_rm) == "3" || strlen($no_rm) == 3) {
			$data['no_rm'] = "00000".$no_rm;
		} else if (strlen($no_rm) == "4" || strlen($no_rm) == 4) {
			$data['no_rm'] = "0000".$no_rm;
		} else if (strlen($no_rm) == "5" || strlen($no_rm) == 5) {
			$data['no_rm'] = "000".$no_rm;
		} else if (strlen($no_rm) == "6" || strlen($no_rm) == 6) {
			$data['no_rm'] = "00".$no_rm;
		} else if (strlen($no_rm) == "7" || strlen($no_rm) == 7) {
			$data['no_rm'] = "0".$no_rm;
		} else {
			$data['no_rm'] = "".$no_rm;
		}

		if ($url == "http://192.168.15.9:1026") {
			$prefmr = "02";
			$data['unit_display'] = "Ciputra Hospital Citra Garden City";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$no_rm&return_type=json";
		} else if ($url == "http://192.168.19.21:2300" || $url == "http://192.168.19.19") {
			$prefmr = "03";
			$data['unit_display'] = "Ciputra Mitra Hospital Banjarmasin";
			$urlTera = "http://192.168.19.19/api.php?mod=api&cmd=get_patient&no_rm=$no_rm&return_type=json";
		} else {
			$prefmr = "01";
			$data['unit_display'] = "Ciputra Hospital Citra Raya Tangerang";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$no_rm&return_type=json";
		}
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $urlTera,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Basic cnNjaXB1dHJhOnJzY2lwdXRyYQ==',
    			'Cookie: CIPUTRA=kdro8l3iev6sdarvijnbn4oi27'
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		if (isset($response)) {
			$response = json_decode($response);

			if ($response->count == "1" || $response->count == 1) {
				if (strlen($no_rm) == "1" || strlen($no_rm) == 1) {
					$ext_patient_mr = "0000000";
				} else if (strlen($no_rm) == "2" || strlen($no_rm) == 2) {
					$ext_patient_mr = "000000";
				} else if (strlen($no_rm) == "3" || strlen($no_rm) == 3) {
					$ext_patient_mr = "00000";
				} else if (strlen($no_rm) == "4" || strlen($no_rm) == 4) {
					$ext_patient_mr = "0000";
				} else if (strlen($no_rm) == "5" || strlen($no_rm) == 5) {
					$ext_patient_mr = "000";
				} else if (strlen($no_rm) == "6" || strlen($no_rm) == 6) {
					$ext_patient_mr = "00";
				} else if (strlen($no_rm) == "7" || strlen($no_rm) == 7) {
					$ext_patient_mr = "0";
				} else {
					$ext_patient_mr = "";
				}

				$data['patient_mr'] = $ext_patient_mr.$no_rm;
				$data['patient_fullname'] = $response->data->name_real;
				$data['patient_dob'] = $response->data->tgl_lahir;

			} else {
				$data['patient_mr'] = "";
				$data['patient_fullname'] = "";
				$data['patient_dob'] = "";
			}
		}

        if ($int_status == "0") {
            $data["int_status"] = "UTAMA";
        } else {
            $data["int_status"] = "PENDUKUNG";
        }

        $data['int_form_name'] = str_replace('_', ' ', $_GET['int_form']);

        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");

        $data["buttonSave"] = "<button type='submit' onclick='saveIntervensi(\"$diag_record_number\", \"$int_record_id\")' class='btn btn-primary'>
                                Save
                               </button>";

        $data["intervensicontent"] = "";
        $getSubIntervensi = $this->ModelIntervensi->getSubIntervensi($form_intervensi_id);
        if ($getSubIntervensi !== false) {
            foreach ($getSubIntervensi as $rowSub) {
                $data["intervensicontent"] .= "<div class='form-group mb-3'>
                                                    <label class='form-label' id='label'>
                                                        <b>".$rowSub->sub_intervensi_name."</b>
                                                    </label>
                                               </div>
                                               <div>";

                $getCheckboxIntervensi = $this->ModelIntervensi->getCheckboxIntervensi($rowSub->sub_intervensi_id);
                if ($getCheckboxIntervensi !== false) {
                    foreach ($getCheckboxIntervensi as $rowCheckbox) {
                        if ($rowSub->sub_intervensi_name == 'Observasi;') {
                            $data["intervensicontent"] .= "<label class='form-check'>
                                                                <input class='form-check-input' name='chckbx_int_observasi' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                                <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                           </label>";
                        } else if ($rowSub->sub_intervensi_name == 'Terapeutik;') {
                            $data["intervensicontent"] .= "<label class='form-check'>
                                                                <input class='form-check-input' name='chckbx_int_terapeutik' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                                <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                           </label>";
                        } else if ($rowSub->sub_intervensi_name == 'Edukasi;') {
                            $data["intervensicontent"] .= "<label class='form-check'>
                                                                <input class='form-check-input' name='chckbx_int_edukasi' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                                <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                           </label>";
                        } else {
                            $data["intervensicontent"] .= "<label class='form-check'>
                                                                <input class='form-check-input' name='chckbx_int_kolabolari' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                                <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                           </label>";
                        }
                    }
                }
                
                $data["intervensicontent"] .= "</div>";
            }
        } else {
            $data["intervensicontent"] .= "";
        }

        $this->load->view('intervensi/I_09297.php', $data);
	}

    public function saveIntervensi() {
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");
        $master_diag_record_number = $this->input->post("master_diag_record_number");
        $int_record_id = $this->input->post("int_record_id");
        $selectedIntervensiObservasi = $this->input->post("selectedIntervensiObservasi");
        $selectedIntervensiTerapeutik = $this->input->post("selectedIntervensiTerapeutik");
        $selectedIntervensiEdukasi = $this->input->post("selectedIntervensiEdukasi");
        $selectedIntervensiKolaborasi = $this->input->post("selectedIntervensiKolaborasi");

        if (count($selectedIntervensiObservasi) > 0 || $selectedIntervensiObservasi !== "") {
            foreach ($selectedIntervensiObservasi as $rowObs) {
                $saveProcess = $this->ModelIntervensi->saveIntervensi($rowObs, $int_record_id, $created_by, $created_dttm);
            }
        }

        if (count($selectedIntervensiTerapeutik) > 0 || $selectedIntervensiTerapeutik !== "") {
            foreach ($selectedIntervensiTerapeutik as $rowTer) {
                $saveProcess = $this->ModelIntervensi->saveIntervensi($rowTer, $int_record_id, $created_by, $created_dttm);
            }
        }

        if (count($selectedIntervensiEdukasi) > 0 || $selectedIntervensiEdukasi !== "") {
            foreach ($selectedIntervensiEdukasi as $rowEdu) {
                $saveProcess = $this->ModelIntervensi->saveIntervensi($rowEdu, $int_record_id, $created_by, $created_dttm);
            }
        }

        if (count($selectedIntervensiKolaborasi) > 0 || $selectedIntervensiKolaborasi !== "") {
            foreach ($selectedIntervensiKolaborasi as $rowKol) {
                $saveProcess = $this->ModelIntervensi->saveIntervensi($rowKol, $int_record_id, $created_by, $created_dttm);
            }
        }
        
        if ($saveProcess) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}