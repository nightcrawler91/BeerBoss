<?php 
	class tagModel extends CI_Model {

		function get_tags ( $idCheve ) {
			$sql = "select t.descripcion from cerv_tag c inner join tag t on c.idTag = t.idTag where c.idCheve = ?";
			$q = $this->db->query($sql, $idCheve);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}
	}
 ?>