<?php

require_once('database_class.php');



class Search {
    
    
    
    
          public function search_through_posts($keyword1_input, $keyword2_input) {

          global $database;
                            
          $stmt = $database->connection->prepare("SELECT forum.title, forum.id, forum.body, forum.code, forum.owner, users.img_path, users.username from forum INNER JOIN users ON users.id = forum.owner where forum.title like ? or forum.body like ?  order by forum.id desc limit 30");
             
          $stmt->bind_param("ss", $keyword1, $keyword2);
             
          $keyword1 = $keyword1_input;
             
          $keyword2 = $keyword2_input;
          
          $stmt->execute();
              
          return $stmt;  
 
         }   
    
    
    
    
    
    
}



$search = new Search();



?>