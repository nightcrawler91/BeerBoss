
<div class="main-content">

  <div class="page-content review">

   <link rel="image_src" href="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" />

   <div class="overview-wrapper">

    <h1 class="title" style="z-index:50"><?php echo $Cerveza['nombre']; ?></h1>

    <div class="overview">

      <div class="arrow-catpanel-bottom">&nbsp;</div> 

      <div class="left-panel">     

        <div height="306" width="150" class="article-image">
          <img src="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" style="max-width: 100%">
        </div>                        

        <br class="clearer" />                           

        <div class="category"> 

          <div class="ribbon-shadow-left">&nbsp;</div>

          <div class="catname">

            Datos de la Cerveza

          </div> 

          <div class="category-arrow">&nbsp;</div>

        </div>

        <br class="clearer" />

        <span class="taxName">País</span>: 
        <span class="taxContent"><?php echo $Pais['Descripcion']; ?></span>

        <div class="separator">&nbsp;</div>

        <span class="taxName">IBU</span>: <span class="taxContent"> <?php echo $Cerveza['IBU']; ?> </span>

        <div class="separator">&nbsp;</div>

        <span class="taxName">% Alcohol</span>: <span class="taxContent"><?php echo $Cerveza['ABV']; ?></span>

        <div class="separator">&nbsp;</div>

        <span class="taxName">Sub-Estilo</span>: 
        <span class="taxContent"><?php echo $Subestilo['sdesc']; ?></span>

        <div class="separator">&nbsp;</div>

        <span class="metaName">Estilo</span>: 
        <span class="taxContent"><?php echo $Subestilo['edesc']; ?></span>

        <div class="separator">&nbsp;</div>

        <span class="metaName">Familia</span>: 
        <span class="taxContent"><?php echo $Subestilo['fdesc']; ?></span>

        <div class="separator">&nbsp;</div>

        <span class="metaName">Descripción</span>: 
        <span class="metaContent"><?php echo $Cerveza['Descripcion']; ?></span>

        <div class="separator">&nbsp;</div>                            

      </div>


      <br class="clearer" /><br />
      
      <div class="bottom">
      </br>
      <!-- Form goes here -->
      <form  method="post" name="forma">
        <table>
          <tr>
            <td>Aroma:</td>
            <td>
              <div id="score">
                <label><input type="radio" name="Aroma" value="0" checked><span>0</span></label>
                <label><input type="radio" name="Aroma" value="1"><span>1</span></label>
                <label><input type="radio" name="Aroma" value="2" ><span>2</span></label>
                <label><input type="radio" name="Aroma" value="3" ><span>3</span></label>
                <label><input type="radio" name="Aroma" value="4" ><span>4</span></label>
                <label><input type="radio" name="Aroma" value="5" ><span>5</span></label> 
                <label><input type="radio" name="Aroma" value="6" ><span>6</span></label> 
                <label><input type="radio" name="Aroma" value="7" ><span>7</span></label> 
                <label><input type="radio" name="Aroma" value="8" ><span>8</span></label> 
                <label><input type="radio" name="Aroma" value="9" ><span>9</span></label> 
                <label><input type="radio" name="Aroma" value="10" ><span>10</span></label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Apariencia:</td>
            <td><div id="score">
              <label><input type="radio" name="Apariencia" value="0" checked><span>0</span></label>
              <label><input type="radio" name="Apariencia" value="1" ><span>1</span></label>
              <label><input type="radio" name="Apariencia" value="2"><span>2</span></label>
              <label><input type="radio" name="Apariencia" value="3"><span>3</span></label>
              <label><input type="radio" name="Apariencia" value="4"><span>4</span></label>
              <label><input type="radio" name="Apariencia" value="5"><span>5</span></label>
            </div> 
          </td>
        </tr>
        <tr>
          <td>Sabor:</td>
          <td>
            <div id="score">
              <label><input type="radio" name="Sabor" value="0" checked><span>0</span></label>
              <label><input type="radio" name="Sabor" value="1" ><span>1</span></label>
              <label><input type="radio" name="Sabor" value="2"><span>2</span></label>
              <label><input type="radio" name="Sabor" value="3"><span>3</span></label>
              <label><input type="radio" name="Sabor" value="4"><span>4</span></label>
              <label><input type="radio" name="Sabor" value="5"><span>5</span></label> 
              <label><input type="radio" name="Sabor" value="6"><span>6</span></label> 
              <label><input type="radio" name="Sabor" value="7"><span>7</span></label> 
              <label><input type="radio" name="Sabor" value="8"><span>8</span></label> 
              <label><input type="radio" name="Sabor" value="9"><span>9</span></label> 
              <label><input type="radio" name="Sabor" value="10"><span>10</span></label>
            </div>
          </td> 
        </tr>
        <tr>
          <td>Cuerpo:</td>
          <td>
            <div id="score">
              <label><input type="radio" name="Cuerpo" value="0" checked><span>0</span></label>
              <label><input type="radio" name="Cuerpo" value="1" ><span>1</span></label>
              <label><input type="radio" name="Cuerpo" value="2"><span>2</span></label>
              <label><input type="radio" name="Cuerpo" value="3"><span>3</span></label>
              <label><input type="radio" name="Cuerpo" value="4"><span>4</span></label>
              <label><input type="radio" name="Cuerpo" value="5"><span>5</span></label> 
            </div> 
          </td>
        </tr>
        <tr>
          <td>General:</td>
          <td>
            <div id="score">
              <label><input type="radio" name="CGeneral" value="0" checked><span>0</span></label>
              <label><input type="radio" name="CGeneral" value="2"><span>2</span></label>
              <label><input type="radio" name="CGeneral" value="4"><span>4</span></label>
              <label><input type="radio" name="CGeneral" value="6"><span>6</span></label>
              <label><input type="radio" name="CGeneral" value="8"><span>8</span></label>
              <label><input type="radio" name="CGeneral" value="10"><span>10</span></label>  
              <label><input type="radio" name="CGeneral" value="12"><span>12</span></label>  
              <label><input type="radio" name="CGeneral" value="14"><span>14</span></label>  
              <label><input type="radio" name="CGeneral" value="16"><span>16</span></label>  
              <label><input type="radio" name="CGeneral" value="18"><span>18</span></label>  
              <label><input type="radio" name="CGeneral" value="20"><span>20</span></label>  
            </div>
          </td>
        </tr>
      </table>
    </br>
    Comentario:
  </br>
  <textarea required name="Comentario" id="comments" rows="4" cols="50" placeholder="Describe tu experiencia/comentarios con esta cerveza..."></textarea>
</br>
<a class="button_link black" href="javascript:checkIfAllEmpty('forma');"><span>Submit</span></a>
</form>
</div>

</div>

<div class="clearer"></div>
</div>

</div>
</div>

