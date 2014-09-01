<?php $this->load->helper('url'); ?>

<?php include("header.php"); //get the header ?>

<?php include("sharebox.php"); //get the sharebox ?>

<script type='text/javascript' src='<?php echo base_url();?>/js/jquery.min.js'></script>

<div class="main-content-left">

	<div class="page-content review">
                    
       <link rel="image_src" href="<?php echo base_url();?>/    images/toro2.png" />
                        
        <div class="overview-wrapper">
        
            <h1 class="title">Beer</h1>
            
            <div class="overview">
            
                <div class="arrow-catpanel-bottom">&nbsp;</div> 
                                    
                <div class="left-panel">     
                                                
                    <div class="article-image video">
                                                        
                        <iframe width="350" height="197" src="http://www.youtube.com/embed/wxlD_lJeosU" frameborder="0" allowfullscreen></iframe> 
                                                           
                    </div>                        
                                                    
                    <br class="clearer" />
                                            
                    <div class="category"> 
        
                        <div class="ribbon-shadow-left">&nbsp;</div>
                        
                        <div class="catname">
                                  
                            Ficha Técnica 
                                                               
                        </div> 
                        
                        <div class="category-arrow">&nbsp;</div>
                                 
                    </div>
                    
                    <br class="clearer" />
            
                    <span class="taxName">Estilo</span>: <span class="taxContent"><a href="archive-a.php" rel="tag">Meh</a>
                    
                    <div class="separator">&nbsp;</div>
                    
                    <span class="taxName">Sub-Estilo</span>: <span class="taxContent"><a href="archive-a.php" rel="tag">Mas Meh</a>
                    
                    <div class="separator">&nbsp;</div>
                    
                    <span class="taxName">Familia</span>: <span class="taxContent"><a href="archive-a.php" rel="tag">Ale</a>, 
                    
                    <div class="separator">&nbsp;</div>
                    
                    <span class="taxName">ABV</span>: <span class="taxContent"><a href=# rel="tag">5.5%</a></span>
                    
                    <div class="separator">&nbsp;</div>
                    
                    <span class="metaName">Color</span>: <span class="metaContent">Negro</span>
                    
                    <div class="separator">&nbsp;</div>
                    
                    <span class="metaName">IBU's</span>: <span class="metaContent">35-40</span>
                    
                    <div class="separator">&nbsp;</div>
                    
                    <span class="metaName">País</span>: <span class="metaContent">México</span>
                    
                    <div class="separator">&nbsp;</div>   
                                            
                </div>
                
                <div class="right-panel">
                                                        
                    <div class="ratings-wrapper">
                    
                        <div id="criteria0" class="rating-criteria-wrapper regular number">
                        
                            <div class="rating-criteria">
                                Aroma						
                            </div>
                            
                            <div id="rating0" class="rating-wrapper small" style="position:relative;left:-160px;">
                            
                                <div class="number color5 single">4.9</div>                         
                                
                            	<br class="clearer" />
                            
                            </div>
                            
                            <br class="clearer" />
                            
                            <div class="rating-meter-wrapper"><div class="rating-meter" id="meter0">&nbsp;</div></div>
                            
                        </div>
                        
                        <script type="text/javascript">
                            jQuery(window).load(function() {
                                jQuery('#criteria0').delay(1000).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                                jQuery('#meter0').delay(1000).animate({                                     
                                    backgroundPosition: '110.25 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                            });                     
                        </script>
                                            
                        <div id="criteria1" class="rating-criteria-wrapper regular number" >
                        
                            <div class="rating-criteria">
                                Apariencia						
                            </div>
                            
                            <div id="rating1" class="rating-wrapper small" style="position:relative;left:-160px;">
                            
                                <div class="number color5 single">9.0</div>                         

                                
                                <br class="clearer" />
                            </div>
                            
                            <br class="clearer" />
                            
                            <div class="rating-meter-wrapper"><div class="rating-meter" id="meter1">&nbsp;</div></div>
                            
                        </div>
                        
                            <script type="text/javascript">
                            jQuery(window).load(function() {
                                jQuery('#criteria1').delay(1500).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                                jQuery('#meter1').delay(1500).animate({                                     
                                    backgroundPosition: '202.5 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                            });                     
                        </script>   
                        
                        <div id="criteria2" class="rating-criteria-wrapper regular number">
                        
                            <div class="rating-criteria">
                                Sabor						
                            </div>
                            
                            <div id="rating2" class="rating-wrapper small" style="position:relative;left:-160px;">
                            
                                <div class="number color5 single">7.5</div>                         
                                
                                <br class="clearer" />
                                
                            </div>
                            
                            <br class="clearer" />
                            
                                <div class="rating-meter" id="meter2" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-meter-inner-bg.png);background-position:0px 0px;background-repeat:repeat-x;">&nbsp;</div>
                            
                        </div>
                        
                        <script type="text/javascript">
                            jQuery(window).load(function() {
                                jQuery('#criteria2').delay(2000).animate({
                                    opacity:1 //set opacity for entire criteria line
                                }, 1500, 'easeOutCubic');
                                jQuery('#meter2').delay(2000).animate({                                     
                                    backgroundPosition: '168.75 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                            });                     
                        </script>
                                            
                        <div id="criteria3" class="rating-criteria-wrapper regular stars" style="opacity:0;">
                        
                            <div id="criteria3" class="rating-criteria-wrapper regular number">
                        
                            <div class="rating-criteria">
                                Cuerpo  
                            </div>
                            
                            <div id="rating3" class="rating-wrapper small">
                            
                                <div class="number color4 single">8.2</div> 
                                
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
                                    backgroundPosition: '184.5 0' //change background position for just the meter bar
                                }, 1500, 'easeOutCubic');                                            
                            });                     
                        </script>
                        
                        <div class="rating-criteria-outer number">
                        
                            <div id="last-criteria" class="rating-criteria-wrapper last percentage">
                            
                                <div class="rating-criteria">
                                    Total General                               
                                </div>
                                
                                <div id="last-rating" class="rating-wrapper" style="background-image:url(http://www.industrialthemes.com/made/wp-content/themes/made/images/rating-number-last-color5.png);opacity:0">
                                
                                    <div class="number color5 single">7.4</div>   
                                    
                                    <br class="clearer" />
                                    
                                </div>
                                
                                <br class="clearer" />
                                
                            </div>
                            
                        </div>
    
                        <script type="text/javascript">
                            jQuery(window).load(function() {
                                jQuery('#last-criteria').delay(1000).animate({
                                    opacity:1,
                                    backgroundPosition: '0 0'
                                }, 6000, 'easeOutCubic');
                                jQuery('.number #last-rating, .percentage #last-rating').delay(1000).animate({
                                    opacity:1
                                }, 6000, 'easeOutCubic');
                            });
                        </script>
                                                
                    </div>
                            
                    <div class="ribbon-shadow-right">&nbsp;</div>                                             
                                            
                    <div class="summary">         
                                                        
                        <div class="positive-wrapper">
                    
                            <div class="positive hand">
                            
                                <h3>Que nos gustó</h3>
                                
                                <br class="clearer" />                                            
                                
                            </div>
                            
                            Maecenas faucibus mattis elit, vitae rutrum arcu suscipit et. Sed blandit convallis convallis. Etiam iaculis porttitor massa, quis tincidunt sapien varius at.                                        
                        </div>                          
                                                        
                        <div class="negative-wrapper">
                    
                            <div class="negative hand">
                            
                                <h3>Que no nos gustó</h3>
                                
                                <br class="clearer" />                                            
                                
                            </div>
                            
                            Maecenas faucibus mattis elit, vitae rutrum arcu suscipit et. Sed blandit convallis convallis. Etiam iaculis porttitor massa, quis tincidunt sapien varius at.                                         
                        </div>
                                                        
                    </div>
                                            
                </div>
                
                <br class="clearer" /><br />
                                    
<!--                 <div class="excerpt">
                
                    <div class="bottom-line">Our Final Take</div>
                            
                    <p>Ut suscipit dapibus tellus, vitae gravida lectus faucibus sed. Sed dapibus mauris vulputate quam imperdiet egestas. Ut suscipit dapibus tellus, vitae gravida lectus faucibus sed. Sed dapibus mauris vulputate quam imperdiet egestas.</p>
                
                </div> -->
                                    
                <div class="bottom">
                
<!--                     <div class="comment-bubble">
                
                        <a href="http://www.industrialthemes.com/made/movie/the-hobbit-an-unexpected-journey/#respond" title="Comment on The Hobbit: An Unexpected Journey">0</a>                            
                    </div> -->
                
                    <div class="section">
                    
                        Publicado el 12 de Marzo del 2013 por <a href="http://www.google.com" title="Visita el sitio de Eduardo Rocha" rel="author external">Eduardo Rocha</a> 
                                               
                    </div> 
                    
                </div>
            
            </div>
        
        </div>
                    
        <br class="clearer" />                       
                        
    </div>
    
    <?php include("comments.php"); //get the comments ?> 

	<?php //include("trending.php"); //get the trending slider ?>

</div>

<div class="sidebar">

    <?php include("sidebar.php"); //get the sidebar ?>

</div>	

<br class="clearer" />

<?php include("footer.php"); //get the footer ?>