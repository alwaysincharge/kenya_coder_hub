<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


     <?php if (isset($_SESSION['admin_id'])) { 
                  
     redirect_to('home');
                  
     } ?>



<!DOCTYPE html>




<html lang="en">
    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
 
    
    
    
<body class="body-main">
        
                
    
        <nav style="width: 70%; max-width: 900px; margin: 0 auto; padding-top: 20px;"><br>
            
               <img src="assets/campfire.svg" height="40">
            
               <a href="home" style="font-family: Josefin Slab; color: white; font-weight: bolder; margin-left: 20px; font-size: 20px; margin-left: 6px;">Friday<span style="color: white;">//</span>Camp</a>
             
        </nav>
        
    
        
        
        
        
        
        
        
        <div style="display: table; margin: 0 auto;">
            
        <?php  
    
        if (isset($_SESSION['note1'])) {
            
        echo $_SESSION['note1'];  
            
            $_SESSION['note1'] = null;
            
        }   else {
            
            $_SESSION['note1'] = null;
            
        }
            
        ?>
            
            
        </div>

        
        
        
        
        
        
        
        <div style="width: 100%; max-width: 1200px; display: table; margin: 0 auto;">
            
            
        <br><br><br>
            
            
        <div class="row" style="width: 100%; max-with: 900px;">
            
            
            
            <div class="col-xs-4">
                
                 <p class="bigtext1">Kenya's whole tech community,</p>
                
                 <p class="bigtext1">all on one website.</p>
                
                 <br>
                
                 <h5 class="bigtext2">Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.</h5>
                
                 <br><br>
                
            </div>
            
            
            
            
            
            <div class="col-xs-4">
                
                    <!-- Sign In  -->
                
                    <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/sign_in.php" enctype="multipart/form-data">
                        
                    <h5 class="smalltext1">Login below.</h5>
                            
                    <input placeholder="username" type="text" name="username" class="form1">
                
                    <input placeholder="password" type="password" name="password" class="form1">
            
                    <button class="form1" style="font-family: Josefin Slab; font-weight: bolder;" type="submit" name="submit" value="submit">Submit</button>
                        
                    </form>   
                
                

                    <!-- Forgot Password  -->
                
                    <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/reclaim_password.php"  enctype="multipart/form-data">
                     
                    <h5 class="smalltext-x toggle">Forgot password?</h5>
                        
                    <div class="selection"  style="display: none;">
                         
                    <input placeholder="username" type="text" name="username" class="form1">
            
                    <button class="form1" style="font-family: Josefin Slab; font-weight: bolder; margin-top: -30px;" type="submit" name="submit" value="submit">Reclaim Password</button>
                        
                    </div>
                 
                    </form>
                
                 
            </div>
            
            
            
            
            
            <div class="col-xs-4">
                
                <!-- Sign Up  -->
                
                <form method="post" action="<?php echo $_SESSION['url_placeholder']; ?>backend/sign_up.php" enctype="multipart/form-data">
                          
                <h5 class="smalltext1">Sign Up below.</h5>
               
                
                <input placeholder="username" type="text" class="form1" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username'];}  ?>">
                
                <input placeholder="password" type="password" class="form1" name="password">
                
                <input placeholder="confirm password" type="password" class="form1" name="passwordagain">
                    
                <input placeholder="e-mail" type="email" class="form1" name="email">
                
                    
                
                <div class="toggle">
                    
                <button class="form1" style="font-family: Josefin Slab; font-weight: bolder;" type="submit" name="submit" style="margin-bottom: 10px;">Submit</button>   
                    
                </div>

                    
                    
                <div class="selection" style="display: none;">
                    
                <p class='creating'>Creating profile...</p>
                    
                </div>
                
                
                <br><br><br>
                
                </form>

        
            </div>
                  
            
        </div>
           
        <br>
        </div>
        
        
        
        
        
        
        
        
        
        
     <div style="background: white;"> 
         
         
         
         <div class="row" style="width: 80%; margin: 0 auto; ">
             
             
             
             
         
             <div class="col-md-4">
                 
                 <div class="profile1">
                 
                    <img src="assets/pic1.jpg" class="profile-pic">
             
                    <p class="profile-name">James Villini</p>
                     
                    <p class="profile-info">I am a mean stack evangelist and avid coffee connoisseur.</p>
                     
                    <br>
                     
                     <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/sample_deflect.php"><button class="formx">View Profile</button></a> <br>
                
                     <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/sample_deflect.php"><button class="formx">Send Message</button></a> <br>
                                     
                 
                 </div>
                 
             </div>
             
             
             
             
             
             
             
             
             
             
             
             <div class="col-md-4">
                 
                 <div class="profile1">
                 
                    <img src="assets/pic2.jpg" class="profile-pic">
             
                    <p class="profile-name">Sarah Bright</p>
                     
                    <p class="profile-info">I am a PHP developer in Westlands, Nairobi who loves to code in OOP.</p>
                     
                    <br>
                     
                     <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/sample_deflect.php"><button class="formx">View Profile</button></a> <br>
                
                     <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/sample_deflect.php"><button class="formx">Send Message</button></a> <br>
                                     
                 
                 </div>
                 
             </div>
             
             
             
             
             
             
             
             
             
            <div class="col-md-4">
                 
                 <div class="profile1">
                 
                    <img src="assets/pic3.jpg" class="profile-pic">
             
                    <p class="profile-name">May Fayfex</p>
                     
                    <p class="profile-info">I've been coding in Java for 10 years and have developed 12 android apps.</p>
                     
                    <br>
                     
                     <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/sample_deflect.php"><button class="formx">View Profile</button></a> <br>
                
                     <a href="<?php echo $_SESSION['url_placeholder']; ?>backend/sample_deflect.php"><button class="formx">Send Message</button></a> <br>
                                     
                 
                 </div>
                 
             </div>
             
             
             
                 
         
</div> 
        
<br><br><br>
         
</div>   
        
        
        
        
        
        
        
        
        
        
    
    
</body>
    
    
<?php include('../js/general_javascript.php');  ?>
           
    
</html>