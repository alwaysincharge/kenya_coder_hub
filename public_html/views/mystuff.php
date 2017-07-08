<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('../login'); ?>


<html lang="en">
    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
    
    
            <?php  include("nav.php"); ?>
    
    
<div class="row" style="width: 100%; max-width: 1300px; display: table; margin: 0 auto;">
    
    
    
            <?php 
    
            // Text notifications.
    
            if (isset($_SESSION['note1'])) {
                
            echo "<div style='display: table; margin: 0 auto; margin-bottom: 30px; margin-top: -30px;'>{$_SESSION['note1']}</div>";  
                
            $_SESSION['note1'] = null;
                
            }   else {
                
            $_SESSION['note1'] = null;
                
            }
                
            ?>
    
    
    
  <div class="col-xs-4" style="display: table; margin: 0 auto;">
      
  <p class="home-head">Your posts.</p>
      
      
      
      
      
            <?php
      
            // Display current user's posts.
      
            $myposts = $post->my_posts($_SESSION['admin_id']); 
    
            $myposts_result = $myposts->get_result();   
            
            $numPosts = $myposts_result->num_rows;
      
            if ($numPosts == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-family: georgia;'>No posts yet.</p>";
                
            }
        
            while($row = $myposts_result->fetch_assoc()) { ?>
      
            <div class="row single-post">
                     
                <div class="col-xs-2" style="">   
                    
                    <div class="dropdown">
                    
                        <img class="post-img"  src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php echo $row['img_path'];  ?>" />
                    
                        <div class='dropdown-content post-drop'>
                   
                        </div>
                        
                    </div>
                       
                </div>
                    
                    
                <div class="col-xs-10">
                    
                    
                <p class="title-username">
                        
                <span class="post-username"><a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
                        
                <a href="<?php echo $_SESSION['url_placeholder']; ?>post/<?php echo $row['forumid']; ?>" class="post-title"> <?php echo substr($row['title'], 0, 80); if (strlen($row['title']) > 70) {echo "...";}  ?></a>
                    
                </p>
                    
                    
                <p class="post-body">  <a href="<?php echo $_SESSION['url_placeholder']; ?>post/<?php echo $row['forumid']; ?>" style="color: black;"><?php echo substr($row['body'], 0, 300); if (strlen($row['body']) > 260) {echo "...";}  ?></a> </p>
                    
                    
                <?php    
                    
                $num_comments = $comment->get_number_of_comments($row['forumid']); 
    
                $num_comments_result = $num_comments->get_result();   
                    
        
                while($num = $num_comments_result->fetch_assoc()) { ?>
                                        
                <p class="comment-1"><span class="glyphicon glyphicon-comment" style="color: #ddd;"></span><span class="comment-2"><?php echo $num['count'];  ?></span></p>
                    
                    
                <?php }?> 
                    
                
                    
                <a href="<?php echo $_SESSION['url_placeholder']; ?>views/edit_post.php?forum=<?php echo $row['forumid']; ?>" class="form-call">Edit</a> // <a class="form-call toggle">Delete</a> 
                    
                    
                <div class="selection" style="display: none; font-family: georgia;">
                         
                        <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/delete_post.php?id=<?php echo $row['forumid'];  ?>"><br>
                        
                        <p>Are you sure? </p>
                            
                        <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                        <button class="forum-post btn" style="display: inline;" name="submit">Yes</button>
                        
                        </form>
                         
                </div>
                    
                //
                    
                </div> 
                    
                </div> 
      
                <?php }?>    
      
  </div>
    
    
    
    
    
    
    
    
    
  <div class="col-xs-4" style="max-width: 420px;">
  <p class="home-head">Your comments.</p>
      
  
      
            <?php
      
            // Display current user's comments.
            
            $my_comments = $comment->my_comments($_SESSION['admin_id']); 
    
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
				
                   <a href="<?php echo $_SESSION['url_placeholder']; ?>views/edit_comment.php?comment=<?php echo $row['commentid']; ?>" class="form-call">Edit</a> // <a class="form-call toggle">Delete</a>
                    
                    
                    <div class="selection" style="display: none; font-family: georgia;">
                         
                        <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/delete_comment.php?id=<?php echo $row['commentid'];  ?>"><br>
                        
                        <p>Are you sure? </p>
                            
                        <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                        <button class="forum-post btn" style="display: inline;" name="submit">Yes</button>
                        
                        </form>
                         
                    </div>
                    
                    //
				</div>
                    
              </div> 
      <?php }?>   
  </div>  
    
    
    
    
    
    
    
    
    
    
    
  <div class="col-xs-4" style="max-width: 420px;">
  <p class="home-head">Your replies.</p>
      
      
      
            
            <?php
      
            // Display current user's replies.
            
            $my_replies = $reply->my_replies($_SESSION['admin_id']); 
    
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
				
                    <a href="<?php echo $_SESSION['url_placeholder']; ?>views/edit_reply.php?reply=<?php echo $row['replyid']; ?>&post=<?php echo $row['postid']; ?>" class="form-call">Edit</a> // <a class="form-call toggle">Delete</a>
                    
                    
                    <div class="selection" style="display: none; font-family: georgia;">
                        
                        <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/delete_reply.php?id=<?php echo $row['replyid'];  ?>"><br>
                        
                        <p>Are you sure? </p>
                            
                        <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                        <button class="forum-post btn" style="display: inline;" name="submit">Yes</button>
                        
                        </form>
                         
                    
                         
                    </div>//
                    
                    
				</div>
                    
              </div> 
      <?php }?>   
  </div>   
    
    
    
    
    
</div>  
    
    
 <?php include('../js/general_javascript.php');  ?> 
    
    
</body>
    

</html>