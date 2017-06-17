<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php if(!isset($_GET['state'])) {$_GET['state'] = '';} ?>




<html lang="en">
    
    
<head>
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
    
    
    
    
<body>
    
    
 <?php  include("nav.php"); ?>
    
    
    
<div class="row" style="width: 100%; max-width: 1300px; display: table; margin: 0 auto;">
    
    
    
    
    
  <div class="col-md-4" style="display: table; margin: 0 auto;">
      
  <p class="home-head">Your posts.</p>
      
      
      
      
      
            <?php
      
            $myposts = $post->my_posts($_SESSION['admin_id']); 
    
            $myposts_result = $myposts->get_result();   
            
            $numPosts = $myposts_result->num_rows;
      
            if ($numPosts == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-georgia;'>No posts yet.</p>";
                
            }
        
            while($row = $myposts_result->fetch_assoc()) { ?>
      
            <div class="row single-post">
                     
                <div class="col-xs-2" style="">   
                    
                    <div class="dropdown">
                    
                        <img class="post-img"  src="<?php echo $row['img_path'];  ?>" />
                    
                        <div class='dropdown-content post-drop'>
                   
                        </div>
                        
                    </div>
                       
                </div>
                    
                    
                <div class="col-xs-10">
                    
                    
                <p class="title-username">
                        
                <span class="post-username"><a href="/fridaycamp/public_html/user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
                        
                <a href='post/<?php echo $row['id']; ?>' class="post-title"> <?php echo substr($row['title'], 0, 80); if (strlen($row['title']) > 70) {echo "...";}  ?></a>
                    
                </p>
                    
                    
                <p class="post-body">  <a href='post/<?php echo $row['id']; ?>' style="color: black;"><?php echo substr($row['body'], 0, 300); if (strlen($row['body']) > 260) {echo "...";}  ?></a> </p>
                    
                    
                <?php    
                    
                $num_comments = $comment->get_number_of_comments($row['id']); 
    
                $num_comments_result = $num_comments->get_result();   
                    
        
                while($num = $num_comments_result->fetch_assoc()) { ?>
                                        
                <p class="comment-1"><span class="glyphicon glyphicon-comment" style="color: #ddd;"></span><span class="comment-2"><?php echo $num['count'];  ?></span></p>
                    
                    
                <?php }?>    
                    
                </div> 
                    
                </div> 
      
                <?php }?>    
      
  </div>
    
    
    
    
    
    
    
    
    
  <div class="col-md-4">
  <p class="home-head">Your comments.</p>
      
  
      
            <?php
            
            $my_comments = $comment->my_comments($_SESSION['admin_id']); 
    
            $my_comments_result = $my_comments->get_result();   
                    
            $numComments = $my_comments_result->num_rows;
      
            if ($numComments == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-georgia;'>No comments yet.</p>";
                
            }
        
            while($row = $my_comments_result->fetch_assoc()) { ?>

            
                <div class="row comment-box-2">
			
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="comment-image-2" src="/fridaycamp/public_html/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 30px;">
					<p class="username-post">
						<span class="name-box"><a href="/fridaycamp/public_html/user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
					</p>

					<p class="body-box">
						<a href="/fridaycamp/public_html/post/<?php echo $row['postid'];  ?>"><?php echo $row['body'];  ?></a>
					</p>

					<p class='code-box'>
                        <a href="/fridaycamp/public_html/post/<?php echo $row['postid'];  ?>"><?php echo $row['code'];  ?></a>
					</p>
				
                    
				</div>
                    
              </div> 
      <?php }?>   
  </div>  
    
    
    
    
    
    
    
    
    
    
    
  <div class="col-md-4">
  <p class="home-head">Your replies.</p>
      
      
      
            
            <?php
            
            $my_replies = $reply->my_replies($_SESSION['admin_id']); 
    
            $my_replies_result = $my_replies->get_result();   
                    
            $numReplies = $my_replies_result->num_rows;
      
            if ($numReplies == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-georgia;'>No replies yet.</p>";
                
            }
        
            while($row = $my_replies_result->fetch_assoc()) { ?>

            
                <div class="row comment-box-2">
			
				<div class="col-xs-2" style="">
					<div class="dropdown">
						<img class="comment-image-2" src="/fridaycamp/public_html/<?php echo $row['img_path'];  ?>">
					</div>
				</div>

				<div class="col-xs-10" style="border-bottom: 1px solid #ddd; padding-bottom: 30px;">
					<p class="username-post">
						<span class="name-box"><a href="/fridaycamp/public_html/user/<?php echo $row['username']; ?>"><?php echo $row['username'];  ?></a></span>
					</p>

					<p class="body-box">
						<a href="/fridaycamp/public_html/post/<?php echo $row['postid'];  ?>"><?php echo $row['body'];  ?></a>
					</p>

					<p class='code-box'>
                        <a href="/fridaycamp/public_html/post/<?php echo $row['postid'];  ?>"><?php echo $row['code'];  ?></a>
					</p>
				
                    
				</div>
                    
              </div> 
      <?php }?>   
  </div>   
    
    
    
    
    
</div>  
    
    
    
    
</body>
    
    
</html>