    <div id="container">
    	<h3>Califica la cerveza <?php echo $Cerveza['nombre'] ?>:</h2>
        
        <table>
            <tr>
              <td><label for"Nombre">Pais: </label></td>
              <td><?php echo $Pais['Descripcion']; ?></td>
            </tr>
            <tr>
              <td><label for"Descripcion">Descripción:</label></td>
              <td><?php echo $Cerveza['Descripcion']; ?></td>
            </tr>
            <tr>
              <td><label for="estilo">Estilo:</label></td>
              <td><?php echo $Subestilo['edesc']; ?></td>        
            </tr>
            <tr>
              <td><label for="subestilo">Sub-Estilo:</label></td>
              <td><?php echo $Subestilo['sdesc']; ?></td>        
            </tr>
            <tr>
              <td><label for="Familia">Familia:</label></td>
              <td><?php echo $Subestilo['fdesc']; ?></td>
            </tr>
          </table>
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
      <textarea name="Comentario" id="comments" rows="4" cols="50" placeholder="Describe tu experiencia/comentarios con esta cerveza..."></textarea>
    </br>
    <a class="button_link black" href="javascript:document.forma.submit();"><span>Submit</span></a>
  </form>
</div>
</body>
</html>