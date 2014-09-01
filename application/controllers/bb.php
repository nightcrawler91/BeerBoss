<?php
class bb extends CI_Controller {
	//////////// Validaciones ////////////

	// Recibe idCheve -> valida //
	function _valida_cerveza($idCheve) {
		$this->load->model('cervezaModel');
		return $this->cervezaModel->get_exist_act($idCheve);
	}

	// Recibe usuario -> valida // 
	function _valida_usuario($username) {
		$this->load->model('usuarioModel');
		return $this->usuarioModel->get_exist_act($username); 
	}

	//////////// Bloque Usuario ////////////

	// Recibe usuario -> Desactiva //
	function _desactiva_usuario($username) {
		$this->load->model('usuarioModel');
		$this->usuarioModel->des_usuario($username);
	}

	// Recibe usuario -> Activa // 
	function _activa_usuario($username) {
		$this->load->model('usuarioModel');
		$this->usuarioModel->act_usuario($username);
	}

	// Recibe usuario -> vuelve embajador // 
	function _vuelve_embajador($username) {
		$this->load->model('rolModel');
		$this->rolModel->vlv_embajador($username);
	}

	// Recibe usuario -> vuelve usuario // 
	function _vuelve_usuario($username) {
		$this->load->model('rolModel');
		$this->rolModel->vlv_usuario($username);
	}

	//////////// Bloque FDN ////////////

	// Recibe usuario y cerveza -> vuelve favorita /
	function _fav_cerveza($idCerveza, $username) {
		$this->load->model('favdesModel');
		$this->favdesModel->make_fav($idCerveza, $username);
	}

	// Recibe usuario y cerveza -> vuelve neutral (ni favorita ni desfavorita) / 
	function _neutraliza_cerveza($idCerveza, $username) {
		$this->load->model('favdesModel');
		$this->favdesModel->make_neutral($idCerveza, $username);
	}

	// Recibe usuario y cerveza -> vuelve desfavorita / 
	function _desfav_cerveza($idCerveza, $username) {
		$this->load->model('favdesModel');
		$this->favdesModel->make_dfav($idCerveza, $username);
	}

	//////////// Activar--Desactivar ////////////

	// Recibe cerveza la activa // 
	function _activar_cerveza($idCheve) {
		$this->load->model('cervezaModel');
		$this->cervezaModel->activar_cerveza($idCheve);
	}

	// Recibe cerveza la desactiva // 
	function _desactivar_cerveza($idCheve) {
		$this->load->model('cervezaModel');
		$this->cervezaModel->desact_cerveza($idCheve);
	}
		//////////// Random ////////////

	// Devuelve número de cervezas total //
	function _numero_cervezas() {
		$this->load->model('cervezaModel');
		return $this->cervezaModel->get_ncervezas();
	}

	// Genera un número random entre 1 y # cervezas // 
	// Validado ante cervezas deshabilitadas y que sea su mismo id. // 
	// El $idCheve que recibe es para validar que no devuelva el mismo ;) //
	function _nrand($idCheve){
		$this->load->model('cervezaModel');
		return $this->cervezaModel->get_random($idCheve);
	}

	//////////// Bloque Calificación ////////////

	// Agrega voto a calificacion
	function _upvote($idCerveza, $username) {
		$this->load->model('calificaModel');
		$this->calificaModel->put_upvote($idCerveza, $username);
	}

	// Quita voto a calificacion
	function _downvote($idCerveza, $username) {
		$this->load->model('calificaModel');
		$this->calificaModel->put_downvote($idCerveza, $username);	
	}

	//////////// Bloque Calificación ////////////

	// Todo para su sidebar
	function _sidebar() {
		$this->load->model('cervezaModel');
		$this->load->model('calificaModel');

		$cerv['nuevas'] = $this->cervezaModel->get_top();
		$cerv['comentadas'] = $this->cervezaModel->get_comentadas();
		$cerv['top'] = $this->cervezaModel->get_mayor_cal();
		$cerv['down'] = $this->cervezaModel->get_menor_cal();

		for ( $i = 0; $i < sizeof($cerv['nuevas']); $i++ ) {
			$cerv['nuevas'][$i]['Global'] =round($this->calificaModel->get_calif_global($cerv['nuevas'][$i]['idCheve'], 0, PHP_ROUND_HALF_DOWN));
		}

		// Carga de la vista con los datos
		$this->load->view('sidebar', $cerv);
	}

	// Todo para su dont-miss
	function _dont_miss() {
		$this->load->model('cervezaModel');
		$cerv['dmb'] = $this->cervezaModel->get_top();
		shuffle($cerv['dmb']);
		$this->load->view('dont-miss', $cerv);
	}

	// Todo para su latest
	function _latest() {
		$this->load->model('cervezaModel');
		$this->load->model('calificaModel');

		$nc = $this->cervezaModel->get_ncervezas();
		$loc = 0;
		for ($j = $nc; $j >= ($nc-5); $j--) { 
			$cerv['nuevas'][$loc] = $this->cervezaModel->get_cerveza($j);
			$cerv['nuevas'][$loc]['Global'] = round($this->calificaModel->get_calif_global($j), 0, PHP_ROUND_HALF_DOWN);
			$loc++;
		}
		$this->load->view('latest', $cerv);
	}

	// Todo para su spotlight
	function _spotlight() {
		$this->load->model('cervezaModel');
		$this->load->model('calificaModel');
		$cerv['nuevas'] = $this->cervezaModel->get_top();
		shuffle($cerv['nuevas']);
		for ($j = 0; $j < sizeof($cerv['nuevas']); $j++) { 
			$cerv['nuevas'][$j]['Global'] = round($this->calificaModel->get_calif_global($cerv['nuevas'][$j]['idCheve'], 0, PHP_ROUND_HALF_DOWN));
			$cerv['nuevas'][$j]['Ccuenta'] = $this->calificaModel->get_comments_n($cerv['nuevas'][$j]['idCheve']);
		}
		$this->load->view('spotlight', $cerv);
	}

	// Hacer una búsqueda en el sistema
	function buscar() {
		if (isset($_GET['palabra']) && isset($_GET['tipo'])) {
			$string=str_replace("'"," ",$_GET['palabra']);
			// Carga de modelos
			$this->load->model('cervezaModel');
			$this->load->model('calificaModel');

			// Carga de datos a buscar con los distintos tipos de búsqueda
			if(!strcmp($_GET['tipo'], "nombre")) $datos['resultados'] = $this->cervezaModel->search_by_name($string);
			if(!strcmp($_GET['tipo'], "sef")) $datos['resultados'] = $this->cervezaModel->search_by_style($string);
			if(!strcmp($_GET['tipo'], "tag")) $datos['resultados'] = $this->cervezaModel->search_by_tag($string);
			if(!strcmp($_GET['tipo'], "cervecera")) $datos['resultados'] = $this->cervezaModel->search_by_company($string);
			if(!strcmp($_GET['tipo'], "pais")) $datos['resultados'] = $this->cervezaModel->search_by_country($string);
			if(!strcmp($_GET['tipo'], "desc")) $datos['resultados'] = $this->cervezaModel->search_by_description($string);
			if(!strcmp($_GET['tipo'], "usr")) $datos['resultados'] = $this->cervezaModel->search_by_user($string);

			$l = sizeof($datos['resultados']) - 1;
			for ($j = 0; $j <= $l; $j++) { 
				$datos['resultados'][$j]['Global'] = round($this->calificaModel->get_calif_global($datos['resultados'][$j]['idCheve']), 0, PHP_ROUND_HALF_DOWN);
				$datos['resultados'][$j]['Comentarios'] = $this->calificaModel->get_comments_n($datos['resultados'][$j]['idCheve']);
			}

			// Carga de vistas
			$ms['rndm'] = $this->_nrand(0);
			$this->load->view('header', $ms);
			$this->_dont_miss();
			$this->load->view('search', $datos);
			$this->load->view('footer');
		}
		else {
			// $red = "Location: ".base_url();
			// header($red);
		}
	}

	// Este método no debería ser visto por visitantes.
	function solicitud() {
		$this->load->model('solicitudModel');

		if (strcmp($this->session->userdata('username'), "") != 0) {
			$ms['rndm'] = $this->_nrand(0);
			$this->load->view('header', $ms);
			$this->_dont_miss();
			$this->load->view('solicitud');
			$this->load->view('footer');
		}
		else { // Redirige a la pantalla de login
			$this->log_in();
		}

		if (isset($_POST['Motivo'])) {
			$d_mot = $this->input->post();
			$data = array('username' => $this->session->userdata('username'), 'motivo' => $d_mot['Motivo']);
			$this->solicitudModel->put_solicitud($data);

			$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.gmail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'beerbossmx@gmail.com', // change it to yours
			  'smtp_pass' => 'beerboss42!', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('beerbossmx@gmail.com', "BeerBoss");
		$this->email->to("jrlpp91@gmail.com,eduardo.id3@gmail.com");
		$this->email->cc("beerbossmx@gmail.com");
		$this->email->subject("Solicitud de Embajador");
		$mensaje="Usuario: ".base_url()."bb/perfil_usuario?username=".$this->session->userdata('username')."\n\nMotivo: ".$d_mot['Motivo'];
		$this->email->message($mensaje);
		if(!($this->email->send())){					
			echo "Email failed";			
		}else{	
		$red = "Location: ".base_url();
		header($red);
	}
		}
	}

	function sign_up_fb() {
		if(!strcmp($this->session->userdata('username'), "")) $username = "Visitante";
    else $username = $this->session->userdata('username');

    if (strcmp($this->session->userdata('fbid'), "")) {
			// Carga de modelos
			$this->load->model('usuarioModel');
			$this->load->model('rolModel');

			// Carga de las vistas
			$ms['rndm'] = $this->_nrand(0);
			$this->load->view('header', $ms);
			$this->_dont_miss();
			$this->load->view('sgnFbView');
			$this->load->view('footer');
		}
		else if (strcmp($username, "Visitante")) {
			header("Location: ".base_url()."bb/perfil_usuario?username=".$username);
		}
		else header("Location: ".base_url());	


		if (!empty($_POST)) {
			$data = array('username' => $this->input->post('Username'),
									  'SitioWeb' => $this->input->post('Web'),
									  'Correo' => $this->input->post('Correo'),
									  'Password' => $this->input->post('Pass'),
									  'Biografia' => $this->input->post('Bio'),
									  'fbid' => $this->input->post('fbid')); 

			// Validar si usuario existe
			if ( $this->usuarioModel->check_user($data['username']) == 1) {
				echo "El usuario '".$data['username']."' ya está registrado en el sistema.</br>";
			}
			else {
				// Validar que la password sea igual
				if((strcmp($this->input->post('Pass'), $this->input->post('rPass')) != 0) || strcmp("", $this->input->post('Pass') != 0) || strcmp("", $this->input->post('rPass') != 0)) {
					// No son iguales
					echo "Las passwords no son iguales o están vacías.</br>";
				}
				else {
					if (strcmp($data['username'], "") == 0 or strcmp($data['Correo'], "") == 0) {
						echo "El usuario y el correo no pueden estar vacíos.</br>";
					}
					else {
						// Agrego usuario a la DB
						$this->usuarioModel->insertUser($data);
						// Agrego a nuevo usuario con rol 'usuario'
						$this->rolModel->nuevo_usuario_rol($data['username']);
						// Obtiene rol del usuario
						$user_data = $this->usuarioModel->userSession($data['username']);
						// Guarda los datos de la sesión
						$this->session->set_userdata('username', $user_data['username']);
						$this->session->set_userdata('rol', $user_data['descripcion']);
						// Redirección
						$red = "Location: ".base_url()."bb/perfil_usuario?username=".$data['username'];
						header($red);
					}
				}
			}
		}
	}

	// Para poderse dar de alta en el sistema
	function sign_up() {
		if(!strcmp($this->session->userdata('username'), "")) $username = "Visitante";
    else $username = $this->session->userdata('username');

		if (!strcmp($username, "Visitante")) {
			// Carga de modelos
			$this->load->model('usuarioModel');
			$this->load->model('rolModel');

			// Carga de las vistas
			$ms['rndm'] = $this->_nrand(0);
			$this->load->view('header', $ms);
			$this->_dont_miss();
			$this->load->view('sgnView');
			$this->load->view('footer');
		}
		else {
			$red = "Location: ".base_url()."bb/perfil_usuario?username=".$username;
			header($red);
		}
		if (!empty($_POST)) {

			$data = array('username' => $this->input->post('Username'),
									  'SitioWeb' => $this->input->post('Web'),
									  'Correo' => $this->input->post('Correo'),
									  'Password' => $this->input->post('Pass'),
									  'Biografia' => $this->input->post('Bio')); 

			// Validar si usuario existe
			if ( $this->usuarioModel->check_user($data['username']) == 1) {
				echo "El usuario '".$data['username']."' ya está registrado en el sistema.</br>";
			}
			else {
				// Validar que la password sea igual
				if((strcmp($this->input->post('Pass'), $this->input->post('rPass')) != 0) || strcmp("", $this->input->post('Pass') != 0) || strcmp("", $this->input->post('rPass') != 0)) {
					// No son iguales
					echo "Las passwords no son iguales o están vacías.</br>";
				}
				else {
					if (strcmp($data['username'], "") == 0 or strcmp($data['Correo'], "") == 0) {
						echo "El usuario y el correo no pueden estar vacíos.</br>";
					}
					else {
						// Agrego usuario a la DB
						$this->usuarioModel->insertUser($data);
						// Agrego a nuevo usuario con rol 'usuario'
						$this->rolModel->nuevo_usuario_rol($data['username']);
						// Obtiene rol del usuario
						$user_data = $this->usuarioModel->userSession($data['username']);
						// Guarda los datos de la sesión
						$this->session->set_userdata('username', $user_data['username']);
						$this->session->set_userdata('rol', $user_data['descripcion']);

						$b = base_url();
						$imagen = $this->input->post('imagen');
						if($imagen) {
							$this->config =  array(
				                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/upics/",
				                  'upload_url'      => $b."upics/",
				                  'allowed_types'   => "gif|jpg|png|jpeg",
				                  'overwrite'       => TRUE,
				                  'max_size'        => "2048KB",
				                  'max_height'      => "768",
				                  'max_width'       => "683",
				                  'file_name' 			=> $data['username'].".jpg"
				                );

							$this->load->library('upload', $this->config);
							if ( $this->upload->do_upload() ) { 
								$red = "Location: ".$base."bb/perfil_usuario?username=".$user_data['username'];
								header($red);
							} else echo "Error al subir el archivo";
						} else {
							// Poner imagen por default
							copy(dirname($_SERVER["SCRIPT_FILENAME"])."/upics/default.jpg", dirname($_SERVER["SCRIPT_FILENAME"])."/upics/".$data['username'].".jpg");
						}
						// Redirección
						$red = "Location: ".base_url()."bb/perfil_usuario?username=".$data['username'];
						header($red);
					}
				}
			}
		}
	}

	// Recibe username, password y valida
	function log_in() {
		if(!strcmp($this->session->userdata('username'), "")) $username = "Visitante";
    else $username = $this->session->userdata('username');
		if (!strcmp($username, "Visitante")) {
			// Carga de modelos
			$this->load->model('usuarioModel');

			// Carga de vistas
			$ms['rndm'] = $this->_nrand(0);
			$this->load->view('header', $ms);
			$this->_dont_miss();
			$this->load->view('logInView');
			$this->load->view('footer');
			
			if (!empty($_POST)) {
				$data = array('username' => $this->input->post('username'), 
											'password' => $this->input->post('pass')); 
				// Ante la vacuidad
				if(strcmp($data['username'], "") == 0 || strcmp($data['password'], "") == 0){
					echo "El usuario o la contraseña no pueden estar vacíos.<br \>";
				}	
				else {
					if ($this->usuarioModel->check_user($data['username']) == 0) {  // Si el usuario no existe.
						echo "El usuario '".$data['username']."' no está registrado en el sistema.<br \>";
					}
					else {
						if ($this->usuarioModel->validateUP($data['username'], $data['password']) == 1) { // Pass check
							// Verifica si usuario activado
							if ($this->usuarioModel->get_exist_act($data['username']) == 1) { // Usuario activado
								// Obtiene rol del usuario
								$user_data = $this->usuarioModel->userSession($data['username']);
								// Guarda los datos de la sesión
								$this->session->set_userdata('username', $user_data['username']);
								$this->session->set_userdata('rol', $user_data['descripcion']);
								if($user_data['fbid'] != 0) $this->session->set_userdata('fibd', $user_data['fbid']);

								// Redirección
								// $red="Location: ".base_url()."bb/perfil_usuario?username=".$data['username'];
								header("Location: ".base_url());	
							} else echo "Usuario deshabilitado.";
						} else echo "Contraseña inválida.";
					}
				}
			}
		} 
		else {
			$red = "Location: ".base_url()."bb/perfil_usuario?username=".$username;
			header($red);
		}
	}

	// Simple y triste destrucción de variables de sesión, redirección, cambio, transformación.
	function logout() {
		$this->session->sess_destroy();
		$red="Location: ".base_url()."bb/";
		header($red);	
	}

	// Recibe username -> perfil de ese usuario
	function perfil_usuario() {
		// Carga de variables de sesión
		if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
    if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol'); 

		if(isset($_GET['username'])) {
			// Validaciones si está activado
			if (($this->_valida_usuario($_GET['username']) == 0) && strcmp($rol, "Administrador") != 0 ) {
				$error['err'] = "Usuario inexistente o desactivado";
				$this->load->view('404', $error);
			}
			else {
				// Carga de modelos
				$this->load->model('usuarioModel');
				$this->load->model('favdesModel');
				$this->load->model('calificaModel');
				$this->load->model('paisModel');
				$this->load->model('rolModel');
				
				// Datos de usuario
				$Datos['Usuario'] = $this->usuarioModel->get_usuario($_GET['username']);
				$Datos['Favoritos'] = $this->favdesModel->get_favs($_GET['username']);
				$Datos['Desfavoritos'] = $this->favdesModel->get_dfavs($_GET['username']);
				$Datos['Calificaciones'] = $this->calificaModel->get_calif_usr($_GET['username']);
				$Datos['Geo'] = $this->paisModel->get_mep($Datos['Usuario']['idMunicipio']);
				$Datos['Rolp'] = $this->rolModel->get_rol($_GET['username']);

				// Carga de vistas
				$ms['rndm'] = $this->_nrand(0);
				$this->load->view('header', $ms);
				$this->_dont_miss();
				$this->load->view('perfilUsuario', $Datos);
				$this->load->view('footer');
			}
		}
		else { 
			$error['err'] = "Usuario inexistente o desativado";
			$this->load->view('404', $error); 
		}
		if(isset($_POST['des'])) $this->_desactiva_usuario($_GET['username']); // Botón desactivar usuario
		if(isset($_POST['act'])) $this->_activa_usuario($_GET['username']); // Botón activar usuario
		if(isset($_POST['emb'])) $this->_vuelve_embajador($_GET['username']); // Botón volver embajador a usuario
		if(isset($_POST['usr'])) $this->_vuelve_usuario($_GET['username']); // Botón volver usuario a embajador
		if(isset($_POST['elm'])) $this->_neutraliza_cerveza($_POST['neutralizar'], $_GET['username']); // Botón para eliminar cerveza de favoritos
	}

	// Recibe idCheve -> Perfil de cerveza
	function perfil_cerveza() {
		// Carga de variables de sesión
		if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
    if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol'); 

		if(isset($_GET['idCheve'])) {
			// Validación cerveza activada/existente
			if (($this->_valida_cerveza($_GET['idCheve']) == 0) && strcmp($rol, "Administrador") != 0 ) {
				$error['err'] = "Cerveza inexistente o desactivada";
				$this->load->view('404', $error); 
			}
			else {
			// Carga de modelos
				$this->load->model('cervezaModel');
				$this->load->model('paisModel');
				$this->load->model('colorModel');
				$this->load->model('calificaModel');
				$this->load->model('estiloSFModel');
				$this->load->model('tagModel');
				$this->load->model('favdesModel');

				// Carga datos de una cerveza
				$datos['Cerveza'] = $this->cervezaModel->get_cerveza($_GET['idCheve']);
				$datos['Pais'] = $this->paisModel->get_nombre_pais($datos['Cerveza']['idPais']);
				$datos['Color'] = $this->colorModel->get_color($datos['Cerveza']['idColor']);
				$datos['CalificacionGlobal'] = $this->calificaModel->get_calif_global($_GET['idCheve']);
				$datos['Calificaciones'] =$this->calificaModel->get_calif($_GET['idCheve']);
				$datos['Subestilo'] = $this->estiloSFModel->get_sef($datos['Cerveza']['idSubEstilo']);
				$datos['CalifBD'] = $this->calificaModel->get_cbd($_GET['idCheve']);
				// $datos['Tags'] = $this->tagModel->get_tags($_GET['idCheve']);
				$datos['Status'] = $this->favdesModel->get_status($_GET['idCheve'], $username);

				// // Limpieza de cache
				// $this->load->driver('cache');
				// $this->cache->clean();  // Debería limpiar el cache
				// $this->output->set_header('pragma: no-cache');
				// $this->output->set_header("CACHE-CONTROL: no-store, no-cache, most-revalidate");
				// $this->output->set_header('CACHE-CONTROL: post-check=0, pre-check=0');

				// Carga de vistas
				$ms['rndm'] = $this->_nrand($_GET['idCheve']);
				$this->load->view('header', $ms);
				$this->_dont_miss();
				$this->load->view('sharebox');
				$this->load->view('perfilCerveza2', $datos);
				$this->_sidebar();
				$this->load->view('footer');
			}
		}
		else { 
			$error['err'] = "Cerveza inexistente o desactivada";
			$this->load->view('404', $error); 
		}
		if(isset($_POST['fav'])) { $this->_fav_cerveza($_GET['idCheve'], $username); $this->perfil_cerveza(); }// Botón favear cerveza 
		if(isset($_POST['dfav'])) { $this->_desfav_cerveza($_GET['idCheve'], $username); $this->perfil_cerveza(); }// Botón desfavear cerveza
		if(isset($_POST['act']))  $this->_activar_cerveza($_GET['idCheve']);  // Botón activar cerveza
		if(isset($_POST['des'])) $this->_desactivar_cerveza($_GET['idCheve']); // Botón desactivar cerveza 
		if(isset($_POST['mod'])) { // Botón modificar cerveza 
			$red = "Location: ".base_url()."bb/actualiza_cerveza?idCheve=".$_GET['idCheve'];
			header($red);
		} 
	}

	// Recibe idCerveza -> Calificar
	function califica_cerveza() {
		// Carga de variables de sesión
		if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
    if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol'); 

		if (isset($_GET['idCheve'])) {
			if (strcmp($rol, "Visitante") != 0) {
				// Validación para existencia
				if ($this->_valida_cerveza($_GET['idCheve']) == 0) {
					$error['err'] = "Cerveza inexistente o desactivada";
					$this->load->view('404', $error); 
				}
				else {
					// Carga de modelos
					$this->load->model('cervezaModel');
					$this->load->model('paisModel');
					$this->load->model('colorModel');
					$this->load->model('estiloSFModel');
					$this->load->model('calificaModel');

					// Carga datos de una cerveza
					$datos['Cerveza'] = $this->cervezaModel->get_cerveza($_GET['idCheve']);
					$datos['Pais'] = $this->paisModel->get_nombre_pais($datos['Cerveza']['idPais']);
					$datos['Color'] = $this->colorModel->get_color($datos['Cerveza']['idColor']);
					$datos['Subestilo'] = $this->estiloSFModel->get_sef($datos['Cerveza']['idSubEstilo']);

					// Carga de las vistas
					$ms['rndm'] = $this->_nrand($_GET['idCheve']);
					$this->load->view('header', $ms);
					$this->_dont_miss();
					$this->load->view('califica2', $datos);
					$this->_sidebar();
					$this->load->view('footer');
				}
			}
			else { // Redirigir a perfil de cerveza
				$red = "Location: ".base_url()."bb/log_in";
				header($red);
			}
		}

		else {
			$error['err'] = "Cerveza inexistente o desactivada";
			$this->load->view('404', $error); 
		}

		if (isset($_POST['Aroma'])) {
			$d_all = $this->input->post();	
			$data = array (
				'idCalificacion' => '0',
				'idCheve' => $_GET['idCheve'],
				'username' => $username,
				'Aroma' => $d_all['Aroma'],
				'Apariencia' => $d_all['Apariencia'],
				'Cuerpo' => $d_all['Cuerpo'],
				'Sabor' => $d_all['Sabor'],
				'CGeneral' => $d_all['CGeneral'],
				'Comentario' => $d_all['Comentario']
				);
			$this->calificaModel->put_calif($data);
			$red = "Location: ".base_url()."bb/perfil_cerveza?idCheve=".$_GET['idCheve'];
			header($red);
		} 
	}

	// Función para agregar cervezas
	function agrega_cerveza() {
		// Carga de variables de sesión
		if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
    if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol'); 

    if (!strcmp($rol, "Embajador") || !strcmp($rol, "Administrador") ) {
			// Carga de modelos
			$this->load->model('cervezaModel');
			$this->load->model('estiloSFModel');
			$this->load->model('paisModel');
			$this->load->model('colorModel');
			$this->load->model('cerveceraModel');

			// Carga de datos
			$datos['Subestilos'] = $this->estiloSFModel->get_si(1);
			$datos['Estilos'] = $this->estiloSFModel->get_ei(1);
			$datos['Familias'] = $this->estiloSFModel->get_f();
			$datos['Paises'] = $this->paisModel->get_paises();
			$datos['Colores'] = $this->colorModel->get_colores();
			$datos['Cerveceras'] = $this->cerveceraModel->get_cerveceras();

			// Carga de vistas
			$ms['rndm'] = $this->_nrand(0);
			$this->load->view('header', $ms);
			$this->_dont_miss();
			$this->load->view('altaCerveza2', $datos);
			$this->_sidebar();
			$this->load->view('footer');
		}
		else {
			$red = "Location: ".base_url()."bb/log_in";
			header($red);
		}

		if (isset($_POST['cervecera'])) {
			$this->load->model('cerveceraModel');
			$datos = array('idCervecera' => 0, 'Descripcion' => $_POST['cervecera']);
			$this->cerveceraModel->put_cervecera($datos);
			$_POST['idCervecera'] = $this->cerveceraModel->get_max_n();
		}

		if (isset($_POST['idCervecera'])) {
			$n = $this->_numero_cervezas() + 1;
			$base = base_url();

			$datos = array(
				'idCheve' => 0, // El 0 llama al autonumérico
				'idCervecera' => $this->input->post('idCervecera'),
				'idSubEstilo' => $this->input->post('idSubEstilo'),
				'idPais' => $this->input->post('idPais'),
				'idColor' => $this->input->post('idColor'),
				'nombre' => $this->input->post('nombre'),
				'IBU' => $this->input->post('IBU'),
				'ABV' => $this->input->post('ABV'),
				'Descripcion' => $this->input->post('Descripcion'),
				'username' => $username,
				'gusto' => $this->input->post('gusto'),
				'desagrado' => $this->input->post('desagrado'),
				'tags' => $this->input->post('tags')
				);

			// Actualiza datos de cerveza
			$this->cervezaModel->put_cerveza($datos);

			$imagen = $this->input->post('imagen');
			if($imagen){
				$this->config =  array(
	                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/",
	                  'upload_url'      => base_url()."uploads/",
	                  'allowed_types'   => "gif|jpg|png|jpeg",
	                  'overwrite'       => TRUE,
	                  'max_size'        => "2048KB",
	                  'max_height'      => "768",
	                  'max_width'       => "683",
	                  'file_name' 			=> $n.".jpg"
	                );

				$this->load->library('upload', $this->config);
				if ($this->upload->do_upload()) { 
					$red = "Location: ".$base."bb/perfil_cerveza?idCheve=".$n;
					header($red);
				} else echo "Error al subir el archivo";
			} else {
				// Poner imagen por default
				copy(dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/default.jpg", dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/".$n.".jpg");
			}
			$red = "Location: ".$base."bb/perfil_cerveza?idCheve=".$n;
			header($red);
		}
	}

	function actualiza_usuario() {
		// Carga de variables de sesión
		if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
		if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol'); 

    if (isset($_GET['username'])) {
    	// Validaciones
    	if ($this->_valida_usuario($_GET['username']) == 0 && strcmp($rol, "Administrador") != 0) {
				$error['err'] = "No cuentas con privilegios suficientes";
				$this->load->view('404', $error);
			}
			else {
				// Validación sea usuario o admin editor
				if(!strcmp($username, $_GET['username']) || !strcmp($rol, "Administrador")) {
					// Carga de modelos
					$this->load->model('usuarioModel');

					// Datos de usuario
					$Datos['Usuario'] = $this->usuarioModel->get_usuario($_GET['username']);

					// Carga de vistas
					$ms['rndm'] = $this->_nrand(0);
					$this->load->view('header', $ms);
					$this->_dont_miss();
					$this->load->view('editaUsrView', $Datos);
					$this->load->view('footer');
				}
				else {
					$error['err'] = "No cuentas con privilegios suficientes";
					$this->load->view('404', $error);
				}
			}
    }
    else {
    	$error['err'] = "Usuario inexistente o desctivado";
			$this->load->view('404', $error); 
    }


    if (!empty($_POST)) {
			$data = array('SitioWeb' => $this->input->post('Web'),
									  'Correo' => $this->input->post('Correo'),
									  'Password' => $this->input->post('Pass'),
									  'Biografia' => $this->input->post('Bio')); 
			
			// Validar que la password sea igual
			if((strcmp($this->input->post('Pass'), $this->input->post('rPass')) != 0) || strcmp("", $this->input->post('Pass') != 0) || strcmp("", $this->input->post('rPass') != 0)) {
				// No son iguales
				echo "Las passwords no son iguales o están vacías.</br>";
			}
			else {
				// Carga modelo para actualizar usuario
				$this->load->model('usuarioModel');
				// Actualiza datos
				$edita = $this->session->userdata('edita');
				$this->usuarioModel->actualiza_usuario( $edita, $data );
				

				$b = base_url();
				$imagen = $this->input->post('imagen');
				if($imagen) {
					$this->config =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/upics/",
		                  'upload_url'      => $b."upics/",
		                  'allowed_types'   => "gif|jpg|png|jpeg",
		                  'overwrite'       => TRUE,
		                  'max_size'        => "2048KB",
		                  'max_height'      => "768",
		                  'max_width'       => "683",
		                  'file_name' 			=> $edita.".jpg"
		                );

					$this->load->library('upload', $this->config);
					if ($this->upload->do_upload()) { 
						$red = "Location: ".$b."bb/perfil_usuario?username=".$edita;
						header($red);
					} else echo "Error al subir el archivo";
				} else {
					// Poner imagen por default
					copy(dirname($_SERVER["SCRIPT_FILENAME"])."/upics/default.jpg", dirname($_SERVER["SCRIPT_FILENAME"])."/upics/".$edita.".jpg");
				}

				$this->session->unset_userdata('edita');

				// Redirección
				$red = "Location: ".$b."bb/perfil_usuario?username=".$edita;
				header($red);
			}
		}
	}

	function actualiza_cerveza() {
		// Carga de variables de sesión
		if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
		if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol'); 

		if (isset($_GET['idCheve'])) {
			if ((strcmp($rol, "Embajador") == 0) || (strcmp($rol, "Administrador") == 0)) {
				// Validación activada
				if ($this->_valida_cerveza($_GET['idCheve']) == 0) {	
					$error['err'] = "Cerveza inexistente o desactivada";
					$this->load->view('404', $error); 
				}
				else {
					// Carga de modelos
					$this->load->model('cervezaModel');
					$this->load->model('cerveceraModel');
					$this->load->model('estiloSFModel');
					$this->load->model('paisModel');
					$this->load->model('colorModel');

					// Carga de datos
					$datos['Cerveza'] = $this->cervezaModel->get_cerveza($_GET['idCheve']);
					$datos['Subestilos'] = $this->estiloSFModel->get_s();
					$datos['Estilos'] = $this->estiloSFModel->get_e();
					$datos['Familias'] = $this->estiloSFModel->get_f();
					$datos['Paises'] = $this->paisModel->get_paises();
					$datos['Colores'] = $this->colorModel->get_colores();
					$datos['Cerveceras'] = $this->cerveceraModel->get_cerveceras();

					// Carga de vistas
					$ms['rndm'] = $this->_nrand(0);
					$this->load->view('header', $ms);
					$this->_dont_miss();
					$this->load->view('actCerveza2', $datos);
					$this->load->view('footer');
				}
			}
			else { // Redirigir a perfil de cerveza
				$red = "Location: ".base_url()."bb/perfil_cerveza?idCheve=".$_GET['idCheve'];
				header($red);
			}
		}
		else {
			$error['err'] = "Cerveza inexistente o desactivada";
			$this->load->view('404', $error); 
		}

		if (isset($_POST['cervecera'])) {
			$this->load->model('cerveceraModel');
			$datos = array('idCervecera' => 0, 'Descripcion' => $_POST['cervecera']);
			$this->cerveceraModel->put_cervecera($datos);
			$_POST['idCervecera'] = $this->cerveceraModel->get_max_n();
		}

		if (isset($_POST['idCervecera'])) {
			$base = base_url();
			$idC = $_GET['idCheve'];
			$datos = array('idCheve' => $_GET['idCheve'],
				'idCervecera' => $this->input->post('idCervecera'),
				'idSubEstilo' => $this->input->post('idSubEstilo'),
				'idPais' => $this->input->post('idPais'),
				'idColor' => $this->input->post('idColor'),
				'nombre' => $this->input->post('nombre'),
				'IBU' => $this->input->post('IBU'),
				'ABV' => $this->input->post('ABV'),
				'Descripcion' => $this->input->post('Descripcion'),
				'username' => $username,
				'gusto' => $this->input->post('gusto'),
				'desagrado' => $this->input->post('desagrado')
				);

			$this->cervezaModel->act_cerveza($datos); // Actualiza la cerveza

			$imagen = $this->input->post('userfile');
			if(isset($imagen)){
				// Creo arreglo para upload
				$this->config =  array(
	                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/",
	                  'upload_url'      => $base."uploads/",
	                  'allowed_types'   => "gif|jpg|png|jpeg",
	                  'overwrite'       => TRUE,
	                  'max_size'        => "2048KB",
	                  'max_height'      => "768",
	                  'max_width'       => "683",
	                  'file_name' 			=> $idC.".jpg"
	                );
				

				$this->load->library('upload', $this->config); // Carga la librería
				if ($this->upload->do_upload()) { 
					$red = "Location: ".$base."bb/perfil_cerveza?idCheve=".$idC;//cambiar esta direccion en el deploy
					header($red);
				} else echo "File upload failed";
			}
			$red = "Location: ".$base."bb/perfil_cerveza?idCheve=".$_GET['idCheve'];
			header($red);
		}
	}

	function index() {
		$ms['rndm'] = $this->_nrand(0);
		$this->load->view('header', $ms);
		$this->_dont_miss();
		$this->_latest();
		$this->load->view('sharebox');
		$this->_spotlight();
		$this->_sidebar();
		$this->load->view('footer');
	}

	function fblogin() {
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file

		$facebook = new Facebook(array(
			'appId'		=>  $this->config->item('appId'), 
			'secret'	=> $this->config->item('secret')));

		$user = $facebook->getUser(); // Get the facebook user id 

		if (isset($user)) {
			try {
				$user_profile = $facebook->api('/me');  //Get the facebook user profile data
				$params = array('next' => $base_url.'/index.php/bb/logout');
				$this->session->set_userdata('User', $user_profile);
				$this->session->set_userdata('logout', $facebook->getLogoutUrl($params));

				$this->load->model('usuarioModel');
				$res = $this->usuarioModel->check_fbid($user_profile['id']);
				if(!is_array($res)) {
					// No existe usuario con ese fbid
					$this->session->set_userdata('nombre', $user_profile['first_name']);
					$this->session->set_userdata('web', $user_profile['link']);
					$this->session->set_userdata('email', $user_profile['email']);
					$this->session->set_userdata('fbid', $user_profile['id']);
					header('Location: '.$base_url."bb/sign_up_fb");
				}
				else {
					// Sesión
					$user_data = $this->usuarioModel->userSession($res['username']);
					$this->session->set_userdata('username', $user_data['username']);
					$this->session->set_userdata('rol', $user_data['descripcion']);
					header('Location: '.$base_url."bb/sign_up");
				}
			} 
			catch(FacebookApiException $e) {
				error_log($e);
				$user = NULL;
			}		
		}	
	}
}
?>