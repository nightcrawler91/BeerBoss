<?php $b = base_url(); ?>

<script type="text/javascript">
  function getEstilos(str) {
    if (str=="") {
      document.getElementById("estilo").innerHTML="";
      return;
    } 
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("estilo").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?php echo $b.'ajax/getEstilos?fam='; ?>"+str,true);
    xmlhttp.send();
  }
  
  function getSubEstilos(str) {
    if (str=="") {
      document.getElementById("subEstilo").innerHTML="";
      return;
    } 
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("subEstilo").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?php echo $b.'ajax/getSubEstilos?est='; ?>"+str,true);
    xmlhttp.send();
  }

  function putTextBox() {
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("box").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?php echo $b.'ajax/putText'; ?>",false);
    xmlhttp.send();
  }

  function putNuevaC() {
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("nuevaCe").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?php echo $b.'ajax/putNuevaC'; ?>",false);
    xmlhttp.send();
  }

  function putCervezasAgain() {
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("box").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?php echo $b.'ajax/putCervezasAgain'; ?>",false);
    xmlhttp.send();
  }

    function putPlusAgain() {
      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("nuevaCe").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?php echo $b.'ajax/putPlusAgain'; ?>",false);
    xmlhttp.send();
  }

  function checkFoto(formName) {
      var forma = formName;
      if(document.getElementById("userfile").value!=""||document.getElementsByName("userfile").value!=null)   
        document.getElementById("imagen").value="1";
        checkIfAllEmpty(forma);
  }

</script>

<div class="main-content">

  <div class="page-content review">

   <div class="overview-wrapper">

    <h1 class="title">Agrega Cerveza</h1>

    <div class="overview">

      <div class="arrow-catpanel-bottom">&nbsp;</div> 

      <div class="left-panel">     

        <br class="clearer" />

        <div class="category"> 

         <div class="ribbon-shadow-left">&nbsp;</div>

         <div class="catname">

          Datos de la Cerveza

        </div> 

        <div class="category-arrow">&nbsp;</div>

      </div>

      <br class="clearer" />

      <form  method="post" enctype="multipart/form-data" name="forma">
        <table>
          <tr>
            <td><label for"Nombre">Nombre de la cerveza: </label></td> 
            <td><input required type="text" name="nombre" style="width:129"></td>
          </tr>

          <tr>
            <td name="nuevaCe" id="nuevaCe">
              <label for="idCervecera" >Cervecera: <img alt="icon"  src=<?php echo base_url()."images/toggle-plus.png"; ?> width="16" height="16" onclick="putTextBox();putNuevaC();"/></label>
            </td>
            <td name="box" id="box">        
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
              <td><input type="file" name="userfile" value="Upload" id="userfile" oninput="checkFoto();"></td>
              <input type="hidden" name="imagen" id="imagen" value="0">
            </tr>
            <tr>  
              <td><label for"Descripcion">Descripción:</label></td>
              <td><textarea name="Descripcion" rows="4" cols="75" style="resize: none;font: inherit;" placeholder="¿Como describirías esta cerveza? Entra a detalle en todas sus características..."></textarea></td>
            </tr>

            <tr>
              <td><label for="idFamilia">Familia:</label></td>
              <td>            
                <select name="idFamilia" id="idFamilia" onchange="getEstilos(this.value)" onload="getEstilos(this.value)">
                  <?php foreach ($Familias   as $value) { ?>
                  <?php foreach ($value as $key => $val) { ?>
                  <?php if ( strcmp($key, 'idFamilia') === 0) {?>
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
              <td>Estilo: </td>
              <td id="estilo">
                <select name="idEstilo">
                  <?php foreach ($Estilos as $value): ?>
                    <option value="<?php echo $value['idEstilo']; ?>">
                      <?php echo $value['Descripcion']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </td>
            </tr>

            <tr>
              <td>SubEstilo: </td>
              <td id="subEstilo">
                <select name="idSubEstilo">
                  <?php foreach ($Subestilos as $value): ?>
                    <option value="<?php echo $value['idSubEstilo']; ?>">
                      <?php echo $value['Descripcion']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </td>
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
                </select>
              </td>
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
                              <textarea name="gusto" id="comments" rows="4" cols="75" style="resize: none;font: inherit;" placeholder="Cuéntanos qué te gustó de esta cerveza..."></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td><label for"desagrado">¿Qué te desagradó de esta cerveza?</label></td> 
                            <td>
                              <textarea name="desagrado" id="comments" rows="4" cols="75" style="resize: none;font: inherit;" placeholder="Cuéntanos qué te desagradó de esta cerveza..."></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td><label for"tags">Tags</label></td> 
                            <td>
                              <textarea name="tags" rows="2" cols="75" style="resize: none;font: inherit;" placeholder="Inserta las tags separadas por comas..."></textarea>
                            </td>
                          </tr>
                        </table>
                        <a class="button_link black" href="javascript:checkFoto('forma')"><span>Submit</span></a>
                      </form>

                    </div>


                  </div>

                  <div class="clearer"></div>

                </div>

              </div>
            </deiv>