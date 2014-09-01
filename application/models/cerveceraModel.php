<?php 
	class cerveceraModel extends CI_Model {

		function get_cerveceras () { 
			$sql = "select * from cervecera";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";	
		}

		function put_cervecera ( $datos ) {
			$this->db->insert('cervecera', $datos);
		}

		function get_max_n () {
			$sql = "select max(idCervecera) as max from cervecera";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				return $q->row()->max;
			} else return 0;	
		}

	}
?>