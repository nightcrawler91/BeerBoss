<?php
class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('form', 'url'));
	}

	function index()
	{
		// $this->load->view('upload_form', array('error' => ' ' ));
	}

	//$aux;

	function preupload($numero){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		do_upload($numero);
	}
	

	function do_upload($aux)
	{
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$location = "Location: ".base_url()."bb/perfil_cerveza?idCheve=".($aux);
			header($location); /* Redirect browser */
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}
?>