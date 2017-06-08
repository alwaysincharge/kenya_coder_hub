
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
   
    
  
    
 check_emptiness($user_input, 'home');
    
 check_emptiness($_POST['password'], 'home');
    
    
    
    
    
 check_lenght($user_input, 7, 30);
    
 check_lenght($_POST['password'], 7, 30);    
    

    
    
     
 $founduser = $user->does_user_exist($user_input);
    
    
    
    
 while ($founduser->fetch()) {
              
 echo $user->username;
     
 }
    
     
    
 echo $founduser->num_rows;
    
    
    
 if($founduser->num_rows == 1) {
     
     
     if (password_verify($_POST['password'], $user->password)) { 
         
         $_SESSION['admin_id'] = $user->id;
         echo $_SESSION['admin_id'];
         
     }
     
     else {
         
         alert_note('Login failed. Please try again with the right credentials.');
         redirect_to('home');
         
      }
     
       
 } else {
    
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