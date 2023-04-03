<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class ModelDiagnosa extends CI_Model {
		public function getMasterDiagnosa() {
			$sql = "select * from t_m_diagnosa where master_diagnosa_status = '0'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

        public function getFormDiagnosa($masterDiag) {
			$sql = "select * from t_m_diagnosa_form where diagnosa_form_category = '".$masterDiag."' and diagnosa_form_status = '0'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

        public function getNameDiag($masterDiag) {
            $sql = "select master_diagnosa_name from t_m_diagnosa where master_diagnosa_id = '".$masterDiag."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$rows = $query->row();
                $master_diagnosa_name = $rows->master_diagnosa_name;

                return $master_diagnosa_name;
			} else {
				return false;
			}
		}

        public function getDiagnosaKeperawatan($masterFormDiag) {
            $sql = "select * from t_diagnosa_keperawatan where diagnosa_form_id = '".$masterFormDiag."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

        public function getSubDiagKeperawatan($diag_keperawatan_id) {
            $sql = "select * from t_sub_diagnosa_keperawatan where diag_keperawatan_id = '".$diag_keperawatan_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

        public function getChckbxDiagKep($diag_keperawatan_id) {
            $sql = "select * from t_checkbox_diagnosa_keperawatan where sub_diagnosa_keperawatan_id = '".$diag_keperawatan_id."';";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getIntKepUtama($masterFormDiag) {
            $sql = "select * from t_intervensi_keperawatan where diagnosa_form_id = '".$masterFormDiag."' and intervensi_status = '0'";
			// echo $sql;
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getIntKepPendukung($masterFormDiag) {
            $sql = "select * from t_intervensi_keperawatan where diagnosa_form_id = '".$masterFormDiag."' and intervensi_status = '1'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getItemLuaranKeperawatan($masterFormDiag) {
            $sql = "select * from t_luaran_keperawatan where diagnosa_form_id = '".$masterFormDiag."' and luaran_keperawatan_status = '0'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getIntDurasi() {
            $sql = "select * from t_master_durasi_intervensi";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getNewDiagRecordNumber() {
            $sql = "SELECT max(master_diagnosa_record_id) as maxID FROM t_master_diagnosa_record";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$rows	= $query->row();
				$maxID  = $rows->maxID;
				if ($maxID == "") {
					$getNumberID = "0000";
				} else {
					$getNumberID = (int) substr($maxID, 7, 4);
					$getNumberID = $getNumberID + 1;
				}

				$code = "MRDIAG_";
				$newDiagNumber = $code . sprintf("%04s", $getNumberID);

				return $newDiagNumber;
			} else {
				return false;
			}
		}

		public function saveMasterDiagRecord($newDiagRecordNumber, $master_form_diagnosa, $patient_mr,  $created_by, $created_dttm) {
			$sql = "insert into t_master_diagnosa_record (master_diagnosa_record_id, master_form_diagnosa, patient_mr, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$master_form_diagnosa."', '".$patient_mr."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0001($newDiagRecordNumber, $durasi_intervensi, $batuk, $sputum, $mengi, $wheezing, $ronkhi, $mekonium, $dispnea, $ortopnea, $sulit_bicara, $sianosis, $gelisah, $frekuensi_nafas, $pola_nafas, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0001_record (diag_master_record_id, intervensi_duration, batuk, sputum, mengi, 
					wheezing, ronkhi, mekonium, dispnea, ortopnea, sulitbicara, sianosis, gelisah, frekuensi_nafas, pola_nafas, 
					created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$batuk."', '".$sputum."', 
					'".$mengi."', '".$wheezing."', '".$ronkhi."', '".$mekonium."', '".$dispnea."', '".$ortopnea."', '".$sulit_bicara."', 
					'".$sianosis."', '".$gelisah."', '".$frekuensi_nafas."', '".$pola_nafas."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0002($newDiagRecordNumber, $durasi_intervensi, $sinkron_bantuan_ventilator, $otot_bantu_nafas, $gasping, $nafas_dangkal, $agitasi, $lelah, $perasaan_kuatir, $fokus_pernafasan, $nafas_paradoks_abdominal, $diaforesis, $frekuensi_nafas, $nilai_gas_darah, $upaya_napas, $auskultasi_suara, $warna_kulit, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0002_record (diag_master_record_id, intervensi_duration, sinkron_bantuan_ventilator, 
					otot_bantu_nafas, gasping, nafas_dangkal, agitasi, lelah, perasaan_kuatir, fokus_pernafasan, nafas_paradoks, 
					diaforesis, frekuensi_nafas, nilai_gas_darah, upaya_nafas, auskultasi, warna_kulit, created_by, created_dttm) 
					values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$sinkron_bantuan_ventilator."', '".$otot_bantu_nafas."', 
					'".$gasping."', '".$nafas_dangkal."', '".$agitasi."', '".$lelah."', '".$perasaan_kuatir."', '".$fokus_pernafasan."', 
					'".$nafas_paradoks_abdominal."', '".$diaforesis."', '".$frekuensi_nafas."', '".$nilai_gas_darah."', '".$upaya_napas."', 
					'".$auskultasi_suara."', '".$warna_kulit."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0003($newDiagRecordNumber, $durasi_intervensi, $tingkat_kesadaran, $dispnea, $bunyi_nafas_tambahan, $pusing, $penglihatan_kabur, $diaforesis, $gelisah, $nafas_cuping_hidung, $pco2, $po2, $takikardia, $ph_arteri, $sianosis, $pola_nafas, $warna_kulit, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0003_record (diag_master_record_id, intervensi_duration, tingkat_kesadaran, dispnea, 
					bunyi_nafas_tambahan, pusing, penglihatan_kabur, diaforesis, gelisah, nafas_cuping_hidung, pco2, po2, takikardia, 
					ph_arteri, sianosis, pola_nafas, warna_kulit, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$tingkat_kesadaran."', '".$dispnea."', '".$bunyi_nafas_tambahan."', '".$pusing."', 
					'".$penglihatan_kabur."', '".$diaforesis."', '".$gelisah."', '".$nafas_cuping_hidung."', '".$pco2."', '".$po2."', 
					'".$takikardia."', '".$ph_arteri."', '".$sianosis."', '".$pola_nafas."', '".$warna_kulit."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0004($newDiagRecordNumber, $durasi_intervensi, $volume_tidal, $dispnea, $otot_bantu_nafas, $gelisah, $pco2, $po2, $so2, $takikardia, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0004_record (diag_master_record_id, intervensi_duration, volume_tidal, dispnea, 
					otot_bantu_nafas, gelisah, pco2, po2, so2, takikardia, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$volume_tidal."', '".$dispnea."', '".$otot_bantu_nafas."', '".$gelisah."', '".$pco2."', 
					'".$po2."', '".$so2."', '".$takikardia."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0005($newDiagRecordNumber, $durasi_intervensi, $ventilasi_semenit, $kapasitas_vital, $diameter_throraks, $anterior, $tekanan_ekspirasi, $tekanan_inspirasi, $dispnea, $otot_bantu_napas, $fase_ekspirasi, $ortopnea, $pernapasan_pursed, $frekuensi_nafas, $kedalaman_nafas, $ekskursi_dada, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0005_record (diag_master_record_id, intervensi_duration, ventilasi_semenit, kapasitas_vital, 
					diameter_throraks, anterior, tekanan_ekspirasi, tekanan_inspirasi, dispnea, otot_bantu_napas, fase_ekspirasi, ortopnea, 
					pernapasan_pursed, frekuensi_nafas, kedalaman_nafas, ekskursi_dada, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$ventilasi_semenit."', '".$kapasitas_vital."', 
					'".$diameter_throraks."', '".$anterior."', '".$tekanan_ekspirasi."', '".$tekanan_inspirasi."', '".$dispnea."', 
					'".$otot_bantu_napas."', '".$fase_ekspirasi."', '".$ortopnea."', '".$pernapasan_pursed."', '".$frekuensi_nafas."', 
					'".$kedalaman_nafas."', '".$ekskursi_dada."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0006($newDiagRecordNumber, $durasi_intervensi, $tingkat_kesadaran, $kemampuan_menelan, $kebersihan_mulut, $dispnea, $kelemahan_otot, $akumulasi_sekret, $wheezing, $batuk, $otot_asesoris, $gelisah, $frekuensi_nafas, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0006_record (diag_master_record_id, intervensi_duration, tingkat_kesadaran, 
					kemampuan_menelan, kebersihan_mulut, dispnea, kelemahan_otot, akumulasi_sekret, wheezing, batuk, otot_asesoris, gelisah, 
					frekuensi_nafas, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$tingkat_kesadaran."', '".$kemampuan_menelan."', '".$kebersihan_mulut."', '".$dispnea."', '".$kelemahan_otot."', 
					'".$akumulasi_sekret."', '".$wheezing."', '".$batuk."', '".$otot_asesoris."', '".$gelisah."', '".$frekuensi_nafas."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0007($newDiagRecordNumber, $durasi_intervensi, $tingkat_kesadaran, $frekuensi_nadi, $tekanan_darah, $frekuensi_napas, $suhu_tubuh, $saturasi_oksigen, $ekg_aritmia, $etco2, $produksi_urine, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0007_record (diag_master_record_id, intervensi_duration, tingkat_kesadaran, frekuensi_nadi, 
					tekanan_darah, frekuensi_napas, suhu_tubuh, saturasi_oksigen, ekg_aritmia, etco2, produksi_urine, created_by, created_dttm) 
					values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$tingkat_kesadaran."', '".$frekuensi_nadi."', 
					'".$tekanan_darah."', '".$frekuensi_napas."', '".$suhu_tubuh."', '".$saturasi_oksigen."', '".$ekg_aritmia."', '".$etco2."', 
					'".$produksi_urine."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0008($newDiagRecordNumber, $durasi_intervensi, $nadi_perifer, $ejection_fraction, $cardiac_index, $lvswi, $svi, $palpitasi, $bradikardia, $takikardia, $ekg_aritmia, $lelah, $edema, $distensi_vena_jugularis, $dispnea, $olgouria, $sianosis, $pnd, $ortopnea, $batuk, $suara_jantung_s3, $suara_jantung_s4, $murmur_jantung, $berat_badan, $hepatomegali, $pvr, $svr, $tekanan_darah, $crt, $pawp, $cvp, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0008_record (diag_master_record_id, intervensi_duration, nadi_perifer, ejection_fraction, 
					cardiac_index, lvswi, svi, palpitasi, bradikardia, takikardia, ekg_aritmia, lelah, edema, distensi_vena_jugularis, dispnea, 
					olgouria, sianosis, pnd, ortopnea, batuk, suara_jantung_s3, suara_jantung_s4, murmur_jantung, berat_badan, hepatomegali, pvr, 
					svr, tekanan_darah, crt, pawp, cvp, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$nadi_perifer."', '".$ejection_fraction."', '".$cardiac_index."', '".$lvswi."', '".$svi."', '".$palpitasi."', 
					'".$bradikardia."', '".$takikardia."', '".$ekg_aritmia."', '".$lelah."', '".$edema."', '".$distensi_vena_jugularis."', 
					'".$dispnea."', '".$olgouria."', '".$sianosis."', '".$pnd."', '".$ortopnea."', '".$batuk."', '".$suara_jantung_s3."', 
					'".$suara_jantung_s4."', '".$murmur_jantung."', '".$berat_badan."', '".$hepatomegali."', '".$pvr."', '".$svr."',  
					'".$tekanan_darah."', '".$pawp."', '".$cvp."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0009($newDiagRecordNumber, $durasi_intervensi, $denyut_nadi_perifer, $penyembuhan_luka, $sensasi, $warna_kulit_pucat, $edema_perifer, $nyeri_ekstremitas, $parastesia, $kelemahan_otot, $bruit_femoralis, $nekrosis, $pengisian_kapiler, $akral, $turgor_kulit, $tekanan_darah_sistolik, $tekanan_darah_diastolik, $tekanan_arteri, $indeks_aklebrakhial, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0009_record (diag_master_record_id, intervensi_duration, denyut_nadi_perifer, 
					penyembuhan_luka, sensasi, warna_kulit_pucat, edema_perifer, nyeri_ekstremitas, parastesia, kelemahan_otot, bruit_femoralis, 
					nekrosis, pengisian_kapiler, akral, turgor_kulit, tekanan_darah_sistolik, tekanan_darah_diastolik, tekanan_arteri, 
					indeks_aklebrakhial, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$denyut_nadi_perifer."', '".$penyembuhan_luka."', '".$sensasi."', '".$warna_kulit_pucat."', '".$edema_perifer."', 
					'".$nyeri_ekstremitas."', '".$parastesia."', '".$kelemahan_otot."', '".$bruit_femoralis."', '".$nekrosis."', 
					'".$pengisian_kapiler."', '".$akral."', '".$turgor_kulit."', '".$tekanan_darah_sistolik."', '".$tekanan_darah_diastolik."', 
					'".$tekanan_arteri."', '".$indeks_aklebrakhial."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0010($newDiagRecordNumber, $durasi_intervensi, $denyut_nadi_perifer, $penyembuhan_luka, $sensasi, $warna_kulit_pucat, $edema_perifer, $nyeri_ekstremitas, $parastesia, $kelemahan_otot, $bruit_femoralis, $nekrosis, $pengisian_kapiler, $akral, $turgor_kulit, $tekanan_darah_sistolik, $tekanan_darah_diastolik, $tekanan_arteri, $indeks_aklebrakhial, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0010_record (diag_master_record_id, intervensi_duration, denyut_nadi_perifer, 
					penyembuhan_luka, sensasi, warna_kulit_pucat, edema_perifer, nyeri_ekstremitas, parastesia, kelemahan_otot, bruit_femoralis, 
					nekrosis, pengisian_kapiler, akral, turgor_kulit, tekanan_darah_sistolik, tekanan_darah_diastolik, tekanan_arteri, 
					indeks_aklebrakhial, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$denyut_nadi_perifer."', '".$penyembuhan_luka."', '".$sensasi."', '".$warna_kulit_pucat."', '".$edema_perifer."', 
					'".$nyeri_ekstremitas."', '".$parastesia."', '".$kelemahan_otot."', '".$bruit_femoralis."', '".$nekrosis."', 
					'".$pengisian_kapiler."', '".$akral."', '".$turgor_kulit."', '".$tekanan_darah_sistolik."', '".$tekanan_darah_diastolik."', 
					'".$tekanan_arteri."', '".$indeks_aklebrakhial."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0011($newDiagRecordNumber, $durasi_intervensi, $kekuatan_nadi_perifer, $ejection_fraction, $cardiac_index, $lvswi, $svi, $palpitasi, $bradikardia, $takikardia, $ekg_aritmia, $lelah, $edema, $distensi_vena_jugularis, $dispnea, $olgouria, $pucat, $pnd, $ortopnea, $batuk, $suara_jantung_s3, $suara_jantung_s4, $murmur_jantung, $berat_badan, $hepatomegali, $pvr, $svr, $tekanan_darah, $crt, $pawp, $cvp, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0011_record (diag_master_record_id, intervensi_duration, kekuatan_nadi_perifer, 
					ejection_fraction, cardiac_index, lvswi, svi, palpitasi, bradikardia, takikardia, ekg_aritmia, lelah, edema, 
					distensi_vena_jugularis, dispnea, olgouria, pucat, pnd, ortopnea, batuk, suara_jantung_s3, suara_jantung_s4, murmur_jantung, 
					berat_badan, hepatomegali, pvr, svr, tekanan_darah, crt, pawp, cvp, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$kekuatan_nadi_perifer."', '".$ejection_fraction."', 
					'".$cardiac_index."', '".$lvswi."', '".$svi."', '".$palpitasi."', '".$bradikardia."', '".$takikardia."', '".$ekg_aritmia."', 
					'".$lelah."', '".$edema."', '".$distensi_vena_jugularis."', '".$dispnea."', '".$olgouria."', '".$pucat."', '".$pnd."', 
					'".$ortopnea."', '".$batuk."', '".$suara_jantung_s3."', '".$suara_jantung_s4."', '".$murmur_jantung."', '".$berat_badan."', 
					'".$hepatomegali."', '".$pvr."', '".$svr."', '".$tekanan_darah."', '".$pawp."', '".$cvp."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0012($newDiagRecordNumber, $durasi_intervensi, $membran_mukosa_lembab, $kelembaban_kulit, $kognitif, $hemoptisis, $hematemesis, $hematuria, $pendarahan_anus, $distensi_abdomen, $pendarahan_pervagina, $hemoglobin, $hematokrit, $tekanan_darah, $frekuensi_nadi, $suhu_tubuh, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0012_record (diag_master_record_id, intervensi_duration, membran_mukosa_lembab, 
					kelembaban_kulit, kognitif, hemoptisis, hematemesis, hematuria, pendarahan_anus, distensi_abdomen, pendarahan_pervagina, 
					hemoglobin, hematokrit, tekanan_darah, frekuensi_nadi, suhu_tubuh, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$membran_mukosa_lembab."', '".$kelembaban_kulit."', '".$kognitif."', '".$hemoptisis."', 
					'".$hematemesis."', '".$hematuria."', '".$pendarahan_anus."', '".$distensi_abdomen."', '".$pendarahan_pervagina."', 
					'".$hemoglobin."', '".$hematokrit."', '".$tekanan_darah."', '".$frekuensi_nadi."', '".$suhu_tubuh."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0013($newDiagRecordNumber, $durasi_intervensi, $nafsu_makan, $mual, $muntah, $nyeri_abdomen, $asites, $konstipasi, $diare, $bising_usus, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0013_record (diag_master_record_id, intervensi_duration, nafsu_makan, mual, muntah, 
					nyeri_abdomen, asites, konstipasi, diare, bising_usus, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$nafsu_makan."', '".$mual."', '".$muntah."', '".$nyeri_abdomen."', '".$asites."', 
					'".$konstipasi."', '".$diare."', '".$bising_usus."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0014($newDiagRecordNumber, $durasi_intervensi, $ekg_aritmia, $nyeri_dada, $diaforesis, $mual, $muntah, $arteri_apikal, $tekanan_arteri, $takikardia, $bradikardia, $denyut_nadi_radial, $tekanan_darah_fraksi_ejeksi, $tekanan_baji_arteri_pulmonal, $cardiac_index, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0014_record (diag_master_record_id, intervensi_duration, ekg_aritmia, nyeri_dada, 
					diaforesis, mual, muntah, arteri_apikal, tekanan_arteri, takikardia, bradikardia, denyut_nadi_radial, 
					tekanan_darah_fraksi_ejeksi, tekanan_baji_arteri_pulmonal, cardiac_index, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$ekg_aritmia."', '".$nyeri_dada."', '".$diaforesis."', '".$mual."', 
					'".$muntah."', '".$arteri_apikal."', '".$tekanan_arteri."', '".$takikardia."', '".$bradikardia."', '".$denyut_nadi_radial."', 
					'".$tekanan_darah_fraksi_ejeksi."', '".$tekanan_baji_arteri_pulmonal."', '".$cardiac_index."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0015($newDiagRecordNumber, $durasi_intervensi, $denyut_nadi_perifer, $penyembuhan_luka, $sensasi, $warna_kulit_pucat, $edema_perifer, $nyeri_ekstremitas, $parastesia, $kelemahan_otot, $bruit_femoralis, $nekrosis, $pengisian_kapiler, $akral, $turgor_kulit, $tekanan_darah_sistolik, $tekanan_darah_diastolik, $tekanan_arteri, $indeks_aklebrakhial, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0015_record (diag_master_record_id, intervensi_duration, denyut_nadi_perifer, 
					penyembuhan_luka, sensasi, warna_kulit_pucat, edema_perifer, nyeri_ekstremitas, parastesia, kelemahan_otot, bruit_femoralis, 
					nekrosis, pengisian_kapiler, akral, turgor_kulit, tekanan_darah_sistolik, tekanan_darah_diastolik, tekanan_arteri, 
					indeks_aklebrakhial, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$denyut_nadi_perifer."', '".$penyembuhan_luka."', '".$sensasi."', '".$warna_kulit_pucat."', '".$edema_perifer."', 
					'".$nyeri_ekstremitas."', '".$parastesia."', '".$kelemahan_otot."', '".$bruit_femoralis."', '".$nekrosis."', 
					'".$pengisian_kapiler."', '".$akral."', '".$turgor_kulit."', '".$tekanan_darah_sistolik."', '".$tekanan_darah_diastolik."', 
					'".$tekanan_arteri."', '".$indeks_aklebrakhial."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0016($newDiagRecordNumber, $durasi_intervensi, $jumlah_urine, $nyeri_abdomen, $mual, $muntah, $distensi_abdomen, $tekanan_arteri, $kadar_urea_nitrogen_darah, $kadar_kreatinin_plasma, $tekanan_darah_sistolik, $tekanan_darah_diastolik, $kadar_elektrolit, $keseimbangan_asam_basa, $bising_usus, $fungsi_hati, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0016_record (diag_master_record_id, intervensi_duration, jumlah_urine, nyeri_abdomen, 
					mual, muntah, distensi_abdomen, tekanan_arteri, kadar_urea_nitrogen_darah, kadar_kreatinin_plasma, tekanan_darah_sistolik, 
					tekanan_darah_diastolik, kadar_elektrolit, keseimbangan_asam_basa, bising_usus, fungsi_hati, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$jumlah_urine."', '".$nyeri_abdomen."', '".$mual."', '".$muntah."', 
					'".$distensi_abdomen."', '".$tekanan_arteri."', '".$kadar_urea_nitrogen_darah."', '".$kadar_kreatinin_plasma."', 
					'".$tekanan_darah_sistolik."', '".$tekanan_darah_diastolik."', '".$kadar_elektrolit."', '".$keseimbangan_asam_basa."', 
					'".$bising_usus."', '".$fungsi_hati."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0017($newDiagRecordNumber, $durasi_intervensi, $tingkat_kesadaran, $kognitif, $tekanan_intra_kranial, $sakit_kepala, $gelisah, $kecemasan, $agitasi, $demam, $tekanan_darah, $kesadaran, $tekanan_darah_sistolik, $tekanan_darah_diastolik, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0017_record (diag_master_record_id, intervensi_duration, tingkat_kesadaran, kognitif, 
					tekanan_intra_kranial, sakit_kepala, gelisah, kecemasan, agitasi, demam, tekanan_darah, kesadaran, tekanan_darah_sistolik,
					tekanan_darah_diastolik, refleks_sadar, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$tingkat_kesadaran."', '".$kognitif."', '".$tekanan_intra_kranial."', '".$sakit_kepala."', '".$gelisah."', '".$kecemasan."', 
					'".$agitasi."', '".$demam."', '".$tekanan_darah."', '".$kesadaran."', '".$tekanan_darah_sistolik."', 
					'".$tekanan_darah_diastolik."', '".$refleks_sadar."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0018($newDiagRecordNumber, $durasi_intervensi, $berat_badan, $tebal_lipatan_kulit, $index_massa_tubuh, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0018_record (diag_master_record_id, intervensi_duration, berat_badan, tebal_lipatan_kulit, 
					index_massa_tubuh, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$berat_badan."', 
					'".$tebal_lipatan_kulit."', '".$index_massa_tubuh."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0019($newDiagRecordNumber, $durasi_intervensi, $porsi_makan, $kekuatan_otot_pengunyah, $kekuatan_otot_menelan, $serum_albumin, $vebalisasi, $pengetahuan_makanan_sehat, $pengetahuan_asupan_nutrisi, $penyiapan_makanan_aman, $penyiapan_minuman_aman, $sikap_tujuan_kesehatan, $perasaan_cepat_kenyang, $nyeri_abdomen, $sariawan, $rambut_rontok, $diare, $berat_badan, $index_massa_tubuh, $frekuensi_makan, $nafsu_makan, $bising_usus, $tebal_lipatan_kulit, $membran_mukosa, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0019_record (diag_master_record_id, intervensi_duration, porsi_makan, 
					kekuatan_otot_pengunyah, kekuatan_otot_menelan, serum_albumin, vebalisasi, pengetahuan_makanan_sehat, 
					pengetahuan_asupan_nutrisi, penyiapan_makanan_aman, penyiapan_minuman_aman, sikap_tujuan_kesehatan, perasaan_cepat_kenyang, 
					nyeri_abdomen, sariawan, rambut_rontok, diare, berat_badan, index_massa_tubuh, frekuensi_makan, nafsu_makan, bising_usus, 
					tebal_lipatan_kulit, membran_mukosa, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$porsi_makan."', '".$kekuatan_otot_pengunyah."', '".$kekuatan_otot_menelan."', '".$serum_albumin."', '".$vebalisasi."', 
					'".$pengetahuan_makanan_sehat."', '".$pengetahuan_asupan_nutrisi."', '".$penyiapan_makanan_aman."', 
					'".$penyiapan_minuman_aman."', '".$sikap_tujuan_kesehatan."', '".$perasaan_cepat_kenyang."', '".$nyeri_abdomen."', 
					'".$sariawan."', '".$rambut_rontok."', '".$diare."', '".$berat_badan."', '".$index_massa_tubuh."', '".$frekuensi_makan."', 
					'".$nafsu_makan."', '".$bising_usus."', '".$tebal_lipatan_kulit."', '".$membran_mukosa."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0020($newDiagRecordNumber, $durasi_intervensi, $kontrol_pengeluaran_feses, $keluhan_defekasi, $mengejan, $distensi_abdomen, $teraba_massa, $urgency, $nyeri_abdomen, $kram_abdomen, $konsistensi_feses, $frekuensi_defekasi, $peristaltik_usus, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0020_record (diag_master_record_id, intervensi_duration, kontrol_pengeluaran_feses, 
					keluhan_defekasi, mengejan, distensi_abdomen, teraba_massa, urgency, nyeri_abdomen, kram_abdomen, konsistensi_feses, 
					frekuensi_defekasi, peristaltik_usus, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$kontrol_pengeluaran_feses."', '".$keluhan_defekasi."', '".$mengejan."', '".$distensi_abdomen."', '".$teraba_massa."', 
					'".$urgency."', '".$nyeri_abdomen."', '".$kram_abdomen."', '".$konsistensi_feses."', '".$frekuensi_defekasi."', 
					'".$peristaltik_usus."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0021($newDiagRecordNumber, $durasi_intervensi, $nyeri, $kram_abdomen, $mual, $muntah, $regurgitasi, $distensi_abdomen, $diare, $suara_peristaltik, $pengosongan_lambung, $flatus, $konsistensi_feses, $frekuensi_defekasi, $peristaltik_usus, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0021_record (diag_master_record_id, intervensi_duration, nyeri, kram_abdomen, mual, muntah, 
					regurgitasi, distensi_abdomen, diare, suara_peristaltik, pengosongan_lambung, flatus, konsistensi_feses, frekuensi_defekasi, 
					peristaltik_usus, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$nyeri."', 
					'".$kram_abdomen."', '".$mual."', '".$muntah."', '".$regurgitasi."', '".$distensi_abdomen."', '".$diare."', 
					'".$suara_peristaltik."', '".$pengosongan_lambung."', '".$flatus."', '".$konsistensi_feses."', '".$frekuensi_defekasi."', 
					'".$peristaltik_usus."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0022($newDiagRecordNumber, $durasi_intervensi, $asupan_cairan, $keluaran_urine, $kelembaban_membran_mukrosa, $asupan_makanan, $edema, $dehidrasi, $asites, $konfusi, $tekanan_darah, $denyut_nadi_radial, $tekanan_arteri, $membran_mukosa, $mata_cekung, $turgor_kulit, $berat_badan, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0022_record (diag_master_record_id, intervensi_duration, asupan_cairan, keluaran_urine, 
					kelembaban_membran_mukrosa, asupan_makanan, edema, dehidrasi, asites, konfusi, tekanan_darah, denyut_nadi_radial, 
					tekanan_arteri, membran_mukosa, mata_cekung, turgor_kulit, berat_badan, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$asupan_cairan."', '".$keluaran_urine."', 
					'".$kelembaban_membran_mukrosa."', '".$asupan_makanan."', '".$edema."', '".$dehidrasi."', '".$asites."', '".$konfusi."', 
					'".$tekanan_darah."', '".$denyut_nadi_radial."', '".$tekanan_arteri."', '".$membran_mukosa."', '".$mata_cekung."', 
					'".$turgor_kulit."', '".$berat_badan."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0023($newDiagRecordNumber, $durasi_intervensi, $kekuatan_nadi, $turgor_kulit, $output_urine, $pengisian_vena, $ortopnea, $dispnea, $pnd, $edema_anasarka, $edema_perifer, $berat_badan, $distensi_vena_jugularis, $suara_nafas_tambahan, $konesti_paru, $perasaan_lemah, $keluhan_haus, $konsentrasi_urine, $frekuensi_nadi, $tekanan_darah, $tekanan_nadi, $membran_mukosa, $jugularis_vena_pressure, $kadar_hb, $kadar_ht, $cvp, $refluks_hepatojugular, $berat_badan_2, $hepatomegali, $oligouria, $intake_cairan, $status_mental, $suhu_tubuh, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0023_record (diag_master_record_id, intervensi_duration, kekuatan_nadi, turgor_kulit, 
					output_urine, pengisian_vena, ortopnea, dispnea, pnd, edema_anasarka, edema_perifer, berat_badan, distensi_vena_jugularis, 
					distensi_vena_jugularis, suara_nafas_tambahan, konesti_paru, perasaan_lemah, keluhan_haus, konsentrasi_urine, frekuensi_nadi, 
					tekanan_darah, tekanan_nadi, membran_mukosa, jugularis_vena_pressure, kadar_hb, kadar_ht, cvp, refluks_hepatojugular, 
					berat_badan_2, hepatomegali, oligouria, intake_cairan, status_mental, suhu_tubuh, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$kekuatan_nadi."', '".$turgor_kulit."', '".$output_urine."', 
					'".$pengisian_vena."', '".$ortopnea."', '".$dispnea."', '".$pnd."', '".$edema_anasarka."', '".$edema_perifer."', 
					'".$berat_badan."', '".$distensi_vena_jugularis."', '".$suara_nafas_tambahan."', '".$konesti_paru."', '".$perasaan_lemah."', 
					'".$keluhan_haus."', '".$konsentrasi_urine."', '".$frekuensi_nadi."', '".$tekanan_darah."', '".$tekanan_nadi."', 
					'".$membran_mukosa."', '".$jugularis_vena_pressure."', '".$kadar_hb."', '".$kadar_ht."', '".$cvp."', 
					'".$refluks_hepatojugular."',  '".$berat_badan_2."', '".$hepatomegali."', '".$oligouria."', '".$intake_cairan."', 
					'".$status_mental."', '".$suhu_tubuh."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0024($newDiagRecordNumber, $durasi_intervensi, $elastisitas, $hidrasi, $perfusi_jaringan, $kerusakan_jaringan, $kerusakan_lapisan_kulit, $nyeri, $pendarahan, $kemerahan, $hematoma, $pigmentasi_abnormal, $jaringan_parut, $nekrosis, $abrasi_kornea, $suhu_kulit, $sensasi, $tekstur, $pertumbuhan_rambut, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0024_record (diag_master_record_id, intervensi_duration, elastisitas, hidrasi, 
					perfusi_jaringan, kerusakan_jaringan, kerusakan_lapisan_kulit, nyeri, pendarahan, kemerahan, hematoma, pigmentasi_abnormal, 
					jaringan_parut, nekrosis, abrasi_kornea, suhu_kulit, sensasi, tekstur, pertumbuhan_rambut, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$elastisitas."', '".$hidrasi."', '".$perfusi_jaringan."', 
					'".$kerusakan_jaringan."', '".$kerusakan_lapisan_kulit."', '".$nyeri."', '".$pendarahan."', '".$kemerahan."', '".$hematoma."', 
					'".$pigmentasi_abnormal."', '".$jaringan_parut."', '".$nekrosis."', '".$abrasi_kornea."', '".$suhu_kulit."', '".$sensasi."', 
					'".$tekstur."', '".$pertumbuhan_rambut."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0027($newDiagRecordNumber, $durasi_intervensi, $koordinasi, $kesadaran, $mengantuk, $pusing, $lelah, $keluhan_lapar, $gemetar, $berkeringat, $mulut_kering, $rasa_haus, $perilaku_aneh, $kesulitan_bicara, $kadar_glukosa_darah, $kadar_glukosa_urine, $palpitasi, $perilaku, $jumlah_urine, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0027_record (diag_master_record_id, intervensi_duration, koordinasi, kesadaran, 
					mengantuk, pusing, lelah, keluhan_lapar, gemetar, berkeringat, mulut_kering, rasa_haus, perilaku_aneh, kesulitan_bicara, 
					kadar_glukosa_darah, kadar_glukosa_urine, palpitasi, perilaku, jumlah_urine, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$koordinasi."', '".$kesadaran."', '".$mengantuk."', '".$pusing."', 
					'".$lelah."', '".$keluhan_lapar."', '".$gemetar."', '".$berkeringat."', '".$mulut_kering."', '".$rasa_haus."', 
					'".$perilaku_aneh."', '".$kesulitan_bicara."', '".$kadar_glukosa_darah."', '".$kadar_glukosa_urine."', '".$palpitasi."', 
					'".$perilaku."', '".$jumlah_urine."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0028($newDiagRecordNumber, $durasi_intervensi, $perlekatan_bayi, $kemampuan_ibu, $miksi_bayi, $berat_badan_bayi, $tetesan_asi, $suplai_asi, $putting_tidak_lecet, $kepercayaan_diri_ibu, $bayi_tidur, $payudara_kosong, $intake_bayi, $hisapan_bayi, $lecet_putting, $kelelahan_maternal, $kecemasan_maternal, $bayi_rewel, $bayi_menangis, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0028_record (diag_master_record_id, intervensi_duration, perlekatan_bayi, kemampuan_ibu, 
					miksi_bayi, berat_badan_bayi, tetesan_asi, suplai_asi, putting_tidak_lecet, kepercayaan_diri_ibu, bayi_tidur, payudara_kosong, 
					intake_bayi, hisapan_bayi, lecet_putting, kelelahan_maternal, kecemasan_maternal, bayi_rewel, bayi_menangis, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$perlekatan_bayi."', '".$kemampuan_ibu."', 
					'".$miksi_bayi."', '".$berat_badan_bayi."', '".$tetesan_asi."', '".$suplai_asi."', '".$putting_tidak_lecet."', 
					'".$kepercayaan_diri_ibu."', '".$bayi_tidur."', '".$payudara_kosong."', '".$intake_bayi."', '".$hisapan_bayi."', 
					'".$lecet_putting."', '".$kelelahan_maternal."', '".$kecemasan_maternal."', '".$bayi_rewel."', '".$bayi_menangis."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0029($newDiagRecordNumber, $durasi_intervensi, $perlekatan_bayi, $kemampuan_ibu, $miksi_bayi, $berat_badan_bayi, $tetesan_asi, $suplai_asi, $putting_tidak_lecet, $kepercayaan_diri_ibu, $bayi_tidur, $payudara_kosong, $intake_bayi, $hisapan_bayi, $lecet_putting, $kelelahan_maternal, $kecemasan_maternal, $bayi_rewel, $bayi_menangis, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0029_record (diag_master_record_id, intervensi_duration, perlekatan_bayi, kemampuan_ibu, 
					miksi_bayi, berat_badan_bayi, tetesan_asi, suplai_asi, putting_tidak_lecet, kepercayaan_diri_ibu, bayi_tidur, payudara_kosong, 
					intake_bayi, hisapan_bayi, lecet_putting, kelelahan_maternal, kecemasan_maternal, bayi_rewel, bayi_menangis, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$perlekatan_bayi."', '".$kemampuan_ibu."', 
					'".$miksi_bayi."', '".$berat_badan_bayi."', '".$tetesan_asi."', '".$suplai_asi."', '".$putting_tidak_lecet."', 
					'".$kepercayaan_diri_ibu."', '".$bayi_tidur."', '".$payudara_kosong."', '".$intake_bayi."', '".$hisapan_bayi."', 
					'".$lecet_putting."', '".$kelelahan_maternal."', '".$kecemasan_maternal."', '".$bayi_rewel."', '".$bayi_menangis."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0030($newDiagRecordNumber, $durasi_intervensi, $berat_badan, $tebal_lipatan_kulit, $index_massa_tubuh, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0030_record (diag_master_record_id, intervensi_duration, berat_badan, tebal_lipatan_kulit, 
					index_massa_tubuh, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$berat_badan."', 
					'".$tebal_lipatan_kulit."', '".$index_massa_tubuh."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0032($newDiagRecordNumber, $durasi_intervensi, $porsi_makan, $otot_pengunyah, $otot_menelan, $serum_albumin, $meningkatkan_nutrisi, $pengetahuan_makanan_sehat, $pengetahuan_minuman_sehat, $pengetahuan_standar_nutrisi, $penyiapan_makanan_aman, $penyiapan_minuman_aman, $sikap_tujuan_kesehatan, $cepat_kenyang, $nyeri_abdomen, $sariawan, $rambut_rontok, $diare, $berat_badan, $index_massa_tubuh, $frekuensi_makan, $bising_usus, $tebal_lipatan_kulit, $membran_mukosa, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0032_record (diag_master_record_id, intervensi_duration, porsi_makan, otot_pengunyah, 
					otot_menelan, serum_albumin, meningkatkan_nutrisi, pengetahuan_makanan_sehat, pengetahuan_minuman_sehat, 
					pengetahuan_standar_nutrisi, penyiapan_makanan_aman, penyiapan_minuman_aman, sikap_tujuan_kesehatan, cepat_kenyang, 
					nyeri_abdomen, sariawan, rambut_rontok, diare, berat_badan, index_massa_tubuh, frekuensi_makan, bising_usus, 
					tebal_lipatan_kulit, membran_mukosa, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$porsi_makan."', '".$otot_pengunyah."', '".$otot_menelan."', '".$serum_albumin."', '".$meningkatkan_nutrisi."', 
					'".$pengetahuan_makanan_sehat."', '".$pengetahuan_minuman_sehat."', '".$pengetahuan_standar_nutrisi."', 
					'".$penyiapan_makanan_aman."', '".$penyiapan_minuman_aman."', '".$sikap_tujuan_kesehatan."', '".$cepat_kenyang."', 
					'".$nyeri_abdomen."', '".$sariawan."', '".$rambut_rontok."', '".$diare."', '".$berat_badan."', '".$index_massa_tubuh."', 
					'".$frekuensi_makan."', '".$bising_usus."', '".$tebal_lipatan_kulit."', '".$membran_mukosa."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0036($newDiagRecordNumber, $durasi_intervensi, $asupan_cairan, $haluaran_urin, $kelembaban_membran, $asupan_makanan, $edema, $dehidrasi, $asites, $konfusi, $tekanan_darah, $denyut_nadi_radial, $tekanan_arteri, $membran_mukosa, $mata_cekung, $turgor_kulit, $berat_badan, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0036_record (diag_master_record_id, intervensi_duration, asupan_cairan, haluaran_urin, 
					kelembaban_membran, asupan_makanan, edema, dehidrasi, asites, konfusi, tekanan_darah, denyut_nadi_radial, tekanan_arteri, 
					membran_mukosa, mata_cekung, turgor_kulit, berat_badan, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$asupan_cairan."', '".$haluaran_urin."', '".$kelembaban_membran."', '".$asupan_makanan."', 
					'".$edema."', '".$dehidrasi."', '".$asites."', '".$konfusi."', '".$tekanan_darah."', '".$denyut_nadi_radial."', 
					'".$tekanan_arteri."', '".$membran_mukosa."', '".$mata_cekung."', '".$turgor_kulit."', '".$berat_badan."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0039($newDiagRecordNumber, $durasi_intervensi, $elastisitas, $hidrasi, $perfusi_jaringan, $kerusakan_jaringan, $kerusakan_lapisan, $nyeri, $pendarahan, $kemerahan, $hematoma, $pigmentasi_abnormal, $jaringan_perut, $nekrosis, $abrasi_kornea, $suhu_kulit, $sensasi, $tekstur, $pertumbuhan_rambut, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0039_record (diag_master_record_id, intervensi_duration, elastisitas, hidrasi, 
					perfusi_jaringan, kerusakan_jaringan, kerusakan_lapisan, nyeri, pendarahan, kemerahan, hematoma, pigmentasi_abnormal, 
					jaringan_perut, nekrosis, abrasi_kornea, suhu_kulit, sensasi, tekstur, pertumbuhan_rambut, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$elastisitas."', '".$hidrasi."', '".$perfusi_jaringan."', 
					'".$kerusakan_jaringan."', '".$kerusakan_lapisan."', '".$nyeri."', '".$pendarahan."', '".$kemerahan."', '".$hematoma."', 
					'".$pigmentasi_abnormal."', '".$jaringan_perut."', '".$nekrosis."', '".$abrasi_kornea."', '".$suhu_kulit."', '".$sensasi."', 
					'".$tekstur."', '".$pertumbuhan_rambut."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0040($newDiagRecordNumber, $durasi_intervensi, $sensasi_berkemih, $desakan_berkemih, $distensi_kandung_kemih, $berkemih_tidak_tuntas, $volume_residu_urine, $urine_menetas, $nokturia, $mengompol, $disuria, $anuria, $frekuensi_bak, $karakteristik_urine, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0040_record (diag_master_record_id, intervensi_duration, sensasi_berkemih, desakan_berkemih, 
					distensi_kandung_kemih, berkemih_tidak_tuntas, volume_residu_urine, urine_menetas, nokturia, mengompol, disuria, anuria, 
					frekuensi_bak, karakteristik_urine, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$sensasi_berkemih."', '".$desakan_berkemih."', '".$distensi_kandung_kemih."', '".$berkemih_tidak_tuntas."', 
					'".$volume_residu_urine."', '".$urine_menetas."', '".$nokturia."', '".$mengompol."', '".$disuria."', '".$anuria."', 
					'".$frekuensi_bak."', '".$karakteristik_urine."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0049($newDiagRecordNumber, $durasi_intervensi, $pengeluaran_feses, $keluhan_defekasi, $mengejan, $distensi_abdomen, $teraba_massa, $urgency, $nyeri_abdomen, $kram_abdomen, $konsistensi_feses, $frekuensi_defekasi, $peristaltik_usus, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0049_record (diag_master_record_id, intervensi_duration, pengeluaran_feses, keluhan_defekasi, 
					mengejan, distensi_abdomen, teraba_massa, urgency, nyeri_abdomen, kram_abdomen, konsistensi_feses, frekuensi_defekasi, 
					peristaltik_usus, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$pengeluaran_feses."', '".$keluhan_defekasi."', '".$mengejan."', '".$distensi_abdomen."', '".$teraba_massa."', 
					'".$urgency."', '".$nyeri_abdomen."', '".$kram_abdomen."', '".$konsistensi_feses."', '".$frekuensi_defekasi."', 
					'".$peristaltik_usus."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0050($newDiagRecordNumber, $durasi_intervensi, $sensasi_berkemih, $desakan_berkemih, $distensi_kandung_kemih, $berkemih_tidak_tuntas, $volume_residu_urine, $urine_menetas, $nokturia, $mengompol, $disuria, $anuria, $frekuensi_bak, $karakteristik_urine, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0050_record (diag_master_record_id, intervensi_duration, sensasi_berkemih, desakan_berkemih, 
					distensi_kandung_kemih, berkemih_tidak_tuntas, volume_residu_urine, urine_menetas, nokturia, mengompol, disuria, anuria, 
					frekuensi_bak, karakteristik_urine, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$sensasi_berkemih."', '".$desakan_berkemih."', '".$distensi_kandung_kemih."', '".$berkemih_tidak_tuntas."', 
					'".$volume_residu_urine."', '".$urine_menetas."', '".$nokturia."', '".$mengompol."', '".$disuria."', '".$anuria."', 
					'".$frekuensi_bak."', '".$karakteristik_urine."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0054($newDiagRecordNumber, $durasi_intervensi, $pergerakan_ekstremitas, $kekuatan_otot, $rom, $nyeri, $kecemasan, $kaku_sendi, $gerakan, $gerakan_terbatas, $kelemahan_fisik, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0054_record (diag_master_record_id, intervensi_duration, pergerakan_ekstremitas, 
					kekuatan_otot, rom, nyeri, kecemasan, kaku_sendi, gerakan, gerakan_terbatas, kelemahan_fisik, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$pergerakan_ekstremitas."', '".$kekuatan_otot."', '".$rom."', 
					'".$nyeri."', '".$kecemasan."', '".$kaku_sendi."', '".$gerakan."', '".$gerakan_terbatas."', '".$kelemahan_fisik."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0055($newDiagRecordNumber, $durasi_intervensi, $sulit_tidur, $sering_terjaga, $tidak_puas_tidur, $pola_tidur_berubah, $istirahat_tidak_cukup, $kemampuan_beraktivitas, $kemampuan_beraktivitas_2, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0055_record (diag_master_record_id, intervensi_duration, sulit_tidur, sering_terjaga, 
					tidak_puas_tidur, pola_tidur_berubah, istirahat_tidak_cukup, kemampuan_beraktivitas, kemampuan_beraktivitas_2, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$sulit_tidur."', '".$sering_terjaga."', 
					'".$tidak_puas_tidur."', '".$pola_tidur_berubah."', '".$istirahat_tidak_cukup."', '".$kemampuan_beraktivitas."', 
					'".$kemampuan_beraktivitas_2."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0056($newDiagRecordNumber, $durasi_intervensi, $frekuensi_nadi, $saturasi_oksigen, $kemudahan_beraktivitas, $kecepatan_berjalan, $jarak_berjalan, $kekuatan_tubuh_atas, $kekuatan_tubuh_bawah, $toleransi_menaiki_tangga, $keluhan_lelah, $dispnea, $perasaan_lemah, $aritmia_saat_aktivitas, $aritmia_setelah_aktivitas, $warna_kulit, $tekanan_darah, $frekuensi_nafas, $ekg_iskemia, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0056_record (diag_master_record_id, intervensi_duration, frekuensi_nadi, saturasi_oksigen, 
					kemudahan_beraktivitas, kecepatan_berjalan, jarak_berjalan, kekuatan_tubuh_atas, kekuatan_tubuh_bawah, 
					toleransi_menaiki_tangga, keluhan_lelah, dispnea, perasaan_lemah, aritmia_saat_aktivitas, aritmia_setelah_aktivitas, 
					warna_kulit, tekanan_darah, frekuensi_nafas, ekg_iskemia, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$frekuensi_nadi."', '".$saturasi_oksigen."', '".$kemudahan_beraktivitas."', 
					'".$kecepatan_berjalan."', '".$jarak_berjalan."', '".$kekuatan_tubuh_atas."', '".$kekuatan_tubuh_bawah."', 
					'".$toleransi_menaiki_tangga."', '".$keluhan_lelah."', '".$dispnea."', '".$perasaan_lemah."', '".$aritmia_saat_aktivitas."', 
					'".$aritmia_setelah_aktivitas."', '".$warna_kulit."', '".$tekanan_darah."', '".$frekuensi_nafas."', '".$ekg_iskemia."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0062($newDiagRecordNumber, $durasi_intervensi, $kemampuan_mempelajar_hal_baru, $kemampuan_mengingat_informasi_faktual, $kemampuan_mengingat_perilaku, $kemampuan_mengingat_peristiwa, $kemampuan_dipelajari, $pengalaman_lupa, $lupa_jadwal, $mudah_lupa, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0062_record (diag_master_record_id, intervensi_duration, kemampuan_mempelajar_hal_baru, 
					kemampuan_mengingat_informasi_faktual, kemampuan_mengingat_perilaku, kemampuan_mengingat_peristiwa, kemampuan_dipelajari, 
					pengalaman_lupa, lupa_jadwal, mudah_lupa, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$kemampuan_mempelajar_hal_baru."', '".$kemampuan_mengingat_informasi_faktual."', 
					'".$kemampuan_mengingat_perilaku."', '".$kemampuan_mengingat_peristiwa."', '".$kemampuan_dipelajari."', '".$pengalaman_lupa."', 
					'".$lupa_jadwal."', '".$mudah_lupa."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0063($newDiagRecordNumber, $durasi_intervensi, $mempertahankan_makanan, $reflek_menelan, $mengosongkan_mulut, $kemampuan_mengunyah, $usaha_menelan, $pembentukan_bolus, $frekuensi_tersedak, $batuk, $muntah, $refluks_lambung, $gelisah, $regurgitasi, $produksi_saliva, $penerimaan_makanan, $kualitas_suara, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0063_record (diag_master_record_id, intervensi_duration, mempertahankan_makanan, 
					reflek_menelan, mengosongkan_mulut, kemampuan_mengunyah, usaha_menelan, pembentukan_bolus, frekuensi_tersedak, batuk, muntah, 
					refluks_lambung, gelisah, regurgitasi, produksi_saliva, penerimaan_makanan, kualitas_suara, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$mempertahankan_makanan."', '".$reflek_menelan."', 
					'".$mengosongkan_mulut."', '".$kemampuan_mengunyah."', '".$usaha_menelan."', '".$pembentukan_bolus."', 
					'".$frekuensi_tersedak."', '".$batuk."', '".$muntah."', '".$refluks_lambung."', '".$gelisah."', '".$regurgitasi."', 
					'".$produksi_saliva."', '".$penerimaan_makanan."', '".$kualitas_suara."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0064($newDiagRecordNumber, $durasi_intervensi, $fungsi_kognitif, $tingkat_kesadaran, $aktivitas_psikomotorik, $motivasi, $memori_jangka_pendek, $memori_jangka_panjang, $halusinasi, $gelisah, $interpretasi, $fungsi_sosial, $respon_stimulus, $persepsi, $fungsi_otak, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0064_record (diag_master_record_id, intervensi_duration, fungsi_kognitif, tingkat_kesadaran, 
					aktivitas_psikomotorik, motivasi, memori_jangka_pendek, memori_jangka_panjang, halusinasi, gelisah, interpretasi, 
					fungsi_sosial, respon_stimulus, persepsi, fungsi_otak, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$fungsi_kognitif."', '".$tingkat_kesadaran."', '".$aktivitas_psikomotorik."', '".$motivasi."', 
					'".$memori_jangka_pendek."', '".$memori_jangka_panjang."', '".$halusinasi."', '".$gelisah."', '".$interpretasi."', 
					'".$fungsi_sosial."', '".$respon_stimulus."', '".$persepsi."', '".$fungsi_otak."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0065($newDiagRecordNumber, $durasi_intervensi, $fungsi_kognitif, $tingkat_kesadaran, $aktivitas_psikomotorik, $motivasi, $memori_jangka_pendek, $memori_jangka_panjang, $halusinasi, $gelisah, $interpretasi, $fungsi_sosial, $respon_stimulus, $persepsi, $fungsi_otak, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0065_record (diag_master_record_id, intervensi_duration, fungsi_kognitif, tingkat_kesadaran, 
					aktivitas_psikomotorik, motivasi, memori_jangka_pendek, memori_jangka_panjang, halusinasi, gelisah, interpretasi, 
					fungsi_sosial, respon_stimulus, persepsi, fungsi_otak, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$fungsi_kognitif."', '".$tingkat_kesadaran."', '".$aktivitas_psikomotorik."', '".$motivasi."', 
					'".$memori_jangka_pendek."', '".$memori_jangka_panjang."', '".$halusinasi."', '".$gelisah."', '".$interpretasi."', 
					'".$fungsi_sosial."', '".$respon_stimulus."', '".$persepsi."', '".$fungsi_otak."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0069($newDiagRecordNumber, $durasi_intervensi, $kepuasan_hubungan, $informasi_kepuasan, $aktivitas_seks_berubah, $eksistasi_seks_berubah, $peran_seks_berubah, $fungsi_seks_berubah, $dispareunia, $keluhan_seks_terbatas, $keluhan_sulit_seks, $perilaku_seks_berubah, $konflik_nilai, $hasrat_seksual, $orientasi_seksual, $ketertarikan_pasangan, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0069_record (diag_master_record_id, intervensi_duration, kepuasan_hubungan, 
					informasi_kepuasan, aktivitas_seks_berubah, eksistasi_seks_berubah, peran_seks_berubah, fungsi_seks_berubah, dispareunia, 
					keluhan_seks_terbatas, keluhan_sulit_seks, perilaku_seks_berubah, konflik_nilai, hasrat_seksual, orientasi_seksual, 
					ketertarikan_pasangan, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$kepuasan_hubungan."', '".$informasi_kepuasan."', '".$aktivitas_seks_berubah."', '".$eksistasi_seks_berubah."', 
					'".$peran_seks_berubah."', '".$fungsi_seks_berubah."', '".$dispareunia."', '".$keluhan_seks_terbatas."', 
					'".$keluhan_sulit_seks."', '".$perilaku_seks_berubah."', '".$konflik_nilai."', '".$hasrat_seksual."', '".$orientasi_seksual."', 
					'".$ketertarikan_pasangan."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0070($newDiagRecordNumber, $durasi_intervensi, $kelekatan_emosional, $koping, $nausea, $muntah, $edema, $nyeri_abdomen, $nyeri_epigastrik, $pendarahan, $konstipasi, $sakit_kepala, $kejang, $mood_labil, $protein_urine, $glukosa_urine, $glukosa_darah, $berat_badan, $tekanan_darah, $hemoglobin, $refleks_neurologis, $frekuensi_nadi, $frekuensi_nafas, $suhu_tubuh, $enzim_liver, $hitung_darah, $status_kognitif, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0070_record (diag_master_record_id, intervensi_duration, kelekatan_emosional, koping, 
					nausea, muntah, edema, nyeri_abdomen, nyeri_epigastrik, pendarahan, konstipasi, sakit_kepala, kejang, mood_labil, 
					protein_urine, glukosa_urine, glukosa_darah, berat_badan, tekanan_darah, hemoglobin, refleks_neurologis, frekuensi_nadi, 
					frekuensi_nafas, suhu_tubuh, enzim_liver, hitung_darah, status_kognitif, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$kelekatan_emosional."', '".$koping."', '".$nausea."', '".$muntah."', 
					'".$edema."', '".$nyeri_abdomen."', '".$nyeri_epigastrik."', '".$pendarahan."', '".$konstipasi."', '".$sakit_kepala."', 
					'".$kejang."', '".$mood_labil."', '".$protein_urine."', '".$glukosa_urine."', '".$glukosa_darah."', '".$berat_badan."', 
					'".$tekanan_darah."', '".$hemoglobin."', '".$refleks_neurologis."', '".$frekuensi_nadi."', '".$frekuensi_nafas."', 
					'".$suhu_tubuh."', '".$enzim_liver."', '".$hitung_darah."', '".$status_kognitif."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0071($newDiagRecordNumber, $durasi_intervensi, $pendirian_seks_jelas, $integrasi_orientasi_seks, $batasan_jenis_kelamin, $dukungan_sosial, $hubungan_harmonis, $hubungan_seks_sehat, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0071_record (diag_master_record_id, intervensi_duration, pendirian_seks_jelas, 
					integrasi_orientasi_seks, batasan_jenis_kelamin, dukungan_sosial, hubungan_harmonis, hubungan_seks_sehat, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$pendirian_seks_jelas."', 
					'".$integrasi_orientasi_seks."', '".$batasan_jenis_kelamin."', '".$dukungan_sosial."', '".$hubungan_harmonis."', 
					'".$hubungan_seks_sehat."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0074($newDiagRecordNumber, $durasi_intervensi, $kesejahteraan_fisik, $kesejahteraan_psikologis, $dukungan_sosial_keluarga, $dukungan_sosial_teman, $perawatan_keyakinan_budaya, $perawatan_kebutuhan, $kebebasan_ibadah, $rileks, $tidak_nyaman, $gelisah, $kebisingan, $sulit_tidur, $keluhan_kedinginan, $keluhan_kepanasan, $gatal, $mual, $lelah, $merintih, $menangis, $iritabilitas, $menyalahkan_diri, $konfusi, $konsumsi_alkohol, $penggunaan_zat, $pencobaan_bunuh_diri, $memori_masa_lalu, $suhu_ruangan, $pola_eliminasi, $postur_tubuh, $kewaspadaan, $pola_hidup, $pola_tidur, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0074_record (diag_master_record_id, intervensi_duration, kesejahteraan_fisik, 
					kesejahteraan_psikologis, dukungan_sosial_keluarga, dukungan_sosial_teman, perawatan_keyakinan_budaya, perawatan_kebutuhan, 
					kebebasan_ibadah, rileks, tidak_nyaman, gelisah, kebisingan, sulit_tidur, keluhan_kedinginan, keluhan_kepanasan, gatal, mual, 
					lelah, merintih, menangis, iritabilitas, menyalahkan_diri, konfusi, konsumsi_alkohol, penggunaan_zat, pencobaan_bunuh_diri, 
					memori_masa_lalu, suhu_ruangan, pola_eliminasi, postur_tubuh, kewaspadaan, pola_hidup, pola_tidur, created_by, created_dttm) 
					values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$kesejahteraan_fisik."', '".$kesejahteraan_psikologis."', 
					'".$dukungan_sosial_keluarga."', '".$dukungan_sosial_teman."', '".$perawatan_keyakinan_budaya."', '".$perawatan_kebutuhan."', 
					'".$kebebasan_ibadah."', '".$rileks."', '".$tidak_nyaman."', '".$gelisah."', '".$kebisingan."', '".$sulit_tidur."', 
					'".$keluhan_kedinginan."', '".$keluhan_kepanasan."', '".$gatal."', '".$mual."', '".$lelah."', '".$merintih."', '".$menangis."', 
					'".$iritabilitas."', '".$menyalahkan_diri."', '".$konfusi."', '".$konsumsi_alkohol."', '".$penggunaan_zat."', 
					'".$pencobaan_bunuh_diri."', '".$memori_masa_lalu."', '".$suhu_ruangan."', '".$pola_eliminasi."', '".$postur_tubuh."', 
					'".$kewaspadaan."', '".$pola_hidup."', '".$pola_tidur."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0075($newDiagRecordNumber, $durasi_intervensi, $tidak_nyaman, $meringis, $luka_opilsiotomi, $kontraksi_uterus, $berkeringat, $menangis, $merintih, $haemoroid, $kontraksi_uterus_2, $payudara_membengkak, $tekanan_darah, $frekuensi_nadi, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0075_record (diag_master_record_id, intervensi_duration, tidak_nyaman, meringis, 
					luka_opilsiotomi, kontraksi_uterus, berkeringat, menangis, merintih, haemoroid, kontraksi_uterus_2, payudara_membengkak, 
					tekanan_darah, frekuensi_nadi, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$tidak_nyaman."', '".$meringis."', '".$luka_opilsiotomi."', '".$kontraksi_uterus."', '".$berkeringat."', '".$menangis."', 
					'".$merintih."', '".$haemoroid."', '".$kontraksi_uterus_2."', '".$payudara_membengkak."', '".$tekanan_darah."', 
					'".$frekuensi_nadi."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0076($newDiagRecordNumber, $durasi_intervensi, $nafsu_makan, $keluhan_mual, $ingin_muntah, $asam_mulut, $sensasi_panas, $sensasi_dingin, $frekuensi_menelan, $diafroresis, $jumlah_saliva, $pucat, $takikardi, $dilatasi_pupil, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0076_record (diag_master_record_id, intervensi_duration, nafsu_makan, keluhan_mual, 
					ingin_muntah, asam_mulut, sensasi_panas, sensasi_dingin, frekuensi_menelan, diafroresis, jumlah_saliva, pucat, takikardi, 
					dilatasi_pupil, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$nafsu_makan."', 
					'".$keluhan_mual."', '".$ingin_muntah."', '".$asam_mulut."', '".$sensasi_panas."', '".$sensasi_dingin."', 
					'".$frekuensi_menelan."', '".$diafroresis."', '".$jumlah_saliva."', '".$pucat."', '".$takikardi."', '".$dilatasi_pupil."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0077($newDiagRecordNumber, $durasi_intervensi, $menuntaskan_aktivitas, $keluhan_nyeri, $meringis, $sikap_protektif, $gelisah, $kesulitan_tidur, $menarik_diri, $fokus_diri_sendiri, $diaforesis, $depresi, $cedera_berulang, $anoreksia, $perineum_tertekan, $uterus_membulat, $ketegangan_otot, $pupil_dilatasi, $muntah, $mual, $frekuensi_nadi, $pola_nafas, $tekanan_darah, $proses_berfikir, $fokus, $fungsi_berkemih, $perilaku, $nafsu_makan, $pola_tidur, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0077_record (diag_master_record_id, intervensi_duration, menuntaskan_aktivitas, 
					keluhan_nyeri, meringis, sikap_protektif, gelisah, kesulitan_tidur, menarik_diri, fokus_diri_sendiri, diaforesis, depresi, 
					cedera_berulang, anoreksia, perineum_tertekan, uterus_membulat, ketegangan_otot, pupil_dilatasi, muntah, mual, frekuensi_nadi, 
					pola_nafas, tekanan_darah, proses_berfikir, fokus, fungsi_berkemih, perilaku, nafsu_makan, pola_tidur, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menuntaskan_aktivitas."', '".$keluhan_nyeri."', 
					'".$meringis."', '".$sikap_protektif."', '".$gelisah."', '".$kesulitan_tidur."', '".$menarik_diri."', '".$fokus_diri_sendiri."', 
					'".$diaforesis."', '".$depresi."', '".$cedera_berulang."', '".$anoreksia."', '".$perineum_tertekan."', '".$uterus_membulat."', 
					'".$ketegangan_otot."', '".$pupil_dilatasi."', '".$muntah."', '".$mual."', '".$frekuensi_nadi."', '".$pola_nafas."', 
					'".$tekanan_darah."', '".$proses_berfikir."', '".$fokus."', '".$fungsi_berkemih."', '".$perilaku."',  '".$nafsu_makan."', 
					'".$pola_tidur."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0078($newDiagRecordNumber, $durasi_intervensi, $menuntaskan_aktivitas, $keluhan_nyeri, $meringis, $sikap_protektif, $gelisah, $kesulitan_tidur, $menarik_diri, $fokus_diri_sendiri, $diaforesis, $depresi, $cedera_berulang, $anoreksia, $perineum_tertekan, $uterus_membulat, $ketegangan_otot, $pupil_dilatasi, $muntah, $mual, $frekuensi_nadi, $pola_nafas, $tekanan_darah, $proses_berfikir, $fokus, $fungsi_berkemih, $perilaku, $nafsu_makan, $pola_tidur, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0078_record (diag_master_record_id, intervensi_duration, menuntaskan_aktivitas, 
					keluhan_nyeri, meringis, sikap_protektif, gelisah, kesulitan_tidur, menarik_diri, fokus_diri_sendiri, diaforesis, depresi, 
					cedera_berulang, anoreksia, perineum_tertekan, uterus_membulat, ketegangan_otot, pupil_dilatasi, muntah, mual, frekuensi_nadi, 
					pola_nafas, tekanan_darah, proses_berfikir, fokus, fungsi_berkemih, perilaku, nafsu_makan, pola_tidur, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menuntaskan_aktivitas."', '".$keluhan_nyeri."', 
					'".$meringis."', '".$sikap_protektif."', '".$gelisah."', '".$kesulitan_tidur."', '".$menarik_diri."', '".$fokus_diri_sendiri."', 
					'".$diaforesis."', '".$depresi."', '".$cedera_berulang."', '".$anoreksia."', '".$perineum_tertekan."', '".$uterus_membulat."', 
					'".$ketegangan_otot."', '".$pupil_dilatasi."', '".$muntah."', '".$mual."', '".$frekuensi_nadi."', '".$pola_nafas."', 
					'".$tekanan_darah."', '".$proses_berfikir."', '".$fokus."', '".$fungsi_berkemih."', '".$perilaku."',  '".$nafsu_makan."', 
					'".$pola_tidur."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0079($newDiagRecordNumber, $durasi_intervensi, $menuntaskan_aktivitas, $keluhan_nyeri, $meringis, $sikap_protektif, $gelisah, $kesulitan_tidur, $menarik_diri, $fokus_diri_sendiri, $diaforesis, $depresi, $cedera_berulang, $anoreksia, $perineum_tertekan, $uterus_membulat, $ketegangan_otot, $pupil_dilatasi, $muntah, $mual, $frekuensi_nadi, $pola_nafas, $tekanan_darah, $proses_berfikir, $fokus, $fungsi_berkemih, $perilaku, $nafsu_makan, $pola_tidur, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0079_record (diag_master_record_id, intervensi_duration, menuntaskan_aktivitas, 
					keluhan_nyeri, meringis, sikap_protektif, gelisah, kesulitan_tidur, menarik_diri, fokus_diri_sendiri, diaforesis, depresi, 
					cedera_berulang, anoreksia, perineum_tertekan, uterus_membulat, ketegangan_otot, pupil_dilatasi, muntah, mual, frekuensi_nadi, 
					pola_nafas, tekanan_darah, proses_berfikir, fokus, fungsi_berkemih, perilaku, nafsu_makan, pola_tidur, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menuntaskan_aktivitas."', '".$keluhan_nyeri."', 
					'".$meringis."', '".$sikap_protektif."', '".$gelisah."', '".$kesulitan_tidur."', '".$menarik_diri."', '".$fokus_diri_sendiri."', 
					'".$diaforesis."', '".$depresi."', '".$cedera_berulang."', '".$anoreksia."', '".$perineum_tertekan."', '".$uterus_membulat."', 
					'".$ketegangan_otot."', '".$pupil_dilatasi."', '".$muntah."', '".$mual."', '".$frekuensi_nadi."', '".$pola_nafas."', 
					'".$tekanan_darah."', '".$proses_berfikir."', '".$fokus."', '".$fungsi_berkemih."', '".$perilaku."',  '".$nafsu_makan."', 
					'".$pola_tidur."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0080($newDiagRecordNumber, $durasi_intervensi, $kebingungan, $khawatir, $perilaku_gelisah, $perilaku_tegang, $keluhan_pusing, $anoreksia, $palpitasi, $frekuensi_nafas, $frekuensi_nadi, $tekanan_darah, $diaforesis, $tremor, $pucat, $konsentrasi, $pola_tidur, $perasaan_keberdayaan, $kontak_mata, $pola_berkemih, $orientasi, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0080_record (diag_master_record_id, intervensi_duration, kebingungan, khawatir, 
					perilaku_gelisah, perilaku_tegang, keluhan_pusing, anoreksia, palpitasi, frekuensi_nafas, frekuensi_nadi, tekanan_darah, 
					diaforesis, tremor, pucat, konsentrasi, pola_tidur, perasaan_keberdayaan, kontak_mata, pola_berkemih, orientasi, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$kebingungan."', '".$khawatir."', 
					'".$perilaku_gelisah."', '".$perilaku_tegang."', '".$keluhan_pusing."', '".$anoreksia."', '".$palpitasi."', 
					'".$frekuensi_nafas."', '".$frekuensi_nadi."', '".$tekanan_darah."', '".$diaforesis."', '".$tremor."', '".$pucat."', 
					'".$konsentrasi."', '".$pola_tidur."', '".$perasaan_keberdayaan."', '".$kontak_mata."', '".$pola_berkemih."', '".$orientasi."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0081($newDiagRecordNumber, $durasi_intervensi, $menerima_kehilangan, $kehilangan, $perasaan_berguna, $perasaan_sedih, $perasaan_bersalah, $menangis, $mimpi_buruk, $fobia, $marah, $panik, $pola_tidur, $konsentrasi, $imunitas, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0081_record (diag_master_record_id, intervensi_duration, menerima_kehilangan, kehilangan, 
					perasaan_berguna, perasaan_sedih, perasaan_bersalah, menangis, mimpi_buruk, fobia, marah, panik, pola_tidur, konsentrasi, 
					imunitas, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menerima_kehilangan."', 
					'".$kehilangan."', '".$perasaan_berguna."', '".$perasaan_sedih."', '".$perasaan_bersalah."', '".$menangis."', 
					'".$mimpi_buruk."', '".$fobia."', '".$marah."', '".$panik."', '".$pola_tidur."', '".$konsentrasi."', '".$imunitas."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0085($newDiagRecordNumber, $durasi_intervensi, $mendengar_bisikan, $melihat_bayangan, $indra_penciuman, $indra_peraba, $pengecapan, $dostorsi_sensori, $perilaku_halusinasi, $menarik_diri, $melamun, $curiga, $mondarmandir, $respon_stimulus, $konsentrasi, $orientasi, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0085_record (diag_master_record_id, intervensi_duration, mendengar_bisikan, melihat_bayangan, 
					indra_penciuman, indra_peraba, pengecapan, dostorsi_sensori, perilaku_halusinasi, menarik_diri, melamun, curiga, mondarmandir, 
					respon_stimulus, konsentrasi, orientasi, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$mendengar_bisikan."', '".$melihat_bayangan."', '".$indra_penciuman."', '".$indra_peraba."', 
					'".$pengecapan."', '".$dostorsi_sensori."', '".$perilaku_halusinasi."', '".$menarik_diri."', '".$melamun."', '".$curiga."', 
					'".$mondarmandir."', '".$respon_stimulus."', '".$konsentrasi."', '".$orientasi."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0106($newDiagRecordNumber, $durasi_intervensi, $perilaku_sesuai_usia, $perawatan_diri, $respon_sosial, $kontak_mata, $bb_sesuai_usia, $panjang_tinggi_badan, $lingkar_kepala, $kecepatan_tambah_bb, $kecepatan_tambah_tb, $index_massa_tubuh, $asupan_nutrisi, $kemarahan, $regresi, $afek, $pola_tidur, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0106_record (diag_master_record_id, intervensi_duration, perilaku_sesuai_usia, 
					perawatan_diri, respon_sosial, kontak_mata, bb_sesuai_usia, panjang_tinggi_badan, lingkar_kepala, kecepatan_tambah_bb, 
					kecepatan_tambah_tb, index_massa_tubuh, asupan_nutrisi, kemarahan, regresi, afek, pola_tidur, created_by, created_dttm) 
					values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$perilaku_sesuai_usia."', '".$perawatan_diri."', 
					'".$respon_sosial."', '".$kontak_mata."', '".$bb_sesuai_usia."', '".$panjang_tinggi_badan."', '".$lingkar_kepala."', 
					'".$kecepatan_tambah_bb."', '".$kecepatan_tambah_tb."', '".$index_massa_tubuh."', '".$asupan_nutrisi."', '".$kemarahan."', 
					'".$regresi."', '".$afek."', '".$pola_tidur."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0109($newDiagRecordNumber, $durasi_intervensi, $kemampuan_mandi, $kemampuan_pakaian, $kemampuan_makan, $kemampuan_toilet, $perawatan_diri, $minat_perawatan_diri, $kebersihan_diri, $kebersihan_mulut, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0109_record (diag_master_record_id, intervensi_duration, kemampuan_mandi, kemampuan_pakaian, 
					kemampuan_makan, kemampuan_toilet, perawatan_diri, minat_perawatan_diri, kebersihan_diri, kebersihan_mulut, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$kemampuan_mandi."', '".$kemampuan_pakaian."', 
					'".$kemampuan_makan."', '".$kemampuan_toilet."', '".$perawatan_diri."', '".$minat_perawatan_diri."', '".$kebersihan_diri."', 
					'".$kebersihan_mulut."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0111($newDiagRecordNumber, $durasi_intervensi, $perilaku_sesuai_anjuran, $minat_catatan_belajar, $menjelaskan_pengetahuan, $menggambarkan_pengalaman, $perilaku_sesuai_pengetahuan, $pertanyaan_masalah, $persepi_keliru, $pemeriksaan_kurang_tepat, $perilaku, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0111_record (diag_master_record_id, intervensi_duration, perilaku_sesuai_anjuran, 
					minat_catatan_belajar, menjelaskan_pengetahuan, menggambarkan_pengalaman, perilaku_sesuai_pengetahuan, pertanyaan_masalah, 
					persepi_keliru, pemeriksaan_kurang_tepat, perilaku, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$perilaku_sesuai_anjuran."', '".$minat_catatan_belajar."', '".$menjelaskan_pengetahuan."', 
					'".$menggambarkan_pengalaman."', '".$perilaku_sesuai_pengetahuan."', '".$pertanyaan_masalah."', '".$persepi_keliru."', 
					'".$pemeriksaan_kurang_tepat."', '".$perilaku."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0118($newDiagRecordNumber, $durasi_intervensi, $nyaman_situasi_sosial, $mudah_menerima, $responsif, $perasaan_tertarik, $minat_kontak_emosi, $minat_kontak_fisik, $kasih_sayang, $kontak_mata, $ekspresi_wajah, $kooperatif_bermain, $perilaku_sesuai_usia, $gejala_cemas, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0118_record (diag_master_record_id, intervensi_duration, nyaman_situasi_sosial, 
					mudah_menerima, responsif, perasaan_tertarik, minat_kontak_emosi, minat_kontak_fisik, kasih_sayang, kontak_mata, 
					ekspresi_wajah, kooperatif_bermain, perilaku_sesuai_usia, gejala_cemas, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$nyaman_situasi_sosial."', '".$mudah_menerima."', '".$responsif."', 
					'".$perasaan_tertarik."', '".$minat_kontak_emosi."', '".$minat_kontak_fisik."', '".$kasih_sayang."', '".$kontak_mata."', 
					'".$ekspresi_wajah."', '".$kooperatif_bermain."', '".$perilaku_sesuai_usia."', '".$gejala_cemas."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0119($newDiagRecordNumber, $durasi_intervensi, $kemampuan_berbicara, $kemampuan_mendengar, $kesesuaian_ekspresi, $kontak_mata, $afasia, $disfasia, $apraksia, $disleksia, $disartria, $afonia, $dislalia, $pelo, $gagap, $repson_perilaku, $pemahaman_komunikasi, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0119_record (diag_master_record_id, intervensi_duration, kemampuan_berbicara, 
					kemampuan_mendengar, kesesuaian_ekspresi, kontak_mata, afasia, disfasia, apraksia, disleksia, disartria, afonia, dislalia, 
					pelo, gagap, repson_perilaku, pemahaman_komunikasi, created_by, created_dttm) values ('".$newDiagRecordNumber."', 
					'".$durasi_intervensi."', '".$kemampuan_berbicara."', '".$kemampuan_mendengar."', '".$kesesuaian_ekspresi."', 
					'".$kontak_mata."', '".$afasia."', '".$disfasia."', '".$apraksia."', '".$disleksia."', '".$disartria."', '".$afonia."', 
					'".$dislalia."', '".$pelo."', '".$gagap."', '".$repson_perilaku."', '".$pemahaman_komunikasi."', '".$created_by."', 
					'".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0129($newDiagRecordNumber, $durasi_intervensi, $elastisitas, $hidrasi, $perfusi_jaringan, $kerusakan_jaringan, $kerusakan_lapisan, $nyeri, $pendarahan, $kemerahan, $hematoma, $pigmentasi_abnormal, $jaringan_perut, $nekrosis, $abrasi_kornea, $suhu_kulit, $sensasi, $tekstur, $pertumbuhan_rambut, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0129_record (diag_master_record_id, intervensi_duration, elastisitas, hidrasi, 
					perfusi_jaringan, kerusakan_jaringan, kerusakan_lapisan, nyeri, pendarahan, kemerahan, hematoma, pigmentasi_abnormal, 
					jaringan_perut, nekrosis, abrasi_kornea, suhu_kulit, sensasi, tekstur, pertumbuhan_rambut, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$elastisitas."', '".$hidrasi."', '".$perfusi_jaringan."', 
					'".$kerusakan_jaringan."', '".$kerusakan_lapisan."', '".$nyeri."', '".$pendarahan."', '".$kemerahan."', '".$hematoma."', 
					'".$pigmentasi_abnormal."', '".$jaringan_perut."', '".$nekrosis."', '".$abrasi_kornea."', '".$suhu_kulit."', '".$sensasi."', 
					'".$tekstur."', '".$pertumbuhan_rambut."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0130($newDiagRecordNumber, $durasi_intervensi, $menggigil, $kulit_merah, $kejang, $akrosianosis, $konsumsi_oksigen, $piloereksi, $vasokonstriksi_perifer, $kutis_memorata, $pucat, $takikardi, $takipnea, $bradikardi, $dasar_kuku_sianotik, $hipoksia, $suhu_tubuh, $suhu_kulit, $glukosa_darah, $pengisian_kapiler, $ventilasi, $tekanan_darah, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0130_record (diag_master_record_id, intervensi_duration, menggigil, kulit_merah, kejang, 
					akrosianosis, konsumsi_oksigen, piloereksi, vasokonstriksi_perifer, kutis_memorata, pucat, takikardi, takipnea, bradikardi, 
					dasar_kuku_sianotik, hipoksia, suhu_tubuh, suhu_kulit, glukosa_darah, pengisian_kapiler, ventilasi, tekanan_darah, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menggigil."', '".$kulit_merah."', 
					'".$kejang."', '".$akrosianosis."', '".$konsumsi_oksigen."', '".$piloereksi."', '".$vasokonstriksi_perifer."', 
					'".$kutis_memorata."', '".$pucat."', '".$takikardi."', '".$takipnea."', '".$bradikardi."', '".$dasar_kuku_sianotik."', 
					'".$hipoksia."', '".$suhu_tubuh."', '".$suhu_kulit."', '".$glukosa_darah."', '".$pengisian_kapiler."', '".$ventilasi."', 
					'".$tekanan_darah."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0131($newDiagRecordNumber, $durasi_intervensi, $menggigil, $kulit_merah, $kejang, $akrosianosis, $konsumsi_oksigen, $piloereksi, $vasokonstriksi_perifer, $kutis_memorata, $pucat, $takikardi, $takipnea, $bradikardi, $dasar_kuku_sianotik, $hipoksia, $suhu_tubuh, $suhu_kulit, $glukosa_darah, $pengisian_kapiler, $ventilasi, $tekanan_darah, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0131_record (diag_master_record_id, intervensi_duration, menggigil, kulit_merah, kejang, 
					akrosianosis, konsumsi_oksigen, piloereksi, vasokonstriksi_perifer, kutis_memorata, pucat, takikardi, takipnea, bradikardi, 
					dasar_kuku_sianotik, hipoksia, suhu_tubuh, suhu_kulit, glukosa_darah, pengisian_kapiler, ventilasi, tekanan_darah, created_by, 
					created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menggigil."', '".$kulit_merah."', 
					'".$kejang."', '".$akrosianosis."', '".$konsumsi_oksigen."', '".$piloereksi."', '".$vasokonstriksi_perifer."', 
					'".$kutis_memorata."', '".$pucat."', '".$takikardi."', '".$takipnea."', '".$bradikardi."', '".$dasar_kuku_sianotik."', 
					'".$hipoksia."', '".$suhu_tubuh."', '".$suhu_kulit."', '".$glukosa_darah."', '".$pengisian_kapiler."', '".$ventilasi."', 
					'".$tekanan_darah."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0142($newDiagRecordNumber, $durasi_intervensi, $kebersihan_tangan, $kebersihan_badan, $nafsu_makan, $demam, $kemerahan, $nyeri, $bengkak, $vesikel, $cairan_berbau_busuk, $spuntum, $drainase_purulen, $piuria, $periode_malaise, $periode_menggigil, $letargi, $gangguan_kognitif, $sel_darah_putih, $kultur_darah, $kultur_urine, $kultur_sputum, $kultur_area_luka, $kultur_feses, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0142_record (diag_master_record_id, intervensi_duration, kebersihan_tangan, kebersihan_badan, 
					nafsu_makan, demam, kemerahan, nyeri, bengkak, vesikel, cairan_berbau_busuk, spuntum, drainase_purulen, piuria, 
					periode_malaise, periode_menggigil, letargi, gangguan_kognitif, sel_darah_putih, kultur_darah, kultur_urine, kultur_sputum, 
					kultur_area_luka, kultur_feses, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$kebersihan_tangan."', '".$kebersihan_badan."', '".$nafsu_makan."', '".$demam."', '".$kemerahan."', '".$nyeri."', 
					'".$bengkak."', '".$vesikel."', '".$cairan_berbau_busuk."', '".$spuntum."', '".$drainase_purulen."', '".$piuria."', 
					'".$periode_malaise."', '".$periode_menggigil."', '".$letargi."', '".$gangguan_kognitif."', '".$sel_darah_putih."', 
					'".$kultur_darah."', '".$kultur_urine."', '".$kultur_sputum."', '".$kultur_area_luka."', '".$kultur_feses."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0143($newDiagRecordNumber, $durasi_intervensi, $jatuh_tempat_tidur, $jatuh_saat_berdiri, $jatuh_saat_duduk, $jatuh_saat_berjalan, $jatuh_saat_pindah, $jatuh_naik_tangga, $jatuh_kamar_mandi, $jatuh_saat_membungkuk, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0143_record (diag_master_record_id, intervensi_duration, jatuh_tempat_tidur, 
					jatuh_saat_berdiri, jatuh_saat_duduk, jatuh_saat_berjalan, jatuh_saat_pindah, jatuh_naik_tangga, jatuh_kamar_mandi, 
					jatuh_saat_membungkuk, created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', 
					'".$jatuh_tempat_tidur."', '".$jatuh_saat_berdiri."', '".$jatuh_saat_duduk."', '".$jatuh_saat_berjalan."', 
					'".$jatuh_saat_pindah."', '".$jatuh_naik_tangga."', '".$jatuh_kamar_mandi."', '".$jatuh_saat_membungkuk."', 
					'".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0144($newDiagRecordNumber, $durasi_intervensi, $elastisitas, $hidrasi, $perfusi_jaringan, $kerusakan_jaringan, $kerusakan_lapisan, $nyeri, $pendarahan, $kemerahan, $hematoma, $pigmentasi_abnormal, $jaringan_perut, $nekrosis, $abrasi_kornea, $suhu_kulit, $sensasi, $tekstur, $pertumbuhan_rambut, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0144_record (diag_master_record_id, intervensi_duration, elastisitas, hidrasi, 
					perfusi_jaringan, kerusakan_jaringan, kerusakan_lapisan, nyeri, pendarahan, kemerahan, hematoma, pigmentasi_abnormal, 
					jaringan_perut, nekrosis, abrasi_kornea, suhu_kulit, sensasi, tekstur, pertumbuhan_rambut, created_by, created_dttm) values 
					('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$elastisitas."', '".$hidrasi."', '".$perfusi_jaringan."', 
					'".$kerusakan_jaringan."', '".$kerusakan_lapisan."', '".$nyeri."', '".$pendarahan."', '".$kemerahan."', '".$hematoma."', 
					'".$pigmentasi_abnormal."', '".$jaringan_perut."', '".$nekrosis."', '".$abrasi_kornea."', '".$suhu_kulit."', '".$sensasi."', 
					'".$tekstur."', '".$pertumbuhan_rambut."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0148($newDiagRecordNumber, $durasi_intervensi, $menggigil, $kulit_merah, $kejang, $akrosianosis, $konsumsi_oksigen, $piloereksi, $vasokonstriksi_perifer, $kutis_memorata, $pucat, $takikardi, $takipnea, $bradikardi, $dasar_kuku_sianotik, $hipoksia, $suhu_tubuh, $suhu_kulit, $glukosa_darah, $pengisian_kapiler, $ventilasi, $tekanan_darah, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0148_record (diag_master_record_id, intervensi_duration, menggigil, kulit_merah, kejang, 
			akrosianosis, konsumsi_oksigen, piloereksi, vasokonstriksi_perifer, kutis_memorata, pucat, takikardi, takipnea, bradikardi, 
			dasar_kuku_sianotik, hipoksia, suhu_tubuh, suhu_kulit, glukosa_darah, pengisian_kapiler, ventilasi, tekanan_darah, 
			created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menggigil."', '".$kulit_merah."', 
			'".$kejang."', '".$akrosianosis."', '".$konsumsi_oksigen."', '".$piloereksi."', '".$vasokonstriksi_perifer."', 
			'".$kutis_memorata."', '".$pucat."', '".$takikardi."', '".$takipnea."', '".$bradikardi."', '".$dasar_kuku_sianotik."', 
			'".$hipoksia."', '".$suhu_tubuh."', '".$suhu_kulit."', '".$glukosa_darah."', '".$pengisian_kapiler."', '".$ventilasi."', 
			'".$tekanan_darah."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function saveLuaranKeperawatand0149($newDiagRecordNumber, $durasi_intervensi, $menggigil, $kulit_merah, $kejang, $akrosianosis, $konsumsi_oksigen, $piloereksi, $vasokonstriksi_perifer, $kutis_memorata, $pucat, $takikardi, $takipnea, $bradikardi, $dasar_kuku_sianotik, $hipoksia, $suhu_tubuh, $suhu_kulit, $glukosa_darah, $pengisian_kapiler, $ventilasi, $tekanan_darah, $created_by, $created_dttm) {
			$sql = "insert into t_luaran_keperawatan_d0149_record (diag_master_record_id, intervensi_duration, menggigil, kulit_merah, kejang, 
					akrosianosis, konsumsi_oksigen, piloereksi, vasokonstriksi_perifer, kutis_memorata, pucat, takikardi, takipnea, bradikardi, 
					dasar_kuku_sianotik, hipoksia, suhu_tubuh, suhu_kulit, glukosa_darah, pengisian_kapiler, ventilasi, tekanan_darah, 
					created_by, created_dttm) values ('".$newDiagRecordNumber."', '".$durasi_intervensi."', '".$menggigil."', '".$kulit_merah."', 
					'".$kejang."', '".$akrosianosis."', '".$konsumsi_oksigen."', '".$piloereksi."', '".$vasokonstriksi_perifer."', 
					'".$kutis_memorata."', '".$pucat."', '".$takikardi."', '".$takipnea."', '".$bradikardi."', '".$dasar_kuku_sianotik."', 
					'".$hipoksia."', '".$suhu_tubuh."', '".$suhu_kulit."', '".$glukosa_darah."', '".$pengisian_kapiler."', '".$ventilasi."', 
					'".$tekanan_darah."', '".$created_by."', '".$created_dttm."')";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function savechckbxDiagnosa($row, $newDiagRecordNumber, $created_by, $created_dttm) {
			$sql = "insert into t_detail_diagnosa_record (diag_record_value, diag_master_record_id, created_by, created_dttm) 
					values ('".$row."', '".$newDiagRecordNumber."', '".$created_by."', '".$created_dttm."');";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function savechckbxIntervensi($rowInt, $newDiagRecordNumber, $created_by, $created_dttm) {
			$sql = "insert into t_detail_intervensi_record (intervensi_record_value, diag_master_record_id, created_by, created_dttm) 
					values ('".$rowInt."', '".$newDiagRecordNumber."', '".$created_by."', '".$created_dttm."');";
			$query = $this->db->query($sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function getTotalGejalaMayor($masterFormDiag) {
			$sql = "select count(a.checkbox_diagnosa_keperawatan_id) as total_gejala_mayor 
					from t_checkbox_diagnosa_keperawatan as a 
					left join t_sub_diagnosa_keperawatan as b on a.sub_diagnosa_keperawatan_id = b.sub_diagnosa_keperawatan_id 
					left join t_diagnosa_keperawatan as c on b.diag_keperawatan_id = c.diag_keperawatan_id 
					where c.diagnosa_form_id = '".$masterFormDiag."' and (c.diag_keperawatan_name = 'Gejala dan Tanda Mayor;' 
					or c.diag_keperawatan_name = 'Gejala dan tanda Mayor;' or c.diag_keperawatan_name = 'Gejala dan tanda mayor;')";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$rows = $query->row();
                $total_gejala_mayor = $rows->total_gejala_mayor;

                return $total_gejala_mayor;
			} else {
				return false;
			}
		}
	}
?>
