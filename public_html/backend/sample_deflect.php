<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php

if(request_is_post()) {
    

      if (!isset($_SESSION['admin_id']))  {
    
      alert_note('Log in to contact cool programmers around Kenya. Or sign-up below.');

      redirect_to("../login");      
    
      }  else {
    
      redirect_to("../login");      
       
      }  



}   else  {
    
      alert_note('Log in to contact cool programmers around Kenya. Or sign-up below.');
    
      redirect_to('../login'); 
    
}    


?>