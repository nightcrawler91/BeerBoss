<?php
	class paisModel extends CI_Model
	{
		function get_nombre_pais( $idPais ) {
			$sql = "select * from paises where idPais = ?";
			$q = $this->db->query($sql, $idPais);
			$row = $q->row_array();

			return $row;
		}

		function get_mep( $idMunicipio ) {
			$sql = "select m.Descripcion as mdesc, e.Descripcion as edesc, p.Descripcion as pdesc from municipios m Inner Join estados e on m.idEstado = e.idEstado Inner Join paises p on e.idPais = p.idPais where idMunicipio = ?";
			$q = $this->db->query($sql, $idMunicipio);
			$row = $q->row_array();

			return $row;
		}

		function get_paises() {
			$sql = "select * from paises";
			$q = $this->db->query($sql);
			for ($i=0; $i<$q->num_rows(); $i++) $row[] = $q->row_array($i);
			return $row;
		}
	}
?>