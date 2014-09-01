<?php
	class favdesModel extends CI_Model {
		function get_favs($username) {
			$sql = "select c.idCheve as id, c.nombre, p.descripcion as pdesc, s.Descripcion as sdesc, e.Descripcion as edesc, f.Descripcion as fdesc from cervezas c Inner Join paises p on c.idPais = p.idPais  Inner Join subestilos s on c.idSubEstilo = s.idSubEstilo Inner Join estilos e on s.idEstilo = e.idEstilo Inner Join familias f on e.idFamilia = f.idFamilia Inner Join fav_des fd on c.idCheve = fd.idCheve where fd.username = ? and eleccion = 'F'";
			$q = $this->db->query($sql, $username);
			if ($q->num_rows() > 0)	{
				for($i = 0; $i < $q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function get_dfavs($username) {
			$sql = "select c.idCheve as id, c.nombre, p.descripcion as pdesc, s.Descripcion as sdesc, e.Descripcion as edesc, f.Descripcion as fdesc from cervezas c Inner Join paises p on c.idPais = p.idPais  Inner Join subestilos s on c.idSubEstilo = s.idSubEstilo Inner Join estilos e on s.idEstilo = e.idEstilo Inner Join familias f on e.idFamilia = f.idFamilia Inner Join fav_des fd on c.idCheve = fd.idCheve where fd.username = ? and eleccion = 'D'";
			$q = $this->db->query($sql, $username);
			if ($q->num_rows() > 0)	{
				for($i = 0; $i < $q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function make_fav($idCheve, $username) {
			$sql = "select * from fav_des where idCheve = ? and username = ?";
			$params[] = $idCheve;
			$params[] = $username;
			$q = $this->db->query( $sql, $params);
			if($q->num_rows() == 0) {
				$data = array ('idCheve' => $idCheve, 'username'=> $username, 'eleccion' => 'F');
				$this->db->insert('fav_des', $data);
			}
			else {
				$fav = array('Eleccion' => 'F');
				$this->db->where('idCheve', $idCheve);
				$this->db->where('username', $username);
				$this->db->update('fav_des', $fav); 	
			}
		}

		function make_neutral($idCheve, $username) {
			$sql = "select * from fav_des where idCheve = ? and username = ?";
			$params[] = $idCheve;
			$params[] = $username;
			$q = $this->db->query($sql, $params);
			if($q->num_rows() == 0) {
				$data = array ('idCheve' => $idCheve, 'username'=> $username, 'eleccion' => 'N');
				$this->db->insert('fav_des', $data);
			}
			else {
				$neu = array('Eleccion' => 'N');
				$this->db->where('idCheve', $idCheve);
				$this->db->where('username', $username);
				$this->db->update('fav_des', $neu); 	
			}
		}

		function make_dfav($idCheve, $username) {
			$sql = "select * from fav_des where idCheve = ? and username = ?";
			$params[] = $idCheve;
			$params[] = $username;
			$q = $this->db->query( $sql, $params);
			if ($q->num_rows() === 0) {
				$data = array ('idCheve' => $idCheve, 'username'=> $username, 'eleccion' => 'D');
				$this->db->insert('fav_des', $data);
			}
			else {
				$fav = array('Eleccion' => 'D');
				$this->db->where('idCheve', $idCheve);
				$this->db->where('username', $username);
				$this->db->update('fav_des', $fav); 	
			}
		}

		function get_status ( $idCheve, $username ) {
			$sql = "select eleccion from fav_des where idCheve = ? and username = ?";
			$q = $this->db->query( $sql, array($idCheve, $username));

			if ($q->num_rows() > 0)	{
				$row = $q->row()->eleccion;
				return $row;
			} else return "N";
		}
	}