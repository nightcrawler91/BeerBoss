<?php
	class logInController extends CI_Controller{

		function index(){
			$this->load->view('headerSinSlider');
			$this->load->view('logInView');
			$this->load->view('footer');
			
			$data = array();
			$flagEmpty = 0;
			$flagExists = 1;
			
			if(!empty($_POST)){
				$data = array('username' => $this->input->post('Username'),
							  'Password' => $this->input->post('Pass')); 
			}

			$this->load->model('logInModel');

			// Verificación de datos vacíos. 
			if(!empty($_POST)){			
				if(strcmp($data['username'], "") == 0 or strcmp($data['Password'], "") == 0){
					$flagEmpty = 1;
					echo "El usuario o la contraseña no pueden estar vacíos.<br>";
				}	
			} 

			// Aquí comprobamos que el usuario exista en la db.
			if(!empty($_POST) and $flagEmpty != 1){
				$exists = $this->logInModel->checkUser($data['username']);
				if($exists == 0){  // Si el usuario no existe.
					$flagExists = 0;
					echo "El usuario '".$data['username']."' no está registrado en el sistema.<br>";
				}
			}

			// Aquí hacemos la validación de si hacen match la contraseña dada con la de la db.
			if(!empty($_POST) and $flagEmpty == 0 and $flagExists == 1){
				$valid = $this->logInModel->validateUP($data['username'], $data['Password']);
				// echo $valid;
				if($valid == 1){
					// Redirigir a dashboard, crear variables de sesión.
					echo "¡Bienvenido a BeerBoss!";
				}
				else if($valid == 0){
					echo "Usuario o contraseña no válidos.";
				}
			}
		}
	}
?>