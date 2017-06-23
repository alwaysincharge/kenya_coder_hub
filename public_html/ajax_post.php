            <?php  include_once('../includes/all_classes_and_functions.php');  ?>   


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

                   echo "<span style='font-family: Josefin Slab; color: blue; font-weight: bolder; font-size: 16px;'>(" . $sum . ")</span>";
                    
                }
                
              
                
            }
                
            }
                
                  
            ?>
                   