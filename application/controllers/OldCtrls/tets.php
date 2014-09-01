<?php
class tets extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$num = $this->_numero_cervezas();
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

	// Devuelve número de cervezas para random / 
	function _numero_cervezas() {
		$this->load->model('cervezaModel');
		return $this->cervezaModel->get_ncervezas();
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

	// Solicitud para ser embajador del sistema
	function solicitud() {
		$this->load->model('solicitudModel');

		$this->load->view('headerSinSlider');
		$this->load->view('solicitud');
		$this->load->view('footer');

		if (isset($_POST['Motivo'])) {
			$d_mot = $this->input->post();
			$data = array('username' => 'Eduardo', 'motivo' => $d_mot['Motivo']);
			$this->solicitudModel->put_solicitud($data);
		}
	}

		// Para poderse dar de alta en el sistema
	function sign_up() {
		$this->load->view('headerSinSlider');
		$this->load->view('sgnView');
		$this->load->view('footer');

		$data = array();
		$flagEqPass = 0;
		$flagEmpty = 0;
		$flagExists = 1;

		if(!empty($_POST)){
			$data = array('username' => $this->input->post('Username'),
						  'idMunicipio' => 19,//$this->input->post('Municipio'), //Juay?
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
					echo "El usuario '".$data['username']."' ya está registrado en el sistema.</br>";
				}
			}

			// Aquí comprobamos que no sean iguales las passwords y que no sean vacías
			if(!empty($_POST)){
				$pass = $data['Password'];
				$rPass = $this->input->post('rPass');			
				if(strcmp($pass, $rPass) == 0 and strcmp($pass, "") != 0){
					$flagEqPass = 1;
				}
				else{
					echo "Las passwords no son iguales o están vacías.</br>";
				}
			}

			// Verificación de datos vacíos. 
			if(!empty($_POST)){			
				if(strcmp($data['username'], "") == 0 or strcmp($data['Correo'], "") == 0){
					$flagEmpty = 1;
					echo "El usuario y el correo no pueden estar vacíos.</br>";
				}	
			} 

			// Si pasa las duras pruebas de aquí, un usuario se da de alta.
			if(!empty($_POST) and $flagEqPass == 1 and $flagExists == 0 and $flagEmpty == 0){
				$this->sgnModel->insertUser($data);
				echo "Usuario '".$data['username']."' registrado correctamente.";
				// Rediccionamiento al dashboard del usuario.
			}	
		}

		// Recibe username -> perfil de ese usuario
		function perfil_usuario() {
			if(isset($_GET['username'])) {
				// Carga de modelos
				$this->load->model('usuarioModel');
				$this->load->model('favdesModel');
				$this->load->model('calificaModel');
				$this->load->model('paisModel');
				$this->load->model('rolModel');
				
				// Datos de usuario
				$d_usuario = $this->usuarioModel->get_usuario($_GET['username']);
				$Datos['Usuario'] = $this->usuarioModel->get_usuario($_GET['username']);
				$Datos['Favoritos'] = $this->favdesModel->get_favs($_GET['username']);
				$Datos['Desfavoritos'] = $this->favdesModel->get_dfavs($_GET['username']);
				$Datos['Calificaciones'] = $this->calificaModel->get_calif_usr($_GET['username']);
				$Datos['Geo'] = $this->paisModel->get_mep($d_usuario['idMunicipio']);
				$Datos['Rol'] = $this->rolModel->get_rol($_GET['username']);

				// Carga de vistas
				$this->load->view('headerSinSlider');
				$this->load->view('perfilUsuario', $Datos);
				$this->load->view('footer');
			}
			else { echo "Accede por un username :D"; }
			// Botón desactivar usuario
			if(isset($_POST['des'])) { $this->_desactiva_usuario($_GET['username']); }
			// Botón activar usuario
			if(isset($_POST['act'])) { $this->_activa_usuario($_GET['username']); }
			// Botón volver embajador a usuario
			if(isset($_POST['emb'])) { $this->_vuelve_embajador($_GET['username']); }
			// Botón volver usuario a embajador
			if(isset($_POST['usr'])) { $this->_vuelve_usuario($_GET['username']); }
		}

		// Recibe idCheve -> Perfil de cerveza
		function perfil_cerveza() {
			if(isset($_GET['idCheve'])) {
				// Carga de modelos
				$this->load->model('cervezaModel');
				$this->load->model('paisModel');
				$this->load->model('colorModel');
				$this->load->model('calificaModel');
				$this->load->model('estiloSFModel');

				// Carga datos sobre una cerveza
				$datos['Cerveza'] = $this->cervezaModel->get_cerveza($_GET['idCheve']);
				$datos['Pais'] = $this->paisModel->get_nombre_pais($d_cerveza['idPais']);
				$datos['Color'] = $this->colorModel->get_color($d_cerveza['idColor']);
				$datos['CalificacionGlobal'] = $this->calificaModel->get_calif_global($d_cerveza['idCheve']);
				$datos['Calificaciones'] =$this->calificaModel->get_calif($d_cerveza['idCheve']);
				$datos['Subestilo'] = $this->estiloSFModel->get_sef($d_cerveza['idSubEstilo']);

				// Carga de vistas
				$this->load->view('headerSinSlider');
				$this->load->view('perfilCerveza', $datos);
				$this->load->view('footer');
			}
			else { echo "Accede por un idCheve :D"; }
			// Botón favear cerveza
			if(isset($_POST['fav'])) { $this->_fav_cerveza($_GET['idCheve'], 'Eduardo'); }
			// Botón desfavear cerveza
			if(isset($_POST['dfav'])) { $this->_desfav_cerveza($_GET['idCheve'], 'Eduardo'); }
			// Botón activar cerveza
			if(isset($_POST['act'])) { $this->_activar_cerveza($_GET['idCheve']); }
			// Botón desactivar cerveza
			if(isset($_POST['des'])) { $this->_desactivar_cerveza($_GET['idCheve']); }
			
		}

		// Recibe username, password y valida
		function log_in() {
			// Carga de vistas
			$this->load->view('headerSinSlider');
			$this->load->view('logInView');
			$this->load->view('footer');

			$data = array();
			$flagEmpty = 0;
			$flagExists = 1;
			
			if(!empty($_POST)){
				$data = array('username' => $this->input->post('Username'), 'Password' => $this->input->post('Pass')); 
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
				//echo $valid;
				if($valid == 1){
					// Redirigir a dashboard, crear variables de sesión.

					//variables de sesión
					$userData = $this->logInModel->userSession($data['username']);
					//print_r($userData);
					$varSession = array(
						'username'  => $userData['username'],
						'rol'     => $userData['idRol']
						);
					$this->session->set_userdata($varSession);
					//echo "¡Bienvenido a BeerBoss!";
					$location="Location: ".base_url()."bb/perfil_usuario?username=".$userData['username'];
					header($location); /* Redirect browser */
				}
				else if($valid == 0){
					echo "Usuario o contraseña no válidos.";
				}
			}
		}

		// Recibe idCerveza -> Calificar
		function califica_cerveza() {
			if(isset($_GET['idCheve'])) {
				$this->load->model('cervezaModel');
				$this->load->model('paisModel');
				$this->load->model('colorModel');
				$this->load->model('estiloSFModel');

				// Demás datos sobre una cerveza
				$datos['Cerveza'] = $this->cervezaModel->get_cerveza($_GET['idCheve']);
				$datos['Pais'] = $this->paisModel->get_nombre_pais($d_cerveza['idPais']);
				$datos['Color'] = $this->colorModel->get_color($d_cerveza['idColor']);
				$datos['Subestilo'] = $this->estiloSFModel->get_sef($d_cerveza['idSubEstilo']);

				$this->load->view('headerSinSlider');
				$this->load->view('califica', $datos);
				$this->load->view('footer');
			}

			if ( isset($_POST['Aroma']) ) {
				$d_all = $this->input->post();	
				$data = array (
					'idCheve'    =>	$d_cer['idCheve'],
					'username'   =>	"Eduardo",
					'Aroma'      =>	$d_all['Aroma'],
					'Apariencia' => $d_all['Apariencia'],
					'Cuerpo'     =>	$d_all['Cuerpo'],
					'Sabor'      =>	$d_all['Sabor'],
					'CGeneral'   => $d_all['CGeneral'],
					'Comentario' => $d_all['Comentario']
					);
				$this->calificaModel->put_calif($data);
			}
		}

		// Función para agregar cervezas
		function agrega_cerveza() {
			$this->load->model('cervezaModel');
			$this->load->model('estiloSFModel');
			$this->load->model('paisModel');
			$this->load->model('colorModel');

			$datos['Subestilos'] = $this->estiloSFModel->get_s();
			$datos['Estilos'] = $this->estiloSFModel->get_e();
			$datos['Familias'] = $this->estiloSFModel->get_f();
			$datos['Paises'] = $this->paisModel->get_paises();
			$datos['Colores'] = $this->colorModel->get_colores();

			$n = $this->_numero_cervezas();
			$this->load->view('headerSinSlider');
			$this->load->view('altaCerveza', $datos);
			$this->load->view('footer');

			if (isset($_POST['nombre'])) {

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				$config['max_size']	= '2048';
				$config['max_width']  = '500';
				$config['max_height']  = '500';
				$config['filename']  = ($this->_numero_cervezas+1).'.jpg';

				$this->load->library('upload', $config);

				$data = array('upload_data' => $this->upload->data());

				$datos = array(
					'idCheve' => 0,
					'idSubEstilo' => $this->input->post('idSubEstilo'),
					'idPais' => $this->input->post('idPais'),
					'idColor' => $this->input->post('idColor'),
					'nombre' => $this->input->post('nombre'),
					'IBU' => $this->input->post('IBU'),
					'ABV' => $this->input->post('ABV'),
					'Descripcion' => $this->input->post('Descripcion'),
					'Foto' => $this->_numero_cervezas+1
					);
				$this->cervezaModel->put_cerveza($datos);
				$n = $this->_numero_cervezas();
				$location = "Location: ".base_url()."bb/perfil_cerveza?idCheve=".($n);
				header($location); /* Redirect browser */
			}
		}

		// Recibe idCerveza a actualizar
		function actualiza_cerveza() {
			if(isset($_GET['idCheve'])) {
				$this->load->model('cervezaModel');
				$this->load->model('estiloSFModel');
				$this->load->model('paisModel');
				$this->load->model('colorModel');

				$datos['Cerveza'] = $this->cervezaModel->get_cerveza($_GET['idCheve']);
				$datos['Subestilos'] = $this->estiloSFModel->get_s();
				$datos['Estilos'] = $this->estiloSFModel->get_e();
				$datos['Familias'] = $this->estiloSFModel->get_f();
				$datos['Paises'] = $this->paisModel->get_paises();
				$datos['Colores'] = $this->colorModel->get_colores();

				$this->load->view('headerSinSlider');
				$this->load->view('actCerveza', $datos);
				$this->load->view('footer');
			}
			else {
				echo "Carga por un get :)";
}

if(isset($_POST['IBU'])){
	$datos = array('idCheve' => $_GET['idCheve'],
		'idSubEstilo' => $this->input->post('idSubEstilo'),
		'idPais' => $this->input->post('idPais'),
		'idColor' => $this->input->post('idColor'),
		'nombre' => $this->input->post('nombre'),
		'IBU' => $this->input->post('IBU'),
		'ABV' => $this->input->post('ABV'),
		'Descripcion' => $this->input->post('Descripcion'));
	$this->cervezaModel->act_cerveza($datos);
	$location="Location: ".base_url()."bb/perfil_cerveza?idCheve=".$_GET['idCheve'];
	header($location); /* Redirect browser */
}	
}

function index(){
	echo "Hello";
}
}