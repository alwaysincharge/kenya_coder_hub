<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('../login'); ?>


<?php


 



 $title_input = '';

 $body_input = '';

 $code_input = '';

 $owner_input = '';


if(request_is_post()) {  

if (isset($_POST['submit']))  {
    
    
    
 $title_input = $_POST['title'];

 $body_input = $_POST['body'];

 $code_input = $_POST['code'];
    
 $id_post = $_POST['id'];

 $owner_input = $_SESSION['admin_id'];
    
  
 check_emptiness($title_input, $_SESSION['url_placeholder'] . 'views/edit_post.php?forum=' . $id_post, 'The body or title field cannot be empty. Please try again.');
    
 check_emptiness($body_input, $_SESSION['url_placeholder'] . 'views/edit_post.php?forum=' . $id_post, 'The body or title field cannot be empty. Please try again.');
    
     
    
 check_lenght_3($title_input, 0, 300, 'The maximum number of characters for each field is title: 300, body: 1000, code: 1000. ', $_SESSION['url_placeholder'] . 'views/edit_post.php?forum=' . $id_post);
    
 check_lenght_3($body_input, 0, 1000, 'The maximum number of characters for each field is title: 300, body: 1000, code: 1000. ', $_SESSION['url_placeholder'] . 'views/edit_post.php?forum=' . $id_post);    
    
 check_lenght_3($code_input, 0, 1000, 'The maximum number of characters for each field is title: 300, body: 1000, code: 1000. ', $_SESSION['url_placeholder'] . 'views/edit_post.php?forum=' . $id_post); 
    
    
    
        
 $post->edit_post($title_input, $body_input, $code_input, $owner_input, $id_post); 
    
 redirect_to($_SESSION['url_placeholder'] . 'post/' . $id_post);
    
 
    
 
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('../login'); 
     
}    



?>

