<?php
	class usuarioModel extends CI_Model {

		function get_usuario( $username ) {
			$sql = "select * from usuarios where username = ?";
			$q = $this->db->query($sql, $username);
			$row = $q->row_array();
			
			return $row;
		}

		function des_usuario( $username ) {
			$des = array('habilitado' => 0);

			$this->db->where('username', $username);
			$this->db->update('usuarios', $des); 
		}

		function act_usuario( $username ) {
			$des = array('habilitado' => 1);

			$this->db->where('username', $username);
			$this->db->update('usuarios', $des); 
		}

		function get_exist_act( $username ) {
			$sql = "select habilitado from usuarios where username = ?";
			$q = $this->db->query($sql, $username);
			$row = $q->row_array();
			if ($q->num_rows() > 0)	{
				if($row['habilitado'] == 1) return 1; // Usuario existe y está activado.
				else return 0; // Usuario existe pero está desactivado.
			} return 0; // Usuario no existe.
		}

		function validateUP($username, $passwd) {
			$sql = "select password from usuarios where username = ?";
			$q = $this->db->query($sql, $username);
			$row = $q->row();
			if(strcmp($passwd, $row->password) == 0) return 1;  // Si ambos son iguales 
			else return 0;
		}

		function userSession( $username ) {
			$sql = "select u.username, l.descripcion, u.fbid from usuarios u Inner Join usr_rol r on u.username = r.username Inner Join roles l on l.idRol = r.idRol where u.username = ?";
			$q = $this->db->query($sql, $username);
			$row = $q->row_array();
			return $row;
		}

		function insertUser($data) {
			$q = $this->db->insert('usuarios', $data);
		}

		function check_user($username) {
			$sql = "select * from usuarios where username = ?";
			$q = $this->db->query($sql, $username);
			if($q->num_rows() == 0) return 0; 
			else return 1;
		}

		function check_fbid( $fbid ) {
			$sql = "select * from usuarios where fbid like ?";
			$q = $this->db->query($sql, $fbid);
			if($q->num_rows() == 0) return 0; // Si no existe
			else return $q->row_array();
		}

		function actualiza_usuario ( $username, $datos ) {
			$this->db->where('username', $username);
			$this->db->update('usuarios', $datos);
		}
	}
?>