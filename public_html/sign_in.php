
<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php




$user_input = '';



if(request_is_post()) {
if(csrf_token_is_valid_2()) {  
if(request_is_same_domain()) {
if(is_session_valid()) {
    
    
    
    
if (isset($_POST['submit']))  {
    
    

 $user_input = $_POST['username'];
    
    

    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    

    
 does_it_contain($user_input, $space, $equal_sign, $single_quote);
    
 does_it_contain($_POST['password'], $space, $equal_sign, $single_quote);
   
    
  
    
 check_emptiness($user_input, 'home', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['password'], 'home', 'All fields have to be filled. Please try again.');
    
    
    
    
    
 check_lenght($user_input, 7, 30);
    
 check_lenght($_POST['password'], 7, 30);    

    
     
 $founduser = $user->does_user_exist($user_input); 
    
 $founduser_result = $founduser->get_result();
    
    
    
    
    
    
    
 if($founduser_result->num_rows == 1) {
     
     
    
         while($row = $founduser_result->fetch_assoc()) {
    
         if (password_verify($_POST['password'], $row['password'])) { 
         
         $_SESSION['admin_id'] = $row['id'];
             
         after_successful_login();
         
         }
     
         else {
         
         alert_note('Login failed. Please try again with the right credentials.'); 
             
         redirect_to('home'); 
                 
         }
     
         }
    
    
     
     

}  else {
    
         alert_note('Login failed. Please try again with the right credentials.');
     
         redirect_to('home'); 
     
 }
    
    
    
    
  
    

}
    
} else  {
    
     alert_note('Please stop trying to hack the site. Thanks a lot. ');
     redirect_to('home'); 
}    

}
 else  {
    
     alert_note('Please stop trying to hack the site. Thanks a lot. ');
     redirect_to('home'); 
}
    
}

 else  {
    
     alert_note('Please stop trying to hack the site. Thanks a lot. ');
     redirect_to('home'); 
}
    }

 else  {
    
     alert_note('Please stop trying to hack the site. Thanks a lot. ');
     redirect_to('home'); 
}

?>