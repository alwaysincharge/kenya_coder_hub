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
    
    
    
    
    public function login($username) {
        
        global $database;
        
        $result = $database->query("select * from users where username = '$username' limit 1");
        
        $row = $database->fetch($result);
        
        $_SESSION['admin_id'] = $row['id'];
        
        return $_SESSION['admin_id'];
            
    }
    
    

    
   
}



$session = new Session();





?>