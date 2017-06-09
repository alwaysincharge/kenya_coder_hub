<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php


class Post {
    
    
       
       public function create_post($title_input, $body_input, $code_input, $owner_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO forum (title, body, code, owner) VALUES (?, ?, ?, ?)");
        
       $stmt->bind_param("sssi", $title, $body, $code, $owner);
        
       $title = $title_input;
        
       $body = $body_input;
        
       $code = $code_input;
        
       $owner = $owner_input;   
          
       $stmt->execute();
        
        
       return $stmt;    

       }
    
    
    
    
    
    
         public function all_posts() {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username FROM forum
         INNER JOIN users ON users.id = forum.owner order by forum.id DESC");
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function posts_paginated($first_result_input, $results_per_page_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username FROM forum
         INNER JOIN users ON users.id = forum.owner order by forum.id DESC LIMIT ?, ? ");
             
         $stmt->bind_param("ii", $first_result, $results_per_page);
             
         $first_result = $first_result_input;
             
         $results_per_page = $results_per_page_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
      
    
}


$post = new Post();

?>