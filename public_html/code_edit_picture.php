 <?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php   


if (isset($_POST['submit']) )  {
    
    
        if (empty($_FILES['profilepic']['name']))  {
        
        alert_note('Please select a picture.');
     
        redirect_to('editprofilepicture.php'); 
            
        }  
    
    
    
    
        if (!($_FILES["profilepic"]["size"] < 1000000))  {   
            
        alert_note('Your file cannot be bigger than 1MB.'); 
        
        redirect_to('editprofilepicture.php'); 
            
        }
    
    
    
    
        $filetmp = $_FILES['profilepic']['tmp_name'];
    
        $filename = $_FILES['profilepic']['name'];
    
        $filetype = $_FILES['profilepic']['type'];
    
    
    
    
        if( ($filetype != "image/jpg" && $filetype != "image/png" && $filetype != "image/jpeg"
            
        && $filetype != "image/gif")  )  { 
             
        alert_note('Your file has to be an image in jpg, png, jpeg or gif format.'); 
         
        redirect_to('editprofilepicture.php'); 
             
        } 
    
    
    
    
        $image_info = getimagesize($_FILES["profilepic"]["tmp_name"]);
    
        if (!$image_info) {
            
        alert_note('Your file has to be an image in jpg, png, jpeg or gif format.'); 
         
        redirect_to('editprofilepicture.php');     
            
        }
    
    
    
    
    
        $filepath = "pictures/" . ( time() + 679 ) . $filename; 
            
        move_uploaded_file($filetmp, $filepath);
    
    
    
        $user->edit_picture($filetype, $filepath, $filename, $_SESSION['admin_id']);
    
        alert_note_positive('You changed your picture.'); 
         
        redirect_to('editprofilepicture.php'); 
      

    

     
    }
?>

