<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('../login'); ?>


<!DOCTYPE html>



<html lang="en">

    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
 
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">

     
     
            <?php  include("nav.php"); ?>
    
        
    
            <div>
               
            <?php  
    
            if (isset($_SESSION['note1'])) {
                
            echo "<div style='display: table; margin: 0 auto; margin-top: -30px; margin-bottom: 20px;'>{$_SESSION['note1']}</div>";  
                
            $_SESSION['note1'] = null;
                
            }   else {
                
            $_SESSION['note1'] = null;
                
            }
                
            ?>
                
                
                
                
                
                
           <form method="post" action="../backend/code_edit_picture.php" enctype="multipart/form-data">
           
           <p class="home-head">Change your picture.</p>

           
           <div class="row edit-pic-1">
                
            <div class="col-xs-6" style="">
                
                
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    
                <span class="btn btn-primary btn-file file-style-1"><span class="fileupload-new" style=" color: black;">change profile image</span>
                    
                <span class="fileupload-exists" style="color: black;"></span><input type="file" name="profilepic" placeholder="Upload the Ghana flag" /> <span class="fileupload-preview" style="color: black;"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">x</a></span>
               
                </div>
                
                
            </div>
           
           
            <div class="col-xs-6 toggle" style="">
                
                <button name="submit" class="btn" style="font-family: georgia; margin-left: 20px;">Submit</button>
                
            </div>
           
           
            <div class="selection" style="display: none;">
                    
                <p class='loading-1'>Uploading picture...</p>
                            
           </div>

               
           </div>
           

           </form>

           </div>
        
        

        
             
</body>
    
   
 <?php include('../js/general_javascript.php');  ?>  
    
    
</html>
         
         