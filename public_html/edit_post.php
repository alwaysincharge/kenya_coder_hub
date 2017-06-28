<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php $session->if_not_logged_in('login'); ?>

<html lang="en">
    
    
<head>
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
    
    
    
    
<body>
    
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
                
                
                
                
                
            <?php
            
            $this_post = $post->get_this_post($_GET['forum'], $_SESSION['admin_id']); 
    
            $this_post_result = $this_post->get_result();   
                    
        
            while($row = $this_post_result->fetch_assoc()) { ?>
         
               <form method='post' action="code_edit_post.php"  class='forum-form'>
                   
                   
                    <p class="home-head">Edit your post.</p>
                   
            
                     <textarea maxlength="1000" style="height: 150px;" placeholder='Do you have a question, job or story to share?' name="body" class="forum-details"><?php echo $row["body"];  ?></textarea>
                   
                     <div>
                       
                     <textarea maxlength="1000" style="height: 150px;" placeholder='Paste related code here.' name="code" class="toggle forum-details"><?php echo $row["code"];  ?></textarea>
                         
                         
                     <input maxlength="500" type="hidden" name="id" class="toggle forum-details" value="<?php echo $_GET["forum"];  ?>">
                    
                               
                     <textarea maxlength="300" style="height: 80px;" placeholder="Title of your post." name="title" class="forum-title"><?php echo $row["title"];  ?></textarea> <br>
               
                     <button name="submit" class="forum-post btn">Edit</button>
               
                     </div> 
                       
                     
                   
                     <div class="selection" style="display: none;">
                   
                     <a href="index.php"><p class="forum-logout">You need to sign-in to write a post.</p>
                         
                     </a>
                   
                     </div>
                   
                     <br><br>
                   
                </form>
                
            <?php }
                
            ?>
                
                
            </div>
    
    
    
</body>
    
    <?php include('js/general_javascript.php');  ?> 
    
</html>