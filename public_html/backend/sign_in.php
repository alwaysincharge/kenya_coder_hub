<?php  include_once('../../includes/all_classes_and_functions.php');  ?>



<?php



$user_input = '';



if(request_is_post()) {
   
if (isset($_POST['submit']))  {
    
    

 $user_input = $_POST['username'];
    
    
  
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    

 does_it_contain($user_input, $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', '../login');
    
 does_it_contain($_POST['password'], $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', '../login');
   
    
  
 check_emptiness($user_input, '../login', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['password'], '../login', 'All fields have to be filled. Please try again.');
    
    
    
 check_lenght($user_input, 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', '../login');
    
 check_lenght($_POST['password'], 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', '../login');    

    
     
 $founduser = $user->does_user_exist($user_input); 
    
 $founduser_result = $founduser->get_result();
    
    
    
 if($founduser_result->num_rows == 1) {
     
     
    
         while($row = $founduser_result->fetch_assoc()) {
             
    
               if (password_verify($_POST['password'], $row['password'])) { 
         
               $_SESSION['admin_id'] = $row['id'];
             
             
                    if (isset($_SESSION['realredirect1'])) {
             
                    redirect_to($_SESSION['realredirect1']); 
             
                    }
             
                    else { 
                                
                    redirect_to('../login');     
                                
                    }
             

               }
     
               else {
         
               alert_note('Login failed. Please try again with the right credentials.'); 
             
               redirect_to('../login'); 
                 
               }
     
         }
    
    
     
}  else {
    
         alert_note('Login failed. Please try again with the right credentials.');
     
         redirect_to('../login'); 
     
}
    

}
    
} else  {
    
     alert_note('Please stop trying to hack the site. Thanks a lot.');
    
     redirect_to('../login'); 
    
}    


redirect_to('../login');

?>