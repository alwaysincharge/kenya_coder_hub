<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<?php if(!isset($_GET['state'])) {$_GET['state'] = '';} ?>



<html lang="en">
    
    
    
<head>
    
    
	<title>Friday Camp - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
    
</head>
    
    
    
<body onload="setInterval(replaceText1, 100)" onpageshow="setInterval(replaceText2, 100)">
    
    
              <?php  include("nav.php"); ?>
    

              <div class="row" style="width: 100%; max-width: 800px; display: table; margin: 0 auto;">
    
                           <?php
    
                           $search_users = $search->search_users('%' . $_GET['keywords'] . '%'); 
    
                           $search_users_result = $search_users->get_result();   
                    
                           while($row = $search_users_result->fetch_assoc()) { ?>
    
                           <div class="col-md-4" style=" min-height: 400px; border-radius: 2px; margin-top: 20px; margin-bottom: -30px;">
                           
                           <div style="width: 200px; display: table; margin: 0 auto; border-bottom: 2px solid #ddd; padding-bottom: 20px;">
                           
                           <img src="<?php echo $row['img_path']; ?>" style="width: 200px; border-radius: 5px; height: 210px;" />
                               
                               <p style="font-family: Josefin Slab; font-weight: bolder; font-size: 20px; margin-top:10px;"><a href='/fridaycamp/public_html/user/<?php echo $row['username']; ?>'><?php echo $row['username'];  ?></a></p>
                               
                               <p><?php if ($row['story']) {echo substr(nl2br($row['story']), 0, 62) . "..."; }  ?></p>
                               

                               <a href='/fridaycamp/public_html/messages.php?usersid=<?php echo $row['id'];  ?>'><button name='submit' class='btn' style='font-family: georgia;'>Message</button></a>
                               
                               
                               <a style="margin-left: 20px;" href='/fridaycamp/public_html/user/<?php echo $row['username']; ?>'><button name='submit' class='btn' style='font-family: georgia;'>Profile</button></a>
                               
                           </div>
           
                           </div>
    
    
                           <?php } ?>
    
                </div>    
    
    
    
    
    
</body>
       
    
<?php include('js/general_javascript.php');  ?>  
    
    
</html>