<?php

require_once('database_class.php');



class Comment {
    
    
       public function create_comment($body_input, $code_input, $commentowner_input, $postid_input, $postowner_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO comment (body, code, commentowner, postid, postowner) VALUES (?, ?, ?, ?, ?)");
        
       $stmt->bind_param("ssiii", $body, $code, $commentowner, $postid, $postowner);
        
       $body = $body_input;
        
       $code = $code_input;
        
       $commentowner = $commentowner_input;
        
       $postid = $postid_input; 
           
       $postowner = $postowner_input; 
          
       $stmt->execute();
        
        
       return $stmt;    

       }
    
    
    
    
    
         public function get_these_comments($id_of_post) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT comment.id as commentid, comment.postid, comment.body, comment.code, comment.commentowner, users.img_path, users.username, users.id as usersid FROM comment
         INNER JOIN users ON users.id = comment.commentowner where comment.postid = ? order by comment.id desc");
             
         $stmt->bind_param("i", $id);
             
         $id = $id_of_post;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function my_comments($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT comment.id as commentid, comment.postid, comment.body, comment.code, comment.commentowner, users.img_path, users.username, users.id as usersid, forum.id FROM comment
         INNER JOIN users ON users.id = comment.commentowner INNER JOIN forum ON comment.postid = forum.id where comment.commentowner = ? order by comment.id desc");
             
         $stmt->bind_param("i", $current_user);
             
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function get_number_of_comments($id_of_post) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT count(*) as count from comment where postid = ?");
             
         $stmt->bind_param("i", $id);
             
         $id = $id_of_post;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
    
    
    
    
      
    
}


$comment = new Comment();

?>