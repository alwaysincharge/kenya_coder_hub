<?php  include_once('../includes/all_classes_and_functions.php');  ?>



<!DOCTYPE html>




<html lang="en">
    
    
<head>
    
	<title>Tsutsus - Meet Kenya's programmers.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('head_info.php'); ?>
    
</head>
    
 
    
<body>
    
    
     <?php  include("nav.php"); ?>
    
    
<div class="row" style="width: 100%; max-width: 900px; display: table; margin: 0 auto;">
    
    
    
    
<div class="col-md-4">
    
    
    
              <?php
                 
              $list = $message->all_conversation($_SESSION['admin_id'], $_SESSION['admin_id']); 
    
              $list_result = $list->get_result();   
                    
              while($row = $list_result->fetch_assoc()) { ?>
        
              <a href="/fridaycamp/public_html/messages.php?usersid=<?php echo $row['usersid'];  ?>">  
                  
                  <div class="row" style="margin-bottom: 20px;">
                                        
            
                
                
              <?php
                 
              $one_message = $message->one_message($row['max']); 
    
              $one_message_result = $one_message->get_result();   
                    
              while($row2 = $one_message_result->fetch_assoc()) { ?>
                      
                <div class="col-xs-3">
            
                      <img height="60" width="60" style="border-radius: 5px; float: left; margin: 0 5px 0px 0px;" src="/fridaycamp/public_html/male.png">
                    
                </div>
                      
                      
                <div class="col-xs-9" style="">
                    
                     <p style=" font-family: Josefin Slab; font-weight: bolder; font-size: 17px;">
                         
                         <?php if ($row2['sender'] == $_SESSION['admin_id']) {
                  
                         $one_info = $message->get_info_by_receiver($row2['receiver']); 
    
                         $one_info_result = $one_info->get_result();   
                    
                         while($row3 = $one_info_result->fetch_assoc()) { 
                         
                         echo $row3['username'];
                         
                         }
                         
                         
                         
                         } else {
                  
                         $one_info = $message->get_info_by_receiver($row2['sender']); 
    
                         $one_info_result = $one_info->get_result();   
                    
                         while($row3 = $one_info_result->fetch_assoc()) { 
                         
                         echo $row3['username'];
                             
                         }
                  
                         }
                         
                         ?>
                    </p>
                    
                    
                    
                    
                <p style="font-family: Josefin Slab; font-weight: bolder; padding-right: 5px; color: black; margin-top: -10px; word-wrap: break-word; max-width: 180px; font-size: 17px;"> 
                         
                <?php if ($row2['sender'] == $_SESSION['admin_id']) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>
                <?php echo substr(nl2br($row2['message']), 0, 260); if (strlen($row2['message']) > 260) {echo "...";} ?></p> 
                    
                 </div> 
                <?php }?>
                      
                  </div>

    
    
               </a>
                
    
             <?php }?>
    
</div>
    
    
    
    
    
    
    
    
    
<div class="col-md-8">
    
    
    
        <div class="row">
        
        
        <div class="col-xs-2">
            
        <img height="60" width="60" class="img-right" src="/fridaycamp/public_html/male.png">
            
        </div>
        
        
        <div class="col-xs-8">
            
          <form method='post' action="/fridaycamp/public_html/new_message.php"  >
              
          <input type="hidden" name="sender" value="<?php echo $_SESSION['admin_id']; ?>">
                            
          <input type="hidden" name="receiver" value="<?php echo $_GET['usersid']; ?>">
               
          <textarea placeholder='Send a message to atsunewjoint.' name="message"  maxlength="500" class="toggle mess-insert"></textarea>
              
      
             
          <div class="selection" style="display: none;">        
               
          <button name="submit" class="btn mess-send">Send Message</button>
                   
          </div>
                
           </form>

        </div>
        
        
        <div class="col-xs-2">
            
        
            
        </div>
        
    
        </div>
    
    
    
    
    
    
    
    
    
    
    <?php
                 
    $conversation = $message->conversation($_SESSION['admin_id'], $_GET['usersid'], $_GET['usersid'], $_SESSION['admin_id']); 
    
    $conversation_result = $conversation->get_result();   
                    
    while($row = $conversation_result->fetch_assoc()) { ?>
    
    
    <div class="row">
        
        
        <div class="col-xs-2">
            
            <?php if ($_SESSION['admin_id'] == $row['sender']) { ?>
                 
             <img height="60" width="60" class="img-right" src="/fridaycamp/public_html/male.png">  
            
            <?php }                                         
                                                       
            ?>

        </div>
        
        
        <div class="col-xs-8">
        <p class="mess-body"><a><?php echo $row['username']; ?></a> <?php echo $row['message']; ?></p>
        </div>
        
        
        <div class="col-xs-2">
            
         <?php if ($_SESSION['admin_id'] != $row['sender']) { ?>
            
         <img height="60" width="60" class="img-left" src="/fridaycamp/public_html/male.png">
            
        <?php }                                         
                                                       
            ?>
            
        </div>
        
    
    </div>
    
   <?php } ?>
    
</div>
    
    
</div>
    
    
</body>
    
    <?php include('js/general_javascript.php');  ?>    
    
</html>