
<?php  include_once('../includes/all_classes_and_functions.php');  ?>





<?php


after_successful_logout();

/*




   
            
            
        <?php if (isset($_SESSION['body'])) {?>
    
        <textarea maxlength='500' placeholder='Do you have a question, job or story to share?' name='body' class='toggle forum-details'><?php  echo $_SESSION['body']; $_SESSION['body'] = null;  ?></textarea>
            
        <?php }   else { ?>
    
        <textarea maxlength='500' placeholder='Do you have a question, job or story to share?' name='body' class='toggle forum-details'></textarea>
            
        <?php  } ?>
                   

                   
                   
                   
                   
        <div class="selection" style="display: none;">
            
            
            
            
        <?php if (isset($_SESSION['code'])) {?>
    
        <textarea maxlength="500" placeholder='Paste related code here.' name="code" class="toggle forum-details"><?php  echo $_SESSION['code']; $_SESSION['code'] = null;  ?></textarea>
            
        <?php }   else { ?>
    
        <textarea maxlength="500" placeholder='Paste related code here.' name="code" class="toggle forum-details"></textarea>
            
        <?php  } ?>    
            

            
            
            
        <?php if (isset($_SESSION['title'])) {?>
    
        <textarea maxlength="500" placeholder="Title of your post." name="title" class="forum-title"><?php  echo $_SESSION['title']; $_SESSION['title'] = null;  ?></textarea>
            
        <?php }   else { ?>
    
        <textarea maxlength="500" placeholder="Title of your post." name="title" class="forum-title"></textarea>
            
        <?php  } ?>   
            
                    













 $fools = $user->does_user_exist('foolswater');
    
 $result = $fools->get_result();

 echo $numRows = $result->num_rows;
 if($numRows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row['id'];
    echo $row['username'];
    echo $row['password'] . "<br>";
  }
}



/*


$stmt = $con->prepare("SELECT id, name, age FROM myTable WHERE name=?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$stmt->store_result();
$numRows = $stmt->num_rows;
$stmt->bind_result($idRow, $nameRow, $ageRow); 
if($numRows > 0) {
  while ($stmt->fetch()) {
    $id[] = $idRow;
    $name[] = $nameRow;
    $age[] = $ageRow;
  }
}
*/

// user enters 5 integers and the program will store 
// them into an array and will display the sum of them 



// 
    

    
/*


$stmt = $con->prepare("SELECT id, name, age FROM myTable WHERE name=?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$stmt->store_result();
$numRows = $stmt->num_rows;
$stmt->bind_result($idRow, $nameRow, $ageRow); 
if($numRows > 0) {
  while ($stmt->fetch()) {
    $id[] = $idRow;
    $name[] = $nameRow;
    $age[] = $ageRow;
  }
}



  while ($founduser->fetch()) {
      
      
      
  
     if (password_verify($_POST['password'], $password)) { 
         
         $_SESSION['admin_id'] = $id;
         echo $_SESSION['admin_id'];
         
     }
     
     else {
         
         alert_note('Login failed. Please try again with the right credentials.');
         
         
      }
      
  }
  
  
  
  
   $fools = $user->does_user_exist('foolswater');
    
 $result = $fools->get_result();

 echo $numRows = $result->num_rows;
 if($numRows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row['id'];
    echo $row['username'];
    echo $row['password'] . "<br>";
  }
}
*/

?>