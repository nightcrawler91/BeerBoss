    <div class="one_third foto">
      <img src="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" class="foto">
    </div>
    <div class="main-content-left">
      <div class="box-wrapper beer">
        <div class="box beer">
          <h2><?php echo $Cerveza['nombre']; ?></h2>       
          <table>
            <tr>
              <td><label for"Nombre">Pais: </label></td>
              <td><?php echo $Pais['Descripcion']; ?></td>
            </tr>
            <tr>
              <td><label for"IBU">IBU: </label></td>
              <td><?php echo $Cerveza['IBU']; ?></td>
            </tr>
            <tr>
              <td><label for"Alcohol">Alcohol: </label></td>
              <td><?php echo $Cerveza['ABV']; ?></td>
            </tr>
            <tr>
              <td><label for"Descripcion">Descripción:</label></td>
              <td><?php echo $Cerveza['Descripcion']; ?></td>
            </tr>
            <tr>
              <td><label for="estilo">Estilo:</label></td>
              <td><?php echo $Subestilo['edesc']; ?></td>        
            </tr>
            <tr>
              <td><label for="subestilo">Sub-Estilo:</label></td>
              <td><?php echo $Subestilo['sdesc']; ?></td>        
            </tr>
            <tr>
              <td><label for="Familia">Familia:</label></td>
              <td><?php echo $Subestilo['fdesc']; ?></td>
            </tr>
          </table>
        </div>
      </div>

      <?php 
      if(gettype($Calificaciones) === "array"){
        echo "<h2>Calificaciones:</h2>";
        echo "<ol class='commentlist'>";
        foreach ($Calificaciones as $calif) {
          echo "<li><div class='comment-wrapper'><div class='comment-inner'>";
          echo "<div class='author-image'>";
          echo "<img src='' height='50' width='50' class='hoverZoomLink'>";                  
          echo "</div>";
          echo "<div class='comment-author'>";
          echo "<a href='".base_url()."bb/perfil_usuario?username=".$calif['username']."' rel='external nofollow' class='url' target='_blank'>".$calif['username']."</a>";
          echo "</div>";
          echo "<div class='comment-text'>";
          echo "</br></br><b>Fecha:</b>&emsp;".$calif['Fecha'];
          echo "</br></br><b>Aroma:</b>&emsp;".$calif['Aroma']."&emsp;";
          echo "<b>Apariencia:</b>&emsp;".$calif['Apariencia']."&emsp;";
          echo "<b>Sabor:</b>&emsp;".$calif['Cuerpo']."&emsp;";
          echo "<b>Cuerpo:</b>&emsp;".$calif['Cuerpo']."&emsp;";
          echo "<b>General:</b>&emsp;".$calif['General'];
          echo "</br></br><b>Comentario:</b>&emsp;".$calif['Comentario'];
          echo "</div></div></div><br class='clearer'></li>";
        }
        echo "</ol></br>";
      }
      else {
        echo "<h3>No hay calificaciones para esta cerveza.</h3>";
      }
      ?>
        <!-- Validaciones para username y rol -->
        <?php if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
              else $username = $this->session->userdata('username');
              if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
              else $rol = $this->session->userdata('rol');   
        ?>
  

        <?php 
        if (strcmp($username, "Visitante") != 0 ) {

          echo "<form method='post' name='calificar'>
                  <input type='hidden' name='fav'>
                  <input type='hidden' name='usr' value='somePHP'>
                  <a class='button_link black' href='".base_url()."bb/califica_cerveza?idCheve=".$Cerveza['idCheve']."'>
                  <span>Calificar Cerveza</span>
                </form>

                <form method='post' name='favear'>
                  <input type='hidden' name='fav'>
                  <input type='hidden' name='usr' value='somePHP'>
                  <a class='button_link black' href='javascript:document.favear.submit();'>
                  <span>Favoritear Cerveza</span>
                </form>

                <form method='post' name='dfavear'>
                  <input type='hidden' name='dfav'>
                  <a class='button_link black' href='javascript:document.dfavear.submit();'>
                  <span>Me disgusta</span>
                </form>";
        }

        if ((strcmp($rol, "Administrador") == 0) && $Cerveza['habilitado'] == 0) {
          echo "<form method='post' name='activar'>
                  <input type='hidden' name='act'>
                  <a class='button_link black' href='javascript:document.activar.submit();'>
                  <span>Activar Cerveza</span>
                </form>";
        }
        if ((strcmp($rol, "Administrador") == 0) && $Cerveza['habilitado'] == 1) {
          echo "<form method='post' name='desactivar'>
                  <input type='hidden' name='des'>
                  <a class='button_link black' href='javascript:document.desactivar.submit();'>
                  <span>Desactivar Cerveza</span>
                </form>";
        }
        ?>
  </div>
  <div class="sidebar">

</div>