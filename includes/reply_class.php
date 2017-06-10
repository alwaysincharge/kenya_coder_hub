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
    
    
    
    
    
         public function get_these_replies($id_of_post) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT reply.id as replyid, reply.body, reply.code, reply.replyowner, reply.commentid, users.img_path, users.username, users.id as usersid FROM reply
         INNER JOIN users ON users.id = reply.replyowner where reply.commentid = ? order by reply.id desc");
             
         $stmt->bind_param("i", $id);
             
         $id = $id_of_post;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
    
    
    
    
      
    
}


$reply = new Reply();

?>