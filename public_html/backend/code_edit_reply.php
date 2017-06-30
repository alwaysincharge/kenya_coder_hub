<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


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

 $replyowner_input = $_SESSION['admin_id'];
    
 $comment_input = $_POST['commentid'];
    
 $post_id = $_POST['postid'];
    
 
    
 
    
    
 check_emptiness($body_input, $_SESSION['url_placeholder'] . 'views/edit_reply.php?reply=' . $id_input . '&post=' . $post_id, 'The body field cannot be empty. Please try again.');
      
 check_lenght_3($body_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', $_SESSION['url_placeholder'] . 'views/edit_reply.php?reply=' . $id_input . '&post=' . $post_id);      
    
 check_lenght_3($code_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', $_SESSION['url_placeholder'] . 'views/edit_reply.php?reply=' . $id_input . '&post=' . $post_id); 
    
    
    
 $reply->edit_reply($body_input, $code_input, $replyowner_input, $id_input); 
    
 alert_note_positive('You successfully edited the reply.');
     
 header("Location: {$_SERVER['HTTP_REFERER']}");
    
       

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('../login'); 
     
}    



?>