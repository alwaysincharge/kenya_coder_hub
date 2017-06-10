<?php

require_once('database_class.php');

class User {
    

    
       public function create_user($user_input, $password_input, $email_input) {

       global $database;
        
       $stmt = $database->connection->prepare("INSERT INTO users (username, password, img_path, email) VALUES (?, ?, ?, ?)");
        
       $stmt->bind_param("ssss", $username, $password, $img_path, $email);

       // set parameters and execute
        
       $username = $user_input;
        
       $password = $password_input;
        
       $img_path = "male.png";
        
       $email = $email_input;   
          
       $stmt->execute();
        
        
       return $stmt;    

       }
   
      
    
         public function does_user_exist($user_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select id, username, password from users where username = ?");
        
         $stmt->bind_param("s", $username);

         // set parameters and execute
        
         $username = $user_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
          
    
         public function display_all_user_details($id_input) {
         
         global $database;
                            
         $stmt = $database->connection->prepare("select * from users where id = ?");
        
         $stmt->bind_param("i", $id);

         // set parameters and execute
        
         $id = $id_input;
          
         $stmt->execute();
              
         return $stmt;  
        
         }
    
    
    
    
    
    
        
       public function edit_user_profile($fullname_input, $story_input, $skill1_input, $skill2_input, $skill3_input, $skill4_input, $skill5_input, $skill6_input, $skill7_input, $skill8_input, $project1_input, $project2_input, $project3_input, $project4_input, $link1_input, $link2_input, $link3_input, $link4_input, $desc1_input, $desc2_input, $desc3_input, $desc4_input, $school1_input, $school2_input, $school3_input, $school4_input, $diplo1_input, $diplo2_input, $diplo3_input, $diplo4_input, $learn1_input, $learn2_input, $learn3_input, $learn4_input, $param_input) {

       global $database;
        
       $stmt = $database->connection->prepare("UPDATE users SET fullname = ?, story = ?, skill1 = ?, skill2 = ?, skill3 = ?, skill4 = ?, skill5 = ?, skill6 = ?, skill7 = ?, skill8 = ?, project1 = ?, project2 = ?, project3 = ?, project4 = ?, link1 = ?, link2 = ?, link3 = ?, link4 = ?, desc1 = ?, desc2 = ?, desc3 = ?, desc4 = ?, school1 = ?, school2 = ?, school3 = ?, school4 = ?, diplo1 = ?, diplo2 = ?, diplo3 = ?, diplo4 = ?, learn1 = ?, learn2 = ?, learn3 = ?, learn4 = ?  where id = ?");
        
       $stmt->bind_param("sssssssssssssssssssssssssssssssssss", $fullname, $story, $skill1, $skill2, $skill3, $skill4, $skill5, $skill6, $skill7, $skill8, $project1, $project2, $project3, $project4, $link1, $link2, $link3, $link4, $desc1, $desc2, $desc3, $desc4, $school1, $school2, $school3, $school4, $diplo1, $diplo2, $diplo3, $diplo4, $learn1, $learn2, $learn3, $learn4, $param);

       // set parameters and execute
        
       $fullname = $fullname_input;
           
       $story = $story_input;
           
       $skill1 = $skill1_input;
           
       $skill2 = $skill2_input;
           
       $skill3 = $skill3_input;
           
       $skill4 = $skill4_input;
           
       $skill5 = $skill5_input;
           
       $skill6 = $skill6_input;
           
       $skill7 = $skill7_input;
           
       $skill8 = $skill8_input;
           
       $project1 = $project1_input;
           
       $project2 = $project2_input; 
           
       $project3 = $project3_input;
           
       $project4 = $project4_input;
           
       $link1 = $link1_input;
           
       $link2 = $link2_input;
           
       $link3 = $link3_input;
           
       $link4 = $link4_input;
           
       $desc1 = $desc1_input;
           
       $desc2 = $desc2_input;
           
       $desc3 = $desc3_input;
           
       $desc4 = $desc4_input;
           
       $school1 = $school1_input;
           
       $school2 = $school2_input;
           
       $school3 = $school3_input;
           
       $school4 = $school4_input;
           
       $diplo1 = $diplo1_input;
           
       $diplo2 = $diplo2_input;
           
       $diplo3 = $diplo3_input;
           
       $diplo4 = $diplo4_input;
           
       $learn1 = $learn1_input;
           
       $learn2 = $learn2_input;
           
       $learn3 = $learn3_input;
           
       $learn4 = $learn4_input; 
           
       $param = $param_input;
          
       $stmt->execute();
        
        
       return $stmt;    

       }
    


}



$user = new User();









?>