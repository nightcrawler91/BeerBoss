<?php $CalifBD['CGeneral'] /= 2; ?>
<?php $CalifBD['Apariencia'] *= 2; ?>
<?php $CalifBD['Cuerpo'] *= 2; ?>
<?php $stars = round($CalificacionGlobal/10, 0, PHP_ROUND_HALF_DOWN); ?>
<?php if (( ($CalificacionGlobal/10) - $stars) == 0) $med = 0;
      else $med = 1; ?>

      
<div class="main-content">

    <div class="page-content review">

       <link rel="image_src" href="<?php echo base_url().'uploads/'.$Cerveza['idCheve'];?>.jpg" />

       <div class="overview-wrapper">

        <h1 class="title"><?php echo $Cerveza['nombre']; ?></h1>

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

            <span class="taxName">Cervecera</span></a>: 
            <span class="taxContent"><a href="<?php echo base_url()."bb/buscar?palabra=".$Cerveza['cdesc']."&tipo=cervecera"; ?>" rel="tag"><?php echo $Cerveza['cdesc']; ?></a></span></a>

            <div class="separator">&nbsp;</div>
    
            <span class="taxName">País</span></a>: 
            <span class="taxContent"><a href="<?php echo base_url()."bb/buscar?palabra=".$Pais['Descripcion']."&tipo=pais"; ?>" rel="tag"><?php echo $Pais['Descripcion']; ?></a></span></a>

            <div class="separator">&nbsp;</div>

            <span class="taxName">IBU</span></a>: <span class="taxContent"> <?php echo $Cerveza['IBU']; ?> </span></a>

            <div class="separator">&nbsp;</div>

            <span class="taxName">% Alcohol</span></a>: <span class="taxContent"><?php echo $Cerveza['ABV']; ?></span></a>

            <div class="separator">&nbsp;</div>

            <span class="taxName">Sub-Estilo</span></a>: 
            <span class="taxContent"><a href="<?php echo base_url()."bb/buscar?palabra=".$Subestilo['sdesc']."&tipo=sef"; ?>" rel="tag"><?php echo $Subestilo['sdesc']; ?></a></span></a>

            <div class="separator">&nbsp;</div>

            <span class="metaName">Estilo</span></a>: 
            <span class="taxContent"><a href="<?php echo base_url()."bb/buscar?palabra=".$Subestilo['edesc']."&tipo=sef"; ?>" rel="tag"><?php echo $Subestilo['edesc']; ?></a></span></a>

            <div class="separator">&nbsp;</div>

            <span class="metaName">Familia</span></a>: 
            <span class="taxContent"><a href="<?php echo base_url()."bb/buscar?palabra=".$Subestilo['fdesc']."&tipo=sef"; ?>" rel="tag"><?php echo $Subestilo['fdesc']; ?></a></span></a>

            <div class="separator">&nbsp;</div>

            <span class="metaName">Descripción</span></a>: 
            <span class="metaContent"><?php echo $Cerveza['Descripcion']; ?></span></a>

            <div class="separator">&nbsp;</div>                            

        </div>

        <div class="right-panel">

            <div class="ratings-wrapper">

                <div id="criteria0" class="rating-criteria-wrapper regular number">

                    <div class="rating-criteria">
                        Aroma                       
                    </div>

                    <div id="rating0" class="rating-wrapper small">  

                        <div class="number color5 single"><?php echo number_format($CalifBD['Aroma'], 2); ?></div>                         

                        <br class="clearer" />

                    </div>

                    <br class="clearer" />

                    <div class="rating-meter-wrapper">
                        <div class="rating-meter" id="meter0" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-meter-inner-bg.png);background-position:0px 0px;background-repeat:repeat-x;">&nbsp;</div>
                    </div>

                </div>

                <script type="text/javascript">
                jQuery(window).load(function() {
                    jQuery('#criteria0').delay(1000).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                    jQuery('#meter0').delay(1000).animate({                                     
                                    backgroundPosition: '<?php echo number_format($CalifBD['Aroma'], 2)*22.5; ?> 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                });                     
                </script>

                <div id="criteria1" class="rating-criteria-wrapper regular number">

                    <div class="rating-criteria">
                        Apariencia                      
                    </div>

                    <div id="rating1" class="rating-wrapper small">

                        <div class="number color5 single"><?php echo number_format($CalifBD['Apariencia'], 2); ?></div>                         

                        <br class="clearer" />

                    </div>

                    <br class="clearer" />

                    <div class="rating-meter-wrapper">
                        <div class="rating-meter" id="meter1" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-meter-inner-bg.png);background-position:0px 0px;background-repeat:repeat-x;">&nbsp;</div>
                    </div>

                </div>

                <script type="text/javascript">
                jQuery(window).load(function() {
                    jQuery('#criteria1').delay(1500).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                    jQuery('#meter1').delay(1500).animate({                                     
                                    backgroundPosition: '<?php echo number_format($CalifBD['Apariencia'], 2)*22.5; ?> 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                });                     
                </script>

                <div id="criteria2" class="rating-criteria-wrapper regular number">

                    <div class="rating-criteria">
                        Sabor
                    </div>

                    <div id="rating2" class="rating-wrapper small">

                        <div class="number color5 single"><?php echo number_format($CalifBD['Sabor'], 2); ?></div>                         

                        <br class="clearer" />

                    </div>

                    <br class="clearer" />

                    <div class="rating-meter-wrapper">
                        <div class="rating-meter" id="meter2" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-meter-inner-bg.png);background-position:0px 0px;background-repeat:repeat-x;">&nbsp;</div>
                    </div>

                </div>

                <script type="text/javascript">
                jQuery(window).load(function() {
                    jQuery('#criteria2').delay(2000).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                    jQuery('#meter2').delay(2000).animate({                                     
                                    backgroundPosition: '<?php echo number_format($CalifBD['Sabor'], 2)*22.5; ?> 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                });                     
                </script>

                <div id="criteria3" class="rating-criteria-wrapper regular number">

                    <div class="rating-criteria">
                        Cuerpo  
                    </div>

                    <div id="rating3" class="rating-wrapper small">

                        <div class="number color4 single"><?php echo number_format($CalifBD['Cuerpo'], 2); ?></div> 

                        <br class="clearer" />

                    </div>

                    <br class="clearer" />

                    <div class="rating-meter-wrapper">
                        <div class="rating-meter" id="meter3" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-meter-inner-bg.png);background-position:0px 0px;background-repeat:repeat-x;">&nbsp;</div>
                    </div>

                </div>

                <script type="text/javascript">
                jQuery(window).load(function() {
                    jQuery('#criteria3').delay(2500).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                    jQuery('#meter3').delay(2500).animate({                                     
                                    backgroundPosition: '<?php echo number_format($CalifBD['Cuerpo'], 2)*22.5; ?> 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                });                     
                </script>





                <div id="criteria4" class="rating-criteria-wrapper regular number">

                    <div class="rating-criteria">
                        General  
                    </div>

                    <div id="rating4" class="rating-wrapper small">

                        <div class="number color5 single"><?php echo number_format($CalifBD['CGeneral'], 2); ?></div> 

                        <br class="clearer" />

                    </div>

                    <br class="clearer" />

                    <div class="rating-meter-wrapper">
                        <div class="rating-meter" id="meter4" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-meter-inner-bg.png);background-position:0px 0px;background-repeat:repeat-x;">&nbsp;</div>
                    </div>

                </div>

                <script type="text/javascript">
                jQuery(window).load(function() {
                    jQuery('#criteria4').delay(3000).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                    jQuery('#meter4').delay(3000).animate({                                     
                                    backgroundPosition: '<?php echo number_format($CalifBD['CGeneral'], 2)*22.5; ?> 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                });                     
                </script>


                <div class="rating-criteria-outer stars">

                    <div id="last-criteria" class="rating-criteria-wrapper last stars" style="opacity:0;">

                        <div class="rating-criteria">
                            Total                               
                        </div>

                        <div id="last-rating" class="rating-wrapper" style="position:relative;left:-100px;">

                            <div class="stars yellow">
                                <?php for ($i=0; $i < $stars; $i++) {
                                    echo "<div class='star full'>&nbsp;</div>";
                                } ?>
                                <?php for ($i=0; $i < (5-$stars); $i++) {
                                    echo "<div class='star empty'>&nbsp;</div>";
                                } ?>
                            </div>

                            <br class="clearer" />

                        </div>

                        <br class="clearer" />

                    </div>

                </div>

                <script type="text/javascript">
                jQuery(window).load(function() {
                    jQuery('#last-criteria').delay(3500).animate({
                        opacity:1,
                        backgroundPosition: '45 0'
                    }, 3600, 'easeOutCubic');
                    jQuery('.number #last-rating, .percentage #last-rating').delay(3500).animate({
                        opacity:1
                    }, 3600, 'easeOutCubic');
                    jQuery('#last-rating').delay(3500).animate({
                        left: '0'
                    }, 2000, 'easeOutCubic');
                });
                </script>

            </div>

            <div class="ribbon-shadow-right">&nbsp;</div>                                             

            <div class="summary">         

                <div class="positive-wrapper">

                    <div class="positive hand">

                        <h3>Lo que le gustó a: <a href="<?php echo base_url()."bb/perfil_usuario?username=".$Cerveza['username']; ?>"><?php echo $Cerveza['username']; ?></a></h3>

                        <br class="clearer" />                                            

                    </div>

                    <?php echo $Cerveza['gusto']; ?>
                </div>                          

                <div class="negative-wrapper">

                    <div class="negative hand">

                        <h3>Lo que no le gustó a: <a href="<?php echo base_url()."bb/perfil_usuario?username=".$Cerveza['username']; ?>"><?php echo $Cerveza['username']; ?></a></h3>

                        <br class="clearer" />                                            

                    </div>
                    <?php echo $Cerveza['desagrado']; ?>
                </div>

            </div>

                <table>

                    <?php 
                        // Obtenemos Rol y Usuario
                        if (strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
                        else $username = $this->session->userdata('username');

                         if (strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
                        else $rol = $this->session->userdata('rol');
                     ?>
                 <div class="botones">

                    <!-- Calificar cerveza -->
                    <?php if (strcmp($username, "Visitante")) {
                    echo "<tr>
                            <form method='post' name='calificar'>
                                <a class='button_link black' href='".base_url()."bb/califica_cerveza?idCheve=".$Cerveza['idCheve']."'>
                                <span>Calificar Cerveza</span></a>
                            </form>
                        </tr>";
                    } ?>

                    <?php if (strcmp($username, "Visitante") && strcmp($rol, "Administrador") && strcmp($rol, "Embajador")) {
                    echo "<tr>
                            <form method='post' name='embajador'>
                                <a class='button_link black' href='".base_url()."bb/solicitud'>
                                <span>Solicitar ser Embajador</span></a>
                            </form>
                        </tr>";
                    } ?>

                    <!-- Favear cerveza -->
                    <?php if (strcmp($username, "Visitante") && (!strcmp($Status, "N") || !strcmp($Status, "D")) ) {
                        echo "
                        <tr>
                            <form method='post' name='favear'>
                                  <input type='hidden' name='fav'>
                                  <input type='hidden' name='usr' value='somePHP'>
                                  <a class='button_link black' href='javascript:document.favear.submit();'>
                                  <span>Favoritear Cerveza</span></a>
                            </form>
                        </tr>";
                    } ?>

                    <?php if (strcmp($username, "Visitante") && (!strcmp($Status, "N") || !strcmp($Status, "F")) ) {
                        echo "
                            <tr>
                                <form method='post' name='dfavear'>
                                    <input type='hidden' name='dfav'>
                                    <a class='button_link black' href='javascript:document.dfavear.submit();'>
                                    <span>Me disgusta</span></a>
                                </form>
                            </tr>";
                    }  ?>
    
                    <!-- Administrador / Embajador -->

                    <?php if (!strcmp($rol, "Administrador") && ($Cerveza['habilitado'] == 0)) {
                    echo "
                        <tr>
                            <form method='post' name='activar'>
                                <input type='hidden' name='act'>
                                <a class='button_link black' href='javascript:document.activar.submit();'>
                                <span>Activar Cerveza</span></a>
                            </form>
                        </tr>";
                    } ?>
                    

                    <?php if (!strcmp($rol, "Administrador") && ($Cerveza['habilitado'] == 1)) {
                    echo "
                        <tr>
                            <form method='post' name='desactivar'>
                                <input type='hidden' name='des'>
                                <a class='button_link black' href='javascript:document.desactivar.submit();'>
                                <span>Desactivar Cerveza</span></a>
                            </form>
                        </tr>";
                    } ?>

                    <?php if ((!strcmp($rol, "Administrador") || !strcmp($rol, "Embajador")) && ($Cerveza['habilitado'] == 1)) {
                    echo "
                        <tr>
                            <form method='post' name='modificar'>
                                <input type='hidden' name='mod'>
                                <a class='button_link black' href='javascript:document.modificar.submit();'>
                                <span>Modificar Cerveza</span></a>
                            </form>
                        </tr>";
                    } ?>

                    <?php if (!strcmp($rol, "Administrador") || !strcmp($rol, "Embajador")) {
                    echo "<tr>
                            <form method='post' name='embajador'>
                                <a class='button_link black' href='".base_url()."bb/agrega_cerveza'>
                                <span>Nueva cerveza</span></a>
                            </form>
                        </tr>";
                    } ?>

                          </div>
                  </table>


                          <div class="ribbon-shadow-right">&nbsp;</div>                                             

                      </div>

                      <br class="clearer" /><br />    

                      <div class="bottom">

                        <div class="section">

                            Fecha de alta: <?php echo $Cerveza['fecha']; ?>  Por <a href="<?php echo base_url()."bb/perfil_usuario?username=".$Cerveza['username']; ?>" title="Perfil de: <?php echo $Cerveza['username']; ?>" 
                            rel="author external"> <?php echo $Cerveza['username']; ?></a> 

                        </div> 

                    </div>

                    <?php if (strcmp(($Cerveza['tags']), "")) { ?>
                        <div class="content-panel"> 
                            <div class="tags">
                                <!-- Aqui hay que generar las tags del perfil de la cerveza -->
                                <?php $tags = explode(",", $Cerveza['tags']) ?>
                                    <?php for( $i=0; $i<sizeof($tags); $i++ ): ?>
                                      <a href='<?php echo base_url()."bb/buscar?palabra=".$tags[$i]."&tipo=tag"; ?>' title='<?php echo $tags[$i]; ?>' class='hybird'>
                                        <?php echo $tags[$i]; ?>
                                      </a>
                                    <?php endfor; ?>
                            </div> 
                        </div>
                    <?php } ?>
                </div>

                <div class="clearer"></div>
                <?php 
                if(gettype($Calificaciones) === "array"){
                    echo "<h2>Calificaciones:</h2>";
                    echo "<ol class='commentlist'>";
                    foreach ($Calificaciones as $calif) {
                      echo "<li><div class='comment-wrapper'><div class='comment-inner'>";
                      echo "<div class='author-image'>";
                      echo "<img src='".base_url()."upics/".$calif['username'].".jpg' height='50' width='50' class='hoverZoomLink'>";                  
                      echo "</div>";
                      echo "<div class='comment-author'>";
                      echo "<a href='".base_url()."bb/perfil_usuario?username=".$calif['username']."' rel='external nofollow' class='url' target='_blank'>".$calif['username']."</a>";
                      echo "</div>";
                      echo "<div class='comment-text'>";
                      echo "</br></br><b>Fecha:</b>&emsp;".$calif['Fecha'];
                      echo "</br></br><b>Aroma:</b>&emsp;".$calif['Aroma']."&emsp;";
                      echo "<b>Apariencia:</b>&emsp;".$calif['Apariencia']."&emsp;";
                      echo "<b>Sabor:</b>&emsp;".$calif['Cuerpo']."&emsp;";
                      echo "<b>Cuerpo:</b>&emsp;".$calif['Cuerpo']."&emsp;";
                      echo "<b>General:</b>&emsp;".$calif['General'];
                      echo "</br></br><b>Comentario:</b>&emsp;".$calif['Comentario'];
                      // Aqui va el numero de upvotes y downvotes en vez de los 5, los # 
                      //se reemplazan por la funcion de javascript/ajax/etc
                      // echo "</br><div align='right'><a href='#'><span style='color: green;'><b>".$calif['Upvotes']."</b></span>
                      // <img src='".base_url()."images/positive-hand.png'/></a>
                      // &emsp;
                      // <a href='#'><span style='color: #BF0404;'><b>".$calif['Downvotes']."</b></span>
                      // <img id='' src='".base_url()."images/negative-hand.png'/></a></div>";
                      echo "</div></div></div><br class='clearer'></li>";
                  }
                  echo "</ol></br>";
              }
              else {
                echo "<h3>No hay calificaciones para esta cerveza.</h3>";
            }
            ?>
        </div>

    </div>
</div>
