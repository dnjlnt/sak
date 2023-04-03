<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require './vendor/autoload.php';

class D0065 extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library("pdfgenerator");
    }
	
	public function index() {
        $masterFormDiag = $this->uri->segment(1);
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

		$data['totalGejalaMayor'] = $this->ModelDiagnosa->getTotalGejalaMayor($masterFormDiag);

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
									if ($diagnosaKeperawatan->diag_keperawatan_name == "Gejala dan Tanda Mayor;" || $diagnosaKeperawatan->diag_keperawatan_name == "Gejala dan tanda Mayor;") {
										$data["dataDiagnosaKeperawatan"] .= "<label class='form-check'>
																				<input class='form-check-input' name='diagnosa_record_gejala_mayor' id='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' value='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' type='checkbox'>
																				<span class='form-check-label'>".$chxbxDiagKep->checkbox_diagnosa_keperawatan_name." Mayor</span>
																			 </label>";
									} else {
										$data["dataDiagnosaKeperawatan"] .= "<label class='form-check'>
																				<input class='form-check-input' name='diagnosa_record' id='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' value='".$chxbxDiagKep->checkbox_diagnosa_keperawatan_id."' type='checkbox'>
																				<span class='form-check-label'>".$chxbxDiagKep->checkbox_diagnosa_keperawatan_name." Minor</span>
																			 </label>";
									}
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
										<input class='form-check-input' type='checkbox' name='intervensi_keperawatan_utama' id='".$intKepUtama->intervensi_keperawatan_id."' value='".$intKepUtama->intervensi_keperawatan_id."'>
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
											<input class='form-check-input' type='checkbox' name='intervensi_keperawatan_pendukung' id='".$intKepPendukung->intervensi_keperawatan_id."' value='".$intKepPendukung->intervensi_keperawatan_id."'>
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

		$this->load->view('diagnosa/form/d0065_form.php', $data);
	}

	public function saveNewDiagnosa() {
		$newDiagRecordNumber = $this->ModelDiagnosa->getNewDiagRecordNumber();
		$patient_mr = "00000002";
		$selectedDiagnosaGejalaMayor = $this->input->post("selectedDiagnosaGejalaMayor");
		$selectedDiagnosa = $this->input->post("selectedDiagnosa");
		$selectedIntervensiUtama = $this->input->post("selectedIntervensiUtama");
		$selectedIntervensiPendukung = $this->input->post("selectedIntervensiPendukung");
		$master_form_diagnosa = $this->input->post("master_form_diagnosa");
		$durasi_intervensi = $this->input->post("durasi_intervensi");
		$created_by = "USER_001";
		$created_dttm = date("Y-m-d H:i:s");

		$saveMasterDiagRecord = $this->ModelDiagnosa->saveMasterDiagRecord($newDiagRecordNumber, $master_form_diagnosa, $patient_mr, $created_by, $created_dttm);
		if ($saveMasterDiagRecord == true) {
			foreach ($selectedDiagnosaGejalaMayor as $rowMayor) {
				$this->ModelDiagnosa->savechckbxDiagnosa($rowMayor, $newDiagRecordNumber, $created_by, $created_dttm);
			}
			
			foreach ($selectedDiagnosa as $row) {
				$this->ModelDiagnosa->savechckbxDiagnosa($row, $newDiagRecordNumber, $created_by, $created_dttm);
			}

			foreach ($selectedIntervensiUtama as $rowIntUtama) {
				$this->ModelDiagnosa->savechckbxIntervensi($rowIntUtama, $newDiagRecordNumber, $created_by, $created_dttm);
			}

			foreach ($selectedIntervensiPendukung as $rowIntPendukung) {
				$this->ModelDiagnosa->savechckbxIntervensi($rowIntPendukung, $newDiagRecordNumber, $created_by, $created_dttm);
			}

			$fungsi_kognitif = $this->input->post("fungsi_kognitif");
            $tingkat_kesadaran = $this->input->post("tingkat_kesadaran");
            $aktivitas_psikomotorik = $this->input->post("aktivitas_psikomotorik");
            $motivasi = $this->input->post("motivasi");
            $memori_jangka_pendek = $this->input->post("memori_jangka_pendek");
            $memori_jangka_panjang = $this->input->post("memori_jangka_panjang");
            $halusinasi = $this->input->post("halusinasi");
            $gelisah = $this->input->post("gelisah");
            $interpretasi = $this->input->post("interpretasi");
            $fungsi_sosial = $this->input->post("fungsi_sosial");
            $respon_stimulus = $this->input->post("respon_stimulus");
            $persepsi = $this->input->post("persepsi");
            $fungsi_otak = $this->input->post("fungsi_otak");

            $saveLuaranKeperawatan = $this->ModelDiagnosa->saveLuaranKeperawatand0065($newDiagRecordNumber, $durasi_intervensi, $fungsi_kognitif, $tingkat_kesadaran, $aktivitas_psikomotorik, $motivasi, $memori_jangka_pendek, $memori_jangka_panjang, $halusinasi, $gelisah, $interpretasi, $fungsi_sosial, $respon_stimulus, $persepsi, $fungsi_otak, $created_by, $created_dttm);
			
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