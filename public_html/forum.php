<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<html lang="en">
    
    
<head>
    
	<title>Tsutsus - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
    
    
    
    
<body>
    
 <div class="row div-width">
     
     
     <div class="col-md-9">
         
                     
               <form method='post' action="new_post.php"  class='forum-form'>
            
                     <textarea maxlength="500" placeholder='Do you have a question, job or story to share?' name="body" class="toggle forum-details"></textarea>
                   
                     <div class="selection" style="display: none;">
                       
                     <textarea maxlength="500" placeholder='Paste related code here.' name="code" class="toggle forum-details"></textarea>
                    
                               
                     <textarea maxlength="500" placeholder="Title of your post." name="title" class="forum-title"></textarea> <br>
               
                     <button name="submit" class="forum-post btn">Post</button>
               
                     </div> 
                       
                     <?php echo csrf_token_tag(); ?>
                   
                     <div class="selection" style="display: none;">
                   
                     <a href="index.php"><p class="forum-logout">You need to sign-in to write a post.</p>
                         
                     </a>
                   
                     </div>
   
                </form>
         
         
         
         
         
         
         
                
               
                    
                    
               
                    
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
                    
                        <img class="post-img"  src='<?php echo $row['img_path'];  ?>' />
                    
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
                    
                                        
                 
                </div> 
                    
                </div>  
                    
                <?php }
                    
                    
                ?>
                    
                    
                   

               
               
               
                    
         
         
         
         
         
         
         
         
         
                        
                       <div class="pagination-head">

                           <?php 
                           
                           if ($number_of_results <= $results_per_page)  {
                               
                               
                           } else {
                               
                                       for ($page = 1; $page <= $number_of_pages; $page++) {
                                       
        
                                       if (isset($_GET['page'])) {
                                           
                                           
                                        if ( $page == $_GET['page']) {
                                          echo "<a class='main-page'>" . $page . "</a>";  
                                       } else {
                                            echo "<a class='page-sub' href='forum.php?page={$page}'>" . $page . "</a>";
                                       }
                                       
                                           
                                       } else {
                                           if ($page == 1) {
                                               echo "<a class='main-page'>" . $page . "</a>";   
                                           } else {
                                              echo "<a class='page-sub' href='forum.php?page={$page}'>" . $page . "</a>"; 
                                           }
                                           
                                       }   

                                   }
                               
                                }
        
                                                            
                              ?> 
                           
                         </div>
                    
                    
                    

         
         
         
         
         
         
         
         
         
         
         
         
         
         
     
     
     </div>
     
     
     
     
     
     
     
     
     
     <div class="col-md-3" style="padding-bottom: 40px;">
         
          <form class="search1" method="get" action="resulting.php">
                  
              <input maxlength="100" name="keywords" style="border-radius: 5px; border: 2px solid #ddd;  padding-left: 15px; padding-top: 5px; padding-bottom: 5px; font-family: Inconsolata;
    width: 200px; margin-left: 10px;" placeholder="Search posts" />
        
              <input style="display: none;" type="submit" name="submit" value="submit" />
                  
              </form>
           
               
               <div>
               
               <br>
              <a href="forum.php"><p class="choose-page">All Posts</p></a>
               
               <br>
               
               <a href="forumpop.php" class="choose-page">Top Posts</a>
               
               </div>
     
     
     </div>
    
    
    
</div>   
    
</body>
    
    
    
    
    
     <?php include('js/general_javascript.php');  ?>  
    
</html>