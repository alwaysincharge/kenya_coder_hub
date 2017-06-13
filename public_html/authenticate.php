<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<!DOCTYPE html>




<html lang="en">
    
    
<head>
    
	<title>Tsutsus - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
 
    
    
    
<body class="body-main">
        
                

        
        
        <nav style="width: 70%; max-width: 900px; margin: 0 auto; padding-top: 20px;"><br>
            
            
               <img src="assets/logo.svg" height="40">

               <a class="text-1">Tsutsus</a>
            
               <a class="text-1">Forum</a>
            
               <div class="dropdown">
    
                    <a class="text-1" style="font-weight: bolder; text-decoration: underline;">Login Here</a>
            
                    <div class="dropdown-content">
                
                    <p class="smalltext6">Fill the form to sign in.</p>
                    
                 
                    <form method="post" action="sign_in.php" enctype="multipart/form-data">
                         
                        
                    <input placeholder="username" type="text" name="username" class="form2">
                
                    <input placeholder="password" type="password" name="password" class="form2">
            
                    <button class="form2" type="submit" name="submit" value="submit">Log into Doc 95</button>
                        
                 
                    
                    </form>   

                    </div>
            
            
                </div>
              
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

        
        
        
        
        
        
        
        <div style="width: 70%; max-width: 900px; margin: 0 auto;">
            
            
        <br><br><br>
        <div class="row" style="width: 100%; max-with: 900px;">
            
            
            
            <div class="col-xs-5">
                
                 <p class="bigtext1">Kenya's whole tech community,</p>
                
                 <p class="bigtext1">all on one website.</p>
                
                 <br>
                
                 <h5 class="bigtext2">Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.</h5>
                
                 <br><br>
                
            </div>
            
            
            
            
            
            <div class="col-xs-2">
                
                 
            </div>
            
            
            
            
            
            <div class="col-xs-5">
                
                
                
                <form method="post" action="sign_up.php" enctype="multipart/form-data">
                          
                <h5 class="smalltext1">You should join us. Sign Up below.</h5>
               
                
                <input placeholder="username" type="text" class="form1" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username'];}  ?>">
                
                <input placeholder="password" type="password" class="form1" name="password">
                
                <input placeholder="confirm password" type="password" class="form1" name="passwordagain">
                    
                <input placeholder="e-mail" type="email" class="form1" name="email">
                
                    
                
                <div class="toggle">
                    
                <button class="form1" type="submit" name="submit" style="margin-bottom: 10px;">Sign Up for Doc 95</button>   
                    
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
                     
                     <a href="sample_deflect.php"><button class="formx">View Profile</button></a> <br>
                
                     <a href="sample_deflect.php"><button class="formx">Send Message</button></a> <br>
                                     
                 
                 </div>
                 
             </div>
             
             
             
             
             
             
             
             
             
             
             
             <div class="col-md-4">
                 
                 <div class="profile1">
                 
                    <img src="assets/pic2.jpg" class="profile-pic">
             
                    <p class="profile-name">Sarah Bright</p>
                     
                    <p class="profile-info">I am a PHP developer in Westlands, Nairobi who loves to code in OOP.</p>
                     
                    <br>
                     
                     <a href="sample_deflect.php"><button class="formx">View Profile</button></a> <br>
                
                     <a href="sample_deflect.php"><button class="formx">Send Message</button></a> <br>
                                     
                 
                 </div>
                 
             </div>
             
             
             
             
             
             
             
             
             
            <div class="col-md-4">
                 
                 <div class="profile1">
                 
                    <img src="assets/pic3.jpg" class="profile-pic">
             
                    <p class="profile-name">May Fayfex</p>
                     
                    <p class="profile-info">I've been coding in Java for 10 years and have developed 12 android apps.</p>
                     
                    <br>
                     
                     <a href="sample_deflect.php"><button class="formx">View Profile</button></a> <br>
                
                     <a href="sample_deflect.php"><button class="formx">Send Message</button></a> <br>
                                     
                 
                 </div>
                 
             </div>
             
             
             
          
             
             
             
         
         </div>
        
        
<br><br><br>
         
         
         
         
        
    </div>   
        
        
        
        
        
        
        
        
        
        
    
    
    </body>
    
    
    <?php include('js/general_javascript.php');  ?>
          
      
    
    
</html>