<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange= function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>


<div class="box-wrapper beer">
  <div class="box beer">
   <h2>Alta de Cerveza:</h2>
   <?php $attributes = array('name' => 'forma');?>
   <form  method="post" enctype="multipart/form-data" name="forma">
    <table>
      <tr>
        <td><label for"Nombre">Nombre de la cerveza: </label></td> 
        <td><input required type="text" name="nombre" style="width:129"></td>
      </tr>
      <tr>
        <td>
          <label for="idCervecera">Cervecera:</label>
        </td>
        <td>        
          <select name="idCervecera">
            <?php foreach ($Cerveceras as $value): ?>
            <option value="<?php echo $value['idCervecera']; ?>">
              <?php echo $value['Descripcion']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><label for"IBU">IBU: </label></td>
      <td><input type="range" name="IBU" id="IBU" min="0" max="120" value="0" onchange="updateTextInput(this.value);" style="width:125px;">
        <input required type="text" id="textInput" value="0" onblur="updateRangeInput(this.value);" style="width: 25px"></td>
      </tr>
      <tr>
        <td><label for"Alcohol">Alcohol: </label></td>
        <td><input type="range" name="ABV" id="ABV" min="2.5" max="15" value="0" step="0.1" onchange="updateTextInputAlcohol(this.value);" style="width: 125px;">
          <input type="text" id="textInputAlcohol" value="0" onblur="updateRangeInputAlcohol(this.value);" style="width: 25px"></td></td>
        </tr>
        <tr>
          <td><label for"userfile">Fotografía:</label></td>
          <td><input type="file" name="userfile" value="Upload"></td>
        </tr>
        <tr>  
          <td><label for"Descripcion">Descripción:</label></td>
          <td><textarea name="Descripcion" rows="4" cols="50" style="resize: none;font: inherit;" placeholder="¿Como describirías esta cerveza? Entra a detalle en todas sus características..."></textarea></td>
        </tr>
        <tr>
          <td><label for="idSubEstilo">Sub-Estilo:</label></td>
          <td>        
            <select name="idSubEstilo">
              <?php foreach ($Subestilos as $value) { ?>
              <?php foreach ($value as $key => $val) { ?>
              <?php if ( strcmp($key, 'idSubEstilo') === 0) {?>
              <option value=<?php echo "\"".$val."\""; ?>>
                <?php } else if ( strcmp($key, 'Descripcion') === 0){?>
                <?php echo $val;?></option>
                <?php } ?>
                <?php } ?>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="idEstilo">Estilo:</label></td>
            <td>
              <select name="idEstilo" id="select-menu-custom-menu">
                <?php foreach ($Estilos as $value) { ?>
                <?php foreach ($value as $key => $val) { ?>
                <?php if ( strcmp($key, 'idEstilo') === 0) {?>
                <option value=<?php echo "\"".$val."\""; ?>>
                  <?php } else if ( strcmp($key, 'Descripcion') === 0){?>
                  <?php echo $val;?></option>
                  <?php } ?>
                  <?php } ?>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for="idFamilia">Familia:</label></td>
              <td>            
                <select name="idFamilia">
                  <?php foreach ($Familias   as $value) { ?>
                  <?php foreach ($value as $key => $val) { ?>
                  <?php if ( strcmp($key, 'idFamilia') === 0) {?>
                  <option value=<?php echo "\"".$val."\""; ?>>
                    <?php } else {?>
                    <?php echo $val;?></option>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
                </tr>
                <tr>
                  <td><label for="idColor">Color:</label></td>
                  <td>            
                    <select name="idColor">
                      <?php foreach ($Colores as $value) { ?>
                      <?php foreach ($value as $key => $val) { ?>
                      <?php if ( strcmp($key, 'idColor') === 0) {?>
                      <option value=<?php echo "\"".$val."\""; ?>>
                        <?php } else {?>
                        <?php echo $val;?></option>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                      </select></td>
                    </tr>
                    <tr>
                      <td><label for="idPais">País de Origen:</label></td>
                      <td>
                        <select name="idPais">
                          <?php foreach ($Paises as $value) { ?>
                          <?php foreach ($value as $key => $val) { ?>
                          <?php if ( strcmp($key, 'idPais') === 0) {?>
                          <option value=<?php echo "\"".$val."\""; ?>>
                            <?php } else {?>
                            <?php echo $val;?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for"gusto">¿Qué te gustó de esta cerveza?</label></td> 
                        <td>
                          <textarea name="gusto" id="comments" rows="4" cols="50" style="resize: none;font: inherit;" placeholder="Cuéntanos qué te gustó de esta cerveza..."></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td><label for"desagrado">¿Qué te desagradó de esta cerveza?</label></td> 
                        <td>
                          <textarea name="desagrado" id="comments" rows="4" cols="50" style="resize: none;font: inherit;" placeholder="Cuéntanos qué te desagradó de esta cerveza..."></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td><label for"tags">Tags</label></td> 
                        <td>
                          <textarea name="tags" rows="2" cols="75" style="resize: none;font: inherit;" placeholder="Inserta las tags separadas por comas"></textarea>
                        </td>
                      </tr>
                    </table>
                    <a class="button_link black" href="javascript:document.forma.submit();"><span>Submit</span></a>
                  </form>
                </div>
              </div>
            </body>

            <script type="text/javascript">
            function updateTextInput(val) {
              document.getElementById('textInput').value=val; 
            }
            function updateRangeInput(val) {
              document.getElementById('IBU').value=val; 
            }
            function updateTextInputAlcohol(val) {
              document.getElementById('textInputAlcohol').value=val; 
            }
            function updateRangeInputAlcohol(val) {
              document.getElementById('ABV').value=val; 
            }
            </script>


            </html>
