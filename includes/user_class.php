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
              
         return $stmt;  
        
         }
    


}



$user = new User();









?>