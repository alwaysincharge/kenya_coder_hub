<?php  include_once('../../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in('../login'); ?>

<?php



 $password_input1 = '';

 $password_input2 = '';

 $oldpassword = '';



if(request_is_post()) {

    
    
if (isset($_POST['submit']))  {
    
   
    

 
    
 $password_db_input = password_hash(test_input($_POST['password1']), PASSWORD_DEFAULT);
    
 $password_input1 = $_POST['password1']; 
    
 $password_input2 = $_POST['password2'];
    
 $oldpassword = $_POST['oldpassword'];
    
    
 
    
    if (ctype_alnum($_POST['password1'])) {
        
        
    } else {

        alert_note('All fields can only contain letters and/or numbers.');
     
        redirect_to('../views/editpassword.php'); 
    
    }
    
    
    
    
    
    if (ctype_alnum($_POST['password2'])) {
        
        
    } else {

        alert_note('All fields can only contain letters and/or numbers.');
     
        redirect_to('../views/editpassword.php'); 
    
    }
    
    
    
    
    
    
    if (ctype_alnum($_POST['oldpassword'])) {
        
        
    } else {

        alert_note('All fields can only contain letters and/or numbers.');
     
        redirect_to('../views/editpassword.php'); 
    
    }
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  

    
 
    
 does_it_contain($_POST['password1'], $space, $equal_sign, $single_quote, 'Passwords cannot contain a space, equal sign or single quote.', '../views/editpassword.php');
    
 does_it_contain($_POST['password2'], $space, $equal_sign, $single_quote, 'Passwords cannot contain a space, equal sign or single quote.', '../views/editpassword.php');
    
 does_it_contain($_POST['oldpassword'], $space, $equal_sign, $single_quote, 'Passwords cannot contain a space, equal sign or single quote.', '../views/editpassword.php');
    
    
    
    
    
  
 check_emptiness($_POST['oldpassword'], '../views/editpassword.php', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['password1'], '../views/editpassword.php', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['password2'], '../views/editpassword.php', 'All fields have to be filled. Please try again.');
    
    
    
    
 check_lenght($_POST['password1'], 7, 30, 'The password cannot be smaller than 7 characters or bigger than 30.', '../views/editpassword.php'); 
    
 check_lenght($_POST['password2'], 7, 30, 'The password cannot be smaller than 7 characters or bigger than 30.', '../views/editpassword.php');
    
 check_lenght($_POST['oldpassword'], 7, 30, 'The password cannot be smaller than 7 characters or bigger than 30.', '../views/editpassword.php');
    
 

    
 are_both_passwords_equal('../views/editpassword.php', $_POST['password1'], $_POST['password2']);
    
    
        
 $newpassword = $user->does_user_exist_by_id($_SESSION['admin_id']); 
    
 $newpassword_result = $newpassword->get_result();
    

    
    
 if($newpassword_result->num_rows == 1) {
     
 while($row = $newpassword_result->fetch_assoc()) {
     
     
         if (password_verify($_POST['oldpassword'], $row['password'])) { 
             
         
         $user->edit_password($password_db_input, $_SESSION['admin_id']);
             
         alert_note_positive('Your password has been successfully changed. ');
     
         redirect_to('../views/editpassword.php');
             
             
         } else {
             
             
         alert_note('You typed your current password wrong. Please try again. ');
     
         redirect_to('../views/editpassword.php');
             
             
         }
     
 }
     
 }  else {
    
        alert_note('You typed your current password wrong. Please try again. ');
     
        redirect_to('../views/editpassword.php');
       
 } 
    
    
    
    
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     
    redirect_to('../login');
    
}    



?>