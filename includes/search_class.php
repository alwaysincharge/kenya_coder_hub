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
    
    
    
          public function search_users($keyword_input) {

          global $database;
                            
          $stmt = $database->connection->prepare("select * from users WHERE username LIKE ? or skill1 LIKE ? or skill2 LIKE ? or skill3 LIKE ? or skill4 LIKE ? or skill5 LIKE ? or skill6 LIKE ? or skill7 LIKE ? or skill8 LIKE ? or fullname LIKE ? or email LIKE ? or story LIKE ? or project1 LIKE ? or project2 LIKE ? or project3 LIKE ? or project4 LIKE ? or school1 LIKE ? or school2 LIKE ? or school3 LIKE ?  or school4 LIKE ? or desc1 LIKE ? or desc2 LIKE ? or desc3 LIKE ? or desc4 LIKE ? or learn1 LIKE ? or learn2 LIKE ? or learn3 LIKE ?  or learn4 LIKE ?  limit 30");
             
          $stmt->bind_param("ssssssssssssssssssssssssssss", $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword);
             
          $keyword = $keyword_input;
          
          $stmt->execute();
              
          return $stmt;  
 
          }
    
     
}



$search = new Search();



?>