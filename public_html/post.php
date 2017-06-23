<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<!DOCTYPE html>


<html lang="en">
    
    
    
	<head>
		<title>
			Tsutsus - Meet Kenya's programmers.
		</title>
		<meta content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here." name="description">
        <?php include('head_info.php'); ?>
	</head>
    
    
    
    
	<body>
        
        
        <?php  include("nav.php"); ?>
        
        
        
        <div style="position: fixed; right: 30px; z-index: 2;">
            
        
        <?php  
    
        if (isset($_SESSION['note1'])) {
        echo $_SESSION['note1'];  
            $_SESSION['note1'] = null;
        }   else {
            $_SESSION['note1'] = null;
        }
        ?>
            
            
        </div>
        
        
        
        
        
        
        
        
        
		<div class="row whole-box" style="z-index: 1;">
            
            
            
            <?php
            
            $this_post = $post->get_this_post($_GET['forum']); 
    
            $this_post_result = $this_post->get_result();   
                    
        
            while($row = $this_post_result->fetch_assoc()) { ?>
            
            
            
			<div class="row posting-box">
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="post-image-1" src="/fridaycamp/public_html/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10">
					<p class="username-post">
						<span class="name-box"><a href=""><?php  echo $row['username'];  ?></a></span> <?php  echo $row['title'];  ?>
					</p>

					<p class="body-box">
						<?php  echo $row['body'];  ?>
					</p>

					<p class='code-box'>
						<?php  echo $row['code'];  ?>
					</p>
					<a href="/fridaycamp/public_html/code_bookmark.php?forumid=<?php echo $_GET['forum']; ?>" class="form-call">Save</a> // <a class="form-call">Delete</a> // <a class="toggle form-call">Comment</a>
					<div class="selection" style="display: none;">
						<br>

						<form action="/fridaycamp/public_html/new_comment.php" method='post'>
							<textarea class="toggle forum-details" maxlength="500" name="body" placeholder='Comment'></textarea> 

							<textarea class="toggle forum-details" maxlength="500" name="code" placeholder='Paste related code here.'></textarea><br>
                            
                            <input type="hidden" name="commentowner" value="<?php echo $_SESSION['admin_id']; ?>">
                            
                            <input type="hidden" name="postowner" value="<?php echo $row['usersid']; ?>">
                            
                            <input type="hidden" name="postid" value="<?php echo $row['forumid']; ?>">
                            
							<button class="forum-post btn" name="submit">Post</button> 
							<div class="selection" style="display: none;">
								<a href="index.php">
								<p class="forum-logout">
									You need to sign-in to write a post.
								</p></a>
							</div>
						</form>
					</div>
				</div>
			</div>
            
            
            
            <?php }
            
            
            ?>
            
            
            

            
            <?php
            
            $these_comments = $comment->get_these_comments($_GET['forum']); 
    
            $these_comments_result = $these_comments->get_result();   
                    
        
            while($row = $these_comments_result->fetch_assoc()) { ?>

            
                <div class="row comment-box">
			
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="comment-image-1" src="/fridaycamp/public_html/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 30px;">
					<p class="username-post">
						<span class="name-box"><a href=""><?php echo $row['username'];  ?></a></span>
					</p>

					<p class="body-box">
						<?php echo $row['body'];  ?>
					</p>

					<p class='code-box'>
						<?php echo $row['code'];  ?>
					</p>
					<a class="toggle form-call">Reply</a>
					<div class="selection" style="display: none;">
						<br>

						<form action="/fridaycamp/public_html/new_reply.php" method='post'>
							<textarea class="toggle forum-details" maxlength="500" name="body" placeholder='Reply'></textarea>
                            
                            <input type="hidden" name="replyowner" value="<?php echo $_SESSION['admin_id']; ?>">
                            
                            <input type="hidden" name="commentowner" value="<?php echo $row['commentowner']; ?>">
                            
                            <input type="hidden" name="commentid" value="<?php echo $row['commentid']; ?>">

							<textarea class="toggle forum-details" maxlength="500" name="code" placeholder='Paste related code here.'></textarea><br>
							<button class="forum-post btn" name="submit">Post</button> 
							<div class="selection" style="display: none;">
								<a href="index.php">
								<p class="forum-logout">
									You need to sign-in to write a post.
								</p></a>
							</div>
						</form>
					</div>
				</div>
                
            
                
                    
                                    
            <?php
            
            $these_replies = $reply->get_these_replies($row['commentid']); 
    
            $these_replies_result = $these_replies->get_result();   
                    
        
            while($rows = $these_replies_result->fetch_assoc()) { ?>
                

				<div class="row reply-box">
					<div class="col-xs-2" style="">
						<div class="dropdown">
							<img class="reply-image-1" src="/fridaycamp/public_html/<?php echo $rows['img_path'];  ?>">
						</div>
					</div>

					<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 20px;">
						<p class="username-post">
							<span class="name-box"><a href=""><?php echo $rows['username'];  ?></a></span>
						</p>

						<p class="body-box">
							<?php echo $rows['body'];  ?>
						</p>

						<p class='code-box'>
							<?php echo $rows['code'];  ?>
						</p>
					</div>
				</div>
			
            
                 <?php }
            
            
                 ?>
                
                
                </div>      
                

                
                 <?php }
            
            
                 ?>
                
                
                
                
          

            
            
            
            
            
		</div>
		<?php include('js/general_javascript.php');  ?>
	</body>
</html>