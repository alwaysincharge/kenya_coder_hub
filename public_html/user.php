
<?php  include_once(dirname(__FILE__) . '\\' . '../includes/all_classes_and_functions.php');  ?>


<?php $_SESSION['realredirect1'] = $_SERVER['REQUEST_URI']; ?>


<!DOCTYPE html>




<html lang="en">
    
    
<head>
    
	<title>Tsutsus - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
 
    
    
    
<body>

<?php  include("nav.php"); ?>


<div style="background: white; min-height: 900px;">
    
    
    

                
       <div class="row" style="background: white; padding-top: 20px; width: 100%; max-width: 900px; display: table; margin: 0 auto; padding: 20px;">   
        
           
        
        
           
           <div class="col-md-6" style=" min-height: 400px; border-radius: 2px;">
               

                   
               
               
               <?php
            
               $all_details = $user->display_all_user_details_by_user($_GET['person']); 
    
               $all_details_result = $all_details->get_result();   
                    
               while($details = $all_details_result->fetch_assoc()) { ?>
                          
             
               <div class="row">
                   
               
               <div class="col-xs-6">
                
                   <img  src="/fridaycamp/public_html/<?php echo $details['img_path'];  ?>" width="170" style="border-radius: 5px; margin-top: 30px; display: table; margin: 0 auto; " />
                   
                </div>
               
               
                   
                <div class="col-xs-6">
                    
                    <p class="fullname-user"><?php echo $details['fullname'];   ?></p>
                    
                    <p class="username-user"><?php echo $details['username'];   ?></p>
                    
                    <p class="email-user"><?php echo $details['email'];   ?></p>
                    
                    
                      <?php if ((isset($_SESSION['admin_id'])) && ($details['id'] == $_SESSION['admin_id']) ) { ?>
                   
                     <button name="submit" class="btn" style="font-family: georgia;"><a href="editprofile.php">Edit Profile</a></button>   
                       
                     <?php }  ?>
                    
                    
                    
                      <?php if ((isset($_SESSION['admin_id'])) && ($details['id'] != $_SESSION['admin_id']) ) { ?>
                   
                     <button name="submit" class="btn" style="font-family: georgia;"><a href="messages.php?usersid=<?php echo $details['id']; ?>">Send Message</a></button>   
                       
                     <?php }  ?>
                     
                    
                </div>
                       
                   
               </div>
               
               
               
               
               
              <p class="story-style" style="<?php if ($details['story'] != '') { echo "margin-top: 20px;";} ?>"><?php echo $details['story'];   ?></p>
               
               
               
               
               
               
              <?php if ($details['skill1'] != '') { ?>
                   
              <p class="head-subject">Skills</p>   
                       
              <?php }  ?>
               
               
              
               
              <div class="row">
                
               
              <div class="col-xs-6" style="<?php if ($details['skill1'] != '') { echo "margin-bottom: 30px;";} ?>">
                  
                  
                   
              <?php if ($details['skill1'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill1'];   ?></p> 
                       
              <?php }  ?>
                  
                  
                  
                  
              <?php if ($details['skill3'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill3'];   ?></p> 
                       
              <?php }  ?>
                  
                  
                  
                  
              <?php if ($details['skill5'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill5'];   ?></p> 
                       
              <?php }  ?>
                  
                  
                  
              <?php if ($details['skill7'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill7'];   ?></p> 
                       
              <?php }  ?>
                  
                  

                   
               </div>
               
               
               
               
              <div class="col-xs-6" style="<?php if ($details['skill2'] != '') { echo "margin-bottom: 30px;";} ?>">
                   

              <?php if ($details['skill2'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill2'];   ?></p> 
                       
              <?php }  ?>
                   
                   
                   
              <?php if ($details['skill4'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill4'];   ?></p> 
                       
              <?php }  ?>
                   
                   
                   
              <?php if ($details['skill6'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill6'];   ?></p> 
                       
              <?php }  ?>
                   
                   
                   
              <?php if ($details['skill8'] != '') { ?>
                   
              <p class="skill-style"><?php echo $details['skill8'];   ?></p> 
                       
              <?php }  ?>
                   
                   
                   
               </div>
               
               </div>
          

               
               
               
               
               
              <?php if ($details['project1'] != '') { ?>
                   
              <p class="head-subject">Projects</p>   
                       
              <?php }  ?>
  
               <div class="div-div">
               <p class="tab-1"><?php echo $details['project1'];   ?></p>
               <p class="tab-2"><a href="<?php echo $details['link1'];   ?>"><?php echo $details['link1'];   ?></a></p>
               <p class="tab-2"><?php echo $details['desc1'];   ?></p>
               </div>
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['project2'];   ?></p>
               <p class="tab-2"><a href="<?php echo $details['link2'];   ?>"><?php echo $details['link2'];   ?></a></p>
               <p class="tab-2"><?php echo $details['desc2'];   ?></p>
               </div>
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['project3'];   ?></p>
               <p class="tab-2"><a href="<?php echo $details['link3'];   ?>"><?php echo $details['link3'];   ?></a></p>
               <p class="tab-2"><?php echo $details['desc3'];   ?></p>
               </div>
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['project4'];   ?></p>
               <p class="tab-2"><a href="<?php echo $details['link4'];   ?>"><?php echo $details['link4'];   ?></a></p>
               <p class="tab-2"><?php echo $details['desc4'];   ?></p>
               </div>
               
               
               
                 

               
            
               

               
               
              <?php if ($details['school1'] != '') { ?>
                   
              <p class="head-subject">Education</p>   
                       
              <?php }  ?>
               
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['school1'];   ?></p>
               <p class="tab-2"><?php echo $details['diplo1'];   ?></p>
               <p class="tab-2"><?php echo $details['learn1'];   ?></p>
               </div>
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['school2'];   ?></p>
               <p class="tab-2"><?php echo $details['diplo2'];   ?></p>
               <p class="tab-2"><?php echo $details['learn2'];   ?></p>
               </div>
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['school3'];   ?></p>
               <p class="tab-2"><?php echo $details['diplo3'];   ?></p>
               <p class="tab-2"><?php echo $details['learn3'];   ?></p>
               </div>
               
               
               <div class="div-div">
               <p class="tab-1"><?php echo $details['school4'];   ?></p>
               <p class="tab-2"><?php echo $details['diplo4'];   ?></p>
               <p class="tab-2"><?php echo $details['learn4'];   ?></p>
               </div>
                   
                   

               
           
               <?php } ?>
            
               

                         
               
           </div>
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           <div class="col-md-6" style="min-height: 400px; border-radius: 2px; padding-left: 60px;">
           
             <?php
            
            $these_posts = $post->get_users_post($_GET['person']); 
    
            $these_posts_result = $these_posts->get_result();   
                    
        
            while($row = $these_posts_result->fetch_assoc()) { ?>
           
                <div class="row single-post">
                    
                    
                <div class="col-xs-2" style="">   
                    
                    <div>
                    
                        <img class="post-img"  src="/fridaycamp/public_html/<?php echo $row['img_path'];  ?>" />
                
                    </div> 
                    
                </div>
                    
                    
                <div class="col-xs-10">
                    
                    
                <p class="title-username">
                        
                <span class="post-username"><a><?php echo $row['username'];  ?></a></span>
                        
                <a href='../post/<?php echo $row['forumid']; ?>' class="post-title"> <?php echo substr($row['title'], 0, 80); if (strlen($row['title']) > 70) {echo "...";}  ?></a>
                    
                </p>
                    
                    
                <p class="post-body">  <a href='../post/<?php echo $row['forumid']; ?>' style="color: black;"><?php echo substr($row['body'], 0, 300); if (strlen($row['body']) > 260) {echo "...";}  ?></a> </p>
                    
                    
                    
                    
                    
                    
                    
                    <?php
                         
                    if ((isset($_SESSION['admin_id'])) && ($_SESSION['admin_id'] == $row['owner'])) { ?>
                                                                     
                    <a href="/fridaycamp/public_html/edit_post.php?forum=<?php echo $row['forumid']; ?>" class="form-call">Edit</a> //
                    <a class="toggle form-call">Delete</a> 
                    
                    
                    
                       <div class="selection" style="display: none; font-family: georgia;">
                         
                        <form method="post" action="/fridaycamp/public_html/delete_post.php?id=<?php echo $row['forumid']; ?>"><br>
                        
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
           
           
           
           
           
           
           
           
           
           
           
        
        
       </div> 
    
       </div>
    
    </body>
    
         <?php include('js/general_javascript.php');  ?>  
    
</html>