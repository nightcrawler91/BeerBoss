<!-- Esta vista va con sidebar -->
<script type="text/javascript">
  function hvalue() {
    var valor = document.getElementById("t").value;
    document.getElementById("tipo").value=valor;
  }
</script>

<div class="post-loop search-loop">
    <div class="ribbon-shadow-left">&nbsp;</div>       
    
    <div class="section-wrapper">
        <div class="section">
            <table>
                <tr>
                    <td>
                        Resultados de la búsqueda&emsp;&emsp;
                    </td>
                  <td>
                    <form method="get" id="searchformtop" name="searchformtop" action="<?php echo base_url()."bb/buscar" ?>">
                        <input type="hidden" id="tipo" name="tipo" value="nombre">
                        <select form="searchformtop" name="t" id="t" onchange="hvalue();">
                          <option value="nombre">Nombre</option>
                          <option value="cervecera">Cervecera</option>
                          <option value="desc">Descripción</option>
                          <option value="sef">Estilo</option>
                          <option value="pais">País</option>
                          <option value="tag">Tag</option>
                          <option value="usr">Usuario</option>
                        </select>
                        <input name="palabra" id="s" type="text" value="Buscar" onfocus="if (this.value == 'Buscar') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar';}" onsubmit='javascript:document.searchformtop.submit();'></input>    
                    </form> 
                  </td>
              </tr>
              </table>                
        </div>        
    </div>
    
    <div class="ribbon-shadow-right">&nbsp;</div>   

    <div class="section-arrow">&nbsp;</div> 

    <div class="post-panel">
        <!-- Inicia foreach -->
        <?php if (sizeof($resultados) > 0) { ?>
          <?php foreach ($resultados as $res): ?>
          <div class='post-thumbnail'>
              <a class='darken small' href='<?php echo base_url()."bb/perfil_cerveza?idCheve=".$res['idCheve']; ?>'><img width='70' height='70' src='<?php echo base_url()."uploads/".$res['idCheve'].".jpg"; ?>' alt='<?php $res['nombre']; ?>'/></a>
          </div>
          <div class='inner'>                     
              <h2><a href='<?php echo base_url()."bb/perfil_cerveza?idCheve=".$res['idCheve']; ?>'><?php echo $res['nombre']; ?></a></h2>
              <!-- Aqui va la calificacion global -->
              <div class="rating-wrapper small">
                  <?php
                  if($res['Global']!=0)
                      echo "<div class='number color5'>".$res['Global']."/50</div>";
                  else
                      echo "<div class='number color1'>S/C</div>";
                  ?>
              </div>
              <div class='comments'><a href='<?php echo base_url()."bb/perfil_cerveza?idCheve=".$res['idCheve']; ?>'><?php echo $res['Comentarios'] ?> Comentarios</a></div>
              <div class='date'>Creada el: <?php echo $res['fecha']; ?></div>
              <div class='date'>Por: 
                  <a href='<?php echo base_url()."bb/perfil_usuario?username=".$res['username']; ?>'><?php echo $res['username']; ?></a>
              </div>
              <div class='more'><a href='<?php echo base_url()."bb/perfil_cerveza?idCheve=".$res['idCheve']; ?>'>Más</a></div>
          </div> 
          <br class='clearer' />        
          <?php endforeach; ?>   
        <?php } else { ?>
          <div class="section">No se encontraron coincidencias.</div>
        <?php }?>          
    <!-- end -->
</div>

<br class="clearer" />    

</div>

<br class="clearer" />