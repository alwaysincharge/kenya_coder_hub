<?php  include_once('../includes/all_classes_and_functions.php');  ?>


<?php $session->if_not_logged_in('login'); ?>


<?php if(!isset($_GET['state'])) {$_GET['state'] = '';} ?>



<html lang="en">
    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
    
    
 <?php  include("nav.php"); ?>
    
    
    
<div class="row" style="width: 100%; max-width: 1300px; display: table; margin: 0 auto;">
    
    
    
    
    
  <div class="col-md-12" style="display: table; margin: 0 auto;">
      
  <p class="home-head">Your saved posts.</p>
      
      
            <?php  
    
            if (isset($_SESSION['note1'])) {
                
            echo "<div style='display: table; margin: 0 auto; margin-top: -30px; margin-bottom: 20px;'>{$_SESSION['note1']}</div>";  
                
            $_SESSION['note1'] = null;
                
            }   else {
                
            $_SESSION['note1'] = null;
                
            }
                
            ?>
      
      
      
      
      
            <?php
      
            $mybookmarks = $bookmark->my_bookmarks($_SESSION['admin_id']); 
    
            $mybookmarks_result = $mybookmarks->get_result();   
            
            $numPosts = $mybookmarks_result->num_rows;
      
            if ($numPosts == 0) {
                
            echo "<p style='display: table; margin: 0 auto; font-family: georgia;'>No bookmarks yet.</p>";
                
            }
        
            while($row = $mybookmarks_result->fetch_assoc()) { ?>
      
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
                    
                <a href="/fridaycamp/public_html/delete_bookmark.php?forumid=<?php echo $row['id']; ?>" class="form-call">Unsave</a> //
                    
                </div> 
                    
                </div> 
      
                <?php }?>    
      
  </div>
    
    
    
    
    

    
    
    
</div>  
    
    
    
    
</body>
    
    
<?php include('js/general_javascript.php');  ?>  
    
    
</html>