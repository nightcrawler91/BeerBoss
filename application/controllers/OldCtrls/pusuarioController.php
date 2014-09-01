<?php
	class pusuarioController extends CI_Controller
	{
		function index()
		{
			$this->load->model('usuarioModel');
			$this->load->model('favdesModel');
			$this->load->model('calificaModel');
			$this->load->model('paisModel');
			$this->load->model('rolModel');
			
			// Datos de usuario
			$d_usuario = $this->usuarioModel->get_usuario('Eduardo');
			print_r($d_usuario);
			echo '</br>';
			echo '</br>';

			// Favoritos
			$d_fav = $this->favdesModel->get_favs($d_usuario['username']);
			print_r($d_fav);
			echo '</br>';
			echo '</br>';

			// Desfavoritos
			$d_des = $this->favdesModel->get_dfavs($d_usuario['username']);
			print_r($d_des);
			echo '</br>';
			echo '</br>';

			// Calificaciones del usuario
			$d_cal = $this->calificaModel->get_calif_usr($d_usuario['username']);
			print_r($d_cal);
			echo '</br>';
			echo '</br>';

			// Municipio, estado y país del usuario
			$d_mep = $this->paisModel->get_mep($d_usuario['idMunicipio']);
			print_r($d_mep);
			echo '</br>';
			echo '</br>';

			// Obtenemos rol de usuario
			$d_rol = $this->rolModel->get_rol($d_usuario['username']);
			print_r($d_rol);
			echo '</br>';
			echo '</br>';
		}
	}

?>