<?php  include_once('../../includes/all_classes_and_functions.php');  ?>



<?php $session->if_not_logged_in('login'); ?>



<html lang="en">
    
   
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
    
    
            <?php  include("nav.php"); ?>
    
                 
    
<div class="row" style="max-width: 900px; display: table; margin: 0 auto;">
                
                
            <?php  
    
            if (isset($_SESSION['note1'])) {
                
            echo "<div style='display: table; margin: 0 auto; margin-top: -30px; margin-bottom: 20px;'>{$_SESSION['note1']}</div>"; 
                
            $_SESSION['note1'] = null;
                
            }   else {
                
            $_SESSION['note1'] = null;
                
            }
                
            ?>
                
                
            
                <form method='post' action="<?php echo $_SESSION['url_placeholder']; ?>backend/new_post.php"  class='forum-form'>
                    
                    
                    <p class="home-head">Write a post.</p>
                    
            
                     <textarea maxlength="1000" placeholder='Do you have a question, job or story to share? (required)' name="body" class="forum-details"></textarea>
                   
                     <div>
                       
                     <textarea maxlength="1000" placeholder='Paste related code here.' name="code" class="toggle forum-details"></textarea>
                    
                               
                     <textarea maxlength="300" placeholder="Title of your post. (required)" name="title" class="forum-title"></textarea> <br>
               
                     <button name="submit" class="forum-post btn">Post</button>
               
                     </div> 
                       
                     
                   
                     <div class="selection" style="display: none;">
                   
                     <a href="index.php"><p class="forum-logout">You need to sign-in to write a post.</p>
                         
                     </a>
                   
                     </div>
                   
                     <br><br>
                   
                </form>
                

                
                
</div>
    
    
</body>
    
    
 <?php include('../js/general_javascript.php');  ?> 
    
    
</html>