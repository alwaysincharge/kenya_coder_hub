<?php





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




function alert_note($note) {
  $_SESSION['note1'] = "<br><div style='width: 300px;  font-family: Josefin Slab; font-weight: bolder;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close' style='font-weight: bolder; font-size: 40px; color: black;'>&times;</a> ".  $note     . "</div>"; 
}




function redirect_to($new_location)  {
  header("Location: " . $new_location);  exit;
}




function are_both_passwords_equal($url) {
   if($_POST['password'] !== $_POST['passwordagain']) {
   alert_note('The two passwords you enter have to be identical. Please try again.');
   redirect_to($url) ;
 }
}




function does_it_contain($param, $value1, $value2, $value3)  {
   if((strpos($param, $value1 ) !== false) || (strpos($param, $value2 ) !== false) || (strpos($param, $value3 ) !== false)) {  
   alert_note('Your username, password or email cannot contain an equal sign, single quote or empty space.');
   redirect_to('home') ;     
   }
}





function check_emptiness($property, $url, $msg) {    
   if(trim($property) === '') {
   alert_note($msg);
   redirect_to($url) ;
 }    
}



function check_lenght($property, $min, $max) {
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
         alert_note('Usernames, email or passwords cannot be smaller than ' . $min . ' characters or bigger than ' . $max . '. Please try again.');
      redirect_to('home');
    }   
}



function check_lenght_2($property, $min, $max, $msg) {
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
         alert_note($msg);
      redirect_to('home');
    }   
}





function request_is_get() {
	return $_SERVER['REQUEST_METHOD'] === 'GET';
}





function request_is_post() {
	return $_SERVER['REQUEST_METHOD'] === 'POST';
}






?>