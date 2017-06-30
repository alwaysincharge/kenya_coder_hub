<nav style="background: #fff; "><br>
            
            
<div class="nav-div-1" >
            
            
                <a href="<?php echo $_SESSION['url_placeholder']; ?>home"><img src="<?php echo $_SESSION['url_placeholder']; ?>assets/campfire.svg" height="25"></a>
                
                <a href="<?php echo $_SESSION['url_placeholder']; ?>home" class="nav-title">Friday<span style="color: black;">//</span>Camp</a>
                
                
    
    
<?php if (isset($_SESSION['admin_id'])) { ?>
    
    
    
    
                 <a href="<?php echo $_SESSION['url_placeholder']; ?>home" class="text-1"><img src="<?php echo $_SESSION['url_placeholder']; ?>assets/house.svg" height="22" width="22"></a>
    
                
    
                
                 <a class='text-1' href="<?php echo $_SESSION['url_placeholder']; ?>views/messages.php?<?php
                 
                 $list = $message->first_conversation($_SESSION['admin_id'], $_SESSION['admin_id']); 
    
                 $list_result = $list->get_result();
                
                 $first_num = $list_result->num_rows;
                    
                 if ($first_num > 0) {
                     
                 while($row = $list_result->fetch_assoc()) {
                     
                     if ($row['sender'] == $_SESSION['admin_id']) {
                         
                        echo "usersid={$row['receiver']}"; 
                         
                     } elseif ($row['receiver'] == $_SESSION['admin_id']) {
                         
                        echo "usersid={$row['sender']}";
                         
                     }
                     

                    
                 }
                     
                 } 
                         
                 else {
                     
                 echo "status=empty";
                     
                 }

                 ?>"><img src="<?php echo $_SESSION['url_placeholder']; ?>assets/mail.svg" height='22' width="22">
                  
                 <span id="main1">
                     
                 <?php
                 
                 $unread = $message->all_unread($_SESSION['admin_id']); 
    
                 $unread_result = $unread->get_result();
                
                 while($row = $unread_result->fetch_assoc()) {
                     
                     if ($row['count'] > 0) {
                         
                       echo "<span class='notif-text'>(" . $row['count'] . ")</span>";
                         
                     }
                      
                } ?>
                     
                </span>
                     
                </a>
                
                
                

    
    
                
            <a class="text-1" href="<?php echo $_SESSION['url_placeholder']; ?>views/post_notification.php"><img src="<?php echo $_SESSION['url_placeholder']; ?>assets/megaphone.svg" height="22" width="22">
                
            <span id="main2">
                
            <?php
                
                
            $my_comments = $comment->count_notif_comments($_SESSION['admin_id'], $_SESSION['admin_id']); 
    
            $my_comments_result = $my_comments->get_result();   
                    
            $numComments = $my_comments_result->num_rows;
        
            while($row1 = $my_comments_result->fetch_assoc()) {
                
        
            $my_replies = $reply->count_notif_replies($_SESSION['admin_id']); 
    
            $my_replies_result = $my_replies->get_result();   
                    
            $numReplies = $my_replies_result->num_rows;
        
            while($row2 = $my_replies_result->fetch_assoc()) {    
                
                $sum = $row1['count'] + $row2['count'];
                
                if ($sum > 0) {

                   echo "<span class='notif-text'>(" . $sum . ")</span>";
                    
                }
                
              
                
            }
                
            }
                
                  
            ?>
                       
                
                
            </span>   
                             
             
            </a>
                
                

                
                
                
    
       <div class="dropdown">
                       
       <img src="<?php echo $_SESSION['url_placeholder']; ?>backend/<?php   
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       echo $row['img_path'];

       }   ?>" height="30" width="30" class="profile-image-1" />
             
       <div class="dropdown-content" style="font-weight: bolder; ">
                
       <p style="font-family: Josefin Slab;"><?php   
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       echo $row['username'];

       }   ?></p>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>user/<?php   
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       echo $row['username'];

       }   ?>" class="profile-element">View Profile</a><br>
                        
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/mystuff.php" class="profile-element">My Stuff</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/bookmark.php" class="profile-element">Saved Posts</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/editprofilepicture.php" class="profile-element">Edit Profile Picture</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/editprofile.php" class="profile-element">Edit Info</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/editpassword.php" class="profile-element">Change Password</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/editusername.php" class="profile-element">Change Username</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>views/editemail.php" class="profile-element">Change E-mail</a><br>
                
       <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/out.php" class="profile-element">Logout</a><br>
                
       </div>     
                    
       </div>

    <?php } ?>
                
            
            
            
            
            
            

            
    <form class="search1" method="get" action="<?php echo $_SESSION['url_placeholder']; ?>views/search.php?keywords=<?php  echo $_GET['keywords'];   ?>">
                              
    <?php if (!isset($_SESSION['admin_id'])) { ?>
                  
    <a href="<?php echo $_SESSION['url_placeholder']; ?>login" class="choose-page choose-page-2">Sign Up / Login</a>
                  
    <?php } ?>
                          
    <a href="<?php echo $_SESSION['url_placeholder']; ?>write" class="choose-page choose-page-2">New Post</a>
                  
    <input maxlength="100" name="keywords" class="search-main" placeholder="Search users and skills" />
        
     <input style="display: none;" type="submit" name="submit" value="submit" />
                  
    </form><br>
            
            
 
    </div>
              
</nav>
        
    
    
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    