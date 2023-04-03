<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class ModelAuth extends CI_Model {
		public function getAllDataUserSession($user_id) {
			$sql = "select a.id, a.user_id, b.user_fullname, c.unit_name from t_m_user as a 
					left join t_d_user as b on b.user_id = a.user_id 
					left join t_unit as c on c.unit_id = b.user_unit
					where a.user_id = '$user_id'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getid($user_id) {
			$sql = "select id from t_m_user where user_id = '$user_id'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$rows	= $query->row();
				$id  	= $rows->id;
				return $id;
			} else {
				return false;
			}
		}
		
		public function getuserstatus($user_id) {
			$sql = "select user_status from t_m_user where user_id = '$user_id'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$rows			= $query->row();
				$user_status	= $rows->user_status;
				return $user_status;
			} else {
				return false;
			}
		}

		public function getmaxuser_id() {
			$sql = "SELECT max(user_id) as maxID FROM t_m_user";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$rows	= $query->row();
				$maxID  = $rows->maxID;
				$getNumberID = (int) substr($maxID, 5, 3);
				$getNumberID = $getNumberID + 1;

				$code = "USER_";
				$getUserID = $code . sprintf("%03s", $getNumberID);

				return $getUserID;
			} else {
				return false;
			}
		}
	}
?>
