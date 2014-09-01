<?php
	class solicitudModel extends CI_Model {
		function put_solicitud($data) {
			$this->db->insert('solicitud', $data);
		}
	}
?>