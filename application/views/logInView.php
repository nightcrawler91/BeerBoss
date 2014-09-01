    <div class="box-wrapper help">
    <div class="box help">
    	<h3>Login al sistema:</h3>
      <form  method="post" name="forma">
        <table>
        <tr>
        <td><label class= "label" id="label" for="username">Nombre de usuario: </label></td>
        <td><input required type="text" id="username" name="username" onkeydown="if (event.keyCode == 13) document.forma.submit();"></br></td>
        </tr>
        <tr>
        <td><label class= "label" id="label" for="pass">Password: </label></td>
        <td><input required type="password" id="pass" name="pass" onkeydown="if (event.keyCode == 13) document.forma.submit();"></br></td>
        </tr>
        </table>
      <a class="button_link black" href="javascript:checkIfAllEmpty('forma');"><span>Submit</span></a>
      </form>
    </div>
  </div>
  </body>
</html>


