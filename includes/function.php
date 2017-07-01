<?php





function test_input($data) {
    
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
    
}




function alert_note($note) {
    
  $_SESSION['note1'] = "<br><div style='width: auto;  font-family: Josefin Slab; font-weight: bolder;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close' style='font-weight: bolder; color: black; '>&times;</a> ".  $note     . "</div>";
    
}


function alert_note_positive($note) {
    
  $_SESSION['note1'] = "<br><div style='width: auto;  font-family: Josefin Slab; font-weight: bolder;' class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close' style='font-weight: bolder; color: black; '>&times;</a> ".  $note     . "</div>"; 
    
}



function redirect_to($new_location)  {
    
  header("Location: " . $new_location);  exit;                                     
                                      
}




function are_both_passwords_equal($url, $pass1, $pass2) {
    
   if($pass1 !== $pass2) {
   alert_note('The two passwords you enter have to be identical. Please try again.');
   redirect_to($url) ;
   }
    
}




function does_it_contain($param, $value1, $value2, $value3, $msg, $url)  {
    
   if((strpos($param, $value1 ) !== false) || (strpos($param, $value2 ) !== false) || (strpos($param, $value3 ) !== false)) {  
   alert_note($msg);
   redirect_to($url) ;     
   }
    
}





function check_emptiness($property, $url, $msg) {  
    
   if(trim($property) === '') {
   alert_note($msg);
   redirect_to($url);
   }    
    
}




function check_emptiness_3($property, $msg, $url) {  
    
   if(trim($property) === '') {
       
   alert_note($msg);
       
   redirect_to($url);

   }    
    
}



function check_lenght($property, $min, $max, $msg, $url) {
    
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
         alert_note($msg);
      redirect_to($url);
    }   
    
}



function check_lenght_2($property, $min, $max, $msg) {
    
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
         alert_note($msg);
      redirect_to($_SESSION['url_placeholder'] . 'write');
    }   
    
}



function makeClickableLinks($text) {
    
$text = html_entity_decode($text);
$text = " ".$text;
$text= preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a style='color: blue;' href=\"$3\" >$3</a>", $text);  
$text= preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a style='color: blue;' href=\"http://$3\" >$3</a>", $text);
$text= preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a style='color: blue;' href=\"$4://$3\" >$3</a>", $text);  
$text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a style='color: blue;' href=\"mailto:$2@$3\">$2@$3</a>", $text);  
$text= preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a style='color: blue;' href=\"$2@$3\">$2@$3</a>", $text);  
$text= preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a style='color: blue;' href=\"$2\">$2</a>", $text);  
        return $text;
    
}


function check_lenght_4($property, $min, $max, $msg, $url) {
    
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
        
         alert_note($msg);
        
         redirect_to($url);
        
    }   
    
}




function check_lenght_3($property, $min, $max, $msg, $url) {
    
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
         alert_note($msg);
      redirect_to($url);
    }   
    
}



function request_is_get() {
    
	return $_SERVER['REQUEST_METHOD'] === 'GET';
    
}



function request_is_post() {
    
	return $_SERVER['REQUEST_METHOD'] === 'POST';
    
}






?>