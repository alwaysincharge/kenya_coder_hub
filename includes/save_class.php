<?php


require_once('database_class.php');


class Bookmark {
    
    
       public function new_bookmark($forum_input, $current_user_input) {
        
       global $database;
        
       $stmt = $database->connection->prepare("insert into save (forumid, saver) VALUES (?, ?) ");
        
       $stmt->bind_param("ii", $id, $current_user);

       // set parameters and execute
        
       $id = $forum_input;
        
       $current_user = $current_user_input;
          
       $stmt->execute();
        
       return $stmt;  
           
       }
    
    
    
       public function does_bookmark_exist($forum_input, $current_user_input) {
        
       global $database;
        
       $stmt = $database->connection->prepare("select * from save where forumid = ? AND saver = ?");
        
       $stmt->bind_param("ii", $id, $current_user);

       // set parameters and execute
        
       $id = $forum_input;
        
       $current_user = $current_user_input;
          
       $stmt->execute();
        
       return $stmt;  
           
       }
    
    
    
       public function my_bookmarks($current_user_input) {
        
       global $database;
        
       $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username, save.forumid, save.saver FROM forum INNER JOIN users ON users.id = forum.owner 
       INNER JOIN save ON save.forumid = forum.id
       where save.saver = ? order by forum.id DESC");
        
       $stmt->bind_param("i", $current_user);

       // set parameters and execute
        
       $current_user = $current_user_input;
          
       $stmt->execute();
        
       return $stmt;
           
       }
           
           
           
           
       public function delete_bookmark($forum_input, $current_user_input) {
        
       global $database;
        
       $stmt = $database->connection->prepare("delete from save where forumid = ? AND saver = ?");
        
       $stmt->bind_param("ii", $id, $current_user);

       // set parameters and execute
           
       $id = $forum_input;
        
       $current_user = $current_user_input;
          
       $stmt->execute();
        
       return $stmt;   
           
           
           
           
       }
    
    
    
       
    
    
    
    
    
}




$bookmark = new Bookmark();


?>