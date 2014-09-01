<?php
	class rolModel extends CI_Model {
		function get_rol($username) {
			$sql = "select descripcion from roles where idRol in (select idRol from usr_rol where username = ?)";
			$q = $this->db->query($sql, $username);
			$row = "Sin rol asignado";
			if($q->num_rows() > 0){
				$row = $q->row()->descripcion;
				return $row;
			} return $row;
		}

		function vlv_embajador($username) {	
			$emb = array('idRol' => 3);

			$this->db->where('username', $username);
			$this->db->update('usr_rol', $emb); 
		}

		function vlv_usuario($username) {
			$usr = array('idRol' => 2);

			$this->db->where('username', $username);
			$this->db->update('usr_rol', $usr); 
		}

		function nuevo_usuario_rol($username) {
			$usr = array('username' => $username, 'idRol' => 2);
			$this->db->insert('usr_rol', $usr);
		}
	}