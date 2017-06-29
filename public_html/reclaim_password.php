<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php



require 'phpmailer/PHPMailerAutoload.php';


$user_input = '';


if(request_is_post()) {
   
if (isset($_POST['submit']))  {
    
    

 $user_input = $_POST['username'];
    
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    
    
 does_it_contain($user_input, $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', 'login');
    
   
    
 check_emptiness($user_input, 'login', 'All fields have to be filled. Please try again.');

    
    
 check_lenght($user_input, 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', 'login');
    
     
  
 $founduser = $user->does_user_exist($user_input); 
    
    
    
 $founduser_result = $founduser->get_result();
    
    
 
 if($founduser_result->num_rows == 1) {
     
     
         while($row = $founduser_result->fetch_assoc()) {
    

             $mail2 = new PHPMailer;

             $mail2->ClearAddresses();

             $mail2->addAddress($row['email'], 'Friday Camp'); 

             $mail2->setFrom('noreply@fridaycamp.com', 'Friday Camp');

             $mail2->Subject = 'Change your password.';

             $mail2->AddEmbeddedImage('male.png', 'campfire');

             $mail2->Body    = '<p>allen <img src="cid:campfire"/></p>  <a href="fridaycamp.com/reclaim_editpassword.php?person=' . $row['id']  . ' ">Click this link.</a>';

             $mail2->addAttachment('male.png'); 

             $mail2->isHTML(true); 
             
             $mail2->send();
     
             $mail2->ClearAddresses();
             
     
         }
    
    
}  else {
    
         alert_note('The username you entered is not associated with any account.');
     
         redirect_to('login'); 
     
}
    
    
}
    
} else  {
    
         alert_note('Please stop trying to hack the site. Thanks a lot.');
    
         redirect_to('login'); 
}    


         redirect_to('login');

?>