     <div class="box-wrapper beer">
      <div class="box beer">
       <h2>Actualizar datos de Cerveza:</h2>
       <form  method="post" enctype="multipart/form-data" name="forma" action "">
        <table>
          <td>
        <table>
          <tr>
            <td><label for"nombre">Nombre de la cerveza: </label></td> 
            <td><input type="text" name="nombre" style="width:129" value=<?php echo "\"".$Cerveza['nombre']."\""; ?>></td>
          </tr>
          <tr>
            <td><label for"IBU">IBU: </label></td>
            <td><input type="range" name="IBU" id="IBU" min="0" max="120" value=<?php echo "\"".$Cerveza['IBU']."\"" ?> onchange="updateTextInput(this.value);" style="width:125px;">
              <input type="text" id="textInput" value=<?php echo "\"".$Cerveza['IBU']."\"" ?> onblur="updateRangeInput(this.value);" style="width: 40px;padding-left:2px"></td>

							<!-- Agregar un actualizador desde que recibe el valor  de la ventanita esa -->
              <!-- Desde la vez pasada ya hay un actualizador :P - Jimmy :P -->

            </tr>
            <tr>
              <td><label for"ABV">Alcohol: </label></td>
              <td><input type="range" name="ABV" id="ABV" min="2.5" max="15" value=<?php echo "\"".$Cerveza['ABV']."\"" ?> step="0.1" onchange="updateTextInputAlcohol(this.value);" style="width: 125px;">
                <input type="text" id="textInputAlcohol" value=<?php echo "\"".$Cerveza['ABV']."\"" ?> onblur="updateRangeInputAlcohol(this.value);" style="width: 40px;padding-left:2px"></td></td>

              </tr>
              <tr>
                <td><label for"userfile">Fotografía:</label></td>
                <td><input type="file" name="userfile" value="Upload"></input></td>
              </tr>
              <tr>
                <td><label for"Descripcion">Descripción:</label></td>
                <td><textarea name="Descripcion" style="width:300;height:100;padding-left:2px;font: inherit;"><?php echo $Cerveza['Descripcion'];?></textarea></td>
              </tr>
              <tr>
                  <td><label for="idSubEstilo">Sub-Estilo:</label></td>
                  <td>        
                    <select name="idSubEstilo" value=<?php echo "\"".$Cerveza['idSubEstilo']."\"" ?>>
                      <?php foreach ($Subestilos as $value) { ?>
                      <?php foreach ($value as $key => $val) { ?>
                      <?php if ( strcmp($key, 'idSubEstilo') === 0) {?>
                      <option value=<?php echo "\"".$val."\""; 
                                      if($val == $Cerveza['idSubEstilo']){
                                        echo " selected=\"selected\"";
                                      }?>>
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
                  <td><label for="idColor">Sub-Estilo:</label></td>
                  <td>        
                    <select name="idColor" value=<?php echo "\"".$Cerveza['idColor']."\"" ?>>
                      <?php foreach ($Colores as $value) { ?>
                      <?php foreach ($value as $key => $val) { ?>
                      <?php if ( strcmp($key, 'idColor') === 0) {?>
                      <option value=<?php echo "\"".$val."\""; 
                                      if($val == $Cerveza['idColor']){
                                        echo " selected=\"selected\"";
                                      }?>>
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
                        <td><label for="idPais">País de Origen:</label></td>
                        <td>
                          <select name="idPais">
                            <?php foreach ($Paises as $value) { ?>
                            <?php foreach ($value as $key => $val) { ?>
                            <?php if ( strcmp($key, 'idPais') === 0) {?>
                            <option value=<?php echo "\"".$val."\""; 
                            								if($val == $Cerveza['idPais']){
                      											echo " selected=\"selected\"";
                      											}?>>
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
                            <textarea name="gusto" id="comments" rows="4" cols="50" placeholder="Cuéntanos qué te gustó de esta cerveza..."><?php echo $Cerveza['gusto']; ?></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td><label for"desagrado">¿Qué te desagradó de esta cerveza?</label></td> 
                          <td>
                            <textarea name="desagrado" id="comments" rows="4" cols="50" placeholder="Cuéntanos qué te desagradó de esta cerveza..."><?php echo $Cerveza['desagrado']; ?></textarea>
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td>
                      <div class="foto">
                          <img src="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" class="foto">
                      </div>
                    </td>
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
