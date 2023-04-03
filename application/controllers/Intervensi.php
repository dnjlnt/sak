<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require './vendor/autoload.php';

class Intervensi extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library("pdfgenerator");
    }
	
	public function index() {
        $new_diag_record_number = $this->session->userdata('new_diag_record_number');
        // $data['no_rm'] = $this->session->userdata('patient_mr');
        $patient_mr = $this->session->userdata('patient_mr');

        if (strlen($patient_mr) == "1" || strlen($patient_mr) == 1) {
			$data['no_rm'] = "0000000".$patient_mr;
		} else if (strlen($patient_mr) == "2" || strlen($patient_mr) == 2) {
			$data['no_rm'] = "000000".$patient_mr;
		} else if (strlen($patient_mr) == "3" || strlen($patient_mr) == 3) {
			$data['no_rm'] = "00000".$patient_mr;
		} else if (strlen($patient_mr) == "4" || strlen($patient_mr) == 4) {
			$data['no_rm'] = "0000".$patient_mr;
		} else if (strlen($patient_mr) == "5" || strlen($patient_mr) == 5) {
			$data['no_rm'] = "000".$patient_mr;
		} else if (strlen($patient_mr) == "6" || strlen($patient_mr) == 6) {
			$data['no_rm'] = "00".$patient_mr;
		} else if (strlen($patient_mr) == "7" || strlen($patient_mr) == 7) {
			$data['no_rm'] = "0".$patient_mr;
		} else {
			$data['no_rm'] = "".$patient_mr;
		}

        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

		if ($url == "http://192.168.15.9:1026") {
			$prefmr = "02";
			$data['unit_display'] = "Ciputra Hospital Citra Garden City";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$patient_mr&return_type=json";
		} else if ($url == "http://192.168.19.21:2300" || $url == "http://192.168.19.19") {
			$prefmr = "03";
			$data['unit_display'] = "Ciputra Mitra Hospital Banjarmasin";
			$urlTera = "http://192.168.19.19/api.php?mod=api&cmd=get_patient&no_rm=$patient_mr&return_type=json";
		} else {
			$prefmr = "01";
			$data['unit_display'] = "Ciputra Hospital Citra Raya Tangerang";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$patient_mr&return_type=json";
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
				if (strlen($patient_mr) == "1" || strlen($patient_mr) == 1) {
					$ext_patient_mr = "0000000";
				} else if (strlen($patient_mr) == "2" || strlen($patient_mr) == 2) {
					$ext_patient_mr = "000000";
				} else if (strlen($patient_mr) == "3" || strlen($patient_mr) == 3) {
					$ext_patient_mr = "00000";
				} else if (strlen($patient_mr) == "4" || strlen($patient_mr) == 4) {
					$ext_patient_mr = "0000";
				} else if (strlen($patient_mr) == "5" || strlen($patient_mr) == 5) {
					$ext_patient_mr = "000";
				} else if (strlen($patient_mr) == "6" || strlen($patient_mr) == 6) {
					$ext_patient_mr = "00";
				} else if (strlen($patient_mr) == "7" || strlen($patient_mr) == 7) {
					$ext_patient_mr = "0";
				} else {
					$ext_patient_mr = "";
				}

				$data['patient_mr'] = $ext_patient_mr.$patient_mr;
				$data['patient_fullname'] = $response->data->name_real;
				$data['patient_dob'] = $response->data->tgl_lahir;

			} else {
				$data['patient_mr'] = "";
				$data['patient_fullname'] = "";
				$data['patient_dob'] = "";
			}
		}

        $no = 0;
        $data["rowintervensi"] = "";
        $getAllInt = $this->ModelIntervensi->getAllInt($new_diag_record_number);
        if ($getAllInt !== false) {
            foreach ($getAllInt as $row) {
                $no++;
                $int_kep_name = $row->intervensi_keperawatan_name;
                $int_kep_name = strtoupper($int_kep_name);
                $int_kep_name = str_replace(' ', '_', $int_kep_name);
                $controller_name = $row->mapping_int_id;
                $int_record_id = $row->intervensi_record_id;
                $intervensi_status = $row->intervensi_status;

                $data["rowintervensi"] .= "<tr>
                                                <td style='width:50px;'>".$no.".</td>
                                                <td>
                                                    <a href='".base_url()."".$controller_name."?drm=".$new_diag_record_number."&int_record_id=".$int_record_id."&int_status=".$intervensi_status."&int_form=".$int_kep_name."&patient_mr=".$patient_mr."'>
                                                        ".$row->intervensi_keperawatan_name."
                                                    </a>
                                                </td>
                                           </tr>";
            }
        } else {
            redirect("patient/patientinfo/".$patient_mr."");
        }

        $this->load->view('intervensi/index.php', $data);
	}

    public function latihanbatukefektif() {
        $master_diag_record_number = $this->uri->segment(3);
        $int_record_id = $this->uri->segment(4);
        $form_intervensi_id = "I_KEP001";
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");

        $data["buttonSave"] = "<button type='submit' onclick='saveLatihanBatuk(\"$master_diag_record_number\", \"$int_record_id\")' class='btn btn-primary'>
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
                        $data["intervensicontent"] .= "<label class='form-check'>
                                                            <input class='form-check-input' name='int_latbatukefektif' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                            <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                       </label>";
                    }
                }
                
                $data["intervensicontent"] .= "</div>";
            }
        } else {
            $data["intervensicontent"] .= "";
        }

        $this->load->view('intervensi/latihanbatukefektif_page.php', $data);
	}

    public function manajemenjalannafas() {
        $master_diag_record_number = $this->uri->segment(3);
        $int_record_id = $this->uri->segment(4);
        $form_intervensi_id = "I_KEP002";
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");

        $data["buttonSave"] = "<button type='submit' onclick='savemanajamennafas(\"$master_diag_record_number\", \"$int_record_id\")' class='btn btn-primary'>
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
                        $data["intervensicontent"] .= "<label class='form-check'>
                                                            <input class='form-check-input' name='int_manjalannafas' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                            <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                       </label>";
                    }
                }
                
                $data["intervensicontent"] .= "</div>";
            }
        } else {
            $data["intervensicontent"] .= "";
        }

        $this->load->view('intervensi/manajemenjalannafas_page.php', $data);
	}

    public function pemantauanrespirasi() {
        $master_diag_record_number = $this->uri->segment(3);
        $int_record_id = $this->uri->segment(4);
        $form_intervensi_id = "I_KEP003";
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");

        $data["buttonSave"] = "<button type='submit' onclick='savepemantauanrespirasi(\"$master_diag_record_number\", \"$int_record_id\")' class='btn btn-primary'>
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
                        $data["intervensicontent"] .= "<label class='form-check'>
                                                            <input class='form-check-input' name='int_pemrespirasi' id='".$rowCheckbox->chckbx_sub_intervensi_id."' value='".$rowCheckbox->chckbx_sub_intervensi_id."' type='checkbox'>
                                                            <span class='form-check-label'>".$rowCheckbox->chckbx_sub_intervensi_name."</span>
                                                       </label>";
                    }
                }
                
                $data["intervensicontent"] .= "</div>";
            }
        } else {
            $data["intervensicontent"] .= "";
        }

        $this->load->view('intervensi/pemantauanrespirasi_page.php', $data);
	}

    public function saveLatihanBatukEfektif() {
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");
        $master_diag_record_number = $this->input->post("master_diag_record_number");
        $int_record_id = $this->input->post("int_record_id");

        foreach ($this->input->post("selectedIntervensi") as $row) {
            $saveProcess = $this->ModelIntervensi->saveLatihanBatuk($row, $master_diag_record_number, $int_record_id, $created_by, $created_dttm);
        }
        
        if ($saveProcess) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function saveManajemenJalanNafas() {
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d h:i:s");
        $master_diag_record_number = $this->input->post("master_diag_record_number");
        $int_record_id = $this->input->post("int_record_id");

        foreach ($this->input->post("selectedIntervensi") as $row) {
            $saveProcess = $this->ModelIntervensi->saveManajemenJalanNafas($row, $master_diag_record_number, $int_record_id, $created_by, $created_dttm);
        }
        
        if ($saveProcess) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function savePemantauanRespirasi() {
        $created_by = "USER_001";
        $created_dttm = date("Y-m-d H:i:s");
        $master_diag_record_number = $this->input->post("master_diag_record_number");
        $int_record_id = $this->input->post("int_record_id");

        foreach ($this->input->post("selectedIntervensi") as $row) {
            $saveProcess = $this->ModelIntervensi->savePemantauanRespirasi($row, $master_diag_record_number, $int_record_id, $created_by, $created_dttm);
        }
        
        if ($saveProcess) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}