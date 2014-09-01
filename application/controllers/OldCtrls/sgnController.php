<?php
	class sgnController extends CI_controller {

		function index() {

			$this->load->view('headerSinSlider');
			$this->load->view('sgnView');
			$this->load->view('footer');

			$data = array();
			$flagEqPass = 0;
			$flagEmpty = 0;
			$flagExists = 1;

			if(!empty($_POST)){
			$data = array('username' => $this->input->post('Username'),
						  'idMunicipio' => 19,//$this->input->post('Municipio'),
						  'Avatar' => $this->input->post('Avatar'),
						  'SitioWeb' => $this->input->post('Web'),
						  'Correo' => $this->input->post('Correo'),
						  'Password' => $this->input->post('Pass'),
						  'Biografia' => $this->input->post('Bio')); 
			}

			$this->load->model('sgnModel');
		
			// Aquí comprobamos que el usuario no exista en la db para poder crearlo.
			if(!empty($_POST)){
				$existe = $this->sgnModel->checkUser($data['username']);
				if($existe == 0){  // Si el usuario no existe.
					$flagExists = 0;
				}
				else{
					echo "El usuario '".$data['username']."' ya está registrado en el sistema.<br>";
				}
			}

			// Aquí comprobamos que no sean iguales las passwords y que no sean vacías
			if(!empty($_POST)){
				$pass = $data['Password'];
				$rPass = $this->input->post('rPass');			
				if(strcmp($pass, $rPass) == 0 and strcmp($pass, "") != 0){
					$flagEqPass = 1;
				}
				else
					echo "Las passwords no son iguales o están vacías.<br>";
			}

			// Verificación de datos vacíos. 
			if(!empty($_POST)){			
				if(strcmp($data['username'], "") == 0 or strcmp($data['Correo'], "") == 0){
					$flagEmpty = 1;
					echo "El usuario y el correo no pueden estar vacíos.<br>";
				}	
			} 

			// Si pasa las duras pruebas de aquí, un usuario se da de alta.
			if(!empty($_POST) and $flagEqPass == 1 and $flagExists == 0 and $flagEmpty == 0){
				$this->sgnModel->insertUser($data);
				echo "Usuario '".$data['username']."' registrado correctamente.";
				// Rediccionamiento al dashboard del usuario.
			}	
		}
	}
?>