<?php
	class acervezaController extends CI_Controller
	{
		function index () 
		{
			$this->load->model('estiloSFModel');
			$this->load->model('paisModel');

			$bleh = array('meh' => 'Meh',
										'juaz' => 'jeje',
										'meth' => 'jpjp',
										'juaze' => 'asdas',
										'lol' => 'asdasd',
										'kyol' => 'asdkjlasd',
			);

			$data['bleh'] = $bleh;

			// SEF
			$data['Subestilos'] = $this->estiloSFModel->get_s();
			$data['Estilos'] = $this->estiloSFModel->get_e();
			$data['Familias'] = $this->estiloSFModel->get_f();
			$data['Paises'] = $this->paisModel->get_paises(); // Países
			
			$this->load->view('headerSinSlider');
			$this->load->view('altaCerveza', $data);
			$this->load->view('footer');

			if ( isset($_POST['Nombre']) )
			{


			}
		}
	}
?>