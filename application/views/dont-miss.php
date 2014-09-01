<?php $this->load->helper('url'); ?>


<div id="dontmiss-bar">  
  <div class="ribbon-shadow-left">&nbsp;</div>
    <div id="dontmiss-header">Arte líquido</div>
      <div id="dontmiss-arrow">&nbsp;</div>
        <div class="dontmiss" id="dontmiss"> 
    
          <!-- Aqui inicia el foreach -->
          <?php foreach ($dmb as $cerv) {
            if(sizeof($cerv['nombre'] > 15)) $cerv['nombre'] = substr($cerv['nombre'], 0, 14)."...";
            echo "<div class='panel'>
                    <div class='image' alt='".$cerv['nombre']."'>
                        <a href='".base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']."'>
                          <img width='40' height='40' src='".base_url()."uploads/".$cerv['idCheve'].".jpg' alt='".$cerv['nombre']."'/>
                        </a>
                    </div>
                    <div class='title'>
                        <a href='".base_url()."bb/perfil_cerveza?idCheve=".$cerv['idCheve']."'>".$cerv['nombre']."</a>
                    </div>             
                  </div>";
          } ?>
          <!-- Aqui terminaria el foreach --> 
        </div>

    <div id="dontmiss-email" class="signup">        
      <!-- Aqui va o los botones de logeo, o los datos del usuario logeado -->
      <?php
        $b = base_url();
        // Carga variables de sesión
        $ses_user = $this->session->userdata('User');
        $username = $this->session->userdata('username');
        $fibd = $this->session->userdata('fibd');
        $rol = $this->session->userdata('rol');

        if (!empty($ses_user)) { 
             echo "<table><tr><td><div class='foto'><img class='foto' src='https://graph.facebook.com/".$ses_user['id']."/picture' width='40' height='40'/></div></td><td><a href='".base_url()."bb/perfil_usuario?username=".$username."'><div class'prociono'>".$ses_user['name']."</div></a></td>";
             echo "<td><a class='button_link red' href='".base_url()."bb/logout' style='opacity: 0.8;''><span>Logout</span></a></td></table>";
        }
        else if (!empty($username)) {
          if (!empty($fibd)) {
              echo "<table><tr><td><div class='foto'><img class='foto' src='https://graph.facebook.com/".$fibd."/picture' width='40' height='40'/></div></td><td><a href='".base_url()."bb/perfil_usuario?username=".$username."'><div class'prociono'>".$username."</div></a></td>";
             echo "<td><a class='button_link red' href='".base_url()."bb/logout' style='opacity: 0.8;''><span>Logout</span></a></td></table>";
          }
          else {
            echo str_replace("%20","","<table><tr><td><div class='foto'><img class='foto' src='".base_url()."upics/".$username.".jpg' width='40' height='40'/></div></td><td><a href='".base_url()."bb/perfil_usuario?username=".$username."'><div class'prociono'>".$username."</div></a></td>");
            echo "<td><a class='button_link red' href='".base_url()."bb/logout' style='opacity: 0.8;''><span>Logout</span></a></td></table>";
          }
        }
        else {
          echo "<table><tr><td>";
          echo img(array('src'=>'images/facebook-login-button.png','id'=>'feis','style'=>'cursor: hand; cursor: pointer;'));
          echo "</td><td><a class='button_link green' href='".base_url()."bb/log_in' style='opacity: 0.8;''><span>Login</span></a></td>
                <td><a href='".base_url()."bb/sign_up' style='opacity: 0.8;''><img src='".base_url()."images/signup-button.png' 
                alt='Regístrate!'></a></td></tr></table>";   
       }
     ?>
       <br class="clearer" />        
     </div>
    
    <br class="clearer" />

<script src="<?php echo $b;?>js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    window.fbAsyncInit = function() {
      //Initiallize the facebook using the facebook javascript sdk
       FB.init({ 
         appId:'<?php echo $this->config->item('appId'); ?>', // App ID 
         cookie:true, // enable cookies to allow the server to access the session
         status:true, // check login status
         xfbml:true, // parse XFBML
         oauth : true //enable Oauth 
       });
    };
   //Read the baseurl from the config.php file
   (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

    //Onclick for fb login
   $('#feis').click(function(e) {
      FB.login(function(response) {
      if(response.authResponse) {
        parent.location ='<?php echo $b; ?>bb/fblogin'; //redirect uri after closing the facebook popup
      }
   },{scope: 'email,read_stream,publish_stream,user_birthday,user_photos'}); //permissions for facebook
  });
  </script>

</div> <!-- end don't miss posts -->