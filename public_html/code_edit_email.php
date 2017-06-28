
<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in('login'); ?>

<?php


 $user_input = '';




if(request_is_post()) {

    
    
if (isset($_POST['submit']))  {
    
    

 $email_input = $_POST['email'];
    
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    

    
 does_it_contain($email_input, $space, $equal_sign, $single_quote, 'The email cannot contain a space, equal sign or single quote.', 'editemail.php');

    
    
  
 check_emptiness($email_input, 'editemail.php', 'The email field cannot be empty. Please try again.');
    

    
 check_lenght($email_input, 7, 30, 'The email cannot be smaller than 7 characters or bigger than 30.', 'editemail.php');
    
    
 if (!filter_var($email_input, FILTER_VALIDATE_EMAIL) === false) {
 } else {
       alert_note('The email you entered is invalid. Please try again.');
     redirect_to('editemail.php');
 }  
    
    
      
 $user->edit_email($email_input, $_SESSION['admin_id']);
    
 alert_note_positive('You have changed your email.');
    
 redirect_to('editemail.php');
    
 
    
    
    
    
    
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     redirect_to('home'); 
}    



?>