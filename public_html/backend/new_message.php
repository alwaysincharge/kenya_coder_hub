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
    


 $message_input = $_POST['message'];

 $sender_input = $_POST['sender'];

 $receiver_input = $_POST['receiver'];
    
    
 check_emptiness($message_input, $_SESSION['url_placeholder'] . 'views/messages.php?usersid=' . $receiver_input, 'The body field cannot be empty. Please try again.');
    
    
 check_lenght_4($message_input, 0, 2000, 'The maximum number of characters for each field is body: 2000, code: 2000.', $_SESSION['url_placeholder'] . 'views/messages.php?usersid=' . $receiver_input);    
    
  
 $find = $message->conversation($sender_input, $receiver_input, $sender_input, $receiver_input);
    
 $result = $find->get_result();

 $numRows = $result->num_rows;
    
    
    
 if($numRows > 0) {
     
    while ($row1 = $result->fetch_assoc()){
        
    $converse = $row1['conversation'];

    }
     
 }
    
    
    
 if ($numRows == 0) {
        
       echo  $min = min($sender_input, $receiver_input); 
        
       echo  $max = max($sender_input, $receiver_input);
     
       $converse = $min . "," . $max;

}
 
 
   
    
$message->create_message($sender_input, $receiver_input, $message_input, $converse); 
    
header("Location: {$_SERVER['HTTP_REFERER']}");
     

}
    

}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('../login');
     
}    





?>





