


<?php


class Message {
    
    
    
       public function create_message($sender_input, $receiver_input, $message_input, $converse) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO messages (sender, receiver, message, conversation) VALUES (?, ?, ?, ?)");
        
       $stmt->bind_param("iiss", $sender, $receiver, $message, $conversation);
        
       $sender = $sender_input;
        
       $receiver = $receiver_input;
        
       $message = $message_input; 
           
       $conversation = $converse;
          
       $stmt->execute();
        
        
       return $stmt;    

       }
    
    
    
    
         public function conversation($sender_input1, $receiver_input1, $sender_input2, $receiver_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT messages.id, messages.sender, messages.receiver, messages.message,  messages.conversation, users.img_path, users.username FROM messages
         INNER JOIN users ON users.id = messages.sender WHERE (messages.sender = ? AND messages.receiver = ?) OR (messages.sender = ? AND messages.receiver = ?) order by messages.id desc");
             
         $stmt->bind_param("iiii", $sender1, $receiver1, $sender2, $receiver2);
             
         $sender1 = $sender_input1;
        
         $receiver1 = $receiver_input1;
             
         $sender2 = $sender_input2;
        
         $receiver2 = $receiver_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function all_conversation($loggin_id_input1, $loggin_id_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT max(messages.id) as max, messages.sender, messages.receiver, messages.message,  messages.conversation, users.img_path, users.username, users.id as usersid FROM messages
         INNER JOIN users ON users.id = messages.receiver WHERE (messages.sender = ? OR messages.receiver = ?) group by messages.conversation order by max desc");
             
         $stmt->bind_param("ii", $loggin_id1, $loggin_id2);
             
         $loggin_id1 = $loggin_id_input1;
             
         $loggin_id2 = $loggin_id_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function first_conversation($loggin_id_input1, $loggin_id_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT max(messages.id) as max, messages.sender, messages.receiver, messages.message,  messages.conversation, users.img_path, users.username, users.id as usersid FROM messages
         INNER JOIN users ON users.id = messages.receiver WHERE (messages.sender = ? OR messages.receiver = ?) group by messages.conversation order by max desc limit 1");
             
         $stmt->bind_param("ii", $loggin_id1, $loggin_id2);
             
         $loggin_id1 = $loggin_id_input1;
             
         $loggin_id2 = $loggin_id_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
    
         public function mark_as_read($loggin_id_input1, $loggin_id_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("UPDATE messages SET ready = 'read' where sender = ? AND receiver = ? ");
             
         $stmt->bind_param("ii", $loggin_id1, $loggin_id2);
             
         $loggin_id1 = $loggin_id_input1;
             
         $loggin_id2 = $loggin_id_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
         public function all_unread($loggin_id_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select count(*) as count from messages where receiver = ? AND ready != 'read' ");
             
         $stmt->bind_param("i", $loggin_id);
             
         $loggin_id = $loggin_id_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
         public function all_this_unread($loggin_id_input1, $loggin_id_input2) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select count(*) as count from messages where receiver = ? AND ready != 'read' AND sender = ? ");
             
         $stmt->bind_param("ii", $loggin_id1, $loggin_id2);
             
         $loggin_id1 = $loggin_id_input1;
             
         $loggin_id2 = $loggin_id_input2;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
         public function one_message($loggin_id_input1) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT message, sender, receiver, id from messages WHERE id = ?");
             
         $stmt->bind_param("i", $loggin_id1);
             
         $loggin_id1 = $loggin_id_input1;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function get_info_by_receiver($loggin_id_input1) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("SELECT username, id, img_path FROM users where id = ?");
             
         $stmt->bind_param("i", $loggin_id1);
             
         $loggin_id1 = $loggin_id_input1;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
         public function delete_message($id_input, $owner_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("DELETE FROM messages WHERE id = ? AND sender = ? LIMIT 1");
             
         $stmt->bind_param("ii", $id, $owner);
             
         $id = $id_input;
             
         $owner = $owner_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
}


$message = new Message();

?>