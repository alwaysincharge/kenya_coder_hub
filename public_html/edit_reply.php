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
            
            $this_reply = $reply->get_this_reply($_GET['reply'], $_SESSION['admin_id']); 
    
            $this_reply_result = $this_reply->get_result();   
                    
        
            while($row = $this_reply_result->fetch_assoc()) { ?>
         
               <form method='post' action="code_edit_reply.php"  class='forum-form'>
                   
                   
                    <p class="home-head">Edit your comment.</p>
                   
                   
                   <a href="post/<?php echo $_GET['post'];  ?>" class="home-head-2">Visit related post.</a>
                   
            
                     <textarea maxlength="500" style="height: 150px; width: 300px;" placeholder='Do you have a question, job or story to share?' name="body" class="forum-details"><?php echo $row["body"];  ?></textarea>
                   
                     <div>
                       
                     <textarea maxlength="500" style="height: 150px; width: 300px;" placeholder='Paste related code here.' name="code" class="toggle forum-details"><?php echo $row["code"];  ?></textarea>
                         
                         
                <input maxlength="1000" style="height: 150px; width: 300px;" type="hidden" name="id" class="forum-details" value="<?php echo $_GET["reply"];  ?>">
                         
                <input maxlength="1000" style="height: 150px; width: 300px;" type="hidden" name="commentid" class="forum-details" value="<?php echo $row["commentid"];  ?>">
                         
                <input maxlength="1000" style="height: 150px; width: 300px;" type="hidden" name="postid" class="forum-details" value="<?php echo $_GET["post"];  ?>">
                    
                           <br>    
                   
               
                     <button name="submit" class="forum-post btn">Edit</button>
               
                     </div> 
                       
                     
                   

                   
                     <br><br>
                   
                </form>
                
            <?php }
                
            ?>
                
                
            </div>
    
    
    
</body>
    
    <?php include('js/general_javascript.php');  ?> 
    
</html>