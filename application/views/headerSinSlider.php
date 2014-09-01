<?php session_start(); ?>
<?php $this->load->helper('url'); ?>
<?php 
    if(strcmp($this->session->userdata('username'), "") == 0) $username = "Visitante";
    else $username = $this->session->userdata('username');
    if(strcmp($this->session->userdata('rol'), "") == 0) $rol = "Visitante";
    else $rol = $this->session->userdata('rol');      
    if(!isset($rndm)) $rndm = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <meta name="viewport" content="width=device-width" />

    <meta property="og:title" content="BeerBoss" />
    
    <meta property="og:description" content="BeerBoss es la mejor red social de cervezas artesanales!" />
    
    <meta property="og:image" content="<?php echo base_url();?>/images/logo.png" />
    
    <title>BeerBoss</title>
    
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" href="<?php echo base_url();?>style.css" type="text/css" /> <!-- the main structure and main page elements style --> 
    
    <link rel="stylesheet" href="<?php echo base_url();?>js/js.css" type="text/css" media="screen" /> <!-- styles for the various jquery plugins -->

    <!--
    
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap.min.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap-responsive.min.css" type="text/css" media="screen" />    

    <link type='text/javascript' src="<?php echo base_url();?>bootstrap.min.js"/> 
    
    -->

    <!-- <link type='text/javascript' src="<?php echo base_url();?>js/plugins.js"/>  -->

    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/ie7.css" />
    <![endif]-->
    
    <!--[if IE 8]>
            <link rel="stylesheet" type="text/css" href="css/ie8.css" />
    <![endif]-->
    
    <!--[if gt IE 8]>
            <link rel="stylesheet" type="text/css" href="css/ie9.css" />
    <![endif]-->

    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=3.3.1'></script>
    
</head>

<body> <!-- use this for dark skin instead: <body class="dark-skin"> 

    <!<?php //include("demo-panel.php"); //get the demo panel ?>-->

    <div id="top-menu-wrapper"> <!-- begin top menu -->
        
        <div class="ribbon-shadow-left">&nbsp;</div>
    
        <div id="top-menu">
    <!--        
            <div class="container mid">
            
                <div class="menu">
                    <ul id="menu-top-menu">
                        <li><a href="page-jquery-extras.php">jQuery Extras</a>
                            <ul>
                                <li><a href="page-jquery-extras.php">Sliders</a></li>
                                <li><a href="page-jquery-extras.php">Toggles</a></li>
                                <li><a href="page-jquery-extras.php">Tabs</a></li>
                            </ul>
                        </li>
                        <li><a href="page-fancy-boxes.php">Styled Goodies</a>
                            <ul>
                                <li><a href="page-fancy-boxes.php">Fancy Boxes</a></li>
                                <li><a href="page-styled-lists.php">Styled Lists</a>
                                    <ul>
                                        <li><a href="#">Sample Menu Item</a></li>
                                        <li><a href="#">Sample Menu Item</a></li>
                                        <li><a href="#">Sample Menu Item That Is Really Really Really Super Long!</a></li>
                                    </ul>
                                </li>
                                <li><a href="page-buttons.php">Buttons</a></li>
                                <li><a href="page-columns.php">Columns</a></li>
                                <li><a href="page-styled-html-elements.php">More HTML Elements</a></li>
                            </ul>
                        </li>
                        <li><a href="404.php">Custom 404 Page</a></li>
                        <li><a href="page-full-width.php">Full-Width page</a></li>
                        <li><a href="page-contributors.php">Contributors Listing</a></li>
                    </ul>                            
                </div> 
                                
                &nbsp;
                
                <select id="select-menu-top-menu">
                    <option>Page Navigation</option>
                    <option value="page-jquery-extras.php">jQuery Extras</option>
                    <option value="page-jquery-extras.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sliders</option>
                    <option value="page-jquery-extras.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Toggles</option>
                    <option value="page-jquery-extras.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tabs</option>
                    <option value="page-fancy-boxes.php">Styled Goodies</option>
                    <option value="page-fancy-boxes.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fancy Boxes</option>
                    <option value="page-styled-lists.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Styled Lists</option>
                    <option value="page-buttons.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buttons</option>
                    <option value="page-columns.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Columns</option>
                    <option value="page-styled-html-elements.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More HTML Elements</option>
                    <option value="404.php">Custom 404 Page</option>
                    <option value="page-full-width.php">Full-Width Page</option>
                    <option value="page-contributors.php">Contributors Listing</option>
                </select> 
                
            </div>
            
            <div id="top-widget">
                    
                <div class="top-social">
                
                    <a href="#" class="rss">&nbsp;</a>
                    
                    <a href="#" class="facebook">&nbsp;</a>
                    
                    <a href="#" class="twitter">&nbsp;</a>
                
                </div>
            
            </div>
        -->
        <!--
        <form action="<?php echo base_url();?>index.php/logInController"><input name="login" type="submit" id="submit" value="Login"/></form>
        <form action="<?php echo base_url();?>index.php/sgnController"><input name="registro" type="submit" id="submit" value="Registro" /></form>
        -->

            <div id="search">
            
                <div class="wrapper">
                
                    <div class="inner">                      

                        <form method="get" id="searchformtop" action="search.php">                             
                            <input type="text" value="Buscar" onfocus="if (this.value == 'Buscar') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar';}" name="s" id="s" />          
                        </form>                      
                        
                    </div>
                    
                </div>
            
            </div>
            
            <br class="clearer" />
        
        </div>
        
        <div class="ribbon-shadow-right">&nbsp;</div>
    
    </div>
    
    <div id="page-wrapper"> <!-- everything below the top menu should be inside the page wrapper div -->
    
        <div id="logo-bar-wrapper">  <!--begin the main header logo area-->

            <div id="logo-bar">
            
                <div id="logo-wrapper">
                
                    <div id="logo"><!--logo and section header area-->
            
                        <a href="index.php">
                            <img id="site-logo" alt="BeerBoss" src="<?php echo base_url();?>/images/logo.png" />
                            <img id="site-logo-iphone" alt="Made" src="<?php echo base_url();?>/images/logo.png" />
                            <img id="site-logo-ipad" alt="Made" src="<?php echo base_url();?>/images/logo.png" />
                        </a>
                        
                    </div>
                    
                    <br class="clearer" />
                    
                    <div class="subtitle"></div>
                    
                </div>  

                <div id="ad-header">  <!--header ad--> 
                    <!--<a href="http://themeforest.net/?ref=IndustrialTheme"><img src="http://demos.brianmcculloh.com/continuum/files/2011/03/ad-top.png" alt="ad" /></a> -->       
                </div>
                
                <br class="clearer" />
                
            </div>
            
            <div id="logo-bar-shadow">&nbsp;</div>
            
        </div> <!--end the logo area -->
            
        <div id="cat-menu" class="cat-menu">
        
            <a class="home-link" href="<?php echo base_url();?>index.php">&nbsp;</a>
    
            <ul id="menu-main-menu">
                <li><a href="">Cervezas</a>
<!--                     <ul>
                    </ul> -->
                </li>
                <li><a href="single-review-stars.php">Cerveceras</a></li>
                <!-- <li><a href="single-post.php">Single Blog Post</a></li> -->
                <li><a href="single-review-stars.php">Calificaciones</a>
                    <!--<ul>
                         <li><a href="single-review-numbers.php">Number Ratings</a></li> -->
                        <!-- <li><a href="single-review-percentages.php">Percentage Ratings</a></li>
                        <li><a href="single-review-stars.php">Star Ratings</a></li>
                        <li><a href="single-review-letters.php">Letter Grade Ratings</a></li> 
                    </ul>-->
                </li>
                <!-- <li><a href="#">Drop Down Menu</a>
                    <ul>
                        <li><a href="#">Sub Menu Item</a></li>
                        <li><a href="#">Sub Menu Item</a></li>
                        <li><a href="#">Second Level Drop Down</a>
                            <ul>
                                <li><a href="#">Sub Menu Item</a></li>
                                <li><a href="#">Third Level Drop Down</a>
                                    <ul>
                                        <li><a href="#">Sub Menu Item</a></li>
                                        <li><a href="#">Sub Menu Item</a></li>
                                        <li><a href="#">Sub Menu Item</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Sub Menu Item</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Sub Menu Item</a></li>
                        <li><a href="#">Sub Menu Item</a></li>
                        <li><a href="#">Sub Menu Item</a></li>
                    </ul>
                </li>
                <li><a href="review-directory-a.php">Review Directory Layout A</a></li>
                <li><a href="review-directory-b.php">Review Directory Layout B</a></li> -->
                <li><a href="single-review-stars.php">Para empezar</a></li>
                 <?php if (strcmp($username, "Visitante")==0) echo "<li><a href=".base_url()."bb/log_in>Login</a></li>"; ?>
                <?php if (strcmp($username, "Visitante")==0) echo "<li><a href=".base_url()."bb/sign_up>Registro</a></li>"; ?>
                <?php if (strcmp($rol, "Administrador") == 0 || strcmp($rol, "Embajador") == 0) echo "<li><a href=".base_url()."bb/agrega_cerveza>Alta Cerveza</a></li>" ?>
                <?php if(strcmp($username, "Visitante") != 0) echo "<li><a href=".base_url()."bb/logout>Logout</a></li>"; ?>
            </ul> 
            
            <select id="select-menu-main-menu">
                <option>Category Navigation</option>
                <option value="archive-a.php">Layouts</option>
                <option value="index-full-width.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full-Width Homepage</option>
                <option value="archive-a.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive Layout A</option>
                <option value="archive-b.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive Layout B</option>
                <option value="archive-c.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive Layout C</option>
                <option value="archive-d.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive Layout D</option>
                <option value="archive-e.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive Layout E</option>
                <option value="archive-f.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archive Layout F</option>
                <option value="single-post.php">Single Blog Post</option>
                <option value="single-review-numbers.php">Single Reviews</option>
                <option value="single-review-numbers.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number Ratings</option>
                <option value="single-review-percentages.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Percentage Ratings</option>
                <option value="single-review-stars.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Star Ratings</option>
                <option value="single-review-letters.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Letter Grade Ratings</option>
                <option value="review-directory-a.php">Review Directory layout A</option>
                <option value="review-directory-b.php">Review Directory layout B</option>
            </select>                             
                                    
            <div id="random-article">
        
                <a title="Random Article" href="<?php echo base_url();?>bb/perfil_cerveza?idCheve=<?php echo $rndm ?>"><img alt="Random Article" src="<?php echo base_url();?>/images/random-article.png" /></a>
            
            </div>   
  
        </div> 
        
        <br class="clearer hide-responsive-small" />
        
        <div class="cat-menu tax">
            <ul id="menu-sub-menu" class="menu">
                <!-- <li><a href="index-full-width.php">Full-Width Homepage</a></li>
                <li><a href="search.php">Search Results</a></li>
                <li><a href="404.php">404 page</a></li>
                <li><a href="page-styled-html-elements.php">Styled HTML Elements</a></li>
                <li><a href="page-full-width.php">Full-Width Page</a></li>
                <li><a href="page-contributors.php">Contributors Listing</a></li>  -->                   
            </ul> 
        </div>
        
        <br class="clearer hide-responsive-small" />        
        <div id="main-wrapper">        