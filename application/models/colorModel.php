<?php 
	class colorModel extends CI_Model {
		function get_color( $idColor ) {
			$sql = "select * from colores where idColor = ?";
			$q = $this->db->query( $sql, $idColor );
			$row = $q->row_array();

			return $row;
		}

		function get_colores() { 
			$sql = "select * from colores";
			$q = $this->db->query($sql);
			
			for ($i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
			return $row;
		}
	}	
?>