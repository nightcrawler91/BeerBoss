<?php
	class solicitudController extends CI_Controller
	{
		function index()
		{
			$this->load->model('solicitudModel');
			$this->load->view('solicitud');

			if ( isset($_POST['Motivo']) )
			{
				$d_mot = $this->input->post();
				$data = array('username' => 'Eduardo', 'motivo' => $d_mot['Motivo']);

				$this->solicitudModel->put_solicitud($data);
			}
		}
	}
?>