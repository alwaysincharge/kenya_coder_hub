

<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php


require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->ClearAddresses();

$mail->addAddress('junenewjoint@gmail.com', 'Atsu Davoh'); 


$mail->setFrom('atsunewjoint@tsutsus.com', 'Diamond App');

$foo = 'http://www.tsutsus.com/forum.php';
$mail->Subject = 'Boys know how.';
$mail->AddEmbeddedImage('male.png', 'Kartka');
$mail->Body    = '<p>allen <img src="cid:Kartka"/></p>';

$mail->addAttachment('male.png'); 

$mail->isHTML(true);   








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
    
    

    
 does_it_contain($user_input, $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', 'login');
    
 does_it_contain($_POST['password'], $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', 'login');
    
 does_it_contain($_POST['passwordagain'], $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', 'login');
    
    
    
    
  
 check_emptiness($user_input, 'login', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['password'], 'login', 'All fields have to be filled. Please try again.');
    
 check_emptiness($_POST['passwordagain'], 'login', 'All fields have to be filled. Please try again.');
    
    
    
    
 check_lenght($user_input, 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', 'login');
    
 check_lenght($_POST['password'], 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', 'login');    
    
 check_lenght($email_input, 5, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', 'login'); 
    
    
    
    
 if (!filter_var($email_input, FILTER_VALIDATE_EMAIL) === false) {
 } else {
       alert_note('The email you entered is invalid. Please try again.');
     redirect_to('login');
 }
    
    
    
    
 are_both_passwords_equal('login', $_POST['password'], $_POST['passwordagain']);
    
    
        
 $newuser = $user->does_user_exist($user_input); 
    
 $newuser_result = $newuser->get_result();
    
    
    
    
    
    
    
 if($newuser_result->num_rows == 0) {
     
       $user->create_user($user_input, $password_input, $email_input);
     
       $last_id = $database->connection->insert_id;
     
       $_SESSION['admin_id'] = $last_id;
     
       $mail->send();
     
       $mail->ClearAddresses();
     

}  else {
    
        alert_note('The username you entered already exists. Please try again.');
     
        redirect_to('login'); 
     
 } 
    
    
      
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     redirect_to('login'); 
}    

redirect_to('login');

?>