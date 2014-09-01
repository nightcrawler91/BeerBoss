<?php include("inc/header.php"); //get the header ?>

<div class="main-content-left">

	<div class="page-content">
        
        <div class="ribbon-shadow-left">&nbsp;</div>       
        
        <div class="section-wrapper">
        
            <div class="section">
            
                404 - Page Not Found  
                          
            </div>        
        
        </div>
    
        <div class="section-arrow">&nbsp;</div>
        
        <div class="content-panel">
        
        	<h1 class="error">That just happened.</h1>
            
            <p>
				We could not find the page that you requested. It is possible that it was deleted since the last time you viewed it, or that you typed in the wrong URL. In any case, we want you to find what you are looking for, so we offer you the following options:
            </p>
            
            <p>
            
                <div class="home">1. Go back to the <a href="index.php">home page</a> and start your journey over.</div>
                
                <div class="menu">2. Use the menu above to locate the section you wish to view.</div>
                
                <div class="search">3. Search our site:</div>
            
            </p>
            
            <div class="searchform">
            
                <!-- SEARCH -->  
                <form method="get" id="search404" action="#">                             
                    <input type="text" value="search" onfocus="if (this.value == 'search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search';}" name="s" id="s" />          
                </form>
                
            </div> 
            
            <div class="note">
            
            	Enter keyword(s) and press enter 
                               
            </div>
            
        </div>      
        
    </div>
    
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

	<?php include("inc/trending.php"); //get the trending slider ?>

</div>

<div class="sidebar">

    <?php include("inc/sidebar.php"); //get the sidebar ?>

</div>	

<br class="clearer" />

<?php include("inc/footer.php"); //get the footer ?>