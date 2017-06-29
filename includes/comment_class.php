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
    
    
    
    
       public function edit_comment($body_input, $code_input, $owner_input, $id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("UPDATE comment SET body = ?, code = ? where commentowner = ? and id = ?");
        
       $stmt->bind_param("ssii", $body, $code, $owner, $id);
        
       $body = $body_input;
        
       $code = $code_input;
        
       $owner = $owner_input;
           
       $id = $id_input;
          
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
    
    
    
    
         public function get_this_comment($id_of_post, $user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT * FROM comment where id = ? and commentowner = ? limit 1");
             
         $stmt->bind_param("ii", $id, $user);
             
         $id = $id_of_post;
             
         $user = $user_input;
          
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
    
    
    
         public function notif_comments($current_user_input1, $current_user_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT comment.id as commentid, comment.postid, comment.body, comment.code, comment.commentowner, comment.postowner, users.img_path, users.username, users.id as usersid, forum.id FROM comment
         INNER JOIN users ON users.id = comment.commentowner INNER JOIN forum ON comment.postid = forum.id where comment.postowner = ? AND comment.commentowner != ? order by comment.id desc");
             
         $stmt->bind_param("ii", $current_user1, $current_user2);
             
         $current_user1 = $current_user_input1;
             
         $current_user2 = $current_user_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function count_notif_comments($current_user_input1, $current_user_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT count(*) as count FROM comment where postowner = ? AND commentowner != ? AND ready != 'read' ");
             
         $stmt->bind_param("ii", $current_user1, $current_user2);
             
         $current_user1 = $current_user_input1;
             
         $current_user2 = $current_user_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function unset_notif_comments($current_user_input1) {
         
         global $database;
                            
         $stmt = $database->connection->prepare(" UPDATE comment SET ready = 'read' where postowner = ?");
             
         $stmt->bind_param("i", $current_user1);
             
         $current_user1 = $current_user_input1;
          
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
    
    
    
    
    
         public function delete_comment($id_input, $owner_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("DELETE FROM comment WHERE id = ? AND commentowner = ? LIMIT 1");
             
         $stmt->bind_param("ii", $id, $owner);
             
         $id = $id_input;
             
         $owner = $owner_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
       
    
}


$comment = new Comment();

?>