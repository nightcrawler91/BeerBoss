<?php

  class tetsmail extends CI_Controller
  {
    function mailAuthenticate ($usr,$pwd){
      // Tries to open the mailbox for the user and password at itesm.mx domain mail server
      $mailbox=imap_open("{itesm.mx/pop3:110}INBOX",$usr,$pwd);
      if ($mailbox==null) {
          // Connection fails, authentication is rejected
        $_SESSION[‘user’]=null;
         return false;
      }
      else {
            // The mail session is closed and the authentication accepted
           imap_close($mailbox);
    	  $_SESSION[‘user’]=$usr;
           return true;
      }
    }

    function mailAuth(){
      echo "Hellos";
      imap_open("{itesm.mx:110/pop3}", $mail, $pass); 
    }
  }


