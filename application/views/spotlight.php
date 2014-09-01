<div class="main-content-left">
    <div id="spotlight-wrapper">

       <div class="ribbon-shadow-left">&nbsp;</div>

       <div class="section-wrapper"> <!-- spotlight section header -->
          
           <div class="section">        
               Las Mas Nuevas        
           </div>

       </div>

       <div class="ribbon-shadow-right">&nbsp;</div>   

       <div class="section-arrow">&nbsp;</div>

       <div class="spotlight">

        <div id="spotlight-slider"> <!-- begin spotlight slider -->

            <ul>
                <!-- Aqui inicia el foreach  -->
                <?php foreach ($nuevas as $cerv): ?>
                <li>
                  <div class="post-panel"> 
                      <div class="category"> 
                          <div class="ribbon-shadow-left">&nbsp;</div>                              
                          <div class="icon" style="background:url('<?php echo base_url();?>images/review-beer-light.png') no-repeat 0px 0px;">&nbsp;</div>
                          <!-- Aqui va el nombre de la categoria, podrias poner el estilo,
                          o poner las mas nuevas o algo asi -->
                          <div class="catname"><?php echo $cerv['cdesc']; ?></div> 
                          <div class="category-arrow">&nbsp;</div>        
                      </div>
                      <!-- Aqui harias referencia al nombre de la cerveza como a su imagen, 
                      recuerda que la imagen el es id de la cerveza + .jpg -->
                      <a class="darken" href="<?php echo base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']; ?>"><img width="280" height="170" src="<?php echo base_url();?>uploads/<?php echo $cerv['idCheve'].".jpg"; ?>" alt="movies2" /></a>
                      <div class="inner">
                          <h2><a href="<?php echo base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']; ?>"><?php echo $cerv['nombre']; ?></a></h2>
                          <!-- Aqui va un cacho de la descripcion de la cerveza -->
                          <div class="excerpt">
                            <?php if (strlen($cerv['Descripcion']) <= 100 ) echo $cerv['Descripcion']; 
                            else { 
                                for ($i=0; $i<=100; $i++) { echo $cerv['Descripcion'][$i]; }
                                    echo "...";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="more-bar">
                      <div class="arrow-catpanel-top">&nbsp;</div>
                      <div class="rating-wrapper small">
                        <?php if($cerv['Global']!=0)
                            echo "<div class='number color4'>".$cerv['Global']."/50</div>";
                        else
                            echo "<div class='number color1'>S/C</div>";?>
                    </div>
                    <div class="comments">
                      <a href="<?php echo base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']; ?>" title="Comentarios en NombreCerveza"><?php echo $cerv['Ccuenta']; ?> Comentarios</a>
                  </div>
                  <div class="more"><a href="<?php echo base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']; ?>">Más</a></div>
              </div>
          </div>
      </li>
  <?php endforeach; ?>
  <!-- Hasta aqui llega el foreach -->                            
</ul>

</div> <!--end spotlight slider-->

           <?php 
             if (strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
             else $rol = $this->session->userdata('rol');

             if (!strcmp($rol, "Administrador") || !strcmp($rol, "Embajador")) {
                echo "<tr>
                    <form method='post' name='embajador'>
                        <a class='button_link black' href='".base_url()."bb/agrega_cerveza'>
                        <span>Nueva cerveza</span></a>
                    </form>
                </tr>";
              } 
            ?>
<!-- responsive version -->

<div id="spotlight-slider-responsive"> <!-- begin spotlight slider -->

    <ul>
       <!-- Aqui inicia el foreach -->       
       <li>

        <div class="post-panel"> 

            <div class="category"> 

                <div class="ribbon-shadow-left">&nbsp;</div>                        

                <div class="icon" style="background:url('<?php echo base_url();?>/images/review-beer-light.png') no-repeat 0px 0px;">&nbsp;</div> 
                            <!-- Aqui va el nombre de la categoria, podrias poner el estilo,
                            o poner las mas nuevas o algo asi -->
                            <div class="catname">                                       
                                Movie Review                                 
                            </div> 
                            
                            <div class="category-arrow">&nbsp;</div> 

                        </div>
                        <!-- Foto de la cerveza -->
                        <a class="darken small" href="#"><img width="230" height="135" src="http://www.industrialthemes.com/made/wp-content/uploads/2012/06/movies2-230x135.jpg" alt="NombreCerveza" /></a>
                        
                        <div class="inner">

                            <h2><a href="#">Nombre de la cerveza</a></h2>
                            <!-- Aqui va un cacho de la descripcion de la cerveza -->
                            <div class="excerpt">Ut suscipit dapibus tellus, vitae gravida lectus faucibus sed. Sed dapibus mauris vulputate quam imperdiet egestas. Ut suscipit dapibus tellus, vitae gravida lectus faucibus sed. Sed dapibus mauris vulputate quam imperdiet eges...</div>
                            
                        </div>
                        
                        <div class="more-bar">

                            <div class="arrow-catpanel-top">&nbsp;</div>                            
                            <!-- Aqui en vez del 42 va la calificacion de la cerveza el &#37; es % -->                                                            

                            <div class="rating-wrapper small"><div class="number color4">42&#37;</div></div> 

                            <div class="comments">

                                <a href="#" title="Comentarios en NombreCerveza">0 Comentarios</a>     

                            </div>                                

                            <div class="more"><a href="#">Más</a></div>

                        </div>

                    </div>                    

                </li>
                
                <li>

                    <div class="post-panel right"> 

                        <div class="category"> 

                            <div class="ribbon-shadow-left">&nbsp;</div>                        

                            <div class="icon" style="background:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/review-fashion-light.png) no-repeat 0px 0px;">&nbsp;</div> 
                            
                            <div class="catname">                                       
                                Fashion Review                                 
                            </div> 
                            
                            <div class="category-arrow">&nbsp;</div> 

                        </div>

                        <a class="darken small" href="single-review-numbers.php"><img width="230" height="135" src="http://www.industrialthemes.com/made/wp-content/uploads/2012/06/fashion3-230x135.jpg" alt="fashion3" /></a>
                        
                        <div class="inner">

                            <h2><a href="single-review-numbers.php">5 Colorful Watches From Zappos for under $50</a></h2>
                            
                            <div class="excerpt">Donec a tellus a eros laoreet ultrices non non nisi. Nulla et sem nisi. Praesent egestas ultricies feugiat. In hac habitasse platea dictumst. Cras a lacus erat. Aenean tempor nibh non lorem vulputate sodales. Suspendisse erat d...</div>
                            
                        </div>
                        
                        <div class="more-bar">

                            <div class="arrow-catpanel-top">&nbsp;</div>                            

                            <div class="rating-wrapper small"><div class="letter color3">C</div></div>

                            <div class="comments">

                                <a href="single-review-numbers.php" title="Comment on 5 Colorful Watches From Zappos for under $50">0 comments</a>  

                            </div>                            

                            <div class="more"><a href="single-review-numbers.php">More</a></div>

                        </div>

                    </div>                    

                    <div class="clearer"></div>

                </li>
                
                <li>

                    <div class="post-panel"> 

                        <div class="category"> 

                            <div class="ribbon-shadow-left">&nbsp;</div>                        

                            <div class="icon" style="background:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/review-restaurant-light.png) no-repeat 0px 0px;">&nbsp;</div> 
                            
                            <div class="catname">                                       
                                Restaurant Review                                 
                            </div> 
                            
                            <div class="category-arrow">&nbsp;</div> 

                        </div>

                        <a class="darken small video" href="single-review-numbers.php"><img width="230" height="135" src="http://www.industrialthemes.com/made/wp-content/uploads/2012/06/restaurants6-230x135.jpg" alt="restaurants6" /></a>
                        
                        <div class="inner">

                            <h2><a href="single-review-numbers.php">Sugar Rush: Banana Stracciatella Gelato from Eataly</a></h2>
                            
                            <div class="excerpt">Donec sollicitudin venenatis mattis. Vestibulum fermentum, risus a luctus fermentum, enim purus aliquet tellus, id interdum nisl velit nec diam. Etiam mauris odio, aliquam a elementum eu, vulputate eu nunc.</div>
                            
                        </div>
                        
                        <div class="more-bar">

                            <div class="arrow-catpanel-top">&nbsp;</div>                            

                            <div class="rating-wrapper small"><div class="stars yellow"><div class="star  full">&nbsp;</div><div class="star  full">&nbsp;</div><div class="star  half">&nbsp;</div><div class="star ">&nbsp;</div><div class="star ">&nbsp;</div></div></div>                         

                            <div class="comments">

                                <a href="single-review-numbers.php" title="Comment on Sugar Rush: Banana Stracciatella Gelato from Eataly">0 comments</a> 

                            </div>                                

                            <div class="more"><a href="single-review-numbers.php">More</a></div>

                        </div>

                    </div>                    

                </li>
                
                <li>

                    <div class="post-panel right"> 

                        <div class="category"> 

                            <div class="ribbon-shadow-left">&nbsp;</div>                        

                            <div class="icon" style="background:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/review-music-light.png) no-repeat 0px 0px;">&nbsp;</div>
                            
                            <div class="catname">                                       
                                Music Review                                 
                            </div> 
                            
                            <div class="category-arrow">&nbsp;</div> 

                        </div>

                        <a class="darken small video" href="single-review-numbers.php"><img width="230" height="135" src="http://www.industrialthemes.com/made/wp-content/uploads/2012/06/music2-230x135.jpg" alt="music2" /></a>
                        
                        <div class="inner">

                            <h2><a href="single-review-numbers.php">The Lumineers &#8211; The Lumineers</a></h2>
                            
                            <div class="excerpt">Donec a tellus a eros laoreet ultrices non non nisi. Nulla et sem nisi. Praesent egestas ultricies feugiat. In hac habitasse platea dictumst. Cras a lacus erat. Aenean tempor nibh non lorem vulputate sodales. Suspendisse erat d...</div>
                            
                        </div>
                        
                        <div class="more-bar">

                            <div class="arrow-catpanel-top">&nbsp;</div>                            

                            <div class="rating-wrapper small"><div class="number color5">8.6</div></div>                         

                            <div class="comments">

                                <a href="single-review-numbers.php" title="Comment on The Lumineers &#8211; The Lumineers">0 comments</a> 

                            </div>                                

                            <div class="more"><a href="single-review-numbers.php">More</a></div>

                        </div>

                    </div>                    

                    <div class="clearer"></div>                

                </li>                        

            </ul>

        </div> <!--end spotlight slider-->

        <!-- end responsive version -->
        
    </div>

</div>

<div class="clearer"></div><br class="clearer" />
</div>