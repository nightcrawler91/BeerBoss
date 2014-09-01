<?php $b = base_url(); ?>
<script type="text/javascript">
  function chk(formName) {
      var forma = formName;
      if(document.getElementById("userfile").value!="" || document.getElementById("userfile").value!=null){ 
        document.getElementById("imagen").value="1"; }
      checkIfAllEmpty(forma);
  }

  function chkEmpty() {
      var val = document.getElementById("userfile").value;
      if(val == "" || val == null ) {   
        document.getElementById("imagen").value="0";
      }
      else {
        document.getElementById("imagen").value="1";
      }
  }

    function checkFoto(formName) {
      var forma = formName;
      if(document.getElementById("userfile").value!=""||document.getElementsByName("userfile").value!=null)   
        document.getElementById("imagen").value="1";
        checkIfAllEmpty(forma);
  }
</script>

    <div class="box-wrapper help">
    <div class="box help">
    	<h2>Regístrate en BeerBoss:</h2>
      <form  method="post" enctype="multipart/form-data" name="forma">
        <table>
          <tr>        
            <td><label class="label" id="label" for="Username">Nombre de usuario: </label></td>
            <td><input required type="text" name="Username"></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Web">Sitio Web:</label></td>
            <td><input required type="text" name="Web"></br></td>
          </tr>
          <tr>
            <td><label class="label" id="label" for="Correo">Correo:</label></td>
            <td><input required type="email" name="Correo"></br></td>
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
          <tr>
            <td><label class="label" id="label" for="avatar">Avatar: </label></td>
            <td><input type="file" name="userfile" value="Upload" id="userfile"></td>
            <input type="hidden" name="imagen" id="imagen" value="0">
          </tr>   
        </table>
        <a class="button_link black" href="javascript:checkFoto('forma')">
          <span>Registrarse</span>
        </a>
      </form>
    </div>
  </div>
  </body>
</html>