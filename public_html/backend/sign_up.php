<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php


require '../phpmailer/PHPMailerAutoload.php';

 



$user_input = '';

$password_input = '';

$email_input = '';




if(request_is_post()) {

    
if (isset($_POST['submit']))  {
    
    

    $user_input = $_POST['username'];
    
    $password_input = password_hash(test_input($_POST['password']), PASSWORD_DEFAULT);
    
    $email_input = $_POST['email']; 
    
    
       
    $space = ' ';
    
    $equal_sign = '=';
    
    $single_quote = "'";  
    
    
    if (ctype_alnum($user_input)) {
        
        
    } else {

        alert_note('All fields can only contain letters and/or numbers.');
     
        redirect_to('../login'); 
    
    }
    
    
    
    if (ctype_alnum($_POST['password'])) {
        
        
    } else {

        alert_note('All fields can only contain letters and/or numbers.');
     
        redirect_to('../login'); 
    
    }
    
    
    
    if (ctype_alnum($_POST['passwordagain'])) {
        
        
    } else {

        alert_note('All fields can only contain letters and/or numbers.');
     
        redirect_to('../login'); 
    
    }
    

    
    does_it_contain($user_input, $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', '../login');
    
    does_it_contain($_POST['password'], $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', '../login');
    
    does_it_contain($_POST['passwordagain'], $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', '../login');
    
    
    
    check_emptiness($user_input, '../login', 'All fields have to be filled. Please try again.');
    
    check_emptiness($_POST['password'], '../login', 'All fields have to be filled. Please try again.');
    
    check_emptiness($_POST['passwordagain'], '../login', 'All fields have to be filled. Please try again.');
    
    
 
    check_lenght($user_input, 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', '../login');
    
    check_lenght($_POST['password'], 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', '../login');    
    
    check_lenght($email_input, 5, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', '../login'); 
    
    
  
    if (!filter_var($email_input, FILTER_VALIDATE_EMAIL) === false) {
        
    } else {
        
       alert_note('The email you entered is invalid. Please try again.');
        
       redirect_to('../login');
        
    }
    
    
      
    are_both_passwords_equal('../login', $_POST['password'], $_POST['passwordagain']);
    
    
        
    $newuser = $user->does_user_exist($user_input); 
    
    
    
    $newuser_result = $newuser->get_result();
    
    
    
    
    
    
    
 if($newuser_result->num_rows == 0) {
     
       $user->create_user($user_input, $password_input, $email_input);
     
       $last_id = $database->connection->insert_id;
     
       $_SESSION['admin_id'] = $last_id;
     
       $mail = new PHPMailer;

       $mail->ClearAddresses();

       $mail->addAddress($_POST['email'], $_POST['username']); 

       $mail->setFrom('noreply@fridaycamp.com', 'Friday Camp');

       $mail->Subject = 'Thanks for signing up.';

       $mail->AddEmbeddedImage('campfire.svg', 'campfire');

       $mail->Body = '<p>Thanks for signing up. <img src="cid:campfire"/></p>';

       $mail->isHTML(true);
     
       $mail->send();
     
       $mail->ClearAddresses();
     
       alert_note_positive('Thanks for joining Friday Camp. A welcome email has been sent to you.');
     
       redirect_to('../home');
     

}  else {
    
        alert_note('The username you entered already exists. Please try again.');
     
        redirect_to('../login'); 
     
 } 
    
    
      
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     
    redirect_to('../login'); 
     
}    

redirect_to('../login');

?>