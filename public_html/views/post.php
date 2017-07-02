<?php  include_once('../../includes/all_classes_and_functions.php');  ?>



<?php $_SESSION['realredirect1'] = $_SERVER['REQUEST_URI']; ?>


               <?php

               // Leave the page if the GET value doesn't exist.
            
               $this_post = $post->this_post($_GET['forum']); 
    
               $this_post_result = $this_post->get_result();  

               $numRows = $this_post_result->num_rows;
      
               if ($numRows == 0) {
                   
               alert_note('The page you are looking for does not exist or has been deleted.');
     
               redirect_to('../home'); 

               } ?>



<!DOCTYPE html>



<html lang="en">
    
    
    
	<head>
        
        <?php
        
        // Get and display information about the post.
            
        $this_post = $post->this_post($_GET['forum']); 
    
        $this_post_result = $this_post->get_result();   
                    
        while($row_x = $this_post_result->fetch_assoc()) { ?>
        
        
		<title><?php echo $row_x['title']; ?> - Friday Camp - Meet Kenya's programmers.</title>
        
		<meta content="<?php echo htmlspecialchars($row_x['body']); ?>" name="description">
        
        
        <?php } ?>
        
        <?php include('head_info.php'); ?>
        
	</head>
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
        
        
            <?php  include("nav.php"); ?>
        
                    
            <?php  
    
            if (isset($_SESSION['note1'])) {
                
            echo "<div style='display: table; margin: 0 auto; margin-top: -30px; margin-bottom: 20px;'>{$_SESSION['note1']}</div>"; 
                
            $_SESSION['note1'] = null;
                
            }   else {
                
            $_SESSION['note1'] = null;
                
            }
                
            ?>
            

        
<div class="row whole-box" style="z-index: 1;">
            
            
            <?php
    
             // Get and display information about the post.
            
            $this_post = $post->this_post($_GET['forum']); 
    
            $this_post_result = $this_post->get_result();   
                    
            while($row = $this_post_result->fetch_assoc()) { ?>
            
			<div class="row posting-box">
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="post-image-1" src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php   echo  $row['img_path'];  ?>">
                      <!--  <?php /* $path = dirname(__FILE__) . '\\' . $row['img_path'];  $path = str_replace('\\', '/', $path); echo $path; */?> -->
					</div>
				</div>

				<div class="col-xs-10">
					<p class="username-post">
						<span class="name-box"><a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php echo $row['username']; ?>"><?php  echo $row['username'];  ?></a></span> <?php  echo $row['title'];  ?>
					</p>

					<p class="body-box">
						<?php  echo makeClickableLinks($row['body']);  ?>
					</p>

					<p class='code-box'>
						<?php  echo $row['code'];  ?>
                        
					</p>
                    
                    
                    
                    
                                        
                    
                <?php
                                                            
                    // Administrative options for the comment owner.
                         
                    if ((isset($_SESSION['admin_id'])) && ($_SESSION['admin_id'] == $row['owner']) ) { ?>
                                                                     
                    <a href="<?php echo $_SESSION['url_placeholder']; ?>views/edit_post.php?forum=<?php echo $row['forumid']; ?>" class="form-call">Edit</a> //
                    <a class="toggle form-call">Delete</a> 
                    
                    
                    
                       <div class="selection" style="display: none; font-family: georgia;">
                         
                        <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/delete_post.php?id=<?php echo $row['forumid']; ?>"><br>
                        
                        <p>Are you sure? </p>
                            
                        <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                        <button class="forum-post btn" style="display: inline;" name="submit">Yes</button>
                        
                        </form>
                         
                    </div>
                    
                    
                    
                    //
                    
                    
                    <?php }
                                                                 
                                                                 
                    ?>
                    
                    
                    
                    
                    
					<a href="<?php echo $_SESSION['url_placeholder']; ?>backend/code_bookmark.php?forumid=<?php echo $_GET['forum']; ?>" class="form-call">Save</a> //
                    <a class="toggle form-call">Comment</a>
                    
                    <?php if (isset($_SESSION['admin_id'])) { ?>
                    
					<div class="selection" style="display: none;">
						<br>

						<form action="<?php echo $_SESSION['url_placeholder']; ?>backend/new_comment.php" method='post'>
							<textarea class="toggle forum-details" maxlength="1000" name="body" placeholder='Comment (required)'></textarea> 

							<textarea class="toggle forum-details" maxlength="1000" name="code" placeholder='Paste related code here.'></textarea><br>
                            
                            <input type="hidden" name="commentowner" value="<?php echo $_SESSION['admin_id']; ?>">
                            
                            <input type="hidden" name="postowner" value="<?php echo $row['usersid']; ?>">
                            
                            <input type="hidden" name="postid" value="<?php echo $row['forumid']; ?>">
                            
							<button class="forum-post btn" name="submit">Post</button> 
						
						</form>
					</div>
                    
                    <?php } ?>
                    
                    
                    <?php if (!isset($_SESSION['admin_id'])) { ?>
                    
                    	<div class="selection" style="display: none;">
								<a href="../login">
								<p class="forum-logout">
									Sign-in to comment.
								</p></a>
							</div>
                                        <?php } ?>
                    
				</div>
			</div>
            
            
            
            <?php }
            
            
            ?>
            
            
            

    
    
    
            
            <?php
    
            // Get and display information about the post's comments.
            
            $these_comments = $comment->get_these_comments($_GET['forum']); 
    
            $these_comments_result = $these_comments->get_result();   
                    
        
            while($row = $these_comments_result->fetch_assoc()) { ?>

            
                <div class="row comment-box">
			
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="comment-image-1" src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 30px;">
					<p class="username-post">
						<span class="name-box"><a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
					</p>

					<p class="body-box">
						<?php echo makeClickableLinks($row['body']);  ?>
					</p>

					<p class='code-box'>
						<?php echo $row['code'];  ?>
					</p>
                    
                    
                    <?php
                         
                    if ((isset($_SESSION['admin_id'])) && ($_SESSION['admin_id'] == $row['commentowner']) ) { ?>
                                                                     
                    <a href="<?php echo $_SESSION['url_placeholder']; ?>views/edit_comment.php?comment=<?php echo $row['commentid']; ?>" class="form-call">Edit</a> //
                    <a class="toggle form-call">Delete</a> 
                    
                    
                    
                       <div class="selection" style="display: none; font-family: georgia;">
                         
                        <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/delete_comment.php?id=<?php echo $row['commentid']; ?>"><br>
                        
                        <p>Are you sure? </p>
                            
                        <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                        <button class="forum-post btn" style="display: inline;" name="submit">Yes</button>
                        
                        </form>
                         
                    </div>
                    
                    
                    
                    //
                    
                    
                    <?php }
                                                                 
                                                                 
                    ?>
                    
					<a class="toggle form-call">Reply</a>
                    
                    <?php if (isset($_SESSION['admin_id'])) { ?>
                    
					<div class="selection" style="display: none;"><br>

						<form action="<?php echo $_SESSION['url_placeholder']; ?>backend/new_reply.php" method='post'>
                            
							<textarea class="forum-details" maxlength="1000" name="body" placeholder='Reply (required)'></textarea>
                            
                            <input type="hidden" name="replyowner" value="<?php echo $_SESSION['admin_id']; ?>">
                            
                            <input type="hidden" name="commentowner" value="<?php echo $row['commentowner']; ?>">
                            
                            <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                            <input type="hidden" name="postid" value="<?php echo $_GET['forum']; ?>">

							<textarea class="toggle forum-details" maxlength="1000" name="code" placeholder='Paste related code here.'></textarea><br>
                            
							<button class="forum-post btn" name="submit">Post</button> 
						
						</form>
                        
					</div>
                        
                   <?php } ?>
                    
                    
                    <?php if (!isset($_SESSION['admin_id'])) { ?>
                    
                    <div class="selection" style="display: none;">
                        
								<a href="../login">
                                    
								<p class="forum-logout">
									Sign-in to reply.
								</p>
                        
                        </a>
                        
				    </div>
                    
                    <?php } ?>
                    
				</div>
                
            
                
                    
                    
                    
                    
                                    
            <?php
                                                                 
            // Get and display information about the comment's replies.
            
            $these_replies = $reply->get_these_replies($row['commentid']); 
    
            $these_replies_result = $these_replies->get_result();   
                    
        
            while($rows = $these_replies_result->fetch_assoc()) { ?>
                

				<div class="row reply-box">
					<div class="col-xs-2" style="">
						<div class="dropdown">
							<img class="reply-image-1" src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php echo $rows['img_path'];  ?>">
						</div>
					</div>

					<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 20px;">
						<p class="username-post">
							<span class="name-box"><a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php echo $rows['username']; ?>"><?php echo $rows['username'];  ?></a></span>
						</p>

						<p class="body-box">
							<?php echo makeClickableLinks($rows['body']);  ?>
						</p>

						<p class='code-box'>
							<?php echo $rows['code'];  ?>
						</p>
                        
                        
                        
                        
                        
                        
                    <?php
                         
                    if ( (isset($_SESSION['admin_id'])) && ($_SESSION['admin_id'] == $rows['replyowner'])  ) { ?>
                                                                     
                    <a href="<?php echo $_SESSION['url_placeholder']; ?>views/edit_reply.php?reply=<?php echo $rows['replyid']; ?>&post=<?php echo $_GET['forum']; ?>" class="form-call">Edit</a> //
                    <a class="toggle form-call">Delete</a> 
                    
                    
                    
                       <div class="selection" style="display: none; font-family: georgia;">
                         
                        <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/delete_reply.php?id=<?php echo $rows['replyid']; ?>"><br>
                        
                        <p>Are you sure? </p>
                            
                        <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">
                            
                        <button class="forum-post btn" style="display: inline;" name="submit">Yes</button>
                        
                        </form>
                         
                    </div>
                    
                    
                    
                    //
                    
                    
                    <?php }
                                                                 
                                                                 
                    ?>
                        
                        
                        
                        
                        
                        
                        
                        
				 </div>
                    
                    
				 </div>
			
            
                 <?php } ?>
                
                
                 </div>      
                

                 <?php } ?>
                
                
                
                
         
</div>
    
<?php include('../js/general_javascript.php');  ?>
    
   
    
</body>
    
</html>