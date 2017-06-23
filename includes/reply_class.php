<?php

require_once('database_class.php');



class Reply {
    
    
       public function create_reply($body_input, $code_input, $commentowner_input, $commentid_input, $replyowner_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO reply (body, code, commentowner, commentid, replyowner) VALUES (?, ?, ?, ?, ?)");
        
       $stmt->bind_param("ssiii", $body, $code, $commentowner, $commentid, $replyowner);
        
       $body = $body_input;
        
       $code = $code_input;
        
       $commentowner = $commentowner_input;
        
       $commentid = $commentid_input; 
           
       $replyowner = $replyowner_input; 
          
       $stmt->execute();
        
        
       return $stmt;    

       }
    
    
    
    
    
    
    
    
       public function edit_reply($body_input, $code_input, $owner_input, $id_input) {

       global $database;
        
       $stmt = $database->connection->prepare("UPDATE reply SET body = ?, code = ? where replyowner = ? and id = ?");
        
       $stmt->bind_param("ssii", $body, $code, $owner, $id);
        
       $body = $body_input;
        
       $code = $code_input;
        
       $owner = $owner_input;
           
       $id = $id_input;
          
       $stmt->execute();
        
        
       return $stmt;    

       }
    
    
    
    
    
         public function get_these_replies($id_of_post) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT reply.id as replyid, reply.body, reply.code, reply.replyowner, reply.commentid, users.img_path, users.username, users.id as usersid FROM reply
         INNER JOIN users ON users.id = reply.replyowner where reply.commentid = ? order by reply.id desc");
             
         $stmt->bind_param("i", $id);
             
         $id = $id_of_post;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function my_replies($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT reply.id as replyid, reply.body, reply.code, comment.postid, reply.replyowner, reply.commentid, users.img_path, users.username, users.id as usersid FROM reply
         
         INNER JOIN users ON users.id = reply.replyowner 
         
         INNER JOIN comment ON comment.id = reply.commentid
         
         INNER JOIN forum ON forum.id = comment.postid
         
         where reply.replyowner = ? order by reply.id desc");
             
         $stmt->bind_param("i", $current_user);
             
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
         public function notif_replies($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT reply.id as replyid, reply.body, reply.code, comment.postid, reply.replyowner, reply.commentid, users.img_path, users.username, users.id as usersid FROM reply
         
         INNER JOIN users ON users.id = reply.replyowner 
         
         INNER JOIN comment ON comment.id = reply.commentid
         
         INNER JOIN forum ON forum.id = comment.postid
         
         where  reply.commentowner = ? AND reply.replyowner != ? order by reply.id desc");
             
         $stmt->bind_param("ii", $current_user, $current_user);
             
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function count_notif_replies($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT count(*) as count FROM reply where  commentowner = ? AND replyowner != ? AND ready != 'read' ");
             
         $stmt->bind_param("ii", $current_user, $current_user);
             
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
        public function unset_notif_replies($current_user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare(" UPDATE reply SET ready = 'read' where commentowner = ? ");
             
         $stmt->bind_param("i", $current_user);
             
         $current_user = $current_user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function delete_reply($id_input, $owner_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("DELETE FROM reply WHERE id = ? AND replyowner = ? LIMIT 1");
             
         $stmt->bind_param("ii", $id, $owner);
             
         $id = $id_input;
             
         $owner = $owner_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function get_this_reply($id_of_post, $user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT * FROM reply where id = ? and replyowner = ? limit 1");
             
         $stmt->bind_param("ii", $id, $user);
             
         $id = $id_of_post;
             
         $user = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
      
    
}


$reply = new Reply();

?>