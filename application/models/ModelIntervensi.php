<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class ModelIntervensi extends CI_Model {
		public function getAllInt($new_diag_record_number) {
			$sql = "select a.*, b.intervensi_keperawatan_name, b.mapping_int_id, b.intervensi_status 
					from t_detail_intervensi_record as a 
					left join t_intervensi_keperawatan as b on a.intervensi_record_value = b.intervensi_keperawatan_id 
                    where a.diag_master_record_id = '".$new_diag_record_number."' 
					and intervensi_fill_status = '0'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

        public function getSubIntervensi($form_intervensi_id) {
			$sql = "select * from t_master_sub_intervensi_keperawatan where intervensi_keperawatan_id = '".$form_intervensi_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

        public function getCheckboxIntervensi($sub_intervensi_id) {
			$sql = "select * from t_checkbox_sub_intervensi where sub_intervensi_id = '".$sub_intervensi_id."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function saveIntervensi($row, $int_record_id, $created_by, $created_dttm) {
			$sql = "insert into t_record_checkbox_intervensi (int_checkbox_value, intervensi_record_id, created_by, created_dttm) 
					values ('".$row."', '".$int_record_id."', '".$created_by."', '".$created_dttm."');";
			$query = $this->db->query($sql);
			if ($query) {
				$sql = "update t_detail_intervensi_record set intervensi_fill_status = '1' 
						where intervensi_record_id = '".$int_record_id."'";
				$query = $this->db->query($sql);
				if ($query) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function saveLatihanBatuk($row, $master_diag_record_number, $int_record_id, $created_by, $created_dttm) {
			$sql = "insert into t_record_latihanbatuk (lat_batuk_record_value, diag_master_record_id, created_by, created_dttm) 
					values ('".$row."', '".$master_diag_record_number."', '".$created_by."', '".$created_dttm."');";
			$query = $this->db->query($sql);
			if ($query) {
				$sql = "update t_detail_intervensi_record set intervensi_fill_status = '1' 
						where intervensi_record_id = '".$int_record_id."'";
				$query = $this->db->query($sql);
				if ($query) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function saveManajemenJalanNafas($row, $master_diag_record_number, $int_record_id, $created_by, $created_dttm) {
			$sql = "insert into t_record_manajemenjalannafas (manajemen_nafas_record_value, diag_master_record_id, created_by, 
					created_dttm) values ('".$row."', '".$master_diag_record_number."', '".$created_by."', '".$created_dttm."');";
			$query = $this->db->query($sql);
			if ($query) {
				$sql = "update t_detail_intervensi_record set intervensi_fill_status = '1' 
						where intervensi_record_id = '".$int_record_id."'";
				$query = $this->db->query($sql);
				if ($query) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function savePemantauanRespirasi($row, $master_diag_record_number, $int_record_id, $created_by, $created_dttm) {
			$sql = "insert into t_record_pemantauanrespirasi (pem_respirasi_record_value, diag_master_record_id, created_by, created_dttm) 
					values ('".$row."', '".$master_diag_record_number."', '".$created_by."', '".$created_dttm."');";
			$query = $this->db->query($sql);
			if ($query) {
				$sql = "update t_detail_intervensi_record set intervensi_fill_status = '1' 
						where intervensi_record_id = '".$int_record_id."'";
				$query = $this->db->query($sql);
				if ($query) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
	}
?>
