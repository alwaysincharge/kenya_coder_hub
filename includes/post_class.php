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
    
    
         public function my_posts($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username FROM forum
         INNER JOIN users ON users.id = forum.owner where forum.owner = ? order by forum.id DESC");
             
         $stmt->bind_param("i", $current_user);
             
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
         public function all_popular_posts() {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username, comment.postid FROM forum
         INNER JOIN users ON users.id = forum.owner INNER JOIN comment ON comment.postid = forum.id order by forum.id DESC");
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
        
         public function all_popular_posts_pagination($first_result_input, $results_per_page_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username, comment.postid FROM forum
         INNER JOIN users ON users.id = forum.owner INNER JOIN comment ON comment.postid = forum.id order by forum.id DESC LIMIT ?, ?");
             
         $stmt->bind_param("ii", $first_result, $results_per_page);
             
         $first_result = $first_result_input;
             
         $results_per_page = $results_per_page_input;
          
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
    
    
    
         public function get_this_post($id_of_post) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id as forumid, forum.body, forum.code, forum.owner, users.img_path, users.username, users.id as usersid FROM forum
         INNER JOIN users ON users.id = forum.owner where forum.id = ? LIMIT 1");
             
         $stmt->bind_param("i", $id);
             
         $id = $id_of_post;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function get_users_post($user_post) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT forum.title, forum.id as forumid, forum.body, forum.code, forum.owner, users.img_path, users.username, users.id as usersid FROM forum
         INNER JOIN users ON users.id = forum.owner where users.username = ? order by forum.id desc LIMIT 10 ");
             
         $stmt->bind_param("s", $username);
             
         $username = $user_post;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
      
    
}


$post = new Post();

?>