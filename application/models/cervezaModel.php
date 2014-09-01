<?php
	class cervezaModel extends CI_Model	{
		function get_cerveza( $idCerveza ) {
			$sql = "select c.idCheve, c.idCervecera, c.idSubEstilo, c.idPais, c.idColor, c.nombre, c.IBU, c.ABV, c.Descripcion, c.username, c.gusto, c.desagrado, c.fecha, ce.descripcion as cdesc, habilitado, tags from cervezas c inner join cervecera ce on c.idCervecera = ce.idCervecera where idCheve = ?";
			$q = $this->db->query( $sql, $idCerveza );
			if ($q->num_rows() > 0)	{
				$row = $q->row_array();
				return $row;
			} else return "";
		}

		function put_cerveza( $datos ) {
			$this->db->insert('cervezas', $datos);
		}

		function act_cerveza( $datos ) {
			$this->db->where('idCheve', $datos['idCheve']);
			$this->db->update('cervezas', $datos);
		}

		function desact_cerveza( $idCheve ) {
			$des = array('habilitado' => '0');
			$this->db->where('idCheve', $idCheve);
			$this->db->update('cervezas', $des); 
		}

		function activar_cerveza($idCheve) {
			$des = array('habilitado' => '1');
			$this->db->where('idCheve', $idCheve);
			$this->db->update('cervezas', $des); 
		}

		function get_ncervezas() {
			$sql = "select count(idCheve) as cuenta from cervezas";
			$q = $this->db->query($sql);
			$row = $q->row()->cuenta;

			return $row;
		}

		function get_exist_act($idCheve) {
			$sql = "select habilitado from cervezas where idCheve = ?";
			$q = $this->db->query($sql, $idCheve);
			$row = $q->row_array();
			if ($q->num_rows() > 0)	{
				if($row['habilitado'] == 1) return 1; // Cerveza existe y está activada.
				else return 0; // Cerveza existe pero está desactivada.
			} return 0; // Cerveza no existe.
		}

		function get_random($idCheve) {
			while (1) {
				$rand = rand(1, $this->get_ncervezas());
				if ($rand != $idCheve) if ($this->get_exist_act($rand) == 1) break;
			} return $rand;
		}

		function get_random_dmb() {
			$cerv = array();
			for ($i=0; $i<=15; $i++) {
				$cerv[$i] = rand(1, $this->get_ncervezas());
				if ($this->get_exist_act($cerv[$i]) != 1) $i--;
				else $cer[] = $this->get_cerveza($cerv[$i]);
			}
			return $cer;
		}

		function get_top() { 
			$sql = "select c.idCheve, c.idCervecera, c.idSubEstilo, c.idPais, c.idColor, c.nombre, c.IBU, c.ABV, c.Descripcion, c.username, c.gusto, c.desagrado, c.fecha, ce.descripcion as cdesc, habilitado from cervezas c inner join cervecera ce on c.idCervecera = ce.idCervecera order by idCheve desc limit 0, 15";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function get_comentadas() { 
			$sql="select ce.idCheve, ce.nombre, count(ca.idCheve) as ccom from cervezas ce, califica ca where ce.idCheve = ca.idCheve group by ce.idCheve order by count(ca.idCheve) desc limit 0, 15;";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function get_mayor_cal() {
			$sql = "select c.idCheve, c.nombre, avg(Aroma+Apariencia+Sabor+Cuerpo+CGeneral) as total from califica ca inner join cervezas c on ca.idCheve = c.idCheve group by c.nombre order by total desc limit 0, 15";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}

		function get_menor_cal() {
			$sql = "select c.idCheve, c.nombre, avg(Aroma+Apariencia+Sabor+Cuerpo+CGeneral) as total from califica ca inner join cervezas c on ca.idCheve = c.idCheve group by c.nombre order by total asc limit 0, 15";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return "";
		}


		function search_by_name ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c where nombre like '%".$word."%'";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();			
		}

		function search_by_style ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c inner join subestilos s on s.idSubEstilo = c.idSubEstilo inner join estilos e on s.idEstilo = e.idEstilo inner join familias f on e.idFamilia = f.idFamilia where (s.descripcion like '%".$word."%' or e.descripcion like '%".$word."%' or f.descripcion like '%".$word."%')";
			$q = $this->db->query($sql);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();	

		}

		function search_by_tag ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c inner join cerv_tag ct on c.idCheve = ct.idCheve inner join tag t on t.idTag = ct.idTag where t.descripcion like '%".$word."%'";
			$q = $this->db->query($sql, $word);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();
		}

		function search_by_company ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c inner join cervecera ce on ce.idCervecera = c.idCervecera where ce.descripcion like '%".$word."%'";
			$q = $this->db->query($sql, $word);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();
		}

		function search_by_country ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c inner join paises p on c.idPais = p.idPais where p.descripcion like '%".$word."%'";
			$q = $this->db->query($sql, $word);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();
		}

		function search_by_description ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c where descripcion like '%".$word."%'";
			$q = $this->db->query($sql, $word);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();
		}

		function search_by_user ( $word ) {
			$sql = "select c.idCheve, c.nombre, c.Descripcion as cdesc, c.username, c.fecha from cervezas c where username like '%".$word."%'";
			$q = $this->db->query($sql, $word);
			if ($q->num_rows() > 0)	{
				for ( $i=0; $i<$q->num_rows(); $i++) { $row[] = $q->row_array($i); }
				return $row;
			} else return array();
		}
	}
?>