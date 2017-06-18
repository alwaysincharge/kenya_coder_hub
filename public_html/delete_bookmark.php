<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php


 $user_input = '';

    
    

    
    

 $id_input = $_GET['forumid'];
    
 $current_userid_input = $_SESSION['admin_id'];


    
        
 $bookmark->delete_bookmark($id_input, $current_userid_input); 

 alert_note('The bookmark has been deleted.');

 redirect_to('bookmark.php');
    
    
    

?>