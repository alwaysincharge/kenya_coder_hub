<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php



 $session->if_not_logged_in('rkjerjk');



 $title_input = '';

 $body_input = '';

 $code_input = '';

 $owner_input = '';


if(request_is_post()) {  

    
    
if (isset($_POST['submit']))  {
    
    

 
 $title_input = $_POST['title'];

 $body_input = $_POST['body'];

 $code_input = $_POST['code'];

 $owner_input = $_SESSION['admin_id'];
    
  
    
  
 check_emptiness($title_input, 'home', 'The body or title field cannot be empty. Please try again.');
    
 check_emptiness($body_input, 'home', 'The body or title field cannot be empty. Please try again.');
    
    
    
    
 check_lenght_2($title_input, 0, 300, 'The maximum number of characters for each field is title: 300, body: 1000, code: 1000. ');
    
 check_lenght_2($body_input, 0, 1000, 'The maximum number of characters for each field is title: 300, body: 1000, code: 1000. ');    
    
 check_lenght_2($code_input, 0, 1000, 'The maximum number of characters for each field is title: 300, body: 1000, code: 1000. '); 
    
    
    
        
 $post->create_post($title_input, $body_input, $code_input, $owner_input); 
    
 $last_id = $database->connection->insert_id;
    
 redirect_to('post/' . $last_id);
    
 
    
    
    
    
    
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     redirect_to('home'); 
}    















?>





