<?php include("header.php"); //get the header ?>

<script type="text/javascript">
  function hvalue() {
    var valor = document.getElementById("t").value;
    document.getElementById("tipo").value=valor;
  }
</script>

<div class="main-content-left">

	<div class="page-content">
        
        <div class="ribbon-shadow-left">&nbsp;</div>       
        
        <div class="section-wrapper">
        
            <div class="section">
            
                404 - Elemento no encontrado 
                          
            </div>        
        
        </div>
    
        <div class="section-arrow">&nbsp;</div>
        
        <div class="content-panel">
        
        	<h1 class="error"><?php echo $err; ?></h1>
            
            <p>
				No pudimos encontrar la página que buscabas. Probablemente fue borrada desde la última vez que la viste, o que hallas escrito mas la dirección. En cualquier caso queremos que encuentres lo que estas buscando por lo que te ofrecemos las siguientes opciones:
            </p>
            
            <p>
            
                <div class="home">1. Regresa a la <a href="index.php">página principal</a> y empieza de nuevo.</div>
                
                <div class="menu">2. Usa el menú para encontrar la secci''on que deseas ver.</div>
                
                <div class="search">3. Busca nuestro sitio:</div>
            
            </p>
            
            <div class="searchform">
            
                <!-- Falta implementar la búsqueda -->  
                <form method="get" id="searchformtop" name="searchformtop" action="<?php echo base_url()."bb/buscar" ?>">
                        <select form="searchformtop" name="t" id="t" onchange="hvalue();">
                          <option value="nombre">Nombre</option>
                          <option value="cervecera">Cervecera</option>
                          <option value="desc">Descripción</option>
                          <option value="sef">Estilo</option>
                          <option value="pais">País</option>
                          <option value="tag">Tag</option>
                          <option value="usr">Usuario</option>
                        </select>
                        <input type="hidden" id="tipo" name="tipo" value="nombre">
                        <input name="palabra" id="s" type="text" value="Buscar" onfocus="if (this.value == 'Buscar') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar';}" onsubmit='javascript:document.searchformtop.submit();'></input>    
                </form> 
                
            </div> 
            
            <div class="note">
            
            	Introduce lo que quieres buscar y presiona Enter 
                               
            </div>
            
        </div>      
        
    </div>
    
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

	<?php include("trending.php"); //get the trending slider ?>

</div>

<div class="sidebar">

</div>	

<br class="clearer" />

<?php include("footer.php"); //get the footer ?>