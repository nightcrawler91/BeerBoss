<?php $b = base_url(); ?>
<script type="text/javascript">
  function checkFoto(formName) {
      var forma = formName;
      if(document.getElementById("userfile").value!=""||document.getElementsByName("userfile").value!=null)   
        document.getElementById("imagen").value="1";
        checkIfAllEmpty(forma);
  }
</script>

<?php $this->session->set_userdata('edita', $Usuario['username']); ?>

    <div class="box-wrapper help">
    <div class="box help">
    	<h2>Edita perfil usuario:</h2>
      <form  method="post" enctype="multipart/form-data" name="forma">
        <table>
          <tr>        
            <td><label class="label" id="label" for="Username">Nombre de usuario: </label></td>
            <td><label class="label" id="label" for="Username"><?php echo $Usuario['username']; ?></label></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Web">Sitio Web:</label></td>
            <td><input required type="text" name="Web" value="<?php echo $Usuario['sitioweb']; ?>"></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Correo">Correo:</label></td>
            <td><input required type="email" name="Correo" value="<?php echo $Usuario['correo']; ?>"></br></td>
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
            <td><input required type="text" name="Bio" value="<?php echo $Usuario['biografia']; ?>"></br></td>
          </tr>   
          <tr>
            <td><label class="label" id="label" for="avatar">Avatar: </label></td>
            <td><input type="file" name="userfile" value="Upload" id="userfile" oninput="chkEmpty();"></td>
            <input type="hidden" name="imagen" id="imagen" value="1">
          </tr>   
        </table>
        <a class="button_link black" href="javascript:checkFoto('forma')">
          <span>Actualizar datos</span>
        </a>
      </form>
    </div>
  </div>
  </body>
</html>