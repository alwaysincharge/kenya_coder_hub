<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php



 $password_input1 = '';

 $password_input2 = '';

 $oldpassword = '';



if(request_is_post()) {


if (isset($_POST['submit']))  {
    
       
 $password_db_input = password_hash(test_input($_POST['password1']), PASSWORD_DEFAULT);
    
 $password_input1 = $_POST['password1']; 
    
 $password_input2 = $_POST['password2'];
    
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  

    
 
 does_it_contain($_POST['password1'], $space, $equal_sign, $single_quote, 'Passwords cannot contain a space, equal sign or single quote.', 'reclaim_editpassword.php');
    
 does_it_contain($_POST['password2'], $space, $equal_sign, $single_quote, 'Passwords cannot contain a space, equal sign or single quote.', 'reclaim_editpassword.php');
    
 

 check_emptiness($_POST['password1'], 'reclaim_editpassword.php', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['password2'], 'reclaim_editpassword.php', 'All fields have to be filled. Please try again.');
    
    
    
 check_lenght($_POST['password1'], 7, 30, 'The password cannot be smaller than 7 characters or bigger than 30.', 'reclaim_editpassword.php'); 
    
 check_lenght($_POST['password2'], 7, 30, 'The password cannot be smaller than 7 characters or bigger than 30.', 'reclaim_editpassword.php');
    
 
     
 are_both_passwords_equal('reclaim_editpassword.php', $_POST['password1'], $_POST['password2']);
    
    
 $user->edit_password($password_db_input, $_POST['person']);
             
 alert_note_positive('Your password has been successfully changed. Login below.');
     
 redirect_to('login');
             
    
 }
     
 }  else {
    
        alert_note('You typed your current password wrong. Please try again. ');
     
        redirect_to('reclaim_editpassword.php');
       
} 
 

}}
    
 else  {
    
        alert_note('Please stop trying to hack the site. Thanks a lot.');
    
}    



?>