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

</script>

<div class="main-content">

    <div class="page-content review">

       <link rel="image_src" href="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" />

       <div class="overview-wrapper">

        <h1 class="title">Actualizar Datos de <?php echo $Cerveza['nombre'];?></h1>

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

            <form  method="post" enctype="multipart/form-data" name="forma" action "" onsubmit="return checkIfAllEmpty('forma')">
                <table>
                  <td>
                    <table>
                      <tr>
                        <td><label for"nombre">Nombre de la cerveza: </label></td> 
                        <td><input required type="text" name="nombre" style="width:129" value=<?php echo "\"".$Cerveza['nombre']."\""; ?>></td>
                    </tr>
                    <tr>
                      <td name="nuevaCe" id="nuevaCe">
                        <label for="idCervecera" >Cervecera:<img alt="icon"  src=<?php echo base_url()."images/toggle-plus.png"; ?> width="16" height="16" onclick="putTextBox();putNuevaC();"/></label>
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
                        <td><input required type="range" name="IBU" id="IBU" min="0" max="120" value=<?php echo "\"".$Cerveza['IBU']."\"" ?> onchange="updateTextInput(this.value);" style="width:125px;">
                          <input required type="text" id="textInput" value=<?php echo "\"".$Cerveza['IBU']."\"" ?> onblur="updateRangeInput(this.value);" style="width: 40px;padding-left:2px"></td>

                          <!-- Agregar un actualizador desde que recibe el valor  de la ventanita esa -->
                          <!-- Desde la vez pasada ya hay un actualizador :P - Jimmy :P -->

                      </tr>
                      <tr>
                          <td><label for"ABV">Alcohol: </label></td>
                          <td><input required type="range" name="ABV" id="ABV" min="2.5" max="15" value=<?php echo "\"".$Cerveza['ABV']."\"" ?> step="0.1" onchange="updateTextInputAlcohol(this.value);" style="width: 125px;">
                            <input required type="text" id="textInputAlcohol" value=<?php echo "\"".$Cerveza['ABV']."\"" ?> onblur="updateRangeInputAlcohol(this.value);" style="width: 40px;padding-left:2px"></td></td>

                        </tr>
                        <tr></tr>
                        <tr>
                            <td><label for"userfile">Fotografía:</label></td>
                            <td><input required type="file" name="userfile" value="Upload"></input></td>
                        </tr>
                        <tr>
                            <td><label for"Descripcion">Descripción:</label></td>
                            <td><textarea name="Descripcion" rows="8" cols="75" style="resize: none;font: inherit;"><?php echo $Cerveza['Descripcion'];?></textarea></td>
                        </tr>

              <tr>
                  <td><label for="idFamilia">Familia:</label></td>
                  <td>            
                    <select name="idFamilia" onchange='getEstilos(this.value)'>
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

              <tr>
                  <td><label for="idEstilo">Estilo:</label></td>
                  <td id="estilo">
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
                  <td><label for="idSubEstilo">Sub-Estilo:</label></td>
                  <td id="subEstilo">        
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



                  <td><label for="idColor">Color: </label></td>
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
        <textarea name="gusto" rows="4" cols="75" style="resize: none;font: inherit;" placeholder="Cuéntanos qué te gustó de esta cerveza..."><?php echo $Cerveza['gusto']; ?></textarea>
    </td>
</tr>
<tr>
  <td><label for"desagrado">¿Qué te desagradó de esta cerveza?</label></td> 
  <td>
    <textarea name="desagrado" rows="4" cols="75" style="resize: none;font: inherit;" placeholder="Cuéntanos qué te desagradó de esta cerveza..."><?php echo $Cerveza['desagrado']; ?></textarea>
</td>
</tr>
  <tr>
    <td><label for"tags">Tags</label></td> 
  <td>
    <textarea name="tags" rows="2" cols="75" style="resize: none;font: inherit;" placeholder="Inserta las tags separadas por comas"><?php echo $Cerveza['tags']; ?></textarea>
</td>
  </tr>
</table>
</td>
<td>
  <div class="foto">
      <img src="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" class="foto" width="400px" style="max-width: 400px;">
  </div>
</td>
</table>
<a class="button_link black" href="javascript:checkIfAllEmpty('forma');"><span>Submit</span></a>
</form>

<div class="separator">&nbsp;</div>                            

</div>
<div class="ribbon-shadow-right">&nbsp;</div>                                             

</div>

<br class="clearer" /><br />    

<div class="bottom">

    <div class="section">

    </div> 

</div>

<div class="content-panel">  
</div>
</div>

<div class="clearer"></div>

</div>

</div>
