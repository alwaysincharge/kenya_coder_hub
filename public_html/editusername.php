<?php  include_once('../includes/all_classes_and_functions.php');  ?>





<html lang="en">
    
    
<head>
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
    
    
    
    
<body>
    
            <?php  include("nav.php"); ?>
                          
            <div class="row" style="max-width: 500px; display: table; margin: 0 auto;">
                
                
                
            <?php  
    
            if (isset($_SESSION['note1'])) {
            echo "<div style='display: table; margin: 0 auto; margin-top: -30px;'>{$_SESSION['note1']}</div>";  
            $_SESSION['note1'] = null;
            }   else {
            $_SESSION['note1'] = null;
            }
                
            ?>
                
                
                
                
                
            <form method="post"  action="/fridaycamp/public_html/code_edit_username.php">
           
            <br>
            <p class="home-head">Change your username.</p>
               
               
            <div class="col-xs-6" style="">
                
            <textarea style="border: 2px solid #ddd; border-radius: 5px; font-family: georgia; height: 40px; padding: 5px; width: 100%; resize: none;" placeholder="username" name="username"></textarea>
                        
            </div>
           
           
           
            <div class="col-xs-6" style="">
               
            <button name="submit" class="btn" style="font-family: georgia;">Submit</button>
                    
            </div>
           
            </form>
           
           
           </div>
    
    
    
</body>
    
    
    
</html>