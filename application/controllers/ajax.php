<?php 
	class ajax extends CI_Controller {

		function getEstilos() {
			$this->load->model('estiloSFModel');

			$estilos = $this->estiloSFModel->get_ei($_GET['fam']);

			if (is_array($estilos)) {
				echo "<select name='idEstilo' id='idEstilo' onchange='getSubEstilos(this.value)'>";
				foreach ($estilos as $value) {
	        echo "<option value='".$value['idEstilo']."'>";
	        echo $value['Descripcion'];
	        echo "</option>";
				}
				echo "</select>";
			}
		}

		function getSubEstilos() {
			$this->load->model('estiloSFModel');

			$subEstilos = $this->estiloSFModel->get_si($_GET['est']);

			if (is_array($subEstilos)) {
				echo "<select name='idSubEstilo'>";
				foreach ($subEstilos as $value) {
	        echo "<option value='".$value['idSubEstilo']."'>";
	        echo $value['Descripcion'];
	        echo "</option>";
				}
				echo "</select>";
			}
		}

		function putText() {
			echo "<input required type='text' name='cervecera' style='width:129'>";
		}
		function putNuevac() {
			echo "<label for='idCervecera' >Cervecera: <img alt='icon' src=".base_url()."images/li-dark-inverted.png width='10' height='10' onclick='putCervezasAgain();putPlusAgain();'/></label>";
		}
		function putCervezasAgain() {
			$this->load->model('cerveceraModel');
			$Cerveceras = $this->cerveceraModel->get_cerveceras();

			echo "<select name='idCervecera'>";
	      foreach ($Cerveceras as $value) {
					echo "<option value='".$value['idCervecera']."'>";
				  	echo $value['Descripcion'];
				  echo "</option>";
				}
			echo "</select>";
		}

		function putPlusAgain() {
			echo "<label for='idCervecera' >Cervecera:<img alt='icon'  src=".base_url()."images/toggle-plus.png width='16' height='16' onclick='putTextBox();putNuevaC();'/></label>";
		}

	}
?>