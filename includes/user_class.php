<?php

require_once('database_class.php');

class User {
    
    
    
    
    
    
    public function create_user($user_input, $password_input, $email_input) {

    global $database;
        
     $stmt = $database->connection->prepare("INSERT INTO users (username, password, img_path, email) VALUES (?, ?, ?, ?)");
        
     $stmt->bind_param("ssss", $username, $password, $img_path, $email);

    // set parameters and execute
        
     $username = $user_input;
        
     $password = $password_input;
        
     $img_path = "male.png";
        
     $email = $email_input;   
          
     $stmt->execute();
        
        
     return $stmt;    

    }
   
    
    
         public function does_user_exist($user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select id, username, password from users where username = ?");
        
         $stmt->bind_param("s", $username);

         // set parameters and execute
        
         $username = $user_input;
          
         $stmt->execute();
                     
         $stmt->bind_result($this->id, $this->username, $this->password);
              
         return $stmt;  
        
         }
    
  
    
    
    
    
    
    
    public function field_value($field, $value) {
      return  $this->$field = $value;
    }
    
    
    
   

    
    
    
    
         public static function does_password_exist($username, $password) {
         
         global $database;
         
         $result = $database->query("select * from users where username = '$username' AND password = '$password'  " );
         
         if (mysqli_num_rows($result) == 1) {
             return $result;
         }
         
     }
    
    




}


$user = new User();









?>