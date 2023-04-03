<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class ModelPatient extends CI_Model {
		public function getMasterDiagRecordByPatient($mr_no) {
			$sql = "select created_dttm from t_master_diagnosa_record where patient_mr = '".$mr_no."' group by date(created_dttm) order by created_dttm desc";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getDiagPatient($mr_no, $date) {
			$sql = "select a.master_diagnosa_record_id, a.master_form_diagnosa, a.created_by, a.created_dttm, b.diagnosa_form_name 
					from t_master_diagnosa_record as a 
					left join t_m_diagnosa_form as b on a.master_form_diagnosa = b.diagnosa_form_id 
					where a.patient_mr = '".$mr_no."' and date(a.created_dttm) = '".$date."' order by a.created_dttm desc";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getLuaranKeperawatan($master_diag_record_id) {
			$sql = "select a.*, b.intervensi_durasi_name 
					from t_luaran_keperawatan_d0001_record as a 
					left join t_master_durasi_intervensi as b on a.intervensi_duration = b.intervensi_durasi_id 
					where a.diag_master_record_id = '".$master_diag_record_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getIntKepRecord($master_diag_record_id) {
			$sql = "select * from t_detail_intervensi_record 
					where diag_master_record_id = '".$master_diag_record_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getRecordDiagnosaPatient($master_diag_record_id, $diag_keperawatan_id) {
			$sql = "select a.*, b.checkbox_diagnosa_keperawatan_name 
					FROM t_detail_diagnosa_record as a 
					left join t_checkbox_diagnosa_keperawatan as b on a.diag_record_value = b.checkbox_diagnosa_keperawatan_id  
					left join t_diagnosa_keperawatan as c on b.sub_diagnosa_keperawatan_id = c.diag_keperawatan_id
					where a.diag_master_record_id = '".$master_diag_record_id."' and c.diag_keperawatan_id = '".$diag_keperawatan_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getRecordDiagnosaPatientBySubDiagnosa($master_diag_record_id, $sub_diagnosa_keperawatan_id) {
			$sql = "select a.*, b.checkbox_diagnosa_keperawatan_name 
					FROM t_detail_diagnosa_record as a 
					left join t_checkbox_diagnosa_keperawatan as b on a.diag_record_value = b.checkbox_diagnosa_keperawatan_id  
					left join t_sub_diagnosa_keperawatan as c on b.sub_diagnosa_keperawatan_id = c.sub_diagnosa_keperawatan_id
					where a.diag_master_record_id = '".$master_diag_record_id."' and c.sub_diagnosa_keperawatan_id = '".$sub_diagnosa_keperawatan_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getDataDiagnosaPatient($master_form_diagnosa) {
			$sql = "select * from t_diagnosa_keperawatan where diagnosa_form_id = '".$master_form_diagnosa."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getIntervensiPatient($master_diag_record_id) {
			$sql = "select a.*, b.intervensi_keperawatan_name, b.intervensi_status 
					from t_detail_intervensi_record as a 
					left join t_intervensi_keperawatan as b on a.intervensi_record_value = b.intervensi_keperawatan_id 
					where a.diag_master_record_id = '".$master_diag_record_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}
?>
