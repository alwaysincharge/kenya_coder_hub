<?php  include_once('../../includes/all_classes_and_functions.php');  ?>    


                 <?php if (isset($_SESSION['admin_id'])) { ?>

                 <?php
                 
                 $unread = $message->all_unread($_SESSION['admin_id']); 
    
                 $unread_result = $unread->get_result();
                
                 
                     
                 while($row = $unread_result->fetch_assoc()) {
                     
                     if ($row['count'] > 0) {
                         
                       echo "<span style='font-family: Josefin Slab; color: blue; font-weight: bolder; font-size: 16px;'>(" . $row['count'] . ")</span>";
                         
                     }
                     
                 } ?>

<?php } ?>