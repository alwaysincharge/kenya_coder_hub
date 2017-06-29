<?php


class Session {
    

    
  public function __construct() {

  return session_start();
    
  }
    
    
   
    
    
  public function if_not_logged_in($url) {
    
  if (!isset($_SESSION['admin_id'])) {
        
  redirect_to($url);
        
  }
  
  }
    
    
 
}



$session = new Session();


?>