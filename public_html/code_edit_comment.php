<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('login'); ?>


<?php



 $session->if_not_logged_in('rkjerjk');



 $body_input = '';

 $code_input = '';

 $commentowner_input = '';
    
 $postid = '';
    
 $postowner_input = '';





if(request_is_post()) {

if (isset($_POST['submit']))  {
    


 $body_input = $_POST['body'];

 $code_input = $_POST['code'];
    
 $id_input = $_POST['id'];

 $commentowner_input = $_SESSION['admin_id'];
    
 $postid_input = $_POST['postid'];
    
 
    
 
    
    
 check_emptiness($body_input, 'edit_comment.php?comment=' . $id_input, 'The body field cannot be empty. Please try again.');
    
  
 check_lenght_3($body_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', 'edit_comment.php?comment=' . $id_input);    
    
 check_lenght_3($code_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', 'edit_comment.php?comment=' . $id_input); 
    
        
 $comment->edit_comment($body_input, $code_input, $commentowner_input, $id_input); 
    
 alert_note_positive('You successfully edited the comment.');
     
 header("Location: {$_SERVER['HTTP_REFERER']}");
    
       

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('home'); 
     
}    



?>