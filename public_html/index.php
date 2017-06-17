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
    
    
 <div class="row div-width">
     
     
     
     <?php if (!isset($_GET['keywords'])) { ?>
     
      <p class="home-head">Connect with the top Programmers in Kenya.</p>
     
     <?php } ?>
     
     
     
     
     
     <?php if (isset($_GET['keywords'])) { 
     
        $search_posts2 = $search->search_through_posts('%' . $_GET['keywords'] . "%", '%' . $_GET['keywords'] . "%"); 
    
        $search_posts_result2 = $search_posts2->get_result();
                                                         
        echo "<p class='home-head'>Showing {$search_posts_result2->num_rows} results for '{$_GET['keywords']}'.</p>";
     
     } ?>
     
     
    

            
        
        <?php  
    
        if (isset($_SESSION['note1'])) {
        echo "<div style='display: table; margin: 0 auto; margin-top: -30px;'>{$_SESSION['note1']}</div>";  
            $_SESSION['note1'] = null;
        }   else {
            $_SESSION['note1'] = null;
        }
        ?>
            
            
        
     
     
     
     <div class="col-md-9">
         
         
         
         
         
         
         
         
               <form method='post' action="new_post.php"  class='forum-form'>
            
                     <textarea maxlength="500" placeholder='Do you have a question, job or story to share?' name="body" class="toggle forum-details"></textarea>
                   
                     <div class="selection" style="display: none;">
                       
                     <textarea maxlength="500" placeholder='Paste related code here.' name="code" class="toggle forum-details"></textarea>
                    
                               
                     <textarea maxlength="500" placeholder="Title of your post." name="title" class="forum-title"></textarea> <br>
               
                     <button name="submit" class="forum-post btn">Post</button>
               
                     </div> 
                       
                     
                   
                     <div class="selection" style="display: none;">
                   
                     <a href="index.php"><p class="forum-logout">You need to sign-in to write a post.</p>
                         
                     </a>
                   
                     </div>
                   
                     <br><br>
                   
                </form>
         
         
         
         
         
         

         
         
               <?php if ((isset($_GET['state'])) &&   ($_GET['state'] == 'all')) { ?>
                    
               <?php
         
           
               $results_per_page = 3;
         
         
         
               if (!isset($_GET['page'])) {
                   
               $page = 1;
                   
               } else {
                   
               $page = $_GET['page'];
                   
               }
         
         
         
               $first_result = ($page - 1) * $results_per_page;
         
               $pagination = $post->all_posts();
         
               $pagination_result = $pagination->get_result();
         
               $number_of_results = $pagination_result->num_rows;
         
               $number_of_pages = ceil($number_of_results/$results_per_page);
    
         
         
         
                    
                $allposts = $post->posts_paginated($first_result, $results_per_page); 
    
                $allposts_result = $allposts->get_result();   
                    
        
                while($row = $allposts_result->fetch_assoc()) { ?>
         
         
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
                    
                <?php }
                    
                    
                ?>
                    
                    
                <?php }
                    
                    
                ?>

               
               
               
                 
         
         
         
         
         
         
         
               <?php if (($_GET['state'] != 'all') && (!isset($_GET['keywords']))) { ?>
   
               <?php
    
    
               $results_per_page = 3;
         
    
               if (!isset($_GET['page'])) {
                   
               $page = 1;
                   
               } else {
                   
               $page = $_GET['page'];
                   
               }
         
         
               $first_result = ($page - 1) * $results_per_page;
         
               $pagination = $post->all_popular_posts();
         
               $pagination_result = $pagination->get_result();
         
               $number_of_results = $pagination_result->num_rows;
         
               $number_of_pages = ceil($number_of_results/$results_per_page);
    
         
         
            
                $allpopularposts = $post->all_popular_posts_pagination($first_result, $results_per_page); 
    
                $allpopularposts_result = $allpopularposts->get_result();   
                    
        
                while($popularrow = $allpopularposts_result->fetch_assoc()) { ?>
         
         
                <div class="row single-post">
                    
                    
                <div class="col-xs-2" style="">   
                    
                    <div class="dropdown">
                    
                        <img class="post-img"  src="<?php echo $popularrow['img_path'];  ?>" />
                    
                        <div class='dropdown-content post-drop'>
                   
                        </div>
                        
                    </div>
                       
                </div>
                    
                    
                <div class="col-xs-10">
                    
                    
                <p class="title-username">
                        
                <span class="post-username"><a href="/fridaycamp/public_html/user/<?php echo $popularrow['username']; ?>"><?php echo $popularrow['username'];  ?></a></span>
                        
                <a href='post/<?php echo $popularrow['id']; ?>' class="post-title"> <?php echo substr($popularrow['title'], 0, 80); if (strlen($popularrow['title']) > 70) {echo "...";}  ?></a>
                    
                </p>
                    
                    
                <p class="post-body">  <a href='post/<?php echo $popularrow['id']; ?>' style="color: black;"><?php echo substr($popularrow['body'], 0, 300); if (strlen($popularrow['body']) > 260) {echo "...";}  ?></a> </p>
                    
                    
                <?php    
                    
                $num_comments = $comment->get_number_of_comments($popularrow['id']); 
    
                $num_comments_result = $num_comments->get_result();   
                    
        
                while($num2 = $num_comments_result->fetch_assoc()) { ?>
                                        
                <p class="comment-1"><span class="glyphicon glyphicon-comment" style="color: #ddd;"></span><span class="comment-2"><?php echo $num2['count'];  ?></span></p>
                    
                    
                <?php }?>    
                    
                </div> 
                    
                </div>  
                    
                <?php }
                    
                    
                ?>
         
                 <?php  } ?>
         
         
         
         
         
         
    
                <?php if (isset($_GET['keywords'])) { ?>
                    
                <?php
         
                    
                $search_posts = $search->search_through_posts('%' . $_GET['keywords'] . "%", '%' . $_GET['keywords'] . "%"); 
    
                $search_posts_result = $search_posts->get_result();   
                    
        
                while($rowsearch = $search_posts_result->fetch_assoc()) { ?>
         
         
                <div class="row single-post">
                    
                    
                <div class="col-xs-2" style="">   
                    
                    <div class="dropdown">
                    
                        <img class="post-img"  src="<?php echo $rowsearch['img_path'];  ?>" />
                    
                        <div class='dropdown-content post-drop'>
                   
                        </div>
                        
                    </div>
                       
                </div>
                    
                    
                <div class="col-xs-10">
                    
                    
                <p class="title-username">
                        
                <span class="post-username"><a href="/fridaycamp/public_html/user/<?php echo $rowsearch['username']; ?>"><?php echo $rowsearch['username'];  ?></a></span>
                        
                <a href='post/<?php echo $rowsearch['id']; ?>' class="post-title"> <?php echo substr($rowsearch['title'], 0, 80); if (strlen($rowsearch['title']) > 70) {echo "...";}  ?></a>
                    
                </p>
                    
                    
                <p class="post-body">  <a href='post/<?php echo $rowsearch['id']; ?>' style="color: black;"><?php echo substr($rowsearch['body'], 0, 300); if (strlen($rowsearch['body']) > 260) {echo "...";}  ?></a> </p>
                    
                    
                <?php    
                    
                $num_comments = $comment->get_number_of_comments($rowsearch['id']); 
    
                $num_comments_result = $num_comments->get_result();   
                    
        
                while($num = $num_comments_result->fetch_assoc()) { ?>
                                        
                <p class="comment-1"><span class="glyphicon glyphicon-comment" style="color: #ddd;"></span><span class="comment-2"><?php echo $num['count'];  ?></span></p>
                    
                    
                <?php }?>    
                    
                </div> 
                    
                </div>  
                    
                <?php }
                    
                    
                ?>
                    
                    
                <?php }
                    
                    
                ?>

         
    
         
         
         
         
         
         
         
         
         
                       <?php
         
                       if (!isset($_GET['keywords'])) { ?>
                        
                       <div class="pagination-head">

                           <?php 
                           
                           if ($number_of_results <= $results_per_page)  {
                               
                               
                           } else {
                               
                                       for ($page = 1; $page <= $number_of_pages; $page++) {
                                       
        
                                       if (isset($_GET['page'])) {
                                           
                                           
                                        if ( $page == $_GET['page']) {
                                          echo "<a class='main-page'>" . $page . "</a>";  
                                       } else {
                                            
                                            if ($_GET['state'] == 'all') {
                                                echo "<a class='page-sub' href='index.php?state=all&page={$page}'>" . $page . "</a>";
                                            } else {
                                                echo "<a class='page-sub' href='index.php?page={$page}'>" . $page . "</a>";
                                            }
                                            
                                            
                                            
                                       }
                                       
                                           
                                       } else {
                                           if ($page == 1) {
                                               echo "<a class='main-page'>" . $page . "</a>";   
                                           } else {
                                                if ($_GET['state'] == 'all') {
                                                echo "<a class='page-sub' href='index.php?state=all&page={$page}'>" . $page . "</a>";
                                            } else {
                                                echo "<a class='page-sub' href='index.php?page={$page}'>" . $page . "</a>";
                                            }
                                           }
                                           
                                       }   

                                   }
                               
                                }
        
                                                            
                              ?> 
                           
                         </div>
                    
                       <?php }
                    
                    
                    ?>
                    

         
         
         
         
         
         
         
         
         
         
         
         
         
         
     
     
     </div>
     
     
     
     
     
     
     
     
     
     <div class="col-md-3" style="padding-bottom: 40px;">
         
         
              <form class="search1" method="get" action="index.php?search=<?php echo $_GET['keywords'];  ?>">
                  
              <input maxlength="100" name="keywords" class="home-search" placeholder="Search posts" />
        
              <input style="display: none;" type="submit" name="submit" value="submit" />
                  
              </form>
           
         
         
               
               <div>
               
               <br>
                   
               <a href="index.php"><p class="choose-page" style="<?php if (($_GET['state'] != 'all') && (!isset($_GET['keywords']))) { echo "width: 95px;"; }   ?>">Top Posts 
                  
               <?php if (($_GET['state'] != 'all') && (!isset($_GET['keywords']))) { echo "<i class='fa fa-check' aria-hidden='true'></i>"; }   ?></p></a>
               
               <br>
                   
                   
                   
               
               <a href="index.php?state=all" class="choose-page">All Posts <?php if ($_GET['state'] == 'all') { echo "<i class='fa fa-check' aria-hidden='true'></i>"; }   ?></a>
               
               </div>
     
     
     </div>
    
    
    
</div>   
    
</body>
    
    
    
    
    
     <?php include('js/general_javascript.php');  ?>  
    
</html>