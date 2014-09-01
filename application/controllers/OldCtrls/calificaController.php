<?php
	class calificaController extends CI_Controller
	{
		// Así se obtiene todo de un post: 
		// $this->input->post();
		// De algún modo las variables de usuario.
		function index ()
		{
			$this->load->model('cervezaModel');
			$this->load->model('estiloSFModel');
			$this->load->model('calificaModel');

			// Obtenemos datos cerveza
			$d_cer = $this->cervezaModel->get_cerveza ( 3 );
			print_r($d_cer);
			echo '</br>';
			echo '</br>';
			// Datos esf
			$d_esf = $this->estiloSFModel->get_sef( $d_cer['idSubEstilo'] );
			print_r($d_esf);
			echo '</br>';
			echo '</br>';
			// Calificaciones cheve
			$d_cal = $this->calificaModel->get_calif( $d_cer['idCheve'] );
			print_r($d_cal);
			echo '</br>';
			echo '</br>';

			$this->load->view('califica', $d_cer );

			if ( isset($_POST['Aroma']) ) // En realidad puede ser el que sea
			{
				$d_all = $this->input->post();	
		    print_r($d_all);
		    echo '</br>';
				echo '</br>';

		    $data = array (
		    	'idCheve' => $d_cer['idCheve'],
		    	'username' => "Eduardo",
		    	'Aroma' => $d_all['Aroma'],
		    	'Apariencia' => $d_all['Apariencia'],
					'Cuerpo' => $d_all['Cuerpo'],
					'Sabor' => $d_all['Sabor'],
					'CGeneral' => $d_all['CGeneral'],
					'Comentario' => $d_all['Comentario']
		    	);
				print_r($data);

				$this->calificaModel->put_calif( $data );
			}

		}
	}

?>