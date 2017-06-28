
<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php $session->if_not_logged_in('login'); ?>

<?php


 $user_input = '';

    
    

    
    

 $id_input = $_GET['forumid'];
    
 $current_userid_input = $_SESSION['admin_id'];


    
        
 $newsave = $bookmark->does_bookmark_exist($id_input, $current_userid_input); 
    
 $newsave_result = $newsave->get_result();
    
    





 if($newsave_result->num_rows == 0) {
     
     
       $bookmark->new_bookmark($id_input, $current_userid_input);
     
       redirect_to('/fridaycamp/public_html/bookmark.php');
     
     
}  else {
    
     
       alert_note('This post is already on your bookmark list.');
     
       redirect_to('bookmark.php'); 
     
     
 } 
    
    
    
    
    





?>