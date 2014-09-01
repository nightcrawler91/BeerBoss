    <!-- sidebar -->
    <div class = "one_fourth" style="overflow-y: scroll">
      <div class="tabs-shortcode">
        <!-- tabs title -->
        <ul class="tabnav ui-tabs-nav">
          <li class="ui-tabs-selected"><a href="#1">Favoritos</a></li>
          <li class=""><a href="#2">Desfavoritos</a></li>
        </ul>
        <!-- tabs content -->
        <div class="tabdiv-wrapper">
          <div id="1" class="tabdiv ui-tabs-panel" style="">
            <h3>Favoritos:</h3>
            <?php 
            if(gettype($Favoritos) === "array"){
              foreach ($Favoritos as $cerveza) {
                echo "<table>";
                echo "<tr>";
                echo "<td>Nombre: </td>";
                if (strlen($cerveza['nombre']) <= 7 || strpos($cerveza['nombre'],' '!==false)){ 
                    echo "<td><a href=".base_url()."bb/perfil_cerveza?idCheve=".$cerveza['id'].">".$cerveza['nombre']."</a></td>"; 
                }else {
                  $aux2="";
                  for ($i=0; $i<7; $i++) { 
                    $aux2=$aux2.$cerveza['nombre'][$i]; 
                  }
                  $aux2=$aux2."...";
                  echo "<td><a href=".base_url()."bb/perfil_cerveza?idCheve=".$cerveza['id'].">".$aux2."</a></td>"; 
                }
                //echo "<td><a href=".base_url()."bb/perfil_cerveza?idCheve=".$cerveza['id'].">".$cerveza['nombre']."</a></td>
                echo "<td><a href='#'><img style='float:right;' src='".base_url()."images/error-button.png' onclick='submitElim(".$cerveza['id'].");'></a></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>País: </td>";
                echo "<td>$cerveza[pdesc]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Familia: </td>";
                echo "<td>$cerveza[fdesc]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Estilo: </td>";
                echo "<td>$cerveza[edesc]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Subestilo: </td>";
                echo "<td>$cerveza[sdesc]</td>";
                echo "</tr>";
                echo "<tr>";
              }
            } else echo "<h3>No hay cervezas favoritas</h3>";
            echo "</table></br>";
            ?>
          </div>

          <div id="2" class="tabdiv ui-tabs-panel ui-tabs-hide" style="">
            <h3>Desfavoritos: </h3>
            <?php 
            if(gettype($Desfavoritos) === "array"){
              foreach ($Desfavoritos as $cerveza) {
                echo "<table>";
                echo "<tr>";
                echo "<td>Nombre: </td>";
                if (strlen($cerveza['nombre']) <= 7 || strpos($cerveza['nombre'],' '!==false) ) 
                  echo "<td><a href=".base_url()."bb/perfil_cerveza?idCheve=".$cerveza['id'].">".$cerveza['nombre']."</a></td>"; 
                else {
                  $aux="";
                  for ($i=0; $i<=7; $i++) { 
                    $aux=$aux.$cerveza['nombre'][$i]; 
                  }
                  $aux=$aux."...";
                  echo "<td><a href=".base_url()."bb/perfil_cerveza?idCheve=".$cerveza['id'].">".$aux."</a></td>"; 
                }                
                //echo "<td><a href=".base_url()."bb/perfil_cerveza?idCheve=".$cerveza['id'].">".$cerveza['nombre']."</a></td>
                echo "<td><a href='#'><img src='".base_url()."images/error-button.png' onclick='submitElim(".$cerveza['id'].");'></a></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>País: </td>";
                echo "<td>$cerveza[pdesc]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Familia: </td>";
                echo "<td>$cerveza[fdesc]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Estilo: </td>";
                echo "<td>$cerveza[edesc]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Subestilo: </td>";
                echo "<td>$cerveza[sdesc]</td>";
                echo "</tr>";
              }
            } else echo "<h3>No hay cervezas desfavoritas</h3>";
            echo "</table></br>";
            ?>
          </div>

        </div>
      </div>
      <?php 
      if (strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
      else $username = $this->session->userdata('username');

      if (strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
      else $rol = $this->session->userdata('rol');

      if (( strcmp($rol, "Administrador") == 0 || strcmp($_GET['username']." ", $username) == 0) && $Usuario['habilitado'] == 1 ) {   
        echo "<form method='post' name='desactivar'>
        <input type='hidden' name='des'>
        <a class='button_link black' href='javascript:document.desactivar.submit();'>
        <span>Desactivar usuario</span></a>
        </form>";
      }
      if (( strcmp($rol, "Administrador") == 0 || strcmp($_GET['username']." ", $username) == 0) && $Usuario['habilitado'] == 0 ) {
        echo "<form method='post' name='activar'>
        <input type='hidden' name='act'>
        <a class='button_link black' href='javascript:document.activar.submit();'>
        <span>Activar usuario</span></a>
        </form>";
      }
      if ((strcmp($rol, "Administrador") == 0) && strcmp($Rolp, "Usuario") == 0 ) {
        echo "<form method='post' name='embajador'>
        <input type='hidden' name='emb'>
        <a class='button_link black' href='javascript:document.embajador.submit();'>
        <span>Volver Embajador</span></a>
        </form>";
      }
      if ((strcmp($rol, "Administrador") == 0) && strcmp($Rolp, "Embajador") == 0 ) {
        echo "<form method='post' name='usuario'>
        <input type='hidden' name='usr'>
        <a class='button_link black' href='javascript:document.usuario.submit();'>
        <span>Volver Usuario</span></a>
        </form>"; 
      }
      ?>
      <?php if (!strcmp($rol, "Administrador") || !strcmp($username, $_GET['username'])) {
        echo "<tr>
                <a class='button_link black' href='".base_url()."bb/actualiza_usuario?username=".$_GET['username']."'>
                  <span>Modificar usuario</span>
                </a>
            </tr>";
        } 
      ?>
    </div>
    <!-- main profile -->
    <div class="three_fourth last">
      <div class="box-wrapper user">
        <div class="box user">
          <h1><?php echo $Usuario['username']; ?></h1>       
          <h2>Ubicación: </h2>
          <?php echo $Geo['mdesc'].", ".$Geo['mdesc'].", ".$Geo['pdesc'];?></br>

        </div>
      </div>

      <h2>Calificaciones:</h2>
      <?php 
      if(gettype($Calificaciones) === "array"){
        echo "<ol class='commentlist'>";
        foreach ($Calificaciones as $calif) {
          echo "<li><div class='comment-wrapper'><div class='comment-inner'>";
          echo "<div class='author-image'>";
          echo "<img src='".base_url()."uploads/".$calif['idCheve'].".jpg' height='50' width='50' class='hoverZoomLink'>";                  
          echo "</div>";
          echo "<div class='comment-author'>";
          echo "<a href='".base_url()."bb/perfil_cerveza?idCheve=".$calif['idCheve']."' rel='external nofollow' class='url' target='_blank'>".$calif['nombre']."</a>";
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
      else echo "<h3>No hay calificaciones disponibles.</h3>";
      ?>
      
      <form method="post" name="elim">
        <input type="hidden" name="elm">
        <input type="hidden" name="neutralizar" id="neutralizar" value="">
      </form>      

    </body>
    </html>

    <script type="text/javascript">
    function submitElim(val) {
      document.getElementById('neutralizar').value=val;
      document.elim.submit(); 
    }
    </script>