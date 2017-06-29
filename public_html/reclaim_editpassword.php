<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<html lang="en">
    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
    
    
            <?php  include("nav.php"); ?>
    
                          
            <div class="row" style="max-width: 500px; display: table; margin: 0 auto;">
                
                
                
            <?php  
    
            if (isset($_SESSION['note1'])) {
                
            echo "<div style='display: table; margin: 0 auto; margin-top: -30px; margin-bottom: 20px;'>{$_SESSION['note1']}</div>";  
                
            $_SESSION['note1'] = null;
                
            }   else {
                
            $_SESSION['note1'] = null;
                
            }
                
            ?>
                
                
                
                
            <form method="post" action="reclaim_code_editpassword.php">
                
            <p class="home-head">Change your password.</p>
                
            <div class="col-xs-6" style="">
                
            <input type="password" class="pass-style" name="password1" placeholder="new password">
                
            <input type="password" class="pass-style" name="oldpassword" placeholder="old password">
                
            <input type="hidden" class="pass-style" value="<?php echo $_GET['person']; ?>" name="person" placeholder="person">    
                                       
            <button name="submit" class="btn" style="font-family: georgia;">Submit</button>
                    
            </div>
           
           
           
            <div class="col-xs-6" style="">
                
            <input type="password" class="pass-style" name="password2" placeholder="repeat new password">
                        
            </div> 
                
            </form>
                
            </div>
    
    
    
</body>
    
    
<?php include('js/general_javascript.php');  ?>  
    
    
</html>