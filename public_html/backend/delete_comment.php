<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('../login'); ?>


<?php

if(request_is_post()) {


$id_input = $_GET['id'];
    
$owner = $_SESSION['admin_id'];
  
  
    
$comment->delete_comment($id_input, $owner);
    
alert_note_positive('The comment has been deleted. Thanks a lot.');
    
header("Location: {$_SERVER['HTTP_REFERER']}");
    
}
    

 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     
    redirect_to('../login');
     
}    



?>