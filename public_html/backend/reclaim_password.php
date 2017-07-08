<?php  include_once('../../includes/all_classes_and_functions.php');  ?>



<?php



require '../phpmailer/PHPMailerAutoload.php';


$user_input = '';


if(request_is_post()) {
   
if (isset($_POST['submit']))  {
    
    

 $user_input = $_POST['username'];
    
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    
    
 does_it_contain($user_input, $space, $equal_sign, $single_quote, 'Username or password cannot contain a space, equal sign or single quote.', '../login');
    
   
    
 check_emptiness($user_input, '../login', 'All fields have to be filled. Please try again.');

    
    
 check_lenght($user_input, 7, 30, 'The username and password cannot be smaller than 7 characters or bigger than 30.', '../login');
    
     
  
 $founduser = $user->does_user_exist($user_input); 
    
    
    
 $founduser_result = $founduser->get_result();
    
    
 
 if($founduser_result->num_rows == 1) {
     
     
         while($row = $founduser_result->fetch_assoc()) {
             
             
                          
            function randomString($length = 6) {
                 
	            $str = "";
                 
	            $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                 
	            $max = count($characters) - 1;
                 
	            for ($i = 0; $i < $length; $i++) {
                    
		        $rand = mt_rand(0, $max);
                    
		        $str .= $characters[$rand];
                    
	            }
                 
	            return $str;
                 
             }




             $_SESSION['random_string'] = randomString(13);
             
             $_SESSION['password_user'] = $row['id'];
             
             
    

             $mail2 = new PHPMailer;

             $mail2->ClearAddresses();

             $mail2->addAddress($row['email'], $row['username']); 

             $mail2->setFrom('noreply@fridaycamp.com', 'Friday Camp');

             $mail2->Subject = 'Reset your password.';

             $mail2->AddEmbeddedImage('../assets/email_image.png', 'campfire');

             $mail2->Body = "<div style='background: #ffd;  padding-top: 20px; border-radius: 25px; padding-bottom: 40px;'><img style='width: 150px; height: 150px; display: table; margin: 0 auto;' src='cid:campfire'/><p style='font-family: georgia;'>

             <h1 style='font-family: georgia; color: black; display: table; margin: 0 auto; margin-top: 30px;'>Hello " . $row['username'] .  ", </h1><br><br>

             <span style='color: black; font-family: georgia; padding-left: 10px; padding-right: 10px; width: 100%; max-width: 400px; display: table; margin: 0 auto; padding-bottom: 40px;'>
We are very sorry for the inconvenience of forgetting your password. Copy and paste the string below while completing the password reset form. <br><br><b> " . $_SESSION['random_string'] . "</b>

             <br><br>

       If you have any questions, you can email me at atsunewjoint@gmail.com <br><br>

       Thanks, <br><br>

       Atsu Davoh, Founder. <br><br></span>
       
       </p></div>";
             


             

             $mail2->isHTML(true); 
             
             $mail2->send();
     
             $mail2->ClearAddresses();
             
             alert_note_positive('A password recovery email has been sent to you. The email includes a random string that you must input below to complete the form.');
                     



     
             redirect_to('../views/reclaim_editpassword.php');
         }
    
    
}  else {
    
         alert_note('The username you entered is not associated with any account.');
     
         redirect_to('../login'); 
     
}
    
    
}
    
} else  {
    
         alert_note('Please stop trying to hack the site. Thanks a lot.');
    
         redirect_to('../login'); 
}    


         redirect_to('../login');

?>