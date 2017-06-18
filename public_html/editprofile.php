<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<html lang="en">
    
    
<head>
    
	<title>Tsutsus - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
    
    
    
    
    
<body>
    
    
    
        
 <?php  include("nav.php"); ?>
    
    
        
            <div style="background: white; min-height: 900px; ">
                

           

           
           
           
            <?php
            
            $all_details = $user->display_all_user_details($_SESSION['admin_id']); 
    
            $all_details_result = $all_details->get_result();   
                    
        
            while($details = $all_details_result->fetch_assoc()) { ?>
           
           
           
           
           
           
            <form method="post" action="editprofilecode.php" enctype="multipart/form-data">
           

                   
                   
                   
               
            <p class="head-of-form">Edit Your Profile</p>
               
               
           
               
               
               
               
            <div class="row form-box">
                       
            <div class="col-xs-6">
                
            <textarea maxlength="1000" class="input-1" name="fullname" placeholder="full name"><?php echo $details['fullname'];   ?></textarea>

            </div>
           
           
           
            <div class="col-xs-6"> 
                

                
            <textarea maxlength="1000" class="input-2" placeholder="tell us a little about yourself" name="story"><?php echo $details['story'];   ?></textarea>
                
            <textarea maxlength="1000"  style="height: 1px; border: 2px solid white;"></textarea>
               
            </div>
           
           
            </div>
           
           
           
           
           
           
           
           
        
           
              
           
            <div class="row form-box">
               
            <p class="form-heading-1">List your skills in simple terms (PHP, Javascript, Java).</p>
           
           
               
               
            <div class="col-xs-6">
                
            <textarea maxlength="25" class="input-1" placeholder="skill 1" name="skill1"><?php echo $details['skill1'];   ?></textarea>
                
            <textarea maxlength="25" class="input-1" name="skill3" placeholder="skill 3"><?php echo $details['skill3'];   ?></textarea>
                
            <textarea maxlength="25" class="input-1" name="skill5" placeholder="skill 5"><?php echo $details['skill5'];   ?></textarea>
                
            <textarea maxlength="25" class="input-1" name="skill7" placeholder="skill 7"><?php echo $details['skill7'];   ?></textarea>
               
            </div>
           
           
           
               
               
            <div class="col-xs-6">
                
            <textarea maxlength="25" class="input-1" name="skill2" placeholder="skill 2"><?php echo $details['skill2'];   ?></textarea>
                
            <textarea maxlength="25" class="input-1" name="skill4" placeholder="skill 4"><?php echo $details['skill4'];   ?></textarea>
                
            <textarea maxlength="25" class="input-1" name="skill6" placeholder="skill 6"><?php echo $details['skill6'];   ?></textarea>
                
            <textarea maxlength="25" class="input-1" name="skill8" placeholder="skill 8"><?php echo $details['skill8'];   ?></textarea>
                
            </div>
           
           
           
           
           </div>
           
           
           
           
           
           
           
           
           
           
        <div class="row form-box">
                                         
            
            
            <p class="form-heading-1">List projects you have work on and provide some links.</p>
            
           
            <div class="col-xs-6" style="">
                
                <p style="font-family: georgia;">Project 1</p>
                
                <textarea maxlength="200" class="input-1" placeholder="project name" name="project1"><?php echo $details['project1'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="link" name="link1"><?php echo $details['link1'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what was your contribution?" name="desc1"><?php echo $details['desc1'];   ?></textarea>
                            
            
                <p style="font-family: georgia;">Project 3</p>
                
                <textarea maxlength="200" class="input-1" placeholder="project name" name="project3"><?php echo $details['project3'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="link" name="link3"><?php echo $details['link3'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what was your contribution?" name="desc3"><?php echo $details['desc3'];   ?></textarea>
                            
            </div>
                          
                          
            <div class="col-xs-6" style="">
                
                <p style="font-family: georgia;">Project 2</p>
                
                <textarea maxlength="200" class="input-1" placeholder="project name" name="project2"><?php echo $details['project2'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="link" name="link2"><?php echo $details['link2'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what was your contribution?" name="desc2"><?php echo $details['desc2'];   ?></textarea>
                            
            
                <p style="font-family: georgia;">Project 4</p>
                
                <textarea maxlength="200" class="input-1" placeholder="project name" name="project4"><?php echo $details['project4'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="link" name="link4"><?php echo $details['link4'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what was your contribution?" name="desc4"><?php echo $details['desc4'];   ?></textarea>
                            
            </div>
           
        
           
        </div>
           
           
           
           
           
           
           
           
           
           
           
           
                      
        <div class="row form-box">
                                         
            
            
            <p class="form-heading-1">List projects you have work on and provide some links.</p>
            
           
            <div class="col-xs-6" style="">
                
                <p style="font-family: georgia;">School 1</p>
                
                <textarea maxlength="200" class="input-1" placeholder="school name" name="school1"><?php echo $details['school1'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="qualification" name="diplo1"><?php echo $details['diplo1'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what did you learn?" name="learn1"><?php echo $details['learn1'];   ?></textarea>
                            
            
                <p style="font-family: georgia;">School 3</p>
                
                <textarea maxlength="200" class="input-1" placeholder="school name" name="school3"><?php echo $details['school3'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="qualification" name="diplo3"><?php echo $details['diplo3'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what did you learn?" name="learn3"><?php echo $details['learn3'];   ?></textarea>
                
                
                <button name="submit" class="btn" style="font-family: georgia;">Submit</button>
                            
            </div>
                          
                          
            <div class="col-xs-6" style="">
                
                <p style="font-family: georgia;">School 2</p>
                
                <textarea maxlength="200" class="input-1" placeholder="school name" name="school2"><?php echo $details['school2'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="qualification" name="diplo2"><?php echo $details['diplo2'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what did you learn?" name="learn2"><?php echo $details['learn2'];   ?></textarea>
                            
            
                <p style="font-family: georgia;">School 4</p>
                
                <textarea maxlength="200" class="input-1" placeholder="school name" name="school4"><?php echo $details['school4'];   ?></textarea>
                
                <textarea maxlength="200" class="input-1" placeholder="qualification" name="diplo4"><?php echo $details['diplo4'];   ?></textarea>
                
                <textarea maxlength="200" class="input-2" placeholder="what did you learn?" name="learn4"><?php echo $details['learn4'];   ?></textarea>
                            
            </div>
           
        
           
        </div>
           
               
               
               
               
               
               
               
                   
                   

           
           
           </form>
           
           
           
           
          <?php }?>
           
           

           
           
           
           
           
           
           
           
           
                      
<br><br><br>
           
    
       </div>
        
        


    
    
    
</body>
    
    
    
</html>