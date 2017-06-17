    
    
    
    
            
        
        <nav style="background: #fff; " ><br>
            
            
            
            
            
            <div style="width: 100%; max-width: 1000px; margin: 0 auto; padding-bottom: 10px; margin-bottom: 60px; border-bottom: 2px solid #ddd;" >
            
            
            
            
        
                <a href="/jjj/forum"><img src="/fridaycamp/public_html/assets/campfire.svg" height="40"></a>
                
                <a href="/fridaycamp/public_html/home" style="font-family: Josefin Slab; color: blue; margin-left: 20px; font-weight: bolder; font-size: 22px;">Friday Camp</a>
                
                

                         
                <div class="dropdown">
    
                <a class="text-1" style="font-weight: bolder; text-decoration: underline;">Login / Sign-up</a>
            
                </div>
                
                
    
                
                 <a href="/fridaycamp/public_html/home" class="text-1"><img src="/fridaycamp/public_html/assets/house.svg" height="30"></a>
                
                
        
                     
                 <a class='text-1' href='messages.php?<?php
                 
                 $list = $message->first_conversation($_SESSION['admin_id'], $_SESSION['admin_id']); 
    
                 $list_result = $list->get_result();
                
                 $first_num = $list_result->num_rows;
                    
                 if ($first_num > 0) {
                     
                 while($row = $list_result->fetch_assoc()) {
                     
                 echo "usersid={$row['usersid']}";
                    
                 }
                     
                 } 
                     
                 
                     
                 else {
                     
                 echo "status=empty";
                     
                 }


                  ?>'><img src='/fridaycamp/public_html/assets/mail.svg' height='30'></a>
                     
                 
                
                
                
                
                 <a class="text-1" href="notif.php"><img src="/fridaycamp/public_html/assets/megaphone.svg" height="30"></a>
            
            
            
            
            <div class="dropdown">
                

                
                
              <img src="/fridaycamp/public_html/<?php   
     
     
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       echo $row['img_path'];

       }   ?>" height="40" width="40" style="margin-left: 10px; border-radius: 5px; font-family: Josefin Slab;" />
             
            <div class="dropdown-content" style="font-weight: bolder; ">
                
                            <p style=" font-family: Josefin Slab;"><?php   
     
     
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       echo $row['username'];

       }   ?></p>
                
                            <a href="user.php?person=<?php   
     
     
     
       $newusername = $user->find_one_user($_SESSION['admin_id']); 
    
       $newusername_result = $newusername->get_result();   
                    
       while($row = $newusername_result->fetch_assoc()) { 

       echo $row['username'];

       }   ?>" style="font-family: Josefin Slab;">View Profile</a><br>
                
                
                
                
                
                
                
                
                
                
                                 <a href="mystuff.php" style="font-family: Josefin Slab;">My Stuff</a><br>
                
                
                <a href="saves.php" style="font-family: Josefin Slab;">Saved Posts</a><br>
                
                            <a href="editprofilepicture.php" style="font-family: Josefin Slab;">Edit Profile Picture</a><br>
                            <a href="editprofile.php" style="font-family: Josefin Slab;">Edit Info</a><br>
                            <a href="editpassword.php" style="font-family: Josefin Slab;">Change Password</a><br>
                            <a href="editusername.php" style="font-family: Josefin Slab;">Change Username</a><br>
                            <a href="editemail.php" style="font-family: Josefin Slab;">Change E-mail</a><br>
                            <a href="logout.php" style="font-family: Josefin Slab;">Logout</a><br>
        
            </div>     
                    
                    
                    
               
            
                


            </div>

            
            
            
            
            
            
            

            
              <form class="search1" method="get" action="search.php?keywords=<?php  echo $_GET['keywords'];   ?>">
                  
              <input maxlength="100" name="keywords" class="search-main" placeholder="Search users and skills" />
        
              <input style="display: none;" type="submit" name="submit" value="submit" />
                  
              </form>
            

            <br>
            
            
           
        
            
            
            
            </div>
            
            
            
            
        
        </nav>
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    