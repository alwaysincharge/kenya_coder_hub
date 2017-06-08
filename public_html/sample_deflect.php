<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php

if(request_is_post()) {

      if (!isset($_SESSION['admin_id']))  {
    
      alert_note('Log in to contact cool programmers around Kenya. Or sign-up below.');

      redirect_to("home");      
    
}     else {
    
      redirect_to("home");      
       
}  }   else  {
    
      alert_note('Please stop trying to hack the site. Thanks a lot. ');
      redirect_to('home'); 
}    


?>