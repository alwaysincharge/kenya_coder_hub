<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php



 $session->if_not_logged_in('rkjerjk');





if(request_is_post()) {
if(request_is_same_domain()) {
if(is_session_valid())    {
    
    
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
    
    
    
    
    
    
 check_lenght_2($fullname_input, 0, 1000, 'The maximum number of characters for each field is 1000. ');
    
 check_lenght_2($story_input, 0, 1000, 'The maximum number of characters for each field is 1000. ');    
    
 check_lenght_2($skill1_input, 0, 1000, 'The maximum number of characters for each field is 1000. ');  
    
 
    
        
    
    
 $user->edit_user_profile($fullname_input, $story_input, $skill1_input, $skill2_input, $skill3_input, $skill4_input, $skill5_input, $skill6_input, $skill7_input, $skill8_input, $project1_input, $project2_input, $project3_input, $project4_input, $link1_input, $link2_input, $link3_input, $link4_input, $desc1_input, $desc2_input, $desc3_input, $desc4_input, $school1_input, $school2_input, $school3_input, $school4_input, $diplo1_input, $diplo2_input, $diplo3_input, $diplo4_input, $learn1_input, $learn2_input, $learn3_input, $learn4_input, $param_input); 
    
 alert_note('You successfully made a comment. Scroll down to see it.');
     
 
    
    
    
    
    
    

}}
    
 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 1');
     redirect_to('home'); 
}    

}
    else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 2');
     redirect_to('home'); 
}
    

    }

 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot. 4');
     redirect_to('home'); 
}













?>





