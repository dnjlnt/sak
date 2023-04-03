<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require './vendor/autoload.php';

class Diagnosa extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library("pdfgenerator");
    }
	
	public function index() {
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

				$data['patient_mr'] = $prefmr."-".$ext_patient_mr.$no_rm;
				$data['patient_fullname'] = $response->data->name_real;
				$data['patient_dob'] = $response->data->tgl_lahir;

			} else {
				$data['patient_mr'] = "";
				$data['patient_fullname'] = "";
				$data['patient_dob'] = "";
			}
		}

		$getMasterDiagnosa = $this->ModelDiagnosa->getMasterDiagnosa();
		$data["masterdiagnosa"] = "";
		if ($getMasterDiagnosa !== false) {
			foreach ($getMasterDiagnosa as $masterDiag) {
				$data["masterdiagnosa"] .= " <tr>
												<td style='font-size:12px;'>
													<a href='".base_url()."diagnosa/form/".$masterDiag->master_diagnosa_id."?patient_mr=$no_rm'>
														".$masterDiag->master_diagnosa_name."
													</a>
												</td>
											 </tr>";
			}
		} else {
			$data["masterdiagnosa"] .= "";
		}

		$this->load->view('diagnosa/index.php', $data);
	}

	public function form() {
		$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		$data['no_rm'] = $_GET['patient_mr'];
		$no_rm = $_GET['patient_mr'];
		$masterDiag = $this->uri->segment(3);

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

		$data["masterDiagnosaName"] = $this->ModelDiagnosa->getNameDiag($masterDiag);

		$data["listformdiagnosa"] = "";
		$getFormDiag = $this->ModelDiagnosa->getFormDiagnosa($masterDiag);
		$no = 0;
		if ($getFormDiag !== false) {
			foreach ($getFormDiag as $formDiag) {
				$no++;
				$nox = "text-".$no++;
				$data["listformdiagnosa"] .= "<tr>
												<td style='font-size:12px;'>
													<a href='".base_url()."".$formDiag->diagnosa_form_id."?patient_mr=".$no_rm."' id='".$nox."' data-toggle='tooltip' title='".$formDiag->diagnosa_tooltip."'>
														".$formDiag->diagnosa_form_name."
													</a>
													<button class='btn btn-primary btn-sm btn-square' style='float:right;font-size:10px;' onclick='copyToClipboard(\"#$nox\")'>
														Copy
													</button>
												</td>
											  </tr>";
			}
		} else {
			$data["listformdiagnosa"] .= "";
		}

		$this->load->view('diagnosa/diagnosa_form_list_page.php', $data);
	}

	public function getform() {
		$masterFormDiag = $this->uri->segment(3);

		$getDiagnosaKeperawatan = $this->ModelDiagnosa->getDiagnosaKeperawatan($masterFormDiag);
		$numItems1 = count($getDiagnosaKeperawatan);
		$i = 0;	
		$data["dataDiagnosaKeperawatan"] = "";
		if ($getDiagnosaKeperawatan !==  false) {
			foreach ($getDiagnosaKeperawatan as $diagnosaKeperawatan) {
				$i++;
				if ($i !== 1) {
					$data["dataDiagnosaKeperawatan"] .= "<br>";
				}
				$data["dataDiagnosaKeperawatan"] .= "<div class='form-group mb-3'>
														<label class='form-label' id='label-1'>
															<b>".$diagnosaKeperawatan->diag_keperawatan_name."</b>
														</label>
													 </div>";
				
				$getChckbxDiagKep = $this->ModelDiagnosa->getChckbxDiagKep($diagnosaKeperawatan->diag_keperawatan_id);
				if ($getChckbxDiagKep !==  false) {
					foreach ($getChckbxDiagKep as $chxbxDiagKep) {
						$data["dataDiagnosaKeperawatan"] .= "<label class='form-check'>
																<input class='form-check-input' name='diagnosa_record' id='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' value='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' type='checkbox'>
																<span class='form-check-label'>".$chxbxDiagKep->checkbox_diagnosa_keperawatan_name."</span>
															 </label>";
					}
				} else {
					$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($diagnosaKeperawatan->diag_keperawatan_id);
					if ($getSubDiagKep !==  false) {
						foreach ($getSubDiagKep as $subDiagKep) {
							$data["dataDiagnosaKeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

							$getChckbxDiagKep = $this->ModelDiagnosa->getChckbxDiagKep($subDiagKep->sub_diagnosa_keperawatan_id);
							if ($getChckbxDiagKep !==  false) {
								foreach ($getChckbxDiagKep as $chxbxDiagKep) {
									$data["dataDiagnosaKeperawatan"] .= "<label class='form-check'>
																			<input class='form-check-input' name='diagnosa_record' id='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' value='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' type='checkbox'>
																			<span class='form-check-label'>".$chxbxDiagKep->checkbox_diagnosa_keperawatan_name."</span>
																		 </label>";
								}
							}

						}
					}
				}
									 
			}
		} else {
			$data["dataDiagnosaKeperawatan"] .= "";
		}

		$data["intutama"] = "";
		$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($masterFormDiag);
		if ($getIntKepUtama !== false) {
			foreach ($getIntKepUtama as $intKepUtama) {
				$data["intutama"] .= "<label class='form-check'>
										<input class='form-check-input' type='checkbox' name='intervensi_keperawatan' id='".$intKepUtama->intervensi_keperawatan_id."' value='".$intKepUtama->intervensi_keperawatan_id."'>
										<span class='form-check-label'>".$intKepUtama->intervensi_keperawatan_name."</span>
									  </label>";
			}
		} else {
			$data["intutama"] .= "";
		}

		$data["intpendukung"] = "";
		$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($masterFormDiag);
		if ($getIntKepPendukung !== false) {
			foreach ($getIntKepPendukung as $intKepPendukung) {
				$data["intpendukung"] .= "<label class='form-check'>
											<input class='form-check-input' type='checkbox' name='intervensi_keperawatan' id='".$intKepPendukung->intervensi_keperawatan_id."' value='".$intKepPendukung->intervensi_keperawatan_id."'>
											<span class='form-check-label'>".$intKepPendukung->intervensi_keperawatan_name."</span>
										  </label>";
			}
		} else {
			$data["intpendukung"] .= "";
		}

		$data["intdurasi"] = "<select class='form-control' id='durasi_intervensi'>
								<option value='0'>Pilih Durasi</option>";
		$getIntDurasi = $this->ModelDiagnosa->getIntDurasi();
		if ($getIntDurasi !== false) {
			foreach ($getIntDurasi as $intDurasi) {
				$data["intdurasi"] .= "<option value='".$intDurasi->intervensi_durasi_id."'>
										".$intDurasi->intervensi_durasi_name."
									   </option>";
			}
		} else {
			$data["intdurasi"] .= "<option value=''></option>";
		}
		$data["intdurasi"] .= "</select>";

		$data["luaran_keperawatan_item"] = "";
		$getItemLuaranKeperawatan = $this->ModelDiagnosa->getItemLuaranKeperawatan($masterFormDiag);
		if ($getItemLuaranKeperawatan !== false) {
			foreach ($getItemLuaranKeperawatan as $itemLuaranKeperawatan) {
				$data["luaran_keperawatan_item"] .= "<label class='form-label'>".$itemLuaranKeperawatan->luaran_keperawatan_name."</label>";
			}
		} else {
			$data["luaran_keperawatan_item"] .= "";
		}

		if ($masterFormDiag == "D0001") {
			$data["luaranKeperawatan"] = $this->luaranKeperawatanD0001();
		} else {

		}

		$this->load->view('diagnosa/diagnosa_form_page.php', $data);
	}

	public function saveNewDiagnosa() {
		$newDiagRecordNumber = $this->ModelDiagnosa->getNewDiagRecordNumber();
		$patient_mr = $this->input->post("patient_mr");
		$master_form_diagnosa = $this->input->post("master_form_diagnosa");
		$durasi_intervensi = $this->input->post("durasi_intervensi");
		$created_by = "USER_001";
		$created_dttm = date("Y-m-d H:i:s");

		$saveMasterDiagRecord = $this->ModelDiagnosa->saveMasterDiagRecord($newDiagRecordNumber, $master_form_diagnosa, $patient_mr, $created_by, $created_dttm);
		if ($saveMasterDiagRecord == true) {
			$selectedDiagnosa = $this->input->post("selectedDiagnosa");
			foreach ($selectedDiagnosa as $row) {
				$this->ModelDiagnosa->savechckbxDiagnosa($row, $newDiagRecordNumber, $created_by, $created_dttm);
			}

			$selectedIntervensi = $this->input->post("selectedIntervensi");
			foreach ($selectedIntervensi as $rowInt) {
				$this->ModelDiagnosa->savechckbxIntervensi($rowInt, $newDiagRecordNumber, $created_by, $created_dttm);
			}

			if ($master_form_diagnosa == "D0001") {
				$batuk = $this->input->post("batuk");
				$sputum = $this->input->post("sputum");
				$mengi = $this->input->post("mengi");
				$wheezing = $this->input->post("wheezing");
				$ronkhi = $this->input->post("ronkhi");
				$mekonium = $this->input->post("mekonium");
				$dispnea = $this->input->post("dispnea");
				$ortopnea = $this->input->post("ortopnea");
				$sulit_bicara = $this->input->post("sulit_bicara");
				$sianosis = $this->input->post("sianosis");
				$gelisah = $this->input->post("gelisah");
				$frekuensi_nafas = $this->input->post("frekuensi_nafas");
				$pola_nafas = $this->input->post("pola_nafas");
	
				$saveLuaranKeperawatan = $this->ModelDiagnosa->saveLuaranKeperawatand0001($newDiagRecordNumber, $durasi_intervensi, $batuk, $sputum, $mengi, $wheezing, $ronkhi, $mekonium, $dispnea, $ortopnea, $sulit_bicara, $sianosis, $gelisah, $frekuensi_nafas, $pola_nafas, $created_by, $created_dttm);
			} else {
				$batuk = $this->input->post("batuk");
				$sputum = $this->input->post("sputum");
				$mengi = $this->input->post("mengi");
				$wheezing = $this->input->post("wheezing");
				$ronkhi = $this->input->post("ronkhi");
				$mekonium = $this->input->post("mekonium");
				$dispnea = $this->input->post("dispnea");
				$ortopnea = $this->input->post("ortopnea");
				$sulit_bicara = $this->input->post("sulit_bicara");
				$sianosis = $this->input->post("sianosis");
				$gelisah = $this->input->post("gelisah");
				$frekuensi_nafas = $this->input->post("frekuensi_nafas");
				$pola_nafas = $this->input->post("pola_nafas");
	
				$saveLuaranKeperawatan = $this->ModelDiagnosa->saveLuaranKeperawatand0001($newDiagRecordNumber, $durasi_intervensi, $batuk, $sputum, $mengi, $wheezing, $ronkhi, $mekonium, $dispnea, $ortopnea, $sulit_bicara, $sianosis, $gelisah, $frekuensi_nafas, $pola_nafas, $created_by, $created_dttm);
			}

			
			if ($saveLuaranKeperawatan == true) {
				echo "success-save-all-record";
				$this->session->set_userdata('master_form_diag', $master_form_diagnosa);
				$this->session->userdata('master_form_diag');
				$this->session->set_userdata('new_diag_record_number', $newDiagRecordNumber);
				$this->session->userdata('new_diag_record_number');
			} else {
				echo "err-save-luaran-kep-record";
				return;	
			}
		} else {
			echo "err-save-master-diag-record";
			return;
		}
		
	}
}