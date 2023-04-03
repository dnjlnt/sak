<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Patient extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

    public function Patientinfo() {
        $mr_no = $this->uri->segment(3);

        if (strlen($mr_no) == "1" || strlen($mr_no) == 1) {
			$data['no_rm'] = "0000000".$mr_no;
		} else if (strlen($mr_no) == "2" || strlen($mr_no) == 2) {
			$data['no_rm'] = "000000".$mr_no;
		} else if (strlen($mr_no) == "3" || strlen($mr_no) == 3) {
			$data['no_rm'] = "00000".$mr_no;
		} else if (strlen($mr_no) == "4" || strlen($mr_no) == 4) {
			$data['no_rm'] = "0000".$mr_no;
		} else if (strlen($mr_no) == "5" || strlen($mr_no) == 5) {
			$data['no_rm'] = "000".$mr_no;
		} else if (strlen($mr_no) == "6" || strlen($mr_no) == 6) {
			$data['no_rm'] = "00".$mr_no;
		} else if (strlen($mr_no) == "7" || strlen($mr_no) == 7) {
			$data['no_rm'] = "0".$mr_no;
		} else {
			$data['no_rm'] = "".$mr_no;
		}

        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

		if ($url == "http://192.168.15.9:1026") {
			$prefmr = "02";
			$data['unit_display'] = "Ciputra Hospital Citra Garden City";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
		} else if ($url == "http://192.168.19.21:2300" || $url == "http://192.168.19.19") {
			$prefmr = "03";
			$data['unit_display'] = "Ciputra Mitra Hospital Banjarmasin";
			$urlTera = "http://192.168.19.19/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
		} else {
			$prefmr = "01";
			$data['unit_display'] = "Ciputra Hospital Citra Raya Tangerang";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
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
				if (strlen($mr_no) == "1" || strlen($mr_no) == 1) {
					$ext_patient_mr = "0000000";
				} else if (strlen($mr_no) == "2" || strlen($mr_no) == 2) {
					$ext_patient_mr = "000000";
				} else if (strlen($mr_no) == "3" || strlen($mr_no) == 3) {
					$ext_patient_mr = "00000";
				} else if (strlen($mr_no) == "4" || strlen($mr_no) == 4) {
					$ext_patient_mr = "0000";
				} else if (strlen($mr_no) == "5" || strlen($mr_no) == 5) {
					$ext_patient_mr = "000";
				} else if (strlen($mr_no) == "6" || strlen($mr_no) == 6) {
					$ext_patient_mr = "00";
				} else if (strlen($mr_no) == "7" || strlen($mr_no) == 7) {
					$ext_patient_mr = "0";
				} else {
					$ext_patient_mr = "";
				}

				$data['patient_mr'] = $ext_patient_mr.$mr_no;
				$data['patient_fullname'] = $response->data->name_real;
				$data['patient_dob'] = $response->data->tgl_lahir;

			} else {
				$data['patient_mr'] = "";
				$data['patient_fullname'] = "";
				$data['patient_dob'] = "";
			}
		}

		$data["rowdate"] = "";
		$no = 0;
		$getMasterDiagRecordByPatient = $this->ModelPatient->getMasterDiagRecordByPatient($mr_no);
		if ($getMasterDiagRecordByPatient !==  false) {
			foreach ($getMasterDiagRecordByPatient as $row) {
				$no++;
				$exp_createddttm = explode(" ", $row->created_dttm);
				$date = $exp_createddttm[0];
				$time = $exp_createddttm[1];

				$data["rowdate"] .= "<tr>
										<td style='width:50px;'>".$no.".</th>
										<td>
											<a href='".base_url()."patient/patientbasedondate/".$mr_no."/".$date."'>
												".date_indo($date)."
											</a>
										</th>
									 </tr>";
			}
		} else {
			$data["rowdate"] .= "";
		}
		$data["rowdate"] .= "";

		$this->load->view('patientdata/index.php', $data);
	}

	public function patientbasedondate() {
        $mr_no = $this->uri->segment(3);
		$date = $this->uri->segment(4);

        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

		if ($url == "http://192.168.15.9:1026") {
			$prefmr = "02";
			$data['unit_display'] = "Ciputra Hospital Citra Garden City";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
		} else if ($url == "http://192.168.19.21:2300" || $url == "http://192.168.19.19") {
			$prefmr = "03";
			$data['unit_display'] = "Ciputra Mitra Hospital Banjarmasin";
			$urlTera = "http://192.168.19.19/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
		} else {
			$prefmr = "01";
			$data['unit_display'] = "Ciputra Hospital Citra Raya Tangerang";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
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
				if (strlen($mr_no) == "1" || strlen($mr_no) == 1) {
					$ext_patient_mr = "0000000";
				} else if (strlen($mr_no) == "2" || strlen($mr_no) == 2) {
					$ext_patient_mr = "000000";
				} else if (strlen($mr_no) == "3" || strlen($mr_no) == 3) {
					$ext_patient_mr = "00000";
				} else if (strlen($mr_no) == "4" || strlen($mr_no) == 4) {
					$ext_patient_mr = "0000";
				} else if (strlen($mr_no) == "5" || strlen($mr_no) == 5) {
					$ext_patient_mr = "000";
				} else if (strlen($mr_no) == "6" || strlen($mr_no) == 6) {
					$ext_patient_mr = "00";
				} else if (strlen($mr_no) == "7" || strlen($mr_no) == 7) {
					$ext_patient_mr = "0";
				} else {
					$ext_patient_mr = "";
				}

				$data['patient_mr'] = $ext_patient_mr.$mr_no;
				$data['patient_fullname'] = $response->data->name_real;
				$data['patient_dob'] = $response->data->tgl_lahir;

			} else {
				$data['patient_mr'] = "";
				$data['patient_fullname'] = "";
				$data['patient_dob'] = "";
			}
		}

		$data["rowdiagnosa"] = "";
		$no = 0;
		$getDiagPatient = $this->ModelPatient->getDiagPatient($mr_no, $date);
		if ($getDiagPatient !==  false) {
			foreach ($getDiagPatient as $row) {
				$no++;
				$master_diag_record_id = $row->master_diagnosa_record_id;
				$master_form_diagnosa = $row->master_form_diagnosa;
				$exp_createddttm = explode(" ", $row->created_dttm);
				$date = $exp_createddttm[0];
				$time = $exp_createddttm[1];

				$data["rowdiagnosa"] .= "<tr>
											<td style='width:50px;'>".$no.".</td>
											<td>".$row->diagnosa_form_name."</td>
											<td>".$row->created_by."</td>
											<td>".date_indo($date)." ".$time."</td>
											<td>
												<button class='btn btn-sm btn-square btn-primary' onclick='diagnosaPreview(\"$master_diag_record_id\", \"$master_form_diagnosa\")' style='font-size:10px;'>
													Lihat Form Diagnosa
												</button>
												<a class='btn btn-sm btn-square btn-primary' href='".base_url()."patient/listintervensi/".$master_diag_record_id."/".$mr_no."' style='font-size:10px;'>
													Lihat Intervensi
												</a>
												<button class='btn btn-sm btn-square btn-warning' style='font-size:10px;'>
													Edit Diagnosa
												</button>
											</td>
										 </tr>";
			}
		} else {
			$data["rowdiagnosa"] .= "";
		}
		$data["rowdiagnosa"] .= "";

		$this->load->view('patientdata/patient_diag_basedondate_page.php', $data);
	}

	public function listintervensi() {
		$master_diag_record_id = $this->uri->segment(3);
		$mr_no = $this->uri->segment(4);

        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

		if ($url == "http://192.168.15.9:1026") {
			$prefmr = "02";
			$data['unit_display'] = "Ciputra Hospital Citra Garden City";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
		} else if ($url == "http://192.168.19.21:2300" || $url == "http://192.168.19.19") {
			$prefmr = "03";
			$data['unit_display'] = "Ciputra Mitra Hospital Banjarmasin";
			$urlTera = "http://192.168.19.19/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
		} else {
			$prefmr = "01";
			$data['unit_display'] = "Ciputra Hospital Citra Raya Tangerang";
			$urlTera = "http://192.168.15.15/api.php?mod=api&cmd=get_patient&no_rm=$mr_no&return_type=json";
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
				if (strlen($mr_no) == "1" || strlen($mr_no) == 1) {
					$ext_patient_mr = "0000000";
				} else if (strlen($mr_no) == "2" || strlen($mr_no) == 2) {
					$ext_patient_mr = "000000";
				} else if (strlen($mr_no) == "3" || strlen($mr_no) == 3) {
					$ext_patient_mr = "00000";
				} else if (strlen($mr_no) == "4" || strlen($mr_no) == 4) {
					$ext_patient_mr = "0000";
				} else if (strlen($mr_no) == "5" || strlen($mr_no) == 5) {
					$ext_patient_mr = "000";
				} else if (strlen($mr_no) == "6" || strlen($mr_no) == 6) {
					$ext_patient_mr = "00";
				} else if (strlen($mr_no) == "7" || strlen($mr_no) == 7) {
					$ext_patient_mr = "0";
				} else {
					$ext_patient_mr = "";
				}

				$data['patient_mr'] = $ext_patient_mr.$mr_no;
				$data['patient_fullname'] = $response->data->name_real;
				$data['patient_dob'] = $response->data->tgl_lahir;

			} else {
				$data['patient_mr'] = "";
				$data['patient_fullname'] = "";
				$data['patient_dob'] = "";
			}
		}

		$data["listintervensi"] = "";
		$no = 0;
		$getIntervensiPatient = $this->ModelPatient->getIntervensiPatient($master_diag_record_id);
		if ($getIntervensiPatient !== false) {
			foreach ($getIntervensiPatient as $recordIntervensi) {
				$no++;
				if ($recordIntervensi->intervensi_status == 0) {
					$int_status = "Intervensi Utama";
				} else {
					$int_status = "Intervensi Pendukung";
				}

				$exp_createddttm = explode(" ", $recordIntervensi->created_dttm);
				$date = $exp_createddttm[0];
				$time = $exp_createddttm[1];

				$data["listintervensi"] .= "<tr>
												<td>".$no.".</td>
												<td>".$recordIntervensi->intervensi_keperawatan_name."</td>
												<td>".$int_status."</td>
												<td>".$recordIntervensi->created_by."</td>
												<td>".date_indo($date)." ".$time."</td>
												<td>
													<button class='btn btn-sm btn-square btn-facebook' style='font-size:10px;'>
														<svg xmlns='http://www.w3.org/2000/svg' class='icon' width='20' height='20' viewBox='0 -3 20 35' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M14 3v4a1 1 0 0 0 1 1h4' /><path d='M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5' /><circle cx='16.5' cy='17.5' r='2.5' /><line x1='18.5' y1='19.5' x2='21' y2='22' /></svg>
														Lihat Form Intervensi
													</button>
													<button class='btn btn-sm btn-square btn-rss' style='font-size:10px;'>
														<svg xmlns='http://www.w3.org/2000/svg' class='icon' width='20' height='20' viewBox='0 -3 20 30' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3' /><path d='M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3' /><line x1='16' y1='5' x2='19' y2='8' /></svg>
														Edit Intervensi
													</button>
												</td>
											</tr>";
			}
		} else {
			$data["listintervensi"] .= "";
		}
		
		$this->load->view('patientdata/patient_list_intervensi_page.php', $data);
	}

	public function previewDiagnosa() {
        $master_diag_record_id = $this->uri->segment(3);
		$master_form_diagnosa = $this->uri->segment(4);
		
		if ($master_form_diagnosa == "D0001") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
                        
					}
					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}
			
			$this->load->view('patientdata/d0001_preview.php', $data);
		} else if ($master_form_diagnosa == "D0002") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0002_preview.php', $data);
		} else if ($master_form_diagnosa == "D0003") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0003_preview.php', $data);
		} else if ($master_form_diagnosa == "D0004") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0004_preview.php', $data);
		} else if ($master_form_diagnosa == "D0005") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0005_preview.php');
		} else if ($master_form_diagnosa == "D0006") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0006_preview.php');
		} else if ($master_form_diagnosa == "D0008") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0008_preview.php');
		} else if ($master_form_diagnosa == "D0009") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0009_preview.php');

		} else if ($master_form_diagnosa == "D0010") {

			$getLuaranKeperawatan = $this->ModelPatient->getLuaranKeperawatan($master_diag_record_id);
			$data['luaranKep'] = "<table class='table'>";
			if ($getLuaranKeperawatan !== false) {
				foreach ($getLuaranKeperawatan as $rowLuaranKeperawatan) {
					$data["int_duration"] = $rowLuaranKeperawatan->intervensi_durasi_name;

					if ($rowLuaranKeperawatan->batuk == "" || $rowLuaranKeperawatan->batuk == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->batuk == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->batuk == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Batuk</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sputum == "" || $rowLuaranKeperawatan->sputum == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sputum == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sputum == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sputum</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mengi == "" || $rowLuaranKeperawatan->mengi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mengi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mengi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mengi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->wheezing == "" || $rowLuaranKeperawatan->wheezing == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->wheezing == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->wheezing == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Wheezing</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ronkhi == "" || $rowLuaranKeperawatan->ronkhi == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ronkhi == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ronkhi == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ronkhi</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->mekonium == "" || $rowLuaranKeperawatan->mekonium == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->mekonium == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->mekonium == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Mekonium</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->dispnea == "" || $rowLuaranKeperawatan->dispnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->dispnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->dispnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Dispnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->ortopnea == "" || $rowLuaranKeperawatan->ortopnea == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->ortopnea == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->ortopnea == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Ortopnea</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sulitbicara == "" || $rowLuaranKeperawatan->sulitbicara == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sulitbicara == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sulitbicara == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sulit Bicara</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->sianosis == "" || $rowLuaranKeperawatan->sianosis == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->sianosis == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->sianosis == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Sianosis</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->gelisah == "" || $rowLuaranKeperawatan->gelisah == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->gelisah == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Meningkat (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Meningkat (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->gelisah == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Menurun (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Gelisah</td>
                                                    <td class='no-border' colspan='5'>: <b>Menurun (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->frekuensi_nafas == "" || $rowLuaranKeperawatan->frekuensi_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->frekuensi_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->frekuensi_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Frekuensi Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}

					if ($rowLuaranKeperawatan->pola_nafas == "" || $rowLuaranKeperawatan->pola_nafas == 0) {
						$data['luaranKep'] .= "";
					} else {
                        if ($rowLuaranKeperawatan->pola_nafas == "1") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Memburuk (1)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "2") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Memburuk (2)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "3") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Sedang (3)</b></td>
                                                   </tr>";
                        } else if ($rowLuaranKeperawatan->pola_nafas == "4") {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Cukup Membaik (4)</b></td>
                                                   </tr>";
                        } else {
                            $data['luaranKep'] .= "<tr>
                                                    <td class='no-border'>Pola Nafas</td>
                                                    <td class='no-border' colspan='5'>: <b>Membaik (5)</b></td>
                                                   </tr>";
                        }
					}
					
				}
				
			}
			$data['luaranKep'] .= "</table>";

			$data["intutama"] = "";
			$getIntKepUtama = $this->ModelDiagnosa->getIntKepUtama($master_form_diagnosa);
			if ($getIntKepUtama !== false) {
				foreach ($getIntKepUtama as $intKepUtama) {
					
				}
			} else {
				$data["intutama"] .= "";
			}

			$data["intpendukung"] = "";
			$getIntKepPendukung = $this->ModelDiagnosa->getIntKepPendukung($master_form_diagnosa);
			if ($getIntKepPendukung !== false) {
				foreach ($getIntKepPendukung as $intKepPendukung) {

				}
			} else {
				$data["intpendukung"] .= "";
			}

			$data["diagnosakeperawatan"] = "";
			$no = 0;
			$getDataDiagnosaPatient = $this->ModelPatient->getDataDiagnosaPatient($master_form_diagnosa);
			if ($getDataDiagnosaPatient !== false) {
				foreach ($getDataDiagnosaPatient as $rowDataDiagnosa) {
					$no++;

					if ($no == "1") {
						$data["diagnosakeperawatan"] .= "<b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					} else {
						$data["diagnosakeperawatan"] .= "<br><b>".$rowDataDiagnosa->diag_keperawatan_name."</b><br>";
					}
					

					$getRecordDiagnosaPatient = $this->ModelPatient->getRecordDiagnosaPatient($master_diag_record_id, $rowDataDiagnosa->diag_keperawatan_id);
					if ($getRecordDiagnosaPatient !== false) {
						foreach($getRecordDiagnosaPatient as $rowRecordDiagnosa) {
							$data["diagnosakeperawatan"] .= "<li>".$rowRecordDiagnosa->checkbox_diagnosa_keperawatan_name."</li>";
						}
					} else {
						$getSubDiagKep = $this->ModelDiagnosa->getSubDiagKeperawatan($rowDataDiagnosa->diag_keperawatan_id);
						if ($getSubDiagKep !==  false) {
							foreach ($getSubDiagKep as $subDiagKep) {
								$data["diagnosakeperawatan"] .= "".$subDiagKep->sub_diagnosa_keperawatan_name."<br>";

								$getRecordDiagnosaPatientBySubDiagnosa = $this->ModelPatient->getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $subDiagKep->sub_diagnosa_keperawatan_id);
								if ($getRecordDiagnosaPatientBySubDiagnosa !== false) {
									foreach ($getRecordDiagnosaPatientBySubDiagnosa as $rowSub) {
										$data["diagnosakeperawatan"] .= "<li>".$rowSub->checkbox_diagnosa_keperawatan_name."</li>";
									}
								}
							}
						}
					}

				}
			} else {
				$data["diagnosakeperawatan"] .= "";
			}

			$this->load->view('patientdata/d0010_preview.php');

		} else if ($master_form_diagnosa == "D0011") {

		} else if ($master_form_diagnosa == "D0012") {

		} else if ($master_form_diagnosa == "D0013") {

		} else if ($master_form_diagnosa == "D0014") {

		} else if ($master_form_diagnosa == "D0015") {

		} else if ($master_form_diagnosa == "D0016") {

		} else if ($master_form_diagnosa == "D0017") {

		} else if ($master_form_diagnosa == "D0018") {

		} else if ($master_form_diagnosa == "D0019") {

		} else if ($master_form_diagnosa == "D0020") {

		}
	}
}