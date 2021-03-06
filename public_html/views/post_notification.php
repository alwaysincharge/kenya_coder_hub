<?php  include_once('../../includes/all_classes_and_functions.php');  ?>



<?php $session->if_not_logged_in('../login'); ?>



<?php

// Set ajax post notifications as read.

$comment->unset_notif_comments($_SESSION['admin_id']);

$reply->unset_notif_replies($_SESSION['admin_id']);

?>



<html lang="en">
    
    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
     
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
    
    
        <?php  include("nav.php"); ?>
    
    
<div class="row" style="width: 100%; max-width: 850px; display: table; margin: 0 auto;">
    
    
<div class="col-xs-6" style="max-width: 450px;">
    
    
    
            <p class="home-head">Comments on your posts.</p>
      
            <?php
            
            // List of comments on your posts.
            
            $my_comments = $comment->notif_comments($_SESSION['admin_id'], $_SESSION['admin_id']); 
    
            $my_comments_result = $my_comments->get_result();   
                    
            $numComments = $my_comments_result->num_rows;
      
            if ($numComments == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-family: georgia;'>No comments yet.</p>";
                
            }
        
            while($row = $my_comments_result->fetch_assoc()) { ?>

            
                <div class="row comment-box-2">
			
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="comment-image-2" src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 30px;">
					<p class="username-post">
						<span class="name-box"><a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
					</p>

					<p class="body-box">
						<a href="<?php echo $_SESSION['url_placeholder']; ?>post/<?php echo $row['postid'];  ?>"><?php echo $row['body'];  ?></a>
					</p>

					<p class='code-box'>
                        <a href="<?php echo $_SESSION['url_placeholder']; ?>post/<?php echo $row['postid'];  ?>"><?php echo $row['code'];  ?></a>
					</p>
				
                    
				</div>
                    
              </div> 
      <?php }?>   
  </div>  
    
    
    

  <div class="col-xs-6" style="max-width: 450px;">
      
      
            <p class="home-head">Replies on your comments.</p>
      
            <?php
      
            // List of replies on your comments.
            
            $my_replies = $reply->notif_replies($_SESSION['admin_id']); 
    
            $my_replies_result = $my_replies->get_result();   
                    
            $numReplies = $my_replies_result->num_rows;
      
            if ($numReplies == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-family: georgia;'>No replies yet.</p>";
                
            }
        
            while($row = $my_replies_result->fetch_assoc()) { ?>

            
                <div class="row comment-box-2">
			
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="comment-image-2" src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 30px;">
					<p class="username-post">
						<span class="name-box"><a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
					</p>

					<p class="body-box">
						<a href="<?php echo $_SESSION['url_placeholder']; ?>post/<?php echo $row['postid'];  ?>"><?php echo $row['body'];  ?></a>
					</p>

					<p class='code-box'>
                        <a href="<?php echo $_SESSION['url_placeholder']; ?>post/<?php echo $row['postid'];  ?>"><?php echo $row['code'];  ?></a>
					</p>
				
                    
				</div>
                    
              </div> 
      <?php }?>   
  </div>   
    
    
    
    
    
</div>  
    
    
    
    
</body>
    
    
 <?php include('../js/general_javascript.php');  ?>  
    
    
</html>