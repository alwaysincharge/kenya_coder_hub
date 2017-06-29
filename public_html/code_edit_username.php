<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('login'); ?>


<?php


$user_input = '';


if(request_is_post()) {
  
if (isset($_POST['submit']))  {
    
    

 $user_input = $_POST['username'];
    
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    
    
 does_it_contain($user_input, $space, $equal_sign, $single_quote, 'The username cannot contain a space, equal sign or single quote.', 'editusername.php');

 check_emptiness($user_input, 'editusername.php', 'The username field cannot be empty. Please try again.');
    
 check_lenght($user_input, 7, 30, 'The username cannot be smaller than 7 characters or bigger than 30.', 'editusername.php');
    
    
        
 $newuser = $user->does_user_exist($user_input); 
    
 $newuser_result = $newuser->get_result();
    
    
 if($newuser_result->num_rows == 0) {
     
       $user->edit_username($user_input, $_SESSION['admin_id']);
     
     
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       redirect_to('/fridaycamp/public_html/user/' . $row['username']);

       } 
     
      
     
     

}  else {
    
       alert_note('The username you entered already exists. Please try again.');
     
       redirect_to('editusername.php'); 
     
 } 
    
    
    
    
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     
    redirect_to('home'); 
     
}    



?>