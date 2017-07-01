<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('../login'); ?>


<?php




if(request_is_post()) {
   
if (isset($_POST['submit']))  {
    


     $fullname_input = $_POST['fullname'];
    
     $story_input =  $_POST['story'];
    
     $skill1_input =  $_POST['skill1'];
    
     $skill2_input =  $_POST['skill2'];
    
     $skill3_input =  $_POST['skill3'];
    
     $skill4_input =  $_POST['skill4'];
    
     $skill5_input =  $_POST['skill5'];
    
     $skill6_input =  $_POST['skill6'];
    
     $skill7_input =  $_POST['skill7'];
    
     $skill8_input =  $_POST['skill8'];
    
     $project1_input =  $_POST['project1'];
    
     $project2_input =  $_POST['project2'];
    
     $project3_input =  $_POST['project3'];

     $project4_input =  $_POST['project4'];
    
     $link1_input =  $_POST['link1'];
    
     $link2_input =  $_POST['link2'];
    
     $link3_input =  $_POST['link3'];
    
     $link4_input =  $_POST['link4'];
    
     $desc1_input =  $_POST['desc1'];
    
     $desc2_input =  $_POST['desc2'];
    
     $desc3_input =  $_POST['desc3'];
    
     $desc4_input =  $_POST['desc4'];
    
     $school1_input =  $_POST['school1'];
    
    $school2_input =  $_POST['school2'];
    
    $school3_input =  $_POST['school3'];
    
    $school4_input =  $_POST['school4'];
    
    $diplo1_input =  $_POST['diplo1'];
    
    $diplo2_input =  $_POST['diplo2'];
    
    $diplo3_input =  $_POST['diplo3'];
    
    $diplo4_input =  $_POST['diplo4'];
    
    $learn1_input =  $_POST['learn1'];
    
    $learn2_input =  $_POST['learn2'];
    
    $learn3_input =  $_POST['learn3'];
    
    $learn4_input =  $_POST['learn4'];

    $param_input = $_SESSION['admin_id'];
    
    
    
    
    check_lenght($fullname_input, 0, 30, 'The fullname field cannot be longer than 30.', '../views/editprofile.php');
     
    check_lenght($story_input, 0, 500, 'The story field cannot be longer than 500.', '../views/editprofile.php');
 
    check_lenght($skill1_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill2_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill3_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill4_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill5_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill6_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill7_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($skill8_input, 0, 30, 'The skills field cannot be longer than 30.', '../views/editprofile.php');
    
    check_lenght($project1_input, 0, 50, 'The projects field cannot be longer than 50.', '../views/editprofile.php');
    
    check_lenght($project2_input, 0, 50, 'The projects field cannot be longer than 50.', '../views/editprofile.php');
    
    check_lenght($project3_input, 0, 50, 'The projects field cannot be longer than 50.', '../views/editprofile.php');
    
    check_lenght($project4_input, 0, 50, 'The projects field cannot be longer than 50.', '../views/editprofile.php');
    
    check_lenght($link1_input, 0, 300, 'The link field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($link2_input, 0, 300, 'The link field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($link3_input, 0, 300, 'The link field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($link4_input, 0, 300, 'The link field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($desc1_input, 0, 300, 'The description field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($desc2_input, 0, 300, 'The description field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($desc3_input, 0, 300, 'The description field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($desc4_input, 0, 300, 'The description field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($school1_input, 0, 60, 'The school field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($school2_input, 0, 60, 'The school field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($school3_input, 0, 60, 'The school field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($school4_input, 0, 60, 'The school field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($diplo1_input, 0, 60, 'The diploma field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($diplo2_input, 0, 60, 'The diploma field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($diplo3_input, 0, 60, 'The diploma field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($diplo4_input, 0, 60, 'The diploma field cannot be longer than 60.', '../views/editprofile.php');
    
    check_lenght($learn1_input, 0, 300, 'The learn field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($learn2_input, 0, 300, 'The learn field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($learn3_input, 0, 300, 'The learn field cannot be longer than 300.', '../views/editprofile.php');
    
    check_lenght($learn4_input, 0, 300, 'The learn field cannot be longer than 300.', '../views/editprofile.php');
    
    
    
        
    
    
 $user->edit_user_profile($fullname_input, $story_input, $skill1_input, $skill2_input, $skill3_input, $skill4_input, $skill5_input, $skill6_input, $skill7_input, $skill8_input, $project1_input, $project2_input, $project3_input, $project4_input, $link1_input, $link2_input, $link3_input, $link4_input, $desc1_input, $desc2_input, $desc3_input, $desc4_input, $school1_input, $school2_input, $school3_input, $school4_input, $diplo1_input, $diplo2_input, $diplo3_input, $diplo4_input, $learn1_input, $learn2_input, $learn3_input, $learn4_input, $param_input); 
    
 alert_note_positive('You successfully made an edit. Scroll down to see it.');
    
 header("Location: {$_SERVER['HTTP_REFERER']}");
     
 
     

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     
    redirect_to('../login'); 
     
}    
?>





