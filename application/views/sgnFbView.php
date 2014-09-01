<?php 
  $nombre = $this->session->userdata('nombre');
  $web = $this->session->userdata('web');
  $email = $this->session->userdata('email');
  $fbid = $this->session->userdata('fbid');
  $username = $this->session->userdata('username');
 ?>

    <div class="box-wrapper help">
    <div class="box help">
    	<h2>Completa tu registro en BeerBoss:</h2>
      <form  method="post" name="forma">
        <table>
          <tr>        
            <td><label class="label" id="label" for="Username">Nombre de usuario: </label></td>
            <td><input required type="text" name="Username" value='<?php echo $nombre; ?>'></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Web">Sitio Web:</label></td>
            <td><input required type="text" name="Web" value='<?php echo $web; ?>'></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Correo">Correo:</label></td>
            <td><input required type="email" name="Correo" value='<?php echo $email; ?>'></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Pass">Password:</label></td>
            <td><input required type="password" name="Pass"></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="rPass">Repetir password:</label></td>
            <td><input required type="password" name="rPass"></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Bio">Biografía</label></td>
            <td><input required type="text" name="Bio"></br></td>
          </tr>      
          <input type='hidden' value='<?php echo $fbid; ?>' name='fbid'>
        </table>
        <a class="button_link black" href="javascript:checkIfAllEmpty('forma');">
        <span>Registrarse</span>
      </form>
    </div>
  </div>
  </body>
</html>