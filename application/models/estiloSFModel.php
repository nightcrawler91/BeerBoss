<?php
	class estiloSFModel extends CI_Model {
		function get_sef( $idSubEstilo ) {
			$sql = "Select s.Descripcion as sdesc, e.Descripcion as edesc, f.Descripcion as fdesc from subestilos s Inner Join estilos e on s.idEstilo = e.idEstilo Inner Join familias f on e.idFamilia = f.idFamilia where idSubEstilo = ?";
			$q = $this->db->query( $sql, $idSubEstilo );
			$row = $q->row_array();

			return $row;
		}

		function get_all() {
			$sql = "select s.idSubEstilo, s.descripcion as sdesc, e.idEstilo, e.descripcion as edesc, f.idFamilia, f.descripcion as fdesc from subestilos s inner join estilos e on s.idEstilo = e.idEstilo inner join familias f on e.idFamilia = f.idFamilia";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}

		function get_s() {
			$sql = "select * from subestilos";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}

		function get_e() {
			$sql = "select * from estilos";
			$q = $this->db->query( $sql );
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}

		function get_f() {
			$sql = "select * from familias";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}

		// Obtiene todos los subestilos de un estilo
		function get_si( $idEstilo ) {
			$sql = "select * from subestilos where idEstilo = ?";
			$q = $this->db->query( $sql, $idEstilo );
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}

		// Obtiene todos los estilos de una familia
		function get_ei( $idFamilia ) {
			$sql = "select * from estilos where idFamilia = ?";
			$q = $this->db->query( $sql, $idFamilia );
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}
	}
?>