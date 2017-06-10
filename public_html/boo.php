
<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php


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