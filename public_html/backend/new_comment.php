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

 $commentowner_input = $_POST['commentowner'];
    
 $postid_input = $_POST['postid'];
    
 $postowner_input = $_POST['postowner'];
    
   

    
 check_emptiness_3($body_input, 'The body field cannot be empty. Please try again.', $_SESSION['url_placeholder'] . 'post/' . $postid_input);
    
     
    
    
 check_lenght_4($body_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', $_SESSION['url_placeholder'] . 'post/' . $postid_input);    
    
 check_lenght_4($code_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', $_SESSION['url_placeholder'] . 'post/' . $postid_input); 
    
            
    
    
 $comment->create_comment($body_input, $code_input, $commentowner_input, $postid_input, $postowner_input); 
    
 alert_note('You successfully made a comment. Scroll down to see it.');
     
 header("Location: {$_SERVER['HTTP_REFERER']}");
    
       

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('../login'); 
     
}    



?>





