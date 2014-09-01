<?php
	class calificaModel extends CI_Model {
		function get_calif_global( $idCheve ) {
			$sql = "select (Aroma+Apariencia+Sabor+Cuerpo+CGeneral) as total from califica where idCheve = ?";
			$q = $this->db->query( $sql, $idCheve );
			$cal = 0;

			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				for ( $j=0; $j<sizeof($row); $j++) { $cal += $row[$j]['total']; }
				return $cal/sizeof($row);
			} else return 0;
		}

		function get_cbd ( $idCheve ) {
			$sql = "select avg(Aroma) as Aroma, avg(Apariencia) as Apariencia, avg(Sabor) as Sabor, avg(Cuerpo) as Cuerpo, avg(CGeneral) as CGeneral from califica where idCheve = ?";
			$q = $this->db->query($sql, $idCheve);
			return $q->row_array();
		}

		function get_calif( $idCheve ) {
			$sql = "select c.idCheve, c.username, d.nombre, c.Fecha, Aroma, Apariencia, Sabor, Cuerpo, CGeneral as General, Comentario, Upvotes, Downvotes from califica c inner join cervezas d on c.idCheve=d.idcheve where d.idCheve = ?";
			$q = $this->db->query( $sql, $idCheve );
			
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function get_comments_n( $idCheve ) {
			$sql = "select count(idCalificacion) as count from califica where idCheve = ?";
			$q = $this->db->query($sql, $idCheve);
			if ($q->num_rows() > 0)	{
				return $q->row()->count;
			} else return 0;
		 }

		function get_calif_usr( $username ) {
			$sql = "select c.idCheve, d.nombre, c.Fecha, Aroma, Apariencia, Sabor, Cuerpo, CGeneral as General, Comentario from califica c inner join cervezas d on c.idCheve=d.idcheve where c.username = ?";
			$q = $this->db->query( $sql, $username );
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function put_calif($data) {
			$this->db->insert('califica', $data);
		}

		function put_upvote($idCheve, $username) {
			$data[] = $idCheve;
			$data[] = $username;

			$sql = "update califica set upvotes = upvotes + 1 where idCheve = ? and username = ?";
			$q = $this->db->query($sql, $data);
		}
		
		function put_downvote($idCheve, $username) {
			$data[] = $idCheve;
			$data[] = $username;

			$sql = "update califica set Downvotes = Downvotes + 1 where idCheve = ? and username = ?";
			$q = $this->db->query($sql, $data);
		}
	}
?>