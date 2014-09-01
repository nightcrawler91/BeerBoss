<?php $this->load->helper('url'); ?>

<div id="latest-wrapper">

    <div class="latest-scroller-wrapper">    

        <a href="#" class="latest-prev">&nbsp;</a>

        <div class="latest"> <!-- begin latest slider -->

            <ul> 
                <!-- Aqui inicia el foreach-->
                <?php foreach ($nuevas as $cerv): ?>
                <li>
                    <div class='rating-wrapper small'>
                        <?php if($cerv['Global']!=0)
                        echo "<div class='number color5'>".$cerv['Global']."/50</div>";
                        else
                            echo "<div class='number color1'>S/C</div>";?>
                    </div> 
                    <a class='darken small' href='<?php echo base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']; ?>'>
                        <img width='130' height='109' src='<?php echo base_url(); ?>uploads/<?php echo $cerv['idCheve'].".jpg"; ?>' style='display: block; margin-left: auto; margin-right: auto'/>
                    </a>
                    <a class='title' href='<?php echo base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']; ?>'><?php echo $cerv['nombre'];?><br/></a>
                    <div class='icon'>
                        <img alt='icon' src='<?php echo base_url()."images/review-beer-dark.png"; ?>'/>
                    </div>                
                </li>
            <?php endforeach; ?>
            <!-- Hasta aqui llega el foreach -->                
        </ul>
    </div> <!-- end latest -->
    <a href="#" class="latest-next">&nbsp;</a>
    <br class="clearer" />        
</div>
</div> 
<!-- begin responsive version -->
<!-- Aqui basicamente haces lo mismo pero otra vez, es para la version responsiva -->

<div id="latest-wrapper-responsive">

	<div class="latest-scroller-wrapper">

        <div class="latest"> <!-- begin latest slider -->

            <ul> 
              <!-- Inicias foreach -->          

              <li>
                <!-- Aqui va la calificacion promediada en vez del 7.4 -->        

                <div class="rating-wrapper small"><div class="number color4">7.4</div></div>                     

                <a class="darken small" href="single-review-stars.php"><img width="163" height="109" src="http://www.industrialthemes.com/made/wp-content/uploads/2012/07/photodune-277307-rock-concert-s-163x109.jpg" alt="rock concert" /></a>

                <a class="title" href="single-review-stars.php">Gotye &#8211; Mirrors</a>                 

                <div class="icon">

                    <img alt="icon" src="<?php echo base_url();?>/images/review-beer-dark.png" />
                    
                </div> 

            </li>

            <!-- Hasta aqui llega el foreach -->
        </ul>

    </div> <!-- end latest -->

    <br class="clearer" />

</div>

</div> 

<!-- end responsive version -->

<div class="clearer hide-responsive">&nbsp;</div><br class="hide-responsive" />