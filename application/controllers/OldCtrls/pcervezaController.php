<?php
	class pcervezaController extends CI_Controller
	{
		function index()
		{
			$this->load->model('cervezaModel');
			$this->load->model('paisModel');
			$this->load->model('colorModel');
			$this->load->model('calificaModel');
			$this->load->model('estiloSFModel');

			$d_cerveza = $this->cervezaModel->get_cerveza('1');

			$datos['Cerveza'] = $this->cervezaModel->get_cerveza('1');

			$datos['Pais'] = $this->paisModel->get_nombre_pais($d_cerveza['idPais']);

			$datos['Color'] = $this->colorModel->get_color($d_cerveza['idColor']);

			$datos['CalificacionGlobal'] = $this->calificaModel->get_calif_global($d_cerveza['idCheve']);

			$datos['Calificaciones'] =$this->calificaModel->get_calif($d_cerveza['idCheve']);

			$datos['Subestilo'] = $this->estiloSFModel->get_sef($d_cerveza['idSubEstilo']);

			$this->load->view('headerSinSlider');
			$this->load->view('perfilCerveza', $datos);
			$this->load->view('footer');
		}
	}