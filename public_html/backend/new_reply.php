<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('../login'); ?>


<?php


 


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
    
 $commentid_input = $_POST['commentid'];

 $replyowner_input = $_POST['replyowner'];
    
 $postid_input = $_POST['postid'];
    
    
    
    
 check_emptiness($body_input, $_SESSION['url_placeholder'] . 'post/' . $postid_input, 'The body field cannot be empty. Please try again.');
    
    
 check_lenght_4($body_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', $_SESSION['url_placeholder'] . 'post/' . $postid_input);    
    
 check_lenght_4($code_input, 0, 1000, 'The maximum number of characters for each field is body: 2000, code: 2000. ', $_SESSION['url_placeholder'] . 'post/' . $postid_input); 
    
        
    
    
 $reply->create_reply($body_input, $code_input, $commentowner_input, $commentid_input, $replyowner_input); 
    
 alert_note_positive('You successfully made a reply. Scroll down to see it.');
     
 header("Location: {$_SERVER['HTTP_REFERER']}");
    
    
}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('../login'); 
     
}    















?>





